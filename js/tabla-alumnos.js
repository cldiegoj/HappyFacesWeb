// Función para actualizar la tabla de alumnos
function actualizarTablaAlumnos() {
    $.ajax({
        url: 'actualizar_alumnos.php', // Archivo PHP que devuelve los datos actualizados
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Limpiar la tabla actual
            $('#tabla-alumnos tbody').empty();
            // Recorrer los datos y agregar filas a la tabla
            data.forEach(function(alumno) {
                var fila = '<tr class="text-center">';
                fila += '<td>' + alumno[0] + '</td>';
                fila += '<td>' + alumno[1] + '</td>';
                fila += '<td>' + alumno[2] + '</td>';
                fila += '<td>' + alumno[3] + '</td>';
                fila += '<td>' + alumno[4] + '</td>';
                fila += '<td><a href=""><img src="imagenes/edit.png" width="50" height="50"></a></td>';
                fila += '<td><a href="dashboard.php?action=delete&id_alumno=' + alumno[0] + '"><img src="imagenes/eliminar.png" width="50" height="50"></a></td>';
                fila += '</tr>';
                $('#tabla-alumnos tbody').append(fila);
            });
        },
        error: function() {
            alert('Error al actualizar la tabla de alumnos');
        }
    });
}

// Llamar a esta función después de agregar un nuevo registro o eliminar uno existente
$(document).ready(function() {
    // Evento para el botón de guardar (añadir nuevo registro)
    $('#boton-guardar').click(function(e) {
        e.preventDefault();
        // Tu código AJAX para guardar el nuevo registro aquí
        $.ajax({
            url: 'dashboard.php', // Archivo PHP que procesa el formulario
            type: 'POST',
            data: $('#dashboard.php').serialize(), // Datos del formulario serializados
            success: function(response) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: 'Registro actualizado',
                    text: 'Los datos fueron correctamente ingresados',
                    icon: 'success'
                });
                // Actualizar la tabla de alumnos
                actualizarTablaAlumnos();
            },
            error: function() {
                // Mostrar mensaje de error
                Swal.fire({
                    title: 'Error en registro',
                    text: 'Hubo un error al momento de registrar los datos',
                    icon: 'error'
                });
            }
        });
    });

    // Evento para el botón de eliminar (eliminar registro)
    // El código para el botón de eliminar ya maneja la actualización de la tabla
});
