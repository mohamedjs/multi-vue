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
			genderFilter: { label: 'All', value: 'All' },
		    genderOptions: [
		        { label: 'All', value: 'All' },
		        { label: 'Male', value: 1 },
		        { label: 'Female', value: 2 },
		    ],
		}
	},
	watch:{
	    genderFilter:{
	      handler:function(gender){
	      	// set search key in search state value 
	      	if(gender.value === 'All') { 
		      	const payload = {key:'gender', value:''}
	        	this.$store.dispatch("user/emptySpecificSearchKey",payload)
	      	} else {
	      		const payload = {key:'gender', value:gender.value}
	        	this.$store.dispatch("user/setSearchKey",payload)
	      	}

	      }
    	},
  	},
}
</script>