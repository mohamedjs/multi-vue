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
            console.log(response.data.data.userData)
            commit('SET_USER_DATA', response.data.data.userData)
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
          commit('SET_USER_DATA', response.data.data.userData)
          resolve(response)
        })
        .catch((error) => { reject(error) })
      })
    },

    updateUserKey({ commit } , payload){
      commit('CHANGE_USER_KEY',payload)
    },

    updateUserData({ commit, state }){
      return new Promise((resolve,reject) => {
        commit('FILL_FORM_DATA','patch')
        axios.post('/api/v1/user/'+state.user.id,state.formData)
        .then((response) => {
          commit('SET_USER_DATA', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
      })
    },

    sendVerifyEmail({ commit, state }){
      return new Promise((resolve,reject) => {
        axios.post('/api/v1/send/verify/email')
        .then((response) => {
          resolve(response)
        })
        .catch((error) => { reject(error) })
      }) 
    },

    checkVerifyEmail({ commit, state },payload){
      return new Promise((resolve,reject) => {
        axios.post('/api/v1/verify/email',payload)
        .then((response) => {
          commit('SET_USER_DATA', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
      }) 
    },

    updatePassword({commit} , payload){
      return new Promise((resolve,reject) => {
        axios.post('api/v1/update/password',payload)
        .then((response) => {
          resolve(response)
        })
        .catch((error) => { reject(error) })
      })
    }
}
