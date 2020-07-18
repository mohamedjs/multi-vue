(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[11],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      email: '',
      token: '',
      password: '',
      password_confirmation: '',
      success_flag: false,
      message: ''
    };
  },
  computed: {
    validateForm: function validateForm() {
      return !this.errors.any() && this.email != '' && this.password != '';
    }
  },
  methods: {
    resetPassword: function resetPassword() {
      var _this2 = this;

      var _this = this;

      var payload = {
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
        token: this.token
      };
      this.$store.dispatch('auth/resetPassword', payload).then(function (response) {
        _this2.success_flag = true;
        _this2.message = response.data.message;

        _this2.$vs.notify({
          title: 'Success',
          text: response.data.message,
          color: 'success',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });

        _this2.$router.push('/').catch(function () {});
      }).catch(function (error) {
        _this2.$vs.notify({
          title: 'Error',
          text: error.response.data.message,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });

        if (error.response.status == 422) //validation error
          {
            _this2.success_flag = false; // Add errors to VeeValidate Error Bag

            var entries = Object.entries(error.response.data.data);
            entries.forEach(function (item, index) {
              _this.errors.add({
                field: item[0],
                msg: item[1][0]
              });
            });
          }
      });
    }
  },
  created: function created() {
    this.email = this.$route.query.email;
    this.token = this.$route.params.token;
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "h-screen flex w-full bg-img" }, [
    _c(
      "div",
      {
        staticClass:
          "vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center"
      },
      [
        _c("vx-card", [
          _c(
            "div",
            {
              staticClass: "full-page-bg-color",
              attrs: { slot: "no-body" },
              slot: "no-body"
            },
            [
              _c("div", { staticClass: "vx-row" }, [
                _c(
                  "div",
                  {
                    staticClass:
                      "vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center"
                  },
                  [
                    _c("img", {
                      staticClass: "mx-auto",
                      attrs: {
                        src: __webpack_require__(/*! @assets/images/pages/reset-password.png */ "./resources/assets/images/pages/reset-password.png"),
                        alt: "login"
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass:
                      "vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg"
                  },
                  [
                    _c(
                      "div",
                      { staticClass: "p-8" },
                      [
                        _c("div", { staticClass: "vx-card__title mb-8" }, [
                          _c("h4", { staticClass: "mb-4" }, [
                            _vm._v("Reset Password")
                          ]),
                          _vm._v(" "),
                          _c("p", [_vm._v("Please enter your new password.")]),
                          _vm._v(" "),
                          _c(
                            "span",
                            {
                              directives: [
                                {
                                  name: "show",
                                  rawName: "v-show",
                                  value: _vm.success_flag,
                                  expression: "success_flag"
                                }
                              ],
                              staticClass: "text-success w-full text-sm"
                            },
                            [_vm._v(_vm._s(_vm.message) + ".")]
                          )
                        ]),
                        _vm._v(" "),
                        _c("vs-input", {
                          directives: [
                            {
                              name: "validate",
                              rawName: "v-validate",
                              value: "required|email|min:3",
                              expression: "'required|email|min:3'"
                            }
                          ],
                          staticClass: "w-full mb-6",
                          attrs: {
                            "data-vv-validate-on": "blur",
                            name: "email",
                            success: _vm.success_flag,
                            danger: _vm.errors.has("email"),
                            type: "email",
                            "label-placeholder": "Email"
                          },
                          model: {
                            value: _vm.email,
                            callback: function($$v) {
                              _vm.email = $$v
                            },
                            expression: "email"
                          }
                        }),
                        _vm._v(" "),
                        _c(
                          "span",
                          { staticClass: "text-danger w-full text-sm" },
                          [_vm._v(_vm._s(_vm.errors.first("email")))]
                        ),
                        _vm._v(" "),
                        _c("vs-input", {
                          directives: [
                            {
                              name: "validate",
                              rawName: "v-validate",
                              value: "required|min:6",
                              expression: "'required|min:6'"
                            }
                          ],
                          ref: "password",
                          staticClass: "w-full mb-6",
                          attrs: {
                            "data-vv-validate-on": "blur",
                            name: "password",
                            success: _vm.success_flag,
                            danger: _vm.errors.has("password"),
                            type: "password",
                            "label-placeholder": "Password"
                          },
                          model: {
                            value: _vm.password,
                            callback: function($$v) {
                              _vm.password = $$v
                            },
                            expression: "password"
                          }
                        }),
                        _vm._v(" "),
                        _c(
                          "span",
                          { staticClass: "text-danger w-full text-sm" },
                          [_vm._v(_vm._s(_vm.errors.first("password")))]
                        ),
                        _vm._v(" "),
                        _c("vs-input", {
                          directives: [
                            {
                              name: "validate",
                              rawName: "v-validate",
                              value: "required|min:6|confirmed:password",
                              expression: "'required|min:6|confirmed:password'"
                            }
                          ],
                          staticClass: "w-full mb-8",
                          attrs: {
                            "data-vv-validate-on": "blur",
                            name: "password_confirmation",
                            success: _vm.success_flag,
                            danger: _vm.errors.has("password_confirmation"),
                            type: "password",
                            "label-placeholder": "Confirm Password"
                          },
                          model: {
                            value: _vm.password_confirmation,
                            callback: function($$v) {
                              _vm.password_confirmation = $$v
                            },
                            expression: "password_confirmation"
                          }
                        }),
                        _vm._v(" "),
                        _c(
                          "span",
                          { staticClass: "text-danger w-full text-sm" },
                          [
                            _vm._v(
                              _vm._s(_vm.errors.first("password_confirmation"))
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "flex flex-wrap justify-between flex-col-reverse sm:flex-row"
                          },
                          [
                            _c(
                              "vs-button",
                              {
                                staticClass:
                                  "w-full sm:w-auto mb-8 sm:mb-auto mt-3 sm:mt-auto",
                                attrs: { type: "border", to: "/login" }
                              },
                              [_vm._v("Go Back To Login")]
                            ),
                            _vm._v(" "),
                            _c(
                              "vs-button",
                              {
                                staticClass: "w-full sm:w-auto",
                                attrs: { disabled: !_vm.validateForm },
                                on: { click: _vm.resetPassword }
                              },
                              [_vm._v("Reset")]
                            )
                          ],
                          1
                        )
                      ],
                      1
                    )
                  ]
                )
              ])
            ]
          )
        ])
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/images/pages/reset-password.png":
/*!**********************************************************!*\
  !*** ./resources/assets/images/pages/reset-password.png ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/reset-password.png?965156dace52dc1b319d6363d3040ff2";

/***/ }),

/***/ "./resources/js/src/views/pages/ResetPassword.vue":
/*!********************************************************!*\
  !*** ./resources/js/src/views/pages/ResetPassword.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ResetPassword.vue?vue&type=template&id=2e0cad45& */ "./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45&");
/* harmony import */ var _ResetPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ResetPassword.vue?vue&type=script&lang=js& */ "./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ResetPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/pages/ResetPassword.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ResetPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ResetPassword.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/ResetPassword.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ResetPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45&":
/*!***************************************************************************************!*\
  !*** ./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ResetPassword.vue?vue&type=template&id=2e0cad45& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/pages/ResetPassword.vue?vue&type=template&id=2e0cad45&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ResetPassword_vue_vue_type_template_id_2e0cad45___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);