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
			isVerifiedFilter: { label: 'All', value: '' },
		    isVerifiedOptions: [
		        { label: 'All', value: '' },
		        { label: 'Yes', value: 1 },
		        { label: 'No', value: 2 },
		    ],
		}
	},
	watch:{
	    isVerifiedFilter:{
	      handler:function(verified){
	      	// set search key in search state value 
	      	if(verified.value == 2) { verified.value = 0 }
	      	const payload = {key:'email_verified_at', value:verified.value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
}
</script>