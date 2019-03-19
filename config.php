<?php 
$dbserver="localhost";
    $dbuser="iste";
    $dbpwd="iste";
    $dbname="iste";
    $conn=mysqli_connect($dbserver,$dbuser,$dbpwd,$dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>