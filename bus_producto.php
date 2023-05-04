<?php
session_start();
error_reporting(0);

$varsesion =  $_SESSION['logusuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'Debe iniciar sesion para poder utilizar el sitio';
    header("location:Ingresar.php");
    die();
}
?>
<html>

<head>
    <title>Busqueda Productos</title>
    <link rel="short icon" href="img/producto.png" />
    <link rel="stylesheet" href="CSS/bus_producto.css" />
</head <body>
<a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
<center>
    <section>

        <h1>Consulta de Productos</h1>

        <div class="busq">
            <label for="caja_busqueda">Buscar Productos</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Ingrese codigo del producto">
            <div id="datos">

            </div>
    </section>
    <script>
        function confirmacion(e) {
            if (confirm("¿Está seguro que desea eliminar este registro?")) {
                return true;
            } else {
                event.preventDefault();
            }
        }
        let linkdelete = document.queryselectorall(".item_link");

        for (var i = 0; i < linkdelete.length; i++) {
            linkdelete[i].addeventlistener('click', confirmacion);
        }
    </script>
    <script src="Buscar/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="Buscar/con_producto.js" type="text/javascript"></script>
</center>
</body>

</html>