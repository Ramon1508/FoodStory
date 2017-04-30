<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php

	
$servername = "localhost";
$username = "root";
$password = "";
$db = "dbdropdown";

$id=isset($_POST['id']) ? $_POST['id'] : "";
    echo '<label>'.$id.'</label>';
    
$conn = new mysqli($servername, $username, $password, $db);    
if ($id > 0) {
    echo "Connected successfully";
	//$conn = require 'Conexion.php';
	//mysql_select_db('reses');
			$sql = "SELECT `cat_id`,`cat_name` FROM `categories` where cat_id = ".$id."";
			//$usuario = $sql;
			$result = $conn -> query ($sql);
if ($result->num_rows > 0) {
    echo "<table><tr> <th> cat_id</th> <th> cat_name </th>  </th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td> ".$row["cat_id"]." </td> <td>".$row["cat_name"]."</td>  </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
    
}
    ?>
</body>
</html>