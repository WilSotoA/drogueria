<?php
session_start();
error_reporting(0);
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
    <title>Actualizar Vendedor</title>
    <link rel="short icon" href="../img/vendedor.png" />
    <<link rel="stylesheet" href="../CSS/act_vendedor.css" />
    <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");
    $salida = "";
    $id = $_GET["id"];
    $query = "SELECT * FROM vendedores WHERE codigo= '$id'";
    ?>

<body>
    <a href="../bus_vendedor.php" class="button">Volver</a>
    <center>
        <h1>Actualizar Vendedor</h1>
        <br>
        <form method="post">
            <?php

            $resultado = $mysqli->query($query);

            if ($resultado) {

                $salida .= "<table>
                <tr>
                <th>Apellidos Vendedor</th>
                <th>Nombres Vendedor</th>
                <th>Direccion Vendedor</th>
                <th>Fecha Nacimiento</th>
                <th>Sueldo Vendedor</th>
                <th>Numero telefonico</th>
                <th>Foto Vendedor</th>";

                while ($fila = $resultado->fetch_assoc()) {
                    $salida .= "<tr>
             <input type='hidden' class='formu' value='" . $fila['codigo'] . "' name= 'codigo'>
                 <td><input type='text' class='formu' value='" . $fila['apellidos'] . "' name='apellidos'></td>
                     <td><input type='text' class='formu' value='" . $fila['nombres'] . "' name='nombres'></td>
                         <td><input type='text' class='formu' value='" . $fila['direccion'] . "' name='direccion'></td>
                             <td><input type='text' class='formu' value='" . $fila['nacimiento'] . "' name='nacimiento'></td>
                                 <td><input type='number' class='formu' value='" . $fila['sueldo'] . "' name='sueldo'></td>
                                     <td><input type='number' class='formu' value='" . $fila['celular'] . "' name='celular'></td>
                                         <td><input type='file' class='formu' value='" . $fila['foto'] . "' name='foto'></td>
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
            $codigo = trim($_POST['codigo']);
            $apellidos = trim($_POST['apellidos']);
            $nombres = trim($_POST['nombres']);
            $direccion = trim($_POST['direccion']);
            $nacimiento = trim($_POST['nacimiento']);
            $sueldo = trim($_POST['sueldo']);
            $celular = trim($_POST['celular']);
            $foto = trim($_POST['foto']);
            $actualizar = "UPDATE vendedores SET apellidos='$apellidos',nombres='$nombres',direccion='$direccion',nacimiento='$nacimiento',sueldo='$sueldo',celular='$celular',foto='$foto' WHERE codigo='$id'";
            $resul = mysqli_query($conex, $actualizar);
            if ($resul) {

                echo "<script>alert('Se ha actualizado los cambios exitosamente'); window.location='../bus_vendedor.php';</script>";
            } else {

                echo "<script>alert('NO se ha actualizado los cambios exitosamente'); window.history.go(-1)</script>";
            }
        }
        ?>
    </center>
</body>

</html>