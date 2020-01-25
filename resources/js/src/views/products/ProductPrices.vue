<template>
  <vx-card no-shadow>

    <vs-input v-validate="'required'" label-placeholder="Price" name="price" v-model="$store.state.product.product.price" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('price')">{{ errors.first('price') }}</span>
    <br>

    <div class="mt-4">
      <label class="text-sm">Special Price Type</label>
      <div class="mt-2">
        <vs-radio v-model="$store.state.product.product.special_price_type" vs-value="1" class="mr-4">Static</vs-radio>
        <vs-radio v-model="$store.state.product.product.special_price_type" vs-value="2" class="mr-4">Ratio</vs-radio>
      </div>
    </div>
    <br>

    <vs-input v-validate="'required'" label-placeholder="Special Price" name="special_price" v-model="$store.state.product.product.special_price" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('special_price')">{{ errors.first('special_price') }}</span>
    <br>


    <div class="mt-4">
      <label class="text-sm">Special Price Start</label>
      <flat-pickr v-model="$store.state.product.product.special_price_start" :config="{ dateFormat: 'Y-m-d', maxDate: new Date() }" class="w-full" v-validate="'required'" name="price_start" />
      <span class="text-danger text-sm"  v-show="errors.has('price_start')">{{ errors.first('price_start') }}</span>
    </div>
    <br>

    <div class="mt-4">
      <label class="text-sm">Special Price End</label>
      <flat-pickr v-model="$store.state.product.product.special_price_end"  :config="{ dateFormat: 'Y-m-d', maxDate: new Date() }" class="w-full" v-validate="'required'" name="special_price_end" />
      <span class="text-danger text-sm"  v-show="errors.has('special_price_end')">{{ errors.first('special_price_end') }}</span>
    </div>

  </vx-card>
</template>

<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import { quillEditor } from 'vue-quill-editor'
export default {
  data() {
    return {

    }
  },
  computed: {
    activeUserInfo() {
      return this.$store.state.AppActiveUser
    },
  },
  components: {
    quillEditor,
    flatPickr
  }
}
</script>
