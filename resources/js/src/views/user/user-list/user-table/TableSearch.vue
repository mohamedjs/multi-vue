<template>
	<div class="con-input-search vs-table--search cursor-pointer">
            <input v-model="searchx" @keyup="handleSearch" class="input-search vs-table--search-input" type="text">
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
	methods: {
		handleSearch() {

		}
	}
}
</script>