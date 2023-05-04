<?php
  
    $mysqli = new mysqli("localhost","root","","drogueria");
    
    $salida = "";
    $query = "SELECT * FROM productos ORDER By CodProd";
    
    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT CodProd, NombreProd, presentacion, laboratorio, precio, stock FROM productos WHERE CodProd LIKE '%".$q."%'";  
    }
    
    $resultado=$mysqli->query($query);
    
    if($resultado->num_rows > 0){
        
        $salida.="<table>
                <tr>
                <th>Codigo Producto</th>
                <th>Nombre Producto</th>
                <th>Presentacion</th>
                <th>Laboratorio</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Modificar Producto</th>"; 
        
        while($fila = $resultado->fetch_assoc()){
         $salida.="<tr>
             <td>".$fila['CodProd']."</td>
                 <td>".$fila['NombreProd']."</td>
                  <td>".$fila['presentacion']."</td>
                     <td>".$fila['laboratorio']."</td>
                         <td>".$fila['precio']."</td>
                             <td>".$fila['stock']."</td>
                                  <td><a href='Actualizar/act_producto.php?id=".$fila['CodProd']." '><img src='img/edit.png'/></a>"
                 . "<a href='Borrar/bor_producto.php?id=".$fila['CodProd']."' class='item_link' onclick='confirmacion()'><img src='img/delete.png'/></a></td>
                             </tr>";
                    
        }
        
        $salida.="</table>";
        
    } else {
        
        $salida.="No se encontro registro del cliente";
        
    }
    
    echo $salida;
    
    $mysqli->close();
