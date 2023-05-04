 <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");
    $salida = "";
    $query = "SELECT * FROM clientes ORDER By Cliente";

    if (isset($_POST['consulta'])) {
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT Cliente, Nombre, Direccion, Telefono FROM clientes WHERE Cliente LIKE '%" . $q . "%'";
    }

    $resultado = $mysqli->query($query);

    if ($resultado->num_rows > 0) {

        $salida .= "<table>
                <tr>
                <th>Codigo Cliente</th>
                <th>Nombre Cliente</th>
                <th>Direccion Cliente</th>
                <th>Telefono Cliente</th>
                <th>Modificar Cliente</th>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida .= "<tr>
             <td>" . $fila['Cliente'] . "</td>
                 <td>" . $fila['Nombre'] . "</td>
                     <td>" . $fila['Direccion'] . "</td>
                         <td>" . $fila['Telefono'] . "</td>
                             <td><a href='Actualizar/act_cliente.php?id=" . $fila['Cliente'] . " '><img src='img/edit.png'/></a>"
                . "<a href='Borrar/bor_cliente.php?id=" . $fila['Cliente'] . "' class='item_link' onclick='confirmacion()'><img src='img/delete.png'/></a></td>
                             </tr>";
        }
        $salida .= "</table>";
    } else {

        $salida .= "No se encontro registro del cliente";
    }

    echo $salida;

    $mysqli->close();

    ?> 

