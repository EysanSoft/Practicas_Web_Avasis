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
          if(typeof response.failedEntries !== 'undefined') {
            let $mensaje = response.message;
            for (let i = 0; i < response.failedEntries.length; i++) {
              $mensaje += "\n" + response.failedEntries[i];
            }
            alert($mensaje);
          }
          else {
            alert(response.message);
            location.reload();
          }
        }
        else {
          alert(response.message);
        }
      },
      error: function (error) {
        alert("Ajax Fracaso.");
        alert("An error occurred: " + error);
      },
    });
  });
});
