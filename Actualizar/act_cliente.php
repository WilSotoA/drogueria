<?php
error_reporting(0);
session_start();
$varsesion =  $_SESSION['logusuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'Debe iniciar sesion para poder utilizar el sitio';
    echo "<a href='../Ingresar.php'>Ingresar</a>";
    die();
}
$conected = mysqli_connect("localhost", "root", "", "drogueria");
$User =  $_SESSION['logusuario'];
$que = "SELECT * FROM usuarios WHERE Usuario = '$User'";
$resu = mysqli_query($conected, $que);
$row = $resu->fetch_all(PDO::FETCH_NUM);
if ($row == true) {
    $rol = $row['5'];
    $_SESSION['ID_CARGO'] = $rol;
    switch ($_SESSION['ID_CARGO']) {
        case 2:
            break;
        case 1:
            echo "solo los ADMINS tiene ACESSO";
            header('location:windows.history.go(-1)');
            die();
    }
}
?>
<html>

<head>
    <title>Actualizar Cliente</title>
    <link rel="short icon" href="../img/cliente.png" />
    <link rel="stylesheet" href="../CSS/act_cliente.css" />
    <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");
    $salida = "";
    $id = $_GET["id"];
    $query = "SELECT * FROM clientes WHERE Cliente= '$id'";
    ?>

<body>
    <a href="../bus_cliente.php" class="button">Volver</a>
    <center>
        <h1>Actualizar Cliente</h1>
        <br>
        <form method="post">
            <?php

            $resultado = $mysqli->query($query);

            if ($resultado) {

                $salida .= "<table>
                <tr>
                <th>Nombre Cliente</th>
                <th>Direccion Cliente</th>
                <th>Telefono Cliente</th>";

                while ($fila = $resultado->fetch_assoc()) {
                    $salida .= "<tr>
             <input type='hidden' class='formu' value='" . $fila['Cliente'] . "' name= 'Codigo'>
                 <td><input type='text' class='formu' value='" . $fila['Nombre'] . "' name='Nombres'></td>
                     <td><input type='text' class='formu' value='" . $fila['Direccion'] . "' name='Direccion'></td>
                         <td><input type='text' class='formu' value='" . $fila['Telefono'] . "' name='Numero'></td>
                             </tr>";
                }
                $salida .= "</table>";
            }

            echo $salida;

            $mysqli->close();

            ?>
            <input type="submit" name="actualizar" value="actualizar" class="button">
        </form>
        <?php
        include("../procesar_enviar_guardar_drogueria.php");
        if (isset($_POST['actualizar'])) {
            $Codigo = $_POST['Codigo'];
            $Nombres = $_POST['Nombres'];
            $Direccion = $_POST['Direccion'];
            $Numero = $_POST['Numero'];
            $actualizar = "UPDATE clientes SET Nombre='$Nombres',Direccion='$Direccion',Telefono='$Numero' WHERE Cliente='$id'";
            $resul = mysqli_query($conex, $actualizar);
            if ($resul) {

                echo "<script>alert('Se ha actualizado los cambios exitosamente'); window.location='../bus_cliente.php';</script>";
            } else {

                echo "<script>alert('NO se ha actualizado los cambios exitosamente'); window.history.go(-1)</script>";
            }
        }
        ?>
    </center>
</body>

</html>