document.getElementById('nombre').addEventListener('input', function() {
    var nombre = this.value.trim(); // Obtenemos el valor del campo de nombre
    var correoInput = document.getElementById('correo');
    var correoValue = correoInput.value.trim();
    // Comprobamos si hay algo en el nombre y si el campo de correo está vacío o comienza con la primera letra del nombre
    if (nombre && (!correoValue || correoValue.startsWith(nombre.charAt(30)))) {
        correoInput.value = nombre.toLowerCase() + '@gmail.com'; // Convertimos el nombre a minúsculas y asignamos el valor al campo de correo concatenando '@gmail.com'
    }
});

document.getElementById('telefono').addEventListener('keypress', function(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        event.preventDefault();
    }
});