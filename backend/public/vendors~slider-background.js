(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["vendors~slider-background"],{

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vueperslides/dist/vueperslides.css":
/*!*****************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vueperslides/dist/vueperslides.css ***!
  \*****************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".vueperslide{\n  white-space:normal;\n  background-size:cover;\n  display:inline-block;\n  position:relative;\n  width:100%;\n  height:100%\n}\n\n.vueperslide[href]{\n  -webkit-user-drag:none\n}\n\n.vueperslide__image{\n  position:absolute;\n  top:0;\n  left:0;\n  right:0;\n  bottom:0;\n  background-size:cover\n}\n\n.vueperslide__content-wrapper:not(.vueperslide__content-wrapper--outside-top):not(.vueperslide__content-wrapper--outside-bottom){\n  position:absolute\n}\n\n.vueperslides--fade .vueperslide{\n  position:absolute;\n  top:0;\n  left:0;\n  right:0;\n  bottom:0;\n  opacity:0;\n  transition:opacity .8s ease-in-out;\n  transition-duration:inherit\n}\n\n.vueperslides--fade .vueperslide--active,.vueperslides--fade .vueperslide--visible{\n  z-index:1;\n  opacity:1\n}\n\n.vueperslides--3d .vueperslide{\n  position:absolute;\n  z-index:-1\n}\n\n.vueperslides--3d .vueperslide--active,.vueperslides--3d .vueperslide--next-slide,.vueperslides--3d .vueperslide--previous-slide{\n  z-index:0\n}\n\n.vueperslides--3d .vueperslide--active{\n  z-index:1\n}\n\n.vueperslides--3d .vueperslide[face=front]{\n  transform:rotateY(90deg) translateX(-50%) rotateY(-90deg)\n}\n\n.vueperslides--3d .vueperslide[face=right]{\n  transform:rotateY(90deg) translateX(50%);\n  transform-origin:100% 0\n}\n\n.vueperslides--3d .vueperslide[face=back]{\n  transform:rotateY(270deg) translateX(-50%) rotateY(-90deg)\n}\n\n.vueperslides--3d .vueperslide[face=left]{\n  transform:rotateY(270deg) translateX(-50%);\n  transform-origin:0 0\n}\n\n.vueperslides:not(.no-shadow):not(.vueperslides--3d) .vueperslides__parallax-wrapper:after,.vueperslides:not(.no-shadow):not(.vueperslides--3d) .vueperslides__parallax-wrapper:before{\n  content:\"\";\n  position:absolute;\n  bottom:100%;\n  left:-1em;\n  right:-1em;\n  height:2em;\n  box-shadow:0 0 20px rgba(0,0,0,.25);\n  z-index:2\n}\n\n.vueperslides:not(.no-shadow):not(.vueperslides--3d) .vueperslides__parallax-wrapper:after{\n  top:100%;\n  bottom:auto\n}\n\n.vueperslides__arrows{\n  color:#fff\n}\n\n.vueperslides__arrows--outside{\n  color:currentColor\n}\n\n.vueperslides__arrow{\n  top:50%;\n  background-color:transparent;\n  border:none;\n  font-size:3em;\n  opacity:.7\n}\n\n.vueperslides__arrow--prev{\n  left:10px\n}\n\n.vueperslides__arrow--next{\n  right:10px\n}\n\n.vueperslides__arrow:hover{\n  opacity:1\n}\n\n.vueperslides__arrows--outside .vueperslides__arrow--prev{\n  left:-40px\n}\n\n.vueperslides__arrows--outside .vueperslides__arrow--next{\n  right:-40px\n}\n\n.vueperslides__paused{\n  top:3%;\n  right:3%;\n  opacity:0;\n  text-shadow:0 0 3px rgba(0,0,0,.4);\n  z-index:1\n}\n\n.vueperslides:hover .vueperslides__paused{\n  opacity:1\n}\n\n.vueperslides__bullet{\n  width:12px;\n  height:12px;\n  border-radius:12px;\n  border:1px solid #fff;\n  background-color:transparent;\n  box-shadow:0 0 1px rgba(0,0,0,.5),0 0 3px rgba(0,0,0,.3);\n  margin:1.5em .6em;\n  padding:0;\n  transition:.4s ease-in-out\n}\n\n.vueperslides__bullet--active{\n  border-width:6px\n}\n\n.vueperslides__bullet span{\n  display:none\n}\n\n.vueperslide{\n  overflow:hidden\n}\n\n.vueperslide,.vueperslide__image{\n  background-position:50%\n}\n\n.vueperslide__content-wrapper:not(.vueperslide__content-wrapper--outside-top):not(.vueperslide__content-wrapper--outside-bottom){\n  top:50%;\n  left:50%;\n  transform:translate(-50%,-50%);\n  text-align:center\n}\n\n.vueperslides{\n  position:relative\n}\n\n.vueperslides--fixed-height .vueperslide,.vueperslides--fixed-height .vueperslides__inner,.vueperslides--fixed-height .vueperslides__parallax-wrapper{\n  height:inherit\n}\n\n.vueperslides--fixed-height .vueperslides__parallax-wrapper{\n  padding-bottom:0!important\n}\n\n.vueperslides__inner{\n  position:relative;\n  -webkit-user-select:none;\n  -moz-user-select:none;\n  -ms-user-select:none;\n  user-select:none\n}\n\n.vueperslides__parallax-wrapper{\n  position:relative;\n  overflow:hidden\n}\n\n.vueperslides--3d .vueperslides__parallax-wrapper{\n  overflow:visible\n}\n\n.vueperslides__track{\n  position:absolute;\n  top:0;\n  height:100%;\n  left:0;\n  right:0;\n  overflow:hidden;\n  z-index:1\n}\n\n.vueperslides--parallax .vueperslides__track{\n  height:200%;\n  transform:translateY(0)\n}\n\n.vueperslides--touchable .vueperslides__track{\n  cursor:ew-resize;\n  cursor:-webkit-grab;\n  cursor:grab\n}\n\n.vueperslides--touchable .vueperslides__track--dragging,.vueperslides--touchable .vueperslides__track--mousedown{\n  cursor:-webkit-grabbing;\n  cursor:grabbing\n}\n\n.vueperslides--3d .vueperslides__track{\n  overflow:visible;\n  perspective:100em\n}\n\n.vueperslides__track-inner{\n  white-space:nowrap;\n  transition:transform .5s ease-in-out;\n  height:100%\n}\n\n.vueperslides--fade .vueperslides__track-inner{\n  white-space:normal;\n  transition:none\n}\n\n.vueperslides--3d .vueperslides__track-inner{\n  transform-style:preserve-3d\n}\n\n.vueperslides__track--mousedown .vueperslides__track-inner{\n  transition:transform .2s ease-in-out!important\n}\n\n.vueperslides__track--dragging .vueperslides__track-inner{\n  transition:none\n}\n\n.vueperslides__track--no-animation .vueperslides__track-inner{\n  transition-duration:0s\n}\n\n.vueperslides__arrow{\n  fill:currentColor;\n  width:1em;\n  text-align:center;\n  transform:translateY(-50%);\n  cursor:pointer;\n  -webkit-user-select:none;\n  -moz-user-select:none;\n  -ms-user-select:none;\n  user-select:none;\n  outline:none;\n  z-index:2\n}\n\n.vueperslides__arrow,.vueperslides__paused{\n  position:absolute;\n  transition:.3s ease-in-out\n}\n\n.vueperslides__bullets{\n  display:flex;\n  justify-content:center;\n  position:absolute;\n  bottom:0;\n  left:0;\n  right:0\n}\n\n.vueperslides__bullets--outside{\n  position:relative\n}\n\n.vueperslides__bullet{\n  cursor:pointer;\n  -webkit-user-select:none;\n  -moz-user-select:none;\n  -ms-user-select:none;\n  user-select:none;\n  outline:none;\n  z-index:2;\n  display:flex;\n  justify-content:center;\n  align-items:center\n}\n\n.vueperslides__bullet::-moz-focus-inner{\n  border:0\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/vueperslides/dist/vueperslides.common.js":
/*!***************************************************************!*\
  !*** ./node_modules/vueperslides/dist/vueperslides.common.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports =
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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "fae3");
/******/ })
/************************************************************************/
/******/ ({

/***/ "01f9":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var LIBRARY = __webpack_require__("2d00");
var $export = __webpack_require__("5ca1");
var redefine = __webpack_require__("2aba");
var hide = __webpack_require__("32e9");
var Iterators = __webpack_require__("84f2");
var $iterCreate = __webpack_require__("41a0");
var setToStringTag = __webpack_require__("7f20");
var getPrototypeOf = __webpack_require__("38fd");
var ITERATOR = __webpack_require__("2b4c")('iterator');
var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
var FF_ITERATOR = '@@iterator';
var KEYS = 'keys';
var VALUES = 'values';

var returnThis = function () { return this; };

module.exports = function (Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
  $iterCreate(Constructor, NAME, next);
  var getMethod = function (kind) {
    if (!BUGGY && kind in proto) return proto[kind];
    switch (kind) {
      case KEYS: return function keys() { return new Constructor(this, kind); };
      case VALUES: return function values() { return new Constructor(this, kind); };
    } return function entries() { return new Constructor(this, kind); };
  };
  var TAG = NAME + ' Iterator';
  var DEF_VALUES = DEFAULT == VALUES;
  var VALUES_BUG = false;
  var proto = Base.prototype;
  var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
  var $default = $native || getMethod(DEFAULT);
  var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
  var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
  var methods, key, IteratorPrototype;
  // Fix native
  if ($anyNative) {
    IteratorPrototype = getPrototypeOf($anyNative.call(new Base()));
    if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
      // Set @@toStringTag to native iterators
      setToStringTag(IteratorPrototype, TAG, true);
      // fix for some old engines
      if (!LIBRARY && typeof IteratorPrototype[ITERATOR] != 'function') hide(IteratorPrototype, ITERATOR, returnThis);
    }
  }
  // fix Array#{values, @@iterator}.name in V8 / FF
  if (DEF_VALUES && $native && $native.name !== VALUES) {
    VALUES_BUG = true;
    $default = function values() { return $native.call(this); };
  }
  // Define iterator
  if ((!LIBRARY || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
    hide(proto, ITERATOR, $default);
  }
  // Plug for library
  Iterators[NAME] = $default;
  Iterators[TAG] = returnThis;
  if (DEFAULT) {
    methods = {
      values: DEF_VALUES ? $default : getMethod(VALUES),
      keys: IS_SET ? $default : getMethod(KEYS),
      entries: $entries
    };
    if (FORCED) for (key in methods) {
      if (!(key in proto)) redefine(proto, key, methods[key]);
    } else $export($export.P + $export.F * (BUGGY || VALUES_BUG), NAME, methods);
  }
  return methods;
};


/***/ }),

/***/ "07e3":
/***/ (function(module, exports) {

var hasOwnProperty = {}.hasOwnProperty;
module.exports = function (it, key) {
  return hasOwnProperty.call(it, key);
};


/***/ }),

/***/ "0b32":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "0d58":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 / 15.2.3.14 Object.keys(O)
var $keys = __webpack_require__("ce10");
var enumBugKeys = __webpack_require__("e11e");

module.exports = Object.keys || function keys(O) {
  return $keys(O, enumBugKeys);
};


/***/ }),

/***/ "0fc9":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("3a38");
var max = Math.max;
var min = Math.min;
module.exports = function (index, length) {
  index = toInteger(index);
  return index < 0 ? max(index + length, 0) : min(index, length);
};


/***/ }),

/***/ "11e9":
/***/ (function(module, exports, __webpack_require__) {

var pIE = __webpack_require__("52a7");
var createDesc = __webpack_require__("4630");
var toIObject = __webpack_require__("6821");
var toPrimitive = __webpack_require__("6a99");
var has = __webpack_require__("69a8");
var IE8_DOM_DEFINE = __webpack_require__("c69a");
var gOPD = Object.getOwnPropertyDescriptor;

exports.f = __webpack_require__("9e1e") ? gOPD : function getOwnPropertyDescriptor(O, P) {
  O = toIObject(O);
  P = toPrimitive(P, true);
  if (IE8_DOM_DEFINE) try {
    return gOPD(O, P);
  } catch (e) { /* empty */ }
  if (has(O, P)) return createDesc(!pIE.f.call(O, P), O[P]);
};


/***/ }),

/***/ "1495":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("86cc");
var anObject = __webpack_require__("cb7c");
var getKeys = __webpack_require__("0d58");

module.exports = __webpack_require__("9e1e") ? Object.defineProperties : function defineProperties(O, Properties) {
  anObject(O);
  var keys = getKeys(Properties);
  var length = keys.length;
  var i = 0;
  var P;
  while (length > i) dP.f(O, P = keys[i++], Properties[P]);
  return O;
};


/***/ }),

/***/ "1654":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $at = __webpack_require__("71c1")(true);

// 21.1.3.27 String.prototype[@@iterator]()
__webpack_require__("30f1")(String, 'String', function (iterated) {
  this._t = String(iterated); // target
  this._i = 0;                // next index
// 21.1.5.2.1 %StringIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var index = this._i;
  var point;
  if (index >= O.length) return { value: undefined, done: true };
  point = $at(O, index);
  this._i += point.length;
  return { value: point, done: false };
});


/***/ }),

/***/ "1691":
/***/ (function(module, exports) {

// IE 8- don't enum bug keys
module.exports = (
  'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
).split(',');


/***/ }),

/***/ "1af6":
/***/ (function(module, exports, __webpack_require__) {

// 22.1.2.2 / 15.4.3.2 Array.isArray(arg)
var $export = __webpack_require__("63b6");

$export($export.S, 'Array', { isArray: __webpack_require__("9003") });


/***/ }),

/***/ "1bc3":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
var isObject = __webpack_require__("f772");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
module.exports = function (it, S) {
  if (!isObject(it)) return it;
  var fn, val;
  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  throw TypeError("Can't convert object to primitive value");
};


/***/ }),

/***/ "1c94":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslide_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("5958");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslide_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslide_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslide_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "1ec9":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("f772");
var document = __webpack_require__("e53d").document;
// typeof document.createElement is 'object' in old IE
var is = isObject(document) && isObject(document.createElement);
module.exports = function (it) {
  return is ? document.createElement(it) : {};
};


/***/ }),

/***/ "20fd":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $defineProperty = __webpack_require__("d9f6");
var createDesc = __webpack_require__("aebd");

module.exports = function (object, index, value) {
  if (index in object) $defineProperty.f(object, index, createDesc(0, value));
  else object[index] = value;
};


/***/ }),

/***/ "230e":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("d3f4");
var document = __webpack_require__("7726").document;
// typeof document.createElement is 'object' in old IE
var is = isObject(document) && isObject(document.createElement);
module.exports = function (it) {
  return is ? document.createElement(it) : {};
};


/***/ }),

/***/ "241e":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
var defined = __webpack_require__("25eb");
module.exports = function (it) {
  return Object(defined(it));
};


/***/ }),

/***/ "25eb":
/***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
module.exports = function (it) {
  if (it == undefined) throw TypeError("Can't call method on  " + it);
  return it;
};


/***/ }),

/***/ "2621":
/***/ (function(module, exports) {

exports.f = Object.getOwnPropertySymbols;


/***/ }),

/***/ "294c":
/***/ (function(module, exports) {

module.exports = function (exec) {
  try {
    return !!exec();
  } catch (e) {
    return true;
  }
};


/***/ }),

/***/ "2aba":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("7726");
var hide = __webpack_require__("32e9");
var has = __webpack_require__("69a8");
var SRC = __webpack_require__("ca5a")('src');
var $toString = __webpack_require__("fa5b");
var TO_STRING = 'toString';
var TPL = ('' + $toString).split(TO_STRING);

