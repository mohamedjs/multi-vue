<template>
  <vx-card no-shadow>
    <div class="flex flex-wrap items-center mb-base">
      <vs-avatar :src="$store.state.product.product.main_image" size="70px" class="mr-4 mb-4" />
      <div>
        <input type="file" class="hidden" ref="update_avatar_input" @change="update_avatar" accept="image/*">
        <vs-button class="mr-4 sm:mb-0 mb-2" @click="$refs.update_avatar_input.click()">Upload photo</vs-button>
        <p class="text-sm mt-2">Allowed JPG, GIF or PNG. Max size of 800kB</p>
      </div>
    </div>
    <vs-upload multiple :show-upload-button="false" text="Upload Gallery" class="img-upload" @on-delete = "deleteImage($event)"  ref="fileUpload"  @change="uploadGallerys()"  />
    <vs-button class="ml-auto mt-2" @click="showGallery()" >Show Image Gallery</vs-button>
  </vx-card>
</template>

<script>
export default {
  data() {
    return {
      old_password: "",
      new_password: "",
      confirm_new_password: "",
    }
  },
  computed: {
    activeUserInfo() {
      return this.$store.state.AppActiveUser
    },
  },
  methods: {
    uploadGallerys (){
      let files = this.$refs.fileUpload.$refs.fileInput.files;
       for (let i = 0; i < files.length; i++) {
         this.$emit('uploadGallery',files[i]);
       }
    },
    showGallery(){
      for (var i = 0; i < this.$store.state.product.product.gallery.length; i++) {
        this.$refs.fileUpload.srcs.push({src:this.$store.state.product.product.gallery[i].image , orientation:'m',type:'image',percent:null,error:false,remove:null})
      }
    },
    update_avatar(input) {
      var _this = this
      if (input.target.files && input.target.files[0]) {
        var reader = new FileReader()
        reader.onload = e => {
          this.$store.state.product.product.main_image = e.target.result
        }
        reader.readAsDataURL(input.target.files[0])
        this.$emit('uploadMimg',input.target.files[0]);
      }
    },
    deleteImage($event){
      console.log(this.$refs.fileUpload.srcs);
      console.log($event);
      console.log(this.itemRemove);
      var src = $event.src
      var form = new FormData()
      for (var i = 0; i < this.$store.state.product.product.gallery.length; i++) {
        if(this.$store.state.product.product.gallery[i].image === src){
          this.$http.post('/api/delete_image/'+ this.$store.state.product.product.gallery[i].id)
          .then(function (response){
              if(response.data.status === 'success')
              {
                _this.$vs.notify({
                  title:'Success',
                  text: response.data.message,
                  color:'success',
                  iconPack: 'feather',
                  icon:'icon-alert-circle'})
              }
              else
              {
                _this.$vs.notify({
                    title:'Error',
                    text: response.data.message,
                    color:'danger',
                    iconPack: 'feather',
                    icon:'icon-alert-circle'})
              }
            }).catch(function (error) {
              _this.$vs.notify({
                  title:'Error',
                  text: error,
                  color:'danger',
                  iconPack: 'feather',
                  icon:'icon-alert-circle'})
            });
        }
      }
    }
  }
}
</script>
