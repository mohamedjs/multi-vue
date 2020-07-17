/*=========================================================================================
  File Name: moduleAuthMutations.js
  Description: Auth Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default {

    SET_USER_DATA(state, result) {
      localStorage.setItem("userInfo", result.data.userData)
      state.AppActiveUser = result.data.userData
    },

}
