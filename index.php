<!doctype html>
<html>
<?php
$baglan = mysql_connect("localhost","root","manisa45");
if(!$baglan){
 die('404 ERROR:' . mysql_error()); 
}
$db_select = mysql_select_db("ecommercial");

?>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button style="margin-right: 5px" type="button" onClick="location.href='http://localhost/login.php'" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Sign-in 
</button>
      <button style="margin-right: 5px" onClick="location.href='http://localhost/register.php'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  Log-in
</button>
	  </form>
  
  </div>
</nav>
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