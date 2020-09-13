<!-- =========================================================================================
  File Name: UserForm.vue
  Description: User Form Page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="page-user-edit">

    <vs-alert color="danger" title="User Not Found" :active.sync="user_not_found">
      <span>User record with id: {{ $route.params.userId }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'app-user-list'}" class="text-inherit underline">All Users</router-link>
      </span>
    </vs-alert>

    <vx-card v-if="user">

      <div slot="no-body" class="tabs-container px-6 pt-6">

        <vs-tabs v-model="activeTab" class="tab-action-btn-fill-conatiner">
          <vs-tab label="Account" icon-pack="feather" icon="icon-user">
            <div class="tab-text">
              <user-form-tab-account class="mt-4" />
            </div>
          </vs-tab>
          <!-- <vs-tab label="Information" icon-pack="feather" icon="icon-info">
            <div class="tab-text">
              <user-edit-tab-information class="mt-4" />
            </div>
          </vs-tab> -->
          <!-- <vs-tab label="Social" icon-pack="feather" icon="icon-share-2">
            <div class="tab-text">
              <user-edit-tab-social class="mt-4" :data="user" />
            </div>
          </vs-tab> -->
        </vs-tabs>

      </div>

    </vx-card>
  </div>
</template>

<script>
import UserFormTabAccount     from "./UserFormTabAccount.vue"

// Store Module
import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'
import { mapState } from 'vuex'

export default {
  components: {
    UserFormTabAccount,
  },
  data() {
    return {
      user_not_found: false,
      activeTab: 0,
    }
  },
  computed: {
    ...mapState('user',['user']),
  },
  methods: {
    fetch_user(userId) {
      this.$store.dispatch("userManagement/fetchUser", userId)
        .then(res => { })
        .catch(err => {
          if(err.response.status === 404) {
            this.user_not_found = true
            return
          }
          console.error(err) })
    }
  },
  created() {
    // Register Module UserManagement Module
    if(!moduleUserManagement.isRegistered) {
      this.$store.registerModule('userManagement', moduleUserManagement)
      moduleUserManagement.isRegistered = true
    }
    if (this.$route.params.userId) {
      this.fetch_user(this.$route.params.userId)
    } else {
      this.$store.commit("userManagement/INIT_USER")
    }
    
  }
}

</script>
