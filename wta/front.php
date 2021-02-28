<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<?php
session_start();
?>
<style>
body{
    background-color: rgb(233, 235, 236);

  
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
#links{
  font-size: 20px;
  font-family:'Times New Roman', Times, serif;
}

h2{
  font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}
img{
  width:11.5cm;
}


.navbar-nav {
      flex-direction: row;
    }
    
    .nav-link1 {
      color:white;
      padding-right: .5rem !important;
      padding-left: .5rem !important;
    }
    
    /* Fixes dropdown menus placed on the right side */
    .ml-auto .dropdown-menu {
      left: auto !important;
      right: 0px;
    }
</style>
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

<?php
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
//echo "Connected successfully<br>";

$sql = "SELECT headlines FROM news ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = $rs['headlines'];
    $i++;
}
?>

<div class="container-fluid pt-5">
  <h2 class="pb-4 pl-4">NATIONAL NEWS</h2>
  <div class="row pl-4">
    <div class="col-4">
      <img src="https://english.cdn.zeenews.com/sites/default/files/styles/zm_700x400/public/2021/01/15/910699-narendra-modi-1.jpg">
    </div>
    <div class=" offset-1 col-7 pt-4" id="links">
      <a href="national1.php" style="color:black;"><?php echo $data[0]; ?></a><br><br>
        <a href="national2.php" style="color:black;"><?php echo $data[1]; ?></a><br><br>
          <a href="national3.php" style="color:black;"><?php echo $data[2]; ?> </a><br><br>
            <a href="national4.php" style="color:black;"><?php echo $data[3]; ?></a><br><br> 
    </div>
  </div>
<div class="line pt-4" style="border-bottom: black 1px solid;">


<?php
$sql = "SELECT headlines FROM educational ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = $rs['headlines'];
    $i++;
}
?>
</div>
</div>
<div class="container-fluid pt-5">
  <h2 class="pb-4 pl-4">EDUCATIONAL NEWS</h2>
  <div class="row pl-4">
    <div class="col-4">
      <img src="https://images.theconversation.com/files/45159/original/rptgtpxd-1396254731.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=754&fit=clip">
    </div>
    <div class=" offset-1 col-7 pt-4" id="links">
      <a href="educational1.php"style="color:black;"><?php echo $data[0]; ?> </a><br><br>
        <a href="educational2.php" style="color:black;"><?php echo $data[1]; ?></a><br><br>
          <a href="educational3.php" style="color:black;"><?php echo $data[2]; ?> </a><br><br>
            <a href="educational4.php" style="color:black;"><?php echo $data[3]; ?></a><br><br> 
    </div>
  </div>
<div class="line pt-4" style="border-bottom: black 1px solid;">
</div>
</div>

<?php
$sql = "SELECT headlines FROM sports ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = $rs['headlines'];
    $i++;
}
?>
<div class="container-fluid pt-5">
  <h2 class="pb-4 pl-4">SPORTS NEWS</h2>
  <div class="row pl-4">
    <div class="col-4">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIa3Zzbt-YBeyJstCAMN3rO-k6-KX3Vm5-tA&usqp=CAU">
    </div>
    <div class=" offset-1 col-7 pt-4" id="links">
    <a href="sports1.php" style="color:black;"><?php echo $data[0]; ?></a><br><br> 
      <a href="sports2.php" style="color:black;"><?php echo $data[1]; ?></a><br><br>
        <a href="sports3.php" style="color:black;"><?php echo $data[2]; ?></a><br><br>
          <a href="sports4.php" style="color:black;"><?php echo $data[3]; ?> </a><br><br>
            
    </div>
  </div>
<div class="line pt-4" style="border-bottom: black 1px solid;">
</div>
</div>

<?php
$sql = "SELECT headlines FROM business ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = $rs['headlines'];
    $i++;
}
?>
<div class="container-fluid pt-5">
  <h2 class="pb-4 pl-4">BUSINESS NEWS</h2>
  <div class="row pl-4">
    <div class="col-4">
      <img src="https://insightadvertising.typepad.com/.a/6a00d83452534069e2022ad382b261200d-800wi">
    </div>
    <div class=" offset-1 col-7 pt-4" id="links">
      <a href="business1.php" style="color:black;"><?php echo $data[0]; ?> </a><br><br>
        <a href="business2.php" style="color:black;"><?php echo $data[1]; ?></a><br><br>
          <a href="business3.php" style="color:black;"><?php echo $data[2]; ?></a><br><br>
            <a href="business4.php" style="color:black;"><?php echo $data[3]; ?></a><br><br> 
    </div>
  </div>
<div class="line pt-4" style="border-bottom: black 1px solid;">
</div>
</div>

<?php
$sql = "SELECT headlines FROM scitech ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = $rs['headlines'];
    $i++;
}
?>
<div class="container-fluid pt-5">
  <h2 class="pb-4 pl-4">SCI-TECH</h2>
  <div class="row pl-4">
    <div class="col-4">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQeE5RradaEh3jLfcyS119oJsWzUP1BrENmQ&usqp=CAU">
    </div>
    <div class=" offset-1 col-7 pt-4" id="links">
      <a href="scitech1.php" style="color:black;"><?php echo $data[0]; ?></a><br><br>
        <a href="scitech2.php" style="color:black;"><?php echo $data[1]; ?></a><br><br>
          <a href="scitech3.php" style="color:black;"><?php echo $data[2]; ?> </a><br><br>
            <a href="scitech4.php" style="color:black;"><?php echo $data[3]; ?></a><br><br> 
    </div>
  </div>
<div class="line pt-4" style="border-bottom: black 1px solid;">
</div>
</div>

  </body>
  </html>