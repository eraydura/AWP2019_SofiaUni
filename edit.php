<!doctype html>
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
<title>Başlıksız Belge</title>
</head>

<body>

<form action="#" method="post">
<select name="Color">
<option value="Name">Name</option>
<option value="Surname">Surname</option>
<option value="Password">Password</option>
<option value="Email">Email</option>
<!--<option value="Card">Card</option>-->
<option value="Address">Address</option>
<option value="Picture">Picture</option>
<option value="Telephone">Telephone</option>
</select>
<input type="submit" name="submit" value="Get Selected Values" />
</form>
<?php
if(isset($_POST['submit'])){
$selected_val = $_POST['Color']; 
if($selected_val=="Name"){
	echo"<form action='#' method='post'><input name='name' class='form-control' type='text' > </input> <input type='submit' name='submit1' /> </form> ";
}
	if($selected_val=="Surname"){
	echo"<form action='#' method='post'><input class='form-control' type='text' name='surname' > </input> <input type='submit' name='submit2' /> </form> ";
}
	if($selected_val=="Password"){
	echo"<form action='#' method='post'><input pattern='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' class='form-control' type='password' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters'  name='password'> <input type='submit' name='submit3' /> </form> ";
}
	if($selected_val=="Email"){
	echo"<form action='#' method='post'><input class='form-control' pattern='[^@\s]+@[^@\s]+\.[^@\s]+' title='Invalid email address' type='text'  name='email'> <input type='submit' name='submit4' /> </form> ";
}
	if($selected_val=="Address"){
	echo"<form action='#' method='post'><textarea class='form-control' type='text' name='address' > </textarea> <input type='submit' name='submit5' /> </form> ";
}
	/*if($selected_val=="Card"){
	echo"<form action='#' method='post'><input pattern='^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$' class='form-control' title='Must enter valid credit card' type='text' name='card'> <input type='submit' name='submit6' /> </form> ";
}*/
	if($selected_val=="Picture"){
	echo"<form action='#' method='post'><input type='text' class='form-control' name='picture' pattern='(http[^\s]+(jpg|jpeg|png|tiff)\b)' ></span> </p> <input type='submit' name='submit7' /> </form> ";
}
	if($selected_val=="Telephone"){
	echo"<form action='#' method='post'><input class='form-control' type='text' pattern='[0-9]{10}'  title='Ten digits code'  name='telephone'> <input type='submit' name='submit8' /> </form> ";
}
}
	if(isset($_POST['submit1'])){
	$sql = "UPDATE users SET Name='$_POST[name]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
  echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
	}
			if(isset($_POST['submit2'])){
	$sql = "UPDATE users SET Surname='$_POST[surname]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
   echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
			}
					if(isset($_POST['submit3'])){
	$sql = "UPDATE users SET Pasword='$_POST[password]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
  echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
					}
							if(isset($_POST['submit4'])){
	$sql = "UPDATE users SET Email='$_POST[email]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
							}
									if(isset($_POST['submit5'])){
	$sql = "UPDATE users SET Address='$_POST[address]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
									}
											if(isset($_POST['submit6'])){
	$sql = "UPDATE users SET Picture='$_POST[picture]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
 echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
											}
													if(isset($_POST['submit7'])){
	$sql = "UPDATE users SET Telephone='$_POST[telephone]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
    echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');

} else {
    echo "Error updating record: " . $baglan->error;
}
													}
															if(isset($_POST['submit8'])){
	$sql = "UPDATE users SET Card='$_POST[card]' WHERE id='$_SESSION[id]'";

if ($baglan->query($sql) === TRUE) {
  echo "<script> alert('You have to login again!!'); </script>";
	header('Refresh: 7; url=http://localhost/login.php');
} else {
    echo "Error updating record: " . $baglan->error;
}
															}

	
?>
</body>
</html>