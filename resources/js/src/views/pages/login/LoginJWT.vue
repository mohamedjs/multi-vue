<template>
  <div>
    <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
    <vs-input
        v-validate="'required|email|min:3'"
        data-vv-validate-on="blur"
        name="email"
        icon-no-border
        icon="icon icon-user"
        icon-pack="feather"
        label-placeholder="Email"
        v-model="email"
        class="w-full"/>
    <span class="text-danger text-sm">{{ errors.first('email') }}</span>

    <vs-input
        data-vv-validate-on="blur"
        v-validate="'required|min:6|max:10'"
        type="password"
        name="password"
        icon-no-border
        icon="icon icon-lock"
        icon-pack="feather"
        label-placeholder="Password"
        v-model="password"
        class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('password') }}</span>

    <div class="flex flex-wrap justify-between my-5">
        <vs-checkbox v-model="checkbox_remember_me" class="mb-3">Remember Me</vs-checkbox>
        <router-link to="/pages/forgot-password">Forgot Password?</router-link>
    </div>
    <div class="flex flex-wrap justify-between mb-3">
      <vs-button  type="border" @click="registerUser">Register</vs-button>
      <vs-button :disabled="!validateForm" @click="loginJWT">Login</vs-button>
    </div>
  </div>
</template>

<script>
import ServerError from '@/views/ServerError.vue';
export default {
  components: {
    ServerError
  },
  data() {
    return {
      email: 'super_admin@ivas.com',
      password: '123456',
      checkbox_remember_me: false,
      errorActive:false,
      er_active:false,
      SError:[],
      data:new FormData()
    }
  },
  computed: {
    validateForm() {
      return !this.errors.any() && this.email != '' && this.password != '';
    },
  },
  methods: {
    checkLogin() {
      // If user is already logged in notify
      if (localStorage.getItem("userInfo")) {

        // Close animation if passed as payload
        // this.$vs.loading.close()

        this.$vs.notify({
          title: 'Login Attempt',
          text: 'You are already logged in!',
          iconPack: 'feather',
          icon: 'icon-alert-circle',
          color: 'warning'
        })

        return false
      }
      return true
    },
    loginJWT() {
      var thisIns = this
      if (!this.checkLogin()) return

      // Loading
      this.$vs.loading()

      const payload = {
        checkbox_remember_me: this.checkbox_remember_me,
        userDetails: {
          email: this.email,
          password: this.password
        }
      }

      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.data.append('email' , this.email)
      this.data.append('password' , this.password)
      this.$http.post(location.origin+'/api/login', thisIns.data ,config)
        .then(function (response){
          thisIns.$vs.loading.close()
          if(response.data.status == "success"){
            thisIns.er_active   = false
            thisIns.errorActive = false
            thisIns.$vs.notify({
              title:'Success',
              text: response.data.status,
              color:'success',
              iconPack: 'feather',
              icon:'icon-alert-circle'})
              console.log(response.data.data.userData)
            localStorage.setItem("userInfo", response.data.data.userData)
            localStorage.setItem("permissions", response.data.data.permissions)
            localStorage.setItem("roles", response.data.data.roles)
            thisIns.$router.push(thisIns.$route.query.to).catch(() => {})
          }
          else{
            thisIns.SError=[]
            for (const [key, value] of Object.entries(response.data.data)) {
                thisIns.SError.push(response.data.message)
            }
            thisIns.$vs.notify({
                title:'Error',
                text: response.data.message,
                color:'danger',
                iconPack: 'feather',
                icon:'icon-alert-circle'})
            thisIns.er_active = true
            thisIns.errorActive=true
          }
          }).catch(function (error) {
            thisIns.$vs.loading.close()
            thisIns.$vs.notify({
                title:'Error',
                text: error,
                color:'danger',
                iconPack: 'feather',
                icon:'icon-alert-circle'})
          });


      // this.$store.dispatch('auth/loginJWT', payload)
      //   .then(() => { this.$vs.loading.close() })
      //   .catch(error => {
      //     this.$vs.loading.close()
      //     this.$vs.notify({
      //       title: 'Error',
      //       text: error.message,
      //       iconPack: 'feather',
      //       icon: 'icon-alert-circle',
      //       color: 'danger'
      //     })
      //   })
    },
    registerUser() {
        console.log(this.$auth);
      if (!this.checkLogin()) return
      this.$router.push('/register').catch(() => {})
    }
  }
}

</script>
