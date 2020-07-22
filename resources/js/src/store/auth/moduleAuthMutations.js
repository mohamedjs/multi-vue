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
      state.user = result
    },

    CHANGE_USER_KEY(state,payload){
      state.user[payload.key] = payload.value
    },

    FILL_FORM_DATA(state,method){
      state.formData = new FormData()
      for ( var key in state.user ) {
        if(key != 'email_verified_at')
          state.formData.append(key, state.user[key]);
      }
      if(method && method != ''){
        state.formData.append('_method', method);
      }
    }

}
