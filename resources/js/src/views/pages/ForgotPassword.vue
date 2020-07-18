<!-- =========================================================================================
    File Name: ForgotPassword.vue
    Description: FOrgot Password Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img">
        <div class="vx-col w-4/5 sm:w-4/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">
                    <div class="vx-row">
                        <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                            <img src="@assets/images/pages/forgot-password.png" alt="login" class="mx-auto">
                        </div>
                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center d-theme-dark-bg">
                            <div class="p-8">
                                <div class="vx-card__title mb-8">
                                    <h4 class="mb-4">Recover your password</h4>
                                    <p>Please enter your email address and we'll send you instructions on how to reset your password.</p>
                                    <span class="text-success w-full text-sm" v-show="success_flag">{{ message }}.</span>
                                    <span class="text-danger w-full text-sm">{{ errors.first('email') }}</span>
                                </div>

                                <vs-input
                                    v-validate="'required|email|min:3'"
                                    data-vv-validate-on="blur"
                                    :success="success_flag"
                                    :danger="errors.has('email')"
                                    name="email"
                                    type="email" 
                                    label-placeholder="Email" 
                                    v-model="email" 
                                    class="w-full mb-8" />
                                <vs-button type="border" to="/login" class="px-4 w-full md:w-auto">Back To Login</vs-button>
                                <vs-button :disabled="!validateForm" @click="forgotPassword()" class="float-right px-4 w-full md:w-auto mt-3 mb-8 md:mt-0 md:mb-0">Recover Password</vs-button>
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
            email: '',
            message:'',
            success_flag : false,
        }
    },
    computed: {
        validateForm() {
        return !this.errors.any() && this.email != '' && this.password != '';
        },
    },
    methods: {
        forgotPassword(){
            var _this = this
            
            const payload = { 
                email : this.email
            }

            this.$store.dispatch('auth/forgotPassword',payload)
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
    }
}
</script>
