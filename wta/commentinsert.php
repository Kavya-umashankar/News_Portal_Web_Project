<?php
session_start();
     $conn = mysqli_connect('localhost','root','');
     if(!$conn)
     {
          echo "Not connected to Server";
     }

     if(!mysqli_select_db($conn,'wta'))
     {
          echo "Database not selected";
     }
     $email = $_SESSION['username'];
     $nid = $_POST['nid'];
     $category=$_POST['category'];
     $comment1=$_POST['comment'];
     $cno=$_POST['cno'];
     $url = $_POST['url'];
     //$Data = $_POST['data'];
     $temp = explode('/',$url);
     $comment = $email.'`'.$comment1;
     echo $comment;
     echo $cno;
     $sql = "UPDATE $category SET $cno ='$comment' where Id='$nid'";
     $url = end($temp);
     if(!mysqli_query($conn,$sql))
     {
        echo "comment  not sent!";
     }
      else
     {
         
          echo "comment  SENT!";
         header("location:$url");
     }

?>