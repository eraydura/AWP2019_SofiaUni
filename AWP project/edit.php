﻿<!doctype html>
<?php
session_start();

?>
<?php
$baglan = mysqli_connect("localhost","root","","mywebapp");
	if($baglan === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
<html>
<head>
<meta charset="utf-8">
<title>Edit Profile</title>
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  
<style> 
registration {                                         
    margin-left: 70px; 
    font-weight: bold ; 
    float: left; 
    clear: left; 
    width: 100px; 
    text-align: left; 
    margin-right: 10px; 
    font-family:sans-serif,bold, Arial, Helvetica; 
    font-size:14px; 
} 
body {
background-image:url(paysage.jpg);
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
}
   
form {                                         
    margin: 5 auto; 
    width: 465px; 
    border-radius: 10px;
    background-color: rgba(95,95,95,0.4);
    padding:20px;
}

</style>
</head> 

<body>

<form action="#" method="post">
<div class="dropdown drop">
<select name="Color" class="btn btn-default dropdown-toggle">
<option>--Choose--</option>
<option value="Name">Name</option>
<option value="Surname">Surname</option>
<option value="Password">Password</option>
<option value="Email">Email</option>
<!--<option value="Card">Card</option>-->
<option value="Address">Address</option>
<!--<option value="Picture">Picture</option>-->
<option value="Telephone">Telephone</option>
</select>
</div>
<br>
<input type="submit" class="btn btn-info" name="submit" value="Get Selected Values" />
<a href="profile.php" style="float: right"><input type=button class="btn btn-warning" value="Back"></a>
<hr/>  
</form>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['Color']; 
if($selected_val=="Name"){
	echo"<form action='#' method='post'><input name='name' class='form-control' type='text' > </input><br> <input type='submit' class='btn btn-success' name='submit1' /> </form> ";
}
	if($selected_val=="Surname"){
	echo"<form action='#' method='post'><input class='form-control' type='text' name='surname' > </input><br> <input type='submit'  class='btn btn-success'name='submit2' /> </form> ";
}
	if($selected_val=="Password"){
	echo"<form action='#' method='post'><input pattern='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' class='form-control' type='password' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'  name='password'><br> <input type='submit'  class='btn btn-success'name='submit3' /> </form> ";
}
	if($selected_val=="Email"){
	echo"<form action='#' method='post'><input class='form-control' pattern='[^@\s]+@[^@\s]+\.[^@\s]+' title='Invalid email address' type='text'  name='email'><br> <input type='submit'  class='btn btn-success'name='submit4' /> </form> ";
}
	if($selected_val=="Address"){
	echo"<form action='#' method='post'><textarea class='form-control' type='text' name='address' > </textarea><br> <input type='submit'  class='btn btn-success'name='submit5' /> </form> ";
}
	/*if($selected_val=="Card"){
	echo"<form action='#' method='post'><input pattern='^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$' class='form-control' title='Must enter valid credit card' type='text' name='card'> <input type='submit' name='submit6' /> </form> ";
}*/
	/*if($selected_val=="Picture"){
	echo"<form action='#' method='post'><input type='text' class='form-control' name='picture' pattern='(http[^\s]+(jpg|jpeg|png|tiff)\b)' ></span> </p> <input type='submit' name='submit7' /> </form> ";
}*/
	if($selected_val=="Telephone"){
	echo"<form action='#' method='post'><input class='form-control' type='text' pattern='[0-9]{10}'  title='Ten digits code'  name='telephone'><br> <input type='submit'  class='btn btn-success'name='submit8' /> </form> ";
}
}
	if(isset($_POST['submit1'])){
	$sql = "UPDATE users SET Name='$_POST[name]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
  echo "<script> alert(' Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
	}
			if(isset($_POST['submit2'])){
	$sql = "UPDATE users SET Surname='$_POST[surname]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
   echo "<script> alert('Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
			}

										if(isset($_POST['submit4'])){
	$sql = "UPDATE users SET EMail='$_POST[email]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
							}


					if(isset($_POST['submit3'])){
	$sql = "UPDATE users SET Password='$_POST[password]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
  echo "<script> alert('Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
					}

																		if(isset($_POST['submit8'])){
	$sql = "UPDATE users SET Telephone='$_POST[telephone]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');

} else {
    echo "Error updating record: " . $baglan->error;
}
													}


									if(isset($_POST['submit5'])){
	$sql = "UPDATE users SET Address='$_POST[address]' WHERE EMail='$_SESSION[email]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('Changes saved. You have to login again!!'); </script>";
	header('Refresh: 1; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
									}


															

	
?>
</body>
</html>