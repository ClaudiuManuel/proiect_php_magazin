<?php
include("Conectare.php");
if(!empty($_POST['id']))
{
	if(isset($_POST['submit']))
	{
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$code = htmlentities($_POST['code'], ENT_QUOTES);
			$image = htmlentities($_POST['image'], ENT_QUOTES);
			$price = htmlentities($_POST['price'], ENT_QUOTES);
	
	if ($name == '' || $code == ''||$image==''||$price=='')
 {
	$error = 'ERROR: Campuri goale!';
 }else{
		if($stmt=$mysqli->prepare("UPDATE tbl_product SET name=?,code=?,image=?,price=? where id='".$_POST['id']."'"))
		{
			$stmt->bind_param("sisi",$name,$code,$image,$price);
			$stmt->execute();
			$stmt->close();
		}
		else{ echo "ERROR: Nu UPDATE!!";}
	  }
	}
 }
?>
<!doctype html>
<html>
<head>
	<title><?php if(!empty($_GET['id'])) {echo "Modificare inregistrare";}?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php if(!empty($error)){ echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";}?>
<form action="" method="post">
<div>
<?php
if(!empty($_GET['id'])) {?>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<p>ID: <?php echo $_GET['id'];
if($result = $mysqli->query("SELECT*FROM tbl_product WHERE id='".$_GET['id']."'"))
{
	if($result->num_rows>0)
	{
		$row=$result->fetch_object();?></p>
		<strong>Name: </strong> <input type="text" name="name" value="<?php echo "$row->name";?>"/><br/>
		<strong>Code: </strong> <input type="text" name="code" value="<?php echo "$row->code";?>"/><br/>
		<strong>Image: </strong> <input type="text" name="image" value="<?php echo "$row->image";?>"/><br/>
		<strong>Price: </strong> <input type="text" name="price" value="<?php echo "$row->price";?>"/><br/>
		<input type="submit" name="submit" value="Submit"/>
		<a href="vizualizare.php">Index</a>
		</div>
		<?php
	}
}
}
?>
</form>
</body>
</html>