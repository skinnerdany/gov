window.addEventListener('load', function () {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);

var troika = document.getElementById("validationCustom09").value;
if (troika != ""){
    document.getElementById("validationCustom09").setAttribute("disabled")
} else {
    document.getElementById("validationCustom10").setAttribute("disabled", null)
};