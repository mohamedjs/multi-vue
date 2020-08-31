<template>
  <div id="data-list-thumb-view" class="data-list-container">
    <vx-card ref="filterCard" title="Filters" class="user-list-filters mb-8">
      <div class="vx-row">
        <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">UserType</label>
          <v-select :options="user_typeOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="user_typeFilter" class="mb-4 md:mb-0" />
        </div>
        <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Status</label>
          <v-select :options="statusOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="statusFilter" class="mb-4 md:mb-0" />
        </div>
        <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Verified</label>
          <v-select :options="isVerifiedOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="isVerifiedFilter" class="mb-4 sm:mb-0" />
        </div>
        <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
          <label class="text-sm opacity-75">Gender</label>
          <v-select :options="genderOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="genderFilter" />
        </div>
      </div>
    </vx-card>
    <vs-table ref="table" multiple v-model="selected"  :data="users">
      <div slot="header" class="flex flex-wrap-reverse items-center flex-grow justify-between">

        <div class="flex flex-wrap-reverse items-center">

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

          <!-- ADD NEW -->
          <div class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary" @click="">
              <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
              <span class="ml-2 text-base text-primary">Add New</span>
          </div>
        </div>

        <div class="flex flex-wrap-reverse items-center">
          <!-- ITEMS PER PAGE -->
          <vs-dropdown vs-trigger-click class="cursor-pointer mb-4 mr-4">
            <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
              <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ users.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : users.length }} of {{ users.length }}</span>
              <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
            </div>
            <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
            <vs-dropdown-menu>

              <vs-dropdown-item @click="itemsPerPage=10">
                <span>10</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=25">
                <span>25</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=50">
                <span>50</span>
              </vs-dropdown-item>
              <vs-dropdown-item @click="itemsPerPage=100">
                <span>100</span>
              </vs-dropdown-item>
            </vs-dropdown-menu>
          </vs-dropdown>
          <!-- Search Input -->
          <div class="con-input-search vs-table--search cursor-pointer">
            <input v-model="searchx" @keyup="handleSearch" class="input-search vs-table--search-input" type="text">
            <vs-icon icon="search"></vs-icon>
          </div>
        </div>

      </div>
      <template slot="thead">
        <vs-th>#</vs-th>
        <vs-th v-for = "(column, index) in columns" :key="index" :sort-key="column">{{column}}</vs-th>
        <vs-th>Action</vs-th>
      </template>
      <template slot-scope="{data}">
        <tbody>
          <vs-tr :data="user" :key="indexuser" v-for="(user, indexuser) in data">
            <vs-td>{{ indexuser+1 }}</vs-td>
            <template v-for="(column, index) in columns">
              <vs-chip :key="index" v-if="column == 'status'" class="ag-grid-cell-chip" :color="chipColor(user[column])">
                <span>{{ user[column] }}</span>
              </vs-chip>
              <vs-td :key="index" v-else-if="column == 'verified'">
                <feather-icon icon="CircleIcon" :svgClasses="['fill-current h-4 w-4', textColor(user['email_verified_at'])]" />
              </vs-td>
              <vs-td :key="index" v-else>
                <p class="product-name font-medium">{{ user[column] }}</p>
              </vs-td>
            </template>
            <vs-td>
              <div class="demo-alignment">
                <vx-tooltip color="success" text="Edit Language">
                  <vs-button color="success" @click="edit(user.id)" type="border" icon-pack="feather" icon="icon-edit"></vs-button>
                </vx-tooltip>
                <vx-tooltip color="danger" text="Delete Language">
                  <vs-button color="danger" @click="delete(user.id)" type="border" icon-pack="feather" icon="icon-trash"></vs-button>
                </vx-tooltip>
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
import vSelect from 'vue-select'

export default {
  components: {
    vSelect
  },
  data() {
    return {
      user_typeFilter: { label: 'All', value: 'all' },
      user_typeOptions: [
        { label: 'All', value: 'all' },
        { label: 'Admin', value: 'admin' },
        { label: 'User', value: 'user' },
        { label: 'Staff', value: 'staff' },
      ],

      statusFilter: { label: 'All', value: 'all' },
      statusOptions: [
        { label: 'All', value: 'all' },
        { label: 'Active', value: 'active' },
        { label: 'Deactivated', value: 'deactivated' },
        { label: 'Blocked', value: 'blocked' },
      ],

      isVerifiedFilter: { label: 'All', value: 'all' },
      isVerifiedOptions: [
        { label: 'All', value: 'all' },
        { label: 'Yes', value: 'yes' },
        { label: 'No', value: 'no' },
      ],

      genderFilter: { label: 'All', value: 'all' },
      genderOptions: [
        { label: 'All', value: 'all' },
        { label: 'Male', value: 'male' },
        { label: 'Female', value: 'female' },
      ],

      selected: [],
      columns:{'Name':'name', 'Email':'email', 'Phone':'phone', 'UserName':'user_name', 'Status':'status', 'Gender':'gender', 'UserType':'user_type', 'IsVerified':'verified'},
      searchable:['name', 'email'],
      currentx:1,
      searchx:'',
      itemsPerPage: 4,
      total:1,
      isMounted: false,
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
    ...mapState('user',['users']),
  },
  methods: {
    deleteAll() {
      let result = this.selected.map(a => a.id);
      const payload = {
        'ids' : result,
        'table' : 'users'
      };
    },
    handleSearch() {

    }
  },
  watch:{
    currentx:{
      handler:function(value){
      
      }
    },
    itemsPerPage:{
      handler:function(itemsPerPage){
      
      }
    },
  },
  created() {
    this.$store.dispatch("user/fetchUsers")
    .then(result => { console.log(result) })
    .catch(err => { console.log(err) })
  },
  mounted() {
    this.isMounted = true;
  }
}
</script>

<style lang="scss">
#data-list-thumb-view {
  .vs-con-table {

    .vs-table--header {
      display: flex;
      flex-wrap: wrap-reverse;
      margin-left: 1.5rem;
      margin-right: 1.5rem;
      > span {
        display: flex;
        flex-grow: 1;
      }

      .vs-table--search{
        padding-top: 0;

        .vs-table--search-input {
          padding: 0.9rem 2.5rem;
          font-size: 1rem;

          &+i {
            left: 1rem;
          }

          &:focus+i {
            left: 1rem;
          }
        }
      }
    }

    .vs-table {
      border-collapse: separate;
      border-spacing: 0 1.3rem;
      padding: 0 1rem;


      user{
          box-shadow: 0 4px 20px 0 rgba(0,0,0,.05);
          td{
            padding: 10px;
            &:first-child{
              border-top-left-radius: .5rem;
              border-bottom-left-radius: .5rem;
            }
            &:last-child{
              border-top-right-radius: .5rem;
              border-bottom-right-radius: .5rem;
            }
            &.img-container {
              // width: 1rem;
              // background: #fff;

              span {
                display: flex;
                justify-content: center;
              }

              .product-img {
                height: 110px;
              }
            }
          }
          td.td-check{
            padding: 20px !important;
          }
      }
    }

    .vs-table--thead{
      th {
        padding-top: 0;
        padding-bottom: 0;

        .vs-table-text{
          text-useransform: uppercase;
          font-weight: 600;
        }
      }
      th.td-check{
        padding: 0 15px !important;
      }
      user{
        background: none;
        box-shadow: none;
      }
    }

    .vs-table--pagination {
      justify-content: center;
    }
  }
}
</style>
