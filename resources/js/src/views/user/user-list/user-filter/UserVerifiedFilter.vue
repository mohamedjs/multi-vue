<template>
	<div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Verified</label>
          <v-select :options="isVerifiedOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="isVerifiedFilter" class="mb-4 sm:mb-0" />
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
			isVerifiedFilter: { label: 'All', value: 'all' },
		    isVerifiedOptions: [
		        { label: 'All', value: 'all' },
		        { label: 'Yes', value: 'yes' },
		        { label: 'No', value: 'no' },
		    ],
		}
	}
}
</script>