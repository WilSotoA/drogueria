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
    <title>Productos</title>
    <link rel="short icon" href="img/producto.png" />
    <link rel="stylesheet" href="CSS/Ins_productos.css" />
</head>

<body>
    <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
    <br>
    <center>
        <h1>Formulario de Productos</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Productos</th>
                    <th><img src="img/logoSENA.png" width="60" height="60" alt="SENA" /></th>
                </tr>
                <tr>
                    <td class="descrip"><b>Codigo del Producto</b></td>
                    <td class="formu"><input type="number" name="CodProd" id="CodProd" placeholder="Ingrese codigo del producto"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Nombre del Producto</b></td>
                    <td class="formu"><input type="text" name="NombreProd" id="NombreProd" placeholder="Ingrese nombre del producto">
                </tr>
                <tr>
                    <td class="descrip"><b>Presentación</b></td>
                    <td class="formu"><input type="text" name="presentacion" id="presentacion" Placeholder="Ingrese tipo de presentacion"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Laboratorio</b></td>
                    <td class="formu"><select name="laboratorio">
                            <option value="">Laboratorios</option>
                            <?php
                            include_once './procesar_enviar_guardar_drogueria.php';
                            $sql = $conex->query("SELECT*FROM laboratorios");
                            while ($fila = $sql->fetch_array()) {
                                echo "<option value=\"$fila[CodLab]\">$fila[Nombre]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="descrip"><b>Precio</b></td>
                    <td class="formu"><input type="number" name="precio" id="precio" placeholder="Precio del producto"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Stock</b></td>
                    <td class="formu"><input type="number" name="stock" id="stock" placeholder="Stock del producto"></td>
                </tr>
            </table>
            <br>
            <input class="button" type="submit" name="Guardar" value="Guardar">
            <input class="button" type="reset" value="Refrescar">
        </form>
        </form>
        <form action="bus_producto.php">
            <input class="button" type="submit" value="Buscar">
        </form>
    </center>
    <?php
    include("procesar_enviar_guardar_drogueria.php");
    if (isset($_POST['Guardar'])) {
        if (
            strlen($_POST['CodProd']) >= 1 &&
            strlen($_POST['NombreProd']) >= 1 &&
            strlen($_POST['presentacion']) >= 1 &&
            strlen($_POST['laboratorio']) >= 1 &&
            strlen($_POST['precio']) >= 1 &&
            strlen($_POST['stock']) >= 1
        ) {
            $CodProd = trim($_POST['CodProd']);
            $NombreProd = trim($_POST['NombreProd']);
            $presentacion = trim($_POST['presentacion']);
            $laboratorio = trim($_POST['laboratorio']);
            $precio = trim($_POST['precio']);
            $stock = trim($_POST['stock']);
            $consulta = "INSERT INTO productos(CodProd, NombreProd, presentacion, laboratorio, precio, stock) VALUES ('$CodProd','$NombreProd','$presentacion','$laboratorio','$precio','$stock')";
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
    </bo </html>