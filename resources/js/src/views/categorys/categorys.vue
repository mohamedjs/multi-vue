<template>
  <div id="data-list-thumb-view" class="data-list-container">
    <vs-alert color="success" title="Success" v-show="alertActive" @click="alertActive=false" closable icon-pack="feather"  close-icon="icon-x-circle">
        {{alertSuccess}}.
    </vs-alert>
    <br>
    <add-new-category  @update="onChildUpdate" :isSidebarActive="addNewDataSidebar" @closeSidebar="addNewDataSidebar = false" />
    <vs-prompt title="Export To Excel" class="export-options" @cancle="clearFields" @accept="exportToExcel" accept-text="Export" @close="clearFields" :active.sync="activePrompt">
        <vs-input v-model="fileName" placeholder="Enter File Name.." class="w-full" />
        <v-select v-model="selectedFormat" :options="formats" class="my-4" />
        <div class="flex">
          <span class="mr-4">Cell Auto Width:</span>
          <vs-switch v-model="cellAutoWidth">Cell Auto Width</vs-switch>
        </div>
    </vs-prompt>
    <vs-table ref="table" multiple v-model="selected" :max-items="itemsPerPage"  :data="categorys">
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
                <span class="flex items-center justify-center w-full">
                  <feather-icon icon="FileIcon" svgClasses="w-5 h-5 hover:text-success stroke-current" />
                  <span @click="activePrompt=true">Export</span>
                </span>
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
              <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ categorys.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : categorys.length }} of {{ categorys.length }}</span>
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
        <vs-th sort-key="name">Title</vs-th>
        <vs-th sort-key="email">Coding</vs-th>
        <vs-th v-if="$route.params.id" sort-key="email">Parent Category</vs-th>
        <vs-th>Action</vs-th>
      </template>
      <template slot-scope="{data}">
        <tbody>
          <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">
            <vs-td class="img-container">
              <img :src="tr.image" class="product-img" />
            </vs-td>
            <vs-td>
              <p class="product-name font-medium">{{ tr.title }}</p>
            </vs-td>
            <vs-td>
              <p class="product-category">{{ tr.coding }}</p>
            </vs-td>
            <vs-td v-if="$route.params.id">
              <p class="product-sub_category">{{ tr.cat ? tr.cat.title:'' }}</p>
            </vs-td>
            <vs-td>
              <div class="demo-alignment">
                <vx-tooltip color="success" text="Edit Category">
                  <vs-button color="success" @click="edit(tr.id)" type="border" icon-pack="feather" icon="icon-edit"></vs-button>
                </vx-tooltip>
                <vx-tooltip color="danger" text="Delete Category">
                  <vs-button color="danger" @click="deleteCategory(tr.id)" type="border" icon-pack="feather" icon="icon-trash"></vs-button>
                </vx-tooltip>
                <vx-tooltip refs="tool" color="warning" text="Show Sub Category">
                  <vs-button v-if="tr.sub_cats_count > 0" color="warning" @click="showSubCat(tr.id)" type="border" icon-pack="feather" icon="icon-play"></vs-button>
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
    <vs-popup title="UpdateCategory" :active.sync="popupActive">
          <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
          <label for="category">Parent Category</label>
          <v-select v-model="category.parent_id" :options="options"></v-select>


          <vs-input v-validate="'required'" label="Title" name="title" v-model="category.title" class="w-full" />
          <span class="text-danger text-sm" v-show="errors.has('title')">{{ errors.first('title') }}</span>

          <vs-input v-validate="'required'" label="Coding" name="coding" v-model="category.coding" class="w-full" />
          <span class="text-danger text-sm" v-show="errors.has('coding')">{{ errors.first('coding') }}</span>

          <!-- IMG -->
          <vs-upload :limit="1" :show-upload-button="false" text="Upload Image" class="img-upload"  ref="fileUpload" :single-upload="true"  @change="uploadFiles()"  />

          <vs-button @click.prevent="updateCategory"  class="mr-6">Update Data</vs-button>
    </vs-popup>
  </div>
</template>

