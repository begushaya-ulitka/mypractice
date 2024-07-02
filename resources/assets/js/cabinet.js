
const jsCabinetFormName = document.getElementById('js-cabinet-form-name');
const jsCabinetInputName = document.getElementById('js-cabinet-input-name');
const jsCabinetButtonName = document.getElementById('js-cabinet-button-name');
const currentValue = jsCabinetInputName.value;

jsCabinetInputName.addEventListener('input', function(e) {
    const value = e.target.value;
    jsCabinetButtonName.disabled = value === '' || value === currentValue;
});

jsCabinetButtonName.addEventListener('click', function(e) {
    e.preventDefault();
    if (!jsCabinetButtonName.disabled) {
        jsCabinetFormName.submit();
    }
});
