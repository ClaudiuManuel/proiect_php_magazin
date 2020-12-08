<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	 <title>Vizualizare Inregistrari</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
	<h1>Inregistrarile din tabela tbl_product</h1>
	<p><b>Toate inregistrarile din tbl_product</b</p>
	<?php
		include("Conectare.php");
		if ($result = $mysqli->query("SELECT * FROM tbl_product ORDER BY id"))
		{ 
			if ($result->num_rows > 0)
			{
				echo "<table border='1' cellpadding='10'>";
				echo "<tr><th>ID</th><th>name</th><th>code</th><th>image</th><th>price</th><th></th><th></th></tr>";
				while ($row = $result->fetch_object())
				{
					echo "<tr>";
					echo "<td>".$row->id."</td>";
					echo "<td>".$row->name."</td>";
					echo "<td>".$row->code."</td>";
					echo "<td>".$row->image."</td>";
					echo "<td>".$row->price."</td>";
					echo "<td><a href='update.php?id=".$row->id ."'>Modificare</a></td>";
					echo "<td><a href='delete.php?id=".$row->id ."'>Stergere</a></td>";
					echo "</tr>";
				}

				echo "</table>";
			}
			else
			{
				echo "Nu sunt inregistrari in tabela!";
			}
		}
		else
		{ 
			echo "Error: ".$mysqli->error(); 
		}
	$mysqli->close();
	?>
			 <a href="insert.php">Adaugarea unei noi inregistrari</a>
 </body>
</html>