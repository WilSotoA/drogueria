<?php
include("../procesar_enviar_guardar_drogueria.php");

$id = $_GET['id'];
$eliminar = "DELETE FROM vendedores WHERE codigo = '$id'";
$resultadoeliminar = mysqli_query($conex, $eliminar);
if ($resultadoeliminar) {
    header("location: ../bus_vendedor.php");
} else {

    echo "<script>alert('NO se pudo eliminar'); window.history.go(-1)</script>";
}
