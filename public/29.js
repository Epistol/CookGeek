(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[29],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _modal_LoginModal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../modal/LoginModal */ "./resources/assets/js/components/modal/LoginModal.vue");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
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
  props: ["recipeid", "userid"],
  data: function data() {
    return {
      counter: 0,
      retour: '',
      nbLike: '',
      clicked: false
    };
  },
  name: "LikeRecipe",
  components: {
    LoginModal: _modal_LoginModal__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  methods: {
    toggleLike: function () {
      var _toggleLike = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var _this = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                if (this.userid) {
                  axios.post('/like/toggleLikeRecipe/', {
                    recipeid: this.recipeid,
                    userid: this.userid
                  }).then(function (response) {
                    if (response.data.original.status === 'ok') {
                      _this.retour = response.data.original.value;
                    }

                    _this.getNbLike();
                  });
                } else {
                  this.retour = false;
                }

              case 1:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function toggleLike() {
        return _toggleLike.apply(this, arguments);
      }

      return toggleLike;
    }(),
    is_already_liked: function () {
      var _is_already_liked = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var _this2 = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (this.userid) {
                  axios.post('/like/checkLikedRecipe/', {
                    recipeid: this.recipeid,
                    userid: this.userid
                  }).then(function (response) {
                    _this2.retour = response.data;
                  });
                } else {
                  this.retour = false;
                }

              case 1:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function is_already_liked() {
        return _is_already_liked.apply(this, arguments);
      }

      return is_already_liked;
    }(),
    getNbLike: function () {
      var _getNbLike = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var _this3 = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                if (this.userid) {
                  axios.post('/like/nbLikeRecipe/', {
                    recipeid: this.recipeid
                  }).then(function (response) {
                    _this3.nbLike = response.data;
                  });
                } else {
                  this.nbLike = false;
                }

              case 1:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this);
      }));

      function getNbLike() {
        return _getNbLike.apply(this, arguments);
      }

      return getNbLike;
    }(),
    closing: function closing() {
      this.clicked = false;
    }
  },
  mounted: function mounted() {
    this.is_already_liked();
    this.getNbLike();
  },
  computed: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true&":
/*!*********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true& ***!
  \*********************************************************************************************************************************************************************************************************************************************/
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
        "a",
        {
          staticClass: "rounded-full like tooltip",
          class: { liked: _vm.retour !== 0 },
          attrs: { "data-tooltip": _vm.nbLike },
          on: {
            click: function($event) {
              return _vm.toggleLike()
            }
          }
        },
        [
          _c("i", { staticClass: "fas fa-heart" }),
          _c("span", { attrs: { hidden: "" } }, [_vm._v("Ajouter aux favoris")])
        ]
      ),
      _vm._v(" "),
      !_vm.userid && _vm.clicked
        ? [
            _c("login-modal", {
              attrs: { showModal: this.clicked },
              on: {
                close: function($event) {
                  return _vm.closing()
                }
              }
            })
          ]
        : _vm._e()
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/recipe/like/LikeRecipe.vue":
/*!*******************************************************************!*\
  !*** ./resources/assets/js/components/recipe/like/LikeRecipe.vue ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true& */ "./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true&");
/* harmony import */ var _LikeRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./LikeRecipe.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _LikeRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/recipe/like/LikeRecipe.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LikeRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./LikeRecipe.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_LikeRecipe_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true&":
/*!***************************************************************************************************************!*\
  !*** ./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true& ***!
  \***************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/recipe/like/LikeRecipe.vue?vue&type=template&id=7193201a&v-cloak=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_LikeRecipe_vue_vue_type_template_id_7193201a_v_cloak_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);