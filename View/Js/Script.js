document.getElementById('nombre').addEventListener('input', function() {
    /* Obtenemos el valor del campo de nombre */
    var nombre = this.value.trim();
    var correoInput = document.getElementById('correo');
    var correoValue = correoInput.value.trim();
    /* Comprobamos si hay algo en el nombre y si el campo de correo esta vacio y comienza con la primera letra del nombre */
    if (nombre && (!correoValue || correoValue.startsWith(nombre.charAt(30)))) {
        /* Convertimos el nombre a minusculas y asignamos el valor al campo de correo concatenando '@gmail.com' */
        correoInput.value = nombre.toLowerCase() + '@gmail.com';
    }
});

document.getElementById('telefono').addEventListener('keypress', function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
    }
});