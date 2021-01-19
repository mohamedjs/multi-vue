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
        state.total = data.total_pages
        state.currentPage = data.current_page
        state.itemsPerPage = data.per_page
    },

    SET_USER(state, user) {
        state.user = user
    },

    REMOVE_RECORD(state, itemId) {
        const userIndex = state.users.findIndex((u) => u.id == itemId)
        state.users.splice(userIndex, 1)
    },

    REMOVE_MULTI_RECORD(state, itemId) {
        let itemIds = itemId.split(',')
        for (var i = itemIds.length - 1; i >= 0; i--) {
            const userIndex = state.users.findIndex((u) => u.id == itemIds[i])
            state.users.splice(userIndex, 1)
        }
    },

    SET_SEARCH_KEY(state, search) {
        state.search[search.key] = search.value
    },

    INIT_SEARCH(state) {
        state.search = {
            'per_page': '',
            'page': '',
            'global_search': '',
            'name': '',
            'email': '',
            'bod': '',
            'phone': '',
            'user_name': '',
            'from': '',
            'to': '',
            'status': '',
            'gender': '',
            'email_verified_at': ''
        }
    },

    INIT_USER(state) {
        state.user = { 'name': '', 'image': '', 'email': '', 'password': '', 'phone': '', 'user_name': '', 'bod': '', 'status': '', 'gender': '', 'user_type': '', 'home_phone': '', 'website': '' }
    },

    EMPTY_SPECIFIC_SEARCH_KEY(state, search) {
        state.search[search.key] = search.value
    },

    SET_USER_DATA(state, result) {
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