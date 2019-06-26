<?php
session_start();
?>
<?php
$baglan = mysqli_connect("localhost","root","","mywebapp");
	if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>My Basket</title>
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
      <li><a href="main.php">Home</a></li>
      <li><a href="index.php">Products</a></li>
      <li class="active"><a href="#">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
          <?php
      if(isset($_SESSION["email"])){
        echo "<li> <p style='color:white;'><img src='user.png' width='20px'> Hello ".$_SESSION["name"]."</li>";
        echo "<li> <p style='color:white;'><button><a href='logout.php'>Log Out</a></button></li>";
      }
      else{
        echo "<li><a href='register.php'> Sign Up</a></li>
        <li><a href='login.php'><img src='user.png' width='20px'> Login</a></li>";
      }
      ?>
      </ul>
  </div>
</nav>
<br><br><br>
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


if (!$result || mysqli_num_rows($result) > 0) {
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