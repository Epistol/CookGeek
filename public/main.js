/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 402);
/******/ })
/************************************************************************/
/******/ ({

/***/ 163:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 *
 */



/**
 * Use invariant() to assert state which your program assumes to be true.
 *
 * Provide sprintf-style format (only %s is supported) and arguments
 * to provide information about what broke and what you were
 * expecting.
 *
 * The invariant message will be stripped in production, but the invariant
 * will remain to ensure logic does not differ in production.
 */

var validateFormat = function validateFormat(format) {};

if (true) {
  validateFormat = function validateFormat(format) {
    if (format === undefined) {
      throw new Error('invariant requires an error message argument');
    }
  };
}

function invariant(condition, format, a, b, c, d, e, f) {
  validateFormat(format);

  if (!condition) {
    var error;
    if (format === undefined) {
      error = new Error('Minified exception occurred; use the non-minified dev environment ' + 'for the full error message and additional helpful warnings.');
    } else {
      var args = [a, b, c, d, e, f];
      var argIndex = 0;
      error = new Error(format.replace(/%s/g, function () {
        return args[argIndex++];
      }));
      error.name = 'Invariant Violation';
    }

    error.framesToPop = 1; // we don't care about invariant's own frame
    throw error;
  }
}

module.exports = invariant;

/***/ }),

/***/ 164:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 *
 */



var emptyFunction = __webpack_require__(165);

/**
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */

var warning = emptyFunction;

if (true) {
  var printWarning = function printWarning(format) {
    for (var _len = arguments.length, args = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      args[_key - 1] = arguments[_key];
    }

    var argIndex = 0;
    var message = 'Warning: ' + format.replace(/%s/g, function () {
      return args[argIndex++];
    });
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };

  warning = function warning(condition, format) {
    if (format === undefined) {
      throw new Error('`warning(condition, format, ...args)` requires a warning ' + 'message argument');
    }

    if (format.indexOf('Failed Composite propType: ') === 0) {
      return; // Ignore CompositeComponent proptype check.
    }

    if (!condition) {
      for (var _len2 = arguments.length, args = Array(_len2 > 2 ? _len2 - 2 : 0), _key2 = 2; _key2 < _len2; _key2++) {
        args[_key2 - 2] = arguments[_key2];
      }

      printWarning.apply(undefined, [format].concat(args));
    }
  };
}

module.exports = warning;

/***/ }),

/***/ 165:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * 
 */

function makeEmptyFunction(arg) {
  return function () {
    return arg;
  };
}

/**
 * This function accepts and discards inputs; it has no side effects. This is
 * primarily useful idiomatically for overridable function endpoints which
 * always need to be callable, since JS lacks a null-call idiom ala Cocoa.
 */
var emptyFunction = function emptyFunction() {};

emptyFunction.thatReturns = makeEmptyFunction;
emptyFunction.thatReturnsFalse = makeEmptyFunction(false);
emptyFunction.thatReturnsTrue = makeEmptyFunction(true);
emptyFunction.thatReturnsNull = makeEmptyFunction(null);
emptyFunction.thatReturnsThis = function () {
  return this;
};
emptyFunction.thatReturnsArgument = function (arg) {
  return arg;
};

module.exports = emptyFunction;

/***/ }),

/***/ 402:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(403);
(function webpackMissingModule() { throw new Error("Cannot find module \"dev\""); }());


/***/ }),

