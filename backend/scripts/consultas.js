const input = document.getElementById('search_id');
const clearBtn = document.getElementById('clear_btn');
const nombreTabla = document.getElementById('nombre-tabla-bd');
const nombrePublicTabla = document.getElementById('nombre-publico-tabla-bd');
const nombreColuma = document.getElementById('nombre-col-bd');
const identificar = document.getElementById('search_tabla');

// 👉 EVENTO cuando el usuario ESCRIBE el valor a buscar
input.addEventListener('input', () => {

    clearBtn.style.display = input.value ? 'block' : 'none';

    const tablaBD = nombreTabla.value;      
    const columnaBD = nombreColuma.value;   
    const idBuscado = input.value;          
    const nombrePublicotabla = nombrePublicTabla.value;

    if (tablaBD && columnaBD) {
        enviarFiltro(tablaBD, columnaBD, nombrePublicotabla, idBuscado);
    }
});

// 👉 BOTÓN limpiar búsqueda
clearBtn.addEventListener('click', () => {

    input.value = '';
    clearBtn.style.display = 'none';
    input.focus();

    const tablaSel = nombreTabla.value;
    const nombrePublico = nombrePublicTabla.value;

    enviar(tablaSel, nombrePublico);
});

clearBtn
