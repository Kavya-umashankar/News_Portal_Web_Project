<!doctype html>
<html lang="en">
  <style>
    body{
      background-image:url("https://www.desktopbackground.org/download/1920x1080/2010/12/16/127022_light-grey-backgrounds-hd_2560x1600_h.jpg");
      background-repeat:no-repeat;
      background-size:41cm 25cm;
      margin-top:6cm;
    }
    h2{
      font-size:50px;
      color:darkblue;
      text-align:center;
    }

  </style>  
<body>

<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    
    $category =$_POST['dropdown-menu'];
    $headline = $_POST['Headline'];
    $content = $_POST['content'];
    $authour = $_POST['authour'];
    $posttime = $_POST['time'];
    $date = $_POST['dates'];

    $headline = str_replace("'","\'",$headline);
    $content = str_replace("'","\'",$content);
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "wta";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
    //echo "<h1>Inserted Successfully!!<h1>";

    //$sql = "insert into case_details (cimage,type,description,cdate) values(?,'$type','$dis','$date')";

    
?>
<?php

if ($category == "national"){

  $q = "INSERT INTO news (img,headlines,content,authour,date, posttime, comment1, comment2)VALUES (?,'$headline','$content','$authour','$date','$posttime', NULL ,NULL)";

}elseif ($category == "educational") {

    $q = "INSERT INTO educational ( img,headlines,content,authour,date, posttime, comment1, comment2)VALUES (?,'$headline','$content','$authour','$date','$posttime', NULL ,NULL)";

} elseif ($category == "sports") {

  $q = "INSERT INTO sports (img, headlines,content,authour,date, posttime,comment1, comment2)VALUES (?,'$headline','$content','$authour','$date','$posttime', NULL ,NULL)";

} elseif ($category == "business") {

  $q = "INSERT INTO business (img, headlines,content,authour,date, posttime,comment1, comment2)VALUES (?,'$headline','$content','$authour','$date','$posttime', NULL ,NULL)";

} elseif ($category == "scitech") {

  $q = "INSERT INTO scitech (img, headlines,content,authour,date, posttime, comment1, comment2)VALUES (?,'$headline','$content','$authour','$date','$posttime', NULL ,NULL)";

}else{
  echo "HMMMM... I REALLY DON'T KNOW! DBMS!";
}


$stmt = mysqli_prepare($conn,$q);

    mysqli_stmt_bind_param($stmt, "s" ,$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly UPloaded please login now ';
    }else{
        $msg = 'Error uploading image';
    }
    mysqli_close($conn);
}


?>

<h2>Article Inserted Successfully!!<h2>

<a href = 'insertdatainwebsite.php'><h5>enter another record<h5></a>

<br>
<?php
 
 if ($category == "national"){

  echo "<a href = 'national1.php'><h5>View record<h5></a>";
 
}elseif ($category == "educational") {
  echo "<a href = 'educational1.php'><h5>View record<h5></a>";
  
} elseif ($category == "sports") {
  echo "<a href = 'sports1.php'><h5>View record<h5></a>";
 
} elseif ($category == "business") {

  echo "<a href = 'business1.php'><h5>View record<h5></a>";
} elseif ($category == "scitech") {

  echo "<a href = 'scitech1.php'><h5>View record<h5></a>";

}else{
  echo "HMMMM... I REALLY DON'T KNOW! Where your file is!";
}

?>
  </body>
 
</html>
