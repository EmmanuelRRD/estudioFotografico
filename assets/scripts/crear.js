function crear(tabla) {
    const form = document.getElementById('addInfo');
    const formData = new FormData(form);
    const datos = {};

    formData.forEach((valor, clave) => {
        datos[clave] = valor;
    });

    const modal = bootstrap.Modal.getInstance(document.getElementById('modalAgregar'));
    modal.hide();

    fetch("../backend/controllers/procesar_altas.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            datos: datos,
            tabla: tabla
        })
    })
        .then(res => res.text())
        .then(data => {
            alert(data);
            enviar(tabla);

        })
        .catch(err => console.error("Error:", err));

}