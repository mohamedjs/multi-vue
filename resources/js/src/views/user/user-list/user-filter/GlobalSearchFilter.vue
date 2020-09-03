<template>
	<div class="vx-row">
		<div class="vx-col md:w-1/3 sm:w-1/2 w-full">
			<div class="vx-row">
				<div class="vx-col md:w-1/2 sm:w-1/2 w-full">
		          <label class="text-sm opacity-75">Search Key</label>
		          <v-select :options="globalSearchOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="globalSearchFilter" />
		      	</div>
		      	<div class="vx-col md:w-1/2 sm:w-1/2 w-full">
		          <vs-input icon-pack="feather" icon="icon-search" label-placeholder="Search-Value" v-model="search" class="is-label-placeholder w-full" />
		      	</div>
	      	</div>
	    </div>
	    <div class="vx-col md:w-1/3 sm:w-1/2 w-full">
	    	<div class="vx-row">
				<div class="vx-col md:w-1/2 sm:w-1/2 w-full">
			      <label class="text-sm">From</label>
			      <flat-pickr 
			        v-model="from" 
			        :config="dateConfig" 
			        @on-change="changeFromValue" 
			        class="w-full" />
		  		</div>
		  		<div class="vx-col md:w-1/2 sm:w-1/2 w-full">
			      <label class="text-sm">To</label>
			      <flat-pickr 
			        v-model="to" 
			        :config="dateConfig" 
			        @on-change="changeToValue" 
			        class="w-full" />
		  		</div>
			</div>
	    </div>
	    <div class="vx-col md:w-1/3 sm:w-1/2 w-full">
	      <label class="text-sm">Birth OF Date</label>
	      <flat-pickr 
	        v-model="bod" 
	        :config="dateConfig" 
	        @on-change="changeBodValue" 
	        class="w-full" />
	    </div>
	</div>
</template>

<script>
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import 'flatpickr/dist/flatpickr.css'
import 'flatpickr/dist/themes/airbnb.css';
// localization is optional
// import {Arabic} from 'flatpickr/dist/l10n/ar.js';

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
		    from: moment(new Date()).format('DD-MM-YYYY'),
		    to: moment(new Date()).format('DD-MM-YYYY'),
		    bod: moment(new Date()).format('DD-MM-YYYY'),
		   	dateConfig:{
	          dateFormat: 'd-m-Y',
	          weekNumbers: false, //show week number
	          monthSelectorType:'dropdown', //can be static
	          // maxDate:moment().format('d-m-Y'),
	          // minDate:'01-05-1991',
	          enableTime : false,
	          defaultDate:moment(new Date()).format('DD-MM-YYYY'),
	          // locale: Arabic, // locale for this instance only          
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
  		changeFromValue(selectedDates, dateStr, instance){
	      const payload = {key:'from', value:moment(dateStr).format("DD-MMMM-YYYY")}
	      this.$store.dispatch('user/setSearchKey',payload)
	    },
	    changeToValue(selectedDates, dateStr, instance){
	      const payload = {key:'to', value:moment(dateStr).format("DD-MMMM-YYYY")}
	      this.$store.dispatch('user/setSearchKey',payload)
	    },
	    changeBodValue(selectedDates, dateStr, instance){
	      const payload = {key:'bod', value:moment(dateStr).format("DD-MMMM-YYYY")}
	      this.$store.dispatch('user/setSearchKey',payload)
	    },
  	}
}
</script>