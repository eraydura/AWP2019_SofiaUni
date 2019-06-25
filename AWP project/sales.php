<?php
include 'basket1.php';
 if(isset($_POST['buy'])){
 	echo "<p style=\"color:green;\"> Your purchase has been made. </p>" ;
 }
 else{
 	echo "<p style=\"color:red;\">Something went wrong, try again. </p>" ;
 }
?>