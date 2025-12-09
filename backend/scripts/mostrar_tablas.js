const tablasChidas = {
    "equipo_trabajo": ["Identificador", "descripcion"],
    "estudio": ["Identificador", "Nombre", "Dirección", "Tipo Entregas", "Encargado", "Jefe"],
    "evento": ["Identificador", "Fecha evento", "Paquete", "Fotos chicas", "Fotos grandes", "Ampliaciones", "Confirmado", "Identificador evento"],
    "material": ["Identificador", "Nombre", "Tipo", "Stock", "Código Estudio"],
    "material_necesario": ["Identificador", "Identificador material", "Identificador evento", "Cantidad"],
    "nombre_tablas": ["Identificador", "Nombre", "Precio", "Stock"],
    "nota": ["Identificador", "Identificador evento", "Material Necesario", "Equipo", "Descripcion"],
    "usuario": ["Identificador", "Identificador estudio", "Nombres", "Primer Apellido", "Segundo apellido", "Fecha de nacimiento", "Telefono", "Correo", "Privilegios", "Contraseña"],
    "usuario_equipo": ["Identificador", "Identificador equipo"]
};

const reglasValidacion = {

    // ────────────────────────────────
    // TABLA: EQUIPO_TRABAJO
    // ────────────────────────────────
    equipo_trabajo: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "descripcion": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/, mensaje: "Solo letras." }
        ]
    },

    // ────────────────────────────────
    // TABLA: ESTUDIO
    // ────────────────────────────────
    estudio: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Nombre": [{ required: true, mensaje: "Campo obligatorio." },
        { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/, mensaje: "Solo letras." }
        ],
        "Dirección": [{ required: true, mensaje: "Campo obligatorio." }],
        "Tipo Entregas": [{ required: true, mensaje: "Campo obligatorio." },
        { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/, mensaje: "Solo letras." }
        ],
        "Encargado": [{ required: true, mensaje: "Campo obligatorio." },
        { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Jefe": [{ required: true, mensaje: "Campo obligatorio." },
        { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ]
    },

    // ────────────────────────────────
    // TABLA: EVENTO
    // ────────────────────────────────
    evento: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Fecha evento": [
            { required: true, mensaje: "Campo obligatorio." },
            { custom: v => new Date(v) >= new Date("2000-01-01"), mensaje: "Fecha inválida." }
        ],
        "Paquete": [{ required: true }],
        "Fotos chicas": [{ regex: /^[0-9]+$/, mensaje: "Debe ser un número." }],
        "Fotos grandes": [{ regex: /^[0-9]+$/, mensaje: "Debe ser un número." }],
        "Ampliaciones": [{ regex: /^[0-9]+$/, mensaje: "Debe ser un número." }],
        "Confirmado": [
            { required: true },
            { regex: /^[01]$/, mensaje: "Solo se permite 0=No o 1=Si." }
        ],
        "Identificador evento": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ]
    },

    // ────────────────────────────────
    // TABLA: MATERIAL
    // ────────────────────────────────
    material: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Nombre": [{ required: true }],
        "Tipo": [{ required: true }],
        "Stock": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]+$/, mensaje: "Debe ser número." }
        ],
        "Código Estudio": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Código inválido." }
        ]
    },

    // ────────────────────────────────
    // TABLA: MATERIAL NECESARIO
    // ────────────────────────────────
    material_necesario: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Identificador material": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/ }
        ],
        "Identificador evento": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/ }
        ],
        "Cantidad": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]+$/, mensaje: "Debe ser un número." }
        ]
    },

    // ────────────────────────────────
    // TABLA: NOMBRE TABLAS
    // ────────────────────────────────
    nombre_tablas: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Nombre": [{ required: true }],
        "Precio": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]+(\.[0-9]{1,2})?$/, mensaje: "Debe ser un número válido." }
        ],
        "Stock": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]+$/ }
        ]
    },

    // ────────────────────────────────
    // TABLA: NOTA
    // ────────────────────────────────
    nota: {
        "Identificador": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Identificador evento": [
            { required: true },
            { regex: /^[A-Za-z0-9]{1,6}$/ }
        ],
        "Material Necesario": [{ required: true }],
        "Equipo": [{ required: true }],
        "Descripcion": [{ required: true }]
    },

    // ────────────────────────────────
    // TABLA: USUARIO
    // ────────────────────────────────
    usuario: {
        "Identificador": [
            { required: true },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Identificador estudio": [
            { required: true },
            { regex: /^[A-Za-z0-9]{1,6}$/, mensaje: "Máximo 6 caracteres alfanuméricos." }
        ],
        "Nombres": [
            { required: true },
            { regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/, mensaje: "Solo letras." }
        ],
        "Primer Apellido": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/ }
        ],
        "Segundo apellido": [
            { required: false },
            { regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/ }
        ],
        "Fecha de nacimiento": [
            { required: true, mensaje: "Campo obligatorio." },
            { custom: v => new Date(v) < new Date(), mensaje: "Debe ser fecha pasada." }
        ],
        "Telefono": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]{10}$/, mensaje: "Debe tener 10 dígitos." }
        ],
        "Correo": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, mensaje: "Correo inválido." }
        ],
        "Privilegios": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^(cliente|administrador)$/i, mensaje: "Debe ser cliente o administrador." }
        ],
        "Contraseña": [
            { required: true, mensaje: "Campo obligatorio." },
            { min: 6, mensaje: "Mínimo 6 caracteres." }
        ]
    },

    // ────────────────────────────────
    // TABLA: USUARIO_EQUIPO
    // ────────────────────────────────
    usuario_equipo: {
        "Identificador": [
            { required: true },
            { regex: /^[A-Za-z0-9]{1,6}$/ }
        ],
        "Identificador equipo": [
            { required: true },
            { regex: /^[A-Za-z0-9]{1,6}$/ }
        ]
    }
};

