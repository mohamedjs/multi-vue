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
      localStorage.setItem("userInfo",  JSON.stringify(result))
    },

    CHANGE_USER_KEY(state,payload){
      state.user[payload.key] = payload.value
    },

    FILL_FORM_DATA(state){
      for ( var key in state.user ) {
        state.formData.append(key, state.user[key]);
      }
    }

}
