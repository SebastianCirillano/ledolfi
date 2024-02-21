document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional

    var formData = new FormData(this); // Obtiene los datos del formulario

    fetch("./procesar_formulario.php", { // Reemplaza esto con la ruta a tu archivo PHP que procesa el formulario
        method: "POST",
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("mensajeResultado").innerHTML = "<p class='text-success'>Form submission successful!</p>";
    })
    .catch(error => {
        document.getElementById("mensajeResultado").innerHTML = "<p class='text-danger'>Error al enviar el formulario</p>";
    });
});

document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario se recargue automáticamente

    // Limpia los campos del formulario
    document.getElementById("FullName").value = "";
    document.getElementById("email").value = "";
    document.getElementById("number").value = "";
    document.getElementById("message").value = "";

    // Muestra el mensaje de "formulario enviado"
    document.getElementById("mensajeResultado").innerHTML = "Form submission successful!";
});

document.getElementById("clear").addEventListener("click", function () {
    document.getElementById("contactForm").reset();
});