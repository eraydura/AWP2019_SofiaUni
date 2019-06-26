<?php
include 'basket1.php';
 if(isset($_POST['buy'])){
 	echo "<p style=\"color:green;\"><strong> Your purchase has been made. </strong></p>" ;
 }
 else{
 	echo "<p style=\"color:red;\"><strong>Something went wrong, try again. </strong></p>" ;
 }
?>