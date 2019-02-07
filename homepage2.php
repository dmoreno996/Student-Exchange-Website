<!DOCTYPE html>
<html lang="en">
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="template.css">
	<link rel="icon" type="image/png" href="Pictures/icon4.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
</head>
<body>
<header>
	<div id="headerbox"><img src="Pictures/logo1.png" alt="student exchange logo" height="100" >
	Deals for students
	</div>
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

<section class="w3-row-padding w3-center w3-light-grey">
   
<?php

//create connection
$mysqli = new mysqli("localhost", "group4", "studentexchange", "group4", 3306);
//check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


//select statement that querrys an Item from the Listing table and displays all the atrributes from listing table to bootstrap cards.
$show = "SELECT DISTINCT * FROM LISTING ORDER BY RAND() LIMIT 8";
$result = mysqli_query($mysqli,$show) or die("database error:". mysqli_error($mysqli));
while($rows = mysqli_fetch_assoc($result)) {
   
?>


    

    <!-----Card 1---->
<div class="cards">
		    <div class="image">
                <?php echo '<img src = "data:image/jpeg;base64, '.base64_encode($rows['photo']).'">';?>
            </div>
                
               
                <div class="category">
            <a href="#">Category: <?php echo $rows['category']; ?></a>
                </div>
                
             <div class="itemtitle">
                 <a href="#">Title: <?php echo $rows['itemName']; ?></a>
		        </div>
          
            <div class="des">
		    <a href="#">Item Description: <?php echo $rows['itemDescription'];?></a>
                </div>
                
                <div class="pr">
		    <a href="#">Price: <?php echo $rows['price'];?></a>
                </div> 
                
        <div class="posttdate">
            <a href="#">Posted on: <?php echo $rows['postDate']; ?></a>
        </div>        
                
         <div class="itemid"> 
             <a href="#">Item ID: <?php echo $rows['itemID']; ?></a>
            </div>
               
                <div class="sellerID">
            <a href="#">Seller ID: <?php echo $rows['sellerID']; ?></a>
            </div>          
                 <button> Read more </button>
		  <a href="shopCart.php"><button>Add to Cart</button></a>  
    </div>
    <?php } ?>
    
    </section>
    
        <!------end of cards ---->
            
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
