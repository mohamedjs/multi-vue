(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/ServerError.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/ServerError.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-perfect-scrollbar */ "./node_modules/vue-perfect-scrollbar/dist/index.js");
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0__);
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
  components: {
    VuePerfectScrollbar: vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0___default.a
  },
  props: ['data', 'alertActi'],
  data: function data() {
    return {
      msg: 'Server Error'
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-perfect-scrollbar */ "./node_modules/vue-perfect-scrollbar/dist/index.js");
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/views/ServerError.vue */ "./resources/js/src/views/ServerError.vue");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_2__);
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

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
  props: {
    isCategorys: '',
    isSidebarActive: {
      type: Boolean,
      required: true
    }
  },
  data: function data() {
    return {
      data: new FormData(),
      options: [],
      category: {
        'title': '',
        'coding': '',
        'image': '',
        'parent_id': ''
      },
      SError: [],
      errorActive: false,
      er_active: false,
      settings: {
        // perfectscrollbar settings
        maxScrollbarLength: 60,
        wheelSpeed: .60
      }
    };
  },
  computed: {
    isSidebarActiveLocal: {
      get: function get() {
        return this.isSidebarActive;
      },
      set: function set(val) {
        if (!val) {
          this.$emit('closeSidebar');
          this.initValues();
        }
      }
    }
  },
  methods: {
    initValues: function initValues() {
      this.category.title = '';
      this.category.coding = '';
      this.$refs.fileUpload.srcs = [];
    },
    submitForm: function submitForm() {
      var thisIns = this;
      this.$validator.validateAll().then(function (result) {
        if (result) {
          var config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
          thisIns.data.append('title', thisIns.category.title);
          thisIns.data.append('coding', thisIns.category.coding);
          thisIns.data.append('parent_id', thisIns.category.parent_id.id);
          thisIns.$http.post('/api/categorys', thisIns.data, config).then(function (response) {
            if (response.data.status == "success") thisIns.er_active = false;
            thisIns.errorActive = false;
            thisIns.SError = [];
            thisIns.$emit('update', response.data.data);
            thisIns.$vs.notify({
              title: 'Success',
              text: response.data.status,
              color: 'success',
              iconPack: 'feather',
              icon: 'icon-alert-circle'
            });
          }).catch(function (error) {
            if (error.response.status == 422) {
              thisIns.SError = [];

              for (var _i = 0, _Object$entries = Object.entries(error.response.data.errors); _i < _Object$entries.length; _i++) {
                var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
                    key = _Object$entries$_i[0],
                    value = _Object$entries$_i[1];

                thisIns.SError.push(value);
              }

              thisIns.$vs.notify({
                title: 'Error',
                text: error.response.data.message,
                color: 'danger',
                iconPack: 'feather',
                icon: 'icon-alert-circle'
              });
              thisIns.er_active = true;
              thisIns.errorActive = true;
            }

            thisIns.$vs.notify({
              title: 'Error',
              text: error,
              color: 'danger',
              iconPack: 'feather',
              icon: 'icon-alert-circle'
            });
            return Promise.reject(error);
          });
        } else {
          thisIns.$vs.notify({
            title: 'Error',
            text: 'not validate data',
            color: 'danger',
            iconPack: 'feather',
            icon: 'icon-alert-circle'
          });
        }
      });
    },
    uploadFiles: function uploadFiles() {
      var files = this.$refs.fileUpload.$refs.fileInput.files;
      console.log(this.$refs.fileUpload); // for (let i = 0; i < files.length; i++) {

      this.data.append('image', files[0]); // }
    }
  },
  mounted: function mounted() {
    var thisIns = this;
    this.$http.get('/api/all_category').then(function (response) {
      thisIns.options = response.data;
    }).catch(function (error) {
      thisIns.$vs.notify({
        title: 'Error',
        text: error,
        color: 'danger',
        iconPack: 'feather',
        icon: 'icon-alert-circle'
      });
    });
  },
  components: {
    VuePerfectScrollbar: vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_0___default.a,
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_2___default.a,
    ServerError: _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddNewCategory_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddNewCategory.vue */ "./resources/js/src/views/categorys/AddNewCategory.vue");
