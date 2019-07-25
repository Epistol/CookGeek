(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[14],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js& ***!
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "SwitchLight",
  data: function data() {
    return {
      switch_content: ''
    };
  },
  methods: {
    toggleLight: function toggleLight() {
      var el = document.body;
      var htmeuleu = document.documentElement;

      if (el.classList.contains('nightmode')) {
        // Turning the theme off:
        el.classList.remove('nightmode');
        htmeuleu.classList.remove('nightmode');
        localStorage.removeItem('nightmode');
        this.switch_content = '<i class="fas fa-moon"></i>';
        this.checkLight();
      } else {
        el.classList.add('nightmode');
        htmeuleu.classList.add('nightmode');
        localStorage.setItem('nightmode', true);
        this.switch_content = '<i class="fas fa-sun"></i>';
        this.checkLight();
      }
    },
    checkLight: function checkLight() {
      var el = document.body;
      var htmeuleu = document.documentElement;

      if (localStorage.getItem('nightmode')) {
        el.classList.add('nightmode');
        htmeuleu.classList.add('nightmode');
        this.switch_content = 'fa-sun';
      } else {
        this.switch_content = 'fa-moon';
      }
    }
  },
  mounted: function mounted() {
    this.checkLight();
  },
  computed: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
    "a",
    {
      staticClass: "navbar-item",
      attrs: { id: "toggle-theme" },
      on: {
        click: function($event) {
          return _vm.toggleLight()
        }
      },
      model: {
        value: _vm.switch_content,
        callback: function($$v) {
          _vm.switch_content = $$v
        },
        expression: "switch_content"
      }
    },
    [_c("i", { class: "fas " + this.switch_content + " fa-fw" })]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/SwitchLight.vue":
/*!********************************************************!*\
  !*** ./resources/assets/js/components/SwitchLight.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true& */ "./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true&");
/* harmony import */ var _SwitchLight_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SwitchLight.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SwitchLight_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "a9fd1e4a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/SwitchLight.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SwitchLight_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SwitchLight.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/SwitchLight.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SwitchLight_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true&":
/*!***************************************************************************************************!*\
  !*** ./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/SwitchLight.vue?vue&type=template&id=a9fd1e4a&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SwitchLight_vue_vue_type_template_id_a9fd1e4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);