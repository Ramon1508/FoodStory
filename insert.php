<?php
	$Con = new mysqli('localhost', 'root', '', 'dbdropdown');
	mysqli_set_charset($Con, 'utf8');
	$Funcion = $_POST['func'];
	if ($Funcion == 'Num') 
	{
		$result = $Con->query("SELECT COUNT(*) FROM categories");
		$row = $result->fetch_row();
		echo '<IMG class="icoDer" SRC="cardiogram.png" WIDTH=35 HEIGHT=35 VSPACE=2 HSPACE=2 ALT="Usuario">';
        echo $row[0];
	}
	else
	{
		$Consulta = "SELECT * FROM categories";
		$Result = $Con->query($Consulta);
		
        while ($Row = $Result->fetch_array()) 
		{
		  echo '<form action="link1.php" method="post">';
            echo '<li class="dropdown-header"><IMG class="icoDer" SRC="res1.jpeg" WIDTH=25 HEIGHT=25 VSPACE=1 HSPACE=1 ALT="Usuario">'.$Row['cat_id'].'</li> Name: <input type="radio" name="id" value="'.$Row['cat_id'].'"> ';
			echo '<li><IMG class="icoDer" SRC="temp.png" WIDTH=25 HEIGHT=25 VSPACE=1 HSPACE=1 ALT="Usuario"> <IMG class="icoDer" SRC="areteRojo.png" WIDTH=25 HEIGHT=25 VSPACE=1 HSPACE=1 > <a href="'.$Row['cat_link'].'">'.$Row['cat_name'].'</a></li>';
            echo '<input type="submit" name="id" value="'.$Row['cat_id'].'">';
            echo '</form>'; 
		}

    }
?>