/* harmony import */ var _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/views/ServerError.vue */ "./resources/js/src/views/ServerError.vue");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_2__);
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
  components: {
    AddNewCategory: _AddNewCategory_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_2___default.a,
    ServerError: _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    var _ref;

    return _ref = {
      selected: [],
      categorys: [],
      options: [],
      SError: []
    }, _defineProperty(_ref, "selected", []), _defineProperty(_ref, "categoryId", ''), _defineProperty(_ref, "DataEdit", new FormData()), _defineProperty(_ref, "category", {
      'title': '',
      'coding': '',
      'image': '',
      'parent_id': ''
    }), _defineProperty(_ref, "url", '/api/categorys'), _defineProperty(_ref, "currentx", 1), _defineProperty(_ref, "popupActive", false), _defineProperty(_ref, "alertActive", false), _defineProperty(_ref, "errorActive", false), _defineProperty(_ref, "er_active", false), _defineProperty(_ref, "alertSuccess", 'Alert'), _defineProperty(_ref, "itemsPerPage", 4), _defineProperty(_ref, "searchx", ''), _defineProperty(_ref, "total", 1), _defineProperty(_ref, "isMounted", false), _defineProperty(_ref, "addNewDataSidebar", false), _defineProperty(_ref, "formats", ["xlsx", "csv", "txt"]), _defineProperty(_ref, "cellAutoWidth", true), _defineProperty(_ref, "selectedFormat", "xlsx"), _defineProperty(_ref, "headerTitle", ["Title", "Coding"]), _defineProperty(_ref, "headerVal", ["title", "coding"]), _defineProperty(_ref, "fileName", ""), _defineProperty(_ref, "activePrompt", false), _ref;
  },
  computed: {
    currentPage: function currentPage() {
      if (this.isMounted) {
        return this.$refs.table.currentx;
      }

      return 0;
    }
  },
  methods: {
    onChildUpdate: function onChildUpdate(category) {
      this.alertActive = true;
      this.alertSuccess = 'Category Added SuccessFully';
      this.getCategory();
    },
    edit: function edit(id) {
      var _this = this;

      this.categoryId = id;
      this.$http.get('/api/categorys/' + id + '/edit').then(function (response) {
        _this.category.title = response.data.data.title;
        _this.category.coding = response.data.data.coding;
        _this.category.parent_id = response.data.data.cat ? {
          id: response.data.data.cat.id,
          label: response.data.data.cat.title
        } : {
          id: null,
          label: ''
        };
        _this.$refs.fileUpload.srcs = [{
          src: response.data.data.image,
          orientation: 'm',
          type: 'image',
          percent: null,
          error: false,
          remove: null
        }];
        _this.popupActive = true;
      }).catch(function (error) {
        _this.$vs.notify({
          title: 'Error',
          text: error,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });
      });
    },
    deleteCategory: function deleteCategory(id) {
      var _this = this;

      this.$http.delete('/api/categorys/' + id).then(function (response) {
        _this.$vs.notify({
          title: 'Success',
          text: response.data.status,
          color: 'success',
          iconPack: 'feather',
          icon: 'icon-success-circle'
        });

        _this.alertActive = true;
        _this.alertSuccess = response.data.message;

        _this.getCategory(_this.currentx); //_this.currentx = _this.currentx + 1

      }).catch(function (error) {
        _this.$vs.notify({
          title: 'Error',
          text: error,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });
      });
    },
    updateCategory: function updateCategory() {
      var thisIns = this;
      this.$validator.validateAll().then(function (result) {
        if (result) {
          var config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
          thisIns.DataEdit.append('title', thisIns.category.title);
          thisIns.DataEdit.append('coding', thisIns.category.coding);

          if (thisIns.category.parent_id.id) {
            thisIns.DataEdit.append('parent_id', thisIns.category.parent_id.id);
          }

          thisIns.DataEdit.append('_method', 'patch');
          thisIns.$http.post('/api/categorys/' + thisIns.categoryId, thisIns.DataEdit, config).then(function (response) {
            thisIns.er_active = false;
            thisIns.errorActive = false;
            thisIns.popupActive = false;
            thisIns.SError = [];
            thisIns.$vs.notify({
              title: 'Success',
              text: response.data.status,
              color: 'success',
              iconPack: 'feather',
              icon: 'icon-alert-circle'
            });
            thisIns.alertActive = true;
            thisIns.alertSuccess = response.data.message;
            thisIns.getCategory(thisIns.currentx); //thisIns.currentx = thisIns.currentx + 1
          }).catch(function (error) {
            if (error.response.status == 422) {
              thisIns.SError = [];

              for (var _i = 0, _Object$entries = Object.entries(error.response.data.errors); _i < _Object$entries.length; _i++) {
                var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
                    key = _Object$entries$_i[0],
                    value = _Object$entries$_i[1];

                thisIns.SError.push(value);
              }

              thisIns.$vs.notify({
                title: 'Error',
                text: error.response.data.message,
                color: 'danger',
                iconPack: 'feather',
                icon: 'icon-alert-circle'
              });
              thisIns.er_active = true;
              thisIns.errorActive = true;
            }

            thisIns.$vs.notify({
              title: 'Error',
              text: error,
              color: 'danger',
              iconPack: 'feather',
              icon: 'icon-alert-circle'
            });
          });
        } else {
          thisIns.$vs.notify({
            title: 'Error',
            text: 'not validate data',
            color: 'danger',
            iconPack: 'feather',
            icon: 'icon-alert-circle'
          });
        }
      });
    },
    delet_all_selected: function delet_all_selected() {
      var _this = this;

      var result = this.selected.map(function (a) {
        return a.id;
      });
      console.log(result);
      var delete_data = new FormData();
      delete_data.append('all_data', result);
      delete_data.append('table', 'categories');
      this.$http.post('/api/delete_all/', delete_data).then(function (response) {
        _this.$vs.notify({
          title: 'Success',
          text: response.data.message,
          color: response.data.status == 'success' ? 'success' : 'danger',
          iconPack: 'feather',
          icon: response.data.status == 'success' ? 'icon-success-circle' : 'icon-alert-circle'
        });

        _this.alertActive = true;
        _this.alertSuccess = response.data.message;

        _this.getCategory(_this.currentx); //_this.currentx = _this.currentx + 1

      }).catch(function (error) {
        _this.$vs.notify({
          title: 'Error',
          text: error,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });
      });
    },
    getCategory: function getCategory() {
      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.$vs.loading();
      var value = page ? page : 1;
      var thisIns = this;
      var rout_link = this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&search=' + this.searchx : this.url + '?page=' + value + '&search=' + this.searchx;

      if (this.$route.params.id) {
        rout_link = this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&parent_id=' + this.$route.params.id + '&search=' + this.searchx : this.url + '?page=' + value + '&parent_id=' + this.$route.params.id + '&search=' + this.searchx;
      }

      this.$http.get(rout_link).then(function (response) {
        thisIns.categorys = response.data.data.categorys.data;
        thisIns.currentx = response.data.data.categorys.current_page;
        thisIns.itemsPerPage = response.data.data.categorys.per_page;
        thisIns.total = response.data.data.categorys.last_page;
        thisIns.$vs.loading.close();
      }).catch(function (error) {
        thisIns.$vs.notify({
          title: 'Error',
          text: error,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });
        thisIns.$vs.loading.close();
      });
    },
    showSubCat: function showSubCat(id) {
      this.$router.replace('/categorys/' + id);
    },
    uploadFiles: function uploadFiles() {
      var files = this.$refs.fileUpload.$refs.fileInput.files; // for (let i = 0; i < files.length; i++) {

      this.DataEdit.append('image', files[0]); // }
    },
    handleSearch: function handleSearch() {
      this.$vs.loading();
      var thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ? this.url + '&search=' + this.searchx : this.url + '?search=' + this.searchx).then(function (response) {
        thisIns.categorys = response.data.data.categorys.data;
        thisIns.currentx = response.data.data.categorys.current_page;
        thisIns.itemsPerPage = response.data.data.categorys.per_page;
        thisIns.total = response.data.data.categorys.last_page;
        thisIns.$vs.loading.close();
      }).catch(function (error) {
        thisIns.$vs.notify({
          title: 'Error',
          text: error,
          color: 'danger',
          iconPack: 'feather',
          icon: 'icon-alert-circle'
        });
        thisIns.$vs.loading.close();
      });
    },
    exportToExcel: function exportToExcel() {
      var _this2 = this;

      Promise.all(/*! import() */[__webpack_require__.e(1), __webpack_require__.e(2)]).then(__webpack_require__.bind(null, /*! @/vendor/Export2Excel */ "./resources/js/src/vendor/Export2Excel.js")).then(function (excel) {
        var list = _this2.selected;

        var data = _this2.formatJson(_this2.headerVal, list);

        excel.export_json_to_excel({
          header: _this2.headerTitle,
          data: data,
          filename: _this2.fileName,
          autoWidth: _this2.cellAutoWidth,
          bookType: _this2.selectedFormat
        });

        _this2.clearFields();
      });
    },
    formatJson: function formatJson(filterVal, jsonData) {
      return jsonData.map(function (v) {
        return filterVal.map(function (j) {
          // Add col name which needs to be translated
          // if (j === 'timestamp') {
          //   return parseTime(v[j])
          // } else {
          //   return v[j]
          // }
          return v[j];
        });
      });
    },
    clearFields: function clearFields() {
      this.fileName = "";
      this.cellAutoWidth = true;
      this.selectedFormat = "xlsx";
    }
  },
  watch: {
    currentx: {
      handler: function handler(value) {
        this.$vs.loading();
        var thisIns = this;
        var rout_link = this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&search=' + this.searchx : this.url + '?page=' + value + '&search=' + this.searchx;

        if (this.$route.params.id) {
          rout_link = this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&parent_id=' + this.$route.params.id + '&search=' + this.searchx : this.url + '?page=' + value + '&parent_id=' + this.$route.params.id + '&search=' + this.searchx;
        }

        this.$http.get(rout_link).then(function (response) {
          thisIns.categorys = response.data.data.categorys.data;
          thisIns.currentx = response.data.data.categorys.current_page;
          thisIns.itemsPerPage = response.data.data.categorys.per_page;
          thisIns.total = response.data.data.categorys.last_page;
          thisIns.$vs.loading.close();
        }).catch(function (error) {
          thisIns.$vs.notify({
            title: 'Error',
            text: error,
            color: 'danger',
            iconPack: 'feather',
            icon: 'icon-alert-circle'
          });
          thisIns.$vs.loading.close();
        });
      }
    },
    itemsPerPage: {
      handler: function handler(itemsPerPage) {
        this.$vs.loading();
        var thisIns = this;
        this.url = '/api/categorys?per_page=' + itemsPerPage + '&search=' + this.searchx;

        if (this.$route.params.id) {
          this.url = '/api/categorys?per_page=' + itemsPerPage + '&parent_id=' + this.$route.params.id + '&search=' + this.searchx;
        }

        this.$http.get(this.url).then(function (response) {
          thisIns.categorys = response.data.data.categorys.data;
          thisIns.currentx = response.data.data.categorys.current_page;
          thisIns.itemsPerPage = response.data.data.categorys.per_page;
          thisIns.total = response.data.data.categorys.last_page;
          thisIns.$vs.loading.close();
        }).catch(function (error) {
          thisIns.$vs.notify({
            title: 'Error',
            text: error,
            color: 'danger',
            iconPack: 'feather',
            icon: 'icon-alert-circle'
          });
          thisIns.$vs.loading.close();
        });
      }
    }
  },
  created: function created() {
    this.$vs.loading();
    var thisIns = this;
    this.$http.get(this.$route.params.id ? this.url + '?parent_id=' + this.$route.params.id : this.url).then(function (response) {
      //console.log(response.data.data);
      thisIns.categorys = response.data.data.categorys.data;
      thisIns.currentx = response.data.data.categorys.current_page;
      thisIns.itemsPerPage = response.data.data.categorys.per_page;
      thisIns.total = response.data.data.categorys.last_page;
      thisIns.$vs.loading.close();
    }).catch(function (error) {
      thisIns.$vs.notify({
        title: 'Error',
        text: error,
        color: 'danger',
        iconPack: 'feather',
        icon: 'icon-alert-circle'
      });
      thisIns.$vs.loading.close();
    });
    this.$http.get('/api/all_category').then(function (response) {
      thisIns.options = response.data;
    }).catch(function (error) {
      thisIns.$vs.notify({
        title: 'Error',
        text: error,
        color: 'danger',
        iconPack: 'feather',
        icon: 'icon-alert-circle'
      });
    });
  },
  mounted: function mounted() {
    this.isMounted = true;
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar--background {\n  z-index: 52010;\n}\n.add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar {\n  z-index: 52010;\n  width: 400px;\n  max-width: 90vw;\n}\n[dir] .add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar .img-upload {\n  margin-top: 2rem;\n}\n[dir] .add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar .img-upload .con-img-upload {\n  padding: 0;\n}\n.add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar .img-upload .con-input-upload {\n  width: 100%;\n}\n[dir] .add-new-data-sidebar[data-v-e1e5c5be]  .vs-sidebar .img-upload .con-input-upload {\n  margin: 0;\n}\n.scroll-area--data-list-add-new[data-v-e1e5c5be] {\n  height: calc(100% - 4.3rem);\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#data-list-thumb-view .vs-con-table .vs-table--header {\n  display: -webkit-box;\n  display: flex;\n  flex-wrap: wrap-reverse;\n}[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header {\n  margin-left: 1.5rem;\n  margin-right: 1.5rem;\n}[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header {\n  margin-right: 1.5rem;\n  margin-left: 1.5rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table--header > span {\n  display: -webkit-box;\n  display: flex;\n  -webkit-box-flex: 1;\n          flex-grow: 1;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search {\n  padding-top: 0;\n}\n#data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input {\n  font-size: 1rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input {\n  padding: 0.9rem 2.5rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input + i {\n  left: 1rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input + i {\n  right: 1rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input:focus + i {\n  left: 1rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input:focus + i {\n  right: 1rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table {\n  border-collapse: separate;\n  border-spacing: 0 1.3rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table {\n  padding: 0 1rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr {\n  box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr td {\n  padding: 10px;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table tr td:first-child {\n  border-top-left-radius: 0.5rem;\n  border-bottom-left-radius: 0.5rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table tr td:first-child {\n  border-top-right-radius: 0.5rem;\n  border-bottom-right-radius: 0.5rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table tr td:last-child {\n  border-top-right-radius: 0.5rem;\n  border-bottom-right-radius: 0.5rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table tr td:last-child {\n  border-top-left-radius: 0.5rem;\n  border-bottom-left-radius: 0.5rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table tr td.img-container span {\n  display: -webkit-box;\n  display: flex;\n  -webkit-box-pack: center;\n          justify-content: center;\n}\n#data-list-thumb-view .vs-con-table .vs-table tr td.img-container .product-img {\n  height: 110px;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr td.td-check {\n  padding: 20px !important;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead th {\n  padding-top: 0;\n  padding-bottom: 0;\n}\n#data-list-thumb-view .vs-con-table .vs-table--thead th .vs-table-text {\n  text-transform: uppercase;\n  font-weight: 600;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead th.td-check {\n  padding: 0 15px !important;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead tr {\n  background: none;\n  box-shadow: none;\n}\n#data-list-thumb-view .vs-con-table .vs-table--pagination {\n  -webkit-box-pack: center;\n          justify-content: center;\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./categorys.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb& ***!
  \*************************************************************************************************************************************************************************************************************/
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
  return _c(
    "vs-alert",
    {
      directives: [
        {
          name: "show",
          rawName: "v-show",
          value: _vm.alertActi,
          expression: "alertActi"
        }
      ],
      staticStyle: { height: "auto" },
      attrs: {
        color: "danger",
        title: _vm.msg,
        closable: "",
        "icon-pack": "feather",
        "close-icon": "icon-x-circle"
      },
      on: {
        click: function($event) {
          _vm.alertActi = false
        }
      }
    },
    [
      _c(
        "vs-list",
        _vm._l(_vm.data, function(tr, indextr) {
          return _c("vs-list-item", {
            key: indextr,
            attrs: { title: tr.toString() }
          })
        }),
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "vs-sidebar",
    {
      staticClass: "add-new-data-sidebar items-no-padding",
      attrs: {
        "click-not-close": "",
        "position-right": "",
        parent: "body",
        "default-index": "1",
        color: "primary",
        spacer: ""
      },
      model: {
        value: _vm.isSidebarActiveLocal,
        callback: function($$v) {
          _vm.isSidebarActiveLocal = $$v
        },
        expression: "isSidebarActiveLocal"
      }
    },
    [
      _c(
        "div",
        { staticClass: "mt-6 flex items-center justify-between px-6" },
        [
          _c("h4", [_vm._v("ADD NEW DATA")]),
          _vm._v(" "),
          _c("feather-icon", {
            staticClass: "cursor-pointer",
            attrs: { icon: "XIcon" },
            on: {
              click: function($event) {
                $event.stopPropagation()
                _vm.isSidebarActiveLocal = false
              }
            }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c("vs-divider", { staticClass: "mb-0" }),
      _vm._v(" "),
      _c("server-error", {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.errorActive,
            expression: "errorActive"
          }
        ],
        attrs: { alertActi: _vm.er_active, data: _vm.SError }
      }),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c(
        "VuePerfectScrollbar",
        {
          staticClass: "scroll-area--data-list-add-new pt-4 pb-6",
          attrs: { settings: _vm.settings }
        },
        [
          _c(
            "div",
            { staticClass: "p-6" },
            [
              _c("label", { attrs: { for: "category" } }, [
                _vm._v("Parent Category")
              ]),
              _vm._v(" "),
              _c("v-select", {
                directives: [
                  {
                    name: "validate",
                    rawName: "v-validate",
                    value: "",
                    expression: "''"
                  }
                ],
                attrs: { name: "parent", options: _vm.options },
                model: {
                  value: _vm.category.parent_id,
                  callback: function($$v) {
                    _vm.$set(_vm.category, "parent_id", $$v)
                  },
                  expression: "category.parent_id"
                }
              }),
              _vm._v(" "),
              _c(
                "span",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.errors.has("parent"),
                      expression: "errors.has('parent')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("parent")))]
              ),
              _vm._v(" "),
              _c("vs-input", {
                directives: [
                  {
                    name: "validate",
                    rawName: "v-validate",
                    value: "required",
                    expression: "'required'"
                  }
                ],
                staticClass: "w-full",
                attrs: { label: "Title", name: "title" },
                model: {
                  value: _vm.category.title,
                  callback: function($$v) {
                    _vm.$set(_vm.category, "title", $$v)
                  },
                  expression: "category.title"
                }
              }),
              _vm._v(" "),
              _c(
                "span",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.errors.has("title"),
                      expression: "errors.has('title')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("title")))]
              ),
              _vm._v(" "),
              _c("vs-input", {
                directives: [
                  {
                    name: "validate",
                    rawName: "v-validate",
                    value: "required",
                    expression: "'required'"
                  }
                ],
                staticClass: "w-full",
                attrs: { label: "Coding", name: "coding" },
                model: {
                  value: _vm.category.coding,
                  callback: function($$v) {
                    _vm.$set(_vm.category, "coding", $$v)
                  },
                  expression: "category.coding"
                }
              }),
              _vm._v(" "),
              _c(
                "span",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.errors.has("coding"),
                      expression: "errors.has('coding')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("coding")))]
              ),
              _vm._v(" "),
              _c("vs-upload", {
                ref: "fileUpload",
                staticClass: "img-upload",
                attrs: {
                  limit: 1,
                  "show-upload-button": false,
                  text: "Upload Image"
                },
                on: {
                  change: function($event) {
                    return _vm.uploadFiles()
                  }
                }
              })
            ],
            1
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "flex flex-wrap items-center justify-center p-6",
          attrs: { slot: "footer" },
          slot: "footer"
        },
        [
          _c(
            "vs-button",
            {
              staticClass: "mr-6",
              on: {
                click: function($event) {
                  $event.preventDefault()
                  return _vm.submitForm($event)
                }
              }
            },
            [_vm._v("Add Data")]
          ),
          _vm._v(" "),
          _c(
            "vs-button",
            {
              attrs: { type: "border", color: "danger" },
              on: {
                click: function($event) {
                  _vm.isSidebarActiveLocal = false
                }
              }
            },
            [_vm._v("Cancel")]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241& ***!
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
  return _c(
    "div",
    {
      staticClass: "data-list-container",
      attrs: { id: "data-list-thumb-view" }
    },
    [
      _c(
        "vs-alert",
        {
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.alertActive,
              expression: "alertActive"
            }
          ],
          attrs: {
            color: "success",
            title: "Success",
            closable: "",
            "icon-pack": "feather",
            "close-icon": "icon-x-circle"
          },
          on: {
            click: function($event) {
              _vm.alertActive = false
            }
          }
        },
        [_vm._v("\n      " + _vm._s(_vm.alertSuccess) + ".\n  ")]
      ),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("add-new-category", {
        attrs: { isSidebarActive: _vm.addNewDataSidebar },
        on: {
          update: _vm.onChildUpdate,
          closeSidebar: function($event) {
            _vm.addNewDataSidebar = false
          }
        }
      }),
      _vm._v(" "),
      _c(
        "vs-prompt",
        {
          staticClass: "export-options",
          attrs: {
            title: "Export To Excel",
            "accept-text": "Export",
            active: _vm.activePrompt
          },
          on: {
            cancle: _vm.clearFields,
            accept: _vm.exportToExcel,
            close: _vm.clearFields,
            "update:active": function($event) {
              _vm.activePrompt = $event
            }
          }
        },
        [
          _c("vs-input", {
            staticClass: "w-full",
            attrs: { placeholder: "Enter File Name.." },
            model: {
              value: _vm.fileName,
              callback: function($$v) {
                _vm.fileName = $$v
              },
              expression: "fileName"
            }
          }),
          _vm._v(" "),
          _c("v-select", {
            staticClass: "my-4",
            attrs: { options: _vm.formats },
            model: {
              value: _vm.selectedFormat,
              callback: function($$v) {
                _vm.selectedFormat = $$v
              },
              expression: "selectedFormat"
            }
          }),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "flex" },
            [
              _c("span", { staticClass: "mr-4" }, [_vm._v("Cell Auto Width:")]),
              _vm._v(" "),
              _c(
                "vs-switch",
                {
                  model: {
                    value: _vm.cellAutoWidth,
                    callback: function($$v) {
                      _vm.cellAutoWidth = $$v
                    },
                    expression: "cellAutoWidth"
                  }
                },
                [_vm._v("Cell Auto Width")]
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "vs-table",
        {
          ref: "table",
          attrs: {
            multiple: "",
            "max-items": _vm.itemsPerPage,
            data: _vm.categorys
          },
          scopedSlots: _vm._u([
            {
              key: "default",
              fn: function(ref) {
                var data = ref.data
                return [
                  _c(
                    "tbody",
                    _vm._l(data, function(tr, indextr) {
                      return _c(
                        "vs-tr",
                        { key: indextr, attrs: { data: tr } },
                        [
                          _c("vs-td", { staticClass: "img-container" }, [
                            _c("img", {
                              staticClass: "product-img",
                              attrs: { src: tr.image }
                            })
                          ]),
                          _vm._v(" "),
                          _c("vs-td", [
                            _c(
                              "p",
                              { staticClass: "product-name font-medium" },
                              [_vm._v(_vm._s(tr.title))]
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-td", [
                            _c("p", { staticClass: "product-category" }, [
                              _vm._v(_vm._s(tr.coding))
                            ])
                          ]),
                          _vm._v(" "),
                          _vm.$route.params.id
                            ? _c("vs-td", [
                                _c(
                                  "p",
                                  { staticClass: "product-sub_category" },
                                  [_vm._v(_vm._s(tr.cat ? tr.cat.title : ""))]
                                )
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _c("vs-td", [
                            _c(
                              "div",
                              { staticClass: "demo-alignment" },
                              [
                                _c(
                                  "vx-tooltip",
                                  {
                                    attrs: {
                                      color: "success",
                                      text: "Edit Category"
                                    }
                                  },
                                  [
                                    _c("vs-button", {
                                      attrs: {
                                        color: "success",
                                        type: "border",
                                        "icon-pack": "feather",
                                        icon: "icon-edit"
                                      },
                                      on: {
                                        click: function($event) {
                                          return _vm.edit(tr.id)
                                        }
                                      }
                                    })
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c(
                                  "vx-tooltip",
                                  {
                                    attrs: {
                                      color: "danger",
                                      text: "Delete Category"
                                    }
                                  },
                                  [
                                    _c("vs-button", {
                                      attrs: {
                                        color: "danger",
                                        type: "border",
                                        "icon-pack": "feather",
                                        icon: "icon-trash"
                                      },
                                      on: {
                                        click: function($event) {
                                          return _vm.deleteCategory(tr.id)
                                        }
                                      }
                                    })
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c(
                                  "vx-tooltip",
                                  {
                                    attrs: {
                                      refs: "tool",
                                      color: "warning",
                                      text: "Show Sub Category"
                                    }
                                  },
                                  [
                                    tr.sub_cats_count > 0
                                      ? _c("vs-button", {
                                          attrs: {
                                            color: "warning",
                                            type: "border",
                                            "icon-pack": "feather",
                                            icon: "icon-play"
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.showSubCat(tr.id)
                                            }
                                          }
                                        })
                                      : _vm._e()
                                  ],
                                  1
                                )
                              ],
                              1
                            )
                          ])
                        ],
                        1
                      )
                    }),
                    1
                  )
                ]
              }
            }
          ]),
          model: {
            value: _vm.selected,
            callback: function($$v) {
              _vm.selected = $$v
            },
            expression: "selected"
          }
        },
        [
          _c(
            "div",
            {
              staticClass:
                "flex flex-wrap-reverse items-center flex-grow justify-between",
              attrs: { slot: "header" },
              slot: "header"
            },
            [
              _c(
                "div",
                { staticClass: "flex flex-wrap-reverse items-center" },
                [
                  _c(
                    "vs-dropdown",
                    {
                      staticClass: "cursor-pointer mr-4 mb-4",
                      attrs: { "vs-trigger-click": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass:
                            "p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32"
                        },
                        [
                          _c("span", { staticClass: "mr-2" }, [
                            _vm._v("Actions")
                          ]),
                          _vm._v(" "),
                          _c("feather-icon", {
                            attrs: {
                              icon: "ChevronDownIcon",
                              svgClasses: "h-4 w-4"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "vs-dropdown-menu",
                        [
                          _c("vs-dropdown-item", [
                            _c(
                              "span",
                              {
                                staticClass:
                                  "flex items-center justify-center w-full"
                              },
                              [
                                _c("feather-icon", {
                                  attrs: {
                                    icon: "TrashIcon",
                                    svgClasses:
                                      "w-5 h-5 hover:text-danger stroke-current"
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "span",
                                  {
                                    on: {
                                      click: function($event) {
                                        return _vm.delet_all_selected()
                                      }
                                    }
                                  },
                                  [_vm._v("Delete")]
                                )
                              ],
                              1
                            )
                          ]),
                          _vm._v(" "),
                          _c("vs-dropdown-item", [
                            _c(
                              "span",
                              {
                                staticClass:
                                  "flex items-center justify-center w-full"
                              },
                              [
                                _c("feather-icon", {
                                  attrs: {
                                    icon: "FileIcon",
                                    svgClasses:
                                      "w-5 h-5 hover:text-success stroke-current"
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "span",
                                  {
                                    on: {
                                      click: function($event) {
                                        _vm.activePrompt = true
                                      }
                                    }
                                  },
                                  [_vm._v("Export")]
                                )
                              ],
                              1
                            )
                          ])
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary",
                      on: {
                        click: function($event) {
                          _vm.addNewDataSidebar = true
                        }
                      }
                    },
                    [
                      _c("feather-icon", {
                        attrs: { icon: "PlusIcon", svgClasses: "h-4 w-4" }
                      }),
                      _vm._v(" "),
                      _c(
                        "span",
                        { staticClass: "ml-2 text-base text-primary" },
                        [_vm._v("Add New")]
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "flex flex-wrap-reverse items-center" },
                [
                  _c(
                    "vs-dropdown",
                    {
                      staticClass: "cursor-pointer mb-4 mr-4",
                      attrs: { "vs-trigger-click": "" }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass:
                            "p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium"
                        },
                        [
                          _c("span", { staticClass: "mr-2" }, [
                            _vm._v(
                              _vm._s(
                                _vm.currentPage * _vm.itemsPerPage -
                                  (_vm.itemsPerPage - 1)
                              ) +
                                " - " +
                                _vm._s(
                                  _vm.categorys.length -
                                    _vm.currentPage * _vm.itemsPerPage >
                                    0
                                    ? _vm.currentPage * _vm.itemsPerPage
                                    : _vm.categorys.length
                                ) +
                                " of " +
                                _vm._s(_vm.categorys.length)
                            )
                          ]),
                          _vm._v(" "),
                          _c("feather-icon", {
                            attrs: {
                              icon: "ChevronDownIcon",
                              svgClasses: "h-4 w-4"
                            }
                          })
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "vs-dropdown-menu",
                        [
                          _c(
                            "vs-dropdown-item",
                            {
                              on: {
                                click: function($event) {
                                  _vm.itemsPerPage = 10
                                }
                              }
                            },
                            [_c("span", [_vm._v("10")])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-dropdown-item",
                            {
                              on: {
                                click: function($event) {
                                  _vm.itemsPerPage = 25
                                }
                              }
                            },
                            [_c("span", [_vm._v("25")])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-dropdown-item",
                            {
                              on: {
                                click: function($event) {
                                  _vm.itemsPerPage = 50
                                }
                              }
                            },
                            [_c("span", [_vm._v("50")])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-dropdown-item",
                            {
                              on: {
                                click: function($event) {
                                  _vm.itemsPerPage = 100
                                }
                              }
                            },
                            [_c("span", [_vm._v("100")])]
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "con-input-search vs-table--search cursor-pointer"
                    },
                    [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.searchx,
                            expression: "searchx"
                          }
                        ],
                        staticClass: "input-search vs-table--search-input",
                        attrs: { type: "text" },
                        domProps: { value: _vm.searchx },
                        on: {
                          keyup: _vm.handleSearch,
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.searchx = $event.target.value
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c("vs-icon", { attrs: { icon: "search" } })
                    ],
                    1
                  )
                ],
                1
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "template",
            { slot: "thead" },
            [
              _c("vs-th", [_vm._v("Image")]),
              _vm._v(" "),
              _c("vs-th", { attrs: { "sort-key": "name" } }, [_vm._v("Title")]),
              _vm._v(" "),
              _c("vs-th", { attrs: { "sort-key": "email" } }, [
                _vm._v("Coding")
              ]),
              _vm._v(" "),
              _vm.$route.params.id
                ? _c("vs-th", { attrs: { "sort-key": "email" } }, [
                    _vm._v("Parent Category")
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("vs-th", [_vm._v("Action")])
            ],
            1
          )
        ],
        2
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "mt-5" },
        [
          _c("vs-pagination", {
            attrs: { total: _vm.total, goto: "" },
            model: {
              value: _vm.currentx,
              callback: function($$v) {
                _vm.currentx = $$v
              },
              expression: "currentx"
            }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "vs-popup",
        {
          attrs: { title: "UpdateCategory", active: _vm.popupActive },
          on: {
            "update:active": function($event) {
              _vm.popupActive = $event
            }
          }
        },
        [
          _c("server-error", {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.errorActive,
                expression: "errorActive"
              }
            ],
            attrs: { alertActi: _vm.er_active, data: _vm.SError }
          }),
          _vm._v(" "),
          _c("label", { attrs: { for: "category" } }, [
            _vm._v("Parent Category")
          ]),
          _vm._v(" "),
          _c("v-select", {
            attrs: { options: _vm.options },
            model: {
              value: _vm.category.parent_id,
              callback: function($$v) {
                _vm.$set(_vm.category, "parent_id", $$v)
              },
              expression: "category.parent_id"
            }
          }),
          _vm._v(" "),
          _c("vs-input", {
            directives: [
              {
                name: "validate",
                rawName: "v-validate",
                value: "required",
                expression: "'required'"
              }
            ],
            staticClass: "w-full",
            attrs: { label: "Title", name: "title" },
            model: {
              value: _vm.category.title,
              callback: function($$v) {
                _vm.$set(_vm.category, "title", $$v)
              },
              expression: "category.title"
            }
          }),
          _vm._v(" "),
          _c(
            "span",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.errors.has("title"),
                  expression: "errors.has('title')"
                }
              ],
              staticClass: "text-danger text-sm"
            },
            [_vm._v(_vm._s(_vm.errors.first("title")))]
          ),
          _vm._v(" "),
          _c("vs-input", {
            directives: [
              {
                name: "validate",
                rawName: "v-validate",
                value: "required",
                expression: "'required'"
              }
            ],
            staticClass: "w-full",
            attrs: { label: "Coding", name: "coding" },
            model: {
              value: _vm.category.coding,
              callback: function($$v) {
                _vm.$set(_vm.category, "coding", $$v)
              },
              expression: "category.coding"
            }
          }),
          _vm._v(" "),
          _c(
            "span",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.errors.has("coding"),
                  expression: "errors.has('coding')"
                }
              ],
              staticClass: "text-danger text-sm"
            },
            [_vm._v(_vm._s(_vm.errors.first("coding")))]
          ),
          _vm._v(" "),
          _c("vs-upload", {
            ref: "fileUpload",
            staticClass: "img-upload",
            attrs: {
              limit: 1,
              "show-upload-button": false,
              text: "Upload Image",
              "single-upload": true
            },
            on: {
              change: function($event) {
                return _vm.uploadFiles()
              }
            }
          }),
          _vm._v(" "),
          _c(
            "vs-button",
            {
              staticClass: "mr-6",
              on: {
                click: function($event) {
                  $event.preventDefault()
                  return _vm.updateCategory($event)
                }
              }
            },
            [_vm._v("Update Data")]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/views/ServerError.vue":
/*!************************************************!*\
  !*** ./resources/js/src/views/ServerError.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ServerError.vue?vue&type=template&id=03d9dacb& */ "./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb&");
/* harmony import */ var _ServerError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ServerError.vue?vue&type=script&lang=js& */ "./resources/js/src/views/ServerError.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ServerError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/ServerError.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/ServerError.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/src/views/ServerError.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServerError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ServerError.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/ServerError.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServerError_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb&":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ServerError.vue?vue&type=template&id=03d9dacb& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/ServerError.vue?vue&type=template&id=03d9dacb&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ServerError_vue_vue_type_template_id_03d9dacb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/categorys/AddNewCategory.vue":
/*!*************************************************************!*\
  !*** ./resources/js/src/views/categorys/AddNewCategory.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true& */ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true&");
/* harmony import */ var _AddNewCategory_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AddNewCategory.vue?vue&type=script&lang=js& */ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& */ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _AddNewCategory_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "e1e5c5be",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/categorys/AddNewCategory.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewCategory.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&":
/*!***********************************************************************************************************************!*\
  !*** ./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& ***!
  \***********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=style&index=0&id=e1e5c5be&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_style_index_0_id_e1e5c5be_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true&":
/*!********************************************************************************************************!*\
  !*** ./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true& ***!
  \********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/AddNewCategory.vue?vue&type=template&id=e1e5c5be&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewCategory_vue_vue_type_template_id_e1e5c5be_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/categorys/categorys.vue":
/*!********************************************************!*\
  !*** ./resources/js/src/views/categorys/categorys.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./categorys.vue?vue&type=template&id=73e7e241& */ "./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241&");
/* harmony import */ var _categorys_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./categorys.vue?vue&type=script&lang=js& */ "./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./categorys.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _categorys_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__["render"],
  _categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/categorys/categorys.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./categorys.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&":
/*!******************************************************************************************!*\
  !*** ./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./categorys.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241&":
/*!***************************************************************************************!*\
  !*** ./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./categorys.vue?vue&type=template&id=73e7e241& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/categorys/categorys.vue?vue&type=template&id=73e7e241&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_categorys_vue_vue_type_template_id_73e7e241___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);