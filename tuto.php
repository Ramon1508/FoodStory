<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "prubea";   
$conn = new mysqli($servername, $username, $password, $db);


$par=isset($_POST['par']) ? $_POST['par'] : "";

$sql = "select * from prueba ";

			$result = $conn -> query ($sql);
if ($result->num_rows > 0) {
    echo "<table class=><tr> <th>id </th> <th> nombre </th>  </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td> ".$row ["id_prueba"]." </td> <td>".$row["nombre"]."</td>  </tr>";
    }
}
echo "</table>";
$conn->close();


      ?>

<!DOCTYPE html>
<header>
 <title>tuto</title>
<meta charset="utf-8">
 <LINK REL="stylesheet" TYPE="text/css" HREF="tuto.css">  
<script type="text/javascript">
 
function pedirPosicion(pos) {
	var link = "https://www.google.com.mx/maps/@"+pos.coords.latitude+ ","+pos.coords.longitude;
	document.writeln(link); 
}
navigator.geolocation.getCurrentPosition(pedirPosicion);
</script>
</header>

<body>
<h1 class="hola" >hola mundo </h1>




     
 
</html>

</body>