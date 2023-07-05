
<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
    include_once 'resources/controllers/Registro.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nameRegistro = $_POST['nameRegistro'];
    $emailRegistro = $_POST['emailRegistro'];
    $passwordRegistro = $_POST['passwordRegistro'];

    // Crear una instancia de la clase User
    $usuarios = new Registro();

    // Llamar a la función agregarUsuario() para insertar el usuario en la base de datos
}   
?>
    <section>
        <div class="imagen-banner">
            <img src="public/views/assets/img/banner2.png" alt="Banner principal">
        </div>

    </section>

<body>
    <form class="form-login"  method="POST">
        <h2>Registrarse</h2>
        <label for="">Nombre</label>
        <input type="text" name="nameRegistro">
        <label for="">Email</label>
        <input type="text" name="emailRegistro" >
        <label for="">Contraseña:</label>
        <input type="password" name="passwordRegistro">
         <button class="btn-registrarse" type="submit">Registrarse</button>
<?php    if (empty($nameRegistro) || empty($emailRegistro) || empty($passwordRegistro)) {
        echo "Por favor, complete todos los campos del formulario";
    } else {
        // Crear una instancia de la clase User
        $usuarios = new Registro();

        // Llamar a la función agregarUsuario() para insertar el usuario en la base de datos
        if ($usuarios->agregarUsuario($nameRegistro, $emailRegistro, $passwordRegistro)) {
            // La inserción se realizó correctamente
            echo "Usuario registrado correctamente";
            header('Location: http://localhost/tus-globos/index.php');
        } else {
            // Ocurrió un error durante la inserción
            echo "Error al registrar el usuario";
        }
    }
?>

    </form>
  
    <?php
    include "public/views/parts/footer.php";
    ?>
</body>
</html>