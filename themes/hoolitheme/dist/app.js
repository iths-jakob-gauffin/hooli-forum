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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/addPlaceholder.js":
/*!*******************************!*\
  !*** ./src/addPlaceholder.js ***!
  \*******************************/
/*! exports provided: addPlaceholder */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addPlaceholder", function() { return addPlaceholder; });
var addPlaceholder = function addPlaceholder() {
  document.querySelector("#user_login").placeholder = "Användarnamn";
  document.querySelector("#user_pass").placeholder = "Lösenord";
};

/***/ }),

/***/ "./src/addTopBorder.js":
/*!*****************************!*\
  !*** ./src/addTopBorder.js ***!
  \*****************************/
/*! exports provided: addTopBorder */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addTopBorder", function() { return addTopBorder; });
var addTopBorder = function addTopBorder() {
  var form = document.querySelector("#loginform");
  var div = form.insertBefore(document.createElement("div"), form.firstChild);
  div.classList.add("top-border");
  var p = document.createElement("p");
  p.innerText = "Logga in";
  div.append(p);
};

/***/ }),

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _addPlaceholder_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./addPlaceholder.js */ "./src/addPlaceholder.js");
/* harmony import */ var _addTopBorder_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./addTopBorder.js */ "./src/addTopBorder.js");
/* harmony import */ var _renameRecentPosts__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./renameRecentPosts */ "./src/renameRecentPosts.js");

 // const name = (stuff) => {
//     return stuff + "!";
// };


var renameRecentPostsAndstyleTitleToBeGrey = new _renameRecentPosts__WEBPACK_IMPORTED_MODULE_2__["default"](); //Add placeholders to input fields in login page

Object(_addPlaceholder_js__WEBPACK_IMPORTED_MODULE_0__["addPlaceholder"])();
Object(_addTopBorder_js__WEBPACK_IMPORTED_MODULE_1__["addTopBorder"])();
console.log("hej från javascriptet");

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/renameRecentPosts.js":
/*!**********************************!*\
  !*** ./src/renameRecentPosts.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var RenameRecentPosts = /*#__PURE__*/function () {
  function RenameRecentPosts() {
    _classCallCheck(this, RenameRecentPosts);

    this.title = document.querySelector("#wpforo-title");
    this.breadcrumbText = document.querySelector("#wpforo-wrap > div.wpforo-subtop > div.wpf-breadcrumb > div.wpf-item-element.active > span");
    this.renameTitle();
    this.renameBreadcrumb();
    this.changeTitleColor();
  }

  _createClass(RenameRecentPosts, [{
    key: "renameTitle",
    value: function renameTitle() {
      if (this.title && this.title.innerHTML.includes("Recent Posts")) {
        this.title.innerHTML = "Senaste inläggen";
        this.title.style.paddingBottom = "0";
        this.title.style.marginBottom = "0";
      }
    }
  }, {
    key: "renameBreadcrumb",
    value: function renameBreadcrumb() {
      if (this.breadcrumbText && this.breadcrumbText.innerHTML.includes("Recent Posts")) {
        this.breadcrumbText.innerHTML = "Senaste inläggen";
      }
    }
  }, {
    key: "changeTitleColor",
    value: function changeTitleColor() {
      this.title.classList.add("greyTitle");
    }
  }]);

  return RenameRecentPosts;
}();

/* harmony default export */ __webpack_exports__["default"] = (RenameRecentPosts);

/***/ }),

/***/ 0:
/*!*****************************************!*\
  !*** multi ./src/app.js ./src/app.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/jessica/Local Sites/hooliforum/app/public/wp-content/themes/hoolitheme/src/app.js */"./src/app.js");
module.exports = __webpack_require__(/*! /Users/jessica/Local Sites/hooliforum/app/public/wp-content/themes/hoolitheme/src/app.scss */"./src/app.scss");


/***/ })

/******/ });