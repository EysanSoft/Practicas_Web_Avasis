$(document).ready(function () {
  $("#mensajeError").hide();

  $("#myForm").submit(function (e) {
    let contra_1 = $("#contra").val();
    let contra_2 = $("#conContra").val();
    if (contra_1 == contra_2) {
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
        beforeSend: function() {
          $("#submit").prop("disabled", true);
          $(".submitRegistrarUsuario").empty();
          $(".submitRegistrarUsuario").append(`
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Registrandote...</span>
          `);
        },
        success: function (response) {
          // Botón submit con spinner.
          $("#submit").prop("disabled", false);
          $(".submitRegistrarUsuario").empty();
          $(".submitRegistrarUsuario").append("Registrarte");
          // Modal con mensaje.
          $("#contenidoModal").empty();
          $("#contenidoModal").append(`<p>${response.message}</p>`);
          $("#modalAlert").modal("show");
          if (response.status == true) {
            $("#botonCerrarModal").attr("onClick", "location.reload()");
          }
          else {
            $("#botonCerrarModal").attr("onClick", "");
          } 
        },
        error: function (error) {
          alert("An error occurred: " + error);
        },
      });
    } 
    else {
      $("#mensajeError").show();
      return false;
    }
  });
});
