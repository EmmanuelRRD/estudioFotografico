
function enviar_actualizacion(id) {
    console.log("identificador: " + id);
    const form = document.getElementById('newInfo');
    const formData = new FormData(form);
    const datos = {};

    formData.forEach((valor, clave) => {
        datos[clave] = valor;
    });

    console.table(datos); // 👈 mucho más claro
}



//si creo los botones a la hora de los datos puedo paras los parametros del id de una vez para las ediciones y eliminaciones
function llenarFormularioEditar(row, id) {
    const form = document.getElementById('contenidoEditar');

    // Limpiamos el formulario antes de rellenar
    form.querySelectorAll('input').forEach(input => {
        const campo = input.name;
        let btnConfirmar = document.getElementById('btnActualizar');

        btnConfirmar.onclick = () => enviar_actualizacion(id);

        if (campo in row) {
            input.value = row[campo];
        } else {
            input.value = '';
        }
    });

    console.log("Formulario rellenado con:", row);
}
