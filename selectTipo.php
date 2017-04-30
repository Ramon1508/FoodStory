<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="alimentos";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query("SELECT * FROM lotes ");


///TABLA DONDE SE DESPLIEGAN LOS REGISTROS //////////////////////////////
echo '<table class="table" style="font-size:12px; margin-top:-1%;">

				<tr class="active">
					<th>ID lote </th>
					<th>ID tienda</th>
					<th>id exportacion</th>
					<th>id empaque</th>
                    <th>id corte</th>
                    <th>id citi</th>
                   
				</tr>';

				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$filaAlumnos['id_lote'].'</td>
						 <td>'.$filaAlumnos['id_tienda'].'</td>
						 <td>'.$filaAlumnos['id_exportacion'].'</td>
						 <td>'.$filaAlumnos['id_empaque'].'</td>
                         <td>'.$filaAlumnos['id_corte'].'</td>
						 </tr>';
				}
				echo '</table>';
?>