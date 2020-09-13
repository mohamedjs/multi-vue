/*=========================================================================================
  File Name: moduleCalendarState.js
  Description: Calendar Module State
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

export default {
  users  : [],
  search : {'per_page' : '', 'page' : '', 'global_search' : '', 'name' : '', 'email' : '',
           'bod' : '', 'phone' : '', 'user_name' : '' , 'from' : '', 'to' : '' , 'status' : '' ,
           'gender' : '' ,'email_verified_at' : ''},
  user   : {'name' : '', 'image' : '', 'email' : '', 'password' : '', 'phone' : '', 'user_name' : '', 'bod' : '', 'status' : '', 'gender' : '', 'user_type' : '', 'home_phone' : '', 'website' : ''},
  currentPage:1,
  itemsPerPage: 10,
  total:0,
}
