document.addEventListener("DOMContentLoaded", function() {
    var nombreInput = document.getElementById("nombre");
    var apellidosInput = document.getElementById("apellidos");
    var correoInput = document.getElementById("correo");

    nombreInput.addEventListener("input", actualizarCorreo);
    apellidosInput.addEventListener("input", actualizarCorreo);

    function actualizarCorreo() {
        var nombre = nombreInput.value.trim();
        var apellidos = apellidosInput.value.trim().replace(/\s+/g, ''); // Eliminar espacios en blanco
        var correo = "";

        if (nombre && apellidos) {
            correo = (nombre + "." + apellidos).toLowerCase() + "@gmail.com";
        }

        correoInput.value = correo;
    }
});


document.getElementById('telefono').addEventListener('keypress', function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
    }
});