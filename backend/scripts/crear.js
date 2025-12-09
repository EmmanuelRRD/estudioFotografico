function crear(tabla,nombrePublicTabla) {
    const form = document.getElementById('addInfo');
    

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    const formData = new FormData(form);
    const datos = {};

    formData.forEach((valor, clave) => {
        datos[clave] = valor;
    });

    const modal = bootstrap.Modal.getInstance(document.getElementById('modalAgregar'));
    modal.hide();

    fetch("/backend/controllers/procesar_altas.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ datos, tabla })
    })
    .then(res => res.text())
    .then(data => {
        console.log(tabla);
        console.log(data);
        alert(data); // o reemplazar con un toast
        enviar(tabla,nombrePublicTabla); // refrescar tabla
        //form.reset(); // limpiar inputs
    })
    .catch(err => console.error("Enrror al solicitar la alta"));
}
