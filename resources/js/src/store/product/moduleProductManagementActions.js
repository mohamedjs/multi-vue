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
  fetchProduct({ commit },productId) {
    return new Promise((resolve, reject) => {
      axios.get('/api/products/'+productId+'/edit')
        .then((response) => {
          commit('SET_PRODUCT', response.data.data)
          resolve(response)
        })
        .catch((error) => { reject(error) })
    })
  },
  resetProduct({ commit },productId) {
    return new Promise((resolve, reject) => {
        commit('RESET_PRODUCT')
    })
  },
}
