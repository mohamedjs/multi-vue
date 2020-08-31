<template>
	 <vx-card ref="filterCard" title="Filters" class="user-list-filters mb-8">
      <div class="vx-row">
        <user-type-filter></user-type-filter>
       	<user-status-filter></user-status-filter>
        <user-verified-filter></user-verified-filter>
        <user-gender-filter></user-gender-filter>
      </div>
    </vx-card>
</template>

<script>
import UserTypeFilter from './UserTypeFilter.vue' 
import UserStatusFilter from './UserStatusFilter.vue' 
import UserVerifiedFilter from './UserVerifiedFilter.vue' 
import UserGenderFilter from './UserGenderFilter.vue' 

export default {
	components: {
	    UserTypeFilter,
	    UserStatusFilter,
	    UserVerifiedFilter,
	    UserGenderFilter
	}, 
}
</script>