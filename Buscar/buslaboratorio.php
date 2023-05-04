 <?php

    $mysqli = new mysqli("localhost", "root", "", "drogueria");

    $salida = "";
    $query = "SELECT * FROM laboratorios ORDER By CodLab";

    if (isset($_POST['consulta'])) {
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT CodLab, Nombre, Direccion, JefeVentas, PagWeb FROM laboratorios WHERE CodLab LIKE '%" . $q . "%'";
    }

    $resultado = $mysqli->query($query);

    if ($resultado->num_rows > 0) {

        $salida .= "<table>
                <tr>
                <th>Codigo Laboratorio</th>
                <th>Nombre Laboratorio</th>
                <th>Direccion Laboratorio</th>
                <th>Jefe de Ventas</th>
                <th>Pagina Web</th>
                <th>Modificar Laboratorio</th>";

        while ($fila = $resultado->fetch_assoc()) {
            $salida .= "<tr>
             <td>" . $fila['CodLab'] . "</td>
                 <td>" . $fila['Nombre'] . "</td>
                     <td>" . $fila['Direccion'] . "</td>
                         <td>" . $fila['JefeVentas'] . "</td>
                             <td>" . $fila['PagWeb'] . "</td>
                                 <td><a href='Actualizar/act_laboratorio.php?id=" . $fila['CodLab'] . " '><img src='img/edit.png'/></a>"
                . "<a href='Borrar/bor_laboratorio.php?id=" . $fila['CodLab'] . "' class='item_link' onclick='confirmacion()'><img src='img/delete.png'/></a></td>
                             </tr>";
        }

        $salida .= "</table>";
    } else {

        $salida .= "No se encontro registro del cliente";
    }

    echo $salida;

    $mysqli->close();

    ?> 

