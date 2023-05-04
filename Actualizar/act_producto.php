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
    <title>Actualizar Producto</title>
    <link rel="short icon" href="../img/producto.png" />
    <link rel="stylesheet" href="../CSS/act_producto.css" />
    <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");
    $salida = "";
    $id = $_GET["id"];
    $query = "SELECT * FROM productos WHERE CodProd= '$id'";
    ?>

<body>
    <a href="../bus_producto.php" class="button">Volver</a>
    <center>
        <h1>Actualizar Producto</h1>
        <br>
        <form method="post">
            <?php

            $resultado = $mysqli->query($query);

            if ($resultado) {

                $salida .= "<table>
                <tr>
                <th>Nombre Producto</th>
                <th>Presentacion</th>
                <th>Laboratorio</th>
                <th>Precio</th>
                <th>Stock</th>";

                while ($fila = $resultado->fetch_assoc()) {
                    $salida .= "<tr>
             <input type='hidden' class='formu' value='" . $fila['CodProd'] . "' name= 'CodProd'>
                 <td><input type='text' class='formu' value='" . $fila['NombreProd'] . "' name='NombreProd'></td>
                     <td><input type='text' class='formu' value='" . $fila['presentacion'] . "' name='presentacion'></td>
                         <td><input type='text' class='formu' value='" . $fila['laboratorio'] . "' name='laboratorio'></td>
                             <td><input type='number' class='formu' value='" . $fila['precio'] . "' name='precio'></td>
                                 <td><input type='number' class='formu' value='" . $fila['stock'] . "' name='stock'></td>
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
            $CodProd = trim($_POST['CodProd']);
            $NombreProd = trim($_POST['NombreProd']);
            $presentacion = trim($_POST['presentacion']);
            $laboratorio = trim($_POST['laboratorio']);
            $precio = trim($_POST['precio']);
            $stock = trim($_POST['stock']);
            $actualizar = "UPDATE productos SET NombreProd='$NombreProd',presentacion='$presentacion',laboratorio='$laboratorio',precio='$precio',stock='$stock' WHERE CodProd='$id'";
            $resul = mysqli_query($conex, $actualizar);
            if ($resul) {

                echo "<script>alert('Se ha actualizado los cambios exitosamente'); window.location='../bus_producto.php';</script>";
            } else {

                echo "<script>alert('NO se ha actualizado los cambios exitosamente'); window.history.go(-1)</script>";
            }
        }
        ?>
    </center>
</body>

</html>