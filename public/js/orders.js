/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/assets/js/orders.js ***!
  \***************************************/
var jsOrderFormComment = document.getElementById('js-order-form-comment');
var jsOrderTextareaComment = document.getElementById('js-order-textarea-comment');
var jsOrderButtonComment = document.getElementById('js-order-button-comment');
jsOrderTextareaComment.addEventListener('input', function (e) {
  var value = e.target.value;
  jsOrderButtonComment.disabled = value === '';
});
jsOrderButtonComment.addEventListener('click', function (e) {
  e.preventDefault();
  if (!jsOrderButtonComment.disabled) {
    jsOrderFormComment.submit();
  }
});
/******/ })()
;