<template>
	<div class="vx-row">
		<div class="vx-col md:w-1/3 sm:w-1/2 w-full">
	          <label class="text-sm opacity-75">Search Key</label>
	          <v-select :options="globalSearchOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="globalSearchFilter" />
	    </div>
	    <div class="vx-col md:w-1/3 sm:w-1/2 w-full">
	    	<div class="con-input-search vs-table--search cursor-pointer">
		        <vs-input class="w-full mt-4" label="search" v-model="aearch"  />
		        <vs-icon icon="search"></vs-icon>
	    	</div>
	    </div>
	    <div class="vx-col md:w-1/3 sm:w-1/2 w-full">
	      <label class="text-sm">Date</label>
	      <flat-pickr 
	        v-model="date" 
	        :config="dateConfig" 
	        @on-change="changeDateValue" 
	        class="w-full" />
	      <span class="text-danger text-sm">{{ errors.first('dob') }}</span>
	    </div>
	</div>
</template>

<script>
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'

export default {
	components: {
	    vSelect,
	    flatPickr
	},
	data() {
		return {
			globalSearchFilter: { label: 'All', value: '' },
			search:'',
		    globalSearchOptions: [
		        { label: 'All', value: '' },
		        { label: 'Name', value: 'name'},
		        { label: 'Email', value: 'email' },
		        { label: 'UserName', value: 'user_name' },
		        { label: 'Phone', value: 'phone' },
		    ],
		    date: moment().format('d-m-Y'),
		   	dateConfig:{
	          dateFormat: 'd F Y',
	          weekNumbers:true, //show week number
	          monthSelectorType:'dropdown', //can be static
	          // maxDate:moment().format('d-m-Y'),
	          // minDate:'01-05-1991',
	          enableTime : false,
	          defaultDate:moment().format('d-m-Y'),
      		}
		}
	},
	watch:{
	    search:{
	      handler:function(value){
	      	// set search key in search state value 
	      	const payload = {key:this.globalSearchFilter.value, value:value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
  	methods: {
  		changeDateValue(selectedDates, dateStr, instance){
	      const payload = {key:'created_at', value:moment(dateStr).format("d M Y")}
	      this.$store.dispatch('user/setSearchKey',payload)
	    },
  	}
}
</script>