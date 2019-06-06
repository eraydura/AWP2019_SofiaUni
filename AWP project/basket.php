<?php
session_start();
?>
<?php
$baglan = mysqli_connect("localhost","root","manisa45","ecommercial");
	if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<strong><link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script></strong>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Başlıksız Belge</title>
</head>

<body >
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
      
      <a style="margin-right: 5px" href="http://localhost/profile.php" >
<img src="https://cdn2.iconfinder.com/data/icons/business-management-52/96/Artboard_20-512.png" width="30px">
</a>
	  </form>
  
</nav>
<ul class="container" style="width:100%">

	<?php
	
		if(isset($_POST['use_button']))
{
	$a= $_POST['use_button'];
	$b=$_SESSION["name"];
	$c=$_SESSION["id"];
	$d=1;
	
	$sql = "INSERT INTO basket (id,username, stuff,quantity)
VALUES ('$c','$b','$a','$d')";

if (mysqli_query($baglan, $sql)) {
   header("refresh: 3;");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
	
	$sql = "SELECT DISTINCT stuff, SUM(quantity) AS quantity1, quantity FROM basket WHERE username='$_SESSION[name]' GROUP BY stuff  ";
$result = mysqli_query($baglan, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li name=".$row["stuff"]." > <h1>".$row["quantity"]." X <img width='180' height='180' src=".$row["stuff"]." ></h1> <br> </br> <form action='basket.php' method='post'>  <input style=' width:150px; height:50px; border:3px black solid ' type='number' name='number' value='1' min='1' max='1000' step='1'/> <input style='display: none;' name='a' value=".$row["stuff"]." > </input>  <button class='btn btn-info btn-lg' type='submit' name='insert' value='add'> CHANGE QUANTITY</button> <button class='btn btn-info btn-lg' type='submit' name='delete' value='delete'> DELETE</button>  <br> </br></form> </li>";
		$sqle = "SELECT * FROM stuffs WHERE Picture='$row[stuff]' ";
		$result2 = mysqli_query($baglan, $sqle);
		if (mysqli_num_rows($result2) > 0) {
		while($row2 = mysqli_fetch_assoc($result2)) {
		$result5= $row2["Price"]* $row["quantity1"] +$result5;
		}
		}
		 if(isset($_POST["insert"]))
{
	$n= $_POST["number"];
	$h= $_POST["a"];
	$sqln = "UPDATE basket SET quantity='$n' WHERE stuff='$h' ";

if (mysqli_query($baglan, $sqln)) {
   $page = $_SERVER['PHP_SELF'];
$sec = "1";
header("Refresh: $sec; url=$page");
} else {
    echo "Error adding: " . mysqli_error($baglan);
}
}
				 if(isset($_POST["delete"]))
{
	$g= $_POST["a"];
	$sqlm = "DELETE FROM basket WHERE stuff='$g'";

if (mysqli_query($baglan, $sqlm)) {
   $page = $_SERVER['PHP_SELF'];
$sec = "1";
header("Refresh: $sec; url=$page");
} else {
    echo "Error adding: " . mysqli_error($baglan);
}
}
		if(isset($_POST['ok']))
{
	
	$_SESSION["total1"]=$result5;
	$j= date('Y-m-d');
	$sqlg = "UPDATE basket SET due_date='$j' WHERE username= '$_SESSION[name]' ";

if (mysqli_query($baglan, $sqlg)) {
} else {
    echo "Error adding: " . mysqli_error($baglan);
}

	header("Location: http://localhost/mail.php");
}
    } echo"<p> <span style='font-size:30px'> Total: ".$result5."  Euro</span>  </p> <br> </br>";
	}else {
    echo "0 STUFF";
}
	if(isset($_POST["submit2"]))
{
$sql2 = "DELETE FROM basket WHERE username='$_SESSION[name]' ";


if (mysqli_query($baglan, $sql2)) {
 header("Refresh: 1;");
} else {
}
}

mysqli_close($baglan);
?>
	</ol>
	</form>
   <div class="container" >
   <form action="#"  method="post">
 <div class="btn-group" role="group" aria-label="Basic example">
   <a href="http://localhost/profilemain.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-arrow-left"></span> RETURN SHOPPING
	   </a>
	  
   
     
        <button type="submit" name="ok"  class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok"></span> FINISH SHOPPING
        </button>
		   </form>
		  
	  
	   <button type="submit" name="submit2" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok"></span> DELETE ALL
        </button>
			   </form>
	  </div>
	</div>
	
</div>
</body>
</html>