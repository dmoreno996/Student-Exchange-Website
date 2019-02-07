<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="template.css">
	<link rel="icon" type="image/png" href="Pictures/icon4.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<header>
	<div id="headerbox"><img src="Pictures/logo1.png" alt="student exchange logo" height="100">
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
	<div id="signupContent">	
		<h1>Get started today with a free student account</h1>
		<p>Create a free Student Exchange acount in order to purchase whatever you like in order to help you succeed in school, or sell items that helped you to someone who needs it now.</p> Already signed up? <a href="login.html">Login here.</a>
		<form action="signup_process.php" method="POST">
			<div class="column">
		   	<p>
		        <label for="fname">FIRST NAME: </label><br>
		         <input type = "text" id = "fname" name = "fname" class="signinput" />
		    </p>			
		   	<p>
		        <label for="lname">LAST NAME: </label><br>
		         <input type = "text" id = "lname" name = "lname" class="signinput" />
		    </p>		    
		   	<p>
		        <label for="email">EMAIL: </label><br>
		         <input type = "text" id = "email" name = "email" class="signinput" />
		    </p>
		   	<p>
		        <label for="emailconf">CONFIRM EMAIL: </label><br>		    
		         <input type = "text" id = "emailconf" name = "emailconf" class="signinput" />
		    </p>
		   	<p>
		        <label for="address">ADDRESS: </label><br>		    
		         <input type = "text" id = "address" name = "address" class="signinput" />
		    </p></div>		    
		    <div class="column">		    		    
		   	<p>
		        <label for="state">State: (CA,WA,etc.)</label><br>		    
		         <input type = "text" id = "state" name = "state" class="signinput" />
		    </p>
		   	<p>
		        <label for="city">City: </label><br>		    
		         <input type = "text" id = "city" name = "city" class="signinput" />
		    </p>
		   	<p>
		        <label for="zip">Zip Code: </label><br>		    
		         <input type = "text" id = "zip" name = "zip" class="signinput" />
		    </p>		    		    		   			    
		    <p>
		        <label for="pass">PASSWORD: </label><br>
		        <input type = "password" id = "pass" name = "pass" class="signinput" />
		    </p> </div>		
		    <div class="column">
		    <p>
		        <label for="passconf">CONFIRM PASSWORD: </label><br>
		        <input type = "password" id = "passconf" name = "passconf" class="signinput" />
		    </p> 
		    <img src="Pictures/icon2.png" width="120" alt="logo of user adding" >     		    
		    <p>
		        <input type = "submit" id = "btn" value = "SIGN ME UP" class="signbtn" />
		     </p></div>   
		</form>
	</div> <!-- /#pageContent -->
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
