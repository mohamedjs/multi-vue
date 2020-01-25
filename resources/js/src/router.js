/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  Object Strucutre:
                    path => router path
                    name => router name
                    component(lazy loading) => component to load
                    meta : {
                      rule => which user can have access (ACL)
                      breadcrumb => Add breadcrumb to specific page
                      pageTitle => Display title besides breadcrumb
                    }
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import Vue from 'vue'
import Router from 'vue-router'
const originalReplace = Router.prototype.replace
Router.prototype.replace = function replace(location, onResolve, onReject) {
  if (onResolve || onReject) return originalReplace.call(this, location, onResolve, onReject)
  return originalReplace.call(this, location).catch(err => err)
}
Vue.use(Router)
const router = new Router({
    mode: 'history',
    base: '/',
    routes: [

      {
        // =============================================================================
        // MAIN LAYOUT ROUTES
        // =============================================================================
        path: '',
        component: () => import('./layouts/main/Main.vue'),
        children: [
          {
            path: '/',
            name: 'home',
            component: () => import('./views/Home.vue'),
          },
          {
            path: '/users',
            name: 'users',
            component: () => import('./views/users/users.vue'),
          },
          {
              path: '/user',
              name: 'app-user-list',
              component: () => import('@/views/user/user-list/UserList.vue'),
              meta: {
                  breadcrumb: [
                      { title: 'Home', url: '/' },
                      { title: 'User' },
                      { title: 'List', active: true },
                  ],
                  pageTitle: 'User List',
                  //rule: 'editor'
              },
          },
          {
              path: '/user-view/:userId',
              name: 'app-user-view',
              component: () => import('@/views/user/UserView.vue'),
              meta: {
                  breadcrumb: [
                      { title: 'Home', url: '/' },
                      { title: 'User' },
                      { title: 'View', active: true },
                  ],
                  pageTitle: 'User View',
                  //rule: 'editor'
              },
          },
          {
              path: '/user-edit/:userId',
              name: 'app-user-edit',
              component: () => import('@/views/user/user-edit/UserEdit.vue'),
              meta: {
                  breadcrumb: [
                      { title: 'Home', url: '/' },
                      { title: 'User' },
                      { title: 'Edit', active: true },
                  ],
                  pageTitle: 'User Edit',
                //  rule: 'editor'
              },
          },
          {
            path: '/countrys',
            name: 'countrys',
            component: () => import('./views/countries/countrys.vue'),
          },
          {
            path: '/countrys_states/:id',
            name: 'countrys-states',
            component: () => import('./views/states/states.vue'),
          },
          {
            path: '/countrys_citys/:id',
            name: 'countrys-citys',
            component: () => import('./views/citys/citys.vue'),
          },
          {
            path: 'advertisments',
            name: 'advertisments',
            component: () => import('./views/advertisments/advertisments.vue'),
          },
          {
            path: 'categorys',
            name: 'categorys',
            component: () => import('./views/categorys/categorys.vue'),
          },
          {
            path: 'categorys/:id',
            name: 'categorys-subs',
            component: () => import('./views/categorys/categorys.vue'),
          },
          {
            path: 'coupons',
            name: 'coupons',
            component: () => import('./views/coupons/coupons.vue'),
          },
          {
            path: 'settings',
            name: 'settings',
            component: () => import('./views/settings/settings.vue'),
          },
          {
            path: 'brands',
            name: 'brands',
            component: () => import('./views/brands/brands.vue'),
          },
          {
            path: 'languages',
            name: 'languages',
            component: () => import('./views/languages/languages.vue'),
          },
          {
            path: 'products',
            name: 'products',
            component: () => import('./views/products/Products.vue'),
          },
          {
            path: 'products-create',
            name: 'product-add',
            component: () => import('./views/products/ProductForm.vue'),
          },
          {
            path: 'products-update/:productId',
            name: 'product-update',
            component: () => import('./views/products/ProductForm.vue'),
          }
        ]
      },
      // =============================================================================
      // FULL PAGE LAYOUTS
      // =============================================================================
      {
        path: '',
        component: () => import('@/layouts/full-page/FullPage.vue'),
        children: [
          // =============================================================================
          // PAGES
          // =============================================================================
          {
            path: '/login',
            name: 'Login',
            component: () => import('@/views/pages/login/Login.vue')
          },
          {
            path: '/register',
            name: 'Register',
            component: () => import('@/views/pages/register/Register.vue')
          },
          {
            path: '/pages/error-404',
            name: 'pageError404',
            component: () => import('@/views/pages/Error404.vue')
          },
        ]
      },
      // Redirect to 404 page, if no match found
      {
        path: '*',
        redirect: '/pages/error-404'
      }
    ],
})

router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = "none";
    }
})

router.beforeEach((to, from, next) => {
  // Remove initial loading
  const accessToken = localStorage.getItem("userInfo")
  if (!accessToken && to.path !== '/login') {
    router.push({ path: '/login', query: { to:to.path } }).catch(() => {})
  }
  else{
      next()
  }
})
export default router
