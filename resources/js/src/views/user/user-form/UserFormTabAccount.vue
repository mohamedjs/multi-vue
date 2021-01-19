<!-- =========================================================================================
  File Name: UserEditTabInformation.vue
  Description: User Edit Information Tab content
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="user-edit-tab-info">
    <!-- Avatar Row -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="flex items-start flex-col sm:flex-row">
          <img :src="((typeof user.image) == 'string')  ? user.image : defaultImage" class="mr-8 rounded h-24 w-24" />
          <div>
            <p class="text-lg font-medium mb-2 mt-4 sm:mt-0">{{ user.name  }}</p>
            <input type="file" class="hidden" ref="update_avatar_input" @change="updateAvatar" accept="image/*">
            <!-- Toggle comment of below buttons as one for actual flow & currently shown is only for demo -->
            <!-- <vs-button class="mr-4 mb-4">Change Avatar</vs-button> -->
            <vs-button type="border" class="mr-4" @click="$refs.update_avatar_input.click()">Change Avatar</vs-button>

            <vs-button type="border" @click="removeAvatar" color="danger">Remove Avatar</vs-button>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="vx-row">
      <div class="vx-col md:w-1/2 w-full">
        <vs-input class="w-full mb-base"
          v-validate="'required|min:3'"
          data-vv-validate-on="blur"
          name="user_name"
          :danger="errors.has('user_name')"
          :success="success_flag"
          @keyup="updateValue('user_name',$event)" 
          label-placeholder="Username" 
          v-model="user.user_name" />
        <span class="text-danger text-sm">{{ errors.first('user_name') }}</span>
        <vs-input class="w-full mb-base"
          v-validate="'required|min:3'"
          data-vv-validate-on="blur"
          name="name"
          :success="success_flag"
          :danger="errors.has('name')"
          @keyup="updateValue('name',$event)" 
          label-placeholder="Name" 
          v-model="user.name" />
        <span class="text-danger text-sm">{{ errors.first('name') }}</span>
        <vs-input class="w-full"
          v-validate="'required|email|min:3'"
          data-vv-validate-on="blur"
          name="email"
          :success="success_flag"
          :danger="errors.has('email')"
          @keyup="updateValue('email',$event)" 
          label-placeholder="Email" 
          v-model="user.email" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>
        <vs-input class="w-full"
          v-validate="'required'"
          data-vv-validate-on="blur"
          name="phone"
          :success="success_flag"
          :danger="errors.has('phone')"
          @keyup="updateValue('phone',$event)" 
          label-placeholder="Phone" 
          v-model="user.phone" />
        <span class="text-danger text-sm" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
        <vs-input 
          v-validate="'required|min:6'"
          data-vv-validate-on="blur"
          name="password"
          ref="password"
          :success="success_flag"
          :danger="errors.has('password')"
          type="password" 
          @keyup="updateValue('password',$event)" 
          label-placeholder="Password" 
          v-model="password" 
          class="w-full mb-base" />
        <span class="text-danger w-full text-sm">{{ errors.first('password') }}</span>
        <vs-input 
          v-validate="'required|min:6|confirmed:password'"
          data-vv-validate-on="blur"
          name="password_confirmation"
          :success="success_flag"
          :danger="errors.has('password_confirmation')"
          type="password" 
          label-placeholder="Confirm Password" 
          @keyup="updateValue('password_confirmation',$event)" 
          v-model="password_confirmation" 
          class="w-full mb-base" />
        <span class="text-danger w-full text-sm">{{ errors.first('password_confirmation') }}</span>
      </div>

      <div class="vx-col md:w-1/2 w-full">

        <div class="mt-4">
          <label class="vs-input--label">Status</label>
          <v-select 
            v-model="status_local"
            :success="success_flag"
            :danger="errors.has('status')"
            :clearable="false" 
            :options="statusOptions" 
            v-validate="'required'" 
            name="status" 
            :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm" v-show="errors.has('status')">{{ errors.first('status') }}</span>
        </div>

        <div class="mt-4">
          <label class="vs-input--label">Role</label>
          <v-select 
            v-model="user_type_local" 
            :success="success_flag"
            :danger="errors.has('user_type')"
            :clearable="false" 
            :options="user_typeOptions" 
            v-validate="'required'" 
            name="user_type" 
            :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm" v-show="errors.has('user_type')">{{ errors.first('user_type') }}</span>
        </div>

        <vs-input class="w-full"
          v-validate="'required|url:require_protocol'"
          data-vv-validate-on="blur"
          name="website"
          :success="success_flag"
          :danger="errors.has('website')"
          @keyup="updateValue('website',$event)" 
          label-placeholder="website" 
          v-model="user.website" />
        <span class="text-danger text-sm" v-show="errors.has('website')">{{ errors.first('website') }}</span>

        <div class="mt-4">
          <label class="text-sm">Birth Date</label>
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

        <!-- Gender -->
        <div class="mt-4">
          <label class="text-sm">Gender</label>
          <div class="mt-2">
            <vs-radio v-model="user.gender" vs-value="male" class="mr-4">Male</vs-radio>
            <vs-radio v-model="user.gender" vs-value="female" class="mr-4">Female</vs-radio>
          </div>
        </div>

      </div>
    </div>

    <!--
      You can also use `Object.keys(Object.values(user.permissions)[0])` this logic if you consider,
      our user structure. You just have to loop over above variable to get table headers.
      Below we made it simple. So, everyone can understand.
     -->
    <!-- Permissions -->
    <!-- <vx-card class="mt-base" no-shadow card-border>

      <div class="vx-row">
        <div class="vx-col w-full">
          <div class="flex items-end px-3">
            <feather-icon svgClasses="w-6 h-6" icon="LockIcon" class="mr-2" />
            <span class="font-medium text-lg leading-none">Permissions</span>
          </div>
          <vs-divider />
        </div>
      </div>

      <div class="block overflow-x-auto">
        <table class="w-full">
          <tr>

            <th class="font-semibold text-base text-left px-3 py-2" v-for="heading in ['Module', 'Read', 'Write', 'Create', 'Delete']" :key="heading">{{ heading }}</th>
          </tr>

          <tr v-for="(val, name) in user.permissions" :key="name">
            <td class="px-3 py-2">{{ name }}</td>
            <td v-for="(permission, name) in val" class="px-3 py-2" :key="name+permission">
              <vs-checkbox v-model="val[name]" />
            </td>
          </tr>
        </table>
      </div>

    </vx-card> -->

    <!-- Save & Reset Button -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="mt-8 flex flex-wrap items-center justify-end">
            <vs-button class="ml-auto mt-2" :disabled="!validateForm"  @click="save()">Save Changes</vs-button>
            <vs-button class="ml-4 mt-2" type="border" color="warning" @click="resetUserInfo()">Reset</vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import 'flatpickr/dist/themes/airbnb.css';

