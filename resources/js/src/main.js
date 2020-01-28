/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import App from './App.vue'

// Vuesax Component Framework
import Vuesax from 'vuesax'

Vue.use(Vuesax)

// axios
import axios from "./axios.js"
Vue.prototype.$http = axios
axios.interceptors.request.use(config => {
  config.headers['X-localization'] = localStorage.getItem("lang") ? localStorage.getItem("lang") :'en';
  return config;
});

// API Calls
//import "./http/requests"

// mock
import "./fake-db/index.js"

// Theme Configurations
import '../themeConfig.js'

// Firebase
//import '@/firebase/firebaseConfig'


// Auth0 Plugin
// import AuthPlugin from "./plugins/auth"
// Vue.use(AuthPlugin);


// ACL
//import acl from './acl/acl'

// Globally Registered Components
import './globalComponents.js'

// Vue Router
import router from './router'

// Vuex Store
import store from './store/store'

// i18n
import i18n from './i18n/i18n'

// Vuesax Admin Filters
import './filters/filters'

// Clipboard
import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);


// Tour
import VueTour from 'vue-tour'
Vue.use(VueTour)
require('vue-tour/dist/vue-tour.css')


// VeeValidate
import VeeValidate from 'vee-validate'
import dictionary from './veevalidate/Dictionary'
Vue.use(VeeValidate,{
  locale: 'en',
  dictionary
});

//directive can
Vue.directive('can', function (el, binding) {
  const permissions = localStorage.getItem("permissions")
  return (permissions && permissions.indexOf(binding) !== -1 ) ? True : False;
})
//directive is
Vue.directive('is', function (el, binding) {
  const roles = localStorage.getItem("roles")
  return (roles && roles.indexOf(binding) !== -1 ) ? True : False;
})
// Google Maps
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
        // Add your API key here
        key: 'AIzaSyB4DDathvvwuwlwnUu7F4Sow3oU22y5T1Y',
        libraries: 'places', // This is required if you use the Auto complete plug-in
    },
})

// Vuejs - Vue wrapper for hammerjs
import { VueHammer } from 'vue2-hammer'
Vue.use(VueHammer)

// PrismJS
import 'prismjs'
// import 'prismjs/themes/prism-tomorrow.css'

// Feather font icon
require('@assets/css/iconfont.css')

Vue.config.productionTip = false

new Vue({
    router,
    store,
    i18n,
    // acl,
    render: h => h(App)
}).$mount('#app')