function enviar(tabla, nombrePublicotabla) {
    const fbBd = document.getElementById('nombre-tabla-bd');
    fbBd.value = tabla;

    const fbBdPb = document.getElementById('nombre-publico-tabla-bd');
    fbBdPb.value = nombrePublicotabla;

    consultar(`../backend/controllers/procesar_consultas.php?tabla=${tabla}`, tabla, nombrePublicotabla);
}

function enviarFiltro(tabla, key, nombrePublicotabla, datoValidar) {
    consultar(`/backend/controllers/procesar_consultas_espesificas.php?tabla=${tabla}&key=${key}&id=${datoValidar}`, tabla, nombrePublicotabla);
}

async function consultar(url, tabla, nombrePublicoTabla) {

    const botonAg = document.getElementById("btn-agregar");
    const tablaElement = document.getElementById('tabla-contenido');

    limpiarTablaYModales();

    try {
        const res = await fetch(url);
        const data = await res.json();
        //console.log(data);

        if (!Array.isArray(data) || data.length === 0) {
            mostrarVacio();
            return;
        }

        configurarEncabezado(tabla, nombrePublicoTabla);
        botonAg.style.display = "block";

        const columnas = Object.keys(data[0]);
        const idColumna = columnas[0];

        renderHead(tablaElement, tabla, columnas);
        renderBody(tablaElement, data, columnas, idColumna, tabla, nombrePublicoTabla);

        renderFormFields(
            document.getElementById("contenidoEditar"),
            document.getElementById("contenidoAgregar"),
            tabla,
            columnas
        );

        activarValidacionDinamica(
            document.getElementById("contenidoAgregar"),
            tabla,
            document.getElementById("btn_creador")
        );
        activarValidacionDinamica(
            document.getElementById("contenidoEditar"),
            tabla,
            document.getElementById("btnActualizar")
        );

    } catch (error) {
        console.error("Error en la consulta:", error);
        alert("Error al consultar los datos.");
        botonAg.style.display = "none";
        limpiarTablaYModales(true);
    }
}

/* ────────────────────────────────────────────────────────────── */
/* Validacion                                                     */
/* ────────────────────────────────────────────────────────────── */

function activarValidacionDinamica(modal, tabla, botonConfirmar) {

    const reglas = reglasValidacion[tabla] || {};
    const inputs = modal.querySelectorAll("[data-columna]");
    let estado = {};

    inputs.forEach(input => {
        const columna = input.getAttribute("data-columna");
        estado[columna] = false;

        let error = document.createElement("p");
        error.className = "mensaje-error";
        error.style.cssText = "color:red;font-size:.8rem;margin:3px 0 0 5px;display:none;";
        input.insertAdjacentElement("afterend", error);

        input.addEventListener("input", () => {
            validarInput(input, columna, reglas[columna], estado, error);
            verificarFormulario(estado, botonConfirmar);
        });
    });

    // Evaluar al inicio
    verificarFormulario(estado, botonConfirmar);
}

