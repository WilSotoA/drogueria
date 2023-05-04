<?php
  
    $mysqli = new mysqli("localhost","root","","drogueria");
    
    $salida = "";
    $query = "SELECT * FROM vendedores ORDER By codigo";
    
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT codigo, apellidos, nombres, direccion, nacimiento, sueldo, celular, foto FROM vendedores WHERE codigo LIKE '%".$q."%'";  
    }
    
    $resultado=$mysqli->query($query);
    
    if($resultado->num_rows > 0){
        
        $salida.="<table>
                <tr>
                <th>Codigo Vendedor</th>
                <th>Apellidos Vendedor</th>
                <th>Nombres Vendedor</th>
                <th>Direccion Vendedor</th>
                <th>Fecha Nacimiento</th>
                <th>Sueldo Vendedor</th>
                <th>Numero telefonico</th>
                <th>Foto Vendedor</th>
                <th>Modificar Vendedor</th>"; 
        
        while($fila = $resultado->fetch_assoc()){
         $salida.="<tr>
             <td>".$fila['codigo']."</td>
                 <td>".$fila['apellidos']."</td>
                     <td>".$fila['nombres']."</td>
                         <td>".$fila['direccion']."</td>
                             <td>".$fila['nacimiento']."</td>
                                 <td>".$fila['sueldo']."</td>
                                     <td>".$fila['celular']."</td>
                                         <td>".$fila['foto']."</td>
                                             <td><a href='Actualizar/act_vendedor.php?id=".$fila['codigo']." '><img src='img/edit.png'/></a>"
                 . "<a href='Borrar/bor_vendedor.php?id=".$fila['codigo']."' class='item_link' onclick='confirmacion()'><img src='img/delete.png'/></a></td>
                             </tr>";
                    
        }
        
        $salida.="</table>";
        
    } else {
        
        $salida.="No se encontro registro del cliente";
        
    }
    
    echo $salida;
    
    $mysqli->close();
