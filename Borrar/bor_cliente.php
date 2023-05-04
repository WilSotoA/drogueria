<?php
include("../procesar_enviar_guardar_drogueria.php");

$id = $_GET['id'];
$eliminar = "DELETE FROM clientes WHERE Cliente = '$id'";
$resultadoeliminar = mysqli_query($conex, $eliminar);
if ($resultadoeliminar) {
    header("location: ../bus_cliente.php");
} else {

    echo "<script>alert('NO se pudo eliminar'); window.history.go(-1)</script>";
}
