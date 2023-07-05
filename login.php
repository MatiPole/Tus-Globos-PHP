
<!DOCTYPE html>
<html lang="en">
<?php
    include "public/views/parts/head.php";
?>
    <section>
        <div class="imagen-banner">
            <img src="public/views/assets/img/banner2.png" alt="Banner principal">
        </div>

    </section>

<body>
    <form class="form-login" action="" method="POST">
       <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
       ?>
        <h2>Iniciar sesión</h2>
        <label for="">Email</label>
        <input type="text" name="email" value="admin@gmail.com">
        <label for="">Contraseña:</label>
        <input type="password" name="password" value="123456">
        <input type="submit" value="Iniciar Sesión">
        <button><a href="registrarse.php">Registrarse</a></button>
    </form>
  
    <?php
    include "public/views/parts/footer.php";
    ?>
</body>
</html>