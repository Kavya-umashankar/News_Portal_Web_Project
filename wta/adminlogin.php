<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

#nav{
    background-color: rgb(170, 26, 26);
    margin-top: -0.2cm;
}
.nav-link{
    color:white;
    font-size: large;
    
}

#head{
  color: white;
}

a:visited,link{
color: black;
}


#Entertainment{
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
#right{
  margin-left:0.5cm;
}
#right2{
  margin-left:23cm;
}
fieldset.scheduler-border {
    border: 1px double black;
    padding: 0 1.4em 1.4em 1.4em;
    margin: 0 0 1.5em 0;
}

legend.scheduler-border {
    width:auto; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
#loginbox{
  font-family: 'Times New Roman', Times, serif;
  font-size: larger;
}


</style>
<body id="main">
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
    <div id="loginbox" class="container-fluid" style="margin-top: 2.5cm;">
    <div class="row">
        <div class="offset-4 col-4">
        <form action="adminserver.php" method="post">
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Admin login</legend>
            <div class="control-group">
                <label class="control-label input-label" for="email"><i class="fa fa-envelope"></i>    E-mail :</label><br>
                    <input type="email" name="email" placeholder="abc@gmail.com" /><br><br>
                    <label class="control-label input-label" for="pass"><i class="fa fa-key"></i>    Password :</label><br>
                    <input type="password" name="password" /> <br><br>
                    <input class="btn btn-primary" type="submit" value="Submit"><br>
                  </form>

            </div>
        </fieldset>
    </div>
</div>
    </div>

    </body>
    </html>