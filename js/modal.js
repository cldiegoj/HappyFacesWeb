document.addEventListener("DOMContentLoaded", function () {
    // Obtener el modal
    var modal = document.getElementById("modelo");

    // Obtener el botón que abre el modal
    var btn = document.getElementById("button");

    // Obtener el botón que cierra el modal
    var btn_cerrar = document.getElementById("boton-guardar");

    // Cuando el usuario hace clic en el botón, se abre el modal
    btn.onclick = function () {
        modal.style.display = "flex";
    }

    // Cuando el usuario hace clic en el botón guardar, se cierra el modal
    btn_cerrar.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});
