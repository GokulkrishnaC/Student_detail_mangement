<?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    if (isset($_POST["login"])){
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $username=$_POST["name"];
    $password=$_POST["password"];  
    $sql ="SELECT * FROM registration
    WHERE username ='$username'
    AND PASSWORD = '$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>window.location.href = "home.html"
        </script>';
    }
    else{
      echo'<script>alert("invalid credentials .put the correct username and password")</script>';
      echo '<script>window.location.href = "index.html"</script>';
    }

  }
  ?>