/***/ 403:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* WEBPACK VAR INJECTION */(function(global) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "theme", function() { return theme; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DocPreview", function() { return DocPreview; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Docs", function() { return Docs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Link", function() { return Link$1; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Playground", function() { return Playground; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PropsTable", function() { return PropsTable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ThemeConfig", function() { return ThemeConfig; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_react__ = __webpack_require__(404);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_react___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_react__);
var __DEV__="production"!=="development",warning=function(){};if(__DEV__){var printWarning=function(e,t){var n=arguments.length;t=Array(n>2?n-2:0);for(var r=2;n>r;r++)t[r-2]=arguments[r];var o=0,a="Warning: "+e.replace(/%s/g,function(){return t[o++]});void 0!==console&&console.error(a);try{throw Error(a)}catch(e){}};warning=function(e,t,n){var r=arguments.length;n=Array(r>2?r-2:0);for(var o=2;r>o;o++)n[o-2]=arguments[o];if(void 0===t)throw Error("`warning(condition, format, ...args)` requires a warning message argument");e||printWarning.apply(null,[t].concat(n))}}var warning_1=warning,commonjsGlobal="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:{};function unwrapExports(e){return e&&e.__esModule&&Object.prototype.hasOwnProperty.call(e,"default")?e.default:e}function createCommonjsModule(e,t){return e(t={exports:{}},t.exports),t.exports}function makeEmptyFunction(e){return function(){return e}}var emptyFunction=function(){};emptyFunction.thatReturns=makeEmptyFunction,emptyFunction.thatReturnsFalse=makeEmptyFunction(!1),emptyFunction.thatReturnsTrue=makeEmptyFunction(!0),emptyFunction.thatReturnsNull=makeEmptyFunction(null),emptyFunction.thatReturnsThis=function(){return this},emptyFunction.thatReturnsArgument=function(e){return e};var emptyFunction_1=emptyFunction,validateFormat=function(e){};function invariant(e,t,n,r,o,a,i,s){if(validateFormat(t),!e){var c;if(void 0===t)c=Error("Minified exception occurred; use the non-minified dev environment for the full error message and additional helpful warnings.");else{var p=[n,r,o,a,i,s],u=0;(c=Error(t.replace(/%s/g,function(){return p[u++]}))).name="Invariant Violation"}throw c.framesToPop=1,c}}"production"!=="development"&&(validateFormat=function(e){if(void 0===e)throw Error("invariant requires an error message argument")});var invariant_1=invariant,warning$1=emptyFunction_1;if(true){var printWarning$1=function(e){for(var t=arguments.length,n=Array(t>1?t-1:0),r=1;t>r;r++)n[r-1]=arguments[r];var o=0,a="Warning: "+e.replace(/%s/g,function(){return n[o++]});void 0!==console&&console.error(a);try{throw Error(a)}catch(e){}};warning$1=function(e,t){if(void 0===t)throw Error("`warning(condition, format, ...args)` requires a warning message argument");if(0!==t.indexOf("Failed Composite propType: ")&&!e){for(var n=arguments.length,r=Array(n>2?n-2:0),o=2;n>o;o++)r[o-2]=arguments[o];printWarning$1.apply(void 0,[t].concat(r))}}}var warning_1$1=warning$1,getOwnPropertySymbols=Object.getOwnPropertySymbols,hasOwnProperty=Object.prototype.hasOwnProperty,propIsEnumerable=Object.prototype.propertyIsEnumerable;function toObject(e){if(null==e)throw new TypeError("Object.assign cannot be called with null or undefined");return Object(e)}function shouldUseNative(){try{if(!Object.assign)return!1;var e=new String("abc");if(e[5]="de","5"===Object.getOwnPropertyNames(e)[0])return!1;for(var t={},n=0;10>n;n++)t["_"+String.fromCharCode(n)]=n;if("0123456789"!==Object.getOwnPropertyNames(t).map(function(e){return t[e]}).join(""))return!1;var r={};return"abcdefghijklmnopqrst".split("").forEach(function(e){r[e]=e}),"abcdefghijklmnopqrst"===Object.keys(Object.assign({},r)).join("")}catch(e){return!1}}var objectAssign=shouldUseNative()?Object.assign:function(e,t){for(var n,r,o=toObject(e),a=1;arguments.length>a;a++){for(var i in n=Object(arguments[a]))hasOwnProperty.call(n,i)&&(o[i]=n[i]);if(getOwnPropertySymbols){r=getOwnPropertySymbols(n);for(var s=0;r.length>s;s++)propIsEnumerable.call(n,r[s])&&(o[r[s]]=n[r[s]])}}return o},ReactPropTypesSecret="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED",ReactPropTypesSecret_1=ReactPropTypesSecret;if(true)var invariant$1=invariant_1,warning$2=warning_1$1,ReactPropTypesSecret$1=ReactPropTypesSecret_1,loggedTypeFailures={};function checkPropTypes(e,t,n,r,o){if(true)for(var a in e)if(e.hasOwnProperty(a)){var i;try{invariant$1("function"==typeof e[a],"%s: %s type `%s` is invalid; it must be a function, usually from the `prop-types` package, but received `%s`.",r||"React class",n,a,typeof e[a]),i=e[a](t,a,r,n,null,ReactPropTypesSecret$1)}catch(e){i=e}if(warning$2(!i||i instanceof Error,"%s: type specification of %s `%s` is invalid; the type checker function must return `null` or an `Error` but returned a %s. You may have forgotten to pass an argument to the type checker creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and shape all require an argument).",r||"React class",n,a,typeof i),i instanceof Error&&!(i.message in loggedTypeFailures)){loggedTypeFailures[i.message]=!0;var s=o?o():"";warning$2(!1,"Failed %s type: %s%s",n,i.message,null!=s?s:"")}}}var checkPropTypes_1=checkPropTypes,factoryWithTypeCheckers=function(e,t){var n="function"==typeof Symbol&&Symbol.iterator,r="@@iterator";var o="<<anonymous>>",a={array:p("array"),bool:p("boolean"),func:p("function"),number:p("number"),object:p("object"),string:p("string"),symbol:p("symbol"),any:c(emptyFunction_1.thatReturnsNull),arrayOf:function(e){return c(function(t,n,r,o,a){if("function"!=typeof e)return new s("Property `"+a+"` of component `"+r+"` has invalid PropType notation inside arrayOf.");var i=t[n];if(!Array.isArray(i)){var c=l(i);return new s("Invalid "+o+" `"+a+"` of type `"+c+"` supplied to `"+r+"`, expected an array.")}for(var p=0;i.length>p;p++){var u=e(i,p,r,o,a+"["+p+"]",ReactPropTypesSecret_1);if(u instanceof Error)return u}return null})},element:function(){return c(function(t,n,r,o,a){var i=t[n];if(!e(i)){var c=l(i);return new s("Invalid "+o+" `"+a+"` of type `"+c+"` supplied to `"+r+"`, expected a single ReactElement.")}return null})}(),instanceOf:function(e){return c(function(t,n,r,a,i){if(!(t[n]instanceof e)){var c=e.name||o,p=function(e){if(!e.constructor||!e.constructor.name)return o;return e.constructor.name}(t[n]);return new s("Invalid "+a+" `"+i+"` of type `"+p+"` supplied to `"+r+"`, expected instance of `"+c+"`.")}return null})},node:function(){return c(function(e,t,n,r,o){if(!u(e[t]))return new s("Invalid "+r+" `"+o+"` supplied to `"+n+"`, expected a ReactNode.");return null})}(),objectOf:function(e){return c(function(t,n,r,o,a){if("function"!=typeof e)return new s("Property `"+a+"` of component `"+r+"` has invalid PropType notation inside objectOf.");var i=t[n],c=l(i);if("object"!==c)return new s("Invalid "+o+" `"+a+"` of type `"+c+"` supplied to `"+r+"`, expected an object.");for(var p in i)if(i.hasOwnProperty(p)){var u=e(i,p,r,o,a+"."+p,ReactPropTypesSecret_1);if(u instanceof Error)return u}return null})},oneOf:function(e){if(!Array.isArray(e))return"production"!=="development"&&warning_1$1(!1,"Invalid argument supplied to oneOf, expected an instance of array."),emptyFunction_1.thatReturnsNull;return c(function(t,n,r,o,a){for(var c=t[n],p=0;e.length>p;p++)if(i(c,e[p]))return null;var u=JSON.stringify(e);return new s("Invalid "+o+" `"+a+"` of value `"+c+"` supplied to `"+r+"`, expected one of "+u+".")})},oneOfType:function(e){if(!Array.isArray(e))return"production"!=="development"&&warning_1$1(!1,"Invalid argument supplied to oneOfType, expected an instance of array."),emptyFunction_1.thatReturnsNull;for(var t=0;e.length>t;t++){var n=e[t];if("function"!=typeof n)return warning_1$1(!1,"Invalid argument supplied to oneOfType. Expected an array of check functions, but received %s at index %s.",h(n),t),emptyFunction_1.thatReturnsNull}return c(function(t,n,r,o,a){for(var i=0;e.length>i;i++){var c=e[i];if(null==c(t,n,r,o,a,ReactPropTypesSecret_1))return null}return new s("Invalid "+o+" `"+a+"` supplied to `"+r+"`.")})},shape:function(e){return c(function(t,n,r,o,a){var i=t[n],c=l(i);if("object"!==c)return new s("Invalid "+o+" `"+a+"` of type `"+c+"` supplied to `"+r+"`, expected `object`.");for(var p in e){var u=e[p];if(u){var f=u(i,p,r,o,a+"."+p,ReactPropTypesSecret_1);if(f)return f}}return null})},exact:function(e){return c(function(t,n,r,o,a){var i=t[n],c=l(i);if("object"!==c)return new s("Invalid "+o+" `"+a+"` of type `"+c+"` supplied to `"+r+"`, expected `object`.");var p=objectAssign({},t[n],e);for(var u in p){var f=e[u];if(!f)return new s("Invalid "+o+" `"+a+"` key `"+u+"` supplied to `"+r+"`.\nBad object: "+JSON.stringify(t[n],null,"  ")+"\nValid keys: "+JSON.stringify(Object.keys(e),null,"  "));var h=f(i,u,r,o,a+"."+u,ReactPropTypesSecret_1);if(h)return h}return null})}};function i(e,t){return e===t?0!==e||1/e==1/t:e!=e&&t!=t}function s(e){this.message=e,this.stack=""}function c(e){if(true)var n={},r=0;function a(a,i,c,p,u,l,f){if(p=p||o,l=l||c,f!==ReactPropTypesSecret_1)if(t)invariant_1(!1,"Calling PropTypes validators directly is not supported by the `prop-types` package. Use `PropTypes.checkPropTypes()` to call them. Read more at http://fb.me/use-check-prop-types");else if("production"!=="development"&&void 0!==console){var h=p+":"+c;!n[h]&&3>r&&(warning_1$1(!1,"You are manually calling a React.PropTypes validation function for the `%s` prop on `%s`. This is deprecated and will throw in the standalone `prop-types` package. You may be seeing this warning due to a third-party PropTypes library. See https://fb.me/react-warning-dont-call-proptypes for details.",l,p),n[h]=!0,r++)}return null==i[c]?a?new s(null===i[c]?"The "+u+" `"+l+"` is marked as required in `"+p+"`, but its value is `null`.":"The "+u+" `"+l+"` is marked as required in `"+p+"`, but its value is `undefined`."):null:e(i,c,p,u,l)}var i=a.bind(null,!1);return i.isRequired=a.bind(null,!0),i}function p(e){return c(function(t,n,r,o,a,i){var c=t[n];return l(c)!==e?new s("Invalid "+o+" `"+a+"` of type `"+f(c)+"` supplied to `"+r+"`, expected `"+e+"`."):null})}function u(t){switch(typeof t){case"number":case"string":case"undefined":return!0;case"boolean":return!t;case"object":if(Array.isArray(t))return t.every(u);if(null===t||e(t))return!0;var o=function(e){var t=e&&(n&&e[n]||e[r]);if("function"==typeof t)return t}(t);if(!o)return!1;var a,i=o.call(t);if(o!==t.entries){for(;!(a=i.next()).done;)if(!u(a.value))return!1}else for(;!(a=i.next()).done;){var s=a.value;if(s&&!u(s[1]))return!1}return!0;default:return!1}}function l(e){var t=typeof e;return Array.isArray(e)?"array":e instanceof RegExp?"object":function(e,t){return"symbol"===e||"Symbol"===t["@@toStringTag"]||"function"==typeof Symbol&&t instanceof Symbol}(t,e)?"symbol":t}function f(e){if(null==e)return""+e;var t=l(e);if("object"===t){if(e instanceof Date)return"date";if(e instanceof RegExp)return"regexp"}return t}function h(e){var t=f(e);switch(t){case"array":case"object":return"an "+t;case"boolean":case"date":case"regexp":return"a "+t;default:return t}}return s.prototype=Error.prototype,a.checkPropTypes=checkPropTypes_1,a.PropTypes=a,a},factoryWithThrowingShims=function(){function e(e,t,n,r,o,a){a!==ReactPropTypesSecret_1&&invariant_1(!1,"Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types")}function t(){return e}e.isRequired=e;var n={array:e,bool:e,func:e,number:e,object:e,string:e,symbol:e,any:e,arrayOf:t,element:e,instanceOf:t,node:e,objectOf:t,oneOf:t,oneOfType:t,shape:t,exact:t};return n.checkPropTypes=emptyFunction_1,n.PropTypes=n,n},propTypes=createCommonjsModule(function(e){if(true){var t="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103;e.exports=factoryWithTypeCheckers(function(e){return"object"==typeof e&&null!==e&&e.$$typeof===t},!0)}else e.exports=factoryWithThrowingShims()}),__DEV__$1="production"!=="development",warning$3=function(){};__DEV__$1&&(warning$3=function(e,t,n){var r=arguments.length;n=Array(r>2?r-2:0);for(var o=2;r>o;o++)n[o-2]=arguments[o];if(void 0===t)throw Error("`warning(condition, format, ...args)` requires a warning message argument");if(10>t.length||/^[s\W]*$/.test(t))throw Error("The warning format should be able to uniquely identify this warning. Please, use a more descriptive format than: "+t);if(!e){var a=0,i="Warning: "+t.replace(/%s/g,function(){return n[a++]});void 0!==console&&console.error(i);try{throw Error(i)}catch(e){}}});var warning_1$2=warning$3,NODE_ENV="development",invariant$2=function(e,t,n,r,o,a,i,s){if("production"!==NODE_ENV&&void 0===t)throw Error("invariant requires an error message argument");if(!e){var c;if(void 0===t)c=Error("Minified exception occurred; use the non-minified dev environment for the full error message and additional helpful warnings.");else{var p=[n,r,o,a,i,s],u=0;(c=Error(t.replace(/%s/g,function(){return p[u++]}))).name="Invariant Violation"}throw c.framesToPop=1,c}},invariant_1$1=invariant$2,cjs=createCommonjsModule(function(e,t){function n(e){return"/"===e.charAt(0)}function r(e,t){for(var n=t,r=n+1,o=e.length;o>r;n+=1,r+=1)e[n]=e[r];e.pop()}t.__esModule=!0,t.default=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",o=e&&e.split("/")||[],a=t&&t.split("/")||[],i=e&&n(e),s=t&&n(t),c=i||s;if(e&&n(e)?a=o:o.length&&(a.pop(),a=a.concat(o)),!a.length)return"/";var p=void 0;if(a.length){var u=a[a.length-1];p="."===u||".."===u||""===u}else p=!1;for(var l=0,f=a.length;f>=0;f--){var h=a[f];"."===h?r(a,f):".."===h?(r(a,f),l++):l&&(r(a,f),l--)}if(!c)for(;l--;l)a.unshift("..");!c||""===a[0]||a[0]&&n(a[0])||a.unshift("");var d=a.join("/");return p&&"/"!==d.substr(-1)&&(d+="/"),d},e.exports=t.default}),resolvePathname=unwrapExports(cjs),cjs$1=createCommonjsModule(function(e,t){t.__esModule=!0;var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};t.default=function e(t,r){if(t===r)return!0;if(null==t||null==r)return!1;if(Array.isArray(t))return Array.isArray(r)&&t.length===r.length&&t.every(function(t,n){return e(t,r[n])});var o=void 0===t?"undefined":n(t);if(o!==(void 0===r?"undefined":n(r)))return!1;if("object"===o){var a=t.valueOf(),i=r.valueOf();if(a!==t||i!==r)return e(a,i);var s=Object.keys(t);return s.length===Object.keys(r).length&&s.every(function(n){return e(t[n],r[n])})}return!1},e.exports=t.default}),valueEqual=unwrapExports(cjs$1),addLeadingSlash=function(e){return"/"===e.charAt(0)?e:"/"+e},stripLeadingSlash=function(e){return"/"===e.charAt(0)?e.substr(1):e},hasBasename=function(e,t){return RegExp("^"+t+"(\\/|\\?|#|$)","i").test(e)},stripBasename=function(e,t){return hasBasename(e,t)?e.substr(t.length):e},stripTrailingSlash=function(e){return"/"===e.charAt(e.length-1)?e.slice(0,-1):e},parsePath=function(e){var t=e||"/",n="",r="",o=t.indexOf("#");-1!==o&&(r=t.substr(o),t=t.substr(0,o));var a=t.indexOf("?");return-1!==a&&(n=t.substr(a),t=t.substr(0,a)),{pathname:t,search:"?"===n?"":n,hash:"#"===r?"":r}},createPath=function(e){var t=e.search,n=e.hash,r=e.pathname||"/";return t&&"?"!==t&&(r+="?"===t.charAt(0)?t:"?"+t),n&&"#"!==n&&(r+="#"===n.charAt(0)?n:"#"+n),r},_extends=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},createLocation=function(e,t,n,r){var o=void 0;"string"==typeof e?(o=parsePath(e)).state=t:(void 0===(o=_extends({},e)).pathname&&(o.pathname=""),o.search?"?"!==o.search.charAt(0)&&(o.search="?"+o.search):o.search="",o.hash?"#"!==o.hash.charAt(0)&&(o.hash="#"+o.hash):o.hash="",void 0!==t&&void 0===o.state&&(o.state=t));try{o.pathname=decodeURI(o.pathname)}catch(e){throw e instanceof URIError?new URIError('Pathname "'+o.pathname+'" could not be decoded. This is likely caused by an invalid percent-encoding.'):e}return n&&(o.key=n),r?o.pathname?"/"!==o.pathname.charAt(0)&&(o.pathname=resolvePathname(o.pathname,r.pathname)):o.pathname=r.pathname:o.pathname||(o.pathname="/"),o},locationsAreEqual=function(e,t){return e.pathname===t.pathname&&e.search===t.search&&e.hash===t.hash&&e.key===t.key&&valueEqual(e.state,t.state)},createTransitionManager=function(){var e=null,t=[];return{setPrompt:function(t){return warning_1$2(null==e,"A history supports only one prompt at a time"),e=t,function(){e===t&&(e=null)}},confirmTransitionTo:function(t,n,r,o){if(null!=e){var a="function"==typeof e?e(t,n):e;"string"==typeof a?"function"==typeof r?r(a,o):(warning_1$2(!1,"A history needs a getUserConfirmation function in order to use a prompt message"),o(!0)):o(!1!==a)}else o(!0)},appendListener:function(e){var n=!0,r=function(){n&&e.apply(void 0,arguments)};return t.push(r),function(){n=!1,t=t.filter(function(e){return e!==r})}},notifyListeners:function(){for(var e=arguments.length,n=Array(e),r=0;e>r;r++)n[r]=arguments[r];t.forEach(function(e){return e.apply(void 0,n)})}}},canUseDOM=!("undefined"==typeof window||!window.document||!window.document.createElement),addEventListener=function(e,t,n){return e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent("on"+t,n)},removeEventListener=function(e,t,n){return e.removeEventListener?e.removeEventListener(t,n,!1):e.detachEvent("on"+t,n)},getConfirmation=function(e,t){return t(window.confirm(e))},supportsHistory=function(){var e=window.navigator.userAgent;return(-1===e.indexOf("Android 2.")&&-1===e.indexOf("Android 4.0")||-1===e.indexOf("Mobile Safari")||-1!==e.indexOf("Chrome")||-1!==e.indexOf("Windows Phone"))&&(window.history&&"pushState"in window.history)},supportsPopStateOnHashChange=function(){return-1===window.navigator.userAgent.indexOf("Trident")},supportsGoWithoutReloadUsingHash=function(){return-1===window.navigator.userAgent.indexOf("Firefox")},isExtraneousPopstateEvent=function(e){return void 0===e.state&&-1===navigator.userAgent.indexOf("CriOS")},_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},_extends$1=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},PopStateEvent="popstate",HashChangeEvent="hashchange",getHistoryState=function(){try{return window.history.state||{}}catch(e){return{}}},createBrowserHistory=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};invariant_1$1(canUseDOM,"Browser history needs a DOM");var t=window.history,n=supportsHistory(),r=!supportsPopStateOnHashChange(),o=e.forceRefresh,a=void 0!==o&&o,i=e.getUserConfirmation,s=void 0===i?getConfirmation:i,c=e.keyLength,p=void 0===c?6:c,u=e.basename?stripTrailingSlash(addLeadingSlash(e.basename)):"",l=function(e){var t=e||{},n=t.key,r=t.state,o=window.location,a=o.pathname+o.search+o.hash;return warning_1$2(!u||hasBasename(a,u),'You are attempting to use a basename on a page whose URL path does not begin with the basename. Expected path "'+a+'" to begin with "'+u+'".'),u&&(a=stripBasename(a,u)),createLocation(a,r,n)},f=function(){return Math.random().toString(36).substr(2,p)},h=createTransitionManager(),d=function(e){_extends$1(C,e),C.length=t.length,h.notifyListeners(C.location,C.action)},y=function(e){isExtraneousPopstateEvent(e)||v(l(e.state))},m=function(){v(l(getHistoryState()))},g=!1,v=function(e){if(g)g=!1,d();else{h.confirmTransitionTo(e,"POP",s,function(t){t?d({action:"POP",location:e}):b(e)})}},b=function(e){var t=w.indexOf(C.location.key);-1===t&&(t=0);var n=w.indexOf(e.key);-1===n&&(n=0);var r=t-n;r&&(g=!0,R(r))},_=l(getHistoryState()),w=[_.key],T=function(e){return u+createPath(e)},R=function(e){t.go(e)},E=0,O=function(e){1===(E+=e)?(addEventListener(window,PopStateEvent,y),r&&addEventListener(window,HashChangeEvent,m)):0===E&&(removeEventListener(window,PopStateEvent,y),r&&removeEventListener(window,HashChangeEvent,m))},P=!1,C={length:t.length,action:"POP",location:_,createHref:T,push:function(e,r){warning_1$2(!("object"===(void 0===e?"undefined":_typeof(e))&&void 0!==e.state&&void 0!==r),"You should avoid providing a 2nd state argument to push when the 1st argument is a location-like object that already has state; it is ignored");var o=createLocation(e,r,f(),C.location);h.confirmTransitionTo(o,"PUSH",s,function(e){if(e){var r=T(o),i=o.state;if(n)if(t.pushState({key:o.key,state:i},null,r),a)window.location.href=r;else{var s=w.indexOf(C.location.key),c=w.slice(0,-1===s?0:s+1);c.push(o.key),w=c,d({action:"PUSH",location:o})}else warning_1$2(void 0===i,"Browser history cannot push state in browsers that do not support HTML5 history"),window.location.href=r}})},replace:function(e,r){warning_1$2(!("object"===(void 0===e?"undefined":_typeof(e))&&void 0!==e.state&&void 0!==r),"You should avoid providing a 2nd state argument to replace when the 1st argument is a location-like object that already has state; it is ignored");var o=createLocation(e,r,f(),C.location);h.confirmTransitionTo(o,"REPLACE",s,function(e){if(e){var r=T(o),i=o.state;if(n)if(t.replaceState({key:o.key,state:i},null,r),a)window.location.replace(r);else{var s=w.indexOf(C.location.key);-1!==s&&(w[s]=o.key),d({action:"REPLACE",location:o})}else warning_1$2(void 0===i,"Browser history cannot replace state in browsers that do not support HTML5 history"),window.location.replace(r)}})},go:R,goBack:function(){return R(-1)},goForward:function(){return R(1)},block:function(){var e=h.setPrompt(arguments.length>0&&void 0!==arguments[0]&&arguments[0]);return P||(O(1),P=!0),function(){return P&&(P=!1,O(-1)),e()}},listen:function(e){var t=h.appendListener(e);return O(1),function(){O(-1),t()}}};return C},_extends$2=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},HashChangeEvent$1="hashchange",HashPathCoders={hashbang:{encodePath:function(e){return"!"===e.charAt(0)?e:"!/"+stripLeadingSlash(e)},decodePath:function(e){return"!"===e.charAt(0)?e.substr(1):e}},noslash:{encodePath:stripLeadingSlash,decodePath:addLeadingSlash},slash:{encodePath:addLeadingSlash,decodePath:addLeadingSlash}},getHashPath=function(){var e=window.location.href,t=e.indexOf("#");return-1===t?"":e.substring(t+1)},pushHashPath=function(e){return window.location.hash=e},replaceHashPath=function(e){var t=window.location.href.indexOf("#");window.location.replace(window.location.href.slice(0,0>t?0:t)+"#"+e)},createHashHistory=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};invariant_1$1(canUseDOM,"Hash history needs a DOM");var t=window.history,n=supportsGoWithoutReloadUsingHash(),r=e.getUserConfirmation,o=void 0===r?getConfirmation:r,a=e.hashType,i=void 0===a?"slash":a,s=e.basename?stripTrailingSlash(addLeadingSlash(e.basename)):"",c=HashPathCoders[i],p=c.encodePath,u=c.decodePath,l=function(){var e=u(getHashPath());return warning_1$2(!s||hasBasename(e,s),'You are attempting to use a basename on a page whose URL path does not begin with the basename. Expected path "'+e+'" to begin with "'+s+'".'),s&&(e=stripBasename(e,s)),createLocation(e)},f=createTransitionManager(),h=function(e){_extends$2(C,e),C.length=t.length,f.notifyListeners(C.location,C.action)},d=!1,y=null,m=function(){var e=getHashPath(),t=p(e);if(e!==t)replaceHashPath(t);else{var n=l();if(!d&&locationsAreEqual(C.location,n))return;if(y===createPath(n))return;y=null,g(n)}},g=function(e){if(d)d=!1,h();else{f.confirmTransitionTo(e,"POP",o,function(t){t?h({action:"POP",location:e}):v(e)})}},v=function(e){var t=T.lastIndexOf(createPath(C.location));-1===t&&(t=0);var n=T.lastIndexOf(createPath(e));-1===n&&(n=0);var r=t-n;r&&(d=!0,R(r))},b=getHashPath(),_=p(b);b!==_&&replaceHashPath(_);var w=l(),T=[createPath(w)],R=function(e){warning_1$2(n,"Hash history go(n) causes a full page reload in this browser"),t.go(e)},E=0,O=function(e){1===(E+=e)?addEventListener(window,HashChangeEvent$1,m):0===E&&removeEventListener(window,HashChangeEvent$1,m)},P=!1,C={length:t.length,action:"POP",location:w,createHref:function(e){return"#"+p(s+createPath(e))},push:function(e,t){warning_1$2(void 0===t,"Hash history cannot push state; it is ignored");var n=createLocation(e,void 0,void 0,C.location);f.confirmTransitionTo(n,"PUSH",o,function(e){if(e){var t=createPath(n),r=p(s+t);if(getHashPath()!==r){y=t,pushHashPath(r);var o=T.lastIndexOf(createPath(C.location)),a=T.slice(0,-1===o?0:o+1);a.push(t),T=a,h({action:"PUSH",location:n})}else warning_1$2(!1,"Hash history cannot PUSH the same path; a new entry will not be added to the history stack"),h()}})},replace:function(e,t){warning_1$2(void 0===t,"Hash history cannot replace state; it is ignored");var n=createLocation(e,void 0,void 0,C.location);f.confirmTransitionTo(n,"REPLACE",o,function(e){if(e){var t=createPath(n),r=p(s+t);getHashPath()!==r&&(y=t,replaceHashPath(r));var o=T.indexOf(createPath(C.location));-1!==o&&(T[o]=t),h({action:"REPLACE",location:n})}})},go:R,goBack:function(){return R(-1)},goForward:function(){return R(1)},block:function(){var e=f.setPrompt(arguments.length>0&&void 0!==arguments[0]&&arguments[0]);return P||(O(1),P=!0),function(){return P&&(P=!1,O(-1)),e()}},listen:function(e){var t=f.appendListener(e);return O(1),function(){O(-1),t()}}};return C},_typeof$1="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},_extends$3=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},clamp=function(e,t,n){return Math.min(Math.max(e,t),n)},createMemoryHistory=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.getUserConfirmation,n=e.initialEntries,r=void 0===n?["/"]:n,o=e.initialIndex,a=void 0===o?0:o,i=e.keyLength,s=void 0===i?6:i,c=createTransitionManager(),p=function(e){_extends$3(d,e),d.length=d.entries.length,c.notifyListeners(d.location,d.action)},u=function(){return Math.random().toString(36).substr(2,s)},l=clamp(a,0,r.length-1),f=r.map(function(e){return createLocation(e,void 0,"string"==typeof e?u():e.key||u())}),h=function(e){var n=clamp(d.index+e,0,d.entries.length-1),r=d.entries[n];c.confirmTransitionTo(r,"POP",t,function(e){e?p({action:"POP",location:r,index:n}):p()})},d={length:f.length,action:"POP",location:f[l],index:l,entries:f,createHref:createPath,push:function(e,n){warning_1$2(!("object"===(void 0===e?"undefined":_typeof$1(e))&&void 0!==e.state&&void 0!==n),"You should avoid providing a 2nd state argument to push when the 1st argument is a location-like object that already has state; it is ignored");var r=createLocation(e,n,u(),d.location);c.confirmTransitionTo(r,"PUSH",t,function(e){if(e){var t=d.index+1,n=d.entries.slice(0);n.length>t?n.splice(t,n.length-t,r):n.push(r),p({action:"PUSH",location:r,index:t,entries:n})}})},replace:function(e,n){warning_1$2(!("object"===(void 0===e?"undefined":_typeof$1(e))&&void 0!==e.state&&void 0!==n),"You should avoid providing a 2nd state argument to replace when the 1st argument is a location-like object that already has state; it is ignored");var r=createLocation(e,n,u(),d.location);c.confirmTransitionTo(r,"REPLACE",t,function(e){e&&(d.entries[d.index]=r,p({action:"REPLACE",location:r}))})},go:h,goBack:function(){return h(-1)},goForward:function(){return h(1)},canGo:function(e){var t=d.index+e;return t>=0&&d.entries.length>t},block:function(){return c.setPrompt(arguments.length>0&&void 0!==arguments[0]&&arguments[0])},listen:function(e){return c.appendListener(e)}};return d},_extends$4=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e};function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var Router=function(e){function t(){var n,r;_classCallCheck(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn(this,e.call.apply(e,[this].concat(a))),r.state={match:r.computeMatch(r.props.history.location.pathname)},_possibleConstructorReturn(r,n)}return _inherits(t,e),t.prototype.getChildContext=function(){return{router:_extends$4({},this.context.router,{history:this.props.history,route:{location:this.props.history.location,match:this.state.match}})}},t.prototype.computeMatch=function(e){return{path:"/",url:"/",params:{},isExact:"/"===e}},t.prototype.componentWillMount=function(){var e=this,t=this.props,n=t.children,r=t.history;invariant_1$1(null==n||1===__WEBPACK_IMPORTED_MODULE_0_react___default.a.Children.count(n),"A <Router> may have only one child element"),this.unlisten=r.listen(function(){e.setState({match:e.computeMatch(r.location.pathname)})})},t.prototype.componentWillReceiveProps=function(e){warning_1(this.props.history===e.history,"You cannot change <Router history>")},t.prototype.componentWillUnmount=function(){this.unlisten()},t.prototype.render=function(){var e=this.props.children;return e?__WEBPACK_IMPORTED_MODULE_0_react___default.a.Children.only(e):null},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);function _classCallCheck$1(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$1(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$1(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Router.propTypes={history:propTypes.object.isRequired,children:propTypes.node},Router.contextTypes={router:propTypes.object},Router.childContextTypes={router:propTypes.object.isRequired};var BrowserRouter=function(e){function t(){var n,r;_classCallCheck$1(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$1(this,e.call.apply(e,[this].concat(a))),r.history=createBrowserHistory(r.props),_possibleConstructorReturn$1(r,n)}return _inherits$1(t,e),t.prototype.componentWillMount=function(){warning_1(!this.props.history,"<BrowserRouter> ignores the history prop. To use a custom history, use `import { Router }` instead of `import { BrowserRouter as Router }`.")},t.prototype.render=function(){return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Router,{history:this.history,children:this.props.children})},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);function _classCallCheck$2(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$2(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$2(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}BrowserRouter.propTypes={basename:propTypes.string,forceRefresh:propTypes.bool,getUserConfirmation:propTypes.func,keyLength:propTypes.number,children:propTypes.node};var HashRouter=function(e){function t(){var n,r;_classCallCheck$2(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$2(this,e.call.apply(e,[this].concat(a))),r.history=createHashHistory(r.props),_possibleConstructorReturn$2(r,n)}return _inherits$2(t,e),t.prototype.componentWillMount=function(){warning_1(!this.props.history,"<HashRouter> ignores the history prop. To use a custom history, use `import { Router }` instead of `import { HashRouter as Router }`.")},t.prototype.render=function(){return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Router,{history:this.history,children:this.props.children})},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);HashRouter.propTypes={basename:propTypes.string,getUserConfirmation:propTypes.func,hashType:propTypes.oneOf(["hashbang","noslash","slash"]),children:propTypes.node};var _extends$5=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e};function _objectWithoutProperties(e,t){var n={};for(var r in e)0>t.indexOf(r)&&Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}function _classCallCheck$3(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$3(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$3(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var isModifiedEvent=function(e){return!!(e.metaKey||e.altKey||e.ctrlKey||e.shiftKey)},Link=function(e){function t(){var n,r;_classCallCheck$3(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$3(this,e.call.apply(e,[this].concat(a))),r.handleClick=function(e){if(r.props.onClick&&r.props.onClick(e),!e.defaultPrevented&&0===e.button&&!r.props.target&&!isModifiedEvent(e)){e.preventDefault();var t=r.context.router.history,n=r.props,o=n.to;n.replace?t.replace(o):t.push(o)}},_possibleConstructorReturn$3(r,n)}return _inherits$3(t,e),t.prototype.render=function(){var e=this.props,t=e.to,n=e.innerRef,r=_objectWithoutProperties(e,["replace","to","innerRef"]);invariant_1$1(this.context.router,"You should not use <Link> outside a <Router>"),invariant_1$1(void 0!==t,'You must specify the "to" property');var o=this.context.router.history,a="string"==typeof t?createLocation(t,null,null,o.location):t,i=o.createHref(a);return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement("a",_extends$5({},r,{onClick:this.handleClick,href:i,ref:n}))},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);function _classCallCheck$4(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$4(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$4(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Link.propTypes={onClick:propTypes.func,target:propTypes.string,replace:propTypes.bool,to:propTypes.oneOfType([propTypes.string,propTypes.object]).isRequired,innerRef:propTypes.oneOfType([propTypes.string,propTypes.func])},Link.defaultProps={replace:!1},Link.contextTypes={router:propTypes.shape({history:propTypes.shape({push:propTypes.func.isRequired,replace:propTypes.func.isRequired,createHref:propTypes.func.isRequired}).isRequired}).isRequired};var MemoryRouter=function(e){function t(){var n,r;_classCallCheck$4(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$4(this,e.call.apply(e,[this].concat(a))),r.history=createMemoryHistory(r.props),_possibleConstructorReturn$4(r,n)}return _inherits$4(t,e),t.prototype.componentWillMount=function(){warning_1(!this.props.history,"<MemoryRouter> ignores the history prop. To use a custom history, use `import { Router }` instead of `import { MemoryRouter as Router }`.")},t.prototype.render=function(){return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Router,{history:this.history,children:this.props.children})},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);MemoryRouter.propTypes={initialEntries:propTypes.array,initialIndex:propTypes.number,getUserConfirmation:propTypes.func,keyLength:propTypes.number,children:propTypes.node};var isarray=Array.isArray||function(e){return"[object Array]"==Object.prototype.toString.call(e)},pathToRegexp_1=pathToRegexp,parse_1=parse,compile_1=compile,tokensToFunction_1=tokensToFunction,tokensToRegExp_1=tokensToRegExp,PATH_REGEXP=/(\\.)|([\/.])?(?:(?:\:(\w+)(?:\(((?:\\.|[^\\()])+)\))?|\(((?:\\.|[^\\()])+)\))([+*?])?|(\*))/g;function parse(e,t){for(var n,r=[],o=0,a=0,i="",s=t&&t.delimiter||"/";null!=(n=PATH_REGEXP.exec(e));){var c=n[0],p=n[1],u=n.index;if(i+=e.slice(a,u),a=u+c.length,p)i+=p[1];else{var l=e[a],f=n[2],h=n[3],d=n[4],y=n[5],m=n[6],g=n[7];i&&(r.push(i),i="");var v=n[2]||s,b=d||y;r.push({name:h||o++,prefix:f||"",delimiter:v,optional:"?"===m||"*"===m,repeat:"+"===m||"*"===m,partial:null!=f&&null!=l&&l!==f,asterisk:!!g,pattern:b?escapeGroup(b):g?".*":"[^"+escapeString(v)+"]+?"})}}return e.length>a&&(i+=e.substr(a)),i&&r.push(i),r}function compile(e,t){return tokensToFunction(parse(e,t))}function encodeURIComponentPretty(e){return encodeURI(e).replace(/[\/?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function encodeAsterisk(e){return encodeURI(e).replace(/[?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function tokensToFunction(e){for(var t=Array(e.length),n=0;e.length>n;n++)"object"==typeof e[n]&&(t[n]=RegExp("^(?:"+e[n].pattern+")$"));return function(n,r){for(var o="",a=n||{},i=(r||{}).pretty?encodeURIComponentPretty:encodeURIComponent,s=0;e.length>s;s++){var c=e[s];if("string"!=typeof c){var p,u=a[c.name];if(null==u){if(c.optional){c.partial&&(o+=c.prefix);continue}throw new TypeError('Expected "'+c.name+'" to be defined')}if(isarray(u)){if(!c.repeat)throw new TypeError('Expected "'+c.name+'" to not repeat, but received `'+JSON.stringify(u)+"`");if(0===u.length){if(c.optional)continue;throw new TypeError('Expected "'+c.name+'" to not be empty')}for(var l=0;u.length>l;l++){if(p=i(u[l]),!t[s].test(p))throw new TypeError('Expected all "'+c.name+'" to match "'+c.pattern+'", but received `'+JSON.stringify(p)+"`");o+=(0===l?c.prefix:c.delimiter)+p}}else{if(p=c.asterisk?encodeAsterisk(u):i(u),!t[s].test(p))throw new TypeError('Expected "'+c.name+'" to match "'+c.pattern+'", but received "'+p+'"');o+=c.prefix+p}}else o+=c}return o}}function escapeString(e){return e.replace(/([.+*?=^!:${}()[\]|\/\\])/g,"\\$1")}function escapeGroup(e){return e.replace(/([=!:$\/()])/g,"\\$1")}function attachKeys(e,t){return e.keys=t,e}function flags(e){return e.sensitive?"":"i"}function regexpToRegexp(e,t){var n=e.source.match(/\((?!\?)/g);if(n)for(var r=0;n.length>r;r++)t.push({name:r,prefix:null,delimiter:null,optional:!1,repeat:!1,partial:!1,asterisk:!1,pattern:null});return attachKeys(e,t)}function arrayToRegexp(e,t,n){for(var r=[],o=0;e.length>o;o++)r.push(pathToRegexp(e[o],t,n).source);return attachKeys(RegExp("(?:"+r.join("|")+")",flags(n)),t)}function stringToRegexp(e,t,n){return tokensToRegExp(parse(e,n),t,n)}function tokensToRegExp(e,t,n){isarray(t)||(n=t||n,t=[]);for(var r=(n=n||{}).strict,o=!1!==n.end,a="",i=0;e.length>i;i++){var s=e[i];if("string"==typeof s)a+=escapeString(s);else{var c=escapeString(s.prefix),p="(?:"+s.pattern+")";t.push(s),s.repeat&&(p+="(?:"+c+p+")*"),a+=p=s.optional?s.partial?c+"("+p+")?":"(?:"+c+"("+p+"))?":c+"("+p+")"}}var u=escapeString(n.delimiter||"/"),l=a.slice(-u.length)===u;return r||(a=(l?a.slice(0,-u.length):a)+"(?:"+u+"(?=$))?"),attachKeys(RegExp("^"+(a+=o?"$":r&&l?"":"(?="+u+"|$)"),flags(n)),t)}function pathToRegexp(e,t,n){return isarray(t)||(n=t||n,t=[]),n=n||{},e instanceof RegExp?regexpToRegexp(e,t):isarray(e)?arrayToRegexp(e,t,n):stringToRegexp(e,t,n)}pathToRegexp_1.parse=parse_1,pathToRegexp_1.compile=compile_1,pathToRegexp_1.tokensToFunction=tokensToFunction_1,pathToRegexp_1.tokensToRegExp=tokensToRegExp_1;var patternCache={},cacheLimit=1e4,cacheCount=0,compilePath=function(e,t){var n=""+t.end+t.strict+t.sensitive,r=patternCache[n]||(patternCache[n]={});if(r[e])return r[e];var o=[],a={re:pathToRegexp_1(e,o,t),keys:o};return cacheLimit>cacheCount&&(r[e]=a,cacheCount++),a},matchPath=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};"string"==typeof t&&(t={path:t});var n=t.path,r=t.exact,o=void 0!==r&&r,a=t.strict,i=t.sensitive;if(null==n)return arguments[2];var s=compilePath(n,{end:o,strict:void 0!==a&&a,sensitive:void 0!==i&&i}),c=s.keys,p=s.re.exec(e);if(!p)return null;var u=p[0],l=p.slice(1),f=e===u;return o&&!f?null:{path:n,url:"/"===n&&""===u?"/":u,isExact:f,params:c.reduce(function(e,t,n){return e[t.name]=l[n],e},{})}},_extends$6=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e};function _classCallCheck$5(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$5(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$5(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var isEmptyChildren=function(e){return 0===__WEBPACK_IMPORTED_MODULE_0_react___default.a.Children.count(e)},Route=function(e){function t(){var n,r;_classCallCheck$5(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$5(this,e.call.apply(e,[this].concat(a))),r.state={match:r.computeMatch(r.props,r.context.router)},_possibleConstructorReturn$5(r,n)}return _inherits$5(t,e),t.prototype.getChildContext=function(){return{router:_extends$6({},this.context.router,{route:{location:this.props.location||this.context.router.route.location,match:this.state.match}})}},t.prototype.computeMatch=function(e,t){var n=e.computedMatch,r=e.location,o=e.path,a=e.strict,i=e.exact,s=e.sensitive;if(n)return n;invariant_1$1(t,"You should not use <Route> or withRouter() outside a <Router>");var c=t.route;return matchPath((r||c.location).pathname,{path:o,strict:a,exact:i,sensitive:s},c.match)},t.prototype.componentWillMount=function(){warning_1(!(this.props.component&&this.props.render),"You should not use <Route component> and <Route render> in the same route; <Route render> will be ignored"),warning_1(!(this.props.component&&this.props.children&&!isEmptyChildren(this.props.children)),"You should not use <Route component> and <Route children> in the same route; <Route children> will be ignored"),warning_1(!(this.props.render&&this.props.children&&!isEmptyChildren(this.props.children)),"You should not use <Route render> and <Route children> in the same route; <Route children> will be ignored")},t.prototype.componentWillReceiveProps=function(e,t){warning_1(!(e.location&&!this.props.location),'<Route> elements should not change from uncontrolled to controlled (or vice versa). You initially used no "location" prop and then provided one on a subsequent render.'),warning_1(!(!e.location&&this.props.location),'<Route> elements should not change from controlled to uncontrolled (or vice versa). You provided a "location" prop initially but omitted it on a subsequent render.'),this.setState({match:this.computeMatch(e,t.router)})},t.prototype.render=function(){var e=this.state.match,t=this.props,n=t.children,r=t.component,o=t.render,a=this.context.router,i={match:e,location:this.props.location||a.route.location,history:a.history,staticContext:a.staticContext};return r?e?__WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(r,i):null:o?e?o(i):null:"function"==typeof n?n(i):n&&!isEmptyChildren(n)?__WEBPACK_IMPORTED_MODULE_0_react___default.a.Children.only(n):null},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);Route.propTypes={computedMatch:propTypes.object,path:propTypes.string,exact:propTypes.bool,strict:propTypes.bool,sensitive:propTypes.bool,component:propTypes.func,render:propTypes.func,children:propTypes.oneOfType([propTypes.func,propTypes.node]),location:propTypes.object},Route.contextTypes={router:propTypes.shape({history:propTypes.object.isRequired,route:propTypes.object.isRequired,staticContext:propTypes.object})},Route.childContextTypes={router:propTypes.object.isRequired};var _extends$7=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},_typeof$2="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};function _objectWithoutProperties$1(e,t){var n={};for(var r in e)0>t.indexOf(r)&&Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}var NavLink=function(e){var t=e.to,n=e.exact,r=e.strict,o=e.location,a=e.activeClassName,i=e.className,s=e.activeStyle,c=e.style,p=e.isActive,u=e["aria-current"],l=_objectWithoutProperties$1(e,["to","exact","strict","location","activeClassName","className","activeStyle","style","isActive","aria-current"]),f="object"===(void 0===t?"undefined":_typeof$2(t))?t.pathname:t,h=f&&f.replace(/([.+*?=^!:${}()[\]|\/\\])/g,"\\$1");return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Route,{path:h,exact:n,strict:r,location:o,children:function(e){var n=e.match,r=!!(p?p(n,e.location):n);return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Link,_extends$7({to:t,className:r?[i,a].filter(function(e){return e}).join(" "):i,style:r?_extends$7({},c,s):c,"aria-current":r&&u||null},l))}})};function _classCallCheck$6(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$6(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$6(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}NavLink.propTypes={to:Link.propTypes.to,exact:propTypes.bool,strict:propTypes.bool,location:propTypes.object,activeClassName:propTypes.string,className:propTypes.string,activeStyle:propTypes.object,style:propTypes.object,isActive:propTypes.func,"aria-current":propTypes.oneOf(["page","step","location","date","time","true"])},NavLink.defaultProps={activeClassName:"active","aria-current":"page"};var Prompt=function(e){function t(){return _classCallCheck$6(this,t),_possibleConstructorReturn$6(this,e.apply(this,arguments))}return _inherits$6(t,e),t.prototype.enable=function(e){this.unblock&&this.unblock(),this.unblock=this.context.router.history.block(e)},t.prototype.disable=function(){this.unblock&&(this.unblock(),this.unblock=null)},t.prototype.componentWillMount=function(){invariant_1$1(this.context.router,"You should not use <Prompt> outside a <Router>"),this.props.when&&this.enable(this.props.message)},t.prototype.componentWillReceiveProps=function(e){e.when?this.props.when&&this.props.message===e.message||this.enable(e.message):this.disable()},t.prototype.componentWillUnmount=function(){this.disable()},t.prototype.render=function(){return null},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);Prompt.propTypes={when:propTypes.bool,message:propTypes.oneOfType([propTypes.func,propTypes.string]).isRequired},Prompt.defaultProps={when:!0},Prompt.contextTypes={router:propTypes.shape({history:propTypes.shape({block:propTypes.func.isRequired}).isRequired}).isRequired};var patternCache$1={},cacheLimit$1=1e4,cacheCount$1=0,compileGenerator=function(e){var t=patternCache$1[e]||(patternCache$1[e]={});if(t[e])return t[e];var n=pathToRegexp_1.compile(e);return cacheLimit$1>cacheCount$1&&(t[e]=n,cacheCount$1++),n},generatePath=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"/",t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return"/"===e?e:compileGenerator(e)(t,{pretty:!0})},_extends$8=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e};function _classCallCheck$7(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$7(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$7(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var Redirect=function(e){function t(){return _classCallCheck$7(this,t),_possibleConstructorReturn$7(this,e.apply(this,arguments))}return _inherits$7(t,e),t.prototype.isStatic=function(){return this.context.router&&this.context.router.staticContext},t.prototype.componentWillMount=function(){invariant_1$1(this.context.router,"You should not use <Redirect> outside a <Router>"),this.isStatic()&&this.perform()},t.prototype.componentDidMount=function(){this.isStatic()||this.perform()},t.prototype.componentDidUpdate=function(e){var t=createLocation(e.to),n=createLocation(this.props.to);locationsAreEqual(t,n)?warning_1(!1,"You tried to redirect to the same route you're currently on: \""+n.pathname+n.search+'"'):this.perform()},t.prototype.computeTo=function(e){var t=e.computedMatch,n=e.to;return t?"string"==typeof n?generatePath(n,t.params):_extends$8({},n,{pathname:generatePath(n.pathname,t.params)}):n},t.prototype.perform=function(){var e=this.context.router.history,t=this.props.push,n=this.computeTo(this.props);t?e.push(n):e.replace(n)},t.prototype.render=function(){return null},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);Redirect.propTypes={computedMatch:propTypes.object,push:propTypes.bool,from:propTypes.string,to:propTypes.oneOfType([propTypes.string,propTypes.object]).isRequired},Redirect.defaultProps={push:!1},Redirect.contextTypes={router:propTypes.shape({history:propTypes.shape({push:propTypes.func.isRequired,replace:propTypes.func.isRequired}).isRequired,staticContext:propTypes.object}).isRequired};var _extends$9=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e};function _objectWithoutProperties$2(e,t){var n={};for(var r in e)0>t.indexOf(r)&&Object.prototype.hasOwnProperty.call(e,r)&&(n[r]=e[r]);return n}function _classCallCheck$8(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$8(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$8(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}var addLeadingSlash$1=function(e){return"/"===e.charAt(0)?e:"/"+e},addBasename=function(e,t){return e?_extends$9({},t,{pathname:addLeadingSlash$1(e)+t.pathname}):t},stripBasename$1=function(e,t){if(!e)return t;var n=addLeadingSlash$1(e);return 0!==t.pathname.indexOf(n)?t:_extends$9({},t,{pathname:t.pathname.substr(n.length)})},createURL=function(e){return"string"==typeof e?e:createPath(e)},staticHandler=function(e){return function(){invariant_1$1(!1,"You cannot %s with <StaticRouter>",e)}},noop=function(){},StaticRouter=function(e){function t(){var n,r;_classCallCheck$8(this,t);for(var o=arguments.length,a=Array(o),i=0;o>i;i++)a[i]=arguments[i];return n=r=_possibleConstructorReturn$8(this,e.call.apply(e,[this].concat(a))),r.createHref=function(e){return addLeadingSlash$1(r.props.basename+createURL(e))},r.handlePush=function(e){var t=r.props,n=t.basename,o=t.context;o.action="PUSH",o.location=addBasename(n,createLocation(e)),o.url=createURL(o.location)},r.handleReplace=function(e){var t=r.props,n=t.basename,o=t.context;o.action="REPLACE",o.location=addBasename(n,createLocation(e)),o.url=createURL(o.location)},r.handleListen=function(){return noop},r.handleBlock=function(){return noop},_possibleConstructorReturn$8(r,n)}return _inherits$8(t,e),t.prototype.getChildContext=function(){return{router:{staticContext:this.props.context}}},t.prototype.componentWillMount=function(){warning_1(!this.props.history,"<StaticRouter> ignores the history prop. To use a custom history, use `import { Router }` instead of `import { StaticRouter as Router }`.")},t.prototype.render=function(){var e=this.props,t=e.basename,n=e.location,r=_objectWithoutProperties$2(e,["basename","context","location"]),o={createHref:this.createHref,action:"POP",location:stripBasename$1(t,createLocation(n)),push:this.handlePush,replace:this.handleReplace,go:staticHandler("go"),goBack:staticHandler("goBack"),goForward:staticHandler("goForward"),listen:this.handleListen,block:this.handleBlock};return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(Router,_extends$9({},r,{history:o}))},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);function _classCallCheck$9(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _possibleConstructorReturn$9(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function _inherits$9(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}StaticRouter.propTypes={basename:propTypes.string,context:propTypes.object.isRequired,location:propTypes.oneOfType([propTypes.string,propTypes.object])},StaticRouter.defaultProps={basename:"",location:"/"},StaticRouter.childContextTypes={router:propTypes.object.isRequired};var Switch=function(e){function t(){return _classCallCheck$9(this,t),_possibleConstructorReturn$9(this,e.apply(this,arguments))}return _inherits$9(t,e),t.prototype.componentWillMount=function(){invariant_1$1(this.context.router,"You should not use <Switch> outside a <Router>")},t.prototype.componentWillReceiveProps=function(e){warning_1(!(e.location&&!this.props.location),'<Switch> elements should not change from uncontrolled to controlled (or vice versa). You initially used no "location" prop and then provided one on a subsequent render.'),warning_1(!(!e.location&&this.props.location),'<Switch> elements should not change from controlled to uncontrolled (or vice versa). You provided a "location" prop initially but omitted it on a subsequent render.')},t.prototype.render=function(){var e=this.context.router.route,t=this.props.location||e.location,n=void 0,r=void 0;return __WEBPACK_IMPORTED_MODULE_0_react___default.a.Children.forEach(this.props.children,function(o){if(null==n&&__WEBPACK_IMPORTED_MODULE_0_react___default.a.isValidElement(o)){var a=o.props;r=o,n=matchPath(t.pathname,{path:a.path||a.from,exact:a.exact,strict:a.strict,sensitive:a.sensitive},e.match)}}),n?__WEBPACK_IMPORTED_MODULE_0_react___default.a.cloneElement(r,{location:t,computedMatch:n}):null},t}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);Switch.contextTypes={router:propTypes.shape({route:propTypes.object.isRequired}).isRequired},Switch.propTypes={children:propTypes.node,location:propTypes.object};var hoistNonReactStatics=createCommonjsModule(function(e,t){var n,r,o,a,i,s,c,p;e.exports=(n={childContextTypes:!0,contextTypes:!0,defaultProps:!0,displayName:!0,getDefaultProps:!0,getDerivedStateFromProps:!0,mixins:!0,propTypes:!0,type:!0},r={name:!0,length:!0,prototype:!0,caller:!0,callee:!0,arguments:!0,arity:!0},o=Object.defineProperty,a=Object.getOwnPropertyNames,i=Object.getOwnPropertySymbols,s=Object.getOwnPropertyDescriptor,p=(c=Object.getPrototypeOf)&&c(Object),function e(t,u,l){if("string"!=typeof u){if(p){var f=c(u);f&&f!==p&&e(t,f,l)}var h=a(u);i&&(h=h.concat(i(u)));for(var d=0;h.length>d;++d){var y=h[d];if(!(n[y]||r[y]||l&&l[y])){var m=s(u,y);try{o(t,y,m)}catch(e){}}}return t}return t})}),isMergeableObject=function(e){return isNonNullObject(e)&&!isSpecial(e)};function isNonNullObject(e){return!!e&&"object"==typeof e}function isSpecial(e){var t=Object.prototype.toString.call(e);return"[object RegExp]"===t||"[object Date]"===t||isReactElement(e)}var canUseSymbol="function"==typeof Symbol&&Symbol.for,REACT_ELEMENT_TYPE=canUseSymbol?Symbol.for("react.element"):60103;function isReactElement(e){return e.$$typeof===REACT_ELEMENT_TYPE}function emptyTarget(e){return Array.isArray(e)?[]:{}}function cloneUnlessOtherwiseSpecified(e,t){return!1!==t.clone&&t.isMergeableObject(e)?deepmerge(emptyTarget(e),e,t):e}function defaultArrayMerge(e,t,n){return e.concat(t).map(function(e){return cloneUnlessOtherwiseSpecified(e,n)})}function mergeObject(e,t,n){var r={};return n.isMergeableObject(e)&&Object.keys(e).forEach(function(t){r[t]=cloneUnlessOtherwiseSpecified(e[t],n)}),Object.keys(t).forEach(function(o){r[o]=n.isMergeableObject(t[o])&&e[o]?deepmerge(e[o],t[o],n):cloneUnlessOtherwiseSpecified(t[o],n)}),r}function deepmerge(e,t,n){(n=n||{}).arrayMerge=n.arrayMerge||defaultArrayMerge,n.isMergeableObject=n.isMergeableObject||isMergeableObject;var r=Array.isArray(t);return r===Array.isArray(e)?r?n.arrayMerge(e,t,n):mergeObject(e,t,n):cloneUnlessOtherwiseSpecified(t,n)}deepmerge.all=function(e,t){if(!Array.isArray(e))throw Error("first argument should be an array");return e.reduce(function(e,n){return deepmerge(e,n,t)},{})};var deepmerge_1=deepmerge;const initialContext={config:{},entries:{},imports:{}},dataContext=Object(__WEBPACK_IMPORTED_MODULE_0_react__["createContext"])(initialContext),DefaultWrapper=({children:e})=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(__WEBPACK_IMPORTED_MODULE_0_react__["Fragment"],null,e);function theme(e){return t=>{const n=({wrapper:n=DefaultWrapper,entries:r,imports:o,config:a={}})=>{const i=deepmerge_1(e,a);return Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(dataContext.Provider,{value:{entries:r,imports:o,config:i}},Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(BrowserRouter,{basename:BASE_URL},Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(n,null,Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(t,null))))};return n.displayName="DoczTheme",n}}var classCallCheck=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},_extends$b=Object.assign||function(e){for(var t=1;arguments.length>t;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e},inherits=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)},possibleConstructorReturn=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t},components={},track=function e(t,n){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,o=n.join("-");return r&&(o+="-"+r),components[o]?e(t,n,r+1):(components[o]=t,o)},get$1=function(e){return components[e]},getAll=function(){return _extends$b({},components)},reset=function(){components={}},tracker=Object.freeze({track:track,get:get$1,getAll:getAll,reset:reset}),LOADABLE="@@loadable-components/loadable",resolveModuleDefault=function(e){return e.__esModule?e.default:e},EmptyComponent=function(){return null};function loadable(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=t.ErrorComponent,r=void 0===n?EmptyComponent:n,o=t.LoadingComponent,a=void 0===o?EmptyComponent:o,i=t.render,s=t.modules,c=t.asyncMode,p=function(t){function n(e){classCallCheck(this,n);var r=possibleConstructorReturn(this,t.call(this,e));return r.state={Component:n.Component,error:null,loading:!n.Component},r.mounted=!1,r.loadingPromise=null,"undefined"!=typeof window&&null===r.state.Component&&null===r.loadingPromise&&(r.loadingPromise=n.load().then(function(e){r.safeSetState({Component:e,loading:!1})}).catch(function(e){r.safeSetState({error:e,loading:!1})})),r}return inherits(n,t),n.load=function(){return n.loadingPromise||(n.loadingPromise=e().then(function(e){var t,r=resolveModuleDefault(e);return n.Component=r,hoistNonReactStatics(n,r,((t={Component:!0,loadingPromise:!0,load:!0})[LOADABLE]=!0,t.componentId=!0,t)),r}).catch(function(e){throw n.loadingPromise=null,e})),n.loadingPromise},n.prototype.componentDidMount=function(){this.mounted=!0},n.prototype.componentWillUnmount=function(){this.mounted=!1},n.prototype.safeSetState=function(e){this.mounted&&this.setState(e)},n.prototype.render=function(){var e=this.state,t=e.Component,n=e.error;if("function"==typeof i)return i(_extends$b({},this.state,{ownProps:this.props}));if(null!==t)return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(t,this.props);if(null!==n)return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(r,{error:n,ownProps:this.props});if(c)throw this.loadingPromise;return __WEBPACK_IMPORTED_MODULE_0_react___default.a.createElement(a,this.props)},n}(__WEBPACK_IMPORTED_MODULE_0_react___default.a.Component);if(p.Component=null,p.loadingPromise=null,p[LOADABLE]=function(){return p},s){var u=track(p,s);p.componentId=u}return p}const DefaultLoading=()=>null,loadImport=(e,t)=>n=>async()=>{const{default:r}=await e[n]();return e=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(r,Object.assign({},e,{components:t}))},DocPreview=({components:e={}})=>{const t=e.page,n=e.notFound,r=e.loading||DefaultLoading;return Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(dataContext.Consumer,null,({imports:o,entries:a})=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(Switch,null,Object.keys(o).map(n=>{const i=a&&a[n],s=loadable(loadImport(o,e)(n),{LoadingComponent:r});return i&&Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(Route,{exact:!0,key:i.id,path:i.route,render:e=>t?Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(t,Object.assign({},e,{doc:i}),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null)):Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,Object.assign({},e))})}),n&&Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(Route,{component:n})))},isFn=e=>"function"==typeof e,sortBy=(e,t)=>t>e?-1:e>t?1:0,getMenusFromEntries=e=>Array.from(new Set(e.reduce((e,t)=>t.menu?e.concat([t.menu]):e,[]))),Docs=({children:e})=>"function"!=typeof e?null:Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(dataContext.Consumer,null,({entries:t})=>{if(!t||!e)return null;if(!isFn(e))throw Error("You need to pass a children as a function to your <Docs/> component");const n=Object.values(t),r=getMenusFromEntries(n).sort((e,t)=>sortBy(e,t)),o=n.sort((e,t)=>sortBy(e.name,t.name)).sort((e,t)=>t.order-e.order);return __WEBPACK_IMPORTED_MODULE_0_react__["Children"].only(e({menus:r,docs:o}))}),isActive=(e,t)=>e&&e.url===t.pathname,Link$1=e=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(NavLink,Object.assign({isActive:isActive},e)),DefaultRender=({component:e,code:t})=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(__WEBPACK_IMPORTED_MODULE_0_react__["Fragment"],null,e,t),Playground=({components:{render:e=DefaultRender}={},children:t,__code:n})=>Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(e,{component:isFn(t)?t():t,code:n}),getValue=e=>e.replace(/\'/g,""),getPropType=(e,t)=>{const n=e.flowType?e.flowType.name:e.type.name,r=e.type&&e.type.value;return n?t?!e.flowType&&!r||e.flowType&&!e.flowType.elements?n:Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(t,e.flowType?{text:e.flowType.raw}:{text:r&&r.map(e=>getValue(e.value)).join(" | ")},n):n:null},PropsTable=({of:e,components:t})=>{const n=e.__docgenInfo,r=n&&n.props;if(!n||!r)return null;const o=t.tr||"tr",a=t.th||"th",i=t.tbody||"tbody",s=t.td||"td",c=t.tooltip;return Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(__WEBPACK_IMPORTED_MODULE_0_react__["Fragment"],null,Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(t.table||"table",{className:"PropsTable"},Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(t.thead||"thead",null,Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(o,null,Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(a,{className:"PropsTable--property"},"Property"),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(a,{className:"PropsTable--type"},"Type"),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(a,{className:"PropsTable--required"},"Required"),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(a,{className:"PropsTable--description"},"Default"),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(a,{width:"40%",className:"PropsTable--description"},"Description"))),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(i,null,r&&Object.keys(r).map(e=>{const t=r[e];return t.flowType||t.type?Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(o,{key:e},Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null,e),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null,getPropType(t,c)),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null,t.required+""),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null,t.defaultValue&&getValue(t.defaultValue.value)),Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(s,null,t.description&&t.description)):null}))))},ThemeConfig=({children:e})=>"function"!=typeof e?null:Object(__WEBPACK_IMPORTED_MODULE_0_react__["createElement"])(dataContext.Consumer,null,({config:t})=>__WEBPACK_IMPORTED_MODULE_0_react__["Children"].only(e(t)));
//# sourceMappingURL=index.m.js.map

/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__(5)))

/***/ }),

