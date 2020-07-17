<template>
  <div>
    <vs-input
        v-validate="'required|email|min:3'"
        data-vv-validate-on="blur"
        name="email"
        icon-no-border
        :danger="errors.has('email') || (res_credentials && !errors.has('email')) "
        icon="icon icon-user"
        icon-pack="feather"
        label-placeholder="Email"
        v-model="email"
        class="w-full"/>
    <span class="text-danger text-sm">{{ errors.first('email') }}</span>
    <span class="text-danger text-sm" v-show="res_credentials && !errors.has('email')">These credentials do not match our records.</span>

    <vs-input
        data-vv-validate-on="blur"
        v-validate="'required|min:6|max:10'"
        type="password"
        name="password"
        :danger="errors.has('password') || (res_credentials && !errors.has('email')) "
        icon-no-border
        icon="icon icon-lock"
        icon-pack="feather"
        label-placeholder="Password"
        v-model="password"
        class="w-full mt-6" />
    <span class="text-danger text-sm">{{ errors.first('password') }}</span>

    <div class="flex flex-wrap justify-between my-5">
        <vs-checkbox v-model="checkbox_remember_me" class="mb-3">Remember Me</vs-checkbox>
        <span class="text-danger text-sm">{{ errors.first('checkbox_remember_me') }}</span>
        <router-link to="/pages/forgot-password">Forgot Password?</router-link>
    </div>
    <div class="flex flex-wrap justify-between mb-3">
      <vs-button :disabled="!validateForm" @click="loginJWT">Login</vs-button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: 'admin@multivue.com',
      password: 'secret',
      checkbox_remember_me:false,
      res_credentials : false
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

        this.$vs.loading.close()

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
        email: this.email,
        password: this.password
      }

      this.$store.dispatch('auth/Login', payload)
        .then(() => { 
          this.$vs.loading.close()

          this.$vs.notify({
              title:'Success',
              text: 'Login Succes!',
              color:'success',
              iconPack: 'feather',
              icon:'icon-alert-circle'
          })

          redirect_after_login = this.$route.query.to ? this.$route.query.to : '/'
          
          this.$router.push(redirect_after_login).catch(() => {}) 
        })
        .catch(error => 
        { 
          this.$vs.loading.close() 

          this.$vs.notify({
              title:'Error',
              text: error.response.data.message,
              color:'danger',
              iconPack: 'feather',
              icon:'icon-alert-circle'
          })

          if(error.response.status == 422) //validation error
          {
            this.errors.setErrors(error.response.data.data)
          }

          if(error.response.status == 417) //unauthorized
          {
            this.res_credentials = true
          }
        })
    },
  }
}

</script>
