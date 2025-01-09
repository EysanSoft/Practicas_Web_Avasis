$(document).ready(function () {
  // Eliminar el mensaje "Sin datos." en la tabla.
  $("#tablaUsuarios").empty();

  // Cargar los datos de usuario en la tabla con una solicitud Ajax Get.
  jQuery.ajax({
    url: "../scripts/php/peticiones_tabla_usuarios.php",
    type: "GET",
    dataType: "JSON",
    success: function (result) {
      let data = result.data;
      // console.log(data);
      data.forEach((element) => {
        $("#tablaUsuarios").append(
          `<tr>` +
            `<th scope'row'>${element.userId}</th>` +
            `<td>${element.name}</td>` +
            `<td>${element.lastName}</td>` +
            `<td>${element.phone}</td>` +
            `<td>${element.email}</td>` +
            `<td><button class="btn btn-primary btnEditar" id="${element.userId}" onClick="abrirModalEditarUsuario(${element.userId})">Editar</button></td>` +
            `</tr>`
        );
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
  /*
  $("#tablaUsuarios").on("click",".btnEditar", function () {
    let id = $(this).attr("id");
    alert("click: " + id);
  });
  */
  // Responder al submit del formulario editar usuarios.
  $("#editarUsuariosForm").submit(function (e) {
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
        success: function (response) {
          if (response.status == true) {
            alert("Ha ocurrido un error");
          } else {
            alert(response.message);
          }
        },
        error: function (error) {
          alert("An error occurred: " + error);
        },
      });
    } else {
      $("#mensajeContraNoCo").show();
      return false;
    }
  });
});

/*
  Función que obtiene el usuario desde la tabla, con su respectivo ID,
  carga los datos en el formulario editar usuario, y abre la respectiva modal.
*/
function abrirModalEditarUsuario(postID) {
  /*
    Vacia el contenido del formulario cada vez que la función es llamado,
    para que pueda ser llenado de nuevo con los datos del usuario.
  */
  $("#editarUsuariosForm").empty();
  jQuery.ajax({
    url: "../scripts/php/peticiones_usuario_por_id.php",
    type: "POST",
    dataType: "JSON",
    data: {
      postID: postID,
    },
    success: function (result) {
      let data = result.data;
      console.log(data);
      data.forEach((element) => {
        $("#editarUsuariosForm").append(
          `<div class="d.none">` +
            `<input type="hidden" class="form-control" id="id" name="id" value="${element.userId}"/>` +
            `</div>` +
            `<div class="mb-3">` +
            `<label for="nombre" class="form-label">Nombre</label>` +
            `<input type="text" class="form-control" id="nombre" name="nombre" maxlength="15" value="${element.name}"/>` +
            `</div>` +
            `<div class="mb-3">` +
            `<label for="apellido" class="form-label">Apellido</label>` +
            `<input type="text" class="form-control" id="apellido" name="apellido" maxlength="30" value="${element.lastName}"/>` +
            `</div>` +
            `<div class="mb-3">` +
            `<label for="correo" class="form-label">Correo</label>` +
            `<input type="email" class="form-control" id="correo" name="correo" value="${element.email}"/>` +
            `</div>` +
            `<div class="mb-3">` +
            `<label for="telefono" class="form-label">Telefono</label>` +
            `<input type="tel" class="form-control" id="telefono" name="telefono" value="${element.phone}"/>` +
            `</div>` +
            `<div class="mb-3">` +
            `<div class="alert alert-danger" id="mensajeContraNoCo" role="alert">` +
            `¡La contraseñas ingresadas no coinciden! Vuelva a intentarlo.` +
            `</div>` +
            `<div class="mb-3">` +
            `<button class="btn btn-primary" id="submit">Guardar Cambios</button>` +
            `</div>`
        );
        $("#mensajeContraNoCo").hide();
        $("#modalEditarUsuario").modal("show");
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
}
