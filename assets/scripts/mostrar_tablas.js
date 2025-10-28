function enviar(tabla) {


    console.log("Tabla actual:", tabla);
    //short url
    fetch(`../backend/controllers/procesar_consultas.php?tabla=${tabla}`)
        .then(res => res.json())
        .then(data => {

            if (Array.isArray(data) && data.length > 0) {
                console.log("Número de registros:", data.length);
                // Aquí procesas los datos normalmente


                let titulo = document.getElementById('txtTableName');
                let modalEditar = document.getElementById('contenidoEditar');
                let modalAgregar = document.getElementById('contenidoAgregar');

                let rescatar_tabla = tabla;

                let firstRow = data[0];                // primera fila
                let rescatar_key = Object.keys(firstRow)[0]; // nombre de la primera columna
                console.log(rescatar_key); // "id"


                titulo.innerHTML = tabla.toUpperCase();

                const tablaElement = document.getElementById('tabla-contenido');
                modalEditar.innerHTML = "";
                tablaElement.innerHTML = "";//borrar lo anterior
                modalAgregar.innerHTML = "";//borrar lo anterior

                const thead = document.createElement('thead');
                thead.classList.add('table-warning');
                const trHead = document.createElement('tr');

                for (let key in data[0]) {//mostrar solo los campos que se necesitan (Los primeros 4)
                    const th = document.createElement('th');
                    const cuerpoModal = document.createElement('div');
                    const label = document.createElement('label');
                    const input = document.createElement('input');

                    cuerpoModal.className = 'col-md-6';
                    input.className = 'form-control';
                    input.type = 'text';
                    input.idName = key;
                    input.name = key;
                    label.textContent = key;
                    label.className = 'form-label';

                    th.textContent = key;

                    cuerpoModal.appendChild(label);
                    cuerpoModal.appendChild(input);
                    modalEditar.appendChild(cuerpoModal);
                    modalAgregar.appendChild(cuerpoModal.cloneNode(true));//duplicar y agregar
                    trHead.appendChild(th);
                }
                let th = document.createElement('th');

                th = document.createElement('th');//Para el contenido podemos poner en el boton el id y hacer el select * from 'id' y mostrar los datos de ese dato en espesifico
                th.textContent = "Acciones";
                trHead.appendChild(th);
                thead.appendChild(trHead);
                tablaElement.appendChild(thead);


                const tbody = document.createElement('tbody');

                data.forEach(row => {
                    const tr = document.createElement('tr');
                    let id, confirmation = true;
                    for (let key in row) {
                        const td = document.createElement('td');
                        if (confirmation) {
                            id = row[key];
                            confirmation = false;
                        }
                        td.textContent = row[key];
                        tr.appendChild(td);
                    }
                    const td = document.createElement('td');

                    //agregar el boton de editar
                    const btnEditar = document.createElement('button');
                    btnEditar.className = 'btn btn-primary btn-sm me-1';
                    btnEditar.textContent = '✏️ Editar';
                    btnEditar.onclick = () => llenarFormularioEditar(row, id);
                    btnEditar.idName = 'modalAgregar';

                    //agregar el boton de eliminar
                    const btnEliminar = document.createElement('button');
                    btnEliminar.className = 'btn btn-danger btn-sm';
                    btnEliminar.textContent = '🗑️ Eliminar';
                    btnEliminar.onclick = () => eliminar(id, rescatar_key, rescatar_tabla);

                    //atributos para el modal de bootstrap
                    btnEditar.setAttribute('data-bs-toggle', 'modal');
                    btnEditar.setAttribute('data-bs-target', '#modalEditar');
                    td.appendChild(btnEditar);
                    td.appendChild(btnEliminar);
                    //td.textContent = "row[key]";
                    tr.appendChild(td);

                    tbody.appendChild(tr);
                });

                tablaElement.appendChild(tbody);

            } else {
                console.log("No hay datos para mostrar");
                // Opcional: mostrar mensaje en la tabla o modal
                document.getElementById('tabla-contenido').innerHTML = "<tr><td colspan='10'>No hay datos</td></tr>";
            }
        });
}
