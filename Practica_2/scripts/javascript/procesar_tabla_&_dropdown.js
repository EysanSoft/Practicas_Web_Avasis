$(document).ready(function () {
  /*
  Obtiene el valor del componente cuando se interactua con el dropdown.
  Dicho valor se pasa como variable a la funcion ajax.
  */
  $("#dropdownIndexTable").on("change", function () {
    let id = $(this).val();
    ajaxTabla(id);
  });
});

// Petición ajax POST para obtener los comentarios en la tabla segun el id.
function ajaxTabla(postID) {
  // Limpia la tabla antes de la nueva petición.
  $("#miTabla").empty();
  jQuery.ajax({
    url: "scripts/php/peticion_comentarios.php",
    type: "POST",
    dataType: "JSON",
    data: {
      postID: postID,
    },
    success: function (result) {
      result.forEach((element) => {
        $("#miTabla").append(
          `<tr>` +
          `<th scope'row'>"${element.id}"</th>` +
          `<td>"${element.name}"</td>` +
          `<td>"${element.email}"</td>` +
          `<td>"${element.body}"</td>` +
          `</tr>`
        );
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
}
