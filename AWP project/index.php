<!DOCTYPE html>

<?php session_start(); 
require_once("composer/vendor/autoload.php");
require_once("dbconfig.php");
ini_set('display_errors','off');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="jquery-3.4.1.min.js"></script>
<script src="resources/js/functions.js"></script>

<style>

body {
	background-image:url(resources/img/paysage.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
}

table {                                         
  	margin-right: 150px;
  	margin-left: 80px;
  	padding:50px 0 0 0;
    width: 465px; 
    border-radius: 5px;
    
}

thead{
	border-radius: 50px;
}

a{
color: black;
}

</style>

</head>
<body onload="hideDiv()">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <i><a class="navbar-brand" href="profile.php" title="Profile"><img src="resources/img/vehicomm.png" class="vehicomm"></a></i>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php">Home</a></li>
      <li class="active"><a href="#">Products</a></li>
      <li><a href="basket1.php">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
         <?php
      if(isset($_SESSION["email"])){
        echo "<li><a href='#' style='color:white; cursor:default'>
        <img src='resources/img/user.png' width='20px'><i> Hello ".$_SESSION["name"]."</i></a></li>";
        echo "<li><a href='logout.php'><img src='resources/img/logout.png' width='20px'> Log Out</a></li>";
      }
      else{
        echo "<li><a href='register.php'> Sign Up</a></li>
        <li><a href='login.php'><img src='resources/img/user.png' width='20px'> Log In</a></li>";
      }
      ?>
      </ul>
  </div>
</nav>

<br><br><br>

<div class="container">
<br>

<div style="height: auto; overflow: hidden;">
<div class="spoiler1" onclick="openclose(this);" title="Click twice the first time" name="div">
  <p id="1" class="btn btn-info cursor"><strong>Browse</strong></p>
<div class="div1 contenuSpoiler" id="div1">
	<form class="form-group" action="" method="POST" enctype="multipart/form-data">
    <strong>Browse to select a file:</strong><br>
    <input type="file" name="uplfile" class="btn btn-primary drop" />
    <input type="submit" name="submit" class="btn btn-success submit" />
</form>
</div>
</div>


<div class="spoiler2" onclick="openclose(this);" title="Click twice the first time" name="div">
  <p id="2" class="btn btn-info cursor"><strong>Search</strong></p>
<div class="div2 contenuSpoiler" id="div2">
	<form class="form-group" action="" method="POST">
    <strong>Enter a code: </strong><br>
    <input type="text" name="code" style="margin-bottom: 20px;" class="drop" /><br>
    <input type="submit" name="submit2" class="btn btn-success submit" />
</form>
</div>
</div>

<div class="spoiler3" onclick="openclose(this);" title="Click twice the first time" name="div">
  <p id="3" class="btn btn-info cursor" onclick="openclose(this);"><strong>Choose</strong></p>
<div class="div3 contenuSpoiler" id="div3">
	<form class="form-group" action="" method="POST">
		<strong>Choose the type of vehicles:</strong>
	<div class="dropdown drop">
    <select class="btn btn-default dropdown-toggle" style="margin-bottom: 3px;" name="line" id="line">
    <option class="caret">--Choose--</option>
    <option class="caret" value="Classic Cars">Classic Cars</option>
    <option class="caret" value="Motorcycles">Motorcycles</option>
    <option class="caret" value="Planes">Planes</option>
    <option class="caret" value="Ships">Ships</option>
    <option class="caret" value="Trains">Trains</option>
    <option class="caret" value="Trucks and Buses">Trucks and Buses</option>
    <option class="caret" value="Vintage Cars">Vintage Cars</option>
  </select>
  </div>
  <input type="submit" name="submit3" id="submit3" class="btn btn-success submit" />
</form>
</div>
</div>


</div>

<?php

if(isset($_POST["submit"])) {
  $uploadOk = 1;

  $target_dir = "uploads/";
  $target_name = $target_dir . date("Y_m_d") . basename($_FILES["uplfile"]["name"]);

  $imageFileType = $_FILES["uplfile"]["type"];
  $fileType = pathinfo($target_name, PATHINFO_EXTENSION);
  
  if ($fileType != "xls" && $fileType != "xlsx" && $fileType != "csv" ) {
      echo "<strong>Only xls, xlsx and csv files are allowed</strong>";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "<strong>Sorry, your file was not uploaded</strong>";
  }
  else {
      if (move_uploaded_file($_FILES["uplfile"]["tmp_name"], $target_name)) {
          echo "<strong>The file has been uploaded</strong><br>";
          
          $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
      $reader->setReadDataOnly(true);
      $spreadsheet = $reader->load($target_name);
      $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
      //var_dump($sheetData);



      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }

}

?>



<table id="tab" class="table table-striped form-group center-block">
 <thead class="thead-light thead"> 
  <tr class="bg-info" id="" style="border-radius: 50px;">
      <th>Code</th>
      <th>Name</th>
      <th>Type</th>
      <th>Scale</th>
      <th>Vendor</th>
      <th>Description</th>
      <th>Stock</th>
      <th>Price</th>
      <th>MSRP</th>
      <th></th>
      <th></th>
    </tr>
 </thead>   
 <tbody>

<?php 

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

if(isset($_POST["submit"])) {
	foreach ($sheetData as $result) {

    $sql = "INSERT INTO `products` VALUES ('".$result['A']."','".$result['B']."','".$result['C']."','".$result['D']."','".$result['E']."','".$result['F']."','".$result['G']."','".$result['H']."','".$result['I']."')";

if ($conn->query($sql) === TRUE) {
    echo "<strong>New record created successfully</strong><br>";
} else {
    echo "<strong>Error: " . $conn->error. "</strong><br>";
    }

if (mysqli_error() == '1062' ) {
    echo 'Data already in the database';
}

	?>
	<tr class="active">
	<td id="code"><?php echo $result['A']; ?></td>
	<td id="prod"><?php echo $result['B']; ?></td>
	<td id="type"><?php echo $result['C']; ?></td>
	<td><?php echo $result['D']; ?></td>
	<td><?php echo $result['E']; ?></td>
	<td><?php echo $result['F']; ?></td>
  <td><?php echo $result['G']; ?></td>
  <td id="price"><?php echo $result['H']; ?></td>
  <td><?php echo $result['I']; ?></td>
  <td></td>
  <td><a href="basket1.php?action=ajout&amp;l=<?php echo $result['A']; ?>&amp;q=1&amp;p=<?php echo $result['H']; ?>" onclick="window.location.href(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;"><input type="button" class="btn btn-primary" value="Add to basket"></a></td>
</tr>
<?php 
}
}

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mywebapp;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}


if (isset($_POST['submit3'])) {

	$req = $bdd->prepare("SELECT * FROM products WHERE productLine = ?");
	$req->execute(array($_POST['line']));
}
if (isset($_POST['submit2'])) {

	$req = $bdd->prepare("SELECT * FROM products WHERE productCode = ?");
	$req->execute(array($_POST['code']));
}

while ($data = $req->fetch())
            {
?>

<tr id="tr" class="active">
	<td id="code" class="trou"><?php echo $data['productCode']; ?></td>
	<td id="prod"><?php echo $data['productName']; ?></td>
	<td id="type"><?php echo $data['productLine']; ?></td>
	<td><?php echo $data['productScale']; ?></td>
	<td><?php echo $data['productVendor']; ?></td>
	<td><?php echo $data['productDescription']; ?></td>
	<td><?php echo $data['quantityInStock']; ?></td>
	<td id="price"><?php echo $data['buyPrice']; ?></td>
	<td><?php echo $data['MSRP']; ?></td>
  <td></td>
  <td>
    <a href="basket1.php?action=ajout&amp;l=<?php echo $data['productCode']; ?>&amp;q=1&amp;p=<?php echo $data['buyPrice']; ?>" onclick="window.location.href(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;"><input type="button" class="btn btn-primary" value="Add to basket"></a></td>
  
</tr>

<?php 
} 
$req->closeCursor(); 
?>
</tbody>
</table>
</div>



<!--<?php foreach ($sheetData as $line) {
                $valuesToInsert = "";
                foreach ($line as $row) {
                        $valuesToInsert .= '"' . $row . '", ';
                }
                //search if the last char is a comma and then remove it
                if (substr($valuesToInsert, -2, 1) == ','){
                  $valuesToInsert = substr($valuesToInsert, 0, -2);
                }

                $sql = "INSERT INTO products VALUES(" . $valuesToInsert . ");";
               // $query = $dbh->prepare($sql);
               // $query->execute();
        }?>-->
</body>

</html>
<?php
      if(isset($_POST['disconnect'])) {
       session_destroy();
       header('profile.php');
}
      ?>
?>