/***/ 404:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {
  module.exports = require('./cjs/react.production.min.js');
} else {
  module.exports = __webpack_require__(405);
}


/***/ }),

/***/ 405:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.4.1
 * react.development.js
 *
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

var _assign = __webpack_require__(406);
var invariant = __webpack_require__(163);
var emptyObject = __webpack_require__(407);
var warning = __webpack_require__(164);
var emptyFunction = __webpack_require__(165);
var checkPropTypes = __webpack_require__(408);

// TODO: this is special because it gets imported during build.

var ReactVersion = '16.4.1';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;

var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace;
var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_TIMEOUT_TYPE = hasSymbol ? Symbol.for('react.timeout') : 0xead1;

var MAYBE_ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
var FAUX_ITERATOR_SYMBOL = '@@iterator';

function getIteratorFn(maybeIterable) {
  if (maybeIterable === null || typeof maybeIterable === 'undefined') {
    return null;
  }
  var maybeIterator = MAYBE_ITERATOR_SYMBOL && maybeIterable[MAYBE_ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL];
  if (typeof maybeIterator === 'function') {
    return maybeIterator;
  }
  return null;
}

// Relying on the `invariant()` implementation lets us
// have preserve the format and params in the www builds.

// Exports ReactDOM.createRoot


// Experimental error-boundary API that can recover from errors within a single
// render phase

