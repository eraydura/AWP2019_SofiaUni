﻿<?php
// Start the session
session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebapp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$Password      =    $_POST["Password"];
$EMail        =    $_POST["EMail"];

$sql = "SELECT * FROM users WHERE Password='$Password' AND EMail='$EMail' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
             $_SESSION["name"]= $row["Name"]  ;
			 $_SESSION["email"]= $row["EMail"] ;
			 $_SESSION["surname"]=$row["Surname"];
		      $_SESSION["adress"]=$row["Address"];
		      $_SESSION["telephone"]=$row["Telephone"];
		      //$_SESSION["card"]=$row["Card"];
		      //$_SESSION["picture"]=$row["pic"];
		      //$_SESSION["gender"]=$row["gender"];
    }
   		$pass = (string) $_POST['Password'];
		$mail = (string) $_POST['EMail'];

if(($pass == "Adminadmin35") && ($mail == "admin@admin.com")){
	header("Refresh: 1; url=http://localhost/admin.php");
}
else{
    echo "<strong>Connection in progress....</strong>";
	header("Refresh: 1; url=http://localhost/profile.php"); 
} 
}
else {
    echo "<strong>Unknow Account// Please try again !</strong>";
    header("Refresh: 1; url=http://localhost/login.php");
}

mysqli_close($conn);
?>
