<template>
	<div class="vx-col mt-1 md:w-1/4 sm:w-1/2 w-full">
	  <br>
      <vx-tooltip color="success" text="Reset Search">
              <vs-button color="success" @click="resetSearch()" type="border"> Reset </vs-button>
       </vx-tooltip>
    </div>
</template>

<script>

export default {
	data() {
		return {

		}
	},
	methods:{
		resetSearch() {
			// init user search to set all null
    		this.$store.commit("user/INIT_SEARCH")
		}
	}
}
</script>