__webpack_require__("8378").inspectSource = function (it) {
  return $toString.call(it);
};

(module.exports = function (O, key, val, safe) {
  var isFunction = typeof val == 'function';
  if (isFunction) has(val, 'name') || hide(val, 'name', key);
  if (O[key] === val) return;
  if (isFunction) has(val, SRC) || hide(val, SRC, O[key] ? '' + O[key] : TPL.join(String(key)));
  if (O === global) {
    O[key] = val;
  } else if (!safe) {
    delete O[key];
    hide(O, key, val);
  } else if (O[key]) {
    O[key] = val;
  } else {
    hide(O, key, val);
  }
// add fake Function#toString for correct work wrapped methods / constructors with methods like LoDash isNative
})(Function.prototype, TO_STRING, function toString() {
  return typeof this == 'function' && this[SRC] || $toString.call(this);
});


/***/ }),

/***/ "2aeb":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
var anObject = __webpack_require__("cb7c");
var dPs = __webpack_require__("1495");
var enumBugKeys = __webpack_require__("e11e");
var IE_PROTO = __webpack_require__("613b")('IE_PROTO');
var Empty = function () { /* empty */ };
var PROTOTYPE = 'prototype';

// Create object with fake `null` prototype: use iframe Object with cleared prototype
var createDict = function () {
  // Thrash, waste and sodomy: IE GC bug
  var iframe = __webpack_require__("230e")('iframe');
  var i = enumBugKeys.length;
  var lt = '<';
  var gt = '>';
  var iframeDocument;
  iframe.style.display = 'none';
  __webpack_require__("fab2").appendChild(iframe);
  iframe.src = 'javascript:'; // eslint-disable-line no-script-url
  // createDict = iframe.contentWindow.Object;
  // html.removeChild(iframe);
  iframeDocument = iframe.contentWindow.document;
  iframeDocument.open();
  iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
  iframeDocument.close();
  createDict = iframeDocument.F;
  while (i--) delete createDict[PROTOTYPE][enumBugKeys[i]];
  return createDict();
};

module.exports = Object.create || function create(O, Properties) {
  var result;
  if (O !== null) {
    Empty[PROTOTYPE] = anObject(O);
    result = new Empty();
    Empty[PROTOTYPE] = null;
    // add "__proto__" for Object.getPrototypeOf polyfill
    result[IE_PROTO] = O;
  } else result = createDict();
  return Properties === undefined ? result : dPs(result, Properties);
};


/***/ }),

/***/ "2b4c":
/***/ (function(module, exports, __webpack_require__) {

var store = __webpack_require__("5537")('wks');
var uid = __webpack_require__("ca5a");
var Symbol = __webpack_require__("7726").Symbol;
var USE_SYMBOL = typeof Symbol == 'function';

var $exports = module.exports = function (name) {
  return store[name] || (store[name] =
    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};

$exports.store = store;


/***/ }),

/***/ "2d00":
/***/ (function(module, exports) {

module.exports = false;


/***/ }),

/***/ "2d95":
/***/ (function(module, exports) {

var toString = {}.toString;

module.exports = function (it) {
  return toString.call(it).slice(8, -1);
};


/***/ }),

/***/ "2f21":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var fails = __webpack_require__("79e5");

module.exports = function (method, arg) {
  return !!method && fails(function () {
    // eslint-disable-next-line no-useless-call
    arg ? method.call(null, function () { /* empty */ }, 1) : method.call(null);
  });
};


/***/ }),

/***/ "30f1":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var LIBRARY = __webpack_require__("b8e3");
var $export = __webpack_require__("63b6");
var redefine = __webpack_require__("9138");
var hide = __webpack_require__("35e8");
var Iterators = __webpack_require__("481b");
var $iterCreate = __webpack_require__("8f60");
var setToStringTag = __webpack_require__("45f2");
var getPrototypeOf = __webpack_require__("53e2");
var ITERATOR = __webpack_require__("5168")('iterator');
var BUGGY = !([].keys && 'next' in [].keys()); // Safari has buggy iterators w/o `next`
var FF_ITERATOR = '@@iterator';
var KEYS = 'keys';
var VALUES = 'values';

var returnThis = function () { return this; };

module.exports = function (Base, NAME, Constructor, next, DEFAULT, IS_SET, FORCED) {
  $iterCreate(Constructor, NAME, next);
  var getMethod = function (kind) {
    if (!BUGGY && kind in proto) return proto[kind];
    switch (kind) {
      case KEYS: return function keys() { return new Constructor(this, kind); };
      case VALUES: return function values() { return new Constructor(this, kind); };
    } return function entries() { return new Constructor(this, kind); };
  };
  var TAG = NAME + ' Iterator';
  var DEF_VALUES = DEFAULT == VALUES;
  var VALUES_BUG = false;
  var proto = Base.prototype;
  var $native = proto[ITERATOR] || proto[FF_ITERATOR] || DEFAULT && proto[DEFAULT];
  var $default = $native || getMethod(DEFAULT);
  var $entries = DEFAULT ? !DEF_VALUES ? $default : getMethod('entries') : undefined;
  var $anyNative = NAME == 'Array' ? proto.entries || $native : $native;
  var methods, key, IteratorPrototype;
  // Fix native
  if ($anyNative) {
    IteratorPrototype = getPrototypeOf($anyNative.call(new Base()));
    if (IteratorPrototype !== Object.prototype && IteratorPrototype.next) {
      // Set @@toStringTag to native iterators
      setToStringTag(IteratorPrototype, TAG, true);
      // fix for some old engines
      if (!LIBRARY && typeof IteratorPrototype[ITERATOR] != 'function') hide(IteratorPrototype, ITERATOR, returnThis);
    }
  }
  // fix Array#{values, @@iterator}.name in V8 / FF
  if (DEF_VALUES && $native && $native.name !== VALUES) {
    VALUES_BUG = true;
    $default = function values() { return $native.call(this); };
  }
  // Define iterator
  if ((!LIBRARY || FORCED) && (BUGGY || VALUES_BUG || !proto[ITERATOR])) {
    hide(proto, ITERATOR, $default);
  }
  // Plug for library
  Iterators[NAME] = $default;
  Iterators[TAG] = returnThis;
  if (DEFAULT) {
    methods = {
      values: DEF_VALUES ? $default : getMethod(VALUES),
      keys: IS_SET ? $default : getMethod(KEYS),
      entries: $entries
    };
    if (FORCED) for (key in methods) {
      if (!(key in proto)) redefine(proto, key, methods[key]);
    } else $export($export.P + $export.F * (BUGGY || VALUES_BUG), NAME, methods);
  }
  return methods;
};


/***/ }),

/***/ "32e9":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("86cc");
var createDesc = __webpack_require__("4630");
module.exports = __webpack_require__("9e1e") ? function (object, key, value) {
  return dP.f(object, key, createDesc(1, value));
} : function (object, key, value) {
  object[key] = value;
  return object;
};


/***/ }),

/***/ "32fc":
/***/ (function(module, exports, __webpack_require__) {

var document = __webpack_require__("e53d").document;
module.exports = document && document.documentElement;


/***/ }),

/***/ "335c":
/***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
var cof = __webpack_require__("6b4c");
// eslint-disable-next-line no-prototype-builtins
module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
  return cof(it) == 'String' ? it.split('') : Object(it);
};


/***/ }),

/***/ "35e8":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("d9f6");
var createDesc = __webpack_require__("aebd");
module.exports = __webpack_require__("8e60") ? function (object, key, value) {
  return dP.f(object, key, createDesc(1, value));
} : function (object, key, value) {
  object[key] = value;
  return object;
};


/***/ }),

/***/ "36c3":
/***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
var IObject = __webpack_require__("335c");
var defined = __webpack_require__("25eb");
module.exports = function (it) {
  return IObject(defined(it));
};


/***/ }),

/***/ "3702":
/***/ (function(module, exports, __webpack_require__) {

// check on default Array iterator
var Iterators = __webpack_require__("481b");
var ITERATOR = __webpack_require__("5168")('iterator');
var ArrayProto = Array.prototype;

module.exports = function (it) {
  return it !== undefined && (Iterators.Array === it || ArrayProto[ITERATOR] === it);
};


/***/ }),

/***/ "38fd":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)
var has = __webpack_require__("69a8");
var toObject = __webpack_require__("4bf8");
var IE_PROTO = __webpack_require__("613b")('IE_PROTO');
var ObjectProto = Object.prototype;

module.exports = Object.getPrototypeOf || function (O) {
  O = toObject(O);
  if (has(O, IE_PROTO)) return O[IE_PROTO];
  if (typeof O.constructor == 'function' && O instanceof O.constructor) {
    return O.constructor.prototype;
  } return O instanceof Object ? ObjectProto : null;
};


/***/ }),

/***/ "3a38":
/***/ (function(module, exports) {

// 7.1.4 ToInteger
var ceil = Math.ceil;
var floor = Math.floor;
module.exports = function (it) {
  return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
};


/***/ }),

/***/ "40c3":
/***/ (function(module, exports, __webpack_require__) {

// getting tag from 19.1.3.6 Object.prototype.toString()
var cof = __webpack_require__("6b4c");
var TAG = __webpack_require__("5168")('toStringTag');
// ES3 wrong here
var ARG = cof(function () { return arguments; }()) == 'Arguments';

// fallback for IE11 Script Access Denied error
var tryGet = function (it, key) {
  try {
    return it[key];
  } catch (e) { /* empty */ }
};

module.exports = function (it) {
  var O, T, B;
  return it === undefined ? 'Undefined' : it === null ? 'Null'
    // @@toStringTag case
    : typeof (T = tryGet(O = Object(it), TAG)) == 'string' ? T
    // builtinTag case
    : ARG ? cof(O)
    // ES3 arguments fallback
    : (B = cof(O)) == 'Object' && typeof O.callee == 'function' ? 'Arguments' : B;
};


/***/ }),

/***/ "41a0":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var create = __webpack_require__("2aeb");
var descriptor = __webpack_require__("4630");
var setToStringTag = __webpack_require__("7f20");
var IteratorPrototype = {};

// 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
__webpack_require__("32e9")(IteratorPrototype, __webpack_require__("2b4c")('iterator'), function () { return this; });

module.exports = function (Constructor, NAME, next) {
  Constructor.prototype = create(IteratorPrototype, { next: descriptor(1, next) });
  setToStringTag(Constructor, NAME + ' Iterator');
};


/***/ }),

/***/ "454f":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("46a7");
var $Object = __webpack_require__("584a").Object;
module.exports = function defineProperty(it, key, desc) {
  return $Object.defineProperty(it, key, desc);
};


/***/ }),

/***/ "456d":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 Object.keys(O)
var toObject = __webpack_require__("4bf8");
var $keys = __webpack_require__("0d58");

__webpack_require__("5eda")('keys', function () {
  return function keys(it) {
    return $keys(toObject(it));
  };
});


/***/ }),

/***/ "4588":
/***/ (function(module, exports) {

// 7.1.4 ToInteger
var ceil = Math.ceil;
var floor = Math.floor;
module.exports = function (it) {
  return isNaN(it = +it) ? 0 : (it > 0 ? floor : ceil)(it);
};


/***/ }),

/***/ "45f2":
/***/ (function(module, exports, __webpack_require__) {

var def = __webpack_require__("d9f6").f;
var has = __webpack_require__("07e3");
var TAG = __webpack_require__("5168")('toStringTag');

module.exports = function (it, tag, stat) {
  if (it && !has(it = stat ? it : it.prototype, TAG)) def(it, TAG, { configurable: true, value: tag });
};


/***/ }),

/***/ "4630":
/***/ (function(module, exports) {

module.exports = function (bitmap, value) {
  return {
    enumerable: !(bitmap & 1),
    configurable: !(bitmap & 2),
    writable: !(bitmap & 4),
    value: value
  };
};


/***/ }),

/***/ "46a7":
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__("63b6");
// 19.1.2.4 / 15.2.3.6 Object.defineProperty(O, P, Attributes)
$export($export.S + $export.F * !__webpack_require__("8e60"), 'Object', { defineProperty: __webpack_require__("d9f6").f });


/***/ }),

/***/ "481b":
/***/ (function(module, exports) {

module.exports = {};


/***/ }),

/***/ "4bf8":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.13 ToObject(argument)
var defined = __webpack_require__("be13");
module.exports = function (it) {
  return Object(defined(it));
};


/***/ }),

/***/ "4ee1":
/***/ (function(module, exports, __webpack_require__) {

var ITERATOR = __webpack_require__("5168")('iterator');
var SAFE_CLOSING = false;

try {
  var riter = [7][ITERATOR]();
  riter['return'] = function () { SAFE_CLOSING = true; };
  // eslint-disable-next-line no-throw-literal
  Array.from(riter, function () { throw 2; });
} catch (e) { /* empty */ }

module.exports = function (exec, skipClosing) {
  if (!skipClosing && !SAFE_CLOSING) return false;
  var safe = false;
  try {
    var arr = [7];
    var iter = arr[ITERATOR]();
    iter.next = function () { return { done: safe = true }; };
    arr[ITERATOR] = function () { return iter; };
    exec(arr);
  } catch (e) { /* empty */ }
  return safe;
};


/***/ }),

/***/ "50ed":
/***/ (function(module, exports) {

module.exports = function (done, value) {
  return { value: value, done: !!done };
};


/***/ }),

/***/ "5168":
/***/ (function(module, exports, __webpack_require__) {

var store = __webpack_require__("dbdb")('wks');
var uid = __webpack_require__("62a0");
var Symbol = __webpack_require__("e53d").Symbol;
var USE_SYMBOL = typeof Symbol == 'function';

var $exports = module.exports = function (name) {
  return store[name] || (store[name] =
    USE_SYMBOL && Symbol[name] || (USE_SYMBOL ? Symbol : uid)('Symbol.' + name));
};

$exports.store = store;


/***/ }),

/***/ "52a7":
/***/ (function(module, exports) {

exports.f = {}.propertyIsEnumerable;


/***/ }),

/***/ "53e2":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.9 / 15.2.3.2 Object.getPrototypeOf(O)
var has = __webpack_require__("07e3");
var toObject = __webpack_require__("241e");
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');
var ObjectProto = Object.prototype;

module.exports = Object.getPrototypeOf || function (O) {
  O = toObject(O);
  if (has(O, IE_PROTO)) return O[IE_PROTO];
  if (typeof O.constructor == 'function' && O instanceof O.constructor) {
    return O.constructor.prototype;
  } return O instanceof Object ? ObjectProto : null;
};


/***/ }),

/***/ "549b":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var ctx = __webpack_require__("d864");
var $export = __webpack_require__("63b6");
var toObject = __webpack_require__("241e");
var call = __webpack_require__("b0dc");
var isArrayIter = __webpack_require__("3702");
var toLength = __webpack_require__("b447");
var createProperty = __webpack_require__("20fd");
var getIterFn = __webpack_require__("7cd6");

$export($export.S + $export.F * !__webpack_require__("4ee1")(function (iter) { Array.from(iter); }), 'Array', {
  // 22.1.2.1 Array.from(arrayLike, mapfn = undefined, thisArg = undefined)
  from: function from(arrayLike /* , mapfn = undefined, thisArg = undefined */) {
    var O = toObject(arrayLike);
    var C = typeof this == 'function' ? this : Array;
    var aLen = arguments.length;
    var mapfn = aLen > 1 ? arguments[1] : undefined;
    var mapping = mapfn !== undefined;
    var index = 0;
    var iterFn = getIterFn(O);
    var length, result, step, iterator;
    if (mapping) mapfn = ctx(mapfn, aLen > 2 ? arguments[2] : undefined, 2);
    // if object isn't iterable or it's array with default iterator - use simple case
    if (iterFn != undefined && !(C == Array && isArrayIter(iterFn))) {
      for (iterator = iterFn.call(O), result = new C(); !(step = iterator.next()).done; index++) {
        createProperty(result, index, mapping ? call(iterator, mapfn, [step.value, index], true) : step.value);
      }
    } else {
      length = toLength(O.length);
      for (result = new C(length); length > index; index++) {
        createProperty(result, index, mapping ? mapfn(O[index], index) : O[index]);
      }
    }
    result.length = index;
    return result;
  }
});


