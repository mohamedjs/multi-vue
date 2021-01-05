<template>
	 <vx-card ref="filterCard" title="Filters" class="user-list-filters mb-8">
	 <global-search-filter></global-search-filter>
      <div class="vx-row">
        <user-type-filter></user-type-filter>
       	<user-status-filter></user-status-filter>
        <user-verified-filter></user-verified-filter>
        <user-gender-filter></user-gender-filter>
        <init-search></init-search>
      </div>
    </vx-card>
</template>

<script>
import GlobalSearchFilter from './GlobalSearchFilter.vue' 
import UserTypeFilter from './UserTypeFilter.vue' 
import UserStatusFilter from './UserStatusFilter.vue' 
import UserVerifiedFilter from './UserVerifiedFilter.vue' 
import UserGenderFilter from './UserGenderFilter.vue'
import InitSearch from './InitSearch.vue'

export default {
	components: {
	    UserTypeFilter,
	    UserStatusFilter,
	    UserVerifiedFilter,
	    GlobalSearchFilter,
	    UserGenderFilter,
	    InitSearch
	},
}
</script>