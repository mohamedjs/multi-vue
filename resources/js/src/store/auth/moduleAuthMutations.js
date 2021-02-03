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
        localStorage.setItem("userInfo", JSON.stringify(result))
        state.user = result
    },

    CHANGE_USER_KEY(state, payload) {
        state.user[payload.key] = payload.value
    },

    FILL_FORM_DATA(state, method) {
        state.formData = new FormData()
        for (var key in state.user) {
            if (key === 'gender')
                state.formData.append(key, state.user[key] === 'male' ? 1 : 2);
            if (key === 'user_type') {
                var type = 4;
                if (state.user.user_type === 'SuperAdmin') { type = 1 }
                if (state.user.user_type === "Admin") { type = 2 }
                if (state.user.user_type === 'Staff') { type = 3 }
                if (state.user.user_type === 'Client') { type = 4 }
                state.formData.append(key, type);
            }
            if (key === 'status') {
                var status = state.user.status === 'Active' ? 1 : 2;
                state.formData.append(key, status);
            }
            if (!['gender', 'user_type', 'status', 'email_verified_at'].includes(key))
                state.formData.append(key, state.user[key]);
        }
        if (method && method != '')
            state.formData.append('_method', method);
    }
}