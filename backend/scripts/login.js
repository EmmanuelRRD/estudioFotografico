function login() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    fetch("../backend/controllers/validar_usuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "ok") {
                
                window.location.replace("../backend/pages/usuarioAdministrador.php");
                alert(data.message);
            } else {
                console.log("Error:", data.message);
            }
            
        })

        
        .catch(err => console.error("Error en fetch:", err));
}

function mostrarToast(msg) {
    // Aquí pones tu librería de toast o el tuyo propio
    alert(msg); // ejemplo simple
}