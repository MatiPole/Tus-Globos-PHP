<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
require_once "resources/controllers/Usuarios.php";
require_once "resources/controllers/Carrito.php";
$miCarrito = new Carrito;
// Obtener lista de usuarios
$miObjeto = new Usuarios;
$Usuarios = $miObjeto->traer_usuarios();
if (!isset($_SESSION['user'])) {
    // Redirigir al usuario de vuelta al index.php
    header("Location: ../../../index.php");
    exit; // Asegurarse de que el código después de la redirección no se ejecute
}

?>

<!DOCTYPE html>
<html lang="en">
<?php

include "public/views/parts/head.php";
?>
<header>
        <nav class="navbar navbar-expand-lg bg-light p-0">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="index.php>">
                    <img src="public/views/assets/img/logo-tus-globos.svg" alt="alt-logo" class="d-inline-block align-text-center logo-nav"">             
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                                    <h3 class="nav-item">¡Hola <?php echo($_SESSION['user']['nombre'])?>!</h3>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
 <li class="nav-item"><a class="nav-link" href="includes-login/logout.php">Logout</a></li>
                </ul>
                </div>
            </div>
        </nav>
</header>


<?php
// Generar la tabla HTML
echo '
<div  class="agregarUsuario">
<button id="agregarUsuario">Agregar Usuario</button>
</div>

<table class="table-editar-usuarios">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Contraseña</th>
      <th>Direccion</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>';

foreach ($Usuarios as $usuario) {
    echo '
    <tr>
      <td>' . $usuario->id . '</td>
      <td>' . $usuario->nombre . '</td>
      <td>' . $usuario->apellido . '</td>
      <td>' . $usuario->email . '</td>
      <td>' . $usuario->password . '</td>
      <td>' . $usuario->direccion . '</td>
      <td>
      <button class="editar-usuario" data-id="' . $usuario->id . '" data-nombre="' . $usuario->nombre . '" data-apellido="' . $usuario->apellido . '" data-email="' . $usuario->email . '" data-email="' . $usuario->password .  '" data-direccion="' . $usuario->direccion . '">Editar</button>

      <button onclick="eliminarUsuario(' . $usuario->id . ')">Eliminar</button>
      </td>
    </tr>';
}

echo '
  </tbody>
</table>';
?>

<!-- Modal para editar el usuario -->
<div id="modalEditar" class="modal">
  <div class="modal-content">
    <h2>Editar Usuario</h2>
    <form id="formularioEditar">
      <!-- Campos de edición -->
      <input type="text" id="editId" name="editId" placeholder="ID">
      <input type="text" id="editnombre" name="editnombre" placeholder="nombre">
      <input type="text" id="editapellido" name="editapellido" placeholder="apellido">
      <input type="mail" id="editemail" name="editemail" placeholder="email">
      <input type="text" id="editpassword" name="editpassword" placeholder="password">
      <input type="text" id="editdireccion" name="editdireccion" placeholder="direccion">
      <!-- Otros campos de edición -->      
      <div><button type="button" id="guardarUsuario" name="guardar" >Guardar</button>
       <button type="button" id="salir" name="salir" >Salir Sin Guardar</button></div>
    </form>
  </div>
</div>

<!-- Estilos CSS para el modal -->
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  width: 80%;
}

</style>

<script>
 // Función para abrir el modal de edición y rellenar los campos con los datos del producto
 $(document).on('click', '.editar-usuario', function() {
  // Obtener los datos del atributo data del botón
  let id = $(this).data('id');
  let nombre = $(this).data('nombre');
  let apellido = $(this).data('apellido');
  let email = $(this).data('email');
  let password = $(this).data('password');
  let direccion = $(this).data('direccion');

  // Rellenar los campos del formulario con los datos del usuario
  $('#editId').val(id);
  $('#editnombre').val(nombre);
  $('#editapellido').val(apellido);
  $('#editemail').val(email);
  $('#editpassword').val(password);
  $('#editdireccion').val(direccion);

  // Mostrar el modal
  $('#modalEditar').show();
});

 $('#salir').on('click', function() {
  $('#modalEditar').hide();
});

