<!doctype html>
<html>
<head>
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
ini_set('display_errors','off');
?>
<?php
$baglan = mysqli_connect("localhost","root","","mywebapp");
	if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>
<meta charset="utf-8">
<title>Profile</title>
<style type="text/css">
  
  body {
  background-image:url(resources/img/paysage.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}

</style>
<script>


 /* var conteneur = document.getElementById('picture');
  var img = document.createElement('img');

  if("<?php echo $_SESSION["gender"];?>" == "Man"){
      img.src = "user.png";
      conteneur.appendChild(img);
  }
  else{
      img.src = "vehicomm.png";
      conteneur.appendChild(img);
  }*/

  </script>
</head>

<body> 

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <i><a class="navbar-brand" href="#" title="Profile"><img src="resources/img/vehicomm.png" class="vehicomm"></a></i>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php">Home</a></li>
      <li><a href="index.php">Products</a></li>
      <li><a href="basket1.php">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
          <?php
      if(isset($_SESSION["email"])){
        echo "<li><a href='#' style='color:white; cursor:default'>
        <img src='resources/img/user.png' width='20px'><i> Hello ".$_SESSION["name"]."</i></a></li>";
        echo "<li><a href='logout.php'><img src='resources/img/logout.png' width='20px'> Log Out</a></li>";
      }
      else{
        echo "<li><a href='register.php'> Sign Up</a></li>
        <li><a href='login.php'><img src='resources/img/user.png' width='20px'> Log In</a></li>";
      }
      ?>
      </ul>
  </div>
</nav>
<br><br><br>

<div class="container form">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="well well-sm prof">
                <div class="row">
                    <div  class="col-sm-6 col-md-4" id="picture">
                       <?php
                      if(isset($_SESSION["email"])){
                        echo "<img src='resources/img/homer.jpg' alt='picture'/>";
                      }
                        ?>
                        
                    </div>
                    <div class="col-sm-6 ">
                        <h1><i>
                             <?php
                            if(isset($_SESSION["email"])){
// Echo session variables that were set on previous page
echo $_SESSION["name"]." ".$_SESSION["surname"]. "</i><br>";
?></h1>
                       
                        <p>
                            <h3><i class="glyphicon glyphicon-envelope"></i> <?php
// Echo session variables that were set on previous page
echo $_SESSION["email"] . "<br>";
?></h3>
                           <h3>
                           </br>
                            <i class="glyphicon glyphicon-earphone"></i> <?php
// Echo session variables that were set on previous page
echo $_SESSION["telephone"] . "<br>";
?></p></h3>
                            <br />
                              <h4><cite title="San Francisco, USA">  <i class="glyphicon glyphicon-map-marker"> <?php
// Echo session variables that were set on previous page
echo $_SESSION["adress"] . "<br>";}
?>
                        </i></cite></h4>
          </br>
</p></h3>
                        <!-- Split button -->
                        <div class="btn-group" >
                        <?php if(isset($_SESSION["email"])){
                           echo " <button  class=\"btn btn-primary\" onClick=\"location.href='main.php'\" type=\"submit\" name=\"submit\">";
                           echo "     Exit Profile </button>";
                           
          
                              
                            echo "<button  class=\"btn btn-primary\" onClick=\"location.href='edit.php'\" type=\"submit\" name=\"submit9\">";
                             echo "   Edit Profile </button>";
                             
              
            
                          echo " <button class=\"btn btn-primary\"  type=\"button\" onClick=\"location.href='basket1.php'\">Basket</button>";
                        }
                        else
                          echo "<p style=\"color:red;\" class=\"bg-danger\"><strong>Please Log In </strong></p>";
                        
                          ?>
                            </ul>
                        </div>

                    

                    </div>
                    </div>
            </div>
        </div>
    </div>
    
</div>

</body>
</html>

