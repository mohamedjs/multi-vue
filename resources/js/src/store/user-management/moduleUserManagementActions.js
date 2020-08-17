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
  fetchUsers({ commit }) {
    return new Promise((resolve, reject) => {
      axios.get("/api/users")
        .then((response) => {
          commit('SET_USERS', response.data.data.users)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  fetchUser({}, userId) {
    return new Promise((resolve, reject) => {
      axios.get(`/api/users/${userId}/edit`)
        .then((response) => {
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  removeRecord({ commit }, userId) {
    return new Promise((resolve, reject) => {
      axios.delete(`/api/users/${userId}`)
        .then((response) => {
          commit('REMOVE_RECORD', userId)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  }
}
