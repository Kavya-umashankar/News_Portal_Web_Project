<?php 
  session_start();
  $con = mysqli_connect("localhost","root","","wta");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $pass = mysqli_real_escape_string($con,$_POST['password']); 
      $email = mysqli_real_escape_string($con,$_POST['email']);

      $sql = "SELECT name FROM users WHERE email = '$email' and password = '$pass';";

      $result = mysqli_query($con,$sql);
      
$row = mysqli_fetch_array($result);
        $user = $row['name'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         
            $_SESSION['username'] = $user;
          
            header("location: front.php"); 
          
      }else {
        ?>
        
        <?php
         echo "<center><h3 style='color:red';>Your Login Name or Password is invalid</h3></center>";
          
      }
   }
    
   ?>

