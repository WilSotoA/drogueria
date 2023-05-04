<?php
include("../procesar_enviar_guardar_drogueria.php");

$id = $_GET['id'];
$eliminar = "DELETE FROM laboratorios WHERE CodLab = '$id'";
$resultadoeliminar = mysqli_query($conex, $eliminar);
if ($resultadoeliminar) {
    header("location: ../bus_laboratorio.php");
} else {

    echo "<script>alert('NO se pudo eliminar'); window.history.go(-1)</script>";
}
