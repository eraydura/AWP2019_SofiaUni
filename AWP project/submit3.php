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
$Name = $_POST["prod"];
$Line = $_POST["line"];
$Price = $_POST["price"];
$datetime = date("Y.m.d");
$Sessname = $_SESSION["name"];
$Sessemail = $_SESSION["email"];


$sql = "INSERT INTO basket (code, username, user_email, productname, type, date, totalprice)
VALUES ('$Code', '$Sessname', '$Sessemail', '$Name', '$Line', '$datetime', '$Price')";

/*$query = $bdd->prepare($sql);
print($sql);
$query->execute();*/

if ($conn->query($sql) === TRUE) {
    echo "<strong>New record created successfully</strong>
    <br>
  	<strong>Do you want to continue or go to your basket ?</strong>
  	<br><br>
  	<a href='index.php'><input type='button' class='btn btn-primary' value='Continue'></a>
  	<a href='basket.php'><input type='button' class='btn btn-primary' value='Basket'>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Refresh: 3; url=http://localhost/index.php"); 
}

$conn->close();

/*echo $_POST["code"];
echo $_POST["name"];
echo $_POST["line"];
echo $_POST["price"];*/

//$sql->closeCursor();
  
/*$_SESSION["code"] = $_POST["code"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["line"] = $_POST["line"];
$_SESSION["price"] = $_POST["price"];*/

?>
</form>
</body>
</html>
