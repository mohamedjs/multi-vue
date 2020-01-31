<template>
  <div>
    <server-error v-show="errorActive" :alertActi="er_active" :data="SError" />
    <vs-tabs v-model="activeTab"  :position="isSmallerScreen ? 'top' : 'left'" class="tabs-shadow-none" id="profile-tabs" :key="isSmallerScreen">
      <!-- GENERAL -->
      <vs-tab icon-pack="feather" icon="icon-info"  :label="!isSmallerScreen ? 'General Info' : ''">
        <div class="tab-general md:ml-4 md:mt-0 mt-4 ml-0">
          <product-general-info  />
        </div>
      </vs-tab>
      <vs-tab icon-pack="feather" icon="icon-info"  :label="!isSmallerScreen ? 'Gallery' : ''">
        <div class="tab-change-pwd md:ml-4 md:mt-0 mt-4 ml-0">
          <product-images @uploadMimg="uploadMimg" @uploadGallery = "uploadGallery" />
        </div>
      </vs-tab>
      <vs-tab icon-pack="feather" icon="icon-info" :label="!isSmallerScreen ? 'Prices' : ''">
        <div class="tab-info md:ml-4 md:mt-0 mt-4 ml-0">
          <product-prices />
        </div>
      </vs-tab>
      <vs-tab icon-pack="feather" icon="icon-info" :label="!isSmallerScreen ? 'Meta Data' : ''">
        <div class="tab-social-links md:ml-4 md:mt-0 mt-4 ml-0">
          <product-meta/>
        </div>
      </vs-tab>
    </vs-tabs>
    <!-- Save & Reset Button -->
    <div class="flex flex-wrap items-center justify-end">
        <vs-button class="ml-auto mt-2" @click="saveChange()" >Save Changes</vs-button>
        <vs-button class="ml-4 mt-2" type="border" color="warning">Reset</vs-button>
      </div>

  </div>
</template>

<script>
import ProductGeneralInfo from "./ProductGeneralInfo.vue"
import ProductImages from "./ProductImages.vue"
import ProductMeta from "./ProductMeta.vue"
import ProductPrices from "./ProductPrices.vue"
import ServerError from '@/views/ServerError.vue'
export default {
  components: {
    ProductGeneralInfo,
    ProductImages,
    ProductMeta,
    ProductPrices,
    ServerError
  },
  data() {
    return {
      activeTab: 0,
      SError:[],
      options:[],
      errorActive:false,
      er_active:false,
      data : new FormData(),
      product : ['title','price','special_price_type','special_price','description','short_description','special_price_end','special_price_start',
                'meta_keyword','meta_title','meta_description','sku','stock','min_stock']
    }
  },
  watch: {
    activeTab() {
      if(this.$route.params.productId){
        //this.fetch_product_data(this.$route.params.productId)
      }
    }
  },
  methods: {
    fetch_product_data(productId) {
      this.$store.dispatch("product/fetchProduct", productId)
      .catch(err => { console.error(err) })
    },
    reset_product_data() {
      this.$store.dispatch("product/resetProduct")
      .catch(err => { console.error(err) })
    },
    saveChange(){
      this.data.append('brand_id',this.$store.state.product.product.brand_id.id)
      this.data.append('category_id',this.$store.state.product.product.category_id.id)
      this.data.append('special',this.$store.state.product.product.special ? 1:0)
      this.data.append('active',this.$store.state.product.product.active ? 1:0)
      var _this = this
      var id = ''
      for (var key in this.$store.state.product.product ) {
          if(this.product.includes(key))
              this.data.append(key, this.$store.state.product.product[key]);
      }
      if(this.$route.params.productId){
        id = this.$route.params.productId
        this.data.append('_method' , 'patch')
      }
      this.$http.post('/api/products/'+ id,this.data)
      .then(function (response){
          _this.er_active   = false
          _this.errorActive = false
          _this.SError=[]
          _this.$vs.notify({
            title:'Success',
            text: response.data.status,
            color:'success',
            iconPack: 'feather',
            icon:'icon-alert-circle'})
            _this.alertActive= true
            _this.alertSuccess = response.data.message
            _this.reset_product_data()
            _this.$router.push({name : 'products'})
        }).catch(function (error) {
          if(error.response.status == 422)
          {
            _this.SError=[]
            for (const [key, value] of Object.entries(error.response.data.errors)) {
                _this.SError.push(value)
            }
            _this.$vs.notify({
                title:'Error',
                text: error.response.data.message,
                color:'danger',
                iconPack: 'feather',
                icon:'icon-alert-circle'})
            _this.er_active = true
            _this.errorActive=true
          }
          _this.$vs.notify({
              title:'Error',
              text: error,
              color:'danger',
              iconPack: 'feather',
              icon:'icon-alert-circle'})
        });
    },
    uploadMimg(file){
      this.data.append('main_image' , file)
    },
    uploadGallery(file){
      this.data.append('images[]' , file)
    }
  },
  computed: {
    isSmallerScreen() {
      return this.$store.state.windowWidth < 768
    }
  },
  created(){
    if(this.$route.params.productId){
      this.fetch_product_data(this.$route.params.productId)
    }
    else{
      this.reset_product_data()
    }
  },
  mounted() {
    if(this.$route.params.productId){
      this.fetch_product_data(this.$route.params.productId)
    }
    else{
      this.reset_product_data()
    }

  }
}
</script>

<style lang="scss">
#profile-tabs {
  .vs-tabs--content {
    padding: 0;
  }
}
</style>
