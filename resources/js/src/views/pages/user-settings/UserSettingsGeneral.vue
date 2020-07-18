<template>
  <vx-card no-shadow>

    <!-- Img Row -->
    <div class="flex flex-wrap items-center mb-base">
      <vs-avatar :src="authUser.image" size="70px" class="mr-4 mb-4" />
      <input type="file" class="hidden" ref="update_avatar_input" @change="updateAvatar" accept="image/*">
      <span class="text-danger text-sm">{{ errors.first('image') }}</span>
      <div>
        <vs-button class="mr-4 sm:mb-0 mb-2" @click="$refs.update_avatar_input.click()">Upload photo</vs-button>
        <vs-button type="border" @click="removeAvatar" color="danger">Remove</vs-button>
        <p class="text-sm mt-2">Allowed JPG, GIF or PNG. Max size of 800kB</p>
      </div>
    </div>

    <!-- Info -->
    <vs-input class="w-full mb-base"
      v-validate="'required|min:3'"
      data-vv-validate-on="blur"
      name="user_name"
      :danger="errors.has('user_name')"
      :success="success_flag"
      @keyup="updateValue('user_name',$event)" 
      label-placeholder="Username" 
      v-model="authUser.user_name" />
    <span class="text-danger text-sm">{{ errors.first('user_name') }}</span>
    <vs-input class="w-full mb-base"
      v-validate="'required|min:3'"
      data-vv-validate-on="blur"
      name="name"
      :success="success_flag"
      :danger="errors.has('name')"
      @keyup="updateValue('name',$event)" 
      label-placeholder="Name" 
      v-model="authUser.name" />
    <span class="text-danger text-sm">{{ errors.first('name') }}</span>
    <vs-input class="w-full"
      v-validate="'required|email|min:3'"
      data-vv-validate-on="blur"
      name="email"
      :success="success_flag"
      :danger="errors.has('email')"
      @keyup="updateValue('email',$event)" 
      label-placeholder="Email" 
      v-model="authUser.email" />
    <span class="text-danger text-sm">{{ errors.first('email') }}</span>
    <vs-alert icon-pack="feather" icon="icon-info" class="h-full my-4" color="warning">
      <span>Your account is not verified. <a href="#" class="hover:underline">Resend Confirmation</a></span>
    </vs-alert>

    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
      <vs-button class="ml-auto mt-2" @click="updateUserInfo()">Save Changes</vs-button>
      <vs-button class="ml-4 mt-2" type="border" color="warning" @click="resetUserInfo()">Reset</vs-button>
    </div>
  </vx-card>
</template>

<script>
export default {
  data() {
    return {
      authUser: this.$store.state.AppActiveUser,
      success_flag:false
    }
  },
  methods:{
    updateValue(key,$event){
      const payload = {key:key, value:$event.target.value}
      console.log(payload);
      this.$store.dispatch('auth/updateUserKey',payload)
    },
    updateAvatar(input) {
      var _this = this
      if (input.target.files && input.target.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          _this.authUser.image = e.target.result
        }
        reader.readAsDataURL(input.target.files[0])
        const payload = {key:'image', value:this.authUser.image}
        this.$store.dispatch('auth/updateUserKey',payload)
      }
    },
    removeAvatar(){
      this.authUser.image  = ''
      const payload = {key:'image', value:this.authUser.image}
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
      this.authUser= this.$store.state.AppActiveUser
    }
  }
}
</script>
