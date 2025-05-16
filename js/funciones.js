$(document).ready(function() {
    // Función para mostrar alertas
    window.mostrarAlerta = function(mensaje, tipo) {
        $('#alerta').html(
            `<div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
                ${mensaje}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>`
        );
    }

    // Función para recargar solo las tablas
    window.recargarTablas = function() {
        $('#contenedor-tablas').load('tablas.php', function() {
            // Opcional: puedes poner aquí código que necesite ejecutarse después de recargar la tabla
        });
    }

    // Eliminar cliente
    $(document).on('click', '.eliminar-cliente', function() {
        if(confirm('¿Seguro que deseas eliminar este cliente?')) {
            var id = $(this).data('id');
            $.post('views/eliminar.php', { tipo: 'cliente', id: id }, function(respuesta) {
                if(respuesta.trim() === "ok") {
                    mostrarAlerta('Cliente eliminado correctamente.', 'success');
                    recargarTablas();
                } else {
                    mostrarAlerta('Error al eliminar el cliente.', 'danger');
                }
            });
        }
    });

    // Eliminar proveedor
    $(document).on('click', '.eliminar-proveedor', function() {
        if(confirm('¿Seguro que deseas eliminar este proveedor?')) {
            var id = $(this).data('id');
            $.post('views/eliminar.php', { tipo: 'proveedor', id: id }, function(respuesta) {
                if(respuesta.trim() === "ok") {
                    mostrarAlerta('Proveedor eliminado correctamente.', 'success');
                    recargarTablas();
                } else {
                    mostrarAlerta('Error al eliminar el proveedor.', 'danger');
                }
            });
        }
    });
});

$(document).ready(function() {
    // AJAX para agregar cliente
    $('#formCliente').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'views/procesar_cliente.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(respuesta) {
                $('#modalCliente').modal('hide');
                mostrarAlerta('Cliente agregado correctamente.', 'success');
                setTimeout(function() { location.reload(); }, 1500);
            },
            error: function() {
                mostrarAlerta('Error al guardar el cliente.', 'danger');
            }
        });
    });

    // AJAX para agregar proveedor
    $('#formProveedor').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'views/procesar_proveedor.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(respuesta) {
                $('#modalProveedor').modal('hide');
                mostrarAlerta('Proveedor agregado correctamente.', 'success');
                setTimeout(function() { location.reload(); }, 1500);
            },
            error: function() {
                mostrarAlerta('Error al guardar el proveedor.', 'danger');
            }
        });
    });
});