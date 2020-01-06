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
            <vs-input v-validate="'required'" label="Title" name="title" v-model="language.title" class="w-full" />
            <span class="text-danger text-sm" v-show="errors.has('title')">{{ errors.first('title') }}</span>

            <vs-input v-validate="'required'" label="Short Code" name="short_code" v-model="language.short_code" class="w-full" />
            <span class="text-danger text-sm" v-show="errors.has('short_code')">{{ errors.first('short_code') }}</span>

            <select v-model="language.rtl" class="w-full">
                <option value="0">NO</option>
                <option value="1">YES</option>
            </select>

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
    isLanguages:'',
    isSidebarActive: {
      type: Boolean,
      required: true
    }
  },
  data() {
    return {
      data:new FormData(),
      language:{'title' : '', 'short_code':'' , 'rtl' : 0},
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
      this.language.ads_url = '';
      this.$refs.fileUpload.srcs = [];
    },
    submitForm() {
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          thisIns.$http.post('api/languages', thisIns.language )
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
