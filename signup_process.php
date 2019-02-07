<?php
session_start();

//grab variables passed by the form stored in $_POST
$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['pass']);
$address = strip_tags($_POST['address']);
$state = strip_tags($_POST['state']);
$city = strip_tags($_POST['city']);
$zip = strip_tags($_POST['zip']);

//establish database connection
$connection = mysqli_connect("localhost","group4","studentexchange","group4");

//run 1st sql query to check if user exist
$check = "SELECT COUNT(1) FROM USERS WHERE email= '$email' ;";
$checkresult = mysqli_query($connection, $check);
$row = mysqli_fetch_row($checkresult);
if($row[0] >= 1) //if result is 1 it means user exist so redirect
{
	header("Location: login.html");		
}
else
{
	//insert user into dabase
	$sql = "INSERT INTO USERS VALUES (NULL, '$email', '$password' , '$fname' , '$lname', '$address' , '$state' , '$city',$zip,00000000);";

	$result = mysqli_query($connection,$sql);
	if($result)
	{
		//send welcome email if signed up
		sendEmail($email);
		mysqli_close($connection);
		header("Location: login.html");	
	}
	else 
	{
		//else retry page
		mysqli_close($connection);
		header("Location: signup.html");	
	}
}

function sendEmail($emailaddress)
{
	//use library downloaded into server
	require_once('PHPMailer/PHPMailerAutoload.php');

	//establish new mailer connection
	$mail = new PHPMailer(); 
	$mail->isSMTP();                                   
	$mail->SMTPAuth = true;  
	$mail->SMTPSecure = 'ssl';  //set security gmail uses ssl
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';  
	$mail->isHTML(true); //allow for html code in email body
	$mail->Username = 'studentexchange20@gmail.com'; 
	$mail->Password = 'calstategroup4';    
	
	$mail->SetFrom('no-reply@studentexchange.com', 'TheStudentExchange');
	$mail->Subject = 'Welcome to campus!';
	$mail->Body    = '<h1>Welcome</h1><p>Thank you for picking up TheStudentExchange as your next class. You can now view items youre on the market for as well as add to our contantly expanding marketplace. Do not be shy, there is no midterm here! Just bargains and forgotten treausre. What will you find? </p> <p>Student Exchange Dev Team, employees, associates, and contractors take no responsibility in a users listings or activities. Student Exchange does not condone illicit activities. Any illegal listings will be removed from administrators upon notice. We reserve the right to close any account for any reason whatsoever. Any listings that have gone live, a user takes full responsibility for. By registering for an account, every user has agreed to these aforementioned requirements. This, for all intents and purposes, may be considered a liability release form from Student Exchange. Upon registrering, a user has agreed to withdraw any blame towards the Student Exchange Dev Team, employee, associates, and contractors.</p>';
	$mail->AddAddress($emailaddress); //add users address to the recipient portion of email
	
	//send email
	if(!$mail->Send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}
?>