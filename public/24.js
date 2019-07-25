(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[24],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["picture", "universe_id", "user_id"],
  name: "univpictureupload",
  data: function data() {
    return {
      picture_sent: '',
      url: null,
      showPreview: false,
      imagePreview: null,
      user: ''
    };
  },
  methods: {
    previewFiles: function previewFiles() {
      this.picture_sent = this.$refs.myFiles.files[0];
      var reader = new FileReader();
      reader.addEventListener("load", function () {
        this.showPreview = true;
        this.imagePreview = reader.result;
      }.bind(this), false);

      if (this.picture_sent) {
        /*
                         Ensure the file is an image file.
                       */
        if (/\.(jpe?g|png|gif)$/i.test(this.picture_sent.name)) {
          /*
                              Fire the readAsDataURL method which will read the file in and
                              upon completion fire a 'load' event which we will listen to and
                              display the image in the preview.
                            */
          reader.readAsDataURL(this.picture_sent);
        }
      }
    }
  },
  mounted: function mounted() {},
  computed: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
    "label",
    { staticStyle: { display: "table-caption" } },
    [
      !_vm.showPreview
        ? [
            _vm.picture !== "users/default.png" &&
            _vm.picture !== null &&
            _vm.picture !== "null"
              ? [
                  _c("figure", { staticClass: "image is-square is-128x128" }, [
                    _c("img", {
                      attrs: {
                        src: "/universe/" + _vm.universe_id + "/" + _vm.picture
                      }
                    })
                  ])
                ]
              : [
                  _c("figure", { staticClass: "image is-square is-128x128" }, [
                    _c("img", {
                      directives: [
                        {
                          name: "show",
                          rawName: "v-show",
                          value: !_vm.showPreview,
                          expression: "!showPreview"
                        }
                      ],
                      staticStyle: { "max-height": "196px" },
                      attrs: {
                        src:
                          "https://api.adorable.io/avatars/" + _vm.universe_id
                      }
                    })
                  ])
                ]
          ]
        : [
            _c("figure", { staticClass: "image is-square is-128x128" }, [
              _c("img", {
                staticStyle: { "max-height": "196px" },
                attrs: { src: _vm.imagePreview }
              })
            ])
          ]
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/picture/UnivPictureUpload.vue":
/*!**********************************************************************!*\
  !*** ./resources/assets/js/components/picture/UnivPictureUpload.vue ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UnivPictureUpload.vue?vue&type=template&id=712047c1& */ "./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1&");
/* harmony import */ var _UnivPictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UnivPictureUpload.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UnivPictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/picture/UnivPictureUpload.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnivPictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./UnivPictureUpload.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnivPictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1&":
/*!*****************************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./UnivPictureUpload.vue?vue&type=template&id=712047c1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/UnivPictureUpload.vue?vue&type=template&id=712047c1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnivPictureUpload_vue_vue_type_template_id_712047c1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);