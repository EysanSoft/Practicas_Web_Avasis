$(document).ready(function () {
  $("#tablaUsuarios").empty();

  jQuery.ajax({
    url: "../scripts/php/peticiones_tabla_usuarios.php",
    type: "GET",
    dataType: "JSON",
    success: function (result) {
      let data = result.data;
      console.log(data);
      data.forEach((element) => {
        $("#tablaUsuarios").append(
          `<tr>` +
            `<th scope'row'>${element.userId}</th>` +
            `<td>${element.name}</td>` +
            `<td>${element.lastName}</td>` +
            `<td>${element.phone}</td>` +
            `<td>${element.email}</td>` +
            `<td><button class="btn btn-primary" id="botonModalEU">Editar</button></td>` +
            `</tr>`
        );
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });

  $("#botonModalEU").click(function () {
    console.log("Hola.");
    $("#modalEditarUsuario").modal("show");
  });
});
