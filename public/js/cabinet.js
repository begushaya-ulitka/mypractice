/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/cabinet.js ***!
  \****************************************/
var jsCabinetFormName = document.getElementById('js-cabinet-form-name');
var jsCabinetInputName = document.getElementById('js-cabinet-input-name');
var jsCabinetButtonName = document.getElementById('js-cabinet-button-name');
var currentValue = jsCabinetInputName.value;
jsCabinetInputName.addEventListener('input', function (e) {
  var value = e.target.value;
  jsCabinetButtonName.disabled = value === '' || value === currentValue;
});
jsCabinetButtonName.addEventListener('click', function (e) {
  e.preventDefault();
  if (!jsCabinetButtonName.disabled) {
    jsCabinetFormName.submit();
  }
});
/******/ })()
;