// Suspense
var enableSuspense = false;
// Helps identify side effects in begin-phase lifecycle hooks and setState reducers:


// In some cases, StrictMode should also double-render lifecycles.
// This can be confusing for tests though,
// And it can be bad for performance in production.
// This feature flag can be used to control the behavior:


// To preserve the "Pause on caught exceptions" behavior of the debugger, we
// replay the begin phase of a failed component inside invokeGuardedCallback.


// Warn about deprecated, async-unsafe lifecycles; relates to RFC #6:


// Warn about legacy context API


// Gather advanced timing metrics for Profiler subtrees.


// Only used in www builds.

/**
 * Forked from fbjs/warning:
 * https://github.com/facebook/fbjs/blob/e66ba20ad5be433eb54423f2b097d829324d9de6/packages/fbjs/src/__forks__/warning.js
 *
 * Only change is we use console.warn instead of console.error,
 * and do nothing when 'console' is not supported.
 * This really simplifies the code.
 * ---
 * Similar to invariant but only logs a warning if the condition is not met.
 * This can be used to log issues in development environments in critical
 * paths. Removing the logging code for production environments will keep the
 * same logic and follow the same code paths.
 */

var lowPriorityWarning = function () {};

{
  var printWarning = function (format) {
    for (var _len = arguments.length, args = Array(_len > 1 ? _len - 1 : 0), _key = 1; _key < _len; _key++) {
      args[_key - 1] = arguments[_key];
    }

    var argIndex = 0;
    var message = 'Warning: ' + format.replace(/%s/g, function () {
      return args[argIndex++];
    });
    if (typeof console !== 'undefined') {
      console.warn(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };

  lowPriorityWarning = function (condition, format) {
    if (format === undefined) {
      throw new Error('`warning(condition, format, ...args)` requires a warning ' + 'message argument');
    }
    if (!condition) {
      for (var _len2 = arguments.length, args = Array(_len2 > 2 ? _len2 - 2 : 0), _key2 = 2; _key2 < _len2; _key2++) {
        args[_key2 - 2] = arguments[_key2];
      }

      printWarning.apply(undefined, [format].concat(args));
    }
  };
}

var lowPriorityWarning$1 = lowPriorityWarning;

var didWarnStateUpdateForUnmountedComponent = {};

function warnNoop(publicInstance, callerName) {
  {
    var _constructor = publicInstance.constructor;
    var componentName = _constructor && (_constructor.displayName || _constructor.name) || 'ReactClass';
    var warningKey = componentName + '.' + callerName;
    if (didWarnStateUpdateForUnmountedComponent[warningKey]) {
      return;
    }
    warning(false, "Can't call %s on a component that is not yet mounted. " + 'This is a no-op, but it might indicate a bug in your application. ' + 'Instead, assign to `this.state` directly or define a `state = {};` ' + 'class property with the desired state in the %s component.', callerName, componentName);
    didWarnStateUpdateForUnmountedComponent[warningKey] = true;
  }
}

/**
 * This is the abstract API for an update queue.
 */
var ReactNoopUpdateQueue = {
  /**
   * Checks whether or not this composite component is mounted.
   * @param {ReactClass} publicInstance The instance we want to test.
   * @return {boolean} True if mounted, false otherwise.
   * @protected
   * @final
   */
  isMounted: function (publicInstance) {
    return false;
  },

  /**
   * Forces an update. This should only be invoked when it is known with
   * certainty that we are **not** in a DOM transaction.
   *
   * You may want to call this when you know that some deeper aspect of the
   * component's state has changed but `setState` was not called.
   *
   * This will not invoke `shouldComponentUpdate`, but it will invoke
   * `componentWillUpdate` and `componentDidUpdate`.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {?function} callback Called after component is updated.
   * @param {?string} callerName name of the calling function in the public API.
   * @internal
   */
  enqueueForceUpdate: function (publicInstance, callback, callerName) {
    warnNoop(publicInstance, 'forceUpdate');
  },

  /**
   * Replaces all of the state. Always use this or `setState` to mutate state.
   * You should treat `this.state` as immutable.
   *
   * There is no guarantee that `this.state` will be immediately updated, so
   * accessing `this.state` after calling this method may return the old value.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {object} completeState Next state.
   * @param {?function} callback Called after component is updated.
   * @param {?string} callerName name of the calling function in the public API.
   * @internal
   */
  enqueueReplaceState: function (publicInstance, completeState, callback, callerName) {
    warnNoop(publicInstance, 'replaceState');
  },

  /**
   * Sets a subset of the state. This only exists because _pendingState is
   * internal. This provides a merging strategy that is not available to deep
   * properties which is confusing. TODO: Expose pendingState or don't use it
   * during the merge.
   *
   * @param {ReactClass} publicInstance The instance that should rerender.
   * @param {object} partialState Next partial state to be merged with state.
   * @param {?function} callback Called after component is updated.
   * @param {?string} Name of the calling function in the public API.
   * @internal
   */
  enqueueSetState: function (publicInstance, partialState, callback, callerName) {
    warnNoop(publicInstance, 'setState');
  }
};

/**
 * Base class helpers for the updating state of a component.
 */
function Component(props, context, updater) {
  this.props = props;
  this.context = context;
  this.refs = emptyObject;
  // We initialize the default updater but the real one gets injected by the
  // renderer.
  this.updater = updater || ReactNoopUpdateQueue;
}

Component.prototype.isReactComponent = {};

/**
 * Sets a subset of the state. Always use this to mutate
 * state. You should treat `this.state` as immutable.
 *
 * There is no guarantee that `this.state` will be immediately updated, so
 * accessing `this.state` after calling this method may return the old value.
 *
 * There is no guarantee that calls to `setState` will run synchronously,
 * as they may eventually be batched together.  You can provide an optional
 * callback that will be executed when the call to setState is actually
 * completed.
 *
 * When a function is provided to setState, it will be called at some point in
 * the future (not synchronously). It will be called with the up to date
 * component arguments (state, props, context). These values can be different
 * from this.* because your function may be called after receiveProps but before
 * shouldComponentUpdate, and this new state, props, and context will not yet be
 * assigned to this.
 *
 * @param {object|function} partialState Next partial state or function to
 *        produce next partial state to be merged with current state.
 * @param {?function} callback Called after state is updated.
 * @final
 * @protected
 */
Component.prototype.setState = function (partialState, callback) {
  !(typeof partialState === 'object' || typeof partialState === 'function' || partialState == null) ? invariant(false, 'setState(...): takes an object of state variables to update or a function which returns an object of state variables.') : void 0;
  this.updater.enqueueSetState(this, partialState, callback, 'setState');
};

/**
 * Forces an update. This should only be invoked when it is known with
 * certainty that we are **not** in a DOM transaction.
 *
 * You may want to call this when you know that some deeper aspect of the
 * component's state has changed but `setState` was not called.
 *
 * This will not invoke `shouldComponentUpdate`, but it will invoke
 * `componentWillUpdate` and `componentDidUpdate`.
 *
 * @param {?function} callback Called after update is complete.
 * @final
 * @protected
 */
Component.prototype.forceUpdate = function (callback) {
  this.updater.enqueueForceUpdate(this, callback, 'forceUpdate');
};

/**
 * Deprecated APIs. These APIs used to exist on classic React classes but since
 * we would like to deprecate them, we're not going to move them over to this
 * modern base class. Instead, we define a getter that warns if it's accessed.
 */
{
  var deprecatedAPIs = {
    isMounted: ['isMounted', 'Instead, make sure to clean up subscriptions and pending requests in ' + 'componentWillUnmount to prevent memory leaks.'],
    replaceState: ['replaceState', 'Refactor your code to use setState instead (see ' + 'https://github.com/facebook/react/issues/3236).']
  };
  var defineDeprecationWarning = function (methodName, info) {
    Object.defineProperty(Component.prototype, methodName, {
      get: function () {
        lowPriorityWarning$1(false, '%s(...) is deprecated in plain JavaScript React classes. %s', info[0], info[1]);
        return undefined;
      }
    });
  };
  for (var fnName in deprecatedAPIs) {
    if (deprecatedAPIs.hasOwnProperty(fnName)) {
      defineDeprecationWarning(fnName, deprecatedAPIs[fnName]);
    }
  }
}

function ComponentDummy() {}
ComponentDummy.prototype = Component.prototype;

/**
 * Convenience component with default shallow equality check for sCU.
 */
function PureComponent(props, context, updater) {
  this.props = props;
  this.context = context;
  this.refs = emptyObject;
  this.updater = updater || ReactNoopUpdateQueue;
}

var pureComponentPrototype = PureComponent.prototype = new ComponentDummy();
pureComponentPrototype.constructor = PureComponent;
// Avoid an extra prototype jump for these methods.
_assign(pureComponentPrototype, Component.prototype);
pureComponentPrototype.isPureReactComponent = true;

// an immutable object with a single mutable value
function createRef() {
  var refObject = {
    current: null
  };
  {
    Object.seal(refObject);
  }
  return refObject;
}

/**
 * Keeps track of the current owner.
 *
 * The current owner is the component who should own any components that are
 * currently being constructed.
 */
var ReactCurrentOwner = {
  /**
   * @internal
   * @type {ReactComponent}
   */
  current: null
};

var hasOwnProperty = Object.prototype.hasOwnProperty;

var RESERVED_PROPS = {
  key: true,
  ref: true,
  __self: true,
  __source: true
};

var specialPropKeyWarningShown = void 0;
var specialPropRefWarningShown = void 0;

function hasValidRef(config) {
  {
    if (hasOwnProperty.call(config, 'ref')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'ref').get;
      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }
  return config.ref !== undefined;
}

function hasValidKey(config) {
  {
    if (hasOwnProperty.call(config, 'key')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'key').get;
      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }
  return config.key !== undefined;
}

function defineKeyPropWarningGetter(props, displayName) {
  var warnAboutAccessingKey = function () {
    if (!specialPropKeyWarningShown) {
      specialPropKeyWarningShown = true;
      warning(false, '%s: `key` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://fb.me/react-special-props)', displayName);
    }
  };
  warnAboutAccessingKey.isReactWarning = true;
  Object.defineProperty(props, 'key', {
    get: warnAboutAccessingKey,
    configurable: true
  });
}

function defineRefPropWarningGetter(props, displayName) {
  var warnAboutAccessingRef = function () {
    if (!specialPropRefWarningShown) {
      specialPropRefWarningShown = true;
      warning(false, '%s: `ref` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://fb.me/react-special-props)', displayName);
    }
  };
  warnAboutAccessingRef.isReactWarning = true;
  Object.defineProperty(props, 'ref', {
    get: warnAboutAccessingRef,
    configurable: true
  });
}

/**
 * Factory method to create a new React element. This no longer adheres to
 * the class pattern, so do not use new to call it. Also, no instanceof check
 * will work. Instead test $$typeof field against Symbol.for('react.element') to check
 * if something is a React Element.
 *
 * @param {*} type
 * @param {*} key
 * @param {string|object} ref
 * @param {*} self A *temporary* helper to detect places where `this` is
 * different from the `owner` when React.createElement is called, so that we
 * can warn. We want to get rid of owner and replace string `ref`s with arrow
 * functions, and as long as `this` and owner are the same, there will be no
 * change in behavior.
 * @param {*} source An annotation object (added by a transpiler or otherwise)
 * indicating filename, line number, and/or other information.
 * @param {*} owner
 * @param {*} props
 * @internal
 */
var ReactElement = function (type, key, ref, self, source, owner, props) {
  var element = {
    // This tag allows us to uniquely identify this as a React Element
    $$typeof: REACT_ELEMENT_TYPE,

    // Built-in properties that belong on the element
    type: type,
    key: key,
    ref: ref,
    props: props,

    // Record the component responsible for creating this element.
    _owner: owner
  };

  {
    // The validation flag is currently mutative. We put it on
    // an external backing store so that we can freeze the whole object.
    // This can be replaced with a WeakMap once they are implemented in
    // commonly used development environments.
    element._store = {};

    // To make comparing ReactElements easier for testing purposes, we make
    // the validation flag non-enumerable (where possible, which should
    // include every environment we run tests in), so the test framework
    // ignores it.
    Object.defineProperty(element._store, 'validated', {
      configurable: false,
      enumerable: false,
      writable: true,
      value: false
    });
    // self and source are DEV only properties.
    Object.defineProperty(element, '_self', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: self
    });
    // Two elements created in two different places should be considered
    // equal for testing purposes and therefore we hide it from enumeration.
    Object.defineProperty(element, '_source', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: source
    });
    if (Object.freeze) {
      Object.freeze(element.props);
      Object.freeze(element);
    }
  }

  return element;
};