export default {
  components: {
    vSelect,
    flatPickr, 
  },
  data() {
    return {
      success_flag:false,
      password:'',
      password_confirmation : '',
      defaultImage :  '/images/portrait/small/avatar-s-11.jpg',
      statusOptions: [
        { label: 'Active', value: 1},
        { label: 'Deactivated', value: 2 },
      ],
      user_typeOptions: [
        { label: 'SuperAdmin', value: 1 },
        { label: 'Admin', value: 2  },
        { label: 'Staff', value: 3  },
        { label: 'Client', value: 4 },
      ],
      dateConfig:{
        dateFormat: 'd-m-Y',
        weekNumbers: false, //show week number
        monthSelectorType:'dropdown', //can be static
        // maxDate:moment().format('d-m-Y'),
        // minDate:'01-05-1991',
        enableTime : false,
        defaultDate:moment(new Date()).format('DD-MM-YYYY'),
        maxDate: moment(new Date()).format('DD-MM-YYYY'), 
        // locale: Arabic, // locale for this instance only          
      }
    }
  },
  computed: {
    status_local : {
      get() {
        var status = this.user.status === 'active' ? 1 : 2;
        return { label: this.user.status, value: status}
      },
      set(status) {
        const payload = {key:'status', value:status.label}
        this.$store.dispatch("user/updateUserKey",payload)
      }
    },
    user_type_local : {
      get() {
        var type = 4;
        if (this.user.user_type === 'SuperAdmin') { type = 1 }
        if (this.user.user_type === "Admin") { type = 2 }
        if (this.user.user_type === 'Staff') { type = 3 }
        if (this.user.user_type === 'Client') { type = 4 }
        return { label: this.user.user_type, value: type}
      },
      set(type) {
        const payload = {key:'user_type', value:type.label}
        this.$store.dispatch("user/updateUserKey",payload)
      }
    },
    validateForm() {
      return !this.errors.any()
    },
    ...mapState('user',['user']),
  },
  methods: {
    updateValue(key,$event){
      const payload = {key:key, value:$event.target.value}
      console.log(payload)
      this.$store.dispatch('user/updateUserKey',payload)
    },
    updateAvatar(input) {
      var _this = this
      if (input.target.files && input.target.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          const payload = {key:'image', value:input.target.files[0]}
          this.$store.dispatch('user/updateUserKey',payload)
          this.defaultImage = e.target.result
        }
        reader.readAsDataURL(input.target.files[0])
      }
    },
    removeAvatar(){
      this.user.image  = ''
      const payload = {key:'image', value:this.user.image}
      this.$store.dispatch('user/updateUserKey',payload)
    },
    save(){
      if(!this.validateForm) return
      var _this = this
      var action_type = 'add'
      var action = 'user/addUserData' 
      if (this.$route.params.userId) {
        action = 'user/updateUserData'
        action_type="update"
      }
      this.$store.dispatch(action) 
        .then((response) => { 
            this.success_flag = true
            this.$vs.notify({
                title:'Success',
                text: response.data.message,
                color:'success',
                iconPack: 'feather',
                icon:'icon-alert-circle'
            })
            this.$router.push({ name: 'app-user-list' , query: {'action_type' : action_type } }).catch(() => {})
        })
        .catch(error => 
        { 
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
      if (this.$route.params.userId) {
        this.$store.dispatch("user/fetchUser", this.$route.params.userId)
      }
    },
    changeDateValue(selectedDates, dateStr, instance){
        const payload = {key:'from', value:dateStr }
        this.$store.dispatch('user/updateUserKey',payload)
    },
  },
}
</script>
