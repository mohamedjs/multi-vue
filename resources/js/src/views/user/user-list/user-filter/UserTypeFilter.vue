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
			user_typeFilter: { label: 'All', value: '' },
		    user_typeOptions: [
		        { label: 'All', value: '' },
		        { label: 'SUPERADMIN', value: 1 },
		        { label: 'ADMIN', value: 2  },
		        { label: 'STAFF', value: 3  },
		        { label: 'CLIENT', value: 4 },
		    ],
		}
	},
	watch:{
	    user_typeFilter:{
	      handler:function(type){
	      	// set search key in search state value 
	      	const payload = {key:'user_type', value:type.value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
}
</script>