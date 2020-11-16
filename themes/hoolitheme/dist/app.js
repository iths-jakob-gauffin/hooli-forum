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
/*! no static exports found */
/***/ (function(module, exports) {

var addPlaceholder = function addPlaceholder() {
  document.querySelector("#user_login").placeholder = "Användarnamn";
  document.querySelector("#user_pass").placeholder = "Lösenord";
}; // addPlaceholder();

/***/ }),

/***/ "./src/addTopBorder.js":
/*!*****************************!*\
  !*** ./src/addTopBorder.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

var addTopBorder = function addTopBorder(elementToPick) {
  console.log("topborder");
  var form = document.querySelector(elementToPick);
  var div = form.insertBefore(document.createElement("div"), form.firstChild);
  div.classList.add("top-border");
  var p = document.createElement("p");
  p.innerText = "Logga in";
  div.append(p);
};

if (window.location.pathname === '/wp-login.php') {
  addTopBorder("#loginform");
}

if (window.location.search === '?foro=signin') {
  addTopBorder(".wpforo-login-wrap");
}

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
/* harmony import */ var _addPlaceholder_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_addPlaceholder_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _addTopBorder_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./addTopBorder.js */ "./src/addTopBorder.js");
/* harmony import */ var _addTopBorder_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_addTopBorder_js__WEBPACK_IMPORTED_MODULE_1__);

 // const name = (stuff) => {
//     return stuff + "!";
// };
// const test = name("Hej");
// console.log(test);
// alert("hej");
// // Import components.
// import Example from "./components/example.js";
// // Initialize your components on DOM Ready.
// $(document).ready(() => {
//     console.log("saker händer");
//     Example.init({
//         setting: "New setting",
//     });
// });
// alert("nsakldnkas");
//Add placeholders to input fields in login page
// addPlaceholder();
// addTopBorder("#loginform");
//app.js körs på varje sida nu. Hittar inte alla element då de kanske tillhör en annan sida. 
// addTopBorder(".wpforo-login-content");

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