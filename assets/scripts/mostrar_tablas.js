function enviar(tabla) {


    fetch(`../backend/controllers/procesar_consultas.php?tabla=${tabla}`)
        .then(res => res.json())
        .then(data => {
            let titulo = document.getElementById('txtTableName');
            let modalEditar = document.getElementById('contenidoEditar');
            let modalAgregar = document.getElementById('contenidoAgregar');


            titulo.innerHTML = tabla.toUpperCase();

            const tablaElement = document.getElementById('tabla-contenido');
            tablaElement.innerHTML = "";//borrar lo anterior
            contenidoEditar.innerHTML = "";//borrar lo anterior
            modalAgregar.innerHTML = "";//borrar lo anterior

            const thead = document.createElement('thead');
            thead.classList.add('table-warning');
            const trHead = document.createElement('tr');

            for (let key in data[0]) {
                const th = document.createElement('th');
                const cuerpoModal = document.createElement('div');
                const label = document.createElement('label');
                const input = document.createElement('input');

                cuerpoModal.className = 'col-md-6';
                input.className = 'form-control';
                input.type = 'text';
                input.idName = key;
                label.textContent = key;
                label.className = 'form-label';

                th.textContent = key;

                cuerpoModal.appendChild(label);
                cuerpoModal.appendChild(input);
                modalEditar.appendChild(cuerpoModal);
                modalAgregar.appendChild(cuerpoModal.cloneNode(true));//duplicar y agregar
                trHead.appendChild(th);
            }
            const th = document.createElement('th');
            th.textContent = "Acciones";
            trHead.appendChild(th);
            thead.appendChild(trHead);
            tablaElement.appendChild(thead);

            const tbody = document.createElement('tbody');
            data.forEach(row => {
                const tr = document.createElement('tr');
                for (let key in row) {
                    const td = document.createElement('td');
                    td.textContent = row[key];
                    tr.appendChild(td);
                }
                const td = document.createElement('td');

                //agregar el boton de editar
                const btnEditar = document.createElement('button');
                btnEditar.className = 'btn btn-primary btn-sm me-1';
                btnEditar.textContent = '✏️ Editar';
                //btnEditar.onclick = () => editarAlumno(row.Num_Control);
                btnEditar.idName = 'modalAgregar';

                //agregar el boton de eliminar
                const btnEliminar = document.createElement('button');
                btnEliminar.className = 'btn btn-danger btn-sm';
                btnEliminar.textContent = '🗑️ Eliminar';
                btnEliminar.onclick = () => eliminarAlumno(row.Num_Control);

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
        });
}
