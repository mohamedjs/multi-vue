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
			genderFilter: { label: 'All', value: '' },
		    genderOptions: [
		        { label: 'All', value: '' },
		        { label: 'Male', value: 1 },
		        { label: 'Female', value: 2 },
		    ],
		}
	},
	watch:{
	    genderFilter:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:'global_search', value:value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
}
</script>