// Función para guardar los cambios
// Controlador de eventos para el botón "Guardar"
$('#guardarUsuario').on('click', function() {
  // Obtener los valores de los campos del formulario
  let id = $('#editId').val();
  let nombre = $('#editnombre').val();
  let apellido = $('#editapellido').val();
  let email = $('#editemail').val();
  let password = $('#editpassword').val();
  let direccion = $('#editdireccion').val();


  // Crear un objeto con los datos a enviar al servidor
  let data = {
    id: id,
    nombre: nombre,
    apellido: apellido,
    email: email,
    password: password,
    direccion: direccion
  };

console.log(data);
  // Enviar la solicitud AJAX al servidor
  $.ajax({
    url: 'public/funciones/obtener_usuario.php', // URL del script PHP que procesará la solicitud
    method: 'POST',
    data: data,
    success: function(response) {
      // La solicitud se ha completado con éxito  
     
      // Cerrar el modal
      $('#modalEditar').hide();
      location.reload();
    },
    error: function(xhr, status, error) {
      // Se produjo un error en la solicitud     
      console.error(error);
    }
  });
});


function eliminarUsuario(id) {
  if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
    $.ajax({
      type: "POST",
      url: "public/funciones/eliminar_usuario.php",
      data: { id: id },
      success: function (response) {
        // Procesar la respuesta del servidor       
          // Eliminación exitosa
          alert("Usuario eliminado correctamente");
          // Actualizar la página o realizar alguna otra acción necesaria
          location.reload();  
 
      },
      error: function () {
        // Error de conexión u otro error en la solicitud AJAX
        alert("Error en la solicitud AJAX");
      }
    });
  }
  
}

</script>


<!-- //agregar productos -->

<!-- Modal Agregar Usuarios -->
<div id="modalAgregar" class="modal">
  <div class="modal-content">
    <h2>Agregar Usuario</h2>
    <form id="formularioAgregar">
      <!-- Campos de edición -->
      <input type="text" id="addNombre" name="addNombre" placeholder="Nombre">
      <input type="text" id="addApellido" name="addApellido" placeholder="Apellido">
      <input type="mail" id="addEmail" name="addEmail" placeholder="Email">
      <input type="text" id="addPassword" name="addPassword" placeholder="Password">
      <input type="text" id="addDireccion" name="addDireccion" placeholder="Direccion">
      <!-- Otros campos de edición -->
      <button type="button" id="guardarUsuario2" name="guardar" class="btn-guardar" >Guardar</button>
    <button type="button" id="salir2" name="salir2" >Salir Sin Guardar</button>
    </form>
  </div>
</div>

<script>

// Abrir modal para agregar producto
$(document).on('click', '#agregarUsuario', function() {
  // Limpiar los campos del formulario
  $('#addNombre').val('');
  $('#addApellido').val('');
  $('#addEmail').val('');
  $('#addPassword').val('');
  $('#addDireccion').val('');

  // Mostrar el modal
  $('#modalAgregar').show();
});
//salir sin guardar2
 $('#salir2').on('click', function() {
  $('#modalAgregar').hide();
});


// Guardar producto

$(document).on('click', '#guardarUsuario2', function() {
  // Obtener los valores de los inputs
  let nombre = $('#addNombre').val();
  let apellido = $('#addApellido').val();
  let email = $('#addEmail').val();
  let password = $('#addPassword').val();
  let direccion = $('#addDireccion').val();
  // Realizar la solicitud AJAX para guardar el producto
  $.ajax({
    type: "POST",
    url: "public/funciones/guardar_usuario.php",
    data: {
      nombre: nombre,
      apellido: apellido,
      email: email,
      password: password,
      direccion: direccion,
    },
    success: function(response) {
      // Procesar la respuesta del servidor    
        // Guardado exitoso
        alert("Usuario agregado correctamente");
        // Actualizar 
        location.reload();  
    },
    error: function() {
      // Error de conexión 
      alert("Error en la solicitud AJAX");
    }
  });
});

</script>
</html>
