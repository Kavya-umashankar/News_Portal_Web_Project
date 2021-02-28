<!doctype html>
<html lang="en">
<body>
<body id="main">
    
<?php
session_start();
$msg = '';
if (isset($_POST['reg_user'])) {
    $name =$_POST['fname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "wta";
 
    $sql = "INSERT INTO users (name, gender, email, password)
    VALUES ('$name', '$gender', '$email' ,'$pass')";
    
    $conn = mysqli_connect($servername, $username, $password, $db);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  
    if (mysqli_query($conn, $sql)) {
        header("location:userlogin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
      
    mysqli_close($conn);
}
      
?>
</body>
</html>