<template>
	<div>
		<vs-table ref="table" multiple v-model="selected"  :data="users">
		    <div slot="header" class="flex flex-wrap-reverse items-center flex-grow justify-between">
		        <div class="flex flex-wrap-reverse items-center">
		          <!-- ACTION - DROPDOWN -->
		          <table-action :selected="selected"></table-action>

		          <!-- ADD NEW -->
		          <add-new-action></add-new-action>
		        </div>

		        <div class="flex flex-wrap-reverse items-center">
		          <!-- Item Per Page -->
		          <item-per-page></item-per-page>

		          <!-- Search Input -->
		          <table-search></table-search>
		        </div>
		    </div>
		    <template slot="thead">
		        <vs-th>#</vs-th>
		        <vs-th v-for = "(column, index) in columns" :key="index" :sort-key="column">{{index}}</vs-th>
		        <vs-th>Action</vs-th>
		    </template>
		    <template slot-scope="{data}">
		        <tbody>
		          <vs-tr :data="user" :key="indexuser" v-for="(user, indexuser) in data">
		            <vs-td>{{ indexuser+1 }}</vs-td>
		            <template v-for="(column, index) in columns">
			          <vs-td :key="index" v-if="column == 'status'">
			              <vs-chip  class="ag-grid-cell-chip" :color="chipColor(user[column])">
			                <span>{{ user[column] }}</span>
			              </vs-chip>
			          </vs-td>
		              <vs-td :key="index" v-else-if="column == 'verified'">
		              	<feather-icon icon="CircleIcon" :svgClasses="['fill-current h-4 w-4', textColor(user['email_verified_at'])]" />
		              </vs-td>
		              <vs-td :key="index" v-else-if="column == 'name'">
		              	<router-link :to="{name:'app-user-view', params:{userId: user.id} }" >
		              		<vs-chip  class="w-full" color="success">
						        <vs-avatar :src="user.image"/>
						        {{ user[column] }}
						    </vs-chip >
		                </router-link>
		              </vs-td>
		              <vs-td :key="index" v-else>
		                <p class="product-name font-medium">{{ user[column] }}</p>
		              </vs-td>
		            </template>
		            <vs-td>
		           		<div :style="{'direction': $vs.rtl ? 'rtl' : 'ltr'}">
					      <feather-icon icon="Edit3Icon" svgClasses="h-5 w-5 mr-4 hover:text-primary cursor-pointer" @click="editRecord(user.id)" />
					      <feather-icon icon="Trash2Icon" svgClasses="h-5 w-5 hover:text-danger cursor-pointer" @click="confirmDeleteRecord(user)" />
					    </div>
		          	</vs-td>
		          </vs-tr>
		        </tbody>
		     </template>
	    </vs-table>
	   	<div class="mt-5">
	         <vs-pagination :total="total" v-model="currentx" goto></vs-pagination>
	   	</div>
    </div>
</template>

<script>
import { mapState } from 'vuex'

import TableAction from './TableAction.vue'
import ItemPerPage from './ItemPerPage.vue'
import TableSearch from './TableSearch.vue'
import UserAction from './UserAction.vue'
import AddNewAction from './AddNewAction.vue'

export default {
	components: {
	    TableAction,
	    ItemPerPage,
	    TableSearch,
	    UserAction,
	    AddNewAction
	}, 
 	data() {
	    return {
			currentx: 1,
			selected:[],
	      	columns:{'Name':'name', 'Email':'email', 'Phone':'phone', 'UserName':'user_name', 'Status':'status', 'Gender':'gender', 'UserType':'user_type', 'IsVerified':'verified'},
	    }
	},
	computed: {
		chipColor() {
	      return (value) => {
	        if(value === "active") return "success"
	        else if(value === "disabled") return "danger"
	        else "primary"
	      }
	    },
	    textColor() {
	      return (value) => {
	        value ? "text-primary" : "text-grey"
	      } 
	    },
	    currentPage() {
	      if(this.isMounted) {
	        return this.$refs.table.currentx
	      }
	      return 0
	    },
		...mapState('user',['users', 'total', 'currentPage', 'itemsPerPage', 'search']),
	},
	watch:{
	    currentx:{
	      handler:function(value){
	      	const payload = {key:'page', value:value}
        	this.$store.dispatch("user/setSearchKey",payload)
	      }
    	},
  	},
  	methods: {
  		 editRecord(userId) {
              this.$router.push({ name: 'app-user-edit', params: { userId: userId } }).catch(() => {})
          },
          confirmDeleteRecord(user) {
            this.$vs.dialog({
              type: 'confirm',
              color: 'danger',
              title: `Confirm Delete`,
              text: `You are about to delete "${user.name}"`,
              accept: this.deleteRecord(user.id),
              acceptText: "Delete"
            })
          },
          deleteRecord(userId) {
            /* UnComment below lines for enabling true flow if deleting user */
            this.$store.dispatch("user/removeRecord", userId)
            .then(result => { this.showDeleteSuccess() })
    		.catch(err => { console.log(err) })
          },
          showDeleteSuccess() {
            this.$vs.notify({
              color: 'success',
              title: 'User Deleted',
              text: 'The selected user was successfully deleted'
            })
          }
  	}
}
</script>