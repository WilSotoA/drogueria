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
        <title>Productos</title>
        <link rel="short icon" href="img/vendedor.png"/> 
        <link rel="stylesheet" href="CSS/Ins_vendedor.css"/>
    </head>
    <body>
        <a href="index.php" class="home"><img src="img/Home.png" alt="Inicio" width="60" /></a>
        <br>
        <center>
        <h1>Formulario de Vendedores</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Vendedores</th>
                    <th><img src="img/logoSENA.png" width="60" height="60" alt="SENA"/></th>
                </tr>
                <tr>
                    <td class="descrip"><b>Codigo Vendedor</b></td>
                    <td class="formu"><input type="number" name="codigo" id="codigo" placeholder="Ingrese codigo del vendedor"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Apellidos </b></td>
                    <td class="formu"><input type="text" name="apellidos" id="apellidos" placeholder="Ingrese los apellidos"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Nombres </b></td>
                    <td class="formu"><input type="text" name="nombres" id="nombres" placeholder="Ingrese los nombres"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Dirección</b></td>
                    <td class="formu"><input type="text" name="direccion" id="direccion" Placeholder="Ingrese dirección del vendedor"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Fecha de nacimiento</b></td>
                    <td class="formu"><input type="date" name="nacimiento" id="nacimiento"></td>
                </tr>
                <tr>
                    <td class="descrip"><b>Sueldo</b></td>
                    <td class="formu"><input type="number" name="sueldo" id="sueldo"  placeholder="Sueldo del vendedor"></td> 
                </tr>
                <tr>
                    <td class="descrip"><b>Numero Telefono</b></td>
                    <td class="formu"><input type="number" name="celular" id="celular" min="6" placeholder="Numero de telefono"></td> 
                </tr>
                <tr>
                    <td class="descrip"><b>Foto Empleado</b></td>
                    <td class="formu">(Opcional)<input type="file" name="foto" id="foto" placeholder="Opcional"></td> 
                </tr>
            </table>
            <br>
            <input class="button" type="submit" name="Guardar" value="Guardar">
            <input class="button" type="reset" value="Refrescar">
        </form>
        </form>
        <form action="bus_vendedor.php">
        <input class="button" type="submit" value="Buscar">
        </form>
        </center>
    <?php
    include ("procesar_enviar_guardar_drogueria.php");
    if (isset($_POST['Guardar'])){
        if (strlen($_POST['codigo'])>=1&&
            strlen($_POST['apellidos'])>=1&&
            strlen($_POST['nombres'])>=1&&
            strlen($_POST['direccion'])>=1&&
            strlen($_POST['nacimiento'])>=1&&
            strlen($_POST['sueldo'])>=1&&
            strlen($_POST['celular'])>=1){
            $codigo = trim($_POST['codigo']);
            $apellidos = trim($_POST['apellidos']);
            $nombres = trim($_POST['nombres']);
            $direccion = trim($_POST['direccion']);
            $nacimiento = trim($_POST['nacimiento']);
            $sueldo = trim($_POST['sueldo']);
            $celular = trim($_POST['celular']);
            $foto = trim($_POST['foto']);
            $consulta = "INSERT INTO vendedores(codigo, apellidos, nombres, direccion, nacimiento, sueldo, celular, foto) VALUES ('$codigo','$apellidos','$nombres','$direccion','$nacimiento','$sueldo','$celular','$foto')";
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