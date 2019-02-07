<?php
session_start();

$_SESSION['username'] = 'davidmoreno996@gmail.com';
$email2 = $_SESSION['username'];

if(!isset($_SESSION['uname']))
{
	header("Location: login.html");	
}

$category = strip_tags($_POST['cate']);
$itemName = strip_tags($_POST['name']);
$itemDescription = strip_tags($_POST['desc']);
$price = strip_tags($_POST['price']);

$conn = mysqli_connect("localhost","group4","studentexchange","group4");

$check = "SELECT * FROM USERS WHERE email= '$email2';";
$checkresult = mysqli_query($conn, $check);
$row = mysqli_fetch_array($checkresult);
$num_rows = mysqli_num_fields($checkresult);
$sql = "INSERT INTO LISTING VALUES (NULL, $row[0],'$category', '$itemName' , '$itemDescription' , $price, NULL , Curdate() , NULL);";
mysqli_query($conn,'SET foreign_key_checks = 0');
$result = mysqli_query($conn,$sql);
mysqli_query($conn,'SET foreign_key_checks = 1');
	/*
	$result = mysqli_query($connection,$sql);
	if($result)
	{
		sendEmail($email);
		mysqli_close($connection);
		header("Location: login.html");	
	}
	else 
	{
		mysqli_close($connection);
		header("Location: signup.html");	
	}*/
?>