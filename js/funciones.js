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
        $('#contenedor-tablas').load('views/tablas.php', function() {
            inicializarDataTables();
            // Reasigna eventos si es necesario
        });
    }

    // Inicializar DataTables
    function inicializarDataTables() {
        if ($.fn.DataTable.isDataTable('#tablaClientes')) {
            $('#tablaClientes').DataTable().destroy();
        }
        if ($.fn.DataTable.isDataTable('#tablaProveedores')) {
            $('#tablaProveedores').DataTable().destroy();
        }
        $('#tablaClientes').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
        $('#tablaProveedores').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    }
    inicializarDataTables();

    // Eliminar cliente/proveedor (delegado)
    $(document).on('click', '.eliminar-cliente, .eliminar-proveedor', function() {
        var tipo = $(this).hasClass('eliminar-cliente') ? 'cliente' : 'proveedor';
        if(confirm(`¿Seguro que deseas eliminar este ${tipo}?`)) {
            var id = $(this).data('id');
            $.post('views/eliminar.php', { tipo: tipo, id: id }, function(respuesta) {
                if(respuesta.trim() === "ok") {
                    mostrarAlerta(`${tipo.charAt(0).toUpperCase() + tipo.slice(1)} eliminado correctamente.`, 'success');
                    recargarTablas();
                } else {
                    mostrarAlerta(`Error al eliminar el ${tipo}.`, 'danger');
                }
            });
        }
    });

    // AJAX para agregar cliente/proveedor (delegado)
    $(document).on('submit', '#formCliente, #formProveedor', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('id') === 'formCliente' ? 'views/procesar_cliente.php' : 'views/procesar_proveedor.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                form.closest('.modal').modal('hide');
                mostrarAlerta((url.includes('cliente') ? 'Cliente' : 'Proveedor') + ' agregado correctamente.', 'success');
                recargarTablas();
            },
            error: function() {
                mostrarAlerta('Error al guardar.', 'danger');
            }
        });
    });

    // Botón editar cliente/proveedor
    $(document).on('click', '.btn-editar-cliente', function() {
        $('#editClienteId').val($(this).data('id'));
        $('#editNombre').val($(this).data('nombre'));
        $('#editTelefono').val($(this).data('telefono'));
        $('#editCorreo').val($(this).data('correo'));
        $('#editDireccion').val($(this).data('direccion'));
        $('#modalEditarCliente').modal('show');
    });
    $(document).on('click', '.btn-editar-proveedor', function() {
        $('#editProveedorId').val($(this).data('id'));
        $('#editProveedorNombre').val($(this).data('nombre'));
        $('#editProveedorContacto').val($(this).data('contacto'));
        $('#editProveedorDireccion').val($(this).data('direccion'));
        $('#editProveedorCiudad').val($(this).data('ciudad'));
        $('#modalEditarProveedor').modal('show');
    });

    // Enviar formulario de edición 
    $(document).on('submit', '#formEditarCliente, #formEditarProveedor', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('id') === 'formEditarCliente' ? 'views/editar_cliente.php' : 'views/editar_proveedor.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                form.closest('.modal').modal('hide');
                mostrarAlerta((url.includes('cliente') ? 'Cliente' : 'Proveedor') + ' editado correctamente.', 'success');
                recargarTablas();
            },
            error: function() {
                mostrarAlerta('Error al editar.', 'danger');
            }
        });
    });

    // Activar modo edición en tabla (opcional)
    $(document).on('click', '.btn-editar-tabla', function() {
        var tablaId = $(this).data('tabla');
        $('#' + tablaId + ' td.editable').attr('contenteditable', 'true').addClass('bg-warning');
    });

    // Guardar cambios al salir de la celda (opcional)
    $('table').on('blur', 'td[contenteditable="true"]', function() {
        var nuevoValor = $(this).text();
        $(this).removeClass('bg-warning');
    });
});