/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scripts_article_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/article.js */ \"./resources/js/scripts/article.js\");\n/* harmony import */ var _scripts_admin_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/admin.js */ \"./resources/js/scripts/admin.js\");\n\nwindow.addArticleLikeEvent = _scripts_article_js__WEBPACK_IMPORTED_MODULE_0__.addArticleLikeEvent\nwindow.addCommentsLikeEvent = _scripts_article_js__WEBPACK_IMPORTED_MODULE_0__.addCommentsLikeEvent\n\n;\nwindow.appendArticleCreateButton = _scripts_admin_js__WEBPACK_IMPORTED_MODULE_1__.appendArticleCreateButton\n\n\n//# sourceURL=webpack:///./resources/js/app.js?");

/***/ }),

/***/ "./resources/js/scripts/admin.js":
/*!***************************************!*\
  !*** ./resources/js/scripts/admin.js ***!
  \***************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   appendArticleCreateButton: () => (/* binding */ appendArticleCreateButton)\n/* harmony export */ });\nfunction appendArticleCreateButton(href){\n    let button = document.createElement('div')\n    let buttons = document.querySelector('.header .buttons')\n    button.className='button'\n    let a = document.createElement('a')\n    a.setAttribute('href',href)\n    a.textContent='Создать новость'\n    button.appendChild(a)\n    buttons.appendChild(button)\n}\n\n\n//# sourceURL=webpack:///./resources/js/scripts/admin.js?");

/***/ }),

/***/ "./resources/js/scripts/article.js":
/*!*****************************************!*\
  !*** ./resources/js/scripts/article.js ***!
  \*****************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   addArticleLikeEvent: () => (/* binding */ addArticleLikeEvent),\n/* harmony export */   addCommentsLikeEvent: () => (/* binding */ addCommentsLikeEvent)\n/* harmony export */ });\nfunction addArticleLikeEvent(){\n    let panel = document.querySelector('.panel')\n    let href = panel.getAttribute('data-like')\n    let button = panel.querySelector('button')\n    button.addEventListener('click',function (event){\n        event.preventDefault()\n        likeButtonEvent(href)\n    })\n}\nasync function likeButtonEvent(href){\n    let panel = document.querySelector('.panel')\n    let input = panel.querySelector('input')\n    let token = input.getAttribute('value')\n    panel.outerHTML=await getUpdatedArticlePanel(href, token)\n    addArticleLikeEvent()\n}\nasync function getUpdatedArticlePanel(href,bodyToken){\n    let data = new FormData;\n    data.append('_token',bodyToken)\n    let response = await fetch(href,{\n        method:'post',\n        credentials: 'same-origin',\n        body:data\n    });\n    if (response.ok) {\n        return response.text();\n    }\n}\nfunction addCommentsLikeEvent(){\n    let comments = document.querySelectorAll('.comment')\n    comments.forEach(function (comment){\n        let form = comment.querySelector('form')\n        comment.addEventListener('mouseover',function (){\n            displayButton(form)\n        })\n        comment.addEventListener('mouseout',function (){\n            hideButton(form)\n        })\n\n        addEventToComment(comment)\n    })\n}\nasync function addEventToComment(div){\n    let button = div.querySelector('button')\n    button.addEventListener('click',function (event) {\n        event.preventDefault()\n        commentLikeEvent(div)\n    })\n}\nasync function commentLikeEvent(comment){\n    let href = comment.getAttribute('data-href')\n    let data = new FormData;\n    let input = comment.querySelector('input')\n    let token = input.getAttribute('value')\n    data.append('_token',token)\n    let response = await fetch(href,{\n        method:'post',\n        credentials: 'same-origin',\n        body:data\n    });\n    let newHTML = await response.text();\n    let tempElement = document.createElement('div');\n    tempElement.innerHTML = newHTML;\n    let newComment = tempElement.firstChild;\n    comment.parentNode.replaceChild(newComment, comment);\n    let form = newComment.querySelector('form')\n    newComment.addEventListener('mouseover',function (){\n        displayButton(form)\n    })\n    newComment.addEventListener('mouseout',function (){\n        hideButton(form)\n    })\n    await addEventToComment(newComment);\n}\nfunction displayButton(comment){\n    comment.classList.remove('invisible')\n}\nfunction hideButton(comment){\n    comment.classList.add('invisible')\n}\n\n\n//# sourceURL=webpack:///./resources/js/scripts/article.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/app.js");
/******/ 	
/******/ })()
;