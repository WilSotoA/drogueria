<?php
session_start();
error_reporting(0);
$Usuario = $_SESSION['logusuario'];
$varsesion =  $_SESSION['logusuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'Debe iniciar sesion para poder utilizar el sitio';
    echo "<a href='Ingresar.php'>Ingresar</a>";
    die();
}
?>
<html>

<head>
    <title>Inicio Drogueria</title>
    <link rel="short icon" href="img/favicon2.png" />
    <link rel="stylesheet" href="CSS/index.css" />
</head>

<body>
    <header>
        <nav>
            <p class="usuario"><?php echo "$Usuario"; ?></p>
            <a href="#">Inicio</a>
            <a href="#forms1">Formularios</a>
            <a href="#forms2">Consultas</a>
            <a href="registro.php">Registrar</a>
            <a href="Cerrar_sesion.php">Cerrar Sesion</a>
        </nav>
        <section class="textos-header">
            <h1>¡Bienvenid@ Drogueria!</h1>
            <h2>Consultas y formularios</h2>
        </section>
        <div class="ola" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor forms1" id="forms1">
            <h2 class="titulo">Formularios Drogueria</h2>
            <div class="button">
                <a href="ins_Cliente.php"><img src="img/form2.jpg"" alt=" Clientes" width="200px" height="200px" />Formulario Clientes</a>
            </div>
            <div class="button">
                <a href="Ins_vendedor.php"><img src="img/form1.jpg"" alt=" Vendedores" width="200px" height="200px" />Formulario Vendedores</a>
            </div>
            <div class="button">
                <a href="Laboratorios.php"><img src="img/form3.jpg"" alt=" Laboratorios" width="200px" height="200px" />Formulario Laboratorios</a>
            </div>
            <div class="button">
                <a href="Ins_productos.php"><img src="img/form4.jpg"" alt=" Productos" width="200px" height="200px" />Formulario Productos</a>
            </div>
        </section>
        <section class="contenedor forms2" id="forms2">
            <h2 class="titulo">Consultas Drogueria</h2>
            <div class="button">
                <a href="bus_cliente.php"><img src="img/form2.jpg"" alt=" Clientes" width="200px" height="200px" />Consultar Clientes</a>
            </div>
            <div class="button">
                <a href="bus_vendedor.php"><img src="img/form1.jpg"" alt=" Vendedores" width="200px" height="200px" />Consultar Vendedores</a>
            </div>
            <div class="button">
                <a href="bus_laboratorio.php"><img src="img/form3.jpg"" alt=" Laboratorios" width="200px" height="200px" />Consultar Laboratorios</a>
            </div>
            <div class="button">
                <a href="bus_producto.php"><img src="img/form4.jpg"" alt=" Productos" width="200px" height="200px" />Consultar Productos</a>
            </div>
        </section>
    </main>

    <footer>
        <h2 class="titulofinal">&copy; Wilmer Andres Soto Almeida</h2>
    </footer>
</body>

</html>