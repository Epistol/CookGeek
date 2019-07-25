(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[11],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'searchautocomplete',
  props: ['searchtype', 'data_old'],
  data: function data() {
    return {
      searchquery: '',
      data_results: [],
      isOpen: false,
      arrowCounter: -1,
      search_more: true
    };
  },
  methods: {
    autoComplete: function autoComplete() {
      var _this = this;

      this.isOpen = true;
      this.data_results = [];
      var that = this;

      if (this.searchquery.length > 2) {
        axios.get('/api/autocomplete/search/univers', {
          params: {
            searchquery: this.searchquery
          }
        }).then(function (response) {
          console.log(response);
          _this.data_results = response.data;
        });
        this.search_more = false;
      } else {
        this.search_more = true;
      }
    },
    setResult: function setResult(nom) {
      this.isOpen = true;
      this.searchquery = nom;
      console.log(nom);
      this.isOpen = false;
    },
    onArrowDown: function onArrowDown() {
      if (this.arrowCounter < this.data_results.length) {
        this.arrowCounter = this.arrowCounter + 1;
      }
    },
    onArrowUp: function onArrowUp() {
      if (this.arrowCounter > 0) {
        this.arrowCounter = this.arrowCounter - 1;
      }
    },
    onEnter: function onEnter() {
      var result = this.data_results[this.arrowCounter];
      this.searchquery = result.name;
      this.isOpen = false;
      this.arrowCounter = -1;
    },
    handleClickOutside: function handleClickOutside(evt) {
      if (!this.$el.contains(evt.target)) {
        this.isOpen = false;
        this.arrowCounter = -1;
      }
    }
  },
  mounted: function mounted() {
    this.searchquery = this.data_old;
  },
  destroyed: function destroyed() {// document.removeEventListener('click', this.handleClickOutside);
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("input", {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.searchquery,
          expression: "searchquery"
        }
      ],
      staticClass: "input_modal blck",
      attrs: { type: "text", name: _vm.searchtype, placeholder: _vm.data_old },
      domProps: { value: _vm.searchquery },
      on: {
        input: [
          function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.searchquery = $event.target.value
          },
          _vm.autoComplete
        ],
        keydown: [
          function($event) {
            if (
              !$event.type.indexOf("key") &&
              _vm._k($event.keyCode, "down", 40, $event.key, [
                "Down",
                "ArrowDown"
              ])
            ) {
              return null
            }
            return _vm.onArrowDown($event)
          },
          function($event) {
            if (
              !$event.type.indexOf("key") &&
              _vm._k($event.keyCode, "up", 38, $event.key, ["Up", "ArrowUp"])
            ) {
              return null
            }
            return _vm.onArrowUp($event)
          },
          function($event) {
            if (
              !$event.type.indexOf("key") &&
              _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
            ) {
              return null
            }
            return _vm.onEnter($event)
          }
        ],
        focus: function($event) {
          _vm.isOpen = true
        }
      }
    }),
    _vm._v(" "),
    _c(
      "ul",
      {
        directives: [
          {
            name: "show",
            rawName: "v-show",
            value: _vm.isOpen && this.search_more === false,
            expression: "isOpen && this.search_more === false"
          }
        ],
        staticClass: "autocomplete-results"
      },
      [
        _vm._l(_vm.data_results, function(result, i) {
          return _c(
            "li",
            {
              key: i,
              staticClass: "autocomplete-result",
              class: { "is-active": i === _vm.arrowCounter }
            },
            [
              _c(
                "span",
                {
                  staticClass: "test",
                  on: {
                    click: function($event) {
                      return _vm.setResult(result.name)
                    }
                  }
                },
                [_vm._v(_vm._s(result.name))]
              )
            ]
          )
        }),
        _vm._v(" "),
        _c(
          "li",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value:
                  _vm.data_results.length === 0 && this.search_more === true,
                expression:
                  "data_results.length === 0 && this.search_more === true"
              }
            ],
            staticClass: "autocomplete-result"
          },
          [_vm._v("\n            Pas de résultats\n        ")]
        )
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/components/Autocomplete.vue":
/*!*********************************************************!*\
  !*** ./resources/assets/js/components/Autocomplete.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Autocomplete.vue?vue&type=template&id=3a5dcd9f& */ "./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f&");
/* harmony import */ var _Autocomplete_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Autocomplete.vue?vue&type=script&lang=js& */ "./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Autocomplete_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/components/Autocomplete.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Autocomplete_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Autocomplete.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Autocomplete.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Autocomplete_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f&":
/*!****************************************************************************************!*\
  !*** ./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Autocomplete.vue?vue&type=template&id=3a5dcd9f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/components/Autocomplete.vue?vue&type=template&id=3a5dcd9f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Autocomplete_vue_vue_type_template_id_3a5dcd9f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);