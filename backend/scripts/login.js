document.getElementById("formLogin").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita el post directo

    const formData = new FormData(this);

    fetch("../backend/controllers/validar_usuario.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {

            if (data.status === "error") {
                // Mostrar mensaje de error
                alert(data.message);
            }

            if (data.status === "ok") {
                // Redirige si todo salió bien
                window.location.href = data.redirect;
            }
        })
        .catch(err => {
            console.error(err);
            alert("Error en el servidor.");
        });
});