/***/ }),

/***/ "54a1":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("6c1c");
__webpack_require__("1654");
module.exports = __webpack_require__("95d5");


/***/ }),

/***/ "5537":
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__("8378");
var global = __webpack_require__("7726");
var SHARED = '__core-js_shared__';
var store = global[SHARED] || (global[SHARED] = {});

(module.exports = function (key, value) {
  return store[key] || (store[key] = value !== undefined ? value : {});
})('versions', []).push({
  version: core.version,
  mode: __webpack_require__("2d00") ? 'pure' : 'global',
  copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
});


/***/ }),

/***/ "5559":
/***/ (function(module, exports, __webpack_require__) {

var shared = __webpack_require__("dbdb")('keys');
var uid = __webpack_require__("62a0");
module.exports = function (key) {
  return shared[key] || (shared[key] = uid(key));
};


/***/ }),

/***/ "55dd":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $export = __webpack_require__("5ca1");
var aFunction = __webpack_require__("d8e8");
var toObject = __webpack_require__("4bf8");
var fails = __webpack_require__("79e5");
var $sort = [].sort;
var test = [1, 2, 3];

$export($export.P + $export.F * (fails(function () {
  // IE8-
  test.sort(undefined);
}) || !fails(function () {
  // V8 bug
  test.sort(null);
  // Old WebKit
}) || !__webpack_require__("2f21")($sort)), 'Array', {
  // 22.1.3.25 Array.prototype.sort(comparefn)
  sort: function sort(comparefn) {
    return comparefn === undefined
      ? $sort.call(toObject(this))
      : $sort.call(toObject(this), aFunction(comparefn));
  }
});


/***/ }),

/***/ "584a":
/***/ (function(module, exports) {

var core = module.exports = { version: '2.6.5' };
if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),

/***/ "5958":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "5b4e":
/***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
var toIObject = __webpack_require__("36c3");
var toLength = __webpack_require__("b447");
var toAbsoluteIndex = __webpack_require__("0fc9");
module.exports = function (IS_INCLUDES) {
  return function ($this, el, fromIndex) {
    var O = toIObject($this);
    var length = toLength(O.length);
    var index = toAbsoluteIndex(fromIndex, length);
    var value;
    // Array#includes uses SameValueZero equality algorithm
    // eslint-disable-next-line no-self-compare
    if (IS_INCLUDES && el != el) while (length > index) {
      value = O[index++];
      // eslint-disable-next-line no-self-compare
      if (value != value) return true;
    // Array#indexOf ignores holes, Array#includes - not
    } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
      if (O[index] === el) return IS_INCLUDES || index || 0;
    } return !IS_INCLUDES && -1;
  };
};


/***/ }),

/***/ "5ca1":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("7726");
var core = __webpack_require__("8378");
var hide = __webpack_require__("32e9");
var redefine = __webpack_require__("2aba");
var ctx = __webpack_require__("9b43");
var PROTOTYPE = 'prototype';

var $export = function (type, name, source) {
  var IS_FORCED = type & $export.F;
  var IS_GLOBAL = type & $export.G;
  var IS_STATIC = type & $export.S;
  var IS_PROTO = type & $export.P;
  var IS_BIND = type & $export.B;
  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] || (global[name] = {}) : (global[name] || {})[PROTOTYPE];
  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
  var expProto = exports[PROTOTYPE] || (exports[PROTOTYPE] = {});
  var key, own, out, exp;
  if (IS_GLOBAL) source = name;
  for (key in source) {
    // contains in native
    own = !IS_FORCED && target && target[key] !== undefined;
    // export native or passed
    out = (own ? target : source)[key];
    // bind timers to global for call from export context
    exp = IS_BIND && own ? ctx(out, global) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
    // extend global
    if (target) redefine(target, key, out, type & $export.U);
    // export
    if (exports[key] != out) hide(exports, key, exp);
    if (IS_PROTO && expProto[key] != out) expProto[key] = out;
  }
};
global.core = core;
// type bitmap
$export.F = 1;   // forced
$export.G = 2;   // global
$export.S = 4;   // static
$export.P = 8;   // proto
$export.B = 16;  // bind
$export.W = 32;  // wrap
$export.U = 64;  // safe
$export.R = 128; // real proto method for `library`
module.exports = $export;


/***/ }),

/***/ "5dbc":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("d3f4");
var setPrototypeOf = __webpack_require__("8b97").set;
module.exports = function (that, target, C) {
  var S = target.constructor;
  var P;
  if (S !== C && typeof S == 'function' && (P = S.prototype) !== C.prototype && isObject(P) && setPrototypeOf) {
    setPrototypeOf(that, P);
  } return that;
};


/***/ }),

/***/ "5eda":
/***/ (function(module, exports, __webpack_require__) {

// most Object methods by ES6 should accept primitives
var $export = __webpack_require__("5ca1");
var core = __webpack_require__("8378");
var fails = __webpack_require__("79e5");
module.exports = function (KEY, exec) {
  var fn = (core.Object || {})[KEY] || Object[KEY];
  var exp = {};
  exp[KEY] = exec(fn);
  $export($export.S + $export.F * fails(function () { fn(1); }), 'Object', exp);
};


/***/ }),

/***/ "613b":
/***/ (function(module, exports, __webpack_require__) {

var shared = __webpack_require__("5537")('keys');
var uid = __webpack_require__("ca5a");
module.exports = function (key) {
  return shared[key] || (shared[key] = uid(key));
};


/***/ }),

/***/ "626a":
/***/ (function(module, exports, __webpack_require__) {

// fallback for non-array-like ES3 and non-enumerable old V8 strings
var cof = __webpack_require__("2d95");
// eslint-disable-next-line no-prototype-builtins
module.exports = Object('z').propertyIsEnumerable(0) ? Object : function (it) {
  return cof(it) == 'String' ? it.split('') : Object(it);
};


/***/ }),

/***/ "62a0":
/***/ (function(module, exports) {

var id = 0;
var px = Math.random();
module.exports = function (key) {
  return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
};


/***/ }),

/***/ "63b6":
/***/ (function(module, exports, __webpack_require__) {

var global = __webpack_require__("e53d");
var core = __webpack_require__("584a");
var ctx = __webpack_require__("d864");
var hide = __webpack_require__("35e8");
var has = __webpack_require__("07e3");
var PROTOTYPE = 'prototype';

var $export = function (type, name, source) {
  var IS_FORCED = type & $export.F;
  var IS_GLOBAL = type & $export.G;
  var IS_STATIC = type & $export.S;
  var IS_PROTO = type & $export.P;
  var IS_BIND = type & $export.B;
  var IS_WRAP = type & $export.W;
  var exports = IS_GLOBAL ? core : core[name] || (core[name] = {});
  var expProto = exports[PROTOTYPE];
  var target = IS_GLOBAL ? global : IS_STATIC ? global[name] : (global[name] || {})[PROTOTYPE];
  var key, own, out;
  if (IS_GLOBAL) source = name;
  for (key in source) {
    // contains in native
    own = !IS_FORCED && target && target[key] !== undefined;
    if (own && has(exports, key)) continue;
    // export native or passed
    out = own ? target[key] : source[key];
    // prevent global pollution for namespaces
    exports[key] = IS_GLOBAL && typeof target[key] != 'function' ? source[key]
    // bind timers to global for call from export context
    : IS_BIND && own ? ctx(out, global)
    // wrap global constructors for prevent change them in library
    : IS_WRAP && target[key] == out ? (function (C) {
      var F = function (a, b, c) {
        if (this instanceof C) {
          switch (arguments.length) {
            case 0: return new C();
            case 1: return new C(a);
            case 2: return new C(a, b);
          } return new C(a, b, c);
        } return C.apply(this, arguments);
      };
      F[PROTOTYPE] = C[PROTOTYPE];
      return F;
    // make static versions for prototype methods
    })(out) : IS_PROTO && typeof out == 'function' ? ctx(Function.call, out) : out;
    // export proto methods to core.%CONSTRUCTOR%.methods.%NAME%
    if (IS_PROTO) {
      (exports.virtual || (exports.virtual = {}))[key] = out;
      // export proto methods to core.%CONSTRUCTOR%.prototype.%NAME%
      if (type & $export.R && expProto && !expProto[key]) hide(expProto, key, out);
    }
  }
};
// type bitmap
$export.F = 1;   // forced
$export.G = 2;   // global
$export.S = 4;   // static
$export.P = 8;   // proto
$export.B = 16;  // bind
$export.W = 32;  // wrap
$export.U = 64;  // safe
$export.R = 128; // real proto method for `library`
module.exports = $export;


/***/ }),

/***/ "6821":
/***/ (function(module, exports, __webpack_require__) {

// to indexed object, toObject with fallback for non-array-like ES3 strings
var IObject = __webpack_require__("626a");
var defined = __webpack_require__("be13");
module.exports = function (it) {
  return IObject(defined(it));
};


/***/ }),

/***/ "682b":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslides_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("afcf");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslides_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslides_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_index_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_vueperslides_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "69a8":
/***/ (function(module, exports) {

var hasOwnProperty = {}.hasOwnProperty;
module.exports = function (it, key) {
  return hasOwnProperty.call(it, key);
};


/***/ }),

/***/ "6a99":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.1 ToPrimitive(input [, PreferredType])
var isObject = __webpack_require__("d3f4");
// instead of the ES6 spec version, we didn't implement @@toPrimitive case
// and the second argument - flag - preferred type is a string
module.exports = function (it, S) {
  if (!isObject(it)) return it;
  var fn, val;
  if (S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  if (typeof (fn = it.valueOf) == 'function' && !isObject(val = fn.call(it))) return val;
  if (!S && typeof (fn = it.toString) == 'function' && !isObject(val = fn.call(it))) return val;
  throw TypeError("Can't convert object to primitive value");
};


/***/ }),

/***/ "6b4c":
/***/ (function(module, exports) {

var toString = {}.toString;

module.exports = function (it) {
  return toString.call(it).slice(8, -1);
};


/***/ }),

/***/ "6c1c":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("c367");
var global = __webpack_require__("e53d");
var hide = __webpack_require__("35e8");
var Iterators = __webpack_require__("481b");
var TO_STRING_TAG = __webpack_require__("5168")('toStringTag');

var DOMIterables = ('CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,' +
  'DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,' +
  'MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,' +
  'SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,' +
  'TextTrackList,TouchList').split(',');

for (var i = 0; i < DOMIterables.length; i++) {
  var NAME = DOMIterables[i];
  var Collection = global[NAME];
  var proto = Collection && Collection.prototype;
  if (proto && !proto[TO_STRING_TAG]) hide(proto, TO_STRING_TAG, NAME);
  Iterators[NAME] = Iterators.Array;
}


/***/ }),

/***/ "71c1":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("3a38");
var defined = __webpack_require__("25eb");
// true  -> String#at
// false -> String#codePointAt
module.exports = function (TO_STRING) {
  return function (that, pos) {
    var s = String(defined(that));
    var i = toInteger(pos);
    var l = s.length;
    var a, b;
    if (i < 0 || i >= l) return TO_STRING ? '' : undefined;
    a = s.charCodeAt(i);
    return a < 0xd800 || a > 0xdbff || i + 1 === l || (b = s.charCodeAt(i + 1)) < 0xdc00 || b > 0xdfff
      ? TO_STRING ? s.charAt(i) : a
      : TO_STRING ? s.slice(i, i + 2) : (a - 0xd800 << 10) + (b - 0xdc00) + 0x10000;
  };
};


/***/ }),

/***/ "7726":
/***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
var global = module.exports = typeof window != 'undefined' && window.Math == Math
  ? window : typeof self != 'undefined' && self.Math == Math ? self
  // eslint-disable-next-line no-new-func
  : Function('return this')();
if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),

/***/ "774e":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("d2d5");

/***/ }),

/***/ "77f1":
/***/ (function(module, exports, __webpack_require__) {

var toInteger = __webpack_require__("4588");
var max = Math.max;
var min = Math.min;
module.exports = function (index, length) {
  index = toInteger(index);
  return index < 0 ? max(index + length, 0) : min(index, length);
};


/***/ }),

/***/ "794b":
/***/ (function(module, exports, __webpack_require__) {

module.exports = !__webpack_require__("8e60") && !__webpack_require__("294c")(function () {
  return Object.defineProperty(__webpack_require__("1ec9")('div'), 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "79aa":
/***/ (function(module, exports) {

module.exports = function (it) {
  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
  return it;
};


/***/ }),

/***/ "79e5":
/***/ (function(module, exports) {

module.exports = function (exec) {
  try {
    return !!exec();
  } catch (e) {
    return true;
  }
};


/***/ }),

/***/ "7cd6":
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__("40c3");
var ITERATOR = __webpack_require__("5168")('iterator');
var Iterators = __webpack_require__("481b");
module.exports = __webpack_require__("584a").getIteratorMethod = function (it) {
  if (it != undefined) return it[ITERATOR]
    || it['@@iterator']
    || Iterators[classof(it)];
};


/***/ }),

/***/ "7e90":
/***/ (function(module, exports, __webpack_require__) {

var dP = __webpack_require__("d9f6");
var anObject = __webpack_require__("e4ae");
var getKeys = __webpack_require__("c3a1");

module.exports = __webpack_require__("8e60") ? Object.defineProperties : function defineProperties(O, Properties) {
  anObject(O);
  var keys = getKeys(Properties);
  var length = keys.length;
  var i = 0;
  var P;
  while (length > i) dP.f(O, P = keys[i++], Properties[P]);
  return O;
};


/***/ }),

/***/ "7f20":
/***/ (function(module, exports, __webpack_require__) {

var def = __webpack_require__("86cc").f;
var has = __webpack_require__("69a8");
var TAG = __webpack_require__("2b4c")('toStringTag');

module.exports = function (it, tag, stat) {
  if (it && !has(it = stat ? it : it.prototype, TAG)) def(it, TAG, { configurable: true, value: tag });
};


/***/ }),

/***/ "8378":
/***/ (function(module, exports) {

var core = module.exports = { version: '2.6.5' };
if (typeof __e == 'number') __e = core; // eslint-disable-line no-undef


/***/ }),

/***/ "8436":
/***/ (function(module, exports) {

module.exports = function () { /* empty */ };


/***/ }),

/***/ "84f2":
/***/ (function(module, exports) {

module.exports = {};


/***/ }),

/***/ "85f2":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("454f");

/***/ }),

/***/ "86cc":
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__("cb7c");
var IE8_DOM_DEFINE = __webpack_require__("c69a");
var toPrimitive = __webpack_require__("6a99");
var dP = Object.defineProperty;

exports.f = __webpack_require__("9e1e") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
  anObject(O);
  P = toPrimitive(P, true);
  anObject(Attributes);
  if (IE8_DOM_DEFINE) try {
    return dP(O, P, Attributes);
  } catch (e) { /* empty */ }
  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
  if ('value' in Attributes) O[P] = Attributes.value;
  return O;
};


/***/ }),

