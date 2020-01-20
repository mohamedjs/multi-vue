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
    <vs-alert color="success" title="Success" v-show="alertActive" @click="alertActive=false" closable icon-pack="feather"  close-icon="icon-x-circle">
        {{alertSuccess}}.
    </vs-alert>
    <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
    <br><br>
    <!-- Avatar Row -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="flex items-start flex-col sm:flex-row">
          <img :src="data.image" class="mr-8 rounded h-24 w-24" />
          <!-- <vs-avatar :src="data.avatar" size="80px" class="mr-4" /> -->
          <div>
            <p class="text-lg font-medium mb-2 mt-4 sm:mt-0">{{ data.name  }}</p>
            <input type="file" class="hidden" ref="update_avatar_input" @change="update_avatar" accept="image/*">

            <!-- Toggle comment of below buttons as one for actual flow & currently shown is only for demo -->
            <!-- <vs-button class="mr-4 mb-4">Change Avatar</vs-button> -->
            <vs-button type="border" class="mr-4" @click="$refs.update_avatar_input.click()">Change Avatar</vs-button>

            <vs-button type="border" color="danger">Remove Avatar</vs-button>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="vx-row">
      <div class="vx-col md:w-1/2 w-full">
        <vs-input class="w-full mt-4" label="Username" v-model="data_local.user_name" v-validate="'required|alpha_num'" name="user_name" />
        <span class="text-danger text-sm"  v-show="errors.has('user_name')">{{ errors.first('user_name') }}</span>

        <vs-input class="w-full mt-4" label="Name" v-model="data_local.name" v-validate="'required|alpha_spaces'" name="name" />
        <span class="text-danger text-sm"  v-show="errors.has('name')">{{ errors.first('name') }}</span>

        <vs-input class="w-full mt-4" label="Email" v-model="data_local.email" type="email" v-validate="'required|email'" name="email" />
        <span class="text-danger text-sm"  v-show="errors.has('email')">{{ errors.first('email') }}</span>

        <vs-input class="w-full mt-4" label="Mobile" v-model="data_local.phone" v-validate="{regex: '^\\+?([0-9]+)$' }" name="mobile" />
        <span class="text-danger text-sm"  v-show="errors.has('mobile')">{{ errors.first('mobile') }}</span>
      </div>

      <div class="vx-col md:w-1/2 w-full">

        <div class="mt-4">
          <label class="vs-input--label">Status</label>
          <v-select v-model="status_local" :clearable="false" :options="statusOptions" v-validate="'required'" name="status" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm"  v-show="errors.has('status')">{{ errors.first('status') }}</span>
        </div>

        <div class="mt-4">
          <label class="vs-input--label">Verified</label>
          <v-select v-model="verified_local" :clearable="false" :options="isVerifiedOptions" v-validate="'required'" name="verified" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm"  v-show="errors.has('verified')">{{ errors.first('verified') }}</span>
        </div>

        <div class="mt-4">
          <label class="vs-input--label">Role</label>
          <v-select v-model="user_type_local" :clearable="false" :options="user_typeOptions" v-validate="'required'" name="user_type" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm"  v-show="errors.has('user_type')">{{ errors.first('user_type') }}</span>
        </div>

        <vs-input class="w-full mt-4" label="Website" v-model="data_local.website" v-validate="'url:require_protocol'" name="website" data-vv-as="field" />
        <span class="text-danger text-sm"  v-show="errors.has('website')">{{ errors.first('website') }}</span>

        <div class="mt-4">
          <label class="text-sm">Birth Date</label>
          <flat-pickr v-model="data_local.bod" :config="{ dateFormat: 'Y-m-d', maxDate: new Date() }" class="w-full" v-validate="'required'" name="dob" />
          <span class="text-danger text-sm"  v-show="errors.has('dob')">{{ errors.first('dob') }}</span>
        </div>

        <!-- Gender -->
        <div class="mt-4">
          <label class="text-sm">Gender</label>
          <div class="mt-2">
            <vs-radio v-model="data_local.gender" vs-value="male" class="mr-4">Male</vs-radio>
            <vs-radio v-model="data_local.gender" vs-value="female" class="mr-4">Female</vs-radio>
          </div>
        </div>

      </div>
    </div>

    <!--
      You can also use `Object.keys(Object.values(data_local.permissions)[0])` this logic if you consider,
      our data structure. You just have to loop over above variable to get table headers.
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

          <tr v-for="(val, name) in data_local.permissions" :key="name">
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
          <vs-button class="ml-auto mt-2" @click="save_changes" :disabled="!validateForm">Save Changes</vs-button>
          <vs-button class="ml-4 mt-2" type="border" color="warning" @click="reset_data">Reset</vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import ServerError from '@/views/ServerError.vue';
