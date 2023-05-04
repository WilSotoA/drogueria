<?php
error_reporting(0);
session_start();
        $varsesion =  $_SESSION['logusuario'];
        if($varsesion == null || $varsesion=''){
            echo 'Debe iniciar sesion para poder utilizar el sitio';
            echo "<a href='../Ingresar.php'>Ingresar</a>";
            die();
            
        }
    $conected = mysqli_connect("localhost", "root", "", "drogueria");
    $User =  $_SESSION['logusuario'];
                $que = "SELECT * FROM usuarios WHERE Usuario = '$User'";
                $resu= mysqli_query($conected, $que);
                $row= $resu->fetch_all(PDO::FETCH_NUM);
                if($row ==true){
                    $rol= $row['5'];
                    $_SESSION['ID_CARGO'] = $rol;
                    switch($_SESSION['ID_CARGO']){
                        case 2:
                            break;
                        case 1:
                            echo "solo los ADMINS tiene ACESSO";
                            header('location:windows.history.go(-1)');
                            die();
                    }
                } 
    ?>
<html>
<head>
<title>Registrar</title>
<link rel="short icon" href="img/logoSENA.png"/>
<link rel="stylesheet" href="CSS/Registro.css"/>
</head>
 <body>
     <div class="home">
     <a href="index.php"><img src="img/Home.png" alt="Inicio" width="60" /></a>
     </div>
     <br>
     <form method="post" class="form">
         <header>Registro Usuario</header>
          <div class="contenedor">
         <label>Id usuario</label>
         <input class="entra" type="number" name="Id" placeholder="Id del usuario">
         </div>
         <div class="contenedor">
         <label>Nombre</label>
         <input class="entra" type="text" name="Nombre" placeholder="Nombre completo">
         </div>
         <div class="contenedor">
         <label>Usuario</label>
         <input class="entra" type="email" name="Usuario" placeholder="Correo electronico">
         </div>
         <div class="contenedor">
         <label>Contraseña</label>
         <input class="entra" type="password" name="Contraseña" placeholder="Ingrese una contraseña">
         </div>
         <div class="contenedor">
             <label>Cargo</label>
             <select class="entra" name="cargos">
                            <option value="">Cargos</option>
                            <?php 
                            include_once './procesar_enviar_guardar_drogueria.php';
                            $sql=$conex->query ("SELECT*FROM cargos ");
                            while ($fila=$sql->fetch_array()){
                            echo "<option value=\"$fila[Id_cargo]\">$fila[Cargo]</option>"; 
                            }
                            ?>
                        </select>
         </div>    
         <div>
         <input class="boton" type="submit" name="Registrar" value="registrar">
         <input class="boton" type="reset" value="refrescar">
         </div>
     </form>
     <?php
     include ("procesar_enviar_guardar_drogueria.php");
if (isset($_POST['Registrar'])){
    if (strlen($_POST['Id'])>=1&&
            strlen($_POST['Nombre'])>=1&&
            strlen($_POST['Usuario'])>=1&&
            strlen($_POST['Contraseña'])>=1&&
            strlen($_POST['cargos'])>=1){
        $Id = trim($_POST['Id']);
        $Nombre = trim($_POST['Nombre']);
        $Usuario = trim($_POST['Usuario']);
        $Contraseña = trim($_POST['Contraseña']);
        $cargos = trim($_POST['cargos']);
        $consulta = "INSERT INTO usuarios( Id, Nombre, Usuario, Contraseña, ID_CARGO) VALUES ( '$Id','$Nombre','$Usuario','$Contraseña','$cargos')";   
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



