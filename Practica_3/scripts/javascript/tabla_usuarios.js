$(document).ready(function () {
  // Eliminar el mensaje "Sin datos." en la tabla.
  $("#tablaUsuarios").empty();

  // Cargar los datos de usuario en la tabla con una solicitud Ajax GET.
  jQuery.ajax({
    url: "../scripts/php/peticion_todos_los_usuarios.php",
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
            `<td><button class="btn btn-primary" id="${element.userId}" onClick="abrirModalEditarUsuario(${element.userId})">Editar</button><button class="btn btn-danger" id="${element.userId}" onClick="abrirModalEliminarUsuario(${element.userId})">Eliminar</button></td>` +
            `</tr>`
        );
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });

  // Responder al submit del formulario editar usuarios con un ajax POST.
  $("#editarUsuariosForm").submit(function (e) {
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
          alert(response.message);
          $("#modalEditarUsuario").modal("hide");
          location.reload();
        } 
        else {
          // Error del servidor...
          alert(response.message);
        }
      },
      error: function (error) {
        alert("An error occurred: " + error);
      },
    });
  });

  // Responder al submit del formulario editar la contraseña con un ajax POST.
  $("#editarContraForm").submit(function (e) {
    e.preventDefault();
    // Falta el endpoint para probar el metodo...
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
          alert(response.message);
          $("#modalEditarUsuario").modal("hide");
          location.reload();
        } 
        else {
          // Error del servidor...
          alert(response.message);
        }
      },
      error: function (error) {
        alert("An error occurred: " + error);
      },
    });
  });

  // Sucio hack para simular el funcionamiento de tabs en una modal.
  $("#tabCambiarContra").on("click", function () {
    $("#contenedorDinamico1").hide();
    $("#contenedorDinamico2").show();
  });
  $("#tabCambiarUsuario").on("click", function () {
    $("#contenedorDinamico1").show();
    $("#contenedorDinamico2").hide();
  });
});
/*
  Función que obtiene el usuario desde la tabla, con su respectivo ID,
  carga los datos en el formulario editar usuario, y abre la respectiva modal.
*/
function abrirModalEditarUsuario(postID) {
  //  Ocultar los elementos dinamicos...
  $("#mensajeConNoCoin").hide();
  $("#mensajeConInco").hide();
  $("#contenedorDinamico2").hide();

  /*
    Vacia el contenido del formulario cada vez que la función es llamado,
    para que pueda ser llenado de nuevo con los datos del usuario con un ajax POST.
  */
  $("#editarUsuariosForm").empty();
  jQuery.ajax({
    // Mejorar...
    url: "../scripts/php/peticion_usuario_por_id.php",
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
            `<button class="btn btn-primary" id="submit">Guardar Cambios</button>` +
            `</div>`
        );
        $("#modalEditarUsuario").modal("show");
      });
    },
    error: function (error) {
      console.error("Error:", error);
    },
  });
}

/*
Función para abrir la modal de eliminar usuarios,
y cargar el boton de eliminar con su ID correspondiente,
vaciando el contenido del footer de la modal anterior.
*/
function abrirModalEliminarUsuario(postID) {
  $("#modalEliminarUsuarioFooter").empty();
  $("#modalEliminarUsuarioFooter").append(
    `<button type="button" class="btn btn-danger id="${postID}" onClick="peticionEliminarUsuario(${postID})">Sí</button>` +
    `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>`
  );
  $("#modalEliminarUsuario").modal("show");
}

// Función que realizar la peticion ajax POST para eliminar un usuario.
function peticionEliminarUsuario(userID) {
  jQuery.ajax({
    // Falta el endpoint para probar el metodo...
    url: "../scripts/php/peticion_eliminar_usuario_por_id.php",
    type: "POST",
    dataType: "JSON",
    data: {
      userID: userID,
    },
    success: function (response) {
      if (response.status == true) {
        alert(response.message);
        $("#modalEliminarUsuario").modal("hide");
        location.reload();
      } 
      else {
        // Error del servidor...
        alert(response.message);
      }
    },
    error: function (error) {
      alert("An error occurred: " + error);
    },
  });
}
