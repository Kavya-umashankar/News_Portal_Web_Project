<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="ContentDisplaystyle.css">
</head>
<title>comment deletion successfull</title>
<style>
body{
      background-image:url("https://www.desktopbackground.org/download/1920x1080/2010/12/16/127022_light-grey-backgrounds-hd_2560x1600_h.jpg");
      background-repeat:no-repeat;
      background-size:41cm 25cm;
    }
    h2{
     margin-top:4.5cm;
      font-size:50px;
      color:black;
      text-align:center;
    }
    h3{
        color:black;
      text-align:center;
    }
    #heading{
    background-color:black;
    padding:20px 20px 20px 20px;
    color: white;
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-style: oblique;
    letter-spacing: 1.5px;
    word-spacing: 4px;
    text-align: center;
}

 </style>   

<?php
session_start();

if (isset($_POST['searchcategory'])) {
    $search_category = $_POST['searchcategory'];
    if ($search_category == "National"){
        $search_category = "news";
    }
}

if (isset($_POST['inputheadlines'])) {
    $search_headline = $_POST['inputheadlines'];
}


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
//echo "Connected successfully";


$commentnumber=$_POST['commentcat'];

$asc_query = "UPDATE ".$search_category." SET ".$commentnumber."= NULL where headlines ='".$search_headline."'";   
//echo $asc_query;    
$result =  mysqli_query($conn, $asc_query);


?>

<body id="main">
    
<a href="front.php" ><h1 id="heading">THE INDEPENDENT GAZETTE</h1></a>
    <h2>Comment deleted successfully!!</h2>

    
<a href="delcommentsearch.php"><h3 class="mt-5">delete another comment</h3></a>

</div>
</div>