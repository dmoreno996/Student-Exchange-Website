<?php
    //setting variables to connect to db
    $host = "localhost";
    $user = "group4";
    $password="studentexchange";
    $datab = "group4";

    $db = mysqli_connect($host, $user, $password, $datab);  //connect to database 
    //generic check for error
    if(mysqli_connect_errno())
    {
        echo "Connection failed: " . mysqli_connect_errno();
        exit();
    }

    if(isset($_POST['email']))
    {
        $uname=$_POST['email']; //grabbing input from html form
        $password=$_POST['pass'];
        $sql="select * from USERS where email='".$uname."'AND password='".$password."' limit 1";
        $result=mysqli_query($db,$sql); //run an sql query, taking two arguments 1 - database connection 2 - sql query
    }
    if(mysqli_num_rows($result)==1) //result returned must be one row
    {
        session_start();
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $uname;
        header("Location: additem.php");
        
    }
    else //anything else means error 
    {
        echo "You have entered incorrect username or password.";
        header("Location: login.html");
    }
?>