/**
 * Create and return a new ReactElement of the given type.
 * See https://reactjs.org/docs/react-api.html#createelement
 */
function createElement(type, config, children) {
  var propName = void 0;

  // Reserved names are extracted
  var props = {};

  var key = null;
  var ref = null;
  var self = null;
  var source = null;

  if (config != null) {
    if (hasValidRef(config)) {
      ref = config.ref;
    }
    if (hasValidKey(config)) {
      key = '' + config.key;
    }

    self = config.__self === undefined ? null : config.__self;
    source = config.__source === undefined ? null : config.__source;
    // Remaining properties are added to a new props object
    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        props[propName] = config[propName];
      }
    }
  }

  // Children can be more than one argument, and those are transferred onto
  // the newly allocated props object.
  var childrenLength = arguments.length - 2;
  if (childrenLength === 1) {
    props.children = children;
  } else if (childrenLength > 1) {
    var childArray = Array(childrenLength);
    for (var i = 0; i < childrenLength; i++) {
      childArray[i] = arguments[i + 2];
    }
    {
      if (Object.freeze) {
        Object.freeze(childArray);
      }
    }
    props.children = childArray;
  }

  // Resolve default props
  if (type && type.defaultProps) {
    var defaultProps = type.defaultProps;
    for (propName in defaultProps) {
      if (props[propName] === undefined) {
        props[propName] = defaultProps[propName];
      }
    }
  }
  {
    if (key || ref) {
      if (typeof props.$$typeof === 'undefined' || props.$$typeof !== REACT_ELEMENT_TYPE) {
        var displayName = typeof type === 'function' ? type.displayName || type.name || 'Unknown' : type;
        if (key) {
          defineKeyPropWarningGetter(props, displayName);
        }
        if (ref) {
          defineRefPropWarningGetter(props, displayName);
        }
      }
    }
  }
  return ReactElement(type, key, ref, self, source, ReactCurrentOwner.current, props);
}

