<template>
	<div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Status</label>
          <v-select :options="statusOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="statusFilter" class="mb-4 md:mb-0" />
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
			statusFilter: { label: 'All', value: 'all' },
		    statusOptions: [
		        { label: 'All', value: 'all' },
		        { label: 'Active', value: 'active' },
		        { label: 'Deactivated', value: 'deactivated' },
		        { label: 'Blocked', value: 'blocked' },
		    ],
		}
	}
}
</script>