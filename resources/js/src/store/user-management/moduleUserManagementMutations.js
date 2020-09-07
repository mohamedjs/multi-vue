/*=========================================================================================
  File Name: moduleCalendarMutations.js
  Description: Calendar Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default {
  SET_USERS(state, data) {
    state.users = data.users
    state.total = data.total_pages
    state.currentPage = data.current_page
    state.itemsPerPage = data.per_page
  },

  SET_USER(state, user) {
    state.user = user
  },

  REMOVE_RECORD(state, itemId) {
    const userIndex = state.users.findIndex((u) => u.id == itemId)
    state.users.splice(userIndex, 1)
  },  

  REMOVE_MULTI_RECORD(state, itemId) {
    let itemIds = itemId.split(',')
    for (var i = itemIds.length - 1; i >= 0; i--) {
      const userIndex = state.users.findIndex((u) => u.id == itemIds[i])
      state.users.splice(userIndex, 1)
    }
  },

  SET_SEARCH_KEY(state, search) {
    state.search[search.key] = search.value
  },

  INIT_SEARCH(state) {
    for (var i = state.search.length - 1; i >= 0; i--) {
      state.search[i] = ''
    }
  }
}
