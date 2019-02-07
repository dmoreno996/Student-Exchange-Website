<?php
	session_start();

	//connect to the database
	$db = mysqli_connect("localhost","group4","studentexchange","group4");
	if(mysqli_connect_errno())
    {
        echo "Connection failed: " . mysqli_connect_errno();
        exit();
    }

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

	
	//$currentUser has the email
	//$currentUserID has the studentID

	
	//finds listings where buyersID is the same as the users
	//$query = "SELECT * FROM LISTING WHERE buyersID = '$currentUserID'";//THE ACTUAL QUERY
	$query = "SELECT * FROM LISTING WHERE sellerID = 9";//THE TEST QUERY
	$total=0;
	$result = mysqli_query($db,$query);
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <title>My Shopping Cart</title>
        <link rel="stylesheet" type="text/css" href="template.css">
		<link rel="stylesheet" type="text/css" href="shopCartStyle.css">
		<script type = "text/javascript" src="shopCart.js"></script>
        <link rel="icon" type="image/png" href="Pictures/icon4.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
<!----------------------------------------------------------------------------------------------------------------------------->
	<body > <!--The Body Starts here -->
		<header>
			<div id="headerbox"><img src="Pictures/logo1.png" alt="student exchange logo" height="100" >
			Deals for students
			</div>
			<nav class="topNav">
				<ul>
				<li><a href="homepage2.php"> HOME</a></li>
                <li><a href="browse.php"> BROWSE CATALOG</a></li>
                <li><a href="profile.php"> VIEW PROFILE</a></li>
                <li><a href="contact.html"> CONTACT US</a></li>
                <li><a href="additem.php"> ADD NEW ITEM</a></li>			
                <li><a href="signup.php"> SIGN UP</a></li>
                <li><a href="login.html"> LOGIN </a></li>
                <li><a href="category.php"> CATEGORY </a></li>
					
				</ul>
			</nav>
		</header>
	

		<div id="shopCartContent">
			<div id = "page">
			<table id="cart">
						<thead>
							<tr>
								<th class = "first">Item ID</th>
								<th class = "second">Product</th>
								<th class = "third">Price ($)</th>
								<th class = "fourth">Quantity</th>
							</tr>
						</thead>
						<tbody>
					<!--shopping cart contents-->
				<?php
					while($row=mysqli_fetch_array($result))
					{	
						$total  = $total +$row['price'];
						/*echo "price: " .$price."<br> ";
						echo "row: " .$row['price']."<br> ";
						echo "Total: " .$total."<br> <br>";*/
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
					
						<tr class = "entry"><!--A Single Entry-->
							
							<!--picture goes here-->

								<td><?php echo $itemID; ?></td>
								<td><?php echo $itemName; ?></td>				
								<td id="theprice"><?php echo $price; ?></td>
								<!--Make a quantity drop down-->
								<label for ="drop"></label>
								<td><select id = "drop" onchange="calculateTotal()">
									<option value = "1" selected="selected">1</option>
							
								</select></td>
							
						</tr> <!--Entry end-->
				<?php
			
					}//php while loop end
				?>
				

				<tr class = "extracosts"> <!--This one will handle the totals-->
					<!--print totals after doing math in javascript-->
					
					<td id = "totalbefore">Total(Before Tax) <div id="beforeTotal"><?php echo $total; ?></div></td>
					<?php 
						$taxRate=0.05;
						$tax=$total*$taxRate ;
						$finalTotal=$total+$tax;
					?>
					<td>Tax(5.00%): <?php echo round($tax,2); ?> </h4>
					<td id = "totalafter">Total(After Tax)<div id="finalResult"><?php echo round($finalTotal,2); ?></div> </td>
				</tr>
				<tr class = "checkoutrow">
					<form action = "profile.php">
						<td colspan="5" class ="checkout"><button id = "submitbtn" type="submit" onclick="alert('Thank you for your Purchase!')">Checkout</button></td>
					</form>
				</tr>
				</tbody>

				</table><!--ends cart-->
			</div>
		</div>	<!--shopCart Content ending div-->


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
					<li><a href="contact.php">Services</a></li>
					<li><a href="browse.php">Products</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</div> 
			
				<div class="footer-menu-two">
				<ul>
					<li><a href="contact.php">Blog</a></li>
					<li><a href="contact.php">News</a></li>
					<li><a href="contact.php">Gallery</a></li>
					<li><a href="contact.php">Media</a></li>
				
				</ul>
		</div>         
			
		<div class="footer-bottom">
			<p>Designed by:<a href="#">The Student Exchange Dev Team</a></p>
		</div>
	</body>
</html>
