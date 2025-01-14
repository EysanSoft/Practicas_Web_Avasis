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
        },
        success: function (response) {
          $("#submit").prop("disabled", false);
          if (response.status == true) {
            $("#modalAlert").modal("show");
          } 
          else {
            alert(response.errors);
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
  //   $("#botonModal").on("click", function () {
  //     $("#modalAlert").modal("show");
  //   });
});
