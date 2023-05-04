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
    <title>Clientes</title>
    <link rel="short icon" href="img/cliente.png" />
    <link rel="stylesheet" href="CSS/Ins_cliente.css" />
</head>

<body>
    <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
    <br>
    <center>
        <h1 class="titulo">Formulario de Clientes</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Clientes</th>
                    <th><img src="img/logoSENA.png" width="60" height="60" alt="SENA" /></th>
                </tr>
                <tr>
                    <td class="descrip"><b>Codigo Cliente</b></td>
                    <td class="formu"><input type="number" name="Codigo" id="Codigo" placeholder="Ingrese codigo del cliente"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Nombre Completo</b></td>
                    <td class="formu"><input type="text" name="Nombres" id="Nombres" placeholder="Ingrese nombre completo"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Dirección</b></td>
                    <td class="formu"><input type="text" name="Direccion" id="Direccion" Placeholder="Ingrese dirección"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Numero Telefono</b></td>
                    <td class="formu"><input type="number" name="Numero" id="Numero" min="6" placeholder="Numero de telefono"></td>
                </tr>
            </table>
            <br>
            <input class="button" type="submit" name="Guardar" value="Guardar">
            <input class="button" type="reset" value="Refrescar">
        </form>
        <form action="bus_cliente.php">
            <input class="button" type="submit" value="Buscar">
        </form>
    </center>
    <?php
    include("procesar_enviar_guardar_drogueria.php");
    if (isset($_POST['Guardar'])) {
        if (
            strlen($_POST['Codigo']) >= 1 &&
            strlen($_POST['Nombres']) >= 1 &&
            strlen($_POST['Direccion']) >= 1 &&
            strlen($_POST['Numero']) >= 1
        ) {
            $Codigo = trim($_POST['Codigo']);
            $Nombres = trim($_POST['Nombres']);
            $Direccion = trim($_POST['Direccion']);
            $Numero = trim($_POST['Numero']);
            $consulta = "INSERT INTO clientes(Cliente, Nombre, Direccion, Telefono) VALUES ('$Codigo','$Nombres','$Direccion','$Numero')";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
    ?>
                <h3 class="Bien">Se ha guardado exitosamente</h3>
            <?php
            } else {
            ?>
                <h3 class="Mal">NO se ha guardado correctamente</h3>
            <?php
            }
        } else {
            ?>
            <h3 class="Mal">Por favor complete los campos</h3>
    <?php
        }
    }
    ?>
</body>

</html>