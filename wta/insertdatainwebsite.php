<!doctype html>
<html lang="en">
  <style>
        body{
      background-image:url("https://www.desktopbackground.org/download/1920x1080/2010/12/16/127022_light-grey-backgrounds-hd_2560x1600_h.jpg");
      background-repeat:no-repeat;
      background-size:50cm 40cm;
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }
    .form-group{
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-size:20px;
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
img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 18cm;
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
  <script>
    function fileValidation() { 
    var fileInput =  
        document.getElementById('file'); 
      
    var filePath = fileInput.value; 
  
    // Allowing file type 
    var allowedExtensions =  
            /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i; 
      
    if (!allowedExtensions.exec(filePath)) { 
        alert('Invalid file type'); 
        fileInput.value = ''; 
        return false; 
    }  }

    </script>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Inserting into DBMS</title>
  </head>
  <body class="ml-5 mr-5 mt-5">
    <h1>Inserting into DBMS</h1>


<form method='post' action='insertdatatofile.php' enctype="multipart/form-data">
	<h3><label>DOMAIN:</label></h3>
	<div class="dropdown">
  <select name="dropdown-menu" id="category">
  <option value="national">National</option>
  <option value="educational">Educational</option>
  <option value="sports">Sports</option>
  <option value="business">Business</option>
  <option value="scitech">Sci-tech</option>
</select>
  <h1>
</div>
  <div class="form-group">
    <label for="Headline">Headline</label></h1>
    <input type="text" class="form-control" name="Headline"  >
    
  </div>
  <div class="form-group" >
    <label for="content">Content</label>
	<br>
    <textarea id="content" name="content" style='font-size: 15pt' rows="20" cols="100"></textarea>
  </div>

  <div class="form-group">
    <label for="authour">Authour</label>
    <input type="text" class="form-control" name="authour"  >
  </div>

  <div class="form-group">
    <label for="dates">Date</label>
    <input type="date" class="form-control" name="dates"  >
  </div>

  <div class="form-group">
    <label for="Headline">Post Time</label>
    <input type="time" class="form-control" name="time"  >
    
  </div>
  
  <div class="form-group">
  <input type="file" id="file" onchange="return fileValidation()" style="margin-bottom:20px" name="image" required/>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary">RESET</button>
</form><br><br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>