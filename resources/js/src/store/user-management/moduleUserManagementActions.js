/*=========================================================================================
  File Name: moduleCalendarActions.js
  Description: Calendar Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios.js"

export default {
  fetchUsers({ commit, state }) {
    return new Promise((resolve, reject) => {
      axios.get("/api/v1/users",{ params : state.search })
        .then((response) => {
          commit('SET_USERS', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  fetchUser({}, userId) {
    return new Promise((resolve, reject) => {
      axios.get(`/api/v1/users/${userId}/edit`)
        .then((response) => {
          commit('SET_USER', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  removeRecord({ commit }, userId) {
    return new Promise((resolve, reject) => {
      axios.delete(`/api/v1/users/${userId}`)
        .then((response) => {
          commit('REMOVE_RECORD', userId)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  setSearchKey({ commit, dispatch } , search){
    commit('SET_SEARCH_KEY', search)
    if(search.value) { dispatch('fetchUsers'); }
  },
}
