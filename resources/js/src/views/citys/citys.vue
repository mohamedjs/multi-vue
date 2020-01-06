<template>
  <div id="data-list-thumb-view" class="data-list-container">
    <vs-alert color="success" title="Success" v-show="alertActive" @click="alertActive=false" closable icon-pack="feather"  close-icon="icon-x-circle">
        {{alertSuccess}}.
    </vs-alert>
    <br>
    <add-new-city  @update="onChildUpdate" :isSidebarActive="addNewDataSidebar" @closeSidebar="addNewDataSidebar = false" />
    <vs-table ref="table" multiple v-model="selected" :max-items="itemsPerPage" :data="citys">
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
          <!-- <div class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary" @click="addNewDataSidebar = true">
              <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
              <span class="ml-2 text-base text-primary">Add New</span>
          </div> -->
        </div>

        <div class="flex flex-wrap-reverse items-center">
          <!-- ITEMS PER PAGE -->
          <vs-dropdown vs-trigger-click class="cursor-pointer mb-4 mr-4">
            <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
              <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ citys.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : citys.length }} of {{ citys.length }}</span>
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
        <vs-th sort-key="name">Name</vs-th>
        <vs-th sort-key="state">City</vs-th>
        <vs-th sort-key="Shipping Amount">Shipping Amount</vs-th>
        <vs-th>Action</vs-th>
      </template>
      <template slot-scope="{data}">
        <tbody>
          <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">
            <vs-td>
              <p class="product-name font-medium">{{ tr.name }}</p>
            </vs-td>
            <vs-td>
              <p class="product-category">{{ tr.state ? tr.state.name:'' }}</p>
            </vs-td>
            <vs-td>
              <p class="product-category">{{ tr.shipping_amount }}</p>
            </vs-td>
            <vs-td>
              <div class="demo-alignment">
                <vx-tooltip color="success" text="Edit City">
                  <vs-button color="success" @click="edit(tr.id)" type="border" icon-pack="feather" icon="icon-edit"></vs-button>
                </vx-tooltip>
                <vx-tooltip color="danger" text="Delete City">
                  <vs-button color="danger" @click="deleteCity(tr.id)" type="border" icon-pack="feather" icon="icon-trash"></vs-button>
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
    <vs-popup title="UpdateCity" :active.sync="popupActive">
          <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
          <vs-input v-validate="'required'" label="Name" name="name" v-model="city.name" class="w-full" />
          <span class="text-danger text-sm" v-show="errors.has('name')">{{ errors.first('name') }}</span>

          <vs-input v-validate="''" label="Shipping Amount" name="shipping_amount" v-model="city.shipping_amount" class="w-full" />
          <span class="text-danger text-sm" v-show="errors.has('shipping_amount')">{{ errors.first('shipping_amount') }}</span>
          <br>

          <label for="state">State</label>
          <v-select v-model="city.state_id" v-validate="'required'" name="state" :options="options"></v-select>
          <span class="text-danger text-sm" v-show="errors.has('state')">{{ errors.first('state') }}</span>

          <br>
          <vs-button @click.prevent="updateCity"  class="mr-6">Update Data</vs-button>
    </vs-popup>
  </div>
</template>

<script>
import AddNewCity from './AddNewCity.vue';
import ServerError from '@/views/ServerError.vue';
import vSelect from 'vue-select'
export default {
  components: {
    AddNewCity,
    'v-select': vSelect,
    ServerError
  },
  props:['id'],
  data() {
    return {
      selected: [],
      citys: [],
      SError:[],
      selected:[],
      cityId:'',
      options:[],
      DataEdit:new FormData(),
      city:{'name' : '' , 'state_id' : '' , 'shipping_amount' : ''},
      url  : '/api/citys',
      currentx:1,
      popupActive:false,
      alertActive:false,
      errorActive:false,
      er_active:false,
      alertSuccess:'Alert',
      searchx:'',
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
    onChildUpdate(city){
      this.alertActive= true
      this.alertSuccess = 'City Added SuccessFully'
      this.getCity()
    },
    edit(id){
      var _this = this
      this.cityId = id
      this.$http.get('/api/citys/'+id+'/edit')
      .then(function(response){
        _this.city.name = response.data.data.name
        _this.city.state_id     = {id:response.data.data.state.id , label :response.data.data.state.name }
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
    deleteCity(id){
      var _this = this
      this.$http.delete('/api/citys/'+id)
      .then(function(response){
        _this.$vs.notify({
          title:'Success',
          text: response.data.status,
          color:'success',
          iconPack: 'feather',
          icon:'icon-success-circle'})
          _this.alertActive= true
          _this.alertSuccess = response.data.message
          _this.getCity(_this.currentx)
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
    updateCity(){
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          const config = {  headers: { 'content-type': 'multipart/form-data' } }
          thisIns.DataEdit.append('name' , thisIns.city.name)
          thisIns.DataEdit.append('shipping_amount' , thisIns.city.shipping_amount)
          thisIns.DataEdit.append('state_id' , thisIns.city.state_id.id)
          thisIns.DataEdit.append('_method' , 'patch')
          thisIns.$http.post(location.origin+'/api/citys/'+thisIns.cityId, thisIns.DataEdit ,config)
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
                  thisIns.getCity(thisIns.currentx)
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
      var delete_data = new FormData()
      delete_data.append('all_data',result)
      delete_data.append('table','citys')
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
          _this.getCity(_this.currentx)
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
    showCity(id){
      this.$router.replace('/citys/'+id);
    },
    getCity(page=null){
      this.$vs.loading()
      var value = page ? page:1
      const thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&state_id='+this.$route.params.id+'&search='+this.searchx:this.url+'?page='+value+'&state_id='+this.$route.params.id+'&search='+this.searchx)
        .then(function (response) {
          thisIns.citys = response.data.data.citys.data
          thisIns.currentx = response.data.data.citys.current_page
          thisIns.itemsPerPage = response.data.data.citys.per_page
          thisIns.total = response.data.data.citys.last_page
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
    handleSearch(){
      this.$vs.loading()
      const thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&search='+this.searchx:this.url+'?search='+this.searchx)
        .then(function (response) {
          thisIns.citys = response.data.data.citys.data
          thisIns.currentx = response.data.data.citys.current_page
          thisIns.itemsPerPage = response.data.data.citys.per_page
          thisIns.total = response.data.data.citys.last_page
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
        this.$http.get(this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&state_id='+this.$route.params.id+'&search='+this.searchx:this.url+'?page='+value+'&state_id='+this.$route.params.id+'&search='+this.searchx)
          .then(function (response) {
            thisIns.citys = response.data.data.citys.data
            thisIns.currentx = response.data.data.citys.current_page
            thisIns.itemsPerPage = response.data.data.citys.per_page
            thisIns.total = response.data.data.citys.last_page
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
        this.url = '/api/citys?per_page='+itemsPerPage+'&state_id='+this.$route.params.id+'&search='+this.searchx
        this.$http.get(this.url)
          .then(function (response) {
            thisIns.citys = response.data.data.citys.data
            thisIns.currentx = response.data.data.citys.current_page
            thisIns.itemsPerPage = response.data.data.citys.per_page
            thisIns.total = response.data.data.citys.last_page
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
    this.$http.get(this.url+'?state_id='+this.$route.params.id)
      .then(function (response) {
        thisIns.citys = response.data.data.citys.data
        thisIns.currentx = response.data.data.citys.current_page
        thisIns.itemsPerPage = response.data.data.citys.per_page
        thisIns.total = response.data.data.citys.last_page
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
