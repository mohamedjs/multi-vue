<template>
  <vx-card no-shadow>

    <vs-input
      v-validate="'required|min:6'"
      data-vv-validate-on="blur"
      name="old_password"
      :success="success_flag"
      :danger="errors.has('old_password')"
      type="password" 
      label-placeholder="Old Password" 
      v-model="old_password" 
      class="w-full mb-base" />
    <span class="text-danger w-full text-sm">{{ errors.first('old_password') }}</span>
    <vs-input 
      v-validate="'required|min:6'"
      data-vv-validate-on="blur"
      name="password"
      ref="password"
      :success="success_flag"
      :danger="errors.has('password')"
      type="password" 
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
      v-model="password_confirmation" 
      class="w-full mb-base" />
    <span class="text-danger w-full text-sm">{{ errors.first('password_confirmation') }}</span>

    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
      <vs-button class="ml-auto mt-2" :disabled="!validateForm" @click="updatePassword()" >Save Changes</vs-button>
      <vs-button class="ml-4 mt-2" type="border" color="warning">Reset</vs-button>
    </div>
  </vx-card>
</template>

<script>
export default {
  data() {
    return {
      old_password: "",
      password: "",
      password_confirmation: "",
      success_flag:false
    }
  },
  computed: {
      validateForm() {
          return !this.errors.any() && this.old_password != '' && this.password != '' && this.password_confirmation != '';
      },
  },
  methods:{
    updatePassword(){
      var _this = this

      const payload = {
        old_password: this.old_password,
        password: this.password,
        password_confirmation: this.password_confirmation,
      }

      this.$store.dispatch('auth/updatePassword',payload) 
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
    }
  }
}
</script>
