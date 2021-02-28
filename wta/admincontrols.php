<?php
session_start();
?>
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
   <style>
          body{
    background-color: rgb(220, 227, 230);
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
   <body>

    <a href="front.php" ><h1 id="heading">THE INDEPENDENT GAZETTE</h1></a>
    <nav id="nav" class="navbar navbar-expand-lg">
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="national1.php">National News</a>
            </li>
            <li class="nav-item">
              <a style="color: white;" class="nav-link" href="education1.php">Education</a>
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
            else{
              header("location:front.php");
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
             header("location:front.php");
           }
          ?>

          </ul>
        </div>
    </nav>
    <div class="row" style="margin-top: 3cm;">
        <div class="offset-2 col-3">
          <div class="card" style="width:6cm; height:3.5cm;">
            <div class="card-body">
              <h5 class="card-title">Add article</h5>
              <br>
              <a href="insertdatainwebsite.php" class="btn btn-info" style="margin-left: 3cm;">Click</a>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card" style="width:6cm; height:3.5cm;">
            <div class="card-body">
              <h5 class="card-title">Delete article</h5>
             <br>
              <a href="searchDel.php" class="btn btn-info" style="margin-left: 3cm;">Click</a>
            </div>
          </div>
        </div>
     

      
        <div class="col-3">
          <div class="card" style="width:6cm; height:3.5cm;">
            <div class="card-body">
              <h5 class="card-title">Delete comment</h5>
              <br>
              <a href="delcommentsearch.php" class="btn btn-info" style="margin-left: 3cm;">Click</a>
            </div>
          </div>
          </div>
        

   </body>
  </html>
  