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
    <title>Actualizar Laboratorio</title>
    <link rel="short icon" href="../img/laboratorio.png" />
    <link rel="stylesheet" href="../CSS/act_laboratorio.css" />
    <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");
    $salida = "";
    $id = $_GET["id"];
    $query = "SELECT * FROM laboratorios WHERE CodLab= '$id'";
    ?>

<body>
    <a href="../bus_laboratorio.php" class="button">Volver</a>
    <center>
        <h1>Actualizar Laboratorio</h1>
        <br>
        <form method="post">
            <?php

            $resultado = $mysqli->query($query);

            if ($resultado) {

                $salida .= "<table>
                <tr>
                <th>Nombre Laboratorio</th>
                <th>Direccion Laboratorio</th>
                <th>Jefe de Ventas</th>
                <th>Pagina Web</th>";

                while ($fila = $resultado->fetch_assoc()) {
                    $salida .= "<tr>
             <input type='hidden' class='formu' value='" . $fila['CodLab'] . "' name= 'CodLab'>
                 <td><input type='text' class='formu' value='" . $fila['Nombre'] . "' name='Nombre'></td>
                     <td><input type='text' class='formu' value='" . $fila['Direccion'] . "' name='Direccion'></td>
                         <td><input type='text' class='formu' value='" . $fila['JefeVentas'] . "' name='JefeVentas'></td>
                             <td><input type='text' class='formu' value='" . $fila['PagWeb'] . "' name='PagWeb'></td>
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
            $CodLab = trim($_POST['CodLab']);
            $Nombre = trim($_POST['Nombre']);
            $Direccion = trim($_POST['Direccion']);
            $JefeVentas = trim($_POST['JefeVentas']);
            $PagWeb = trim($_POST['PagWeb']);
            $actualizar = "UPDATE laboratorios SET CodLab='$CodLab',Nombre='$Nombre',Direccion='$Direccion',JefeVentas='$JefeVentas',PagWeb='$PagWeb' WHERE CodLab='$id'";
            $resul = mysqli_query($conex, $actualizar);
            if ($resul) {

                echo "<script>alert('Se ha actualizado los cambios exitosamente'); window.location='../bus_laboratorio.php';</script>";
            } else {

                echo "<script>alert('NO se ha actualizado los cambios exitosamente'); window.history.go(-1)</script>";
            }
        }
        ?>
    </center>
</body>

</html>