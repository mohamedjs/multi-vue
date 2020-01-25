<template>
  <vx-card no-shadow>

    <vs-input v-validate="'required'" label-placeholder="Meta Keyword" name="meta_keyword" v-model="$store.state.product.product.meta_keyword" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('meta_keyword')">{{ errors.first('meta_keyword') }}</span>
    <br>

    <vs-input v-validate="'required'" label-placeholder="Meta Title" name="meta_title" v-model="$store.state.product.product.meta_title" class="w-full" />
    <span class="text-danger text-sm" v-show="errors.has('meta_title')">{{ errors.first('meta_title') }}</span>
    <br>

    <quill-editor  v-model="$store.state.product.product.meta_description" style="height:100%"></quill-editor>
    <br>

  </vx-card>
</template>

<script>
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import { quillEditor } from 'vue-quill-editor'

export default {
  components: {
    quillEditor,
  },
}
</script>
