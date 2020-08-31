<template>
	 <vs-dropdown vs-trigger-click class="cursor-pointer mb-4 mr-4">
        <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
              <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ users.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : users.length }} of {{ users.length }}</span>
              <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
        </div>
        <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
        <vs-dropdown-menu>

          <vs-dropdown-item @click="setItemsPerPage(10)">
            <span>10</span>
          </vs-dropdown-item>
          <vs-dropdown-item @click="setItemsPerPage(25)">
            <span>25</span>
          </vs-dropdown-item>
          <vs-dropdown-item @click="setItemsPerPage(50)">
            <span>50</span>
          </vs-dropdown-item>
          <vs-dropdown-item @click="setItemsPerPage(100)">
            <span>100</span>
          </vs-dropdown-item>
        </vs-dropdown-menu>
    </vs-dropdown>
</template>

<script>
import { mapState } from 'vuex'
export default {
	computed: {
    ...mapState('user',['users', 'total', 'currentPage', 'itemsPerPage']),
  },
  methods: {
    setItemsPerPage(perPage) {
        const payload = {key:'per_page', value:perPage}
        this.$store.dispatch("user/setSearchKey",payload)
    }
  }
}
</script>