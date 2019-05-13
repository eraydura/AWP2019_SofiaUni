<!doctype html>
<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
<?php
	
echo "Total price is" . $_SESSION["total1"] . ".<br>";
?>
	<button onClick="window.location.href='http://localhost/profile.php'"> Return Shopping</button>
</body>
</html>