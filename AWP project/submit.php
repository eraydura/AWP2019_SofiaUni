<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<style> 

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

<form>
	<?php

// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
 $Name        =    $_POST["Name"];
 $Surname    =    $_POST["Surname"];
 $Telephone       =    $_POST["Telephone"];
 //$Card   =    $_POST["Card"];
 $Address       =    $_POST["Address"];
$Password      =    $_POST["Password"];
//$Pass_hash = password_hash($Password, PASSWORD_DEFAULT);
 $EMail   =    $_POST["EMail"];
//$Gender   =    $_POST["gender"];
//$Pic   =    $_POST['pic'];

$sql = "INSERT INTO users (Name, Surname, Telephone, Address, Password, EMail)
VALUES ('$Name' , '$Surname','$Telephone','$Address','$Password','$EMail')";

if ($conn->query($sql) === TRUE) {
    echo "<strong>New record created successfully</strong>";
	header("Refresh: 3; url=http://localhost/profile.php"); 
} else {
    echo "<strong>Error: " . $conn->error. "</strong><br>";
    //header("Refresh: 3; url=http://localhost/register.php");on
    echo "<a href='register.php'><input type='button' class='btn btn-primary' value='Back'></a>";
}

$conn->close();
?>

<?php
  
// Set session variables
$_SESSION["name"] = $_POST["Name"];
$_SESSION["email"] = $_POST["EMail"];
$_SESSION["surname"] = $_POST["Surname"];
$_SESSION["adress"] = $_POST["Address"];
$_SESSION["telephone"] = $_POST["Telephone"];
//$_SESSION["card"] = $_POST["Card"];
//$_SESSION["gender"] = $_POST["gender"];
//$_SESSION["picture"]=$_POST['pic'];
//echo "Session variables are set.";
?>
</form>
</body>
</html>