/***/ "8b97":
/***/ (function(module, exports, __webpack_require__) {

// Works with __proto__ only. Old v8 can't work with null proto objects.
/* eslint-disable no-proto */
var isObject = __webpack_require__("d3f4");
var anObject = __webpack_require__("cb7c");
var check = function (O, proto) {
  anObject(O);
  if (!isObject(proto) && proto !== null) throw TypeError(proto + ": can't set as prototype!");
};
module.exports = {
  set: Object.setPrototypeOf || ('__proto__' in {} ? // eslint-disable-line
    function (test, buggy, set) {
      try {
        set = __webpack_require__("9b43")(Function.call, __webpack_require__("11e9").f(Object.prototype, '__proto__').set, 2);
        set(test, []);
        buggy = !(test instanceof Array);
      } catch (e) { buggy = true; }
      return function setPrototypeOf(O, proto) {
        check(O, proto);
        if (buggy) O.__proto__ = proto;
        else set(O, proto);
        return O;
      };
    }({}, false) : undefined),
  check: check
};


/***/ }),

/***/ "8e60":
/***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
module.exports = !__webpack_require__("294c")(function () {
  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "8e6e":
/***/ (function(module, exports, __webpack_require__) {

// https://github.com/tc39/proposal-object-getownpropertydescriptors
var $export = __webpack_require__("5ca1");
var ownKeys = __webpack_require__("990b");
var toIObject = __webpack_require__("6821");
var gOPD = __webpack_require__("11e9");
var createProperty = __webpack_require__("f1ae");

$export($export.S, 'Object', {
  getOwnPropertyDescriptors: function getOwnPropertyDescriptors(object) {
    var O = toIObject(object);
    var getDesc = gOPD.f;
    var keys = ownKeys(O);
    var result = {};
    var i = 0;
    var key, desc;
    while (keys.length > i) {
      desc = getDesc(O, key = keys[i++]);
      if (desc !== undefined) createProperty(result, key, desc);
    }
    return result;
  }
});


/***/ }),

/***/ "8f60":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var create = __webpack_require__("a159");
var descriptor = __webpack_require__("aebd");
var setToStringTag = __webpack_require__("45f2");
var IteratorPrototype = {};

// 25.1.2.1.1 %IteratorPrototype%[@@iterator]()
__webpack_require__("35e8")(IteratorPrototype, __webpack_require__("5168")('iterator'), function () { return this; });

module.exports = function (Constructor, NAME, next) {
  Constructor.prototype = create(IteratorPrototype, { next: descriptor(1, next) });
  setToStringTag(Constructor, NAME + ' Iterator');
};


/***/ }),

/***/ "9003":
/***/ (function(module, exports, __webpack_require__) {

// 7.2.2 IsArray(argument)
var cof = __webpack_require__("6b4c");
module.exports = Array.isArray || function isArray(arg) {
  return cof(arg) == 'Array';
};


/***/ }),

/***/ "9093":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.7 / 15.2.3.4 Object.getOwnPropertyNames(O)
var $keys = __webpack_require__("ce10");
var hiddenKeys = __webpack_require__("e11e").concat('length', 'prototype');

exports.f = Object.getOwnPropertyNames || function getOwnPropertyNames(O) {
  return $keys(O, hiddenKeys);
};


/***/ }),

/***/ "9138":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("35e8");


/***/ }),

/***/ "95d5":
/***/ (function(module, exports, __webpack_require__) {

var classof = __webpack_require__("40c3");
var ITERATOR = __webpack_require__("5168")('iterator');
var Iterators = __webpack_require__("481b");
module.exports = __webpack_require__("584a").isIterable = function (it) {
  var O = Object(it);
  return O[ITERATOR] !== undefined
    || '@@iterator' in O
    // eslint-disable-next-line no-prototype-builtins
    || Iterators.hasOwnProperty(classof(O));
};


/***/ }),

/***/ "990b":
/***/ (function(module, exports, __webpack_require__) {

// all object keys, includes non-enumerable and symbols
var gOPN = __webpack_require__("9093");
var gOPS = __webpack_require__("2621");
var anObject = __webpack_require__("cb7c");
var Reflect = __webpack_require__("7726").Reflect;
module.exports = Reflect && Reflect.ownKeys || function ownKeys(it) {
  var keys = gOPN.f(anObject(it));
  var getSymbols = gOPS.f;
  return getSymbols ? keys.concat(getSymbols(it)) : keys;
};


/***/ }),

/***/ "9b43":
/***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
var aFunction = __webpack_require__("d8e8");
module.exports = function (fn, that, length) {
  aFunction(fn);
  if (that === undefined) return fn;
  switch (length) {
    case 1: return function (a) {
      return fn.call(that, a);
    };
    case 2: return function (a, b) {
      return fn.call(that, a, b);
    };
    case 3: return function (a, b, c) {
      return fn.call(that, a, b, c);
    };
  }
  return function (/* ...args */) {
    return fn.apply(that, arguments);
  };
};


/***/ }),

/***/ "9c6c":
/***/ (function(module, exports, __webpack_require__) {

// 22.1.3.31 Array.prototype[@@unscopables]
var UNSCOPABLES = __webpack_require__("2b4c")('unscopables');
var ArrayProto = Array.prototype;
if (ArrayProto[UNSCOPABLES] == undefined) __webpack_require__("32e9")(ArrayProto, UNSCOPABLES, {});
module.exports = function (key) {
  ArrayProto[UNSCOPABLES][key] = true;
};


/***/ }),

/***/ "9def":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
var toInteger = __webpack_require__("4588");
var min = Math.min;
module.exports = function (it) {
  return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
};


/***/ }),

/***/ "9e1e":
/***/ (function(module, exports, __webpack_require__) {

// Thank's IE8 for his funny defineProperty
module.exports = !__webpack_require__("79e5")(function () {
  return Object.defineProperty({}, 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "a159":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.2 / 15.2.3.5 Object.create(O [, Properties])
var anObject = __webpack_require__("e4ae");
var dPs = __webpack_require__("7e90");
var enumBugKeys = __webpack_require__("1691");
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');
var Empty = function () { /* empty */ };
var PROTOTYPE = 'prototype';

// Create object with fake `null` prototype: use iframe Object with cleared prototype
var createDict = function () {
  // Thrash, waste and sodomy: IE GC bug
  var iframe = __webpack_require__("1ec9")('iframe');
  var i = enumBugKeys.length;
  var lt = '<';
  var gt = '>';
  var iframeDocument;
  iframe.style.display = 'none';
  __webpack_require__("32fc").appendChild(iframe);
  iframe.src = 'javascript:'; // eslint-disable-line no-script-url
  // createDict = iframe.contentWindow.Object;
  // html.removeChild(iframe);
  iframeDocument = iframe.contentWindow.document;
  iframeDocument.open();
  iframeDocument.write(lt + 'script' + gt + 'document.F=Object' + lt + '/script' + gt);
  iframeDocument.close();
  createDict = iframeDocument.F;
  while (i--) delete createDict[PROTOTYPE][enumBugKeys[i]];
  return createDict();
};

module.exports = Object.create || function create(O, Properties) {
  var result;
  if (O !== null) {
    Empty[PROTOTYPE] = anObject(O);
    result = new Empty();
    Empty[PROTOTYPE] = null;
    // add "__proto__" for Object.getPrototypeOf polyfill
    result[IE_PROTO] = O;
  } else result = createDict();
  return Properties === undefined ? result : dPs(result, Properties);
};


/***/ }),

/***/ "a745":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("f410");

/***/ }),

/***/ "aa77":
/***/ (function(module, exports, __webpack_require__) {

var $export = __webpack_require__("5ca1");
var defined = __webpack_require__("be13");
var fails = __webpack_require__("79e5");
var spaces = __webpack_require__("fdef");
var space = '[' + spaces + ']';
var non = '\u200b\u0085';
var ltrim = RegExp('^' + space + space + '*');
var rtrim = RegExp(space + space + '*$');

var exporter = function (KEY, exec, ALIAS) {
  var exp = {};
  var FORCE = fails(function () {
    return !!spaces[KEY]() || non[KEY]() != non;
  });
  var fn = exp[KEY] = FORCE ? exec(trim) : spaces[KEY];
  if (ALIAS) exp[ALIAS] = fn;
  $export($export.P + $export.F * FORCE, 'String', exp);
};

// 1 -> String#trimLeft
// 2 -> String#trimRight
// 3 -> String#trim
var trim = exporter.trim = function (string, TYPE) {
  string = String(defined(string));
  if (TYPE & 1) string = string.replace(ltrim, '');
  if (TYPE & 2) string = string.replace(rtrim, '');
  return string;
};

module.exports = exporter;


/***/ }),

/***/ "ac6a":
/***/ (function(module, exports, __webpack_require__) {

var $iterators = __webpack_require__("cadf");
var getKeys = __webpack_require__("0d58");
var redefine = __webpack_require__("2aba");
var global = __webpack_require__("7726");
var hide = __webpack_require__("32e9");
var Iterators = __webpack_require__("84f2");
var wks = __webpack_require__("2b4c");
var ITERATOR = wks('iterator');
var TO_STRING_TAG = wks('toStringTag');
var ArrayValues = Iterators.Array;

var DOMIterables = {
  CSSRuleList: true, // TODO: Not spec compliant, should be false.
  CSSStyleDeclaration: false,
  CSSValueList: false,
  ClientRectList: false,
  DOMRectList: false,
  DOMStringList: false,
  DOMTokenList: true,
  DataTransferItemList: false,
  FileList: false,
  HTMLAllCollection: false,
  HTMLCollection: false,
  HTMLFormElement: false,
  HTMLSelectElement: false,
  MediaList: true, // TODO: Not spec compliant, should be false.
  MimeTypeArray: false,
  NamedNodeMap: false,
  NodeList: true,
  PaintRequestList: false,
  Plugin: false,
  PluginArray: false,
  SVGLengthList: false,
  SVGNumberList: false,
  SVGPathSegList: false,
  SVGPointList: false,
  SVGStringList: false,
  SVGTransformList: false,
  SourceBufferList: false,
  StyleSheetList: true, // TODO: Not spec compliant, should be false.
  TextTrackCueList: false,
  TextTrackList: false,
  TouchList: false
};

for (var collections = getKeys(DOMIterables), i = 0; i < collections.length; i++) {
  var NAME = collections[i];
  var explicit = DOMIterables[NAME];
  var Collection = global[NAME];
  var proto = Collection && Collection.prototype;
  var key;
  if (proto) {
    if (!proto[ITERATOR]) hide(proto, ITERATOR, ArrayValues);
    if (!proto[TO_STRING_TAG]) hide(proto, TO_STRING_TAG, NAME);
    Iterators[NAME] = ArrayValues;
    if (explicit) for (key in $iterators) if (!proto[key]) redefine(proto, key, $iterators[key], true);
  }
}


/***/ }),

/***/ "aebd":
/***/ (function(module, exports) {

module.exports = function (bitmap, value) {
  return {
    enumerable: !(bitmap & 1),
    configurable: !(bitmap & 2),
    writable: !(bitmap & 4),
    value: value
  };
};


/***/ }),

/***/ "afcf":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "b0dc":
/***/ (function(module, exports, __webpack_require__) {

// call something on iterator step with safe closing on error
var anObject = __webpack_require__("e4ae");
module.exports = function (iterator, fn, value, entries) {
  try {
    return entries ? fn(anObject(value)[0], value[1]) : fn(value);
  // 7.4.6 IteratorClose(iterator, completion)
  } catch (e) {
    var ret = iterator['return'];
    if (ret !== undefined) anObject(ret.call(iterator));
    throw e;
  }
};


/***/ }),

/***/ "b447":
/***/ (function(module, exports, __webpack_require__) {

// 7.1.15 ToLength
var toInteger = __webpack_require__("3a38");
var min = Math.min;
module.exports = function (it) {
  return it > 0 ? min(toInteger(it), 0x1fffffffffffff) : 0; // pow(2, 53) - 1 == 9007199254740991
};


/***/ }),

/***/ "b8e3":
/***/ (function(module, exports) {

module.exports = true;


/***/ }),

/***/ "be13":
/***/ (function(module, exports) {

// 7.2.1 RequireObjectCoercible(argument)
module.exports = function (it) {
  if (it == undefined) throw TypeError("Can't call method on  " + it);
  return it;
};


/***/ }),

/***/ "c366":
/***/ (function(module, exports, __webpack_require__) {

// false -> Array#indexOf
// true  -> Array#includes
var toIObject = __webpack_require__("6821");
var toLength = __webpack_require__("9def");
var toAbsoluteIndex = __webpack_require__("77f1");
module.exports = function (IS_INCLUDES) {
  return function ($this, el, fromIndex) {
    var O = toIObject($this);
    var length = toLength(O.length);
    var index = toAbsoluteIndex(fromIndex, length);
    var value;
    // Array#includes uses SameValueZero equality algorithm
    // eslint-disable-next-line no-self-compare
    if (IS_INCLUDES && el != el) while (length > index) {
      value = O[index++];
      // eslint-disable-next-line no-self-compare
      if (value != value) return true;
    // Array#indexOf ignores holes, Array#includes - not
    } else for (;length > index; index++) if (IS_INCLUDES || index in O) {
      if (O[index] === el) return IS_INCLUDES || index || 0;
    } return !IS_INCLUDES && -1;
  };
};


/***/ }),

/***/ "c367":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var addToUnscopables = __webpack_require__("8436");
var step = __webpack_require__("50ed");
var Iterators = __webpack_require__("481b");
var toIObject = __webpack_require__("36c3");

// 22.1.3.4 Array.prototype.entries()
// 22.1.3.13 Array.prototype.keys()
// 22.1.3.29 Array.prototype.values()
// 22.1.3.30 Array.prototype[@@iterator]()
module.exports = __webpack_require__("30f1")(Array, 'Array', function (iterated, kind) {
  this._t = toIObject(iterated); // target
  this._i = 0;                   // next index
  this._k = kind;                // kind
// 22.1.5.2.1 %ArrayIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var kind = this._k;
  var index = this._i++;
  if (!O || index >= O.length) {
    this._t = undefined;
    return step(1);
  }
  if (kind == 'keys') return step(0, index);
  if (kind == 'values') return step(0, O[index]);
  return step(0, [index, O[index]]);
}, 'values');

// argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
Iterators.Arguments = Iterators.Array;

addToUnscopables('keys');
addToUnscopables('values');
addToUnscopables('entries');


/***/ }),

/***/ "c3a1":
/***/ (function(module, exports, __webpack_require__) {

// 19.1.2.14 / 15.2.3.14 Object.keys(O)
var $keys = __webpack_require__("e6f3");
var enumBugKeys = __webpack_require__("1691");

module.exports = Object.keys || function keys(O) {
  return $keys(O, enumBugKeys);
};


/***/ }),

/***/ "c5f6":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var global = __webpack_require__("7726");
var has = __webpack_require__("69a8");
var cof = __webpack_require__("2d95");
var inheritIfRequired = __webpack_require__("5dbc");
var toPrimitive = __webpack_require__("6a99");
var fails = __webpack_require__("79e5");
var gOPN = __webpack_require__("9093").f;
var gOPD = __webpack_require__("11e9").f;
var dP = __webpack_require__("86cc").f;
var $trim = __webpack_require__("aa77").trim;
var NUMBER = 'Number';
var $Number = global[NUMBER];
var Base = $Number;
var proto = $Number.prototype;
// Opera ~12 has broken Object#toString
var BROKEN_COF = cof(__webpack_require__("2aeb")(proto)) == NUMBER;
var TRIM = 'trim' in String.prototype;

