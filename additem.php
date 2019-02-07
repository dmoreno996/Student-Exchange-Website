<?php
	session_start();
	//check if button was pressed
	if(isset($_POST["button"]))
	{	
		//if username is set then user is signed in and can contine
		if(!isset($_SESSION['username']))
		{
			//redirect to login
			header("Location: login.html");	
		}
		else
		{
			$email2 = $_SESSION['username'];
			$category = strip_tags($_POST['cate']);
			$itemName = strip_tags($_POST['name']);
			$itemDescription = strip_tags($_POST['desc']);
			$price = strip_tags($_POST['price']);
			$file = addslashes(file_get_contents($_FILES["pic"]["tmp_name"])); //get image and make into text or blob
			$conn = mysqli_connect("localhost","group4","studentexchange","group4");
			$check = "SELECT * FROM USERS WHERE email= '$email2';";
			$checkresult = mysqli_query($conn, $check);
			$row = mysqli_fetch_array($checkresult);
			$sql = "INSERT INTO LISTING VALUES (NULL, $row[0],'$category', '$itemName' , '$itemDescription' , $price, NULL , Curdate() , NULL, '$file');";
			mysqli_query($conn,"SET foreign_key_checks = 0;");
		    if(mysqli_query($conn, $sql))  
      		{  
        	   echo '<script >alert("Your listing is now live!")</script>';  
      		}  
      		else
      		{	 
      			$errorString = mysqli_error($conn);      			   	
        		echo '<script>alert("' . $errorString . '")</script>';        			
			}
			mysqli_query($conn,"SET foreign_key_checks = 1;");
		}
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="template.css">
	<link rel="icon" type="image/png" href="Pictures/icon4.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<header>
	<div id="headerbox"><img src="Pictures/logo1.png" alt="student exchange logo" height="100" >
	Deals for students
	</div> <!-- /#headerbox -->
	<nav class="topNav">
		<ul>
			<li><a href="homepage2.php"> HOME</a></li>
			<li><a href="category.php"> CATEGORY </a></li>
			<li><a href="browse.php"> BROWSE CATALOG</a></li>
			<li><a href="profile.php"> VIEW PROFILE</a></li>
			<li><a href="additem.php"> ADD NEW ITEM</a></li>			
			<li><a href="signup.php"> SIGN UP</a></li>
			<li><a href="login.html"> LOGIN </a></li>
			<li><a href="contact.html"> CONTACT US</a></li>
		</ul>
	</nav>
</header>
<div id="additemcontent">
    <section class="w3-row-padding w3-center w3-light-grey">	
		<!-- Your code goes here for page content -->
		<h1>Add a new item to list with a photo</h1>
		<p>Upload your item with Description and price</p>
	<form method="POST" enctype="multipart/form-data" action="additem.php">
		<div class="column">
		   	<p>
		        <label for="name">ITEM NAME: </label><br>
		        <input type = "text" id = "name" name = "name" class="signinput" />
		    </p>			
		   	<p>
		        <label for="desc">DESCRIPTION: </label><br>
		         <input type = "text" id = "desc" name = "desc" class="signinput" />
		    </p>		    
		</div>
		<div class="column">
		    <p>
		    	<label for="cate">CATEGORY: </label><br>
				<select name="cate" size="1" style="width: 200px; height: 30px;">
				  <option value="Business & Industrial">Business & Industrial</option>
				  <option value="Collectibles & Art">Collectibles & Art</option>
				  <option value="Electroics">Electronics</option>
				  <option value="Fashion">Fashion</option>
				  <option value="Home & Garden">Home & Garden</option>
				  <option value="Motors">Motors</option>
				  <option value="Music">Music</option>
				  <option value="Sporting Goods">Sporting Goods</option>
				  <option value="Toys & Hobbies">Toys & Hobbies</option>
				</select>		    		    	
			</p>
		   	<p>
		        <label for="price">PRICE: </label><br>		    
		         <input type = "text" id = "price" name = "price" class="signinput" />
		    </p>		    
		    </div>		
		<div class="column"> 
        	
		    <img src="Pictures/icon2.png" width="120" alt="logo of user adding" >
		    <p>
        		<input class="file-upload-input" type='file' name="pic" onchange="readURL(this);" accept="image/gif,image/jpeg">
		    </p>     
		    <p>
		        <input type = "submit" id = "btn" value = "List item" class="signbtn" name="button" />
		    </p>
		</div> 
	</form>
    </section>
</div>
	 <!-- /#pageContent -->
	<!------Footer------>
<div class="footer-main-div">

<div class="footer-social-icons">
    <ul>
        <li><a href="https://www.facebook.com" target="blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://www.twitter.com" target="blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://www.google.com" target="blank"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="https://www.youtube.com" target="blank"><i class="fa fa-youtube"></i></a></li>
    </ul>
    
</div>
<div class="footer-menu-one">
    <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="contact.php">About Us</a></li>
        <li><a href="additem.php">Services</a></li>
        <li><a href="browse.php">Products</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
</div> 
   
    <div class="footer-menu-two">
    <ul>
        <li><a href="contact.php">En Español</a></li>
        <li><a href="contact.php">Accessibility</a></li>
        <li><a href="contact.php">Copyright Information</a></li>
        <li><a href="contact.php">CSUSM.edu</a></li>
    
    </ul>
</div>           
    
</div>	

<div class="footer-bottom">
    <p>Designed by:<a href="#">The Student Exchange Dev Team</a></p>
</div>
</body>
</html>