<?php
session_start();
error_reporting(0);

        $varsesion =  $_SESSION['logusuario'];
        if($varsesion == null || $varsesion=''){
            echo 'Debe iniciar sesion para poder utilizar el sitio';
            header("location:Ingresar.php");
            die();
        }
?>
<html>
    <head>
        <title>Laboratorios</title>
        <link rel="short icon" href="img/laboratorio.png"/>
        <<link rel="stylesheet" href="CSS/Laboratorios.css"/>
    </head> 
    <body>
        <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
        <center>
        <h1>Formulario de Laboratorios</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Laboratorios</th>
                    <th><img src="img/logoSENA.png" width="60" height="60" alt="SENA"/></th>
                </tr>
                <tr>
                    <td class="descrip"><b>Codigo Laboratorio</b></td>
                    <td class="formu"><input type="number" name="CodLab" id="CodLab" placeholder="Codigo del laboratorio"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Nombre laboratorio</b></td>
                    <td class="formu"><input type="text" name="Nombre" id="Nombre" placeholder="Nombre del laboratorio"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Dirección</b></td>
                    <td class="formu"><input type="text" name="Direccion" id="Direccion" Placeholder="Dirección del laboratorio"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Jefe de ventas</b></td>
                    <td class="formu"><input type="text" name="JefeVentas" id="JefeVentas" placeholder="Nombre del jefe de ventas"></td> 
                </tr>
                <tr>
                    <td class="descrip"><b>Pagina web</b></td>
                    <td class="formu"><input type="url" name="PagWeb" id="PagWeb" placeholder="Pagina web del laboratorio"></td> 
                </tr>
            </table>
            <input class="button" type="submit" name="Guardar" value="Guardar">
            <input class="button" type="reset" value="Refrescar">
        </form>
        </form>
        <form action="bus_laboratorio.php">
        <input class="button" type="submit" value="Buscar">
        </form>
    </center> 
    <?php
include ("procesar_enviar_guardar_drogueria.php");
if (isset($_POST['Guardar'])){
        if (strlen($_POST['CodLab'])>=1&&
            strlen($_POST['Nombre'])>=1&&
            strlen($_POST['Direccion'])>=1&&
            strlen($_POST['JefeVentas'])>=1&&
                strlen($_POST['PagWeb'])>=1){
        $CodLab = trim($_POST['CodLab']);
        $Nombre = trim($_POST['Nombre']);
        $Direccion = trim($_POST['Direccion']);
        $JefeVentas = trim($_POST['JefeVentas']); 
        $PagWeb = trim($_POST['PagWeb']);
        $consulta = "INSERT INTO laboratorios(CodLab, Nombre, Direccion, JefeVentas, PagWeb) VALUES ('$CodLab','$Nombre','$Direccion','$JefeVentas','$PagWeb')";   
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
            }else {     
            ?>
<h3 class="Mal">Por favor complete los campos</h3>
<?php
            }
}
?>
    </body>
</html>

