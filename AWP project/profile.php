<!doctype html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
?>
<?php
$baglan = mysqli_connect("localhost","root","manisa45","ecommercial");
	if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="https://banner2.kisspng.com/20180519/jjs/kisspng-e-commerce-logo-electronic-business-5b00d2d0918d84.2335269315267806245962.jpg" width="50px"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/profilemain.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
      <a style="margin-right: 5px" href="http://localhost/profile.php" >
<img src="https://cdn2.iconfinder.com/data/icons/business-management-52/96/Artboard_20-512.png" width="30px">
</a>
	  </form>
  
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="well well-sm">
                <div class="row">
                    <div  class="col-sm-6 col-md-4">
                        <img style="width:350px; height: 450px " src="<?php echo $_SESSION["picture"]; ?>" alt="picture"/>
                    </div>
                    <div class="col-sm-6 ">
                        <h1>
                            <?php
// Echo session variables that were set on previous page
echo $_SESSION["name"]." ".$_SESSION["surname"]. "<br>";
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
echo $_SESSION["adress"] . "<br>";
?>
                        </i></cite></h4>
					</br>
          <i class="glyphicon glyphicon-asterisk"></i> <?php
// Echo session variables that were set on previous page
echo $_SESSION["gender"] . "<br>";
?></p></h3>
                        <!-- Split button -->
                        <div class="btn-group" >
                        
                            <button  class="btn btn-primary" onClick="location.href='main.php'" type="submit" name="submit">
                                Exit Profile </button>
                           
					
                              
                            <button  class="btn btn-primary" onClick="location.href='edit.php'" type="submit" name="submit9">
                                Edit Profile </button>
                             
							
						
                           <button class="btn btn-primary"  type="button" onClick="location.href='basket.php'">Basket</button>
                            </ul>
                        </div>
 <?php
	$sqld= "SELECT Personid FROM users WHERE username='$_SESSION[name]' ";
		$result5 = mysqli_query($baglan, $sqld);
	if (mysqli_num_rows($result5) > 0) {
		while($row5 = mysqli_fetch_assoc($result5)) {
			$_SESSION["id"] = $row5[Personid];
		}
	}
	?>
                    

                    </div>
                    </div>
            </div>
        </div>
    </div>
    
</div>

</body>
</html>