function validarInput(input, columna, reglas, estado, error) {
    const valor = input.value.trim();

    // si no hay reglas → válido
    if (!reglas) {
        estado[columna] = true;
        return;
    }

    // convertir a array si solo pusieron un objeto
    if (!Array.isArray(reglas)) reglas = [reglas];

    // probar todas las reglas
    for (const regla of reglas) {

        if (regla.required && valor === "") {
            return marcarError(regla.mensaje);
        }

        if (regla.regex && !regla.regex.test(valor)) {
            return marcarError(regla.mensaje);
        }

        if (regla.min && valor.length < regla.min) {
            return marcarError(regla.mensaje);
        }

        if (regla.custom && !regla.custom(valor)) {
            return marcarError(regla.mensaje);
        }
    }

    // Si ninguna regla falló → válido
    input.style.borderColor = "green";
    error.style.display = "none";
    estado[columna] = true;
    return;

    function marcarError(msg) {
        input.style.borderColor = "red";
        error.textContent = msg;
        error.style.display = "block";
        estado[columna] = false;
    }
}


function verificarFormulario(estado, boton) {
    const todoValido = Object.values(estado).every(v => v === true);
    boton.disabled = !todoValido;
    boton.style.opacity = todoValido ? "1" : "0.6";
}



/* ────────────────────────────────────────────────────────────── */
/* SECCIÓN: UI helpers                                            */
/* ────────────────────────────────────────────────────────────── */

function limpiarTablaYModales(clearTitle = false) {
    document.getElementById('tabla-contenido').innerHTML = "";
    document.getElementById('contenidoEditar').innerHTML = "";
    document.getElementById('contenidoAgregar').innerHTML = "";

    if (clearTitle) {
        document.getElementById('txtTableName').innerHTML = "";
    }
}

function mostrarVacio() {
    document.getElementById('tabla-contenido').innerHTML =
        "<tr><td colspan='10' class='text-center'>No hay datos</td></tr>";
}

/* ────────────────────────────────────────────────────────────── */
/* CONFIGURAR ENCABEZADO VISUAL                                   */
/* ────────────────────────────────────────────────────────────── */

function configurarEncabezado(tabla, nombrePublicotabla) {
    document.getElementById('saludo').style.display = "none";
    document.getElementById('nombre-tabla').value = tabla;

    let titulo = document.getElementById('txtTableName');
    titulo.innerHTML = nombrePublicotabla.toUpperCase();
    titulo.style.display = "block";

    document.getElementById('btn_creador').onclick = () => crear(tabla, nombrePublicotabla);
}

/* ────────────────────────────────────────────────────────────── */
/* TABLA: ENCABEZADO                                              */
/* ────────────────────────────────────────────────────────────── */

function renderHead(tablaElement, tabla, columnasBD) {
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');

    const columnas = tablasChidas[tabla];  // ahora sí existe

    if (!columnas) {
        console.error("No existen columnas para la tabla:", tabla);
        return;
    }

    columnas.forEach((col, index) => {
        const th = document.createElement('th');

        const divCheck = document.createElement('div');
        divCheck.className = 'd-flex justify-content-center align-items-center gap-1';

        const check = document.createElement('input');
        check.type = 'checkbox';
        check.className = 'checkbox-modern';
        check.name = "columnas";
        check.value = col;                  // nombre bonito para UI
        check.dataset.columnaBd = columnasBD[index];   // nombre REAL de BD
        check.addEventListener('change', () => manejarCambioCheckbox(check));

        const label = document.createElement('span');
        label.textContent = col;

        divCheck.appendChild(check);
        divCheck.appendChild(label);
        th.appendChild(divCheck);
        tr.appendChild(th);
    });

    const thAcc = document.createElement('th');
    thAcc.textContent = "Acciones";
    tr.appendChild(thAcc);

    thead.appendChild(tr);
    tablaElement.appendChild(thead);
}


function crearAccionesFila(row, idCol, idValue, tabla, nombrePublico) {

    const td = document.createElement('td');

    const btnEditar = document.createElement('button');
    btnEditar.className = 'btn-material btn-edit me-1';
    btnEditar.innerHTML = "<span class='icon'>✏️</span>";
    btnEditar.onclick = () =>
        llenarFormularioEditar(row, idCol, idValue, tabla, nombrePublico);
    btnEditar.setAttribute('data-bs-toggle', 'modal');
    btnEditar.setAttribute('data-bs-target', '#modalEditar');

    const btnEliminar = document.createElement('button');
    btnEliminar.className = 'btn-material btn-delete';
    btnEliminar.innerHTML = "<span class='icon'>🗑️</span>";
    btnEliminar.onclick = () =>
        eliminar(idValue, idCol, tabla, nombrePublico);

    td.appendChild(btnEditar);
    td.appendChild(btnEliminar);

    return td;
}

function crearCheckboxColumna(col) {
    const divCheck = document.createElement('div');
    divCheck.className = 'form-check d-flex align-items-center justify-content-center';

    const check = document.createElement('input');
    check.type = 'checkbox';
    check.className = 'form-check-input';
    check.name = "columnas";
    check.value = col;

    check.addEventListener('change', () => manejarCambioCheckbox(check));

    const label = document.createElement('label');
    label.className = 'form-check-label ms-1';
    label.textContent = col;

    divCheck.appendChild(check);
    divCheck.appendChild(label);

    return divCheck;
}

