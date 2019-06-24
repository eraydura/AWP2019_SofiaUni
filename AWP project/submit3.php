<?php
/*try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mywebapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}*/
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
 
$Code = $_POST["code"];
$Name = $_POST["name"];
$Line = $_POST["line"];
$Price = $_POST["price"];


$sql = "INSERT INTO basket (code, productname, type, totalprice)
VALUES ('$Code', '$Name', '$Line', '$Price')";

/*$query = $bdd->prepare($sql);
print($sql);
$query->execute();*/

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  	echo "Do you want to continue or go to your basket ?";
  	echo"<a href='index.php'><input type='button' value='Continue'></a>";
  	echo"<a href='basket.php'><input type='button' value='Basket'>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Refresh: 3; url=http://localhost/index.php"); 
}

$conn->close();

echo $_POST["code"];
echo $_POST["name"];
echo $_POST["line"];
echo $_POST["price"];

//$sql->closeCursor();
  
$_SESSION["code"] = $_POST["code"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["line"] = $_POST["line"];
$_SESSION["price"] = $_POST["price"];

?>
