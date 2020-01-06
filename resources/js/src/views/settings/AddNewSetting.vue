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
        <label for="type">Setting Type</label>
        <v-select v-validate="'required'" v-model="setting.type_id" name="type" :options="options"></v-select>
        <span class="text-danger text-sm" v-show="errors.has('type')">{{ errors.first('type') }}</span>
        <br>
        <vs-input  v-validate="'required'" label="Key" name="key" v-model="setting.key" class="w-full" />
        <span class="text-danger text-sm" v-show="errors.has('key')">{{ errors.first('key') }}</span>
        <br>
        <!-- form input in type conditon -->
        <!-- advanced text editor -->
        <p v-if="setting.type_id.id == 1" class="mb-5">Value</p>
        <quill-editor v-if="setting.type_id.id == 1" v-model="setting.value" style="height:100%"></quill-editor>
        <!-- normal value -->
        <vs-input v-if="setting.type_id.id == 2" v-validate="'required'" label="Value" name="value" v-model="setting.value" class="w-full" />
        <span class="text-danger text-sm" v-show="errors.has('value')">{{ errors.first('value') }}</span>
        <!-- image -->
        <vs-upload :limit="1" :show-upload-button="false" v-if="setting.type_id.id == 3" text="Upload Image" class="img-upload"  ref="fileUpload"  @change="uploadFiles()"  />
        <!-- video -->
        <vs-upload :limit="1" :show-upload-button="false" v-if="setting.type_id.id == 4" text="Upload Video" class="img-upload"  ref="fileUpload"  @change="uploadFiles()"  />
        <!-- audio -->
        <vs-upload :limit="1" :show-upload-button="false" v-if="setting.type_id.id == 5" text="Upload Audio" class="img-upload"  ref="fileUpload"  @change="uploadFiles()"  />
        <!-- selector true false -->
        <v-select v-if="setting.type_id.id == 6"  class="selectExample" v-model="setting.value" name="type" :options="selectoroption"></v-select>
        <!-- map -->
        <div v-if="setting.type_id.id == 7" class="w-full">
            <gmap-map :center="center" :zoom="15" style="width: 100%; height: 500px">
                <gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen" @closeclick="infoWinOpen=false">
                    {{infoContent}}
                </gmap-info-window>
                <gmap-marker :position="coordinates" @drag="updateCoordinates" :clickable="true" :draggable="true" @click="toggleInfoWindow(m,i)"></gmap-marker>
            </gmap-map>
        </div>
        <!-- end input type -->
      </div>
    </VuePerfectScrollbar>

    <div class="flex flex-wrap items-center justify-center p-6" slot="footer">
      <vs-button @click.prevent="submitForm"  class="mr-6">Add Data</vs-button>
      <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Cancel</vs-button>
    </div>
  </vs-sidebar>
</template>

<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import ServerError from '@/views/ServerError.vue'
import vSelect from 'vue-select'
import { quillEditor } from 'vue-quill-editor'
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
      center: { lat: 47.376332, lng: 8.547511 },
      infoContent: '',
      infoWindowPos: null,
      infoWinOpen: false,
      currentMidx: null,
      selectoroption:[{value:1 , label:'True'},{value:'null' , label:'False'}],
      //optional: offset infowindow so it visually sits nicely on top of our marker
      infoOptions: {
      pixelOffset: { width: 0, height: -35 }
      },
      coordinates: { lat: 47.376332, lng: 8.547511 },
      setting:{'key' : '' , 'value':'' , 'type_id' : ''},
      SError:[],
      options:[],
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
      this.setting.name = '';
      this.setting.type_id = '';
    },
    submitForm() {
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          const config = {  headers: { 'content-type': 'multipart/form-data' } }
          thisIns.data.append('key' , thisIns.setting.key)
          thisIns.data.append('type_id' , thisIns.setting.type_id.id)
          if(!thisIns.data.has('value')){
            thisIns.data.append('value' , thisIns.setting.value)
          }
          thisIns.$http.post(location.origin+'/api/settings', thisIns.data ,config)
            .then(function (response){
              if(response.data.status == "success")
                thisIns.er_active   = false
                thisIns.errorActive = false
                thisIns.data = new FormData()
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
    toggleInfoWindow(marker, idx) {
        this.infoWindowPos = marker.position;
        this.infoContent   = marker.infoText;
        //check if its the same marker that was selected if yes toggle
        if (this.currentMidx == idx) {
            this.infoWinOpen = !this.infoWinOpen;
        }
        //if different marker set infowindow to open and reset current marker index
        else {
            this.infoWinOpen = true;
            this.currentMidx = idx;
        }
    },
    updateCoordinates(location) {
           this.coordinates = {
               lat: location.latLng.lat(),
               lng: location.latLng.lng(),
           };
           this.data.append('value' , location.latLng.lat() + ',' + location.latLng.lng())
       },
    uploadFiles (){
     let files = this.$refs.fileUpload.$refs.fileInput.files;
      this.data.append('value' , files[0])
     },
  },
  mounted() {
    //do something after creating vue instance
    var thisIns=this;
    this.$http.get('/api/content_type')
      .then(function (response) {
        thisIns.options = response.data
      })
      .catch(function (error) {
        thisIns.$vs.notify({
          title:'Error',
          text: error,
          color:'danger',
          iconPack: 'feather',
          icon:'icon-alert-circle'})
      });
  },
  components: {
    VuePerfectScrollbar,
    'v-select': vSelect,
    quillEditor,
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
