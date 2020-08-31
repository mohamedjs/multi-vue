<template>
	<div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Gender</label>
          <v-select :options="genderOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="genderFilter" />
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
			genderFilter: { label: 'All', value: 'all' },
		    genderOptions: [
		        { label: 'All', value: 'all' },
		        { label: 'Male', value: 'male' },
		        { label: 'Female', value: 'female' },
		    ],
		}
	}
}
</script>