/**
 * Return a function that produces ReactElements of a given type.
 * See https://reactjs.org/docs/react-api.html#createfactory
 */


function cloneAndReplaceKey(oldElement, newKey) {
  var newElement = ReactElement(oldElement.type, newKey, oldElement.ref, oldElement._self, oldElement._source, oldElement._owner, oldElement.props);

  return newElement;
}

/**
 * Clone and return a new ReactElement using element as the starting point.
 * See https://reactjs.org/docs/react-api.html#cloneelement
 */
function cloneElement(element, config, children) {
  !!(element === null || element === undefined) ? invariant(false, 'React.cloneElement(...): The argument must be a React element, but you passed %s.', element) : void 0;

  var propName = void 0;

  // Original props are copied
  var props = _assign({}, element.props);

  // Reserved names are extracted
  var key = element.key;
  var ref = element.ref;
  // Self is preserved since the owner is preserved.
  var self = element._self;
  // Source is preserved since cloneElement is unlikely to be targeted by a
  // transpiler, and the original source is probably a better indicator of the
  // true owner.
  var source = element._source;

  // Owner will be preserved, unless ref is overridden
  var owner = element._owner;

  if (config != null) {
    if (hasValidRef(config)) {
      // Silently steal the ref from the parent.
      ref = config.ref;
      owner = ReactCurrentOwner.current;
    }
    if (hasValidKey(config)) {
      key = '' + config.key;
    }

    // Remaining properties override existing props
    var defaultProps = void 0;
    if (element.type && element.type.defaultProps) {
      defaultProps = element.type.defaultProps;
    }
    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        if (config[propName] === undefined && defaultProps !== undefined) {
          // Resolve default props
          props[propName] = defaultProps[propName];
        } else {
          props[propName] = config[propName];
        }
      }
    }
  }

  // Children can be more than one argument, and those are transferred onto
  // the newly allocated props object.
  var childrenLength = arguments.length - 2;
  if (childrenLength === 1) {
    props.children = children;
  } else if (childrenLength > 1) {
    var childArray = Array(childrenLength);
    for (var i = 0; i < childrenLength; i++) {
      childArray[i] = arguments[i + 2];
    }
    props.children = childArray;
  }

  return ReactElement(element.type, key, ref, self, source, owner, props);
}

