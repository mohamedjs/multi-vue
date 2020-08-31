<template>
	<div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">UserType</label>
          <v-select :options="user_typeOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="user_typeFilter" class="mb-4 md:mb-0" />
    </div>
</template>

<script>
import vSelect from 'vue-select'

export default {
	components: {
	    vSelect
	},
	data() {
		return {
			user_typeFilter: { label: 'All', value: 'all' },
		    user_typeOptions: [
		        { label: 'All', value: 'all' },
		        { label: 'Admin', value: 'admin' },
		        { label: 'User', value: 'user' },
		        { label: 'Staff', value: 'staff' },
		    ],
		}
	}
}
</script>