// 7.1.3 ToNumber(argument)
var toNumber = function (argument) {
  var it = toPrimitive(argument, false);
  if (typeof it == 'string' && it.length > 2) {
    it = TRIM ? it.trim() : $trim(it, 3);
    var first = it.charCodeAt(0);
    var third, radix, maxCode;
    if (first === 43 || first === 45) {
      third = it.charCodeAt(2);
      if (third === 88 || third === 120) return NaN; // Number('+0x1') should be NaN, old V8 fix
    } else if (first === 48) {
      switch (it.charCodeAt(1)) {
        case 66: case 98: radix = 2; maxCode = 49; break; // fast equal /^0b[01]+$/i
        case 79: case 111: radix = 8; maxCode = 55; break; // fast equal /^0o[0-7]+$/i
        default: return +it;
      }
      for (var digits = it.slice(2), i = 0, l = digits.length, code; i < l; i++) {
        code = digits.charCodeAt(i);
        // parseInt parses a string to a first unavailable symbol
        // but ToNumber should return NaN if a string contains unavailable symbols
        if (code < 48 || code > maxCode) return NaN;
      } return parseInt(digits, radix);
    }
  } return +it;
};

if (!$Number(' 0o1') || !$Number('0b1') || $Number('+0x1')) {
  $Number = function Number(value) {
    var it = arguments.length < 1 ? 0 : value;
    var that = this;
    return that instanceof $Number
      // check on 1..constructor(foo) case
      && (BROKEN_COF ? fails(function () { proto.valueOf.call(that); }) : cof(that) != NUMBER)
        ? inheritIfRequired(new Base(toNumber(it)), that, $Number) : toNumber(it);
  };
  for (var keys = __webpack_require__("9e1e") ? gOPN(Base) : (
    // ES3:
    'MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,' +
    // ES6 (in case, if modules with ES6 Number statics required before):
    'EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,' +
    'MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger'
  ).split(','), j = 0, key; keys.length > j; j++) {
    if (has(Base, key = keys[j]) && !has($Number, key)) {
      dP($Number, key, gOPD(Base, key));
    }
  }
  $Number.prototype = proto;
  proto.constructor = $Number;
  __webpack_require__("2aba")(global, NUMBER, $Number);
}


/***/ }),

/***/ "c69a":
/***/ (function(module, exports, __webpack_require__) {

module.exports = !__webpack_require__("9e1e") && !__webpack_require__("79e5")(function () {
  return Object.defineProperty(__webpack_require__("230e")('div'), 'a', { get: function () { return 7; } }).a != 7;
});


/***/ }),

/***/ "c8bb":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("54a1");

/***/ }),

/***/ "ca5a":
/***/ (function(module, exports) {

var id = 0;
var px = Math.random();
module.exports = function (key) {
  return 'Symbol('.concat(key === undefined ? '' : key, ')_', (++id + px).toString(36));
};


/***/ }),

/***/ "cadf":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var addToUnscopables = __webpack_require__("9c6c");
var step = __webpack_require__("d53b");
var Iterators = __webpack_require__("84f2");
var toIObject = __webpack_require__("6821");

// 22.1.3.4 Array.prototype.entries()
// 22.1.3.13 Array.prototype.keys()
// 22.1.3.29 Array.prototype.values()
// 22.1.3.30 Array.prototype[@@iterator]()
module.exports = __webpack_require__("01f9")(Array, 'Array', function (iterated, kind) {
  this._t = toIObject(iterated); // target
  this._i = 0;                   // next index
  this._k = kind;                // kind
// 22.1.5.2.1 %ArrayIteratorPrototype%.next()
}, function () {
  var O = this._t;
  var kind = this._k;
  var index = this._i++;
  if (!O || index >= O.length) {
    this._t = undefined;
    return step(1);
  }
  if (kind == 'keys') return step(0, index);
  if (kind == 'values') return step(0, O[index]);
  return step(0, [index, O[index]]);
}, 'values');

// argumentsList[@@iterator] is %ArrayProto_values% (9.4.4.6, 9.4.4.7)
Iterators.Arguments = Iterators.Array;

addToUnscopables('keys');
addToUnscopables('values');
addToUnscopables('entries');


/***/ }),

/***/ "cb7c":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("d3f4");
module.exports = function (it) {
  if (!isObject(it)) throw TypeError(it + ' is not an object!');
  return it;
};


/***/ }),

/***/ "ce10":
/***/ (function(module, exports, __webpack_require__) {

var has = __webpack_require__("69a8");
var toIObject = __webpack_require__("6821");
var arrayIndexOf = __webpack_require__("c366")(false);
var IE_PROTO = __webpack_require__("613b")('IE_PROTO');

module.exports = function (object, names) {
  var O = toIObject(object);
  var i = 0;
  var result = [];
  var key;
  for (key in O) if (key != IE_PROTO) has(O, key) && result.push(key);
  // Don't enum bug & hidden keys
  while (names.length > i) if (has(O, key = names[i++])) {
    ~arrayIndexOf(result, key) || result.push(key);
  }
  return result;
};


/***/ }),

/***/ "d2d5":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("1654");
__webpack_require__("549b");
module.exports = __webpack_require__("584a").Array.from;


/***/ }),

/***/ "d3f4":
/***/ (function(module, exports) {

module.exports = function (it) {
  return typeof it === 'object' ? it !== null : typeof it === 'function';
};


/***/ }),

/***/ "d53b":
/***/ (function(module, exports) {

module.exports = function (done, value) {
  return { value: value, done: !!done };
};


/***/ }),

/***/ "d864":
/***/ (function(module, exports, __webpack_require__) {

// optional / simple context binding
var aFunction = __webpack_require__("79aa");
module.exports = function (fn, that, length) {
  aFunction(fn);
  if (that === undefined) return fn;
  switch (length) {
    case 1: return function (a) {
      return fn.call(that, a);
    };
    case 2: return function (a, b) {
      return fn.call(that, a, b);
    };
    case 3: return function (a, b, c) {
      return fn.call(that, a, b, c);
    };
  }
  return function (/* ...args */) {
    return fn.apply(that, arguments);
  };
};


/***/ }),

/***/ "d8e8":
/***/ (function(module, exports) {

module.exports = function (it) {
  if (typeof it != 'function') throw TypeError(it + ' is not a function!');
  return it;
};


/***/ }),

/***/ "d9f6":
/***/ (function(module, exports, __webpack_require__) {

var anObject = __webpack_require__("e4ae");
var IE8_DOM_DEFINE = __webpack_require__("794b");
var toPrimitive = __webpack_require__("1bc3");
var dP = Object.defineProperty;

exports.f = __webpack_require__("8e60") ? Object.defineProperty : function defineProperty(O, P, Attributes) {
  anObject(O);
  P = toPrimitive(P, true);
  anObject(Attributes);
  if (IE8_DOM_DEFINE) try {
    return dP(O, P, Attributes);
  } catch (e) { /* empty */ }
  if ('get' in Attributes || 'set' in Attributes) throw TypeError('Accessors not supported!');
  if ('value' in Attributes) O[P] = Attributes.value;
  return O;
};


/***/ }),

/***/ "dbdb":
/***/ (function(module, exports, __webpack_require__) {

var core = __webpack_require__("584a");
var global = __webpack_require__("e53d");
var SHARED = '__core-js_shared__';
var store = global[SHARED] || (global[SHARED] = {});

(module.exports = function (key, value) {
  return store[key] || (store[key] = value !== undefined ? value : {});
})('versions', []).push({
  version: core.version,
  mode: __webpack_require__("b8e3") ? 'pure' : 'global',
  copyright: '© 2019 Denis Pushkarev (zloirock.ru)'
});


/***/ }),

/***/ "e11e":
/***/ (function(module, exports) {

// IE 8- don't enum bug keys
module.exports = (
  'constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf'
).split(',');


/***/ }),

/***/ "e4ae":
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__("f772");
module.exports = function (it) {
  if (!isObject(it)) throw TypeError(it + ' is not an object!');
  return it;
};


/***/ }),

/***/ "e53d":
/***/ (function(module, exports) {

// https://github.com/zloirock/core-js/issues/86#issuecomment-115759028
var global = module.exports = typeof window != 'undefined' && window.Math == Math
  ? window : typeof self != 'undefined' && self.Math == Math ? self
  // eslint-disable-next-line no-new-func
  : Function('return this')();
if (typeof __g == 'number') __g = global; // eslint-disable-line no-undef


/***/ }),

/***/ "e6f3":
/***/ (function(module, exports, __webpack_require__) {

var has = __webpack_require__("07e3");
var toIObject = __webpack_require__("36c3");
var arrayIndexOf = __webpack_require__("5b4e")(false);
var IE_PROTO = __webpack_require__("5559")('IE_PROTO');

module.exports = function (object, names) {
  var O = toIObject(object);
  var i = 0;
  var result = [];
  var key;
  for (key in O) if (key != IE_PROTO) has(O, key) && result.push(key);
  // Don't enum bug & hidden keys
  while (names.length > i) if (has(O, key = names[i++])) {
    ~arrayIndexOf(result, key) || result.push(key);
  }
  return result;
};


/***/ }),

/***/ "f1ae":
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $defineProperty = __webpack_require__("86cc");
var createDesc = __webpack_require__("4630");

module.exports = function (object, index, value) {
  if (index in object) $defineProperty.f(object, index, createDesc(0, value));
  else object[index] = value;
};


/***/ }),

/***/ "f410":
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("1af6");
module.exports = __webpack_require__("584a").Array.isArray;


/***/ }),

/***/ "f6fd":
/***/ (function(module, exports) {

// document.currentScript polyfill by Adam Miller

// MIT license

(function(document){
  var currentScript = "currentScript",
      scripts = document.getElementsByTagName('script'); // Live NodeList collection

  // If browser needs currentScript polyfill, add get currentScript() to the document object
  if (!(currentScript in document)) {
    Object.defineProperty(document, currentScript, {
      get: function(){

        // IE 6-10 supports script readyState
        // IE 10+ support stack trace
        try { throw new Error(); }
        catch (err) {

          // Find the second match for the "at" string to get file src url from stack.
          // Specifically works with the format of stack traces in IE.
          var i, res = ((/.*at [^\(]*\((.*):.+:.+\)$/ig).exec(err.stack) || [false])[1];

          // For all scripts on the page, if src matches or if ready state is interactive, return the script tag
          for(i in scripts){
            if(scripts[i].src == res || scripts[i].readyState == "interactive"){
              return scripts[i];
            }
          }

          // If no match, return null
          return null;
        }
      }
    });
  }
})(document);


/***/ }),

/***/ "f772":
/***/ (function(module, exports) {

module.exports = function (it) {
  return typeof it === 'object' ? it !== null : typeof it === 'function';
};


/***/ }),

/***/ "fa5b":
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("5537")('native-function-to-string', Function.toString);


/***/ }),

/***/ "fab2":
/***/ (function(module, exports, __webpack_require__) {

var document = __webpack_require__("7726").document;
module.exports = document && document.documentElement;


/***/ }),

/***/ "fae3":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/@vue/cli-service/lib/commands/build/setPublicPath.js
// This file is imported into lib/wc client bundles.

if (typeof window !== 'undefined') {
  if (true) {
    __webpack_require__("f6fd")
  }

  var setPublicPath_i
  if ((setPublicPath_i = window.document.currentScript) && (setPublicPath_i = setPublicPath_i.src.match(/(.+\/)[^/]+\.js(\?.*)?$/))) {
    __webpack_require__.p = setPublicPath_i[1] // eslint-disable-line
  }
}

// Indicate to webpack that this file can be concatenated
/* harmony default export */ var setPublicPath = (null);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"434969b0-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/pug-plain-loader!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/vueperslides/vueperslides.vue?vue&type=template&id=63801c5d&lang=pug&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{ref:"vueperslides",staticClass:"vueperslides",class:_vm.vueperslidesClasses,style:(_vm.vueperStyles),attrs:{"aria-label":"Slideshow"}},[(_vm.conf.slideContentOutside === 'top')?_c('div',{staticClass:"vueperslide__content-wrapper vueperslide__content-wrapper--outside-top",class:_vm.conf.slideContentOutsideClass},[(_vm.slides.count)?_c('div',{staticClass:"vueperslide__title",domProps:{"innerHTML":_vm._s(_vm.getCurrentSlideData('title'))}}):_vm._e(),(_vm.slides.count)?_c('div',{staticClass:"vueperslide__content",domProps:{"innerHTML":_vm._s(_vm.getCurrentSlideData('content'))}}):_vm._e()]):_vm._e(),_c('div',{staticClass:"vueperslides__inner"},[_c('div',{staticClass:"vueperslides__parallax-wrapper",style:('padding-bottom:' + (_vm.conf.slideRatio * 100) + '%'),attrs:{"aria-live":"polite"}},[_c('div',{ref:"track",staticClass:"vueperslides__track",class:{ 'vueperslides__track--dragging': _vm.touch.dragging, 'vueperslides__track--mousedown': _vm.mouseDown },style:(_vm.trackStyles)},[_c('div',{staticClass:"vueperslides__track-inner",style:(_vm.trackInnerStyles)},[(_vm.slides.count && _vm.clones[0])?_c('vueper-slide',{staticClass:"vueperslide--clone",style:(_vm.clones[0].style),attrs:{"clone":0,"title":_vm.clones[0].title,"content":_vm.clones[0].content,"image":_vm.clones[0].image,"aria-hidden":"true"}},[(_vm.clones[0].titleSlot)?_c('div',{attrs:{"slot":"slideTitle"},domProps:{"innerHTML":_vm._s(_vm.clones[0].titleSlot)},slot:"slideTitle"}):_vm._e(),(_vm.clones[0].contentSlot)?_c('div',{attrs:{"slot":"slideContent"},domProps:{"innerHTML":_vm._s(_vm.clones[0].contentSlot)},slot:"slideContent"}):_vm._e()]):_vm._e(),_vm._t("default",null,{"currentSlide":_vm.slides.current}),(_vm.slides.count && _vm.clones[1])?_c('vueper-slide',{staticClass:"vueperslide--clone",style:(_vm.clones[1].style),attrs:{"clone":1,"title":_vm.clones[1].title,"content":_vm.clones[1].content,"image":_vm.clones[1].image,"aria-hidden":"true"}},[(_vm.clones[1].titleSlot)?_c('div',{attrs:{"slot":"slideTitle"},domProps:{"innerHTML":_vm._s(_vm.clones[1].titleSlot)},slot:"slideTitle"}):_vm._e(),(_vm.clones[1].contentSlot)?_c('div',{attrs:{"slot":"slideContent"},domProps:{"innerHTML":_vm._s(_vm.clones[1].contentSlot)},slot:"slideContent"}):_vm._e()]):_vm._e()],2)])]),(_vm.$slots.pausedIcon)?_c('div',{staticClass:"vueperslides__paused"},[_vm._t("pausedIcon")],2):_vm._e(),(_vm.conf.arrows && _vm.slides.count > 1 && !_vm.disable)?_c('div',{staticClass:"vueperslides__arrows",class:{ 'vueperslides__arrows--outside': _vm.conf.arrowsOutside }},[_c('button',{directives:[{name:"show",rawName:"v-show",value:(!_vm.arrowPrevDisabled),expression:"!arrowPrevDisabled"}],staticClass:"vueperslides__arrow vueperslides__arrow--prev",attrs:{"aria-label":"Previous"},on:{"click":function($event){return _vm.previous()},"keyup":[function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"left",37,$event.key,["Left","ArrowLeft"])){ return null; }if('button' in $event && $event.button !== 0){ return null; }return _vm.previous()},function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"right",39,$event.key,["Right","ArrowRight"])){ return null; }if('button' in $event && $event.button !== 2){ return null; }return _vm.next()}]}},[_vm._t("arrowLeft",[_c('svg',{attrs:{"viewBox":"0 0 24 24"}},[_c('path',{attrs:{"d":"M16.2,21c0.3,0,0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L9.6,12L17,4.7c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L6.8,12l8.8,8.7C15.7,20.9,16,21,16.2,21z"}})])])],2),_c('button',{directives:[{name:"show",rawName:"v-show",value:(!_vm.arrowNextDisabled),expression:"!arrowNextDisabled"}],staticClass:"vueperslides__arrow vueperslides__arrow--next",attrs:{"aria-label":"Next"},on:{"click":function($event){return _vm.next()},"keyup":[function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"left",37,$event.key,["Left","ArrowLeft"])){ return null; }if('button' in $event && $event.button !== 0){ return null; }return _vm.previous()},function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"right",39,$event.key,["Right","ArrowRight"])){ return null; }if('button' in $event && $event.button !== 2){ return null; }return _vm.next()}]}},[_vm._t("arrowRight",[_c('svg',{attrs:{"viewBox":"0 0 24 24"}},[_c('path',{attrs:{"d":"M7.8,21c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l7.4-7.3L7,4.7c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l8.8,8.7l-8.8,8.7C8.3,20.9,8,21,7.8,21z"}})])])],2)]):_vm._e(),(_vm.conf.bullets && _vm.slides.count > 1 && !_vm.disable && !_vm.conf.bulletsOutside)?_c('div',{staticClass:"vueperslides__bullets",attrs:{"role":"tablist","aria-label":"Slideshow navigation"}},_vm._l((Math.ceil(_vm.slides.count / _vm.conf.slideMultiple)),function(item,i){return _c('button',{key:i,ref:"bullet",refInFor:true,staticClass:"vueperslides__bullet",class:{ 'vueperslides__bullet--active': _vm.slides.current === i * _vm.conf.slideMultiple },attrs:{"role":"tab","aria-label":("Slide " + (i + 1))},on:{"click":function($event){return _vm.goToSlide(i * _vm.conf.slideMultiple)},"keyup":[function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"left",37,$event.key,["Left","ArrowLeft"])){ return null; }if('button' in $event && $event.button !== 0){ return null; }return _vm.previous()},function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"right",39,$event.key,["Right","ArrowRight"])){ return null; }if('button' in $event && $event.button !== 2){ return null; }return _vm.next()}]}},[_c('span',[_vm._v(_vm._s(i + 1))])])}),0):_vm._e()]),(_vm.conf.bullets && _vm.slides.count > 1 && !_vm.disable && _vm.conf.bulletsOutside)?_c('div',{staticClass:"vueperslides__bullets vueperslides__bullets--outside",attrs:{"role":"tablist","aria-label":"Slideshow navigation"}},_vm._l((Math.ceil(_vm.slides.count / _vm.conf.slideMultiple)),function(item,i){return _c('button',{key:i,ref:"bullet",refInFor:true,staticClass:"vueperslides__bullet",class:{ 'vueperslides__bullet--active': _vm.slides.current === i * _vm.conf.slideMultiple },attrs:{"role":"tab","aria-label":("Slide " + (i + 1))},on:{"click":function($event){return _vm.goToSlide(i * _vm.conf.slideMultiple)},"keyup":[function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"left",37,$event.key,["Left","ArrowLeft"])){ return null; }if('button' in $event && $event.button !== 0){ return null; }return _vm.previous()},function($event){if(!$event.type.indexOf('key')&&_vm._k($event.keyCode,"right",39,$event.key,["Right","ArrowRight"])){ return null; }if('button' in $event && $event.button !== 2){ return null; }return _vm.next()}]}},[_c('span',[_vm._v(_vm._s(i + 1))])])}),0):_vm._e(),(_vm.conf.slideContentOutside === 'bottom')?_c('div',{staticClass:"vueperslide__content-wrapper vueperslide__content-wrapper--outside-bottom",class:_vm.conf.slideContentOutsideClass},[(_vm.slides.count)?_c('div',{staticClass:"vueperslide__title",domProps:{"innerHTML":_vm._s(_vm.getCurrentSlideData('title'))}}):_vm._e(),(_vm.slides.count)?_c('div',{staticClass:"vueperslide__content",domProps:{"innerHTML":_vm._s(_vm.getCurrentSlideData('content'))}}):_vm._e()]):_vm._e()])}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/components/vueperslides/vueperslides.vue?vue&type=template&id=63801c5d&lang=pug&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es7.object.get-own-property-descriptors.js
var es7_object_get_own_property_descriptors = __webpack_require__("8e6e");

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/object/define-property.js
var define_property = __webpack_require__("85f2");
var define_property_default = /*#__PURE__*/__webpack_require__.n(define_property);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/defineProperty.js

