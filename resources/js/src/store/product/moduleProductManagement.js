import state from './moduleProductManagementState.js'
import mutations from './moduleProductManagementMutations.js'
import actions from './moduleProductManagementActions.js'
import getters from './moduleProductManagementGetters.js'

export default {
  namespaced: true,
  state: state,
  mutations: mutations,
  actions: actions,
  getters: getters
}
