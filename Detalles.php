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
    <title>Detalles</title>
    <link rel="short icon" href="img/detalles.png" />
</head>
<style>
    h1 {
        color: darkblue;
    }

    .home {
        cursor: pointer;
    }

    body {
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url('https://img.freepik.com/vector-gratis/farmacia-enfermera-mostrador-personaje-dibujos-animados-drogueria_36082-339.jpg?w=2000');
    }

    table {
        width: 60%;
        font-family: "helvetica";
        border-top: 4px solid cyan;
        border-left: 4px solid cyan;
        border-right: 4px solid cyan;
        border-bottom: 4px solid cyan;
        border-spacing: 0;
    }

    th {
        background-color: darkcyan;
        font-size: large;
        text-align: center;
        border: 1px solid black;
        font-family: "arial";
    }

    td {
        background-color: beige;
        font-size: medium;
        border: 1px solid black;
        font-family: "arial";
        padding: 20px;
    }

    .descrip {
        text-align: left;
    }

    .formu {
        text-align: center;
    }

    .button {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: darkcyan;
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
    }

    .button:hover {
        background-color: cyan
    }

    .button:active {
        background-color: cyan;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }

    .Bien {
        text-align: center;
        width: 100%;
        padding: 10px;
        background-color: green;
        color: white;
    }

    .Mal {
        text-align: center;
        width: 100%;
        padding: 10px;
        background-color: red;
        color: white;
    }
</style>

<body>
    <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
    <center>
        <h1>Detalles de las facturas</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Detalles de factura</th>
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