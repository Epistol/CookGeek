(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[27],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ["recipeid", "user_id"],
  name: "signalrecipe",
  data: function data() {
    return {
      componentshow: false,
      showModal: false,
      next: false,
      step: 0,
      option: false,
      alert_txt: "",
      retour: "",
      items: [{
        message: 'Elle comporte des fautes d\'orthographe',
        type: 'ortho'
      }, // {message: 'Elle ne m\'intéresse pas', type: 'interest'},
      {
        message: 'Elle est suspecte ou contient du spam',
        type: 'spam'
      }, {
        message: 'L\'image en avant n\'est pas appropriée / sensible',
        type: 'image'
      }, {
        message: 'Les propos sont inappropriés ou dangereux',
        type: 'propos'
      }, {
        message: 'Autre',
        type: 'autre'
      }]
    };
  },
  methods: {
    sendAlert: function sendAlert() {
      var _this = this;

      axios.post('/api/recipe/alerte/', {
        recipeid: this.recipeid,
        userid: this.user_id,
        type_alerte: this.option,
        user_content: this.alert_txt
      }).then(function (response) {
        _this.retour = response.data;
      });
    },
    reset: function reset() {
      this.showModal = false;
      this.next = false;
      this.option = false;
      this.alert_txt = '';
      this.retour = "";
      this.step = 0;
    },
    continueform: function continueform() {
      this.step++;
      this.next = true;
    },
    backwardform: function backwardform() {
      this.step--;
      this.next = false;
    }
  },
  computed: {
    finished: function finished() {
      if (this.next) {
        if (this.option !== 'autre') {
          this.sendAlert();
          return true;
        } else {
          if (this.step === 2) {
            this.sendAlert();
            return true;
          }
        }
      }

      return false;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true& ***!
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
    "div",
    [
      _c(
        "span",
        {
          staticClass: "tag",
          staticStyle: { cursor: "pointer" },
          on: {
            click: function($event) {
              _vm.showModal = true
            }
          }
        },
        [_vm._m(0), _vm._v("\n        Signaler\n    ")]
      ),
      _vm._v(" "),
      _vm.showModal
        ? _c("transition", { attrs: { name: "modal" } }, [
            _c("div", { staticClass: "modal is-active" }, [
              _c("div", {
                staticClass: "modal-background",
                on: {
                  click: function($event) {
                    _vm.showModal = false
                  }
                }
              }),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "modal-content",
                  on: {
                    click: function($event) {
                      $event.stopPropagation()
                    }
                  }
                },
                [
                  _c(
                    "div",
                    { staticClass: "boxmodal is-marginless" },
                    [
                      _c("div", { staticClass: "modal-container" }, [
                        _c(
                          "header",
                          { staticClass: "modal-header modal-card-head" },
                          [
                            _vm._t("header", [
                              _c("p", { staticClass: "modal-card-title" }, [
                                _vm._v("Un problème avec la recette ? ")
                              ])
                            ]),
                            _vm._v(" "),
                            _c("button", {
                              staticClass: "delete",
                              attrs: { "aria-label": "close" },
                              on: {
                                click: function($event) {
                                  return _vm.reset()
                                }
                              }
                            })
                          ],
                          2
                        )
                      ]),
                      _vm._v(" "),
                      _c(
                        "section",
                        { staticClass: "modal-card-body" },
                        [
                          !_vm.next
                            ? [
                                _c(
                                  "div",
                                  { staticClass: "control" },
                                  _vm._l(_vm.items, function(item) {
                                    return _c(
                                      "div",
                                      { staticClass: "radio-vertical" },
                                      [
                                        _c("input", {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.option,
                                              expression: "option"
                                            }
                                          ],
                                          attrs: {
                                            type: "radio",
                                            id: item.type,
                                            name: "choix"
                                          },
                                          domProps: {
                                            value: item.type,
                                            checked: _vm._q(
                                              _vm.option,
                                              item.type
                                            )
                                          },
                                          on: {
                                            change: function($event) {
                                              _vm.option = item.type
                                            }
                                          }
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "label",
                                          {
                                            staticClass: "radio",
                                            attrs: { for: item.type }
                                          },
                                          [_vm._v(_vm._s(item.message))]
                                        )
                                      ]
                                    )
                                  }),
                                  0
                                )
                              ]
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.next
                            ? [
                                _vm.option === "ortho"
                                  ? [
                                      _c("p", [
                                        _vm._v(
                                          "Nous prenons note de votre signalement et allons vérifier cela !"
                                        )
                                      ])
                                    ]
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.option === "spam"
                                  ? [
                                      _c("p", [
                                        _vm._v(
                                          "Nous prenons note de votre signalement et allons vérifier cela !"
                                        )
                                      ])
                                    ]
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.option === "image" ||
                                _vm.option === "propos"
                                  ? [
                                      _c("p", [
                                        _vm._v(
                                          "Nous prenons note de votre signalement et allons vérifier cela !"
                                        )
                                      ])
                                    ]
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.option === "autre" && _vm.step === 1
                                  ? [
                                      _c("textarea", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.alert_txt,
                                            expression: "alert_txt"
                                          }
                                        ],
                                        staticClass: "textarea",
                                        attrs: {
                                          placeholder:
                                            "Par exemple : cette recette est une blague de mauvais goût"
                                        },
                                        domProps: { value: _vm.alert_txt },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.alert_txt = $event.target.value
                                          }
                                        }
                                      })
                                    ]
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.option === "autre" && _vm.step === 2
                                  ? [
                                      _c("p", [
                                        _vm._v(
                                          "Nous prenons note de votre signalement et allons vérifier cela !"
                                        )
                                      ])
                                    ]
                                  : _vm._e()
                              ]
                            : _vm._e()
                        ],
                        2
                      ),
                      _vm._v(" "),
                      _c("section", { staticClass: "conduite" }, [
                        _c("p", [
                          _c("a", { attrs: { href: "" } }, [
                            _vm._v(" Notre code de conduite")
                          ]),
                          _vm._v(" | "),
                          _c("a", { attrs: { href: "" } }, [
                            _vm._v(
                              "Signalement des infractions à nos\n                            règles"
                            )
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      !_vm.finished
                        ? [
                            _c(
                              "footer",
                              { staticClass: "modal-card-foot" },
                              [
                                _vm._t("footer"),
                                _vm._v(" "),
                                _c("div", { staticClass: "columns" }, [
                                  _c(
                                    "div",
                                    { staticClass: "column" },
                                    [
                                      _vm.next && !_vm.finished
                                        ? [
                                            _c(
                                              "button",
                                              {
                                                staticClass: "button",
                                                on: {
                                                  click: function($event) {
                                                    return _vm.backwardform()
                                                  }
                                                }
                                              },
                                              [_vm._v("Precedent")]
                                            )
                                          ]
                                        : _vm._e()
                                    ],
                                    2
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "column" },
                                    [
                                      !_vm.finished
                                        ? [
                                            _c(
                                              "button",
                                              {
                                                staticClass:
                                                  "button is-primary",
                                                on: {
                                                  click: function($event) {
                                                    return _vm.continueform()
                                                  }
                                                }
                                              },
                                              [_vm._v("Suivant")]
                                            )
                                          ]
                                        : _vm._e()
                                    ],
                                    2
                                  )
                                ])
                              ],
                              2
                            )
                          ]
                        : _vm._e()
                    ],
                    2
                  )
                ]
              ),
              _vm._v(" "),
              _c("button", {
                staticClass: "modal-close is-large",
                attrs: { "aria-label": "close" },
                on: {
                  click: function($event) {
                    return _vm.reset()
                  }
                }
              })
            ])
          ])
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "icon has-text-warning",
        staticStyle: { "padding-right": "0.5rem" }
      },
      [_c("i", { staticClass: "fas fa-exclamation-triangle" })]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/recipe/Signal.vue":
/*!**********************************************************!*\
  !*** ./resources/assets/js/components/recipe/Signal.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Signal.vue?vue&type=template&id=0c03c562&scoped=true& */ "./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true&");
/* harmony import */ var _Signal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Signal.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Signal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "0c03c562",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/recipe/Signal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Signal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Signal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/Signal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Signal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true&":
/*!*****************************************************************************************************!*\
  !*** ./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Signal.vue?vue&type=template&id=0c03c562&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/Signal.vue?vue&type=template&id=0c03c562&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Signal_vue_vue_type_template_id_0c03c562_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);