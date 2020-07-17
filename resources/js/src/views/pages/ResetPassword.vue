<!-- =========================================================================================
    File Name: ResetPassword.vue
    Description: Reset Password Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img">
        <div class="vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">
                    <div class="vx-row">
                        <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                            <img src="@assets/images/pages/reset-password.png" alt="login" class="mx-auto">
                        </div>
                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg">
                            <div class="p-8">
                                <div class="vx-card__title mb-8">
                                    <h4 class="mb-4">Reset Password</h4>
                                    <p>Please enter your new password.</p>
                                    <span class="text-success w-full text-sm" v-show="success_flag">{{ message }}.</span>
                                </div>
                                <vs-input
                                    v-validate="'required|email|min:3'"
                                    data-vv-validate-on="blur"
                                    name="email"
                                    :success="success_flag"
                                    :danger="errors.has('email')"
                                    type="email" 
                                    label-placeholder="Email" 
                                    v-model="email" 
                                    class="w-full mb-6" />
                                <span class="text-danger w-full text-sm">{{ errors.first('email') }}</span>
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
                                    class="w-full mb-6" />
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
                                    class="w-full mb-8" />
                                <span class="text-danger w-full text-sm">{{ errors.first('password_confirmation') }}</span>
                                <div class="flex flex-wrap justify-between flex-col-reverse sm:flex-row">
                                    <vs-button type="border" to="/pages/login" class="w-full sm:w-auto mb-8 sm:mb-auto mt-3 sm:mt-auto">Go Back To Login</vs-button>
                                    <vs-button class="w-full sm:w-auto" :disabled="!validateForm" @click="resetPassword">Reset</vs-button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: this.$route.query.email,
            token: this.$route.params.token,
            password: '',
            password_confirmation: '',
            success_flag: false,
            message: ''
        }
    },
    computed: {
        validateForm() {
            return !this.errors.any() && this.email != '' && this.password != '';
        },
    },
    methods:{
        resetPassword(){
            var _this = this

            const payload = { 
                email : this.email,
                password : this.password,
                password_confirmation : this.password_confirmation,
                token : this.token,
            }
            
            this.$store.dispatch('auth/resetPassword',payload)
            .then((response) => { 
                this.success_flag = true
                this.message = response.data.message; 
                this.$vs.notify({
                    title:'Success',
                    text: response.data.message,
                    color:'success',
                    iconPack: 'feather',
                    icon:'icon-alert-circle'
                })
                this.$router.push('/').catch(() => {}) 
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
            })
        }
    },
}
</script>
