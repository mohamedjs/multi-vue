<!-- =========================================================================================
    File Name: AlertClosable.vue
    Description: Create closable alert
    ----------------------------------------------------------------------------------------
    Item Name: Vuesax Admin - VueJS Dashboard Admin Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vs-alert color="danger" style="height:auto" :title="msg" v-show="alertActi" @click="alertActi=false" closable icon-pack="feather"  close-icon="icon-x-circle">
        <vs-list>
            <vs-list-item v-for="(tr, indextr) in data" :key="indextr" :title="tr.toString()"></vs-list-item>
        </vs-list>
    </vs-alert>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
    export default{
      components: {
        VuePerfectScrollbar,
      },
      props: ['data','alertActi'],
      data() {
            return {
              msg:'Server Error'
            }
        },
    }
</script>
