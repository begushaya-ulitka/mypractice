
const jsOrderFormComment = document.getElementById('js-order-form-comment');
const jsOrderTextareaComment = document.getElementById('js-order-textarea-comment');
const jsOrderButtonComment = document.getElementById('js-order-button-comment');

jsOrderTextareaComment.addEventListener('input', function(e) {
    const value = e.target.value;
    jsOrderButtonComment.disabled = value === ''
});

jsOrderButtonComment.addEventListener('click', function(e) {
    e.preventDefault();
    if (!jsOrderButtonComment.disabled) {
        jsOrderFormComment.submit();
    }
});
