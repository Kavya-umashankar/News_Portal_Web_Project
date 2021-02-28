<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script type="text/javascript" src="dynval.js"></script>
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

#sign-in{
  margin-top:100px;
  justify-content: center;
  align-items: center;
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
    width:15cm;
}

legend.scheduler-border {
    width:auto; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
#registerbox{
  font-family: 'Times New Roman', Times, serif;
  font-size: larger;
}

</style>

<script>
var help=["enter your name in the format 'fname lname':\n xxx yyy ",
            "your email address must have the form:user@abc.com",
            "your password must have atleast six characters and it must include one digit"]

function messages(adviceNumber){
    document.getElementById("advicebox").value = help[adviceNumber];
}  
</script>
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
              header("location:front.php");
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


    <div id="registerbox" class="container-fluid mt-4" >
        <div class="row">
            <div class="offset-4 col-5">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">User Register</legend>
                    <div class="control-group">
                      <form action="server.php" method="post">
                        <label class="control-label input-label" for="fname">    Name :</label><br>
                            <input type="text" name="fname" onmouseover="messages(0)" required /><br><br>
                            <label class="control-label input-label" for="gender">    Gender :</label><br>
                            <select id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="other">Other</option>
                              </select><br><br>
                            <label class="control-label input-label" for="email">    Email :</label><br>
                            <input type="email" name="email" onmouseover="messages(1)" required/> <br><br>
                            <label class="control-label input-label" for="pass">    Password :</label><br>
                            <input type="password" name="pass" onmouseover="messages(2)" required /> <br><br>
                            <textarea id="advicebox" rows="3" cols="35" disabled>
this box provides advice on filling out the form on this page.put the mouse cursor over any input field to get advice.
                            </textarea><br>
                            <input class="btn btn-primary" name="reg_user" type="submit" value="Submit">
                            <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                  </form>
                </fieldset>
            </div>
        </div>
    </div>

    </body>
    </html>