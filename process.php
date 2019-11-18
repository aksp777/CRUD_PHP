<?php 
$mysqli = new mysqli("localhost", "root", "", "crud") or die(mysqli_error($mysqli));

$update=false;
$name='';
$location='';
$id=0;


if(isset($_POST['save'])){
	$name=$_POST['name'];
	$location=$_POST['location'];
	$mysqli -> query("INSERT INTO data(name,location) VALUES ('$name', '$location')")or die($mysqli->error);

	header("location: index.php");
}

if (isset($_GET['delete'])){
	$id= $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
	header("location: index.php");
}

if(isset($_GET['edit']))
{
	$id= $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error()); 
	if (count($result)==1){
		$row = $result->fetch_array();
		$name = $row['name'];
		$location = $row['location'];
	} 
}
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$location=$_POST['location'];
	$mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id")or die($mysqli->error());
	header("location: index.php");
}
?>
