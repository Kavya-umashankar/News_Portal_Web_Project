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

$servername = "localhost";
$username = "root";
$password = NULL;
$db = "wta";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

$sql = "SELECT * FROM business ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);
$i=0;
while($rs = $result->fetch_assoc()){
    $data[$i] = array('id'=>$rs['id'],'headlines'=>$rs['headlines'], 'content'=>$rs['content'], 'authour'=> $rs['authour'],'date'=>$rs['date'], 'posttime'=> $rs['posttime'],'imag'=>$rs['img'], 'comment1'=> $rs['comment1'], 'comment2'=> $rs['comment2'],'comment3'=> $rs['comment3'],'comment4'=> $rs['comment4'],'comment5'=> $rs['comment5'],'comment6'=> $rs['comment6'],'comment7'=> $rs['comment7'],'comment8'=> $rs['comment8'],'comment9'=> $rs['comment9'],'comment10'=> $rs['comment10']);
    $i++;
}
$tablename="business";
$id = $data[7]['id'];
$headlines = $data[7]['headlines'];
$content = $data[7] ['content'] ;
$authour = $data[7]['authour'];
$time = $data[7]['posttime'];
$conn->close();
$time = substr($time,0,5);
$date = $data[7]['date'];

$message="Leave your comment here!";


if ($data[7]['comment1'] == NULL)
{
    $c1 = "comment1";
    $message = "Be the first one to comment!";
}
elseif($data[7]['comment2']==NULL){
    $c1 = "comment2";
}
elseif($data[7]['comment3']==NULL){
    $c1 = "comment3";
}
elseif($data[7]['comment4']==NULL){
    $c1 = "comment4";
}
elseif($data[7]['comment5']==NULL){
    $c1 = "comment5";
}
elseif($data[7]['comment6']==NULL){
    $c1 = "comment6";
}
elseif($data[7]['comment7']==NULL){
    $c1 = "comment7";
}
elseif($data[7]['comment8']==NULL){
    $c1 = "comment8";
}
elseif($data[7]['comment9']==NULL){
    $c1 = "comment9";
}
else {
    $c1 = "comment10";
}

$url='localhost'.$_SERVER['REQUEST_URI'];

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
<br><br>
<div class="row">
    <div class="offset-3 col-4">
    <?php
echo '<img src="data:image;base64,'.base64_encode($data[7]['imag']).'" alt="image">';
?>
</div>
</div><div class="row mt-5">
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

 <div class="col-1">
<br>
<br>
 </div>
 <div class="line"></div>
    </div>
</div>
</div>

<div class="container-fluid" id="comment">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
<div class="card" style="background-color:rgb(236, 241, 243)" ; >
    <h5 class="card-header" style="background-color:rgb(213, 216, 218)" ;>Comments</h5>
    <div class="card-body">
    <?php
if ($data[7]['comment1'] != NULL)
{
    $cdata = explode('`',$data[7]['comment1']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment\" name=\"comment1\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment2']!=NULL){
    $cdata = explode('`',$data[7]['comment2']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment\" name=\"comment2\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment3']!=NULL){
    $cdata = explode('`',$data[7]['comment3']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment\" name=\"comment3\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment4']!=NULL){
    $cdata = explode('`',$data[7]['comment4']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment4\" name=\"comment4\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment5']!=NULL){
    $cdata = explode('`',$data[7]['comment5']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment5\" name=\"comment5\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment6']!=NULL){
    $cdata = explode('`',$data[7]['comment6']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment6\" name=\"comment6\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment7']!=NULL){
    $cdata = explode('`',$data[7]['comment7']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment7\" name=\"comment7\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment8']!=NULL){
    $cdata = explode('`',$data[7]['comment8']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment8\" name=\"comment8\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if($data[7]['comment9']!=NULL){
    $cdata = explode('`',$data[7]['comment9']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment9\" name=\"comment9\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}
if ($data[7]['comment10']!=NULL) {
    $cdata = explode('`',$data[7]['comment10']);
    echo "<i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i>   ".$cdata[0];
    echo "<br><textarea id=\"comment10\" name=\"comment10\" rows=\"1\" cols=\"50\" disabled> $cdata[1]
    </textarea><br><br>";
}



    ?>
    
<?php
            if(isset($_SESSION['username'])) {
                ?>
                <br>
                <form action="commentinsert.php" method="post">
                <input type="hidden" name="nid" id="nid" value="<?php echo $id ?>" >
      <input type="hidden" name="category" id="category" value="<?php echo $tablename ?>" >
      <input type="hidden" name="cno" id="cno" value="<?php echo $c1 ?>" >
      <input type="hidden" name="url" id="url" value="<?php echo $url ?>" >
      <h6><?php echo $message;?></h6>
      <textarea id="comment" name="comment" rows="1" cols="50" placeholder="Please do not use ` symbol"></textarea> 
    </textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
              <?php
            }
            else{
               ?>
               <br>
                <a href="userlogin.php">Login to leave a comment</a>
            <?php  }

?>

    </div>
  </div>
</div>
  <div class="col-1"></div>
</div>
</div>
<br><br><br><br>
<div class="container-fluid mt-5 mb-5">
<div class="row">
<div class="offset-1 col-1">
<a href="business7.php"><button type="submit" class="btn btn-primary" style="width:2.5cm;">Previous</button>
            </a></div>
<div class="offset-8 col-1">
<a href="business9.php"><button class="btn btn-primary" style="width:2.5cm;">Next</button></a> 
</div>
</div>
</div>
<br><br>
</body>
</html>