(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[18],{

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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-perfect-scrollbar */ "./node_modules/vue-perfect-scrollbar/dist/index.js");
/* harmony import */ var vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @/views/ServerError.vue */ "./resources/js/src/views/ServerError.vue");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__);
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
    isUsers: '',
    isSidebarActive: {
      type: Boolean,
      required: true
    }
  },
  data: function data() {
    return {
      data: new FormData(),
      center: {
        lat: 47.376332,
        lng: 8.547511
      },
      infoContent: '',
      infoWindowPos: null,
      infoWinOpen: false,
      currentMidx: null,
      selectoroption: [{
        value: 1,
        label: 'True'
      }, {
        value: 'null',
        label: 'False'
      }],
      //optional: offset infowindow so it visually sits nicely on top of our marker
      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        }
      },
      coordinates: {
        lat: 47.376332,
        lng: 8.547511
      },
      setting: {
        'key': '',
        'value': '',
        'type_id': ''
      },
      SError: [],
      options: [],
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
      this.setting.name = '';
      this.setting.type_id = '';
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
          thisIns.data.append('key', thisIns.setting.key);
          thisIns.data.append('type_id', thisIns.setting.type_id.id);

          if (!thisIns.data.has('value')) {
            thisIns.data.append('value', thisIns.setting.value);
          }

          thisIns.$http.post(location.origin + '/api/settings', thisIns.data, config).then(function (response) {
            if (response.data.status == "success") thisIns.er_active = false;
            thisIns.errorActive = false;
            thisIns.data = new FormData();
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
    toggleInfoWindow: function toggleInfoWindow(marker, idx) {
      this.infoWindowPos = marker.position;
      this.infoContent = marker.infoText; //check if its the same marker that was selected if yes toggle

      if (this.currentMidx == idx) {
        this.infoWinOpen = !this.infoWinOpen;
      } //if different marker set infowindow to open and reset current marker index
      else {
          this.infoWinOpen = true;
          this.currentMidx = idx;
        }
    },
    updateCoordinates: function updateCoordinates(location) {
      this.coordinates = {
        lat: location.latLng.lat(),
        lng: location.latLng.lng()
      };
      this.data.append('value', location.latLng.lat() + ',' + location.latLng.lng());
    },
    uploadFiles: function uploadFiles() {
      var files = this.$refs.fileUpload.$refs.fileInput.files;
      this.data.append('value', files[0]);
    }
  },
  mounted: function mounted() {
    //do something after creating vue instance
    var thisIns = this;
    this.$http.get('/api/content_type').then(function (response) {
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
    VuePerfectScrollbar: vue_perfect_scrollbar__WEBPACK_IMPORTED_MODULE_3___default.a,
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_5___default.a,
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__["quillEditor"],
    ServerError: _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_4__["default"]
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! quill/dist/quill.core.css */ "./node_modules/quill/dist/quill.core.css");
/* harmony import */ var quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_core_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! quill/dist/quill.snow.css */ "./node_modules/quill/dist/quill.snow.css");
/* harmony import */ var quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_snow_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! quill/dist/quill.bubble.css */ "./node_modules/quill/dist/quill.bubble.css");
/* harmony import */ var quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(quill_dist_quill_bubble_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _AddNewSetting_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./AddNewSetting.vue */ "./resources/js/src/views/settings/AddNewSetting.vue");
/* harmony import */ var _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @/views/ServerError.vue */ "./resources/js/src/views/ServerError.vue");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-select */ "./node_modules/vue-select/dist/vue-select.js");
/* harmony import */ var vue_select__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_select__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-quill-editor */ "./node_modules/vue-quill-editor/dist/vue-quill-editor.js");
/* harmony import */ var vue_quill_editor__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__);
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
    AddNewSetting: _AddNewSetting_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    'v-select': vue_select__WEBPACK_IMPORTED_MODULE_5___default.a,
    quillEditor: vue_quill_editor__WEBPACK_IMPORTED_MODULE_6__["quillEditor"],
    ServerError: _views_ServerError_vue__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  props: ['id'],
  data: function data() {
    var _ref;

    return _ref = {
      selected: [],
      settings: [],
      SError: []
    }, _defineProperty(_ref, "selected", []), _defineProperty(_ref, "settingId", ''), _defineProperty(_ref, "options", []), _defineProperty(_ref, "DataEdit", new FormData()), _defineProperty(_ref, "setting", {
      'key': '',
      'value': '',
      'type_id': ''
    }), _defineProperty(_ref, "selectoroption", [{
      value: 1,
      label: 'True'
    }, {
      value: 'null',
      label: 'False'
    }]), _defineProperty(_ref, "url", '/api/settings'), _defineProperty(_ref, "currentx", 1), _defineProperty(_ref, "popupActive", false), _defineProperty(_ref, "alertActive", false), _defineProperty(_ref, "errorActive", false), _defineProperty(_ref, "er_active", false), _defineProperty(_ref, "alertSuccess", 'Alert'), _defineProperty(_ref, "itemsPerPage", 4), _defineProperty(_ref, "total", 1), _defineProperty(_ref, "searchx", ''), _defineProperty(_ref, "isMounted", false), _defineProperty(_ref, "addNewDataSidebar", false), _defineProperty(_ref, "center", {
      lat: 47.376332,
      lng: 8.547511
    }), _defineProperty(_ref, "infoContent", ''), _defineProperty(_ref, "infoWindowPos", null), _defineProperty(_ref, "infoWinOpen", false), _defineProperty(_ref, "currentMidx", null), _defineProperty(_ref, "infoOptions", {
      pixelOffset: {
        width: 0,
        height: -35
      }
    }), _defineProperty(_ref, "coordinates", {
      lat: 47.376332,
      lng: 8.547511
    }), _defineProperty(_ref, "editorOption", {
      theme: 'bubble'
    }), _ref;
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
    onChildUpdate: function onChildUpdate(setting) {
      this.alertActive = true;
      this.alertSuccess = 'Setting Added SuccessFully';
      this.getSetting();
    },
    edit: function edit(id) {
      var _this = this;

      this.settingId = id;
      this.$http.get('/api/settings/' + id + '/edit').then(function (response) {
        _this.setting.key = response.data.data.key;
        _this.setting.type_id = {
          id: response.data.data.type.id,
          label: response.data.data.type.title
        };

        if (response.data.data.type.id == 3 || response.data.data.type.id == 4 || response.data.data.type.id == 5) {
          _this.$refs.fileUpload.srcs = [{
            src: response.data.data.value,
            orientation: 'm',
            type: 'image',
            percent: null,
            error: false,
            remove: null
          }];
        }

        if (response.data.data.type.id == 1 || response.data.data.type.id == 2) {
          _this.setting.value = response.data.data.value;
        }

        if (response.data.data.type.id == 6) {
          _this.setting.value = response.data.data.value ? {
            value: 1,
            label: 'True'
          } : {
            value: 0,
            label: 'False'
          };
        }

        if (response.data.data.type.id == 7) {
          _this.coordinates = {
            lat: parseFloat(response.data.data.value.split(',')[0]),
            lng: parseFloat(response.data.data.value.split(',')[1])
          };
          console.log(_this.coordinates);
          var bounds = new google.maps.LatLngBounds();
          bounds.extend(_this.coordinates);

          _this.$refs.mapRef.fitBounds(bounds);
        }

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
    deleteSetting: function deleteSetting(id) {
      var _this = this;

      this.$http.delete('/api/settings/' + id).then(function (response) {
        _this.$vs.notify({
          title: 'Success',
          text: response.data.status,
          color: 'success',
          iconPack: 'feather',
          icon: 'icon-success-circle'
        });

        _this.alertActive = true;
        _this.alertSuccess = response.data.message;

        _this.getSetting(_this.currentx); //_this.currentx = _this.currentx + 1

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
    updateSetting: function updateSetting() {
      var thisIns = this;
      this.$validator.validateAll().then(function (result) {
        if (result) {
          var config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
          thisIns.DataEdit.append('key', thisIns.setting.key);
          thisIns.DataEdit.append('type_id', thisIns.setting.type_id.id);

          if (!thisIns.DataEdit.has('value')) {
            thisIns.DataEdit.append('value', thisIns.setting.value);
          }

          thisIns.DataEdit.append('_method', 'patch');
          thisIns.$http.post(location.origin + '/api/settings/' + thisIns.settingId, thisIns.DataEdit, config).then(function (response) {
            thisIns.er_active = false;
            thisIns.errorActive = false;
            thisIns.popupActive = false;
            thisIns.DataEdit = new FormData();
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
            thisIns.getSetting(thisIns.currentx); //thisIns.currentx = thisIns.currentx + 1
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
      var delete_data = new FormData();
      delete_data.append('all_data', result);
      delete_data.append('table', 'settings');
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

        _this.getSetting(_this.currentx); //_this.currentx = _this.currentx + 1

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
    showCity: function showCity(id) {
      this.$router.replace('/citys/' + id);
    },
    getSetting: function getSetting() {
      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.$vs.loading();
      var value = page ? page : 1;
      var thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&search=' + this.searchx : this.url + '?page=' + valued + '&search=' + this.searchx).then(function (response) {
        thisIns.settings = response.data.data.settings.data;
        thisIns.currentx = response.data.data.settings.current_page;
        thisIns.itemsPerPage = response.data.data.settings.per_page;
        thisIns.total = response.data.data.settings.last_page;
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
    toggleInfoWindow: function toggleInfoWindow(marker, idx) {
      this.infoWindowPos = marker.position;
      this.infoContent = marker.infoText; //check if its the same marker that was selected if yes toggle

      if (this.currentMidx == idx) {
        this.infoWinOpen = !this.infoWinOpen;
      } //if different marker set infowindow to open and reset current marker index
      else {
          this.infoWinOpen = true;
          this.currentMidx = idx;
        }
    },
    updateCoordinates: function updateCoordinates(location) {
      this.coordinates = {
        lat: location.latLng.lat(),
        lng: location.latLng.lng()
      };
      this.DataEdit.append('value', location.latLng.lat() + ',' + location.latLng.lng());
    },
    uploadFiles: function uploadFiles() {
      var files = this.$refs.fileUpload.$refs.fileInput.files;
      this.DataEdit.append('value', files[0]);
    },
    handleSearch: function handleSearch() {
      this.$vs.loading();
      var thisIns = this;
      this.$http.get(this.url.indexOf('?') > -1 ? this.url + '&search=' + this.searchx : this.url + '?search=' + this.searchx).then(function (response) {
        thisIns.settings = response.data.data.settings.data;
        thisIns.currentx = response.data.data.settings.current_page;
        thisIns.itemsPerPage = response.data.data.settings.per_page;
        thisIns.total = response.data.data.settings.last_page;
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
  watch: {
    currentx: {
      handler: function handler(value) {
        this.$vs.loading();
        var thisIns = this;
        this.$http.get(this.url.indexOf('?') > -1 ? this.url + '&page=' + value + '&type_id=' + this.$route.params.id + '&search=' + this.searchx : this.url + '?page=' + value + '&type_id=' + this.$route.params.id + '&search=' + this.searchx).then(function (response) {
          thisIns.settings = response.data.data.settings.data;
          thisIns.currentx = response.data.data.settings.current_page;
          thisIns.itemsPerPage = response.data.data.settings.per_page;
          thisIns.total = response.data.data.settings.last_page;
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
        this.url = '/api/settings?per_page=' + itemsPerPage + '&search=' + this.searchx;
        this.$http.get(this.url).then(function (response) {
          thisIns.settings = response.data.data.settings.data;
          thisIns.currentx = response.data.data.settings.current_page;
          thisIns.itemsPerPage = response.data.data.settings.per_page;
          thisIns.total = response.data.data.settings.last_page;
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
    this.$http.get(this.url).then(function (response) {
      thisIns.settings = response.data.data.settings.data;
      thisIns.currentx = response.data.data.settings.current_page;
      thisIns.itemsPerPage = response.data.data.settings.per_page;
      thisIns.total = response.data.data.settings.last_page;
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
    this.$http.get('/api/content_type').then(function (response) {
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

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".add-new-data-sidebar[data-v-242df40f]  .vs-sidebar--background {\n  z-index: 52010;\n}\n.add-new-data-sidebar[data-v-242df40f]  .vs-sidebar {\n  z-index: 52010;\n  width: 400px;\n  max-width: 90vw;\n}\n[dir] .add-new-data-sidebar[data-v-242df40f]  .vs-sidebar .img-upload {\n  margin-top: 2rem;\n}\n[dir] .add-new-data-sidebar[data-v-242df40f]  .vs-sidebar .img-upload .con-img-upload {\n  padding: 0;\n}\n.add-new-data-sidebar[data-v-242df40f]  .vs-sidebar .img-upload .con-input-upload {\n  width: 100%;\n}\n[dir] .add-new-data-sidebar[data-v-242df40f]  .vs-sidebar .img-upload .con-input-upload {\n  margin: 0;\n}\n.scroll-area--data-list-add-new[data-v-242df40f] {\n  height: calc(100% - 4.3rem);\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#data-list-thumb-view .vs-con-table .vs-table--header {\n  display: -webkit-box;\n  display: flex;\n  flex-wrap: wrap-reverse;\n}[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header {\n  margin-left: 1.5rem;\n  margin-right: 1.5rem;\n}[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header {\n  margin-right: 1.5rem;\n  margin-left: 1.5rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table--header > span {\n  display: -webkit-box;\n  display: flex;\n  -webkit-box-flex: 1;\n          flex-grow: 1;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search {\n  padding-top: 0;\n}\n#data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input {\n  font-size: 1rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input {\n  padding: 0.9rem 2.5rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input + i {\n  left: 1rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input + i {\n  right: 1rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input:focus + i {\n  left: 1rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table--header .vs-table--search .vs-table--search-input:focus + i {\n  right: 1rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table {\n  border-collapse: separate;\n  border-spacing: 0 1.3rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table {\n  padding: 0 1rem;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr {\n  box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.05);\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr td {\n  padding: 10px;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table tr td:first-child {\n  border-top-left-radius: 0.5rem;\n  border-bottom-left-radius: 0.5rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table tr td:first-child {\n  border-top-right-radius: 0.5rem;\n  border-bottom-right-radius: 0.5rem;\n}\n[dir=ltr] #data-list-thumb-view .vs-con-table .vs-table tr td:last-child {\n  border-top-right-radius: 0.5rem;\n  border-bottom-right-radius: 0.5rem;\n}\n[dir=rtl] #data-list-thumb-view .vs-con-table .vs-table tr td:last-child {\n  border-top-left-radius: 0.5rem;\n  border-bottom-left-radius: 0.5rem;\n}\n#data-list-thumb-view .vs-con-table .vs-table tr td.img-container span {\n  display: -webkit-box;\n  display: flex;\n  -webkit-box-pack: center;\n          justify-content: center;\n}\n#data-list-thumb-view .vs-con-table .vs-table tr td.img-container .product-img {\n  height: 110px;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table tr td.td-check {\n  padding: 20px !important;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead th {\n  padding-top: 0;\n  padding-bottom: 0;\n}\n#data-list-thumb-view .vs-con-table .vs-table--thead th .vs-table-text {\n  text-transform: uppercase;\n  font-weight: 600;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead th.td-check {\n  padding: 0 15px !important;\n}\n[dir] #data-list-thumb-view .vs-con-table .vs-table--thead tr {\n  background: none;\n  box-shadow: none;\n}\n#data-list-thumb-view .vs-con-table .vs-table--pagination {\n  -webkit-box-pack: center;\n          justify-content: center;\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&");

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

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./settings.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
              _c("label", { attrs: { for: "type" } }, [_vm._v("Setting Type")]),
              _vm._v(" "),
              _c("v-select", {
                directives: [
                  {
                    name: "validate",
                    rawName: "v-validate",
                    value: "required",
                    expression: "'required'"
                  }
                ],
                attrs: { name: "type", options: _vm.options },
                model: {
                  value: _vm.setting.type_id,
                  callback: function($$v) {
                    _vm.$set(_vm.setting, "type_id", $$v)
                  },
                  expression: "setting.type_id"
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
                      value: _vm.errors.has("type"),
                      expression: "errors.has('type')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("type")))]
              ),
              _vm._v(" "),
              _c("br"),
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
                attrs: { label: "Key", name: "key" },
                model: {
                  value: _vm.setting.key,
                  callback: function($$v) {
                    _vm.$set(_vm.setting, "key", $$v)
                  },
                  expression: "setting.key"
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
                      value: _vm.errors.has("key"),
                      expression: "errors.has('key')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("key")))]
              ),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _vm.setting.type_id.id == 1
                ? _c("p", { staticClass: "mb-5" }, [_vm._v("Value")])
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 1
                ? _c("quill-editor", {
                    staticStyle: { height: "100%" },
                    model: {
                      value: _vm.setting.value,
                      callback: function($$v) {
                        _vm.$set(_vm.setting, "value", $$v)
                      },
                      expression: "setting.value"
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 2
                ? _c("vs-input", {
                    directives: [
                      {
                        name: "validate",
                        rawName: "v-validate",
                        value: "required",
                        expression: "'required'"
                      }
                    ],
                    staticClass: "w-full",
                    attrs: { label: "Value", name: "value" },
                    model: {
                      value: _vm.setting.value,
                      callback: function($$v) {
                        _vm.$set(_vm.setting, "value", $$v)
                      },
                      expression: "setting.value"
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _c(
                "span",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.errors.has("value"),
                      expression: "errors.has('value')"
                    }
                  ],
                  staticClass: "text-danger text-sm"
                },
                [_vm._v(_vm._s(_vm.errors.first("value")))]
              ),
              _vm._v(" "),
              _vm.setting.type_id.id == 3
                ? _c("vs-upload", {
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
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 4
                ? _c("vs-upload", {
                    ref: "fileUpload",
                    staticClass: "img-upload",
                    attrs: {
                      limit: 1,
                      "show-upload-button": false,
                      text: "Upload Video"
                    },
                    on: {
                      change: function($event) {
                        return _vm.uploadFiles()
                      }
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 5
                ? _c("vs-upload", {
                    ref: "fileUpload",
                    staticClass: "img-upload",
                    attrs: {
                      limit: 1,
                      "show-upload-button": false,
                      text: "Upload Audio"
                    },
                    on: {
                      change: function($event) {
                        return _vm.uploadFiles()
                      }
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 6
                ? _c("v-select", {
                    staticClass: "selectExample",
                    attrs: { name: "type", options: _vm.selectoroption },
                    model: {
                      value: _vm.setting.value,
                      callback: function($$v) {
                        _vm.$set(_vm.setting, "value", $$v)
                      },
                      expression: "setting.value"
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.setting.type_id.id == 7
                ? _c(
                    "div",
                    { staticClass: "w-full" },
                    [
                      _c(
                        "gmap-map",
                        {
                          staticStyle: { width: "100%", height: "500px" },
                          attrs: { center: _vm.center, zoom: 15 }
                        },
                        [
                          _c(
                            "gmap-info-window",
                            {
                              attrs: {
                                options: _vm.infoOptions,
                                position: _vm.infoWindowPos,
                                opened: _vm.infoWinOpen
                              },
                              on: {
                                closeclick: function($event) {
                                  _vm.infoWinOpen = false
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.infoContent) +
                                  "\n              "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c("gmap-marker", {
                            attrs: {
                              position: _vm.coordinates,
                              clickable: true,
                              draggable: true
                            },
                            on: {
                              drag: _vm.updateCoordinates,
                              click: function($event) {
                                return _vm.toggleInfoWindow(_vm.m, _vm.i)
                              }
                            }
                          })
                        ],
                        1
                      )
                    ],
                    1
                  )
                : _vm._e()
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
      _c("add-new-setting", {
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
        "vs-table",
        {
          ref: "table",
          attrs: {
            multiple: "",
            "max-items": _vm.itemsPerPage,
            data: _vm.settings
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
                          _c("vs-td", [
                            _c(
                              "p",
                              { staticClass: "product-name font-medium" },
                              [_vm._v(_vm._s(tr.key))]
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "vs-td",
                            { class: [tr.type.id == 3 ? "img-container" : ""] },
                            [
                              tr.type.id == 1 ||
                              tr.type.id == 2 ||
                              tr.type.id == 7
                                ? _c("p", {
                                    staticClass: "product-name font-medium",
                                    domProps: { innerHTML: _vm._s(tr.value) }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              tr.type.id == 3
                                ? _c("img", {
                                    staticClass: "product-img",
                                    attrs: { src: tr.value }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              tr.type.id == 4
                                ? _c(
                                    "video",
                                    {
                                      staticClass: "product-img",
                                      attrs: { src: tr.value, controls: "" }
                                    },
                                    [
                                      _c("source", {
                                        attrs: {
                                          src: tr.value,
                                          type: "video/*"
                                        }
                                      })
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              tr.type.id == 5
                                ? _c(
                                    "audio",
                                    { attrs: { src: tr.value, controls: "" } },
                                    [
                                      _c("source", {
                                        attrs: {
                                          src: tr.value,
                                          type: "audio/*"
                                        }
                                      })
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              tr.type.id == 6
                                ? _c(
                                    "p",
                                    { staticClass: "product-name font-medium" },
                                    [
                                      _vm._v(
                                        _vm._s(tr.value ? "True" : "False")
                                      )
                                    ]
                                  )
                                : _vm._e()
                            ]
                          ),
                          _vm._v(" "),
                          _c("vs-td", [
                            _c("p", { staticClass: "product-category" }, [
                              _vm._v(_vm._s(tr.type ? tr.type.title : ""))
                            ])
                          ]),
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
                                      text: "Edit Setting"
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
                                      text: "Delete Setting"
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
                                          return _vm.deleteSetting(tr.id)
                                        }
                                      }
                                    })
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
                            _c("span", [_vm._v("Print")])
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
                                  _vm.settings.length -
                                    _vm.currentPage * _vm.itemsPerPage >
                                    0
                                    ? _vm.currentPage * _vm.itemsPerPage
                                    : _vm.settings.length
                                ) +
                                " of " +
                                _vm._s(_vm.settings.length)
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
              _c("vs-th", { attrs: { "sort-key": "name" } }, [_vm._v("Key")]),
              _vm._v(" "),
              _c("vs-th", { attrs: { "sort-key": "type" } }, [_vm._v("Value")]),
              _vm._v(" "),
              _c("vs-th", { attrs: { "sort-key": "type" } }, [_vm._v("Type")]),
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
          attrs: { title: "UpdateSetting", active: _vm.popupActive },
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
          _c("label", { attrs: { for: "type" } }, [_vm._v("Setting Type")]),
          _vm._v(" "),
          _c("v-select", {
            directives: [
              {
                name: "validate",
                rawName: "v-validate",
                value: "required",
                expression: "'required'"
              }
            ],
            attrs: { name: "type", options: _vm.options },
            model: {
              value: _vm.setting.type_id,
              callback: function($$v) {
                _vm.$set(_vm.setting, "type_id", $$v)
              },
              expression: "setting.type_id"
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
                  value: _vm.errors.has("type"),
                  expression: "errors.has('type')"
                }
              ],
              staticClass: "text-danger text-sm"
            },
            [_vm._v(_vm._s(_vm.errors.first("type")))]
          ),
          _vm._v(" "),
          _c("br"),
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
            attrs: { label: "Key", name: "key" },
            model: {
              value: _vm.setting.key,
              callback: function($$v) {
                _vm.$set(_vm.setting, "key", $$v)
              },
              expression: "setting.key"
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
                  value: _vm.errors.has("key"),
                  expression: "errors.has('key')"
                }
              ],
              staticClass: "text-danger text-sm"
            },
            [_vm._v(_vm._s(_vm.errors.first("key")))]
          ),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _vm.setting.type_id.id == 1
            ? _c("p", { staticClass: "mb-5" }, [_vm._v("Value")])
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 1
            ? _c("quill-editor", {
                staticStyle: { "min-height": "80px" },
                model: {
                  value: _vm.setting.value,
                  callback: function($$v) {
                    _vm.$set(_vm.setting, "value", $$v)
                  },
                  expression: "setting.value"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 2
            ? _c("vs-input", {
                directives: [
                  {
                    name: "validate",
                    rawName: "v-validate",
                    value: "required",
                    expression: "'required'"
                  }
                ],
                staticClass: "w-full",
                attrs: { label: "Value", name: "value" },
                model: {
                  value: _vm.setting.value,
                  callback: function($$v) {
                    _vm.$set(_vm.setting, "value", $$v)
                  },
                  expression: "setting.value"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _c(
            "span",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.errors.has("value"),
                  expression: "errors.has('value')"
                }
              ],
              staticClass: "text-danger text-sm"
            },
            [_vm._v(_vm._s(_vm.errors.first("value")))]
          ),
          _vm._v(" "),
          _vm.setting.type_id.id == 3
            ? _c("vs-upload", {
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
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 4
            ? _c("vs-upload", {
                ref: "fileUpload",
                staticClass: "img-upload",
                attrs: {
                  limit: 1,
                  "show-upload-button": false,
                  text: "Upload Video"
                },
                on: {
                  change: function($event) {
                    return _vm.uploadFiles()
                  }
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 5
            ? _c("vs-upload", {
                ref: "fileUpload",
                staticClass: "img-upload",
                attrs: {
                  limit: 1,
                  "show-upload-button": false,
                  text: "Upload Audio"
                },
                on: {
                  change: function($event) {
                    return _vm.uploadFiles()
                  }
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 6
            ? _c("v-select", {
                staticClass: "selectExample",
                attrs: { name: "type", options: _vm.selectoroption },
                model: {
                  value: _vm.setting.value,
                  callback: function($$v) {
                    _vm.$set(_vm.setting, "value", $$v)
                  },
                  expression: "setting.value"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.setting.type_id.id == 7
            ? _c(
                "div",
                { staticClass: "w-full" },
                [
                  _c(
                    "gmap-map",
                    {
                      ref: "mapRef",
                      staticStyle: { width: "100%", height: "500px" },
                      attrs: { center: _vm.center, zoom: 10 }
                    },
                    [
                      _c(
                        "gmap-info-window",
                        {
                          attrs: {
                            options: _vm.infoOptions,
                            position: _vm.infoWindowPos,
                            opened: _vm.infoWinOpen
                          },
                          on: {
                            closeclick: function($event) {
                              _vm.infoWinOpen = false
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n                    " +
                              _vm._s(_vm.infoContent) +
                              "\n                "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("gmap-marker", {
                        ref: "mapkerRef",
                        attrs: {
                          position: _vm.coordinates,
                          clickable: true,
                          draggable: true
                        },
                        on: {
                          drag: _vm.updateCoordinates,
                          click: function($event) {
                            return _vm.toggleInfoWindow(_vm.m, _vm.i)
                          }
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            : _vm._e(),
          _vm._v(" "),
          _c("br"),
          _vm._v(" "),
          _c(
            "vs-button",
            {
              staticClass: "mr-6",
              on: {
                click: function($event) {
                  $event.preventDefault()
                  return _vm.updateSetting($event)
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

/***/ "./resources/js/src/views/settings/AddNewSetting.vue":
/*!***********************************************************!*\
  !*** ./resources/js/src/views/settings/AddNewSetting.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true& */ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true&");
/* harmony import */ var _AddNewSetting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AddNewSetting.vue?vue&type=script&lang=js& */ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& */ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _AddNewSetting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "242df40f",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/settings/AddNewSetting.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewSetting.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&":
/*!*********************************************************************************************************************!*\
  !*** ./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& ***!
  \*********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=style&index=0&id=242df40f&lang=scss&scoped=true&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_style_index_0_id_242df40f_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/AddNewSetting.vue?vue&type=template&id=242df40f&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddNewSetting_vue_vue_type_template_id_242df40f_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/src/views/settings/settings.vue":
/*!******************************************************!*\
  !*** ./resources/js/src/views/settings/settings.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./settings.vue?vue&type=template&id=aa17a116& */ "./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116&");
/* harmony import */ var _settings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./settings.vue?vue&type=script&lang=js& */ "./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./settings.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _settings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__["render"],
  _settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/settings/settings.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./settings.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&":
/*!****************************************************************************************!*\
  !*** ./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss& ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../node_modules/vue-loader/lib??vue-loader-options!./settings.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116&":
/*!*************************************************************************************!*\
  !*** ./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./settings.vue?vue&type=template&id=aa17a116& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/settings/settings.vue?vue&type=template&id=aa17a116&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_settings_vue_vue_type_template_id_aa17a116___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);