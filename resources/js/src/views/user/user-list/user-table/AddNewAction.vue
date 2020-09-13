<template>
	<div class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary" @click="addNew">
            <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
            <span class="ml-2 text-base text-primary">Add New</span>
    </div>
</template>

<script>
export default {
	methods: {
		addNew() {
			this.$router.push({ name: 'app-user-add' }).catch(() => {})
		}
	}
}
</script>