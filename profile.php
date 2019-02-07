<?php

    session_start();
    
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
    $aSpace = " ";
    
    //see who is the current user
    $currentUser = $_SESSION['username'];
    //echo $currentUser;
    $findUserQuery = "SELECT studentID FROM USERS WHERE email = '".$currentUser."'";
    $whoIAmResult = mysqli_query($db,$findUserQuery);//should have the desired student ID
    while ($currentUserIDtemp= mysqli_fetch_array($whoIAmResult))
    {
        $currentUserID=$currentUserIDtemp['studentID'];
    }
    //echo $currentUserID;
 
    //get data from table
    $query ="SELECT * FROM LISTING WHERE sellerID = '$currentUserID'";//query
    $result =mysqli_query($db,$query);
    
    $query2 = "SELECT * FROM USERS WHERE email = '$currentUser'";//query for user card
    $resultuser = mysqli_query($db,$query2);
  
    while ($userrow = mysqli_fetch_array($resultuser))
    {
        $studentID = $userrow['studentID'];
        $email = $userrow['email'];
        $address = $userrow['password'];
        $userfName = $userrow['fName'];
        $userlName = $userrow['lName'];
        $city = $userrow['CITY'];
        $userAddress = $userrow['address'];
        $zipcode = $userrow['ZIPCODE'];
        $uState = $userrow['STATE'];
        $cCard = $userrow['cCard'];
    }

    $count = mysqli_num_rows($result);
    
    
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Profile Page</title>
        <link rel="stylesheet" type="text/css" href="template.css">
        <link rel="stylesheet" type="text/css" href="profileStyle.css">
        <link rel="icon" type="image/png" href="Pictures/icon4.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
<!----------------------------------------------------------------------------------------------------------------------------->
<body> <!--The Body Starts here -->
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

    <div id="profileContent">
        <!--USER PROFILE CARD-->
        <div class="card">
                    <img src="Pictures/profileImages/user.jpg" alt="user" style="width:100%">
                    <h1><?php echo $userfName; echo $aSpace; echo $userlName;?></h1>
                    <p class="aboutMe"><?php echo $userAddress;?></p>
                    <p class="aboutMe"><?php echo $city; echo $aSpace; echo $uState; echo $aSpace; echo $zipcode; ?></p>
                    <a href="shopCart.php">
                    <p><button>Go to Cart</button></p>
                    </a>
        </div>
            <!--CURRENT LISTINGS OF USER------------>
        <h1>Current Listings</h1>
        <?php
            while ($row = mysqli_fetch_array($result))
            {
                $itemID = $row['itemID'];
                $sellerID = $row['sellerID'];
                $category = $row['category'];
                $itemName = $row['itemName'];
                $itemDescription = $row['itemDescription'];
                $price = $row['price'];
                $buyersID = $row['buyersID'];
                $postDate = $row['postDate'];
                $salesDate = $row['salesDate'];
                $itemPic = $row['photo'];
                

            ?>
                <a href="#">
                    <div class="gallery">
                    
                        <?php echo '<tr><td><img src = "data:image/jpeg;base64, '.base64_encode($row['photo']).'"> </td> </tr>'; //get pictures    
                        ?>
                        <!--<img src = "data:image/jpeg;base64, '.base64_encode($itemPic).'">-->
                        <div class="desc"> <!--This is the descripion of the item-->
                        <h4 class = "text-info"><?php echo $itemName; ?></h4>
                        <h4 class = "text-info"><?php echo $itemDescription; ?></h4>
                        <h4 class = "text-info"><?php echo "$".$price; ?></h4>  
                         </div>
              
                     </div><!--ends gallery-->
                 </a> 
            <?php    

            }//while loop bracket end
        ?>
    </div>
    </section><!--Ending Tag for profile Content-->
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