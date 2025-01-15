<?php
class EndPoints {
    static $apiUrl = "https://pruebas.avasisservices.com/";

    ### Usuarios ###
    static $registrarUsuario = "user/create/"; // POST
    static $obtenerUsuario = "user/data/"; // GET
    static $editarUsuario = "user/edit/"; // PUT
    static $editarContra = "user/edit/password"; // PUT
    static $editarFotoPerfil = "user/img"; // PUT
    static $eliminarUsuario = "user/delete/"; // DELETE
    ### Fin Usuarios ###
}
?>