/**
 * Verifies the object is a ReactElement.
 * See https://reactjs.org/docs/react-api.html#isvalidelement
 * @param {?object} object
 * @return {boolean} True if `object` is a valid component.
 * @final
 */
function isValidElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}

var ReactDebugCurrentFrame = {};

{
  // Component that is being worked on
  ReactDebugCurrentFrame.getCurrentStack = null;

  ReactDebugCurrentFrame.getStackAddendum = function () {
    var impl = ReactDebugCurrentFrame.getCurrentStack;
    if (impl) {
      return impl();
    }
    return null;
  };
}

var SEPARATOR = '.';
var SUBSEPARATOR = ':';

/**
 * Escape and wrap key so it is safe to use as a reactid
 *
 * @param {string} key to be escaped.
 * @return {string} the escaped key.
 */
function escape(key) {
  var escapeRegex = /[=:]/g;
  var escaperLookup = {
    '=': '=0',
    ':': '=2'
  };
  var escapedString = ('' + key).replace(escapeRegex, function (match) {
    return escaperLookup[match];
  });

  return '$' + escapedString;
}

/**
 * TODO: Test that a single child and an array with one item have the same key
 * pattern.
 */

var didWarnAboutMaps = false;

var userProvidedKeyEscapeRegex = /\/+/g;
function escapeUserProvidedKey(text) {
  return ('' + text).replace(userProvidedKeyEscapeRegex, '$&/');
}

var POOL_SIZE = 10;
var traverseContextPool = [];
function getPooledTraverseContext(mapResult, keyPrefix, mapFunction, mapContext) {
  if (traverseContextPool.length) {
    var traverseContext = traverseContextPool.pop();
    traverseContext.result = mapResult;
    traverseContext.keyPrefix = keyPrefix;
    traverseContext.func = mapFunction;
    traverseContext.context = mapContext;
    traverseContext.count = 0;
    return traverseContext;
  } else {
    return {
      result: mapResult,
      keyPrefix: keyPrefix,
      func: mapFunction,
      context: mapContext,
      count: 0
    };
  }
}

function releaseTraverseContext(traverseContext) {
  traverseContext.result = null;
  traverseContext.keyPrefix = null;
  traverseContext.func = null;
  traverseContext.context = null;
  traverseContext.count = 0;
  if (traverseContextPool.length < POOL_SIZE) {
    traverseContextPool.push(traverseContext);
  }
}

/**
 * @param {?*} children Children tree container.
 * @param {!string} nameSoFar Name of the key path so far.
 * @param {!function} callback Callback to invoke with each child found.
 * @param {?*} traverseContext Used to pass information throughout the traversal
 * process.
 * @return {!number} The number of children in this subtree.
 */
function traverseAllChildrenImpl(children, nameSoFar, callback, traverseContext) {
  var type = typeof children;

  if (type === 'undefined' || type === 'boolean') {
    // All of the above are perceived as null.
    children = null;
  }

  var invokeCallback = false;

  if (children === null) {
    invokeCallback = true;
  } else {
    switch (type) {
      case 'string':
      case 'number':
        invokeCallback = true;
        break;
      case 'object':
        switch (children.$$typeof) {
          case REACT_ELEMENT_TYPE:
          case REACT_PORTAL_TYPE:
            invokeCallback = true;
        }
    }
  }

  if (invokeCallback) {
    callback(traverseContext, children,
    // If it's the only child, treat the name as if it was wrapped in an array
    // so that it's consistent if the number of children grows.
    nameSoFar === '' ? SEPARATOR + getComponentKey(children, 0) : nameSoFar);
    return 1;
  }

  var child = void 0;
  var nextName = void 0;
  var subtreeCount = 0; // Count of children found in the current subtree.
  var nextNamePrefix = nameSoFar === '' ? SEPARATOR : nameSoFar + SUBSEPARATOR;

  if (Array.isArray(children)) {
    for (var i = 0; i < children.length; i++) {
      child = children[i];
      nextName = nextNamePrefix + getComponentKey(child, i);
      subtreeCount += traverseAllChildrenImpl(child, nextName, callback, traverseContext);
    }
  } else {
    var iteratorFn = getIteratorFn(children);
    if (typeof iteratorFn === 'function') {
      {
        // Warn about using Maps as children
        if (iteratorFn === children.entries) {
          !didWarnAboutMaps ? warning(false, 'Using Maps as children is unsupported and will likely yield ' + 'unexpected results. Convert it to a sequence/iterable of keyed ' + 'ReactElements instead.%s', ReactDebugCurrentFrame.getStackAddendum()) : void 0;
          didWarnAboutMaps = true;
        }
      }

      var iterator = iteratorFn.call(children);
      var step = void 0;
      var ii = 0;
      while (!(step = iterator.next()).done) {
        child = step.value;
        nextName = nextNamePrefix + getComponentKey(child, ii++);
        subtreeCount += traverseAllChildrenImpl(child, nextName, callback, traverseContext);
      }
    } else if (type === 'object') {
      var addendum = '';
      {
        addendum = ' If you meant to render a collection of children, use an array ' + 'instead.' + ReactDebugCurrentFrame.getStackAddendum();
      }
      var childrenString = '' + children;
      invariant(false, 'Objects are not valid as a React child (found: %s).%s', childrenString === '[object Object]' ? 'object with keys {' + Object.keys(children).join(', ') + '}' : childrenString, addendum);
    }
  }

  return subtreeCount;
}

/**
 * Traverses children that are typically specified as `props.children`, but
 * might also be specified through attributes:
 *
 * - `traverseAllChildren(this.props.children, ...)`
 * - `traverseAllChildren(this.props.leftPanelChildren, ...)`
 *
 * The `traverseContext` is an optional argument that is passed through the
 * entire traversal. It can be used to store accumulations or anything else that
 * the callback might find relevant.
 *
 * @param {?*} children Children tree object.
 * @param {!function} callback To invoke upon traversing each child.
 * @param {?*} traverseContext Context for traversal.
 * @return {!number} The number of children in this subtree.
 */
function traverseAllChildren(children, callback, traverseContext) {
  if (children == null) {
    return 0;
  }

  return traverseAllChildrenImpl(children, '', callback, traverseContext);
}

/**
 * Generate a key string that identifies a component within a set.
 *
 * @param {*} component A component that could contain a manual key.
 * @param {number} index Index that is used if a manual key is not provided.
 * @return {string}
 */
function getComponentKey(component, index) {
  // Do some typechecking here since we call this blindly. We want to ensure
  // that we don't block potential future ES APIs.
  if (typeof component === 'object' && component !== null && component.key != null) {
    // Explicit key
    return escape(component.key);
  }
  // Implicit key determined by the index in the set
  return index.toString(36);
}

function forEachSingleChild(bookKeeping, child, name) {
  var func = bookKeeping.func,
      context = bookKeeping.context;

  func.call(context, child, bookKeeping.count++);
}

/**
 * Iterates through children that are typically specified as `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenforeach
 *
 * The provided forEachFunc(child, index) will be called for each
 * leaf child.
 *
 * @param {?*} children Children tree container.
 * @param {function(*, int)} forEachFunc
 * @param {*} forEachContext Context for forEachContext.
 */
function forEachChildren(children, forEachFunc, forEachContext) {
  if (children == null) {
    return children;
  }
  var traverseContext = getPooledTraverseContext(null, null, forEachFunc, forEachContext);
  traverseAllChildren(children, forEachSingleChild, traverseContext);
  releaseTraverseContext(traverseContext);
}

function mapSingleChildIntoContext(bookKeeping, child, childKey) {
  var result = bookKeeping.result,
      keyPrefix = bookKeeping.keyPrefix,
      func = bookKeeping.func,
      context = bookKeeping.context;


  var mappedChild = func.call(context, child, bookKeeping.count++);
  if (Array.isArray(mappedChild)) {
    mapIntoWithKeyPrefixInternal(mappedChild, result, childKey, emptyFunction.thatReturnsArgument);
  } else if (mappedChild != null) {
    if (isValidElement(mappedChild)) {
      mappedChild = cloneAndReplaceKey(mappedChild,
      // Keep both the (mapped) and old keys if they differ, just as
      // traverseAllChildren used to do for objects as children
      keyPrefix + (mappedChild.key && (!child || child.key !== mappedChild.key) ? escapeUserProvidedKey(mappedChild.key) + '/' : '') + childKey);
    }
    result.push(mappedChild);
  }
}

function mapIntoWithKeyPrefixInternal(children, array, prefix, func, context) {
  var escapedPrefix = '';
  if (prefix != null) {
    escapedPrefix = escapeUserProvidedKey(prefix) + '/';
  }
  var traverseContext = getPooledTraverseContext(array, escapedPrefix, func, context);
  traverseAllChildren(children, mapSingleChildIntoContext, traverseContext);
  releaseTraverseContext(traverseContext);
}

/**
 * Maps children that are typically specified as `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenmap
 *
 * The provided mapFunction(child, key, index) will be called for each
 * leaf child.
 *
 * @param {?*} children Children tree container.
 * @param {function(*, int)} func The map function.
 * @param {*} context Context for mapFunction.
 * @return {object} Object containing the ordered map of results.
 */
function mapChildren(children, func, context) {
  if (children == null) {
    return children;
  }
  var result = [];
  mapIntoWithKeyPrefixInternal(children, result, null, func, context);
  return result;
}

/**
 * Count the number of children that are typically specified as
 * `props.children`.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrencount
 *
 * @param {?*} children Children tree container.
 * @return {number} The number of children.
 */
function countChildren(children) {
  return traverseAllChildren(children, emptyFunction.thatReturnsNull, null);
}

/**
 * Flatten a children object (typically specified as `props.children`) and
 * return an array with appropriately re-keyed children.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrentoarray
 */
function toArray(children) {
  var result = [];
  mapIntoWithKeyPrefixInternal(children, result, null, emptyFunction.thatReturnsArgument);
  return result;
}

/**
 * Returns the first child in a collection of children and verifies that there
 * is only one child in the collection.
 *
 * See https://reactjs.org/docs/react-api.html#reactchildrenonly
 *
 * The current implementation of this function assumes that a single child gets
 * passed without a wrapper, but the purpose of this helper function is to
 * abstract away the particular structure of children.
 *
 * @param {?object} children Child collection structure.
 * @return {ReactElement} The first and only `ReactElement` contained in the
 * structure.
 */
function onlyChild(children) {
  !isValidElement(children) ? invariant(false, 'React.Children.only expected to receive a single React element child.') : void 0;
  return children;
}

function createContext(defaultValue, calculateChangedBits) {
  if (calculateChangedBits === undefined) {
    calculateChangedBits = null;
  } else {
    {
      !(calculateChangedBits === null || typeof calculateChangedBits === 'function') ? warning(false, 'createContext: Expected the optional second argument to be a ' + 'function. Instead received: %s', calculateChangedBits) : void 0;
    }
  }

  var context = {
    $$typeof: REACT_CONTEXT_TYPE,
    _calculateChangedBits: calculateChangedBits,
    _defaultValue: defaultValue,
    _currentValue: defaultValue,
    // As a workaround to support multiple concurrent renderers, we categorize
    // some renderers as primary and others as secondary. We only expect
    // there to be two concurrent renderers at most: React Native (primary) and
    // Fabric (secondary); React DOM (primary) and React ART (secondary).
    // Secondary renderers store their context values on separate fields.
    _currentValue2: defaultValue,
    _changedBits: 0,
    _changedBits2: 0,
    // These are circular
    Provider: null,
    Consumer: null
  };

  context.Provider = {
    $$typeof: REACT_PROVIDER_TYPE,
    _context: context
  };
  context.Consumer = context;

  {
    context._currentRenderer = null;
    context._currentRenderer2 = null;
  }

  return context;
}

function forwardRef(render) {
  {
    !(typeof render === 'function') ? warning(false, 'forwardRef requires a render function but was given %s.', render === null ? 'null' : typeof render) : void 0;

    if (render != null) {
      !(render.defaultProps == null && render.propTypes == null) ? warning(false, 'forwardRef render functions do not support propTypes or defaultProps. ' + 'Did you accidentally pass a React component?') : void 0;
    }
  }

  return {
    $$typeof: REACT_FORWARD_REF_TYPE,
    render: render
  };
}

var describeComponentFrame = function (name, source, ownerName) {
  return '\n    in ' + (name || 'Unknown') + (source ? ' (at ' + source.fileName.replace(/^.*[\\\/]/, '') + ':' + source.lineNumber + ')' : ownerName ? ' (created by ' + ownerName + ')' : '');
};

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' ||
  // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_ASYNC_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_TIMEOUT_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE);
}

