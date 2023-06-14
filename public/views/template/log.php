<?php
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $email = $_GET['email'];
    $direccion = $_GET['direccion'];
    $mensaje = $_GET['mensaje'];

?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "../parts/head.php";
?>
<body>
<?php
    include "./menu.php";
    ?>
       <div id="particles-js"></div>
    <div class="mensaje-enviado">
            <h1>¡Tu mensaje <br> fue enviado!</h1>
    </div>
    
<?php
    include "../parts/footer.php";
?>
    <script src="../assets/js/particles.min.js"></script>
        <script src="../assets/js/particulas.js"></script>
</body>
</html>
