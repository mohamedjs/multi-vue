<template>
  <div id="data-list-thumb-view" class="data-list-container">
    <user-filter></user-filter>
    <user-table></user-table>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import UserFilter from './user-filter/UserFilter.vue'
import UserTable from './user-table/UserTable.vue'

export default {
  components: {
    UserTable,
    UserFilter
  },
  data() {
    return {
      isMounted: false,
    }
  },
  computed: {
    ...mapState('user',['users']),
  },
  methods: {

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
