document.getElementById('nombre').addEventListener('input', function() {
    var nombre = this.value.trim();
    var correoInput = document.getElementById('correo');
    var correoValue = correoInput.value.trim();
    if (nombre && (!correoValue || correoValue.startsWith(nombre.charAt(30)))) {
        correoInput.value = nombre.toLowerCase() + '@gmail.com';
    }
});

document.getElementById('telefono').addEventListener('keypress', function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
    }
});