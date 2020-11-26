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

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module 'jquery'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _renameRecentPosts__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./renameRecentPosts */ "./src/renameRecentPosts.js");
 // import GoogleMap from "./googleMap";


var renameRecentPostsAndstyleTitleToBeGrey = new _renameRecentPosts__WEBPACK_IMPORTED_MODULE_1__["default"](); // let googleMap = new GoogleMap();

(function ($) {
  /**
   * initMap
   *
   * Renders a Google Map onto the selected jQuery element
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   jQuery $el The jQuery element.
   * @return  object The map instance.
   */
  function initMap($el) {
    // Find marker elements within map.
    var $markers = $el.find('.marker'); // Create gerenic map.

    var mapArgs = {
      zoom: $el.data('zoom') || 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map($el[0], mapArgs); // Add markers.

    map.markers = [];
    $markers.each(function () {
      initMarker($(this), map);
    }); // Center map based on markers.

    centerMap(map); // Return map instance.

    return map;
  }
  /**
   * initMarker
   *
   * Creates a marker for the given jQuery element and map.
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   jQuery $el The jQuery element.
   * @param   object The map instance.
   * @return  object The marker instance.
   */


  function initMarker($marker, map) {
    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
      lat: parseFloat(lat),
      lng: parseFloat(lng)
    }; // Create marker instance.

    var marker = new google.maps.Marker({
      position: latLng,
      map: map
    }); // Append to reference for later use.

    map.markers.push(marker); // If marker contains HTML, add it to an infoWindow.

    if ($marker.html()) {
      // Create info window.
      var infowindow = new google.maps.InfoWindow({
        content: $marker.html()
      }); // Show info window when marker is clicked.

      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }
  /**
   * centerMap
   *
   * Centers the map showing all markers in view.
   *
   * @date    22/10/19
   * @since   5.8.6
   *
   * @param   object The map instance.
   * @return  void
   */


  function centerMap(map) {
    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      bounds.extend({
        lat: marker.position.lat(),
        lng: marker.position.lng()
      });
    }); // Case: Single marker.

    if (map.markers.length == 1) {
      map.setCenter(bounds.getCenter()); // Case: Multiple markers.
    } else {
      map.fitBounds(bounds);
    }
  } // Render maps on page load.


  $(document).ready(function () {
    $('.acf-map').each(function () {
      var map = initMap($(this));
    });
  });
})(jQuery);

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
    this.renameBreadcrumb(); // this.changeTitleColor();
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