<?php

$name = $_POST['name'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$rollno  = $_POST['rollno'];
$department = $_POST['department'];
$yearofstudying = $_POST['yearofstudying'];
$DOB  = $_POST['DOB'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber'];

if (!empty($name) || !empty($fathername) || !empty($mothername) || !empty($rollno) || !empty($department) || !empty($yearofstudying) || !empty($DOB) || !empty($gender) || !empty($address)  || !empty($email) || !empty($mobilenumber)   )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "student";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
        else{
            $SELECT = "SELECT rollno From student_details Where rollno = ? Limit 1";
            $INSERT = "INSERT Into student_details (name , fathername, mothername, rollno ,department, yearofstudying , DOB, gender, address, email, mobilenumber )values(?,?,?,?,?,?,?,?,?,?,?)";
          
          //Prepare statement
               $stmt = $conn->prepare($SELECT);
               $stmt->bind_param("s", $rollno);
               $stmt->execute();
               $stmt->bind_result($rollno);
               $stmt->store_result();
               $rnum = $stmt->num_rows;
          
               //checking username
                if ($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssssssss",$name,$fathername,$mothername,$rollno,$department,$yearofstudying,$DOB,$gender,$address,$email,$mobilenumber);
                $stmt->bind_param("ssssssssssssssss",$patient_id,$patient_name,$patient_age,$patient_gender,$mobile_number,$gaurdain_name,$gaurdain_number,$address,$change_of_hospital,$attended_doctors_name,$current_doctor_name,$patient_history,$current_problem,$past_admission_details,$medicine_history,$admission_status); 
                $stmt->execute();
                $stmt->execute();
                echo '<script>alert ("Upload sucessfully")</script>';
                echo '<script>window.location.href = "adminstu.html"
                </script>';
               } else {
                echo '<script>alert("You already upload using this rollno")</script>';
                echo '<script>window.location.href = "adminstu.html"
                </script>';
               }
               $stmt->close();
               $conn->close();
              }
          } else {
           echo "All field are required";
           die();
          }
        
          ?>