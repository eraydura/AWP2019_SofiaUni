<!doctype html>
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
<div class="container">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="well well-sm">
                <div class="row">
                    <div onClick="location.href='http://localhost/picture.php'" class="col-sm-6 col-md-4">
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
                             <form method="post">
                            <button  class="btn btn-primary"  type="submit" name="submit">
                                Exit Profile </button>
                           
							
							</form>
                               <form method="post">
                               
                            <button  class="btn btn-primary"  type="submit" name="submit9">
                                Edit Profile </button>
                           
							
							</form>
                            </ul>
                        </div>
                     <?php
if(isset($_POST["submit"]))
{
session_destroy();
header('Location: http://localhost/index.php');

}
?>
                                       <?php
if(isset($_POST["submit9"]))
{
header('Location: http://localhost/edit.php');	

}
?>

                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<div>
<ol type="1" class="container" style="width:100%">

	<?php
	$sqld= "SELECT Personid FROM users WHERE Name='$_SESSION[name]' ";
		$result5 = mysqli_query($baglan, $sqld);
	if (mysqli_num_rows($result5) > 0) {
		while($row5 = mysqli_fetch_assoc($result5)) {
			$_SESSION["id"] = $row5[Personid];
		}
	}
		if(isset($_POST['use_button']))
{
	$a= $_POST['use_button'];
	$b=$_SESSION["name"];
	$c=$_SESSION["id"];
	$sql = "INSERT INTO basket (id,username, stuff)
VALUES ('$c','$a','$b')";

if (mysqli_query($baglan, $sql)) {
  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
	
	$sql = "SELECT * FROM basket WHERE stuff='$_SESSION[name]'";
$result = mysqli_query($baglan, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li name=".$row["username"]." ><img width='80' height='80' src=".$row["username"]." > <br> </br> </li> ";
		$sqle = "SELECT * FROM stuffs WHERE Picture='$row[username]' ";
		$result2 = mysqli_query($baglan, $sqle);
		if (mysqli_num_rows($result2) > 0) {
		while($row2 = mysqli_fetch_assoc($result2)) {
        echo "<p> <span> ".$row2["Price"]." </span>  Euro </p>";
		$result5= $row2["Price"]+$result5;
		echo"<p> <span> Total: ".$result5." </span>  Euro </p>";}
		}
		if(isset($_POST['ok']))
{
	$_SESSION["total1"]=$result5;
	header("Location: http://localhost/okshop.php");
}
    }
} else {
    echo "0 STUFF";
}
	if(isset($_POST["submit2"]))
{
$sql2 = "DELETE FROM basket WHERE stuff='$_SESSION[name]' ";


if (mysqli_query($baglan, $sql2)) {
	
} else {
}
}

mysqli_close($baglan);
	

?>
	</ol>
	</form>
   <div class="container">
   <a href="http://localhost/Untitled-5.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-arrow-left"></span> Return
        </a>
   <form action="#"  method="post">
        <button type="submit" name="ok"  class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Ok 
        </button>
	   </form>
	   <form action="#" method="post">
	   <button type="submit" name="submit2" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-ok"></span> Reset
        </button>
        </form>
	</div>
	
</div>

</body>
</html>

