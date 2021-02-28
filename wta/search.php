<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ContentDisplaystyle.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<?php
session_start();
?>
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
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    margin-left: 30px;
    margin-right: 30px;
    align-items: center;
    text-align: center;
}
.fa-envelope{
    color:maroon;
}
.fa-whatsapp{
    color:#075e54;
}
.fa-print{
    color: black;
}
.fa-twitter{
    color:#00acee;
}
.fa-facebook-official{
    color:#3b5998 ;
}
.fa-reddit-alien{
    color:#ff5700;
}
#content{
    text-align: justify;
    font-family: 'Times New Roman', Times, serif;
    font-size: large;
    word-spacing: 2px;
}
a:hover{
    color: black;
}
pre{
    text-align: justify;
    font-family: 'Times New Roman', Times, serif;
    font-size: large;
    word-spacing: 2px;
    margin-left: 30px;
    margin-right: 30px;
    max-width:1000px;
    overflow: hidden;
    white-space: pre-wrap;
    
}
#searchpage{
    font-family:'Times New Roman', Times, serif;
    margin-top:3cm;
    font-size:21px;
}


</style>

<title>Search for news</title>
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
<script>
	function foo(){
		var selected = document.getElementById("sel").selectedIndex;
		//alert(document.getElementsByTagName("option")[selected].value);
		var input = document.getElementsByTagName("INPUT")[0];
		var att = document.createAttribute("list");
		if (document.getElementsByTagName("option")[selected].value == "National" )
			att.value = "National";
		else if (document.getElementsByTagName("option")[selected].value == "Educational" )
			att.value = "Educational";
		else if (document.getElementsByTagName("option")[selected].value == "Sports" )
			att.value = "Sports";
		else if (document.getElementsByTagName("option")[selected].value == "Business" )
			att.value = "Business";
        else if (document.getElementsByTagName("option")[selected].value == "Scitech" )
			att.value = "Scitech";
		input.setAttributeNode(att);
	}

</script>

<!-- <script>
function myFunction() {
    var headline1 = document.getElementById("inputheadlines").value;
}
</script> -->
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


?>
<div class="container-fluid" id="searchpage" >
<div class="row">
<div class="offset-3 col-3">
<form action='searchRes.php' method='POST'>
    <select name="searchcategory" onchange="foo()" id="sel" style="width:5cm;height:1cm;"> 
    <option value="none" selected disabled hidden> 
          Select a Category
      </option>
	<option value = "National"> National   
	</option>  
	<option value = "Educational"> Educational   
	</option>  
	<option value = "Sports"> sports  
	</option>  
	<option value = "Business"> Business  
    </option> 
    <option value = "Scitech"> scitech  
	</option>  
    </select>  
</div>
 
<div class="col-3">
    <input type="text" name="inputheadlines" id="city" list="" />
    <button  type="submit" id="okButton"  class="btn btn-primary">Search</button>
</form> 
</div>
</div>
</div>
<datalist id="National" >
	<?php
		$sql = "SELECT headlines FROM news";
        $result = $conn->query($sql);
        $i=0;
        while($rs = $result->fetch_assoc()){
            $data[$i] = $rs['headlines'];
            echo "<option> ".$data[$i]."</option>";
            $i++;
        }
	?>
	
</datalist>
<datalist id="Educational" >
	<?php
		$sql = "SELECT headlines FROM educational";
        $result = $conn->query($sql);
        $i=0;
        while($rs = $result->fetch_assoc()){
            $data[$i] = $rs['headlines'];
            echo "<option> ".$data[$i]."</option>";
            $i++;
        }
	?>
</datalist>

<datalist id="Sports" >
	<?php
		$sql = "SELECT headlines FROM sports";
        $result = $conn->query($sql);
        $i=0;
        while($rs = $result->fetch_assoc()){
            $data[$i] = $rs['headlines'];
            echo "<option> ".$data[$i]."</option>";
            $i++;
        }
	?>
</datalist>

<datalist id="Business" >
	<?php
		$sql = "SELECT headlines FROM business";
        $result = $conn->query($sql);
        $i=0;
        while($rs = $result->fetch_assoc()){
            $data[$i] = $rs['headlines'];
            echo "<option> ".$data[$i]."</option>";
            $i++;
        }
	?>
</datalist>

<datalist id="Scitech" >
	<?php
		$sql = "SELECT headlines FROM Scitech";
        $result = $conn->query($sql);
        $i=0;
        while($rs = $result->fetch_assoc()){
            $data[$i] = $rs['headlines'];
            echo "<option> ".$data[$i]."</option>";
            $i++;
        }
	?>
</datalist>
