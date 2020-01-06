<template>
  <vs-sidebar click-not-close position-right parent="body" default-index="1" color="primary" class="add-new-data-sidebar items-no-padding" spacer v-model="isSidebarActiveLocal">
    <div class="mt-6 flex items-center justify-between px-6">
        <h4>ADD NEW DATA</h4>
        <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocal = false" class="cursor-pointer"></feather-icon>
    </div>
    <vs-divider class="mb-0"></vs-divider>
    <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
    <br>
    <VuePerfectScrollbar class="scroll-area--data-list-add-new pt-4 pb-6" :settings="settings">
      <div class="p-6">
            <vs-input v-validate="'required'" label="Name" name="name" v-model="user.name" class="w-full" />
            <span class="text-danger text-sm" v-show="errors.has('name')">{{ errors.first('name') }}</span>

            <vs-input v-validate="'required'" label="Phone" name="phone" v-model="user.phone" class="w-full" />
            <span class="text-danger text-sm" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>

            <vs-input v-validate="'email'" label="Email" name="email" v-model="user.email" class="w-full" />
            <span class="text-danger text-sm" v-show="errors.has('email')">{{ errors.first('email') }}</span>

            <vs-input type="password" v-validate="'min:6|max:10'" label="Password" name="password" v-model="user.password" class="w-full" ref="password" />
            <span class="text-danger text-sm" v-show="errors.has('password')">{{ errors.first('password') }}</span>

            <vs-input type="password" v-validate="'min:6|max:10|confirmed:password'" label="Confirm Password" name="confirm_password" v-model="user.password_confirmation" class="w-full" data-vv-as="password" />
            <span class="text-danger text-sm" v-show="errors.has('confirm_password')">{{ errors.first('confirm_password') }}</span>

            <!-- IMG -->
            <vs-upload :limit="1" :show-upload-button="false" text="Upload Image" class="img-upload"  ref="fileUpload"  @change="uploadFiles()"  />

      </div>
    </VuePerfectScrollbar>

    <div class="flex flex-wrap items-center justify-center p-6" slot="footer">
      <vs-button @click.prevent="submitForm"  class="mr-6">Add Data</vs-button>
      <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Cancel</vs-button>
    </div>
  </vs-sidebar>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import ServerError from '@/views/ServerError.vue';

export default {
  props: {
    isUsers:'',
    isSidebarActive: {
      type: Boolean,
      required: true
    }
  },
  data() {
    return {
      data:new FormData(),
      user:{'name' : '' , 'email' : '' , 'phone' :'' , 'password' : '' , 'confirm_password' : '' , 'image':''},
      SError:[],
      errorActive:false,
      er_active:false,
      settings: { // perfectscrollbar settings
          maxScrollbarLength: 60,
          wheelSpeed: .60,
      },
    }
  },
  computed: {
    isSidebarActiveLocal: {
      get() {
        return this.isSidebarActive
      },
      set(val) {
        if(!val) {
          this.$emit('closeSidebar');
          this.initValues();
        }
      }
    }
  },
  methods: {
    initValues() {
      this.user.name = '';
      this.user.phone = '';
      this.user.email = '';
      this.user.password = '';
      this.user.password_confirmation = '';
      this.$refs.fileUpload.srcs = [];
    },
    submitForm() {
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          const config = {  headers: { 'content-type': 'multipart/form-data' } }
          thisIns.data.append('name' , thisIns.user.name)
          thisIns.data.append('email' , thisIns.user.email)
          thisIns.data.append('phone' , thisIns.user.phone)
          thisIns.data.append('password' , thisIns.user.password)
          thisIns.data.append('password_confirmation' , thisIns.user.password_confirmation)
          thisIns.$http.post('api/users', thisIns.data ,config)
            .then(function (response){
              if(response.data.status == "success")
                thisIns.er_active   = false
                thisIns.errorActive = false
                thisIns.SError=[]
                thisIns.$emit('update', response.data.data)
                thisIns.$vs.notify({
                  title:'Success',
                  text: response.data.status,
                  color:'success',
                  iconPack: 'feather',
                  icon:'icon-alert-circle'})
              }).catch(function (error) {
                if(error.response.status == 422)
                {
                  thisIns.SError=[]
                  for (const [key, value] of Object.entries(error.response.data.errors)) {
                      thisIns.SError.push(value)
                  }
                  thisIns.$vs.notify({
                      title:'Error',
                      text: error.response.data.message,
                      color:'danger',
                      iconPack: 'feather',
                      icon:'icon-alert-circle'})
                  thisIns.er_active = true
                  thisIns.errorActive=true
                }
                thisIns.$vs.notify({
                    title:'Error',
                    text: error,
                    color:'danger',
                    iconPack: 'feather',
                    icon:'icon-alert-circle'})
                  return Promise.reject(error)
              });        
        }
        else{
          thisIns.$vs.notify({
            title:'Error',
            text: 'not validate data',
            color:'danger',
            iconPack: 'feather',
            icon:'icon-alert-circle'})
        }
      })
    },
    uploadFiles (){
      let files = this.$refs.fileUpload.$refs.fileInput.files;
      console.log(this.$refs.fileUpload);
      // for (let i = 0; i < files.length; i++) {
         this.data.append('image' , files[0])
      // }
      },
  },
  components: {
    VuePerfectScrollbar,
    ServerError
  }
}
</script>

<style lang="scss" scoped>
.add-new-data-sidebar {
  ::v-deep .vs-sidebar--background {
    z-index: 52010;
  }

  ::v-deep .vs-sidebar {
    z-index: 52010;
    width: 400px;
    max-width: 90vw;

    .img-upload {
      margin-top: 2rem;

      .con-img-upload {
        padding: 0;
      }

      .con-input-upload {
        width: 100%;
        margin: 0;
      }
    }
  }
}

.scroll-area--data-list-add-new {
    height: calc(100% - 4.3rem);
}
</style>
