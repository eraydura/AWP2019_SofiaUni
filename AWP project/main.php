<!doctype html>
<html>
<?php
session_start();

$baglan = mysqli_connect("localhost","root","","mywebapp");
  if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}?>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="https://code.jquery.com/jquery-3.3.1.sli
m.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Home</title>
<style>

body {
  background-image:url(paysage.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}

.vehicomm {
  width: 115px;
}

</style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <i><a class="navbar-brand" href="profile.php" title="Profile"><img src="vehicomm.png" class="vehicomm"></a></i>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="index.php">Products</a></li>
      <li><a href="basket.php">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class=""></span> Sign Up</a></li>
        <li><a href="login.php"><img src="user.png" width="20px"> Login</a></li>
      </ul>
  </div>
</nav>
<br><br><br>

<div class="container" style="margin-top: 50px; margin-bottom: 50px ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://payfastcoza-bef7.kxcdn.com/wp-content/uploads/Black-Friday-blog.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://idapgroup.com/blog/blog/wp-content/uploads/2018/12/tild3633-3336-4233-b761-353238323066__6638__ecommercemain.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://voicemaster.co.in/wp-content/uploads/2014/11/ecommerce.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="container">
  <table style="width:100%">
    <?php
	 $verileri_al=mysql_query("Select* from stuffs");
	while($dizi= mysql_fetch_array($verileri_al)){
		echo"<tr>
	
    <td><h1>".$dizi["Name"]."</h1></td>
    <td><h3>".$dizi["Price"]." Euro</h3></td>
	<td><img width='300px' height='250px' src=".$dizi["Picture"]."></td>
    <td> <button onclick='myFunction()'><img width='50px' height='50px' src='https://purepng.com/public/uploads/large/purepng.com-shopping-basketshoppingcarttrolleycarriagebuggysupermarketsbasket-1421526532727qjew3.png'  ></button></td>
	
  </tr>";

	}
	
	?>
	<script>
function myFunction() {
  alert("Firstly you have to login in !");
}
</script>
</table>
 
</div>
<script>
	
</script>
</body>
</html>