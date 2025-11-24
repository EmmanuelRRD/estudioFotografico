function createTable(json) {

    const botonAg = document.getElementById("btn-agregar");
    const data = json; // ya tienes el JSON

    try {
        botonAg.style.display = "block";

        if (Array.isArray(data) && data.length > 0) {

            console.log("Número de registros:", data.length);

            let titulo = document.getElementById('txtTableName');
            let modalEditar = document.getElementById('contenidoEditar');
            let modalAgregar = document.getElementById('contenidoAgregar');
            let btn_agregar = document.getElementById('btn_creador');
            let nombreTabla = document.getElementById('nombre-tabla');

            let rescatar_tabla = tabla;
            btn_agregar.onclick = () => crear(rescatar_tabla);

            let firstRow = data[0];
            let rescatar_key = Object.keys(firstRow)[0];

            titulo.innerHTML = tabla.toUpperCase();

            const tablaElement = document.getElementById('tabla-contenido');
            modalEditar.innerHTML = "";
            tablaElement.innerHTML = "";
            modalAgregar.innerHTML = "";

            // -------------------------
            //   CREAR ENCABEZADOS
            // -------------------------
            const thead = document.createElement('thead');
            thead.classList.add('table-warning');
            const trHead = document.createElement('tr');

            for (let key in firstRow) {
                const th = document.createElement('th');

                const divCheck = document.createElement('div');
                divCheck.className = 'form-check d-flex align-items-center justify-content-center';

                const inputCheck = document.createElement('input');
                inputCheck.type = 'checkbox';
                inputCheck.className = 'form-check-input';
                inputCheck.id = `chk-${key}`;
                inputCheck.name = 'columnas';
                inputCheck.value = key;

                const label = document.createElement('label');
                label.className = 'form-check-label ms-1';
                label.setAttribute('for', `chk-${key}`);
                label.textContent = key;

                divCheck.appendChild(inputCheck);
                divCheck.appendChild(label);
                th.appendChild(divCheck);
                trHead.appendChild(th);

                inputCheck.addEventListener('change', (e) => {
                    if (e.target.checked) {
                        document.querySelectorAll('input[name="columnas"]').forEach(chk => {
                            if (chk !== e.target) chk.checked = false;
                        });
                        document.getElementById('search_tabla').value = e.target.value;
                        document.getElementById('search_id').type = "text";
                    } else {
                        document.getElementById('search_tabla').value = "";
                        document.getElementById('search_id').type = "hidden";
                        document.getElementById('clear_btn').style.display = 'none';
                    }
                });
            }

            const thAcciones = document.createElement('th');
            thAcciones.textContent = "Acciones";
            trHead.appendChild(thAcciones);
            thead.appendChild(trHead);
            tablaElement.appendChild(thead);

            // -------------------------
            //   CREAR CUERPO TABLA
            // -------------------------
            const tbody = document.createElement('tbody');

            data.forEach(row => {
                const tr = document.createElement('tr');
                let id, first = true;

                for (let key in row) {
                    const td = document.createElement('td');
                    if (first) {
                        id = row[key];
                        first = false;
                    }
                    td.textContent = row[key];
                    tr.appendChild(td);
                }

                const accionesTd = document.createElement('td');

                const btnEditar = document.createElement('button');
                btnEditar.className = 'btn btn-sm me-1 display-4';
                btnEditar.textContent = '✏️';
                btnEditar.onclick = () => llenarFormularioEditar(row, rescatar_key, id, rescatar_tabla);
                btnEditar.setAttribute('data-bs-toggle', 'modal');
                btnEditar.setAttribute('data-bs-target', '#modalEditar');

                const btnEliminar = document.createElement('button');
                btnEliminar.className = 'btn btn-sm display-4';
                btnEliminar.textContent = '🗑️';
                btnEliminar.onclick = () => eliminar(id, rescatar_key, rescatar_tabla);

                accionesTd.appendChild(btnEditar);
                accionesTd.appendChild(btnEliminar);
                tr.appendChild(accionesTd);

                tbody.appendChild(tr);
            });

            tablaElement.appendChild(tbody);

        } else {
            console.log("No hay datos para mostrar");
            document.getElementById('tabla-contenido').innerHTML =
                "<tr><td colspan='10'>No hay datos</td></tr>";
        }

    } catch (error) {
        alert("Error procesando la tabla");

        botonAg.style.display = "none";
        document.getElementById('contenidoEditar').innerHTML = "";
        document.getElementById('contenidoAgregar').innerHTML = "";
        document.getElementById('tabla-contenido').innerHTML = "";
        document.getElementById('txtTableName').innerHTML = "";
    }
}
