function eliminar(id, key, tabla) {
    console.log("Datos a enviar:", { id, key, tabla });//comentar acabando las pruebas

    fetch(`../backend/controllers/procesar_bajas.php`, {
        method: 'DELETE',//el metodo
        headers: {
            'Content-Type': 'application/json'//que mandamos json
        },
        body: JSON.stringify({ id, key, tabla }) //aquí mandas todo
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        if (data.trim() === "ok") {
            alert("Registro eliminado correctamente");
            enviar(tabla); // actualizar la tabla
        } else {
            alert("Error al eliminar el registro");
        }
    })
    .catch(error => {
        console.error("Error en fetch:", error);
    });
}
