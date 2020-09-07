<template>
	<div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Status</label>
          <v-select :options="statusOptions" :clearable="false"  :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="statusFilter" class="mb-4 md:mb-0" />
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
			statusFilter: { label: 'All', value: 'All' },
		    statusOptions: [
		        { label: 'All', value: 'All' },
		        { label: 'Active', value: 1},
		        { label: 'Deactivated', value: 2 },
		    ],
		}
	},
	watch:{
	    statusFilter:{
	      handler:function(status){
	      	// set search key in search state value 
	      	if(status.value === 'All') { 
		      	const payload = {key:'status', value:''}
	        	this.$store.dispatch("user/emptySpecificSearchKey",payload)
	      	} else {
	      		const payload = {key:'status', value:status.value}
        		this.$store.dispatch("user/setSearchKey",payload)
	      	}
	      	
	      }
    	},
  	},
}
</script>