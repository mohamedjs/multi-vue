<template>
  <div class="the-navbar__user-meta flex items-center" v-if="user.user_name">

    <div class="text-right leading-tight hidden sm:block">
      <p class="font-semibold">{{ user.user_name }}</p>
      <small>Available</small>
    </div>

    <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">

      <div class="con-img ml-3">
        <img v-if="user.image" key="onlineImg" :src="user.image" alt="user-img" width="40" height="40" class="rounded-full shadow-md cursor-pointer block" />
      </div>

      <vs-dropdown-menu class="vx-navbar-dropdown">
        <ul style="min-width: 9rem">

          <li
            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
            @click="$router.push('/profile').catch(() => {})">
            <feather-icon icon="UserIcon" svgClasses="w-4 h-4" />
            <span class="ml-2">Profile</span>
          </li>

          <vs-divider class="m-1" />

          <li
            class="flex py-2 px-4 cursor-pointer hover:bg-primary hover:text-white"
            @click="logout">
            <feather-icon icon="LogOutIcon" svgClasses="w-4 h-4" />
            <span class="ml-2">Logout</span>
          </li>
        </ul>
      </vs-dropdown-menu>
    </vs-dropdown>
  </div>
</template>

<script>
// in full builds helpers are exposed as Vuex.mapState
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState('auth',['user'])
  },
  methods: {
    logout() {
        //this.$acl.change('admin')
        localStorage.removeItem('userInfo')

        // logut out foreget token 
        this.$store.dispatch('auth/logOut')
        .then(() => { 
          this.$vs.notify({
              title:'Success',
              text: 'LogOut Succes!',
              color:'success',
              iconPack: 'feather',
              icon:'icon-alert-circle'
          })
        })

        // This is just for demo Purpose. If user clicks on logout -> redirect
        this.$router.push('/login').catch(() => {})
    },
  }
}
</script>
