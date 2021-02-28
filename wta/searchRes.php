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


$asc_query = "SELECT * FROM ".$search_category." where headlines ='".$search_headline."'";   
//echo $asc_query;    
$result =  mysqli_query($conn, $asc_query);
    

$row = mysqli_fetch_array($result);
    $headlines = $row['headlines'];
    $content = $row['content'] ;
    $authour = $row['authour'];
    $time = $row['posttime'];
    $date = $row['date'];
    $image = $row['img'];
    $conn->close();
    $time = substr($time,0,5);
    
    mysqli_free_result($result);




//$id = $data[0][0];

// echo "<h2> CATERGORY : ".$category."</h2><br><br>";
// echo "<h2> HEADLINES : ".$headlines."</h2><br>";
// echo "<h2> CONTENTS : ".$content."</h2>";
echo "</pre>";
$url='localhost'.$_SERVER['REQUEST_URI'];
//echo $url;

?>
<title><?php echo $headlines ?></title>
<body id="main">
<a href="front.php" ><h1 id="heading">THE INDEPENDENT GAZETTE</h1></a>
    <nav id="nav" class="navbar navbar-expand-lg">
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="national1.php">National News</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="educational1.php">Education</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="business1.php">Business</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="sports1.php">Sports</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="scitech1.php">Sci-Tech</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="search.php">Search</a>
            </li>
            <?php 
            if(isset($_SESSION['admin'])) {
              echo "<a style=\"color: white; \" class=\"nav-link\" href = \"admincontrols.php\">Operations</a></li>";
            }  
          ?>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">

            <?php
           
            if(isset($_SESSION['username'])) {
              ?>
              
              <a style="color: White;" class="nav-link1" href="logout.php">Logout</a>
            </li>
            <li class="nav-item" style="color:white;">
              <?php echo $_SESSION['username']." ";?><i class="fa fa-user-circle-o" aria-hidden="true"></i></li>
              
            <?php
           }
           else{
             echo "<a style=\"color: white; float: right;\" class=\"nav-link1\" href = \"userlogin.php\">User Log in</a></li>";

            
             echo "<li class=\"nav-item\">
             <a style=\"color: white;\" class=\"nav-link1\"  href = \"adminlogin.php\">  Admin Log in</a></li>";
           }
          ?>
          
          </ul>
        </div>
    </nav>
    

    <div class="container-fluid ">
    <br>
    <h1 id="head"><?php echo $headlines; ?></h1>
    <br>
    <div class="row">
    <div class="col-1">    
    <i style="margin-left: 20px;" class="fa fa-4x fa-user-circle-o" aria-hidden="true"></i>
    </div>
<div class="col-1">
    <?php  echo $authour ?>
</div>
<div class="col-7">

</div>
<div class="col-3">
<?php    echo date("l, jS \of F Y ", strtotime($date))."<br>";?>
   Posted at: <?php echo $time;?> IST
</div>
</div>

<div class="row">
    <div class="offset-3 col-4">
    <?php
echo '<img src="data:image;base64,'.base64_encode($image).'" alt="image" class="center">';
?>
</div>
</div>




<br><br>
<div class="row mt-5">
    <div class="col-2 ml-4">
    
    </div>
    <div class="col-1">
        <b>SHARE:</b>
    </div>
    <div class="col-1">
    <a href="https://api.whatsapp.com/send?&text=<?php print($url);?>" target="_blank">
    <i class="fa fa-2x fa-whatsapp" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-1">
        <a href="mailto:?Subject=Take a look at this!&amp;Body=Check%20out%20this%20link!%20%20link: <?php print($url);?>">
        <i class="fa fa-2x fa-envelope" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-1">
        <a href="javascript:;" onclick="window.print()">
        <i class="fa fa-2x fa-print" aria-hidden="true"></i>
        </a>
        
    </div>
    <div class="col-1">
        <a href="https://twitter.com/share?url=<?php print($url);?>&amp;text=Check%20this%20out&amp;hashtags=TakeALook" target="_blank">
        <i class="fa fa-2x fa-twitter" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-1">
        <a href="http://www.facebook.com/sharer.php?u=<?php print($url);?>" target="_blank">
        <i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-1">
        <a href="http://reddit.com/submit?url=<?php print($url);?>&amp;title=Take a look at this!" target="_blank">
        <i class="fa fa-2x fa-reddit-alien" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-3">

    </div>
</div>
<br><br>

<div id="content" class="row">
    <div class="col-1 ml-5">

    </div>
    <div class="col-10">
      <?php 
      echo "<pre>";
      echo $content;
      echo "</pre>";?>


<br>
<br>
<a href="search.php" target="_blank"><h3 style="color:black;">Search For News<h3></a>
<br><br>
</div>
</div>