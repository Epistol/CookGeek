(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[22],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["picture", "user", "user_id", "type", "recipeid"],
  name: 'pictureupload',
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
    [
      !_vm.showPreview
        ? [
            _vm.picture !== "users/default.png"
              ? [
                  _c(
                    "figure",
                    { staticClass: "image is-square is-128x128" },
                    [
                      _vm.type === "recipe"
                        ? [
                            _c("img", {
                              staticClass: "fit-cover",
                              attrs: {
                                src:
                                  "/recipes/" +
                                  _vm.recipeid +
                                  "/" +
                                  _vm.user_id +
                                  "/" +
                                  _vm.picture
                              }
                            })
                          ]
                        : [
                            _c("img", {
                              staticClass: "fit-cover",
                              attrs: { src: _vm.picture }
                            })
                          ],
                      _vm._v(" "),
                      _vm._m(0)
                    ],
                    2
                  )
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
                      staticClass: "fit-cover",
                      staticStyle: { "max-height": "196px" },
                      attrs: {
                        src: "https://api.adorable.io/avatars/" + _vm.user
                      }
                    }),
                    _vm._v(" "),
                    _vm._m(1)
                  ])
                ]
          ]
        : [
            _c("figure", { staticClass: "image is-square is-128x128" }, [
              _c("img", {
                staticClass: "fit-cover",
                staticStyle: { "max-height": "196px" },
                attrs: { src: _vm.imagePreview }
              }),
              _vm._v(" "),
              _vm._m(2)
            ])
          ],
      _vm._v(" "),
      _c("input", {
        ref: "myFiles",
        staticStyle: { display: "none" },
        attrs: {
          id: "upload",
          type: "file",
          name: "resume",
          accept: "image/x-png,image/jpeg"
        },
        on: { change: _vm.previewFiles }
      })
    ],
    2
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "change-picture" }, [
      _c("i", { staticClass: "fas fa-camera-retro" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "change-picture" }, [
      _c("i", { staticClass: "fas fa-camera-retro" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "change-picture" }, [
      _c("i", { staticClass: "fas fa-camera-retro" })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/picture/PictureUpload.vue":
/*!******************************************************************!*\
  !*** ./resources/assets/js/components/picture/PictureUpload.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PictureUpload.vue?vue&type=template&id=68e946b2& */ "./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2&");
/* harmony import */ var _PictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PictureUpload.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/picture/PictureUpload.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PictureUpload.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PictureUpload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2&":
/*!*************************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PictureUpload.vue?vue&type=template&id=68e946b2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/PictureUpload.vue?vue&type=template&id=68e946b2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PictureUpload_vue_vue_type_template_id_68e946b2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);