(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[34],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "MobileMenuComponent",
  components: {},
  data: function data() {
    return {
      showNavbar: true,
      lastScrollPosition: 0
    };
  },
  mounted: function mounted() {// window.addEventListener('scroll', this.onScroll)
  },
  beforeDestroy: function beforeDestroy() {// window.removeEventListener('scroll', this.onScroll)
  },
  methods: {
    onScroll: function onScroll() {
      var currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
      console.log("////");
      console.log(currentScrollTop);
      console.log(this.lastScrollPosition);
      console.log("////");

      if (currentScrollTop < 0) {
        return;
      } // Stop executing this function if the difference between
      // current scroll position and last scroll position is MORE than some offset


      if (Math.abs(currentScrollTop + this.lastScrollPosition) < 60) {
        return;
      }

      this.showNavbar = currentScrollTop < this.lastScrollPosition;
      this.lastScrollPosition = currentScrollTop;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--8-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#navbarMobile[data-v-670fa5ba] {\n  transform: translate3d(0, 0, 0);\n  transition: 0.1s all ease-out;\n}\n#navbarMobile.navbar--hidden[data-v-670fa5ba] {\n  box-shadow: none;\n  transform: translate3d(0, 100%, 0);\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--8-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--8-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true& ***!
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
  return _c(
    "div",
    {
      staticClass:
        "bg-main fixed z-50 left-0 right-0 bottom-0 w-full sm:hidden md:hidden lg:hidden",
      class: { "navbar--hidden": !_vm.showNavbar },
      attrs: { id: "navbarMobile" }
    },
    [
      _c(
        "nav",
        {
          staticClass: "w-full mobile-bottom-menu",
          attrs: { role: "navigation", "aria-label": "main navigation" }
        },
        [
          _c(
            "div",
            {
              staticClass:
                "p-4 h-16 flex w-full items-center flex-row justify-between shadow"
            },
            [_vm._t("default")],
            2
          )
        ]
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/menu/MobileMenuComponent.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/components/menu/MobileMenuComponent.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true& */ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true&");
/* harmony import */ var _MobileMenuComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MobileMenuComponent.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& */ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _MobileMenuComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "670fa5ba",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/menu/MobileMenuComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./MobileMenuComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&":
/*!******************************************************************************************************************************!*\
  !*** ./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& ***!
  \******************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--8-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=style&index=0&id=670fa5ba&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_style_index_0_id_670fa5ba_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true&":
/*!****************************************************************************************************************!*\
  !*** ./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true& ***!
  \****************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/menu/MobileMenuComponent.vue?vue&type=template&id=670fa5ba&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MobileMenuComponent_vue_vue_type_template_id_670fa5ba_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);