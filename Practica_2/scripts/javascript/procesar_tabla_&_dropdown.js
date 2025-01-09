$(document).ready(function () {
  /*
  let defaultID = 1;
  ajaxTabla(defaultID);
  */
  $("#dropdownIndexTable").on("change", function () {
    let id = $(this).val();
    ajaxTabla(id);
    // alert(id);
  });
});

function ajaxTabla(postID) {
  $("#miTabla").empty();
  jQuery.ajax({
    url: "scripts/php/peticion_comentarios.php",
    type: "POST",
    dataType: "JSON",
    data: {
      postID: postID,
    },
    success: function (result) {
      // let datos = JSON.parse(result);
      // console.log(result[0].name);
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
