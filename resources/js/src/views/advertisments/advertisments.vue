<template>
  <div id="data-list-thumb-view" class="data-list-container">
    <vs-alert color="success" title="Success" v-show="alertActive" @click="alertActive=false" closable icon-pack="feather"  close-icon="icon-x-circle">
        {{alertSuccess}}.
    </vs-alert>
    <br>
    <add-new-advertisment  @update="onChildUpdate" :isSidebarActive="addNewDataSidebar" @closeSidebar="addNewDataSidebar = false" />
    <vs-table ref="table" multiple v-model="selected"  :data="advertisments">
      <div slot="header" class="flex flex-wrap-reverse items-center flex-grow justify-between">

        <div class="flex flex-wrap-reverse items-center">

          <!-- ACTION - DROPDOWN -->
          <vs-dropdown vs-trigger-click class="cursor-pointer mr-4 mb-4">

            <div class="p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32">
              <span class="mr-2">Actions</span>
              <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
            </div>

            <vs-dropdown-menu>

              <vs-dropdown-item>
                <span class="flex items-center justify-center w-full">
                  <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-danger stroke-current" />
                  <span @click="delet_all_selected()">Delete</span>
                </span>
              </vs-dropdown-item>
              <vs-dropdown-item>
                <span>Print</span>
              </vs-dropdown-item>
            </vs-dropdown-menu>
          </vs-dropdown>

          <!-- ADD NEW -->
          <div class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary" @click="addNewDataSidebar = true">
              <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
              <span class="ml-2 text-base text-primary">Add New</span>
          </div>
        </div>

        <div class="flex flex-wrap-reverse items-center">
          <!-- ITEMS PER PAGE -->
          <vs-dropdown vs-trigger-click class="cursor-pointer mb-4 mr-4">
            <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
              <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ advertisments.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : advertisments.length }} of {{ advertisments.length }}</span>
              <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
            </div>
            <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
            <vs-dropdown-menu>

              <vs-dropdown-item @click="itemsPerPage=10">
                <span>10</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=25">
                <span>25</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=50">
                <span>50</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=100">
                <span>100</span>
              </vs-dropdown-item>
            </vs-dropdown-menu>
          </vs-dropdown>
          <!-- Search Input -->
          <div class="con-input-search vs-table--search cursor-pointer">
            <input v-model="searchx" @keyup="handleSearch" class="input-search vs-table--search-input" type="text">
            <vs-icon icon="search"></vs-icon>
          </div>
        </div>

      </div>
      <template slot="thead">
        <vs-th>Image</vs-th>
        <vs-th sort-key="ads_url">Ads Url</vs-th>
        <vs-th>Action</vs-th>
      </template>
      <template slot-scope="{data}">
        <tbody>
          <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">
            <vs-td class="img-container">
              <img :src="tr.image" class="product-img" />
            </vs-td>
            <vs-td>
              <p class="product-name font-medium">{{ tr.ads_url }}</p>
            </vs-td>
            <vs-td>
              <div class="demo-alignment">
                <vx-tooltip color="success" text="Edit Advertisment">
                  <vs-button color="success" @click="edit(tr.id)" type="border" icon-pack="feather" icon="icon-edit"></vs-button>
                </vx-tooltip>
                <vx-tooltip color="danger" text="Delete Advertisment">
                  <vs-button color="danger" @click="deleteAdvertisment(tr.id)" type="border" icon-pack="feather" icon="icon-trash"></vs-button>
                </vx-tooltip>
              </div>
            </vs-td>
          </vs-tr>
        </tbody>
      </template>
    </vs-table>
    <div class="mt-5">
          <vs-pagination :total="total" v-model="currentx" goto></vs-pagination>
    </div>
    <vs-popup title="UpdateAdvertisment" :active.sync="popupActive">
          <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />

          <vs-input v-validate="'required|url'" label="Ads Url" name="ads_url" v-model="advertisment.ads_url" class="w-full" />
          <span class="text-danger text-sm" v-show="errors.has('ads_url')">{{ errors.first('ads_url') }}</span>

          <!-- IMG -->
          <vs-upload :limit="1" :show-upload-button="false" text="Upload Image" class="img-upload"  ref="fileUpload" :single-upload="true"  @change="uploadFiles()"  />

          <vs-button @click.prevent="updateAdvertisment"  class="mr-6">Update Data</vs-button>
    </vs-popup>
  </div>
</template>

