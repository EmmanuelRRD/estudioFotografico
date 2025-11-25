
function enviar_actualizacion(key, id, tabla, úblicName) {


    console.log("identificador: " + id);
    const form = document.getElementById('newInfo');
    const formData = new FormData(form);
    const datos = {};

    formData.forEach((valor, clave) => {
        datos[clave] = valor;
    });

    const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditar'));
    modal.hide();

    

    fetch("../controllers/procesar_cambios.php", {
        //../controllers/procesar_consultas.php?tabla=${tabla}
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            datos: datos,
            tabla: tabla,
            id: id,
            key: key
        })
    })
        .then(res => res.text())
        .then(data => {
            alert(data);
            console.log("Nombre de la tabla: "+tabla);
        console.log("Nombre de la id: "+id);
        console.log("Nombre de la key: "+key);
            enviar(tabla, úblicName);

        })
        .catch(err => console.error("Error:", err));

}

function llenarFormularioEditar(row, key, id, tabla, úblicName) {
    const form = document.getElementById('contenidoEditar');

    form.querySelectorAll('input').forEach(input => {
        const campo = input.name;

        let btnConfirmar = document.getElementById('btnActualizar');
        
        btnConfirmar.onclick = () => enviar_actualizacion(key, id, tabla, úblicName);
        if (campo in row) {
            input.value = row[campo];
        } else {
            input.value = '';
        }

        //Mandar los datos
    });

}
