<template>
  <vx-card no-shadow>

    <vs-input v-validate="'required'" label-placeholder="Product Title" name="title" v-model="$store.state.product.product.title" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('title')">{{ errors.first('title') }}</span>
    <br>

    <label for="country">Category</label>
    <v-select v-model="$store.state.product.product.category_id" v-validate="'required'" name="category_id" :options="categoryOptions"></v-select>
    <span class="text-danger text-sm" v-show="errors.has('category_id')">{{ errors.first('category_id') }}</span>
    <br>

    <label for="country">Brand</label>
    <v-select v-model="$store.state.product.product.brand_id" v-validate="'required'" name="brand_id" :options="brandOptions"></v-select>
    <span class="text-danger text-sm" v-show="errors.has('brand_id')">{{ errors.first('brand_id') }}</span>
    <br>
    
    <vs-input v-validate="'required'" label-placeholder="Sku" name="sku" v-model="$store.state.product.product.sku" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('sku')">{{ errors.first('sku') }}</span>
    <br>

    <label for="number">Stock</label>
    <vs-input-number v-validate="'required|min:1'" id="stock" name="stock" v-model="$store.state.product.product.stock" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('stock')">{{ errors.first('stock') }}</span>
    <br>

    <label for="number">Min Stock</label>
    <vs-input-number v-validate="'required|min:1|max:100'" id="min_stock" name="min_stock" v-model="$store.state.product.product.min_stock" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('min_stock')">{{ errors.first('min_stock') }}</span>
    <br>

    <quill-editor  v-model="$store.state.product.product.description" style="height:100%"></quill-editor>
    <br>

    <quill-editor  v-model="$store.state.product.product.short_description" style="height:100%"></quill-editor>
    <br>

    <label for="number">Special</label>
    <vs-switch v-model='$store.state.product.product.special' />
    <label for="number">Active</label>
    <vs-switch v-model='$store.state.product.product.active' />
  </vx-card>
</template>

<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import vSelect from 'vue-select'
import { quillEditor } from 'vue-quill-editor'
export default {
  data() {
    return {
      data_local      : this.$store.state.product.product,
      categoryOptions : [],
      brandOptions    : []
    }
  },
  computed: {
    activeUserInfo() {
      return this.$store.state.AppActiveUser
    },
  },
  mounted() {
    this.$store.dispatch('fetchCategory')
    .then(res => { this.categoryOptions = res.data })
    .catch(err => { console.error(err) })

    this.$store.dispatch('fetchBrand')
    .then(res => { this.brandOptions = res.data })
    .catch(err => { console.error(err) })

  },
  components: {
    'v-select': vSelect,
    quillEditor,
  }
}
</script>
