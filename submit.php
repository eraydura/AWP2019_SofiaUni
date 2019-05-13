<?php

// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "manisa45";
$dbname = "ecommercial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
 $Name        =    $_POST["Name"];
 $Surname    =    $_POST["Surname"];
 $Telephone       =    $_POST["Telephone"];
 $Card   =    $_POST["Card"];
 $Adress       =    $_POST["Adress"];
$Password      =    $_POST["Password"];
 $EMail   =    $_POST["EMail"];
 $gender   =    $_POST["gender"];
$pic   =    $_POST['pic'];

$sql = "INSERT INTO users (Name, Surname, Telephone,Card, Address,Password, Email,gender,pic)
VALUES ('$Name' , '$Surname','$Telephone','$Card','$Adress','$Password','$EMail','$gender','$pic')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header("Refresh: 3; url=http://localhost/profile.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
  
// Set session variables
$_SESSION["name"] = $_POST["Name"];
$_SESSION["email"] = $_POST["EMail"];
$_SESSION["surname"] = $_POST["Surname"];
$_SESSION["adress"] = $_POST["Adress"];
$_SESSION["telephone"] = $_POST["Telephone"];
$_SESSION["card"] = $_POST["Card"];
$_SESSION["gender"] = $_POST["gender"];
$_SESSION["picture"]=$_POST['pic'];
echo "Session variables are set.";
?>