function _defineProperty(obj, key, value) {
  if (key in obj) {
    define_property_default()(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}
// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/array/is-array.js
var is_array = __webpack_require__("a745");
var is_array_default = /*#__PURE__*/__webpack_require__.n(is_array);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/arrayWithoutHoles.js

function _arrayWithoutHoles(arr) {
  if (is_array_default()(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
}
// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/array/from.js
var from = __webpack_require__("774e");
var from_default = /*#__PURE__*/__webpack_require__.n(from);

// EXTERNAL MODULE: ./node_modules/@babel/runtime-corejs2/core-js/is-iterable.js
var is_iterable = __webpack_require__("c8bb");
var is_iterable_default = /*#__PURE__*/__webpack_require__.n(is_iterable);

// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/iterableToArray.js


function _iterableToArray(iter) {
  if (is_iterable_default()(Object(iter)) || Object.prototype.toString.call(iter) === "[object Arguments]") return from_default()(iter);
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/nonIterableSpread.js
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}
// CONCATENATED MODULE: ./node_modules/@babel/runtime-corejs2/helpers/esm/toConsumableArray.js



function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}
// EXTERNAL MODULE: ./node_modules/core-js/modules/es6.array.sort.js
var es6_array_sort = __webpack_require__("55dd");

// EXTERNAL MODULE: ./node_modules/core-js/modules/web.dom.iterable.js
var web_dom_iterable = __webpack_require__("ac6a");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es6.object.keys.js
var es6_object_keys = __webpack_require__("456d");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es6.number.constructor.js
var es6_number_constructor = __webpack_require__("c5f6");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"434969b0-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/pug-plain-loader!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/vueperslides/vueperslide.vue?vue&type=template&id=321a7504&lang=pug&
var vueperslidevue_type_template_id_321a7504_lang_pug_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c(_vm.link ? 'a' : 'div',{tag:"div",staticClass:"vueperslide",class:{ 'vueperslide--active': _vm.$parent.slides.activeUid === _vm._uid, 'vueperslide--previous-slide': _vm.isPreviousSlide, 'vueperslide--next-slide': _vm.isNextSlide, 'vueperslide--visible': _vm.isSlideVisible },style:(_vm.wrapperStyles),attrs:{"href":_vm.link && !_vm.justDragged ? _vm.link : false,"face":_vm.slideFace3d,"aria-hidden":_vm.$parent.slides.activeUid === _vm._uid || _vm.isSlideVisible ? 'false' : 'true'},on:{"mouseenter":function($event){return _vm.$emit('mouseenter', { index: _vm.index, title: _vm.title, content: _vm.content, image: _vm.image, link: _vm.link }, _vm.$el)},"mouseleave":function($event){return _vm.$emit('mouseleave')}}},[(_vm.image && _vm.$parent.conf.slideImageInside)?_c('div',{staticClass:"vueperslide__image",style:(_vm.imageStyles)}):_vm._e(),_c('div',{directives:[{name:"show",rawName:"v-show",value:(!_vm.$parent.conf.slideContentOutside && (_vm.title || _vm.hasTitleSlotData || _vm.content || _vm.hasContentSlotData)),expression:"!$parent.conf.slideContentOutside && (title || hasTitleSlotData || content || hasContentSlotData)"}],staticClass:"vueperslide__content-wrapper"},[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.title || _vm.hasTitleSlotData),expression:"title || hasTitleSlotData"}],staticClass:"vueperslide__title"},[_c('div',{directives:[{name:"show",rawName:"v-show",value:(!_vm.$parent.conf.slideContentOutside && !_vm.title),expression:"!$parent.conf.slideContentOutside && !title"}]},[_vm._t("slideTitle")],2),(_vm.title)?_c('div',{domProps:{"innerHTML":_vm._s(_vm.title)}}):_vm._e()]),(_vm.content || _vm.hasContentSlotData)?_c('div',{staticClass:"vueperslide__content"},[_c('div',{directives:[{name:"show",rawName:"v-show",value:(!_vm.$parent.conf.slideContentOutside && !_vm.content),expression:"!$parent.conf.slideContentOutside && !content"}]},[_vm._t("slideContent")],2),(_vm.content)?_c('div',{domProps:{"innerHTML":_vm._s(_vm.content)}}):_vm._e()]):_vm._e()])])}
var vueperslidevue_type_template_id_321a7504_lang_pug_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/vueperslides/vueperslide.vue?vue&type=template&id=321a7504&lang=pug&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/vueperslides/vueperslide.vue?vue&type=script&lang=js&






