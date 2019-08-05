(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[20],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_picture_input__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-picture-input */ "./node_modules/vue-picture-input/PictureInput.vue");
/* harmony import */ var _modal_ModalView_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../modal/ModalView.vue */ "./resources/assets/js/components/modal/ModalView.vue");
/* harmony import */ var _modal_LoginModal_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../modal/LoginModal.vue */ "./resources/assets/js/components/modal/LoginModal.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "add-recipe",
  props: ["recipeid", "recipehash", "user", "type"],
  data: function data() {
    return {
      colors: ['background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);', 'background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);', 'background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%);', 'background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);', 'background-image: linear-gradient(to top, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);', 'background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);', 'background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);', 'background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);', 'background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);'],
      colorGenerated: '',
      clicked: false,
      image: '',
      sent: false
    };
  },
  components: {
    PictureInput: vue_picture_input__WEBPACK_IMPORTED_MODULE_0__["default"],
    ModalView: _modal_ModalView_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    LoginModal: _modal_LoginModal_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  methods: {
    generateColors: function generateColors() {
      var idFirst = Math.floor(Math.random() * this.colors.length);
      this.colorGenerated = this.colors[idFirst];
    },
    closing: function closing() {
      this.clicked = false;
    },
    showModal: function showModal() {
      this.clicked = true;
    },
    onChange: function onChange(image) {
      console.log('New picture selected!');

      if (image) {
        console.log('Picture loaded.');
        this.image = image;
      } else {
        console.log('FileReader API not supported: use the <form>, Luke!');
      }
    },
    uploadImage: function uploadImage() {
      var _this = this;

      return axios.post('/recipe/addmypicture', {
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        recipe: this.recipeid,
        recipehash: this.recipehash,
        user: this.user,
        picture: this.image
      }).then(function (response) {
        _this.sent = true;
        console.log(response);
      })["catch"](function (error) {
        console.log(error);
      });
    }
  },
  created: function created() {
    this.generateColors();
  },
  computed: {
    clicked: function clicked() {
      if (this.clicked === true) {
        if (this.user === '') {
          this.showModal = true;
        }
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************************/
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
  return _c("transition", { attrs: { name: "vodal-zoom" } }, [
    _c(
      "div",
      [
        this.type === "button"
          ? [
              _c(
                "a",
                {
                  staticClass:
                    "button-picture button is-outlined rounded-full ",
                  on: {
                    click: function($event) {
                      return _vm.showModal()
                    }
                  }
                },
                [
                  _c("span", { staticClass: "icon is-small" }, [
                    _c("span", { staticClass: " fa-stack " }, [
                      _c("i", {
                        staticClass: "fas fa-camera fa-stack-1x ",
                        staticStyle: { color: "#7f5fbf" }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("span", [_vm._v("Ajouter ma photo")])
                ]
              )
            ]
          : [
              _c(
                "div",
                {
                  staticClass: "is-flex-center fit-cover pointer-hover",
                  style: this.colorGenerated + "height: 20vh;",
                  attrs: { alt: this.text },
                  on: {
                    click: function($event) {
                      return _vm.showModal()
                    }
                  }
                },
                [
                  _c("span", { staticClass: "uploadIcon" }, [
                    _c("i", { staticClass: "fas fa-cloud-upload-alt fa-7x" })
                  ]),
                  _vm._v(" "),
                  _c("span", { staticStyle: { "z-index": "0" } }, [
                    _vm._v("Ajouter ma propre photo\n        ")
                  ])
                ]
              )
            ],
        _vm._v(" "),
        _vm.clicked
          ? [
              _vm.user !== ""
                ? [
                    _vm.clicked
                      ? _c(
                          "ModalView",
                          {
                            on: {
                              close: function($event) {
                                _vm.clicked = false
                              }
                            }
                          },
                          [
                            _c(
                              "h3",
                              { attrs: { slot: "header" }, slot: "header" },
                              [_vm._v("Ajouter votre photo")]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { attrs: { slot: "body" }, slot: "body" },
                              [
                                !_vm.sent
                                  ? [
                                      _c("picture-input", {
                                        attrs: {
                                          "custom-strings": {
                                            upload: "<h1>Bummer!</h1>",
                                            drag:
                                              "<i class='fas fa-camera-retro'></i> Ajouter votre photo"
                                          }
                                        },
                                        on: { change: _vm.onChange }
                                      })
                                    ]
                                  : [
                                      _c("h1", { staticClass: "title" }, [
                                        _vm._v(
                                          "Photo envoyée ! Nous la validerons d'ici peu ! "
                                        )
                                      ])
                                    ]
                              ],
                              2
                            ),
                            _vm._v(" "),
                            !_vm.sent
                              ? _c(
                                  "div",
                                  { attrs: { slot: "footer" }, slot: "footer" },
                                  [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "button is-primary",
                                        attrs: { type: "button" },
                                        on: {
                                          click: function($event) {
                                            return _vm.uploadImage()
                                          }
                                        }
                                      },
                                      [_vm._v("Envoyer")]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]
                        )
                      : _vm._e()
                  ]
                : [
                    _c("login-modal", {
                      attrs: { showModal: true },
                      on: {
                        close: function($event) {
                          return _vm.closing()
                        }
                      }
                    })
                  ]
            ]
          : _vm._e()
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/picture/AddPictureRecipe.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/picture/AddPictureRecipe.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true& */ "./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true&");
/* harmony import */ var _AddPictureRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AddPictureRecipe.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AddPictureRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "1a1b4b33",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/picture/AddPictureRecipe.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddPictureRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddPictureRecipe.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AddPictureRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true&":
/*!****************************************************************************************************************!*\
  !*** ./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true& ***!
  \****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/picture/AddPictureRecipe.vue?vue&type=template&id=1a1b4b33&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AddPictureRecipe_vue_vue_type_template_id_1a1b4b33_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);