function manejarCambioCheckbox(check) {
    const inputColUI = document.getElementById('search_tabla');        // nombre bonito
    const inputBusqueda = document.getElementById('search_id');
    const inputColBD = document.getElementById('nombre-col-bd');       // nombre real BD
    const clearBtn = document.getElementById('clear_btn');

    if (check.checked) {

        document.querySelectorAll('input[name="columnas"]').forEach(c => {
            if (c !== check) c.checked = false;
        });

        inputColUI.value = check.value;                 // nombre bonito
        inputColBD.value = check.dataset.columnaBd;     // nombre real BD
        console.log(check.dataset.columnaBd);
        inputBusqueda.type = "text";

    } else {
        clearBtn.style.display = 'none';
        inputBusqueda.type = "hidden";
        inputColUI.value = "";
        inputColBD.value = "";
    }
}


/* ────────────────────────────────────────────────────────────── */
/* TABLA: CUERPO                                                  */
/* ────────────────────────────────────────────────────────────── */

function renderBody(tablaElement, data, columnas, idCol, tabla, nombrePublico) {
    const tbody = document.createElement('tbody');

    data.forEach(row => {
        const tr = document.createElement('tr');

        columnas.forEach((col, i) => {
            const td = document.createElement('td');
            td.textContent = row[col];
            tr.appendChild(td);
        });

        const idValue = row[idCol];

        tr.appendChild(
            crearAccionesFila(row, idCol, idValue, tabla, nombrePublico)
        );

        /*
        console.log("=== crearAccionesFila ===");
        console.log("row:", row);                 // objeto completo de la fila
        console.log("idCol:", idCol);             // nombre de la columna ID
        console.log("idValue:", idValue);         // valor de la columna ID
        console.log("tabla:", tabla);             // nombre de la tabla
        console.log("nombrePublico:", nombrePublico);
        */
        tbody.appendChild(tr);
    });

    tablaElement.appendChild(tbody);
}

/* ────────────────────────────────────────────────────────────── */
/* MODALES: CAMPOS FORMULARIO                                     */
/* ────────────────────────────────────────────────────────────── */

function renderFormFields(modalEditar, modalAgregar, tabla, columnasBD) {

    const columnas = tablasChidas[tabla];


    columnas.forEach((col, index) => {
        const esId = 0; // Primera columna es el id
        modalEditar.appendChild(crearCampo(col, esId, columnasBD[index]));
        modalAgregar.appendChild(crearCampo(col, esId, columnasBD[index]));
        //console.log("Col ->"+col+"index->"+esId);
    });
}

//=========================================================================================================================================================
//=========================================================================================================================================================
//=========================================================================================================================================================
//=========================================================================================================================================================
function crearCampo(col, isId = false, columnaBD) {
    const div = document.createElement('div');
    div.className = isId ? 'd-none' : 'col-md-6';

    const label = document.createElement('label');
    label.className = 'form-label fw-semibold';
    label.textContent = col; // nombre bonito para UI

    const input = document.createElement('input');
    input.className = 'form-control form-control-modern';
    input.type = isId ? 'hidden' : 'text';
    input.name = columnaBD;  // name = key publica para las validaciones
    input.setAttribute("data-columna", col); // data-columna = key real

    div.appendChild(label);
    div.appendChild(input);

    return div;
}

function llenarFormularioEditar(rowData, idCol, idValue, tabla, nombrePublico) {

    const modal = document.getElementById("contenidoEditar");
    const inputs = modal.querySelectorAll("[data-columna]");
    const columnasBD = Object.keys(rowData);
    const botonEditar = document.getElementById("btnActualizar");

    inputs.forEach((input, i) => {
        input.value = rowData[columnasBD[i]] ?? "";
    });

    // Guardar info del ID
    const newInfo = document.getElementById("newInfo");
    newInfo.setAttribute("data-id", idValue);
    newInfo.setAttribute("data-id-col", idCol);
    newInfo.setAttribute("data-tabla", tabla);

    // 🔥 Fuerza la validación automática de cada input
    const reglas = reglasValidacion[tabla] || {};
    let estado = {};

    inputs.forEach(input => {
        const columnaUI = input.getAttribute("data-columna");
        estado[columnaUI] = false;

        // Buscar mensaje de error al lado del input
        const error = input.nextElementSibling;

        // Validar inmediatamente
        validarInput(input, columnaUI, reglas[columnaUI], estado, error);
    });

    // Activar/desactivar botón según validación
    verificarFormulario(estado, botonEditar);
}
