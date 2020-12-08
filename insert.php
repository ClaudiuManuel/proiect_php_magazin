<?php
include("conectare.php");
if (isset($_POST['submit']))
{
   $name = htmlentities($_POST['name'], ENT_QUOTES);
   $code = htmlentities($_POST['code'], ENT_QUOTES);
   $image = htmlentities($_POST['image'], ENT_QUOTES);
   $price = htmlentities($_POST['price'], ENT_QUOTES);
    
    if ($name == '' || $code == ''||$image==''||$price=='')   
    {
        $error = 'ERROR: Campuri goale!';     
    }else
        {
            if ($stmt = $mysqli->prepare("INSERT into tbl_product (name, code, image, price) VALUES (?, ?, ?, ?)"))
            {
                $stmt->bind_param("sisi", $name, $code,$image,$price);
                $stmt->execute();
                $stmt->close();
            }
            else
            {
              echo "ERROR: Nu se poate executa insert."; 
            }
        }
}

$mysqli->close();
?>

<html>
	<head>
		<title><?php echo "Inserare inregistrata"; ?></title>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
  
  <?php 
  if (!empty($error))
  {
	echo "<div style='padding:4px; border:1px solid red; color:red'>".$error."</div>";
  } ?>
	<form action="" method="post">
	
		<div>
			<strong>Name: </strong> <input type="text" name="name" value=""/><br/>
			<strong>Code: </strong> <input type="text" name="code" value=""/><br/>
			<strong>Image: </strong> <input type="text" name="image" value=""/><br/>
			<strong>Price: </strong> <input type="text" name="price" value=""/> <br/>
			<input type="submit" name="submit" value="Submit" />
			<a href="vizualizare.php">Index</a>
		</div>
	</form>
</body>
</html>