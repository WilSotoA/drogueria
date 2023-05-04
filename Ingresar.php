<?php
session_start();
error_reporting(0);

$varsesion =  $_SESSION['logusuario'];
if ($varsesion !== null || $varsesion != '') {
    echo "<h1>Usted YA INGRESO</h1><a href='index.php'>Ir a la pagina</a>";
    die();
}
session_destroy();
?>
<html>

<head>
    <title>Ingresar</title>
    <link rel="short icon" href="img/producto.png" />
    <link rel="stylesheet" href="CSS/Ingresar.css" />
</head>

<body>
    <div class="login">

        <h1 id="header">¡Bienvenido!</h1>
        <form id="form" method="post">
            <input type="email" placeholder="Ingrese su usuario" name="logusuario"><br />
            <input type="password" placeholder="Contraseña" name="logcontraseña"><br />
            <input type="submit" name="Ingresar" value="Ingresar">
        </form>
    </div>
    <?php
    if (isset($_POST['Ingresar'])) {
        $logusuario = $_POST['logusuario'];
        $logcontraseña = $_POST['logcontraseña'];
        session_start();
        $_SESSION['logusuario'] = $logusuario;

        include("procesar_enviar_guardar_drogueria.php");
        $consul = "SELECT * FROM usuarios WHERE Usuario = '$logusuario' and Contraseña = '$logcontraseña'";
        $result = mysqli_query($conex, $consul);

        $filas = mysqli_num_rows($result);
        if ($filas) {

            header("location:index.php");
        } else {
    ?>
            <h3 class="Mal">Eror de autenticacion</h3>
    <?php
        }
    }
    ?>
</body>

</html>