function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

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
/* harmony default export */ var vueperslidevue_type_script_lang_js_ = ({
  props: {
    clone: {
      type: Number,
      default: null
    },
    image: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    },
    content: {
      type: String,
      default: ''
    },
    link: {
      type: String,
      default: ''
    }
  },
  data: function data() {
    return {
      index: 0
    };
  },
  created: function created() {
    // vueperslide component has this useful attributes:
    // _uid, image, title, titleSlot, content, contentSlot, clone.
    this.index = this.$parent.addSlide(this);
  },
  // When removing a slide programmatically, remove it from the config so vueperslides
  // component is aware of the change.
  destroyed: function destroyed() {
    if (this.clone === null) this.$parent.removeSlide(this._uid);
  },
  computed: {
    wrapperStyles: function wrapperStyles() {
      return _objectSpread({}, !this.$parent.conf.slideImageInside && this.image && {
        backgroundImage: "url(\"".concat(this.image, "\")")
      }, {}, this.$parent.conf.visibleSlides > 1 && {
        width: 100 / this.$parent.conf.visibleSlides + '%'
      }, {}, this.$parent.conf.visibleSlides > 1 && this.$parent.conf.fade && {
        left: this.slideIndex % this.$parent.conf.visibleSlides / this.$parent.conf.visibleSlides * 100 + '%'
      });
    },
    imageStyles: function imageStyles() {
      return _objectSpread({}, this.$parent.conf.slideImageInside && this.image && {
        backgroundImage: "url(\"".concat(this.image, "\")")
      });
    },
    hasTitleSlotData: function hasTitleSlotData() {
      var slideTitle = this.$slots.slideTitle;
      return slideTitle !== undefined;
    },
    hasContentSlotData: function hasContentSlotData() {
      var slideContent = this.$slots.slideContent;
      return slideContent !== undefined;
    },
    slideFace3d: function slideFace3d() {
      if (!this.$parent.conf['3d']) return false;
      var faces = ['front', 'right', 'back', 'left'];
      var slidesCount = this.$parent.slides.list.length;
      var prevSlideIndex = (this.$parent.slides.current - 1 + slidesCount) % slidesCount;
      var nextSlideIndex = (this.$parent.slides.current + 1) % slidesCount; // Index starts at 1 so this.index-1.

      if (this.index - 1 === prevSlideIndex) return faces[(4 + this.$parent.slides.current - 1) % 4];else if (this.index - 1 === nextSlideIndex) return faces[(this.$parent.slides.current + 1) % 4];
      return faces[(this.index - 1) % 4];
    },
    isPreviousSlide: function isPreviousSlide() {
      if (!this.$parent.conf['3d']) return false;
      var slidesCount = this.$parent.slides.list.length;
      var prevSlideIndex = (this.$parent.slides.current - 1 + slidesCount) % slidesCount;
      return this._uid === this.$parent.slides.list[prevSlideIndex]._uid;
    },
    isNextSlide: function isNextSlide() {
      if (!this.$parent.conf['3d']) return false;
      var slidesCount = this.$parent.slides.list.length;
      var nextSlideIndex = (this.$parent.slides.current + 1) % slidesCount;
      return this._uid === this.$parent.slides.list[nextSlideIndex]._uid;
    },
    isSlideVisible: function isSlideVisible() {
      var activeSlideUid = this.$parent.slides.activeUid;
      var activeSlideIndex = this.slidesList.indexOf(activeSlideUid);
      var visibleSlidesCount = this.$parent.conf.visibleSlides;
      return this.slideIndex >= activeSlideIndex && this.slideIndex < activeSlideIndex + visibleSlidesCount;
    },
    slidesList: function slidesList() {
      return this.$parent.slides.list.map(function (slide) {
        return slide._uid;
      });
    },
    slideIndex: function slideIndex() {
      return this.slidesList.indexOf(this._uid);
    },
    justDragged: function justDragged() {
      return this.$parent.touch.justDragged;
    }
  }
});
// CONCATENATED MODULE: ./src/components/vueperslides/vueperslide.vue?vue&type=script&lang=js&
 /* harmony default export */ var vueperslides_vueperslidevue_type_script_lang_js_ = (vueperslidevue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/vueperslides/vueperslide.vue?vue&type=style&index=0&lang=scss&
var vueperslidevue_type_style_index_0_lang_scss_ = __webpack_require__("1c94");

// CONCATENATED MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}

// CONCATENATED MODULE: ./src/components/vueperslides/vueperslide.vue






/* normalize component */

var component = normalizeComponent(
  vueperslides_vueperslidevue_type_script_lang_js_,
  vueperslidevue_type_template_id_321a7504_lang_pug_render,
  vueperslidevue_type_template_id_321a7504_lang_pug_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var vueperslide = (component.exports);
// EXTERNAL MODULE: ./src/components/vueperslides/styles.scss
var styles = __webpack_require__("0b32");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/vueperslides/vueperslides.vue?vue&type=script&lang=js&








function vueperslidesvue_type_script_lang_js_ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function vueperslidesvue_type_script_lang_js_objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { vueperslidesvue_type_script_lang_js_ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { vueperslidesvue_type_script_lang_js_ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

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
//


/* harmony default export */ var vueperslidesvue_type_script_lang_js_ = ({
  name: 'vueper-slides',
  components: {
    VueperSlide: vueperslide
  },
  props: {
    initSlide: {
      type: Number,
      default: 1
    },
    slideRatio: {
      type: Number,
      default: 1 / 3
    },
    arrows: {
      type: Boolean,
      default: true
    },
    arrowsOutside: {
      type: Boolean,
      default: null
    },
    // Ability to disable arrows on slideshow edges. Only if not infinite mode.
    disableArrowsOnEdges: {
      type: [Boolean, String],
      default: false
    },
    bullets: {
      type: Boolean,
      default: true
    },
    bulletsOutside: {
      type: Boolean,
      default: null
    },
    fade: {
      type: Boolean,
      default: false
    },
    slideContentOutside: {
      type: [Boolean, String],
      default: false
    },
    slideContentOutsideClass: {
      type: String,
      default: ''
    },
    autoplay: {
      type: Boolean,
      default: false
    },
    speed: {
      type: [Number, String],
      default: 4000
    },
    transitionSpeed: {
      type: [Number, String],
      default: 600
    },
    pauseOnHover: {
      type: Boolean,
      default: true
    },
    infinite: {
      type: Boolean,
      default: true
    },
    refreshClonesOnDrag: {
      type: Boolean,
      default: false
    },
    parallax: {
      type: [Boolean, Number],
      default: false
    },
    touchable: {
      type: Boolean,
      default: true
    },
    preventYScroll: {
      type: Boolean,
      default: false
    },
    // By default when touch is enabled you have to drag from a slide side and pass 50% of slideshow width to change
    // slide. This setting changes this behavior to a horizontal pixel amount from anywhere on slideshow.
    draggingDistance: {
      type: Number,
      default: null
    },
    disable: {
      type: Boolean,
      default: false
    },
    breakpoints: {
      type: Object,
      default: function _default() {
        return {};
      }
    },
    fixedHeight: {
      type: [Boolean, String],
      default: false
    },
    slideImageInside: {
      type: Boolean,
      default: false
    },
    slideMultiple: {
      type: [Boolean, Number],
      default: false
    },
    visibleSlides: {
      type: Number,
      default: 1
    },
    '3d': {
      type: Boolean,
      default: false
    }
  },
  data: function data() {
    return {
      isReady: false,
      container: null,
      slides: {
        list: [],
        count: 0,
        activeUid: null,
        current: 0,
        focus: 0,
        // Don't loose the focused slide when changing breakpoint & slideMultiple > 1.
        clones: []
      },
      clones: [],
      mouseDown: false,
      mouseOver: false,
      touch: {
        enabled: true,
        dragging: false,
        justDragged: false,
        dragStartX: 0,
        dragNowX: 0,
        dragAmount: 0
      },
      transition: {
        currentTranslation: 0,
        speed: 0,
        animated: false
      },
      timer: null,
      arrowPrevDisabled: false,
      arrowNextDisabled: false,
      breakpointsData: {
        list: [],
        current: null
      },
      parallaxData: {
        translation: 0,
        slideshowOffsetTop: null,
        isVisible: false
      }
    };
  },
  mounted: function mounted() {
    this.init();
  },
  methods: {
    init: function init() {
      this.emit('before-init', false);
      this.container = this.$refs.vueperslides;
      this.touch.enabled = this.conf.touchable; // Store speed in extra variable because transition.speed can be set to 0,
      // then after slide change we need to reapply original speed.

      this.transition.speed = this.conf.transitionSpeed;

      if (Object.keys(this.breakpoints).length) {
        this.setBreakpointsList();
        this.setBreakpointConfig(this.getCurrentBreakpoint());
      }

      if (this.conf.infinite && this.slides.list.length) this.$nextTick(this.cloneSlides);
      this.goToSlide(this.conf.initSlide - 1);
      this.bindEvents();
      this.isReady = true;
      this.emit('ready');
    },
    // Emit a named event outside the component with 2 possible parameters:
    // current slide info & next slide info.
    emit: function emit(name) {
      var includeCurrentSlide = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      var includeNextSlide = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
      // Emit param 0 = event name string.
      var args = [name];

      if (includeCurrentSlide || typeof includeNextSlide === 'number') {
        // Emit param 1 is object like { currentSlide: ...[, nextSlide: ...] }.
        args[1] = {};

        if (includeCurrentSlide && this.slides.activeUid && this.slides.list.length) {
          args[1].currentSlide = this.getSlideData(this.slides.current);
        }

        if (typeof includeNextSlide === 'number' && this.slides.list.length) {
          var _this$getSlideInRange = this.getSlideInRange(includeNextSlide),
              nextSlideIndex = _this$getSlideInRange.nextSlide;

          args[1].nextSlide = this.getSlideData(nextSlideIndex);
        }
      }

      this.$emit.apply(this, [name].concat(args));
    },
    getSlideData: function getSlideData(index) {
      var withStyle = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var slide = this.slides.list[index];
      var _slide$$slots = slide.$slots,
          _slide$$slots$slideTi = _slide$$slots.slideTitle,
          slideTitle = _slide$$slots$slideTi === void 0 ? [{}] : _slide$$slots$slideTi,
          _slide$$slots$slideCo = _slide$$slots.slideContent,
          slideContent = _slide$$slots$slideCo === void 0 ? [{}] : _slide$$slots$slideCo;
      var _slideTitle$0$elm = slideTitle[0].elm,
          elmT = _slideTitle$0$elm === void 0 ? {} : _slideTitle$0$elm;
      var _slideContent$0$elm = slideContent[0].elm,
          elmC = _slideContent$0$elm === void 0 ? {} : _slideContent$0$elm;
      var data = {
        index: index,
        title: slide.title,
        titleSlot: elmT && elmT.innerHTML || null,
        content: slide.content,
        contentSlot: elmC && elmC.innerHTML || null,
        image: slide.image
      };

      if (withStyle) {
        var _slide$$el$attributes = slide.$el.attributes;
        _slide$$el$attributes = _slide$$el$attributes === void 0 ? {} : _slide$$el$attributes;
        var _slide$$el$attributes2 = _slide$$el$attributes.style;
        _slide$$el$attributes2 = _slide$$el$attributes2 === void 0 ? {} : _slide$$el$attributes2;
        var _slide$$el$attributes3 = _slide$$el$attributes2.value,
            value = _slide$$el$attributes3 === void 0 ? '' : _slide$$el$attributes3;
        data.style = value;
      }

      return data;
    },
    getCurrentSlideData: function getCurrentSlideData(what) {
      var _this$getSlideData = this.getSlideData(this.slides.current),
          titleSlot = _this$getSlideData.titleSlot,
          title = _this$getSlideData.title,
          contentSlot = _this$getSlideData.contentSlot,
          content = _this$getSlideData.content; // If both slot and attribute are provided use the attribute source.


      return what === 'title' ? title || titleSlot : content || contentSlot;
    },
    setBreakpointsList: function setBreakpointsList() {
      this.breakpointsData.list = [99999].concat(_toConsumableArray(Object.keys(this.breakpoints))).map(function (bp) {
        return parseInt(bp);
      }).sort(function (a, b) {
        return parseInt(b) - parseInt(a);
      });
    },
    getCurrentBreakpoint: function getCurrentBreakpoint() {
      var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      var breakpoints = [windowWidth].concat(_toConsumableArray(this.breakpointsData.list)).sort(function (a, b) {
        return parseInt(b) - parseInt(a);
      });
      return this.breakpointsData.list[breakpoints.indexOf(windowWidth) - 1];
    },
    hasBreakpointChanged: function hasBreakpointChanged(breakpoint) {
      return this.breakpointsData.current !== parseInt(breakpoint);
    },
    setBreakpointConfig: function setBreakpointConfig(breakpoint) {
      var bp = this.breakpoints && this.breakpoints[breakpoint] || {};
      var slideMultipleChanged = bp.slideMultiple !== this.conf.slideMultiple; // this.conf gets updated by itself when this.breakpointsData.current changes.

      this.breakpointsData.current = breakpoint;

      if (slideMultipleChanged) {
        this.slides.current = this.slides.focus;
        this.goToSlide(this.slides.current);
      }
    },
    cloneSlides: function cloneSlides() {
      this.clones[0] = this.getSlideData(this.slides.count - 1, true);
      this.clones[1] = this.getSlideData(0, true);
    },
    bindEvents: function bindEvents() {
      var hasTouch = 'ontouchstart' in window; // Allow mouse or touch dragging slides.

      if (this.touch.enabled) this.toggleTouchableOption(true); // Pause autoplay on mouseover.

      if (this.conf.pauseOnHover && !hasTouch && this.conf.autoplay) {
        this.container.addEventListener('mouseover', this.onMouseIn);
        this.container.addEventListener('mouseout', this.onMouseOut);
      } // Breakpoints or parallax need a resize event.


      if (this.breakpointsData.list.length || this.conf.parallax) {
        window.addEventListener('resize', this.onResize);
      } // Parallax slideshow.


      if (this.conf.parallax) {
        // First render the onload translation.
        this.refreshParallax(); // then add event listener.

        document.addEventListener('scroll', this.onScroll);
      }
    },
    // Recursively sum all the offsetTop values from current element up the tree until body.
    // By doing so a padding or margin on a parent won't cause a wrong calculation.
    getSlideshowOffsetTop: function getSlideshowOffsetTop() {
      var force = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      if (this.parallaxData.slideshowOffsetTop === null || force) {
        var el = this.container;
        var top = el.offsetTop;

        while (el = el.offsetParent) {
          top += el.offsetTop;
        }

        this.parallaxData.slideshowOffsetTop = top;
      }

      return this.parallaxData.slideshowOffsetTop;
    },
    onScroll: function onScroll() {
      var doc = document.documentElement;
      var scrollTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
      var windowHeight = window.innerHeight || doc.clientHeight || document.body.clientHeight;
      var slideshowHeight = this.container.clientHeight;
      var slideshowTopOffset = this.getSlideshowOffsetTop(); // The distance between the bottom line of the current vueperslides slideshow and top of window.
      // Negative value means the slideshow is totally above the current window box.

      var vsBottom2WinTop = slideshowTopOffset + slideshowHeight - scrollTop; // The distance between the top line of the current vueperslides slideshow and bottom of window.
      // Negative value means the slideshow is totally bellow the current window box.

      var vsTop2winBottom = windowHeight + scrollTop - slideshowTopOffset;
      this.parallaxData.isVisible = vsBottom2WinTop > 0 && vsTop2winBottom > 0; // Only apply translation when slideshow is visible.

      if (this.parallaxData.isVisible) {
        var heightToCoverWithTranslation = windowHeight + slideshowHeight;
        var percentage = vsBottom2WinTop * 100 / heightToCoverWithTranslation;
        var translatePercentage = this.conf.parallax === -1 ? 100 - percentage : percentage;
        this.parallaxData.translation = -translatePercentage / 2;
      }
    },
    onResize: function onResize() {
      if (this.breakpointsData.list.length) {
        var breakpoint = this.getCurrentBreakpoint();

        if (this.hasBreakpointChanged(breakpoint)) {
          this.setBreakpointConfig(breakpoint);
        }
      }

      if (this.conf.parallax) {
        // Only refresh parallaxData.slideshowOffsetTop value on resize for better performance.
        this.getSlideshowOffsetTop(true);
      }
    },
    onMouseIn: function onMouseIn() {
      this.mouseOver = true;

      if (this.conf.pauseOnHover && this.conf.autoplay) {
        this.clearTimer();
      }
    },
    onMouseOut: function onMouseOut() {
      this.mouseOver = false;

      if (this.conf.pauseOnHover && this.conf.autoplay) {
        this.setTimer();
      }
    },
    onMouseDown: function onMouseDown(e) {
      if (!this.touch.enabled || this.disable) return;
      if (!e.touches && this.preventYScroll) e.preventDefault(); // The clones are created with a copy of content. Refresh this content before dragging.

      if (this.conf.infinite) this.cloneSlides();
      this.mouseDown = true; // Store drag start in var for distance calculation in onMouseUp().

      this.touch.dragStartX = this.getCurrentMouseX(e);

      if (!this.conf.draggingDistance) {
        this.updateCurrentTranslation(null, this.touch.dragStartX);
      }
    },
    onMouseMove: function onMouseMove(e) {
      if (this.mouseDown || this.touch.dragging) {
        if (this.preventYScroll) e.preventDefault();
        this.mouseDown = false;
        this.touch.dragging = true; // The clones are created with a copy of content.
        // Set refreshClonesOnDrag to true if you want to keep updating clones before you see them.

        if (this.conf.refreshClonesOnDrag && this.conf.infinite) {
          this.cloneSlides();
        } // Store current drag position in var for distance calculation in onMouseUp().


        this.touch.dragNowX = this.getCurrentMouseX(e);

        if (this.conf.draggingDistance) {
          this.touch.dragAmount = this.touch.dragNowX - this.touch.dragStartX;
          var dragAmountPercentage = this.touch.dragAmount / this.container.clientWidth;
          this.updateCurrentTranslation();
          this.transition.currentTranslation += 100 * dragAmountPercentage;
        } else {
          this.updateCurrentTranslation(null, this.touch.dragNowX);
        }
      }
    },
    onMouseUp: function onMouseUp(e) {
      var _this = this;

      this.mouseDown = false; // If no mouse move there is nothing to do so don't go further.

      if (!this.touch.dragging) return this.cancelSlideChange();
      this.touch.dragging = false;
      var dragAmount = this.conf.draggingDistance ? -this.touch.dragAmount : 0; // const realCurrentSlideIndex = this.slides.current + !!this.clones.length * 1// Takes clones in account if any.

      var dragPercentageStart = (this.touch.dragStartX - this.container.offsetLeft) / this.container.clientWidth;
      var dragPercentageNow = (this.touch.dragNowX - this.container.offsetLeft) / this.container.clientWidth;
      var dragPercentage = ((dragPercentageStart < 0.5 ? 0 : 1) - dragPercentageNow) * 100;
      var forwards = (dragAmount || dragPercentage) > 0;
      var reasonsToCancelSliding = [// Dragging distance conf is set & drag amount is lesser than dragging distance conf.
      Math.abs(dragAmount) < this.conf.draggingDistance, // Dragging distance conf is not set & dragging is lesser than 50%.
      !this.conf.draggingDistance && Math.abs(dragPercentage) < 50, // arrowNext is disabled and dragging beyond last slide.
      this.arrowPrevDisabled && !this.slides.current && !forwards, // arrowPrev is disabled and dragging beyond first slide.
      this.arrowNextDisabled && this.slides.current === this.slides.count - 1 && forwards]; // If no reason to cancel sliding.

      if (reasonsToCancelSliding.indexOf(true) === -1) {
        var targetSlide = this.slides.current + this.conf.slideMultiple * (forwards ? 1 : -1);
        this.goToSlide(targetSlide);
      } else this.cancelSlideChange();

      this.touch.dragStartX = null;
      this.touch.dragNowX = null;
      this.touch.dragAmount = null; // Can be called from a click event.
      // As click event triggers after mouseup, we need a persistent variable until
      // click event triggers.

      this.touch.justDragged = true;
      setTimeout(function () {
        return _this.touch.justDragged = false;
      }, 50);
    },
    // Check if dragging just happened.
    justDragged: function justDragged() {
      return this.touch.justDragged;
    },
    // Dragging did not pass conditions to change slide, snap back to current slide.
    cancelSlideChange: function cancelSlideChange() {
      if (!this.conf.fade) {
        this.updateCurrentTranslation();
      }
    },
    getCurrentMouseX: function getCurrentMouseX(e) {
      return 'ontouchstart' in window ? e.touches[0].clientX : e.clientX;
    },

    /**
     * The translation of most cases, in other cases this can still be used as a base calc.
     */
    getBasicTranslation: function getBasicTranslation() {
      var translation = this.slides.current / this.conf.visibleSlides;
      if (this.conf.infinite) translation += 1 / this.conf.visibleSlides; // A clone is prepended to the slides track.

      return translation;
    },

    /**
     * Update the current translation of the slides track - for sliding slideshows.
     * The resulting translation will be set in percentage and negative value.
     *
     * @param {null, 0, 1} nextSlideIsClone: wheter the slide to access is a clone, and
     *                                       if so, if it's the first or last one.
     * @param {null, float} currentDragX: whether the slide track is being dragged and if so
     *                                    the value of the current drag.
     */
    updateCurrentTranslation: function updateCurrentTranslation() {
      var nextSlideIsClone = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var currentMouseX = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      // let dragging = currentMouseX
      var translation = this.getBasicTranslation();

      if (this.conf.infinite && nextSlideIsClone !== null) {
        translation = (nextSlideIsClone ? this.slides.count + 1 : 0) / this.conf.visibleSlides;
      } // If dragging.
      else if (this.touch.dragStartX && currentMouseX) {
          var dragPercentage = 0;
          var dragPercentageStart = (this.touch.dragStartX - this.container.offsetLeft) / this.container.clientWidth;
          var dragPercentageNow = (currentMouseX - this.container.offsetLeft) / this.container.clientWidth;

          if (this.conf['3d']) {
            // Prevent dragging more than 1 face away from front face,
            // So that we don't need to update faces on drag.
            var range = Math.round(dragPercentageStart) ? [0, 2] : [-1, 1];
            dragPercentageNow = Math.min(Math.max(dragPercentageNow, range[0]), range[1]);
          }

          dragPercentage = (dragPercentageStart < 0.5 ? 0 : 1) - dragPercentageNow;
          translation += dragPercentage;
        } // Special behavior if multiple visible slides and sliding 1 by 1:
      // The translation is modified as user slides just to look nicer.


      if (this.conf.visibleSlides > 1 && this.conf.slideMultiple === 1) {
        // If not inifinite sliding.
        if (!this.conf.infinite) {
          var preferredPosition = Math.ceil(this.conf.visibleSlides / 2);
          var remainingSlides = this.slides.count - (this.slides.current + 1);
          var positionsAfterPreferred = this.conf.visibleSlides - preferredPosition;
          var preferredPositionIsPassed = remainingSlides < positionsAfterPreferred;
          var slidesWOTranslation = preferredPosition - 1;
          var substractFromTranslation = Math.min(slidesWOTranslation, this.slides.current); // From next position after the preferred position.

          if (preferredPositionIsPassed) {
            substractFromTranslation += positionsAfterPreferred - remainingSlides;
          }

          translation -= substractFromTranslation / this.conf.visibleSlides;
        }
      }

      this.transition.currentTranslation = -translation * 100;
    },
    clearTimer: function clearTimer() {
      clearTimeout(this.timer);
      this.timer = 0;
    },
    setTimer: function setTimer() {
      var _this2 = this;

      this.timer = setTimeout(function () {
        _this2.goToSlide(_this2.slides.current + _this2.conf.slideMultiple, {
          autoPlaying: true
        });
      }, this.conf.speed);
    },
    previous: function previous() {
      this.goToSlide(this.slides.current - this.conf.slideMultiple);
    },
    next: function next() {
      this.goToSlide(this.slides.current + this.conf.slideMultiple);
    },
    refreshParallax: function refreshParallax() {
      var _this3 = this;

      setTimeout(function () {
        _this3.onResize();

        _this3.onScroll();
      }, 100);
    },

    /**
     * When visibleSlides > 1 and slideMultiple > 1, get the first visible slide from given index.
     *
     * @return {integer} the first visible slide index
     */
    getFirstVisibleSlide: function getFirstVisibleSlide(index) {
      return Math.floor(index / this.conf.slideMultiple) * this.conf.slideMultiple;
    },
    getSlideInRange: function getSlideInRange(index, autoPlaying) {
      var clone = null; // If infinite enabled, going out of range takes the first slide from the other end.

      if (this.conf.infinite && index === -1) clone = 0;else if (this.conf.infinite && index === this.slides.count) clone = 1; // Generic case:
      // If going beyond slides count, take the modulo as next slide index.
      // E.g. If we want to access slide 9 and there are only 6 slides, go to slide 3.
      // (index + this.slides.count) to also handle negative index.

      var newIndex = (index + this.slides.count) % this.slides.count;

      if (this.conf.slideMultiple > 1) {
        var lastSlideItems = this.slides.count % this.conf.slideMultiple || this.conf.slideMultiple;
        var missingItems = this.conf.slideMultiple - lastSlideItems;
        newIndex += index < 0 ? missingItems : 0;
        newIndex = this.getFirstVisibleSlide(newIndex); // When using slideMultiple & breakpoints, on breakpoint change if slideMultiple has
        // changed, the slideshow will snap to the current slide. but current slide is always the
        // first of visible slides so by playing around breakpoints we lose the original slide on
        // focus. this.slides.focus is here to never lose it.
        // E.g.
        // slideMultiple = 3, currentSlide = 9 (10th slide), means this is the only visible slide,
        // now change breakpoint and slideMultiple = 2, so go to slide index 8 (shows slide 9 & 10)
        // now current slide is 8. If we change back to previous breakpoint (slideMultiple = 3),
        // current slide index becomes 6! and so on.

        if (this.getFirstVisibleSlide(this.slides.focus) !== newIndex) {
          this.slides.focus = newIndex;
        }
      } // Disable sliding if already on edge with disableArrowsOnEdges.


      if (this.conf.disableArrowsOnEdges && (index < 0 || index > this.slides.count - 1) && !autoPlaying) {
        newIndex = this.slides.current;
      }

      return {
        nextSlide: newIndex,
        clone: clone
      };
    },
    goToSlide: function goToSlide(index) {
      var _this4 = this;

      var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      if (!this.slides.count || this.disable) return;
      if (this.conf.autoplay) this.clearTimer(); // animation = slide transition is animated.
      // autoPlaying = go to the next slide by autoplay - no user intervention.
      // jumping = after reaching a clone, the callback jumps back to original slide with no animation.

      var _options$animation = options.animation,
          animation = _options$animation === void 0 ? true : _options$animation,
          _options$autoPlaying = options.autoPlaying,
          autoPlaying = _options$autoPlaying === void 0 ? false : _options$autoPlaying,
          _options$jumping = options.jumping,
          jumping = _options$jumping === void 0 ? false : _options$jumping;
      this.transition.animated = animation;
      setTimeout(function () {
        return _this4.transition.animated = false;
      }, this.transitionSpeed); // Get the next slide index and whether it's a clone.

      var _this$getSlideInRange2 = this.getSlideInRange(index, autoPlaying),
          nextSlide = _this$getSlideInRange2.nextSlide,
          nextSlideIsClone = _this$getSlideInRange2.clone; // Emit event. First use of `goToSlide` is while init, so should not propagate an event.


      if (this.isReady && !jumping) {
        this.emit('before-slide', true, nextSlide); // Refresh clones.

        if (nextSlideIsClone !== null) this.cloneSlides();
      } // Disable arrows if `disableArrowsOnEdges` is on and there is no slide to go to on that end.


      if (this.conf.arrows && this.conf.disableArrowsOnEdges) {
        this.arrowPrevDisabled = nextSlide === 0 || nextSlide - this.conf.slideMultiple < 0;
        this.arrowNextDisabled = nextSlide === this.slides.count - 1 || nextSlide + this.conf.slideMultiple > this.slides.count - 1;
      } // Infinite sliding with cloned slides:
      // When reaching last slide and going next the cloned slide of the first slide
      // shows up, when the animation ends the real change to the first slide is done
      // immediately with no animation.
      // Same principle when going beyond first slide.


      if (nextSlideIsClone !== null) {
        // Gives clone id (0 or 1 or null).
        setTimeout(function () {
          // inside the callback, also check if it is not too late to apply next slide
          // (user may have slid fast multiple times) if so cancel callback.
          var passedCloneBackward = index === -1 && _this4.slides.current !== _this4.slides.count - 1;
          var passedCloneForward = index === _this4.slides.count && _this4.slides.current !== 0;
          var tooLateToSetTimeout = passedCloneBackward || passedCloneForward;

          if (!tooLateToSetTimeout) {
            _this4.transition.speed = 0;

            _this4.goToSlide(nextSlideIsClone ? 0 : _this4.slides.count - 1, {
              animation: false,
              jumping: true
            });

            setTimeout(function () {
              return _this4.transition.speed = _this4.conf.transitionSpeed;
            }, 50);
          }
        }, this.transition.speed - 50);
      }

      this.slides.current = nextSlide; // Only apply sliding transition when the slideshow animation type is `slide`.

      if (!this.conf.fade) {
        this.updateCurrentTranslation(nextSlideIsClone);
      }

      this.slides.activeUid = this.slides.list[this.slides.current]._uid;

      if (this.conf.autoplay && !this.mouseOver) {
        this.setTimer();
      }

      if (this.slides.count) {
        if (this.$slots.default[this.slides.current]) {
          // First use of goToSlide is while init, so should not propagate an event.
          if (this.isReady && !jumping) this.emit('slide');
        }

        if (this.isReady && this.conf.bullets && !autoPlaying && !jumping && this.$refs.bullet && this.$refs.bullet[this.slides.current]) {
          this.$refs.bullet[this.slides.current].focus();
        }
      }
    },
    addSlide: function addSlide(newSlide) {
      var _this5 = this;

      var needReclone = this.conf.infinite && this.isReady && newSlide.clone === null;

      if (newSlide.clone !== null) {
        this.clones[newSlide.clone] = newSlide;
      } else {
        // Add the slide in the slides array & update slides.count.
        this.slides.list.push(newSlide);
        this.slides.count = this.slides.list.length;
      }

      if (this.slides.count > 1 && this.touchable) {
        this.touch.enabled = true;
      } // cloneSlides() is called at the end of init so calling it before would be redundant.


      if (needReclone) {
        this.$nextTick(function () {
          return _this5.cloneSlides();
        });
      }

      return this.slides.list.length;
    },
    removeSlide: function removeSlide(uid) {
      var _this6 = this;

      var needReclone = false;
      this.slides.list.some(function (slide, i) {
        if (slide._uid === uid) {
          // Remove the slide.
          _this6.slides.list.splice(i, 1);

          _this6.slides.count = _this6.slides.list.length; // If the slide to remove is the current slide, slide to the previous slide.

          if (uid === _this6.slides.activeUid) {
            _this6.slides.activeUid = null;

            _this6.goToSlide(i - 1, {
              autoPlaying: true
            });
          }

          if (_this6.slides.count <= 1) {
            _this6.touch.enabled = false;
          }

          if (_this6.clones.length && _this6.isReady && !slide.clone) needReclone = true;
          return true; // Break the `Array.some` loop.
        }
      });

      if (this.slides.count && needReclone) {
        this.cloneSlides();
      }
    },
    toggleTouchableOption: function toggleTouchableOption(isTouchable) {
      var track = this.$refs.track;
      if (!track) return;
      this.touch.enabled = isTouchable;
      var hasTouch = 'ontouchstart' in window; // Touch enabled slideshow.

      if (isTouchable) {
        this.$refs.track.addEventListener(hasTouch ? 'touchstart' : 'mousedown', this.onMouseDown, {
          passive: !this.preventYScroll
        });
        document.addEventListener(hasTouch ? 'touchmove' : 'mousemove', this.onMouseMove, {
          passive: !this.preventYScroll
        });
        document.addEventListener(hasTouch ? 'touchend' : 'mouseup', this.onMouseUp, {
          passive: true
        });
      } else this.removeEventListener();
    },
    removeEventListener: function removeEventListener() {
      var hasTouch = 'ontouchstart' in window;
      this.$refs.track.removeEventListener(hasTouch ? 'touchstart' : 'mousedown', this.onMouseDown, {
        passive: !this.preventYScroll
      });
      document.removeEventListener(hasTouch ? 'touchmove' : 'mousemove', this.onMouseMove, {
        passive: !this.preventYScroll
      });
      document.removeEventListener(hasTouch ? 'touchend' : 'mouseup', this.onMouseUp, {
        passive: true
      });
    }
  },
  beforeDestroy: function beforeDestroy() {
    this.removeEventListener();
  },
  computed: {
    // this.conf needs to be reactive so user can change a Vueper Slides option and everything gets updated.
    conf: function conf() {
      // Read config from the props then check if breakpoints are defined.
      // If so override the config with the breakpoint ones.
      var conf = vueperslidesvue_type_script_lang_js_objectSpread({}, this.$props, {}, this.$props.breakpoints && this.$props.breakpoints[this.breakpointsData.current] || {}); // Overrides: once config from breakpoints is imported, we can use the conf object
      // and be sure all the options are up to date.
      // ------------------------------- //


      conf.slideMultiple = conf.slideMultiple ? conf.visibleSlides : 1;

      if (conf.fade || conf.disableArrowsOnEdges || conf.visibleSlides > 1 || conf['3d']) {
        conf.infinite = false;
      }

      conf.arrowsOutside = conf.arrowsOutside || conf.visibleSlides > 1 && conf.arrowsOutside === null;
      conf.bulletsOutside = conf.bulletsOutside || conf.visibleSlides > 1 && conf.bulletsOutside === null;
      if (this.touch.enabled !== conf.touchable) this.toggleTouchableOption(conf.touchable); // ------------------------------- //

      return conf;
    },
    vueperslidesClasses: function vueperslidesClasses() {
      return {
        'vueperslides--ready': this.isReady,
        'vueperslides--fade': this.conf.fade,
        'vueperslides--parallax': this.conf.parallax,
        'vueperslides--touchable': this.touch.enabled && !this.disable,
        'vueperslides--fixed-height': this.conf.fixedHeight,
        'vueperslides--3d': this.conf['3d'],
        'vueperslides--animated': this.transition.animated
      };
    },
    vueperStyles: function vueperStyles() {
      return /^-?\d/.test(this.conf.fixedHeight) ? "height: ".concat(this.conf.fixedHeight) : null;
    },
    trackStyles: function trackStyles() {
      var styles = {};

      if (this.conf.parallax) {
        styles.transform = "translate3d(0, ".concat(this.parallaxData.translation, "%, 0)"); // Increase browser optimizations by allocating more machine resource.
        // ! \\ To be used wisely so deactivate when not needed.

        styles.willChange = this.parallaxData.isVisible ? 'transform' : 'auto';
      }

      return styles;
    },
    trackInnerStyles: function trackInnerStyles() {
      var styles = {};
      styles.transitionDuration = this.transition.speed + 'ms';

      if (this.conf['3d']) {
        var rotation = this.transition.currentTranslation * 90 / 100; // Following calculation is equivalent to:
        // 'translateZ(slideshowWidth / 2) rotateY(' + rotation + 'deg)'
        // but does not require a fixed width.

        styles.transform = "rotateY(-90deg) translateX(-50%) rotateY(90deg) rotateY(".concat(rotation, "deg)");
      } else if (!this.conf.fade) {
        styles.transform = "translate3d(".concat(this.transition.currentTranslation, "%, 0, 0)"); // Increase browser optimizations by allocating more machine resource.
        // ! \\ To be used wisely so deactivate when not needed.

        styles.willChange = this.touch.dragging || this.transition.animated ? 'transform' : 'auto';
      }

      return styles;
    }
  }
});
// CONCATENATED MODULE: ./src/components/vueperslides/vueperslides.vue?vue&type=script&lang=js&
 /* harmony default export */ var vueperslides_vueperslidesvue_type_script_lang_js_ = (vueperslidesvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/vueperslides/vueperslides.vue?vue&type=style&index=0&lang=scss&
var vueperslidesvue_type_style_index_0_lang_scss_ = __webpack_require__("682b");

// CONCATENATED MODULE: ./src/components/vueperslides/vueperslides.vue






/* normalize component */

var vueperslides_component = normalizeComponent(
  vueperslides_vueperslidesvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var vueperslides = (vueperslides_component.exports);
// CONCATENATED MODULE: ./src/components/vueperslides/index.js

 // Expose component to global scope.

if (window && window.Vue) {
  window.Vue.component('vueper-slides', vueperslides);
  window.Vue.component('vueper-slide', vueperslide);
}


// CONCATENATED MODULE: ./node_modules/@vue/cli-service/lib/commands/build/entry-lib-no-default.js
/* concated harmony reexport VueperSlides */__webpack_require__.d(__webpack_exports__, "VueperSlides", function() { return vueperslides; });
/* concated harmony reexport VueperSlide */__webpack_require__.d(__webpack_exports__, "VueperSlide", function() { return vueperslide; });




/***/ }),

/***/ "fdef":
/***/ (function(module, exports) {

module.exports = '\x09\x0A\x0B\x0C\x0D\x20\xA0\u1680\u180E\u2000\u2001\u2002\u2003' +
  '\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF';


/***/ })

/******/ });
//# sourceMappingURL=vueperslides.common.js.map

/***/ }),

/***/ "./node_modules/vueperslides/dist/vueperslides.css":
/*!*********************************************************!*\
  !*** ./node_modules/vueperslides/dist/vueperslides.css ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--6-1!../../postcss-loader/src??ref--6-2!./vueperslides.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vueperslides/dist/vueperslides.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ })

}]);
//# sourceMappingURL=vendors~slider-background.js.map