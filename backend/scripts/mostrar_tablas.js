const tablasChidas = {
    "equipo_trabajo": ["Identificador", "descripcion"],
    "estudio": ["Identificador", "Nombre", "Dirección", "Tipo Entregas", "Encargado", "Jefe"],
    "evento": ["Identificador", "Fecha evento", "Paquete", "Fotos chicas", "Fotos grandes", "Ampliaciones", "Confirmado"],
    "material": ["Identificador", "nombre", "tipo", "stock", "Código Estudio"],
    "material_necesario": ["Identificador", "Identificador material", "Identificador evento", "Cantidad"],
    "nombre_tablas": ["Identificador", "nombre", "precio", "stock"],
    "nota": ["Identificador", "Identificador evento", "Material Necesario", "Equipo", "Descripcion"],
    "usuario": ["Identificador", "Identificador estudio", "Nombres", "Primer Apellido", "Segundo apellido", "Fecha de nacimiento", "Telefono", "Correo", "Privilegios", "Contraseña"],
    "usuario_equipo": ["Identificador", "Identificador equipo"]
};

const reglasValidacion = {
    usuario: {
        "Nombres": { required: true, regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/, mensaje: "Solo letras." },
        "Primer Apellido": { required: true, regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/, mensaje: "Solo letras." },
        "Segundo apellido": { required: true, regex: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/, mensaje: "Solo letras." },
        "Correo": { required: true, regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, mensaje: "Correo inválido." },
        "Telefono": [
            { required: true, mensaje: "Campo obligatorio." },
            { regex: /^[0-9]+$/, mensaje: "Solo números." },
            { regex: /^[0-9]{10}$/, mensaje: "Debe tener 10 dígitos." }
        ],
        "Contraseña": [
            { min: 6, mensaje: "Mínimo 6 caracteres." },
            { regex: /[A-Z]/, mensaje: "Debe tener una mayúscula." },
            { regex: /[0-9]/, mensaje: "Debe tener un número." }
        ],
        "Fecha de nacimiento": {
            required: true,
            custom: (v) => new Date(v) < new Date(),
            mensaje: "Debe ser una fecha válida menor a hoy."
        }
    },

    evento: {
        "Fecha evento": {
            required: true,
            custom: (v) => new Date(v) >= new Date("2000-01-01"),
            mensaje: "Fecha inválida."
        }
    }
};


async function enviar(tabla, nombrePublicotabla) {

    const botonAg = document.getElementById("btn-agregar");
    const tablaElement = document.getElementById('tabla-contenido');
    const modalEditar = document.getElementById('contenidoEditar');
    const modalAgregar = document.getElementById('contenidoAgregar');
    const botonAgregar = document.getElementById("btn_creador");
    const botonEditar = document.getElementById("btnActualizar");

    limpiarTablaYModales();

    try {
        const res = await fetch(`../backend/controllers/procesar_consultas.php?tabla=${tabla}`);
        const data = await res.json();

        if (!Array.isArray(data) || data.length === 0) {
            mostrarVacio();
            return;
        }

        configurarEncabezado(tabla, nombrePublicotabla);
        botonAg.style.display = "block";

        const columnas = Object.keys(data[0]);
        const idColumna = columnas[0];

        renderHead(tablaElement, tabla);
        renderBody(tablaElement, data, columnas, idColumna, tabla, nombrePublicotabla);
        renderFormFields(modalEditar, modalAgregar, tabla);

        activarValidacionDinamica(modalAgregar, tabla, botonAgregar);
        activarValidacionDinamica(modalEditar, tabla, botonEditar);


    } catch (error) {
        console.error(error);
        alert("Error tabla no encontrada");
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

    document.getElementById('btn_creador').onclick = () => crear(tabla);
}

/* ────────────────────────────────────────────────────────────── */
/* TABLA: ENCABEZADO                                              */
/* ────────────────────────────────────────────────────────────── */

function renderHead(tablaElement, tabla) {
    const thead = document.createElement('thead');
    const tr = document.createElement('tr');

    const columnas = tablasChidas[tabla];  // ahora sí existe

    if (!columnas) {
        console.error("No existen columnas para la tabla:", tabla);
        return;
    }

    columnas.forEach(col => {
        const th = document.createElement('th');

        const divCheck = document.createElement('div');
        divCheck.className = 'd-flex justify-content-center align-items-center gap-1';

        const check = document.createElement('input');
        check.type = 'checkbox';
        check.className = 'checkbox-modern';
        check.name = "columnas";
        check.value = col;
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
    const a = document.getElementById('search_tabla');
    const b = document.getElementById('search_id');
    const clearBtn = document.getElementById('clear_btn');

    if (check.checked) {
        document.querySelectorAll('input[name="columnas"]').forEach(c => {
            if (c !== check) c.checked = false;
        });

        a.value = check.value;
        b.type = "text";
    } else {
        clearBtn.style.display = 'none';
        b.type = "hidden";
        a.value = "";
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

        tbody.appendChild(tr);
    });

    tablaElement.appendChild(tbody);
}

/* ────────────────────────────────────────────────────────────── */
/* MODALES: CAMPOS FORMULARIO                                     */
/* ────────────────────────────────────────────────────────────── */

function renderFormFields(modalEditar, modalAgregar, tabla) {

    const columnas = tablasChidas[tabla];

    const esId = 0; // Primera columna es el id
    columnas.forEach((col, index) => {
        console.log(col)
        modalEditar.appendChild(crearCampo(col, esId));
        modalAgregar.appendChild(crearCampo(col, esId));
    });
}


function crearCampo(col, isId = false) {
    const div = document.createElement('div');
    div.className = isId ? 'd-none' : 'col-md-6';

    const label = document.createElement('label');
    label.className = 'form-label fw-semibold';
    label.textContent = col;

    const input = document.createElement('input');
    input.className = 'form-control form-control-modern';
    input.type = isId ? 'hidden' : 'text';
    input.name = col;
    input.setAttribute("data-columna", col);

    div.appendChild(label);
    div.appendChild(input);

    return div;
}




