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
        <vs-input v-validate="'required'" label="Name" name="name" v-model="city.name" class="w-full" />
        <span class="text-danger text-sm" v-show="errors.has('name')">{{ errors.first('name') }}</span>

        <vs-input v-validate="''" label="Shipping Amount" name="shipping_amount" v-model="city.shipping_amount" class="w-full" />
        <span class="text-danger text-sm" v-show="errors.has('shipping_amount')">{{ errors.first('shipping_amount') }}</span>
        <br>
        <label for="state">State</label>
        <v-select v-validate="'required'" v-model="city.state_id" name="state" :options="options"></v-select>
        <span class="text-danger text-sm" v-show="errors.has('state')">{{ errors.first('state') }}</span>
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
import vSelect from 'vue-select'

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
      city:{'name' : '' , 'state_id' : '' , 'shipping_amount' : ''},
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
      this.city.name = '';
      this.city.state_id = '';
    },
    submitForm() {
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          thisIns.data.append('name' , thisIns.city.name)
          thisIns.data.append('shipping_amount' , thisIns.city.shipping_amount)
          thisIns.data.append('state_id' , thisIns.city.state_id.id)
          thisIns.$http.post(location.origin+'/api/citys', thisIns.data)
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
  mounted() {
    //do something after creating vue instance
    var thisIns=this;
    this.$http.get('/api/all_state')
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
