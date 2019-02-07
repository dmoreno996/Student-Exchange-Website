<?php

//create connection
$mysqli = new mysqli("localhost", "group4", "studentexchange", "group4", 3306);
//check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";




$mysqli->close();
?>