function getComponentName(fiber) {
  var type = fiber.type;

  if (typeof type === 'function') {
    return type.displayName || type.name;
  }
  if (typeof type === 'string') {
    return type;
  }
  switch (type) {
    case REACT_ASYNC_MODE_TYPE:
      return 'AsyncMode';
    case REACT_CONTEXT_TYPE:
      return 'Context.Consumer';
    case REACT_FRAGMENT_TYPE:
      return 'ReactFragment';
    case REACT_PORTAL_TYPE:
      return 'ReactPortal';
    case REACT_PROFILER_TYPE:
      return 'Profiler(' + fiber.pendingProps.id + ')';
    case REACT_PROVIDER_TYPE:
      return 'Context.Provider';
    case REACT_STRICT_MODE_TYPE:
      return 'StrictMode';
    case REACT_TIMEOUT_TYPE:
      return 'Timeout';
  }
  if (typeof type === 'object' && type !== null) {
    switch (type.$$typeof) {
      case REACT_FORWARD_REF_TYPE:
        var functionName = type.render.displayName || type.render.name || '';
        return functionName !== '' ? 'ForwardRef(' + functionName + ')' : 'ForwardRef';
    }
  }
  return null;
}

/**
 * ReactElementValidator provides a wrapper around a element factory
 * which validates the props passed to the element. This is intended to be
 * used only in DEV and could be replaced by a static type checker for languages
 * that support it.
 */

var currentlyValidatingElement = void 0;
var propTypesMisspellWarningShown = void 0;

var getDisplayName = function () {};
var getStackAddendum = function () {};

{
  currentlyValidatingElement = null;

  propTypesMisspellWarningShown = false;

  getDisplayName = function (element) {
    if (element == null) {
      return '#empty';
    } else if (typeof element === 'string' || typeof element === 'number') {
      return '#text';
    } else if (typeof element.type === 'string') {
      return element.type;
    }

    var type = element.type;
    if (type === REACT_FRAGMENT_TYPE) {
      return 'React.Fragment';
    } else if (typeof type === 'object' && type !== null && type.$$typeof === REACT_FORWARD_REF_TYPE) {
      var functionName = type.render.displayName || type.render.name || '';
      return functionName !== '' ? 'ForwardRef(' + functionName + ')' : 'ForwardRef';
    } else {
      return type.displayName || type.name || 'Unknown';
    }
  };

  getStackAddendum = function () {
    var stack = '';
    if (currentlyValidatingElement) {
      var name = getDisplayName(currentlyValidatingElement);
      var owner = currentlyValidatingElement._owner;
      stack += describeComponentFrame(name, currentlyValidatingElement._source, owner && getComponentName(owner));
    }
    stack += ReactDebugCurrentFrame.getStackAddendum() || '';
    return stack;
  };
}

function getDeclarationErrorAddendum() {
  if (ReactCurrentOwner.current) {
    var name = getComponentName(ReactCurrentOwner.current);
    if (name) {
      return '\n\nCheck the render method of `' + name + '`.';
    }
  }
  return '';
}

function getSourceInfoErrorAddendum(elementProps) {
  if (elementProps !== null && elementProps !== undefined && elementProps.__source !== undefined) {
    var source = elementProps.__source;
    var fileName = source.fileName.replace(/^.*[\\\/]/, '');
    var lineNumber = source.lineNumber;
    return '\n\nCheck your code at ' + fileName + ':' + lineNumber + '.';
  }
  return '';
}

/**
 * Warn if there's no key explicitly set on dynamic arrays of children or
 * object keys are not valid. This allows us to keep track of children between
 * updates.
 */
var ownerHasKeyUseWarning = {};

function getCurrentComponentErrorInfo(parentType) {
  var info = getDeclarationErrorAddendum();

  if (!info) {
    var parentName = typeof parentType === 'string' ? parentType : parentType.displayName || parentType.name;
    if (parentName) {
      info = '\n\nCheck the top-level render call using <' + parentName + '>.';
    }
  }
  return info;
}

/**
 * Warn if the element doesn't have an explicit key assigned to it.
 * This element is in an array. The array could grow and shrink or be
 * reordered. All children that haven't already been validated are required to
 * have a "key" property assigned to it. Error statuses are cached so a warning
 * will only be shown once.
 *
 * @internal
 * @param {ReactElement} element Element that requires a key.
 * @param {*} parentType element's parent's type.
 */
function validateExplicitKey(element, parentType) {
  if (!element._store || element._store.validated || element.key != null) {
    return;
  }
  element._store.validated = true;

  var currentComponentErrorInfo = getCurrentComponentErrorInfo(parentType);
  if (ownerHasKeyUseWarning[currentComponentErrorInfo]) {
    return;
  }
  ownerHasKeyUseWarning[currentComponentErrorInfo] = true;

  // Usually the current owner is the offender, but if it accepts children as a
  // property, it may be the creator of the child that's responsible for
  // assigning it a key.
  var childOwner = '';
  if (element && element._owner && element._owner !== ReactCurrentOwner.current) {
    // Give the component that originally created this child.
    childOwner = ' It was passed a child from ' + getComponentName(element._owner) + '.';
  }

  currentlyValidatingElement = element;
  {
    warning(false, 'Each child in an array or iterator should have a unique "key" prop.' + '%s%s See https://fb.me/react-warning-keys for more information.%s', currentComponentErrorInfo, childOwner, getStackAddendum());
  }
  currentlyValidatingElement = null;
}

/**
 * Ensure that every element either is passed in a static location, in an
 * array with an explicit keys property defined, or in an object literal
 * with valid key property.
 *
 * @internal
 * @param {ReactNode} node Statically passed child of any type.
 * @param {*} parentType node's parent's type.
 */
function validateChildKeys(node, parentType) {
  if (typeof node !== 'object') {
    return;
  }
  if (Array.isArray(node)) {
    for (var i = 0; i < node.length; i++) {
      var child = node[i];
      if (isValidElement(child)) {
        validateExplicitKey(child, parentType);
      }
    }
  } else if (isValidElement(node)) {
    // This element was passed in a valid location.
    if (node._store) {
      node._store.validated = true;
    }
  } else if (node) {
    var iteratorFn = getIteratorFn(node);
    if (typeof iteratorFn === 'function') {
      // Entry iterators used to provide implicit keys,
      // but now we print a separate warning for them later.
      if (iteratorFn !== node.entries) {
        var iterator = iteratorFn.call(node);
        var step = void 0;
        while (!(step = iterator.next()).done) {
          if (isValidElement(step.value)) {
            validateExplicitKey(step.value, parentType);
          }
        }
      }
    }
  }
}

/**
 * Given an element, validate that its props follow the propTypes definition,
 * provided by the type.
 *
 * @param {ReactElement} element
 */
function validatePropTypes(element) {
  var type = element.type;
  var name = void 0,
      propTypes = void 0;
  if (typeof type === 'function') {
    // Class or functional component
    name = type.displayName || type.name;
    propTypes = type.propTypes;
  } else if (typeof type === 'object' && type !== null && type.$$typeof === REACT_FORWARD_REF_TYPE) {
    // ForwardRef
    var functionName = type.render.displayName || type.render.name || '';
    name = functionName !== '' ? 'ForwardRef(' + functionName + ')' : 'ForwardRef';
    propTypes = type.propTypes;
  } else {
    return;
  }
  if (propTypes) {
    currentlyValidatingElement = element;
    checkPropTypes(propTypes, element.props, 'prop', name, getStackAddendum);
    currentlyValidatingElement = null;
  } else if (type.PropTypes !== undefined && !propTypesMisspellWarningShown) {
    propTypesMisspellWarningShown = true;
    warning(false, 'Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?', name || 'Unknown');
  }
  if (typeof type.getDefaultProps === 'function') {
    !type.getDefaultProps.isReactClassApproved ? warning(false, 'getDefaultProps is only used on classic React.createClass ' + 'definitions. Use a static property named `defaultProps` instead.') : void 0;
  }
}

/**
 * Given a fragment, validate that it can only be provided with fragment props
 * @param {ReactElement} fragment
 */
function validateFragmentProps(fragment) {
  currentlyValidatingElement = fragment;

  var keys = Object.keys(fragment.props);
  for (var i = 0; i < keys.length; i++) {
    var key = keys[i];
    if (key !== 'children' && key !== 'key') {
      warning(false, 'Invalid prop `%s` supplied to `React.Fragment`. ' + 'React.Fragment can only have `key` and `children` props.%s', key, getStackAddendum());
      break;
    }
  }

  if (fragment.ref !== null) {
    warning(false, 'Invalid attribute `ref` supplied to `React.Fragment`.%s', getStackAddendum());
  }

  currentlyValidatingElement = null;
}

function createElementWithValidation(type, props, children) {
  var validType = isValidElementType(type);

  // We warn in this case but don't throw. We expect the element creation to
  // succeed and there will likely be errors in render.
  if (!validType) {
    var info = '';
    if (type === undefined || typeof type === 'object' && type !== null && Object.keys(type).length === 0) {
      info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and named imports.";
    }

    var sourceInfo = getSourceInfoErrorAddendum(props);
    if (sourceInfo) {
      info += sourceInfo;
    } else {
      info += getDeclarationErrorAddendum();
    }

    info += getStackAddendum() || '';

    var typeString = void 0;
    if (type === null) {
      typeString = 'null';
    } else if (Array.isArray(type)) {
      typeString = 'array';
    } else {
      typeString = typeof type;
    }

    warning(false, 'React.createElement: type is invalid -- expected a string (for ' + 'built-in components) or a class/function (for composite ' + 'components) but got: %s.%s', typeString, info);
  }

  var element = createElement.apply(this, arguments);

  // The result can be nullish if a mock or a custom function is used.
  // TODO: Drop this when these are no longer allowed as the type argument.
  if (element == null) {
    return element;
  }

  // Skip key warning if the type isn't valid since our key validation logic
  // doesn't expect a non-string/function type and can throw confusing errors.
  // We don't want exception behavior to differ between dev and prod.
  // (Rendering will throw with a helpful message and as soon as the type is
  // fixed, the key warnings will appear.)
  if (validType) {
    for (var i = 2; i < arguments.length; i++) {
      validateChildKeys(arguments[i], type);
    }
  }

  if (type === REACT_FRAGMENT_TYPE) {
    validateFragmentProps(element);
  } else {
    validatePropTypes(element);
  }

  return element;
}

function createFactoryWithValidation(type) {
  var validatedFactory = createElementWithValidation.bind(null, type);
  validatedFactory.type = type;
  // Legacy hook: remove it
  {
    Object.defineProperty(validatedFactory, 'type', {
      enumerable: false,
      get: function () {
        lowPriorityWarning$1(false, 'Factory.type is deprecated. Access the class directly ' + 'before passing it to createFactory.');
        Object.defineProperty(this, 'type', {
          value: type
        });
        return type;
      }
    });
  }

  return validatedFactory;
}

function cloneElementWithValidation(element, props, children) {
  var newElement = cloneElement.apply(this, arguments);
  for (var i = 2; i < arguments.length; i++) {
    validateChildKeys(arguments[i], newElement.type);
  }
  validatePropTypes(newElement);
  return newElement;
}

var React = {
  Children: {
    map: mapChildren,
    forEach: forEachChildren,
    count: countChildren,
    toArray: toArray,
    only: onlyChild
  },

  createRef: createRef,
  Component: Component,
  PureComponent: PureComponent,

  createContext: createContext,
  forwardRef: forwardRef,

  Fragment: REACT_FRAGMENT_TYPE,
  StrictMode: REACT_STRICT_MODE_TYPE,
  unstable_AsyncMode: REACT_ASYNC_MODE_TYPE,
  unstable_Profiler: REACT_PROFILER_TYPE,

  createElement: createElementWithValidation,
  cloneElement: cloneElementWithValidation,
  createFactory: createFactoryWithValidation,
  isValidElement: isValidElement,

  version: ReactVersion,

  __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: {
    ReactCurrentOwner: ReactCurrentOwner,
    // Used by renderers to avoid bundling object-assign twice in UMD bundles:
    assign: _assign
  }
};

if (enableSuspense) {
  React.Timeout = REACT_TIMEOUT_TYPE;
}

{
  _assign(React.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED, {
    // These should not be included in production.
    ReactDebugCurrentFrame: ReactDebugCurrentFrame,
    // Shim for React DOM 16.0.0 which still destructured (but not used) this.
    // TODO: remove in React 17.0.
    ReactComponentTreeHook: {}
  });
}



var React$2 = Object.freeze({
	default: React
});

var React$3 = ( React$2 && React ) || React$2;

// TODO: decide on the top-level export form.
// This is hacky but makes it work with both Rollup and Jest.
var react = React$3.default ? React$3.default : React$3;

module.exports = react;
  })();
}


/***/ }),

/***/ 406:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ 407:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 *
 */



var emptyObject = {};

if (true) {
  Object.freeze(emptyObject);
}

module.exports = emptyObject;

/***/ }),

/***/ 408:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



if (true) {
  var invariant = __webpack_require__(163);
  var warning = __webpack_require__(164);
  var ReactPropTypesSecret = __webpack_require__(409);
  var loggedTypeFailures = {};
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (typeSpecs.hasOwnProperty(typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          invariant(typeof typeSpecs[typeSpecName] === 'function', '%s: %s type `%s` is invalid; it must be a function, usually from ' + 'the `prop-types` package, but received `%s`.', componentName || 'React class', location, typeSpecName, typeof typeSpecs[typeSpecName]);
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        warning(!error || error instanceof Error, '%s: type specification of %s `%s` is invalid; the type checker ' + 'function must return `null` or an `Error` but returned a %s. ' + 'You may have forgotten to pass an argument to the type checker ' + 'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' + 'shape all require an argument).', componentName || 'React class', location, typeSpecName, typeof error);
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          warning(false, 'Failed %s type: %s%s', location, error.message, stack != null ? stack : '');
        }
      }
    }
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ 409:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ 5:
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || Function("return this")() || (1,eval)("this");
} catch(e) {
	// This works if the window reference is available
	if(typeof window === "object")
		g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ })

/******/ });