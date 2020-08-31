<template>
	<div class="con-input-search vs-table--search cursor-pointer">
            <input v-model="searchx" class="input-search vs-table--search-input" type="text">
            <vs-icon icon="search"></vs-icon>
    </div>
</template>
<script>
export default {
	data() {
		return {
			searchx: ''
		}
	},
	watch:{
	    searchx:{
	      handler:function(value){
	      	const payload = {key:'global_search', value:value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
}
</script>