export default {
  components: {
    vSelect,
    flatPickr,
    ServerError
  },
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {

      data_local: JSON.parse(JSON.stringify(this.data)),
      SError:[],
      DataEdit:new FormData(),
      popupActive:false,
      alertActive:false,
      errorActive:false,
      er_active:false,
      alertSuccess:'Alert',
      user_typeOptions: [
        { label: 'All', value: 'all' },
        { label: 'Admin', value: 'admin' },
        { label: 'User', value: 'user' },
        { label: 'Staff', value: 'staff' },
      ],
      isVerifiedOptions: [
        { label: 'All', value: 'all' },
        { label: 'Yes', value: 'yes' },
        { label: 'No', value: 'no' },
      ],
      statusOptions: [
        { label: 'All', value: 'all' },
        { label: 'Active', value: 'active' },
        { label: 'Deactivated', value: 'deactivated' },
        { label: 'Blocked', value: 'blocked' },
      ],
    }
  },
  computed: {
    status_local: {
      get() {
        return { label: this.capitalize(this.data_local.status),  value: this.data_local.status  }
      },
      set(obj) {
        this.data_local.status = obj.value
      }
    },
    user_type_local: {
      get() {
        return { label: this.capitalize(this.data_local.user_type),  value: this.data_local.user_type  }
      },
      set(obj) {
        this.data_local.user_type = obj.value
      }
    },
    verified_local: {
      get() {
        return { label: this.capitalize(this.data_local.verified),  value: this.data_local.verified  }
      },
      set(obj) {
        this.data_local.verified = obj.value
      }
    },
    validateForm() {
      return !this.errors.any()
    }
  },
  methods: {
    capitalize(str) {
      console.log(str);
      return str.slice(0,1).toUpperCase() + str.slice(1,str.length)
    },
    user_type(type){
      return type == 'admin' ? '2' : type=='user' ? '4' : '3'
    },
    verified(ver){
      return ver == 'yes' ? '1' : '0'
    },
    status(st){
      return st == 'active' ? '1' : st == 'blocked' ? '2' : '3'
    },
    save_changes() {
      if(!this.validateForm) return
      // Here will go your API call for updating data
      // You can get data in "this.data_local"
      var _this = this
      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.DataEdit.append('name' , this.data_local.name)
      this.DataEdit.append('email' , this.data_local.email)
      this.DataEdit.append('website' , this.data_local.website)
      this.DataEdit.append('user_name' , this.data_local.user_name)
      this.DataEdit.append('phone' , this.data_local.phone)
      this.DataEdit.append('bod' , this.data_local.bod)
      this.DataEdit.append('status' , this.status(this.data_local.status))
      this.DataEdit.append('user_type' , this.user_type(this.data_local.user_type))
      this.DataEdit.append('verified' , this.verified(this.data_local.verified))
      this.DataEdit.append('gender' , (this.data_local.gender == 'male') ? '1' : '2')
      this.DataEdit.append('_method' , 'patch')
      this.$http.post('/api/users/'+_this.$route.params.userId ,this.DataEdit,config)
        .then(function (response){
            _this.er_active   = false
            _this.errorActive = false
            _this.popupActive   = false
            _this.SError=[]
            _this.$vs.notify({
              title:'Success',
              text: response.data.status,
              color:'success',
              iconPack: 'feather',
              icon:'icon-alert-circle'})
              _this.alertActive= true
              _this.alertSuccess = response.data.message
          }).catch(function (error) {
            if(error.response.status == 422)
            {
              _this.SError=[]
              for (const [key, value] of Object.entries(error.response.data.errors)) {
                  _this.SError.push(value)
              }
              _this.$vs.notify({
                  title:'Error',
                  text: error.response.data.message,
                  color:'danger',
                  iconPack: 'feather',
                  icon:'icon-alert-circle'})
              _this.er_active = true
              _this.errorActive=true
            }
            _this.$vs.notify({
                title:'Error',
                text: error,
                color:'danger',
                iconPack: 'feather',
                icon:'icon-alert-circle'})
          });
    },
    reset_data() {
      this.data_local = JSON.parse(JSON.stringify(this.data))
    },
    update_avatar(input) {
      var _this = this
      if (input.target.files && input.target.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          this.data.image = e.target.result
        }
        reader.readAsDataURL(input.target.files[0])
        this.DataEdit.append('image' , input.target.files[0])
      }
    }
  },
}
</script>
