(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["profile-logo-setup"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "LogoChange",
  data: function data() {
    return {
      file: null,
      image: ''
    };
  },
  methods: {
    addFile: function addFile(file) {
      if (typeof file === "undefined") {
        console.log('no file');
        return;
      }

      console.log(file);
    },
    uploadFile: function uploadFile() {
      var reader = new FileReader();
      var vm = this; // reader.onload = (e) => {
      //     vm.image = e.target.result;
      //     console.log('hooking the store to upload this')
      // };

      reader.readAsDataURL(this.file);
    }
  },
  watch: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "flex gradient-gray w-3/5 pt-12 pb-12 pl-12" },
    [
      _c("form", { staticClass: "w-9/12" }, [
        _c("h3", [_vm._v(_vm._s(_vm.$t("Logo")))]),
        _vm._v(" "),
        _c("div", { staticClass: "form-big-unit" }, [
          _c("input", {
            attrs: { id: "logo", type: "file" },
            on: {
              change: function($event) {
                return _vm.addFile($event.target.files[0])
              }
            }
          }),
          _vm._v(" "),
          _c("label", { attrs: { for: "logo" } }, [
            _vm._v("Upload your workshop logo")
          ])
        ]),
        _vm._v(" "),
        _c(
          "button",
          {
            staticClass: "btn-orange-default",
            on: {
              click: function($event) {
                $event.preventDefault()
                return _vm.uploadFile($event)
              }
            }
          },
          [_vm._v(_vm._s(_vm.$t("Save")))]
        )
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/WorkshopProfile/LogoChange.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/WorkshopProfile/LogoChange.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LogoChange.vue?vue&type=template&id=8c4593da&scoped=true& */ "./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true&");
/* harmony import */ var _LogoChange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./LogoChange.vue?vue&type=script&lang=js& */ "./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _LogoChange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "8c4593da",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/WorkshopProfile/LogoChange.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LogoChange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./LogoChange.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LogoChange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true& ***!
  \***********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./LogoChange.vue?vue&type=template&id=8c4593da&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/WorkshopProfile/LogoChange.vue?vue&type=template&id=8c4593da&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LogoChange_vue_vue_type_template_id_8c4593da_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);