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
    state.total = data.total
    state.currentPage = data.current_page
  },
  SET_USER(state, user) {
    state.user = user
  },
  REMOVE_RECORD(state, itemId) {
      const userIndex = state.users.findIndex((u) => u.id == itemId)
      state.users.splice(userIndex, 1)
  },
}
