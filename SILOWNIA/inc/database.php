<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "silownia";

// Create connection
$polaczenie = new mysqli($servername, $username, $password, $dbname)

// Check connection

    or die("Connection failed: " . $polaczenie->connect_error);

//polskie znaki
mysqli_set_charset($polaczenie,"utf8");

return $polaczenie;
?>