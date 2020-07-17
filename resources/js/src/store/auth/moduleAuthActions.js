/*=========================================================================================
  File Name: moduleTodoActions.js
  Description: Todo Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios.js"

export default {

    Login({ commit }, payload) {
      return new Promise((resolve, reject) => {
        axios.post("/api/v1/login", payload)
          .then((response) => {
            commit('SET_USER_DATA', response.data)
            resolve(response)
          })
          .catch((error) => { reject(error) })
      })
    },

    logOut({ commit }) {
      return new Promise((resolve, reject) => {
        axios.post("/api/v1/logout")
          .then((response) => {
            resolve(response)
          })
          .catch((error) => { reject(error) })
      })
    },

    forgotPassword({ commit } , payload){
      return new Promise((resolve,reject) => {
        axios.post('/api/v1/forget/password',payload)
        .then((response) => {
          resolve(response)
        })
        .catch((error) => { reject(error) })
      })
    },

    resetPassword({ commit } , payload){
      return new Promise((resolve,reject) => {
        axios.post('/api/v1/reset/password',payload)
        .then((response) => {
          commit('SET_USER_DATA', response.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
      })
    }
}
