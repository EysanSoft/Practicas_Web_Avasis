$(document).ready(function () {
  $("#formularioRegistrarUsuariosConXlsx").submit(function (e) {
    e.preventDefault();
    let datos = new FormData(this);
    let urlForm = $(this).attr("action");
    $.ajax({
      url: urlForm,
      type: "POST",
      data: datos,
      dataType: "json",
      processData: false,
      contentType: false,
      beforeSend: function () {
        $("#submitRegistrarUsuariosConXlsx").prop("disabled", true);
        $("#submitRegistrarUsuariosConXlsx").empty();
        $("#submitRegistrarUsuariosConXlsx").append(`
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Registrando...</span>
        `);
      },
      success: function (response) {
        // Botón submit con spinner.
        $("#submitRegistrarUsuariosConXlsx").prop("disabled", false);
        $("#submitRegistrarUsuariosConXlsx").empty();
        $("#submitRegistrarUsuariosConXlsx").append("Registrar Usuarios");
        // Mostrar Alert.
        if (response.status == true) {
          let $mensaje = response.message;

          if (typeof response.failedEntries !== "undefined") {
            let $listaEntradasFallidas = "";

            for (let i = 0; i < response.failedEntries.length; i++) {
              $listaEntradasFallidas += "<b style='color:red;'>" + response.failedEntries[i] + "</b><br>";
            }
            // Mensaje personalizado con HTML.
            let $mensajeCompleto = 
              $mensaje +
              "<hr>" + 
              $listaEntradasFallidas + 
              "<hr>" +
              "<small>NOTA: Los requisitos de cada campo son los siguientes: </small><br>" +
              "<small>Los <em>nombres</em> deben de ser <b>desde 3 hasta 50 caracteres</b>.</small><br>" +
              "<small>Los <em>apellidos</em> deben de ser <b>desde 4 hasta 200 caracteres</b>.</small><br>" +
              "<small>El <em>teléfono</em> debe de ser <b>de 10 caracteres como máximo</b>.</small><br>" +
              "<small>El <em>correo</em> debe de ser <b>desde 5 hasta 20 caracteres</b>.</small><br><br>" +
              "<small>La <em>contraseña</em> debe de contener como mínimo: </small><br>" +
              "<small><b>8 caracteres</b>, una letra <b>en mayúscula</b>, una letra <b>en minúscula</b>, un <b>número</b> y un <b>símbolo especial</b>.</small>";

            Swal.fire({
              title: "Registro Exitoso, pero...",
              html: $mensajeCompleto,
              icon: "warning",
              confirmButtonText: "Entendido",
            });
          }
          else {
            Swal.fire({
              title: '¡Registro Exitoso!',
              text: response.message,
              icon: 'success',
              confirmButtonText: 'Entendido'
            });
          }
        }
        else {
          Swal.fire({
            title: "Ha ocurrido un error...",
            text: response.message,
            icon: "error",
            confirmButtonText: "Entendido",
          });
        }
      },
      error: function (error) {
        Swal.fire({
          title: "Ha ocurrido un error técnico...",
          text: error + "\n Comuníquese con el administrador del sistema.",
          icon: "error",
          confirmButtonText: "Entendido",
        });
      },
    });
  });

  $("#botonDescargarTodosUsuarios").on("click", function () {
    jQuery.ajax({
      url: "scripts/php/peticion_descargar_todos_los_usuarios.php",
      type: "GET",
      dataType: "JSON",
      success: function (result) {
        if (result.status == true) {
          Swal.fire({
            title: 'Descarga Exitosa',
            text: result.message,
            icon: 'success',
            confirmButtonText: 'Entendido'
          });
        }
        else {
          Swal.fire({
            title: "Ha ocurrido un error...",
            text: result.message,
            icon: "error",
            confirmButtonText: "Entendido",
          });
        }
      },
      error: function (error) {
        Swal.fire({
          title: "Ha ocurrido un error técnico...",
          text: error + "\n Comuníquese con el administrador del sistema.",
          icon: "error",
          confirmButtonText: "Entendido",
        });
      },
    });
  });
});
