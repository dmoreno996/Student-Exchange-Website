<?php
    // Connect Script
    $host = "localhost";
    $user = "group4";
    $password = "studentexchange";
    $datab = "group4";
    // connect to the database
    $db = mysqli_connect($host, $user, $password, $datab); 
    // generic check for error
    if(mysqli_connect_errno())
    {
        echo "Connection failed: " . mysqli_connect_errno();
        exit();
    }

    $output = " ";
    
    
    //collect
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        $query = mysqli_query($db,"SELECT * FROM LISTING WHERE itemName LIKE '%$searchq%' OR itemDescription LIKE '%$searchq%' ;") or die("could not search!");
        $count = mysqli_num_rows($query); 

        if($count == 0){
            $output = "There was no search results!";
        }
        else{
          while($row = mysqli_fetch_array($query)) {
                $itemID = $row['itemID'];
                $sellerID = $row['sellerID'];
                $category = $row['category'];
                $itemName = $row['itemName'];
                $itemDescription = $row['itemDescription'];
                $price = $row['price'];
                $buyersID = $row['buyersID'];
                $postDate = $row['postDate'];
                $salesDate = $row['salesDate'];

                $output .= '<div>'.$itemName.' '.$itemDescription.'</div>';
                
            }
        }
        
    }

    // Search Category Business & Industrial
    

    // Search Category Collectibles
    if(isset($_POST['Collectibles'])){
        $searchq_c = $_POST['Collectibles'];
        $query_c = mysqli_query($db, "SELECT * FROM LISTING WHERE category LIKE '%$searchq_c%';") or die ("could not be searched!");
        $count_c = mysqli_num_rows($query_c);
        
        if ($count_c == 0){
            $output_c = "There was no search results!";
        }
        else{
            while($row = mysqli_fetch_array($query)) {
                $itemID = $row['itemID'];
                $sellerID = $row['sellerID'];
                $category = $row['category'];
                $itemName = $row['itemName'];
                $itemDescription = $row['itemDescription'];
                $price = $row['price'];
                $buyersID = $row['buyersID'];
                $postDate = $row['postDate'];
                $salesDate = $row['salesDate'];

                $output .= '<div>'.$itemName.' '.$itemDescription.'</div>';
            }
        }
        
    }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Category Page</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="template.css">
	<link rel="icon" type="image/png" href="Pictures/icon4.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    

    <div id="pageContent">	
		<form action="category.php" class="form-inline justify-content-center align-items-center" method="POST" >
			<input type="submit" value="Business & Industrial" name='Business' class ="btn"/>
			<input type="submit" value="Collectibles & Art" name='Collectibles' class = "btn"/>
			<input type="submit" value="Electronics" name='Electronics' class="btn" />
			<input type="submit" value="Fashion" name='Fashion' class="btn" />
			<input type="submit" value="Home & Garden" name='Home' class="btn" />
			<input type="submit" value="Motors" name='Motors' class="btn"/>
			<input type="submit" value="Music" name='Music' class="btn"/>
			<input type="submit" value="Sporting Goods" name='Sporting' class="btn" />
			<input type="submit" value="Toys & Hobbies" name='Toys' class="btn" />
        </form>
        <?php 
                    if(isset($_POST['Business'])){
                $searchq = $_POST['Business'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
        
            if(isset($_POST['Collectibles'])){
                $searchq = $_POST['Collectibles'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
        
            if(isset($_POST['Electronics'])){
                $searchq = $_POST['Electronics'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
            if(isset($_POST['Fashion'])){
                $searchq = $_POST['Fashion'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
        if(isset($_POST['Home'])){
                $searchq = $_POST['Home'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
            if(isset($_POST['Motors'])){
                $searchq = $_POST['Motors'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
            if(isset($_POST['Music'])){
                $searchq = $_POST['Music'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
            if(isset($_POST['Sporting'])){
                $searchq = $_POST['Sporting'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
        
            if(isset($_POST['Toys'])){
                $searchq = $_POST['Toys'];
                $query = mysqli_query($db,"SELECT * FROM LISTING WHERE category LIKE '%$searchq%';") or die("could not search!");
                $count = mysqli_num_rows($query); 

                if($count == 0){
                    $output = "There was no search results!";
                }
                else{
                  while($row = mysqli_fetch_array($query)) {
                        $itemID = $row['itemID'];
                        $sellerID = $row['sellerID'];
                        $category = $row['category'];
                        $itemName = $row['itemName'];
                        $itemDescription = $row['itemDescription'];
                        $price = $row['price'];
                        $buyersID = $row['buyersID'];
                        $postDate = $row['postDate'];
                        $salesDate = $row['salesDate'];

                        $output_b .= '<div>'.$itemName.' '.$itemDescription.'</div>';

                    }
                }

            }
        ?>
        <?php echo $output_b; ?>
    
	<div class="container">
	<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-push-2 col-mid-push-2 col-sm-push-2">
		<form method="POST" action="category.php" style="padding-top: 50px;">
		<input method="POST" title="placeholdertext" type="text" name="search" id="search" placeholder="Type to Search">
		<input method="POST" type="submit" name="submit" value="search" id="submit">
		</form>
        
        <?php echo $output; ?>
   
	</div>
        </div>
    </div>
	
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