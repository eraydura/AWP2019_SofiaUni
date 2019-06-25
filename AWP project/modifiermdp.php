<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<?php

if (isset($_POST['id'])) {
	$id = $_POST["id"];
	$mdp = $_POST["mdp"];
}
else{
	echo "Erreur de modification";
}

include 'connectdatabase.php';
$sql ='UPDATE users SET password = "'.$mdp.'" WHERE id= "'.$id.'"';
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?>
<p>the password of the person with the id number <strong> <?php echo $id ?> </strong> has just been changed to <strong><?php echo $mdp ?></strong></p> </br>
<button><a href="admin.php"> Go back to admin</a> </button>
</html>