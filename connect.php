<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (PDOException $e){
    echo $e->getMessage();
}
?>