<?php
session_start();
error_reporting(0);

$varsesion =  $_SESSION['logusuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'Debe iniciar sesion para poder utilizar el sitio';
    header("location:Ingresar.php");
    die();
}
session_destroy();
?>
<html>

<head>
    <title>Facturas</title>
    <link rel="short icon" href="img/Factura.png" />
    <<link rel="stylesheet" href="CSS/Factura.css" />
</head>

<body>
    <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
    <center>
        <h1>Facturas</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Factura</th>
                    <th><img src="img/logoSENA.png" width="60" height="60" alt="SENA" /></th>
                </tr>
                <tr>
                    <td class="descrip"><b>Codigo Factura</b></td>
                    <td class="formu"><input type="number" name="Factura" id="Factura" placeholder="Codigo factura"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Cliente</b></td>
                    <td class="formu"><select name="CodCliente">
                            <option value="">Cliente</option>
                            <?php
                            include_once './procesar_enviar_guardar_drogueria.php';
                            $sql = $conex->query("SELECT*FROM clientes");
                            while ($fila = $sql->fetch_array()) {
                                echo "<option value=\"$fila[Cliente]\">$fila[Nombre]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="descrip"><b>Fecha de factura</b></td>
                    <td class="formu"><input type="date" name="Fecha" id="Fecha"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Vendedor</b></td>
                    <td class="formu"><select name="CodVendedor">
                            <option value="">Vendedor</option>
                            <?php
                            include_once './procesar_enviar_guardar_drogueria.php';
                            $sql = $conex->query("SELECT*FROM vendedores");
                            while ($fila = $sql->fetch_array()) {
                                echo "<option value=\"$fila[codigo]\">$fila[nombres]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="descrip"><b>Cancelada</b></td>
                    <td class="formu"><select name="Cancelada">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input class="button" type="submit" name="Guardar" value="Guardar">
            <input class="button" type="reset" value="Refrescar">
        </form>
    </center>
    <?php
    include("procesar_enviar_guardar_drogueria.php");
    if (isset($_POST['Guardar'])) {
        if (
            strlen($_POST['Factura']) >= 1 &&
            strlen($_POST['CodCliente']) >= 1 &&
            strlen($_POST['Fecha']) >= 1 &&
            strlen($_POST['CodVendedor']) >= 1 &&
            strlen($_POST['Cancelada']) >= 1
        ) {
            $Factura = trim($_POST['Factura']);
            $CodCliente = trim($_POST['CodCliente']);
            $Fecha = trim($_POST['Fecha']);
            $CodVendedor = trim($_POST['CodVendedor']);
            $Cancelada = trim($_POST['Cancelada']);
            $consulta = "INSERT INTO facturas(Factura, CodCliente, Fecha, CodVendedor, Cancelada) VALUES ('$Factura','$CodCliente','$Fecha','$CodVendedor','$Cancelada')";
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