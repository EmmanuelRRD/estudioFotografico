function enviar(tabla) {

    const botonAg = document.getElementById("btn-agregar");
    //short url
    fetch(`../controllers/procesar_consultas.php?tabla=${tabla}`)
        .then(res => res.json())
        .then(data => {
            botonAg.style.display = "block";

            if (Array.isArray(data) && data.length > 0) {
                console.log("Número de registros:", data.length);
                // Aquí procesas los datos normalmente

                let titulo = document.getElementById('txtTableName');
                let modalEditar = document.getElementById('contenidoEditar');
                let modalAgregar = document.getElementById('contenidoAgregar');
                let btn_agregar = document.getElementById('btn_creador');
                let nombreTabla = document.getElementById('nombre-tabla');

                nombreTabla.value = tabla;

                let rescatar_tabla = tabla;
                btn_agregar.onclick = () => crear(rescatar_tabla);

                let firstRow = data[0];                // primera fila
                let rescatar_key = Object.keys(firstRow)[0]; // nombre de la primera columna

                titulo.innerHTML = tabla.toUpperCase();

                const tablaElement = document.getElementById('tabla-contenido');
                modalEditar.innerHTML = "";
                tablaElement.innerHTML = "";//borrar lo anterior
                modalAgregar.innerHTML = "";//borrar lo anterior

                const thead = document.createElement('thead');
                thead.classList.add('table-warning');
                const trHead = document.createElement('tr');

                for (let key in data[0]) {
                    const th = document.createElement('th');

                    // Contenedor
                    const divCheck = document.createElement('div');
                    divCheck.className = 'form-check d-flex align-items-center justify-content-center';

                    // Checkbox
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

                    //Solo permitir uno activo
                    inputCheck.addEventListener('change', (e) => {
                        if (e.target.checked) {
                            // Desmarcar todos los demás
                            document.querySelectorAll('input[name="columnas"]').forEach(chk => {
                                if (chk !== e.target) chk.checked = false;
                            });
                            console.log("Seleccionado:", e.target.value);
                            const a = document.getElementById('search_tabla');
                            const b = document.getElementById('search_id');
                            b.type = "text";
                            a.value = e.target.value;
                            console.log("Seleccionado:", a.value);
                        } else {
                            const a = document.getElementById('search_tabla');
                            const b = document.getElementById('search_id');

                            const clearBtn = document.getElementById('clear_btn');
                            console.log("Ninguno seleccionado");
                            clearBtn.style.display = 'none';

                            b.type = "hidden";
                            a.value = "";
                        }
                    });
                }

                for (let key in data[0]) {//mostrar solo los campos que se necesitan (Los primeros 4)
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

                    cuerpoModal.appendChild(label);
                    cuerpoModal.appendChild(input);
                    modalEditar.appendChild(cuerpoModal);
                    modalAgregar.appendChild(cuerpoModal.cloneNode(true));//duplicar y agregar
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
                    btnEditar.className = 'btn btn-sm me-1 display-4';
                    btnEditar.textContent = '✏️';
                    btnEditar.onclick = () => llenarFormularioEditar(row, rescatar_key, id, rescatar_tabla);
                    btnEditar.idName = 'modalAgregar';

                    //agregar el boton de eliminar
                    const btnEliminar = document.createElement('button');
                    btnEliminar.className = 'btn btn-sm display-4';
                    btnEliminar.textContent = '🗑️';
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
        })
        .catch(error => {
            alert("Error tabla no encontrada");
            //#botonAg
            botonAg.style.display = "none";

            let titulo = document.getElementById('txtTableName');
            let modalEditar = document.getElementById('contenidoEditar');
            let modalAgregar = document.getElementById('contenidoAgregar');
            let tablaElement = document.getElementById('tabla-contenido');

            modalEditar.innerHTML = "";
            tablaElement.innerHTML = "";//borrar lo anterior
            modalAgregar.innerHTML = "";//borrar lo anterior
            titulo.innerHTML = "";//borrar lo anterior
        });
}