<script>
import AddNewCategory from './AddNewCategory.vue';
import ServerError from '@/views/ServerError.vue';
import vSelect from 'vue-select'
export default {
  components: {
    AddNewCategory,
    'v-select':vSelect,
    ServerError
  },
  data() {
    return {
      selected: [],
      categorys: [],
      options : [],
      SError:[],
      selected:[],
      categoryId:'',
      DataEdit:new FormData(),
      category:{'title' : '' , 'coding' : '', 'image':'' , 'parent_id' :''},
      url  : '/api/categorys',
      currentx:1,
      popupActive:false,
      alertActive:false,
      errorActive:false,
      er_active:false,
      alertSuccess:'Alert',
      itemsPerPage: 4,
      searchx:'',
      total:1,
      isMounted: false,
      addNewDataSidebar: false,
      formats:["xlsx", "csv", "txt"] ,
      cellAutoWidth: true,
      selectedFormat: "xlsx",
      headerTitle: ["Title", "Coding"],
      headerVal: ["title", "coding"],
      fileName: "",
      activePrompt: false,
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
    onChildUpdate(category){
      this.alertActive= true
      this.alertSuccess = 'Category Added SuccessFully'
      this.getCategory()
    },
    edit(id){
      var _this = this
      this.categoryId = id
      this.$http.get('/api/categorys/'+id+'/edit')
      .then(function(response){
        _this.category.title      = response.data.data.title
        _this.category.coding     = response.data.data.coding
        _this.category.parent_id  = response.data.data.cat ? {id:response.data.data.cat.id , label :response.data.data.cat.title } : {id:null , label :'' }
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
    deleteCategory(id){
      var _this = this
      this.$http.delete('/api/categorys/'+id)
      .then(function(response){
        _this.$vs.notify({
          title:'Success',
          text: response.data.status,
          color:'success',
          iconPack: 'feather',
          icon:'icon-success-circle'})
          _this.alertActive= true
          _this.alertSuccess = response.data.message
          _this.getCategory(_this.currentx)
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
    updateCategory(){
      var thisIns=this;
      this.$validator.validateAll().then(result => {
        if(result) {
          thisIns.DataEdit.append('title' , thisIns.category.title)
          thisIns.DataEdit.append('coding' , thisIns.category.coding)
          if(thisIns.category.parent_id.id){
            thisIns.DataEdit.append('parent_id' , thisIns.category.parent_id.id)
          }
          thisIns.DataEdit.append('_method' , 'patch')
          thisIns.$http.post('/api/categorys/'+thisIns.categoryId, thisIns.DataEdit)
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
                  thisIns.getCategory(thisIns.currentx)
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
      delete_data.append('table','categories')
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
          _this.getCategory(_this.currentx)
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
    getCategory(page=null){
      this.$vs.loading()
      var value = page ? page:1
      const thisIns = this;
      var rout_link = this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&search='+this.searchx:this.url+'?page='+value+'&search='+this.searchx
      if(this.$route.params.id){
        rout_link = this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&parent_id='+this.$route.params.id+'&search='+this.searchx:this.url+'?page='+value+'&parent_id='+this.$route.params.id+'&search='+this.searchx
      }
      this.$http.get(rout_link)
        .then(function (response) {
          thisIns.categorys = response.data.data.categorys.data
          thisIns.currentx = response.data.data.categorys.current_page
          thisIns.itemsPerPage = response.data.data.categorys.per_page
          thisIns.total = response.data.data.categorys.last_page
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
    showSubCat(id){
      this.$router.replace('/categorys/'+id);
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
          thisIns.categorys = response.data.data.categorys.data
          thisIns.currentx = response.data.data.categorys.current_page
          thisIns.itemsPerPage = response.data.data.categorys.per_page
          thisIns.total = response.data.data.categorys.last_page
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
    exportToExcel() {
      import('@/vendor/Export2Excel').then(excel => {
        const list = this.selected
        const data = this.formatJson(this.headerVal, list)
        excel.export_json_to_excel({
          header: this.headerTitle,
          data,
          filename: this.fileName,
          autoWidth: this.cellAutoWidth,
          bookType: this.selectedFormat
        })
        this.clearFields()
      })
    },
    formatJson(filterVal, jsonData) {
      return jsonData.map(v => filterVal.map(j => {
        // Add col name which needs to be translated
        // if (j === 'timestamp') {
        //   return parseTime(v[j])
        // } else {
        //   return v[j]
        // }

        return v[j]
      }))
    },
    clearFields() {
      this.fileName = ""
      this.cellAutoWidth = true
      this.selectedFormat = "xlsx"
    }
  },
  watch:{
    currentx:{
      handler:function(value){
        this.$vs.loading()
        const thisIns = this;
        var rout_link = this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&search='+this.searchx:this.url+'?page='+value+'&search='+this.searchx
        if(this.$route.params.id){
          rout_link = this.url.indexOf('?') > -1 ?this.url+'&page='+value+'&parent_id='+this.$route.params.id+'&search='+this.searchx:this.url+'?page='+value+'&parent_id='+this.$route.params.id+'&search='+this.searchx
        }
        this.$http.get(rout_link)
          .then(function (response) {
            thisIns.categorys = response.data.data.categorys.data
            thisIns.currentx = response.data.data.categorys.current_page
            thisIns.itemsPerPage = response.data.data.categorys.per_page
            thisIns.total = response.data.data.categorys.last_page
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
        this.url = '/api/categorys?per_page='+itemsPerPage+'&search='+this.searchx
        if(this.$route.params.id){
          this.url = '/api/categorys?per_page='+itemsPerPage+'&parent_id='+this.$route.params.id+'&search='+this.searchx
        }
        this.$http.get(this.url)
          .then(function (response) {
            thisIns.categorys = response.data.data.categorys.data
            thisIns.currentx = response.data.data.categorys.current_page
            thisIns.itemsPerPage = response.data.data.categorys.per_page
            thisIns.total = response.data.data.categorys.last_page
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
    this.$http.get(this.$route.params.id ? this.url+'?parent_id='+this.$route.params.id : this.url)
      .then(function (response) {
        //console.log(response.data.data);
        thisIns.categorys = response.data.data.categorys.data
        thisIns.currentx = response.data.data.categorys.current_page
        thisIns.itemsPerPage = response.data.data.categorys.per_page
        thisIns.total = response.data.data.categorys.last_page
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

      this.$http.get('/api/all_category')
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
