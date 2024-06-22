document.addEventListener("DOMContentLoaded", function () {
    // Obtener el modal
    var modal = document.getElementById("modelo");

    // Obtener el botón que abre el modal
    var btn = document.getElementById("button");

    // Obtener el elemento <span> que cierra el modal
    var span = document.getElementsByClassName("close")[0];

    // Cuando el usuario hace clic en el botón, se abre el modal
    btn.onclick = function () {
        modal.style.display = "grid";
    }

    // Cuando el usuario hace clic en <span> (x), se cierra el modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic en cualquier lugar fuera del modal, se cierra
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
