<template>
          <!-- ACTION - DROPDOWN -->
    <vs-dropdown vs-trigger-click class="cursor-pointer mr-4 mb-4">

        <div class="p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32">
          <span class="mr-2">Actions</span>
          <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
        </div>

        <vs-dropdown-menu>

	        <vs-dropdown-item>
	            <span class="flex items-center justify-center w-full">
	              <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-danger stroke-current" />
	              <span @click="deleteAll()">Delete</span>
	         	</span>
	        </vs-dropdown-item>

	        <vs-dropdown-item>
	            <span>Print</span>
	        </vs-dropdown-item>
	        
        </vs-dropdown-menu>

    </vs-dropdown>

</template>

<script>
export default {
	props: ['selected'],
	methods: {
		deleteAll() {
			console.log(this.selected)
		}
	}
}
</script>