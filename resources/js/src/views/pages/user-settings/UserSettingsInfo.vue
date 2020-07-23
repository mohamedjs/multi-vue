<template>
  <vx-card no-shadow>

    <!-- DOB -->
    <div class="mt-8">
      <label class="text-sm">Birth Date</label>
      <!-- v-validate="'required|date_format:d F Y|date_between:1 january 1880, moment().format()'" -->
      <flat-pickr 
        v-model="user.bod" 
        v-validate="'required'"
        data-vv-validate-on="blur"
        name="dob"
        :danger="errors.has('bod')"
        :success="success_flag"
        :config="dateConfig" 
        @on-change="changeDateValue" 
        class="w-full" />
      <span class="text-danger text-sm">{{ errors.first('dob') }}</span>
    </div>

    <!-- Languages -->
    <!-- <div class="mt-8">
      <label class="text-sm">Languages</label>
      <v-select v-model="lang_known" multiple :closeOnSelect="false" :options="langOptions" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
    </div> -->

    <!-- Mobile Number -->
    <vs-input 
      class="w-full mt-8" 
      v-validate="'required|numeric|min:11'"
      data-vv-validate-on="blur"
      name="phone"
      :danger="errors.has('phone')"
      :success="success_flag"
      type="number" 
      label-placeholder="Mobile" 
      @keyup="updateValue('phone',$event)" 
      v-model="user.phone" />
    <span class="text-danger text-sm">{{ errors.first('phone') }}</span>

    <!-- Phone Mobile Number -->
    <vs-input 
      class="w-full mt-8" 
      v-validate="'required|numeric|min:6'"
      data-vv-validate-on="blur"
      name="home_phone"
      :danger="errors.has('home_phone')"
      :success="success_flag"
      type="number" 
      label-placeholder="Mobile" 
      @keyup="updateValue('home_phone',$event)" 
      v-model="user.home_phone" />
    <span class="text-danger text-sm">{{ errors.first('home_phone') }}</span>

    <!-- Website  -->
    <vs-input 
      class="w-full mt-8" 
      v-validate="'required|url'"
      data-vv-validate-on="blur"
      name="website"
      :danger="errors.has('website')"
      :success="success_flag"
      label-placeholder="Website" 
      @keyup="updateValue('website',$event)" 
      v-model="user.website" />
    <span class="text-danger text-sm">{{ errors.first('website') }}</span>
    <!-- Gender -->
    <div class="mt-8 mb-base">
      <label class="text-sm">Gender</label>
      <div class="mt-2">
        <vs-radio v-model="user.gender" vs-value="male" class="mr-4">Male</vs-radio>
        <vs-radio v-model="user.gender" vs-value="female" class="mr-4">Female</vs-radio>
      </div>
    </div>

    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
      <vs-button class="ml-auto mt-2" @click="updateUserInfo">Save Changes</vs-button>
      <vs-button class="ml-4 mt-2" type="border" color="warning" @click="resetUserInfo">Reset</vs-button>
    </div>
  </vx-card>
</template>

<script>
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import vSelect from 'vue-select'
import { mapState } from 'vuex'

export default {
  components: {
    flatPickr,
    vSelect
  },
  data() {
    return {
      success_flag:false,
      countryOptions: [
        { label: "Australia",  value: "australia"  },
        { label: "France",     value: "france"     },
        { label: "Germany",    value: "germany"    },
        { label: "India",      value: "india"      },
        { label: "Jordan",     value: "jordan"     },
        { label: "Morocco",    value: "morocco"    },
        { label: "Portuguese", value: "portuguese" },
        { label: "Syria",      value: "syria"      },
        { label: "USA",        value: "usa"        },
      ],
      dateConfig:{
          dateFormat: 'd-m-Y',
          weekNumbers:true, //show week number
          monthSelectorType:'dropdown', //can be static
          maxDate:moment().format('d-m-Y'),
          minDate:'01 january 1880',
          enableTime : false,
          defaultDate:moment().format('d-m-Y'),
      }
    }
  },
  computed: {
    ...mapState('auth',['user']),
    validateForm() {
      return !this.errors.any();
    }
  },
  methods:{
    updateValue(key,$event){
      const payload = {key:key, value:$event.target.value}
      this.$store.dispatch('auth/updateUserKey',payload)
    },
    changeDateValue(selectedDates, dateStr, instance){
      const payload = {key:'bod', value:moment(dateStr).format("YYYY-MM-DD")}
      this.$store.dispatch('auth/updateUserKey',payload)
    },
    updateUserInfo(){
      var _this = this
      this.$store.dispatch('auth/updateUserData') 
        .then((response) => { 
            this.success_flag = true
            this.$vs.notify({
                title:'Success',
                text: response.data.message,
                color:'success',
                iconPack: 'feather',
                icon:'icon-alert-circle'
            })
        })
        .catch(error => 
        { 
          console.log(error);
            this.$vs.notify({
                title:'Error',
                text: error.response.data.message,
                color:'danger',
                iconPack: 'feather',
                icon:'icon-alert-circle'
            })

            if(error.response.status == 422) //validation error
            {
                this.success_flag = false
                // Add errors to VeeValidate Error Bag
                var entries = Object.entries(error.response.data.data);
                entries.forEach(function(item, index) {
                    _this.errors.add({
                        field: item[0],
                        msg: item[1][0]
                    });
                });
            }

             if(error.response.status == 417) //unauthorized error
             {
               this.success_flag = false
             }
        })
    },
    resetUserInfo(){
      this.user= ''
    },
  },
  created(){
    console.log(moment().format('d-m-Y'));
  }
}
</script>
