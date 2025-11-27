// ---------- REGLAS ----------
const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/;
const soloNumeros = /^[0-9]+$/;
const longitud = /^.{10}$/;
const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const inputs = {
    fecha_nac: document.getElementById("fecha-form02"),
    nombre: document.getElementById("nombre-form02"),
    primer_ap: document.getElementById("primerap-form02"),
    segundo_ap: document.getElementById("segundoap-form02"),
    email: document.getElementById("email-form02"),
    telefono: document.getElementById("telefono-form02"),
    password: document.getElementById("password-form02"),
    confirmar: document.getElementById("confirmar-form02")
};

const boton = document.querySelector("button[type='submit']");

let estadoCampos = {
    nombre: false,
    primer_ap: false,
    segundo_ap: false,
    email: false,
    telefono: false,
    password: false,
    confirmar: false,
    fecha_nac: false
};

// ---------- Checa que todo esté bien ----------
function verificarFormulario() {
    const todoValido = Object.values(estadoCampos).every(v => v === true);
    boton.disabled = !todoValido;

    //deshabilitado
    boton.style.opacity = todoValido ? "1" : "0.6";
}

// ---------- Forma general de ----------
function validarEnVivo(input, nombreCampo, condicion, mensaje) {
    let error = input.nextElementSibling;

    // Crear mensaje si no existe
    if (!error || !error.classList.contains("mensaje-error")) {
        error = document.createElement("p");
        error.className = "mensaje-error";
        error.style.color = "red";
        error.style.fontSize = "0.9rem";
        error.style.margin = "3px 0 0 5px";
        error.style.display = "none";
        input.insertAdjacentElement("afterend", error);
    }

    input.addEventListener("input", () => {
        if (input.value.trim() === "") {
            input.style.borderColor = "";
            error.style.display = "none";
            estadoCampos[nombreCampo] = false;
        }
        else if (!condicion(input.value)) {
            input.style.borderColor = "red";
            error.textContent = mensaje;
            error.style.display = "block";
            estadoCampos[nombreCampo] = false;
        }
        else {
            input.style.borderColor = "green";
            error.style.display = "none";
            estadoCampos[nombreCampo] = true;
        }

        verificarFormulario();
    });
}

// ---------- VALIDACIONES INDIVIDUALES ----------
validarEnVivo(inputs.nombre, "nombre", (v) => soloLetras.test(v), "Solo se permiten letras.");
validarEnVivo(inputs.primer_ap, "primer_ap", (v) => soloLetras.test(v), "Solo se permiten letras.");
validarEnVivo(inputs.segundo_ap, "segundo_ap", (v) => soloLetras.test(v), "Solo se permiten letras.");
validarEnVivo(inputs.email, "email", (v) => emailValido.test(v), "Correo electrónico inválido.");
validarEnVivo(inputs.telefono, "telefono", (v) => soloNumeros.test(v), "Solo se permiten números.");
validarEnVivo(inputs.telefono, "telefono", (v) => longitud.test(v), "Deben de ser 10 digitos.");
validarEnVivo(inputs.password, "password", (v) => v.length >= 6, "Debe tener mínimo 6 caracteres.");
validarEnVivo(inputs.fecha_nac, "fecha_nac", (v) => {
    if (!v) return false; // vacío

    const fechaIngresada = new Date(v);
    const hoy = new Date();

    // Debe ser menor al día de hoy
    return fechaIngresada < hoy;
}, "Debe ingresar una fecha válida y menor al día de hoy.");


// ---------- VALIDAR CONFIRMAR CONTRASEÑA ----------
inputs.confirmar.addEventListener("input", () => {
    let error = inputs.confirmar.nextElementSibling;

    if (!error || !error.classList.contains("mensaje-error")) {
        error = document.createElement("p");
        error.className = "mensaje-error";
        error.style.color = "red";
        error.style.fontSize = "0.9rem";
        error.style.margin = "3px 0 0 5px";
        error.style.display = "none";
        inputs.confirmar.insertAdjacentElement("afterend", error);
    }

    if (inputs.confirmar.value === "") {
        inputs.confirmar.style.borderColor = "";
        error.style.display = "none";
        estadoCampos.confirmar = false;
    }
    else if (inputs.password.value !== inputs.confirmar.value) {
        inputs.confirmar.style.borderColor = "red";
        error.textContent = "Las contraseñas no coinciden.";
        error.style.display = "block";
        estadoCampos.confirmar = false;
    }
    else {
        inputs.confirmar.style.borderColor = "green";
        error.style.display = "none";
        estadoCampos.confirmar = true;
    }

    verificarFormulario();
});

// ---------- DESHABILITAR EL BOTÓN AL INICIAR ----------
boton.disabled = true;
boton.style.opacity = "0.6";

//--------------------------------------------------------------------------------------------------------

document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("form-crear-cuenta");

    form.addEventListener("submit", async (e) => {
        e.preventDefault(); // evita recargar la página

        const datos = new FormData(form);

        try {
            const respuesta = await fetch("../backend/controllers/cuenta/crear_cuenta.php", {
                method: "POST",
                body: datos
            });

            const texto = await respuesta.text();   // ⬅ cambia TEMPORALMENTE
            console.log("Respuesta del servidor:", texto);

            const resultado = JSON.parse(texto);    // ⬅ sin .json()

            //const resultado = await respuesta.json();

            if (resultado.status === "ok") {
                alert("Cuenta creada correctamente");
                window.location.href = "acceder"; // redirige si tú quieres
            } else {
                alert("Error: " + resultado.msg);
            }

        } catch (error) {
            alert("Error en la petición");
            console.log(error);
        }

    });
});