<script>
import AddNewAdvertisment from './AddNewAdvertisment.vue';
import ServerError from '@/views/ServerError.vue';
export default {
  components: {
    AddNewAdvertisment,
    ServerError
  },
  data() {
    return {
      selected: [],
      advertisments: [],
      SError:[],
      selected:[],
      advertismentId:'',
      DataEdit:new FormData(),
      advertisment:{'ads_url' : '', 'image':''},
      url  : '/api/advertisments',
      currentx:1,
      searchx:'',
      popupActive:false,
      alertActive:false,
      errorActive:false,
      er_active:false,
      alertSuccess:'Alert',
      itemsPerPage: 4,
      total:1,
      isMounted: false,
      addNewDataSidebar: false,
    }
  },
  computed: {
    currentPage() {
      if(this.isMounted) {
        return this.$refs.table.currentx
      }
      return 0
    },
  },
  methods: {
    onChildUpdate(advertisment){
      this.alertActive= true
      this.alertSuccess = 'Advertisment Added SuccessFully'
      this.getAdvertisment()
    },
    edit(id){
      var _this = this
      this.advertismentId = id
      this.$http.get('/api/advertisments/'+id+'/edit')
      .then(function(response){
        _this.advertisment.ads_url = response.data.data.ads_url
        _this.$refs.fileUpload.srcs = [{src:response.data.data.image , orientation:'m',type:'image',percent:null,error:false,remove:null}]
        _this.popupActive = true
       })
      .catch(function (error) {
        _this.$vs.notify({
          title:'Error',
          text: error,
          color:'danger',
          iconPack: 'feather',
          icon:'icon-alert-circle'})
      });
    },
    deleteAdvertisment(id){
      var _this = this
      this.$http.delete('/api/advertisments/'+id)
      .then(function(response){
        _this.$vs.notify({
          title:'Success',
          text: response.data.status,
          color:'success',
          iconPack: 'feather',
          icon:'icon-success-circle'})
          _this.alertActive= true
          _this.alertSuccess = response.data.message
          _this.getAdvertisment(_this.currentx)
          //_this.currentx = _this.currentx + 1
       })
      .catch(function (error) {
        _this.$vs.notify({
          title:'Error',
          text: error,
          color:'danger',
          iconPack: 'feather',
          icon:'icon-alert-circle'})
      });
    },
    updateAdvertisment(){
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          const config = {  headers: { 'content-type': 'multipart/form-data' } }
          thisIns.DataEdit.append('ads_url' , thisIns.advertisment.ads_url)
          thisIns.DataEdit.append('_method' , 'patch')
          thisIns.$http.post('api/advertisments/'+thisIns.advertismentId, thisIns.DataEdit ,config)
            .then(function (response){
                thisIns.er_active   = false
                thisIns.errorActive = false
                thisIns.popupActive   = false
                thisIns.SError=[]
                thisIns.$vs.notify({
                  title:'Success',
                  text: response.data.status,
                  color:'success',
                  iconPack: 'feather',
                  icon:'icon-alert-circle'})
                  thisIns.alertActive= true
                  thisIns.alertSuccess = response.data.message
                  thisIns.getAdvertisment(thisIns.currentx)
                  //thisIns.currentx = thisIns.currentx + 1
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
    delet_all_selected(){
      var _this = this
      let result = this.selected.map(a => a.id);
      console.log(result);
      var delete_data = new FormData()
      delete_data.append('all_data',result)
      delete_data.append('table','advertisements')
      this.$http.post('/api/delete_all/',delete_data)
      .then(function(response){
        _this.$vs.notify({
          title:'Success',
          text: response.data.message,
          color:(response.data.status == 'success')?'success':'danger',
          iconPack: 'feather',
          icon:(response.data.status == 'success')?'icon-success-circle':'icon-alert-circle'})
          _this.alertActive= true
          _this.alertSuccess = response.data.message
          _this.getAdvertisment(_this.currentx)
          //_this.currentx = _this.currentx + 1
       })
      .catch(function (error) {
        _this.$vs.notify({
          title:'Error',
          text: error,
          color:'danger',
          iconPack: 'feather',
          icon:'icon-alert-circle'})
      });
    },
    getAdvertisment(page=null){
      this.$vs.loading()
      var value = page ? page:1
      const thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&search='+this.searchx:this.url+'?page='+value+'&search='+this.searchx)
        .then(function (response) {
          thisIns.advertisments = response.data.data.advertisments.data
          thisIns.currentx = response.data.data.advertisments.current_page
          thisIns.itemsPerPage = response.data.data.advertisments.per_page
          thisIns.total = response.data.data.advertisments.last_page
          thisIns.$vs.loading.close()
        })
        .catch(function (error) {
          thisIns.$vs.notify({
            title:'Error',
            text: error,
            color:'danger',
            iconPack: 'feather',
            icon:'icon-alert-circle'})
            thisIns.$vs.loading.close()
        });
    },
    uploadFiles (){
      let files = this.$refs.fileUpload.$refs.fileInput.files;
      // for (let i = 0; i < files.length; i++) {
         this.DataEdit.append('image' , files[0])
      // }
      },
    handleSearch(){
      this.$vs.loading()
      const thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&search='+this.searchx:this.url+'?search='+this.searchx)
        .then(function (response) {
          thisIns.advertisments = response.data.data.advertisments.data
          thisIns.currentx = response.data.data.advertisments.current_page
          thisIns.itemsPerPage = response.data.data.advertisments.per_page
          thisIns.total = response.data.data.advertisments.last_page
          thisIns.$vs.loading.close()
        })
        .catch(function (error) {
          thisIns.$vs.notify({
            title:'Error',
            text: error,
            color:'danger',
            iconPack: 'feather',
            icon:'icon-alert-circle'})
            thisIns.$vs.loading.close()
        });
    },
  },
  watch:{
    currentx:{
      handler:function(value){
        this.$vs.loading()
        const thisIns = this;
        this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&search='+this.searchx:this.url+'?page='+value+'&search='+this.searchx)
          .then(function (response) {
            thisIns.advertisments = response.data.data.advertisments.data
            thisIns.currentx = response.data.data.advertisments.current_page
            thisIns.itemsPerPage = response.data.data.advertisments.per_page
            thisIns.total = response.data.data.advertisments.last_page
            thisIns.$vs.loading.close()
          })
          .catch(function (error) {
            thisIns.$vs.notify({
              title:'Error',
              text: error,
              color:'danger',
              iconPack: 'feather',
              icon:'icon-alert-circle'})
              thisIns.$vs.loading.close()
          });
      }
    },
    itemsPerPage:{
      handler:function(itemsPerPage){
        this.$vs.loading()
        const thisIns = this;
        this.url = '/api/advertisments?per_page='+itemsPerPage+'&search='+this.searchx
        this.$http.get(this.url)
          .then(function (response) {
            thisIns.advertisments = response.data.data.advertisments.data
            thisIns.currentx = response.data.data.advertisments.current_page
            thisIns.itemsPerPage = response.data.data.advertisments.per_page
            thisIns.total = response.data.data.advertisments.last_page
            thisIns.$vs.loading.close()
          })
          .catch(function (error) {
            thisIns.$vs.notify({
              title:'Error',
              text: error,
              color:'danger',
              iconPack: 'feather',
              icon:'icon-alert-circle'})
              thisIns.$vs.loading.close()
          });
      }
    },
  },
  created() {
    this.$vs.loading()
    const thisIns = this;
    this.$http.get(this.url)
      .then(function (response) {
        thisIns.advertisments = response.data.data.advertisments.data
        thisIns.currentx = response.data.data.advertisments.current_page
        thisIns.itemsPerPage = response.data.data.advertisments.per_page
        thisIns.total = response.data.data.advertisments.last_page
        thisIns.$vs.loading.close()
      })
      .catch(function (error) {
        thisIns.$vs.notify({
          title:'Error',
          text: error,
          color:'danger',
          iconPack: 'feather',
          icon:'icon-alert-circle'})
          thisIns.$vs.loading.close()
      });
  },
  mounted() {
    this.isMounted = true;
  }
}
</script>

<style lang="scss">
#data-list-thumb-view {
  .vs-con-table {

    .vs-table--header {
      display: flex;
      flex-wrap: wrap-reverse;
      margin-left: 1.5rem;
      margin-right: 1.5rem;
      > span {
        display: flex;
        flex-grow: 1;
      }

      .vs-table--search{
        padding-top: 0;

        .vs-table--search-input {
          padding: 0.9rem 2.5rem;
          font-size: 1rem;

          &+i {
            left: 1rem;
          }

          &:focus+i {
            left: 1rem;
          }
        }
      }
    }

    .vs-table {
      border-collapse: separate;
      border-spacing: 0 1.3rem;
      padding: 0 1rem;


      tr{
          box-shadow: 0 4px 20px 0 rgba(0,0,0,.05);
          td{
            padding: 10px;
            &:first-child{
              border-top-left-radius: .5rem;
              border-bottom-left-radius: .5rem;
            }
            &:last-child{
              border-top-right-radius: .5rem;
              border-bottom-right-radius: .5rem;
            }
            &.img-container {
              // width: 1rem;
              // background: #fff;

              span {
                display: flex;
                justify-content: center;
              }

              .product-img {
                height: 110px;
              }
            }
          }
          td.td-check{
            padding: 20px !important;
          }
      }
    }

    .vs-table--thead{
      th {
        padding-top: 0;
        padding-bottom: 0;

        .vs-table-text{
          text-transform: uppercase;
          font-weight: 600;
        }
      }
      th.td-check{
        padding: 0 15px !important;
      }
      tr{
        background: none;
        box-shadow: none;
      }
    }

    .vs-table--pagination {
      justify-content: center;
    }
  }
}
</style>
