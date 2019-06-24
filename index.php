<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />

<style>

body {
	background-image:url(paysage.jpg);
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

.submit {
	border-radius: 5px;
}

.div1{
	float: right;
	margin-right: 50px
}

.div2{
	margin-left: 50px;
}

.div3{
	margin-left: 50px
}

.drop{
	margin-bottom: 5px;
}

a{
color: black;

}

.vehicomm {
  width: 115px;
}

</style>

<script type="text/javascript">
	
jQuery(document).ready(function() {
   jQuery('#line').on('change', function() {
     jQuery('#submit3').click();

   });
});


</script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <i><a class="navbar-brand" href="profile.php" title="Profile"><img src="vehicomm.png" class="vehicomm"></a></i>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php">Home</a></li>
      <li class="active"><a href="#">Products</a></li>
      <li><a href="basket.php">My Basket</a></li>
      <li><a href="#">About</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class=""></span> Sign Up</a></li>
        <li><a href="login.php"><img src="user.png" width="20px"> Login</a></li>
      </ul>
  </div>
</nav>

<br><br><br>

<div class="container">
  <ul class="nav nav-tabs">
    <!--<li class="active"><a data-toggle="tab" href="#home">Home</a></li>-->
    <li><a data-toggle="tab" href="#div1"><strong>Browse</strong></a></li>
    <li><a data-toggle="tab" href="#div2"><strong>Search</strong></a></li>
    <li><a data-toggle="tab" href="#div3"><strong>Choose</strong></a></li>
  </ul>
<br>

<?php
require_once("composer/vendor/autoload.php");
require_once("dbconfig.php");

if(isset($_POST["submit"])) {
	$uploadOk = 1;

	$target_dir = "uploads/";
	$target_name = $target_dir . date("Y_m_d") . basename($_FILES["uplfile"]["name"]);

	$imageFileType = $_FILES["uplfile"]["type"];
	$fileType = pathinfo($target_name, PATHINFO_EXTENSION);
	
	if ($fileType != "xls" && $fileType != "xlsx" ) {
	    echo "Only xls & xlsx files are allowed.";
	    $uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	}
	else {
	    if (move_uploaded_file($_FILES["uplfile"]["tmp_name"], $target_name)) {
	        echo "The file has been uploaded.";
	        
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

<div class="tab-content">
<div class="div1 tab-pane" id="div1">
	<!--<form class="form-group" action="" method="POST" enctype="multipart/form-data">
    <strong>Browse to select a file:</strong><br>
    <input type="file" name="uplfile" class="btn-primary drop" />
    <input type="submit" name="submit" class="btn-success submit" />
</form>--> <p> sdkqdjjljlj</p>
</div>

<div class="div2 tab-pane fade" id="div2">
	<form class="form-group" action="" method="POST">
    <strong>Enter a code: </strong><br>
    <input type="text" name="code" class="drop" /><br>
    <input type="submit" name="submit2" class="btn-success submit" />
</form>
</div>

<div class="div3 tab-pane fade" id="div3">
	<form class="form-group" action="" method="POST">
		<strong>Choose the type of vehicles:</strong>
	<div class="dropdown drop">
    <select class="btn btn-default dropdown-toggle" name="line" id="line">
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
  <input type="submit" name="submit3" id="submit3" class="btn-success submit" />
</form>
</div>
</div>

<table class="table table-striped form-group center-block">
 <thead class="thead-light thead"> 
  <tr class="bg-info" style="border-radius: 50px;">
      <th>Code</th>
      <th>Name</th>
      <th>Type</th>
      <th>Scale</th>
      <th>Vendor</th>
      <th>Description</th>
      <th>Stock</th>
      <th>Price</th>
      <th>MSRP</th>
    </tr>
 </thead>   
 <tbody>
<?php if(isset($_POST["submit"])) {
	foreach ($sheetData as $result) {
	?>
	<tr class="active">
	<td><?php echo $result['A']; ?></td>
	<td><?php echo $result['B']; ?></td>
	<td><?php echo $result['C']; ?></td>
	<td><?php echo $result['D']; ?></td>
	<td><?php echo $result['E']; ?></td>
	<td><?php echo $result['F']; ?></td>
</tr>
<?php 

$sql = "INSERT INTO `products` VALUES (".$result['A'].",".$result['B'].",".$result['C'].",".$result['D'].",".$result['E'].",".$result['F'].",".$result['G'].",".$result['H'].",".$result['I'].")";
$query = $conn->prepare($sql);
print($sql);
$query->execute();
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

<tr class="active">
	<td><?php echo $data['productCode']; ?></td>
	<td><?php echo $data['productName']; ?></td>
	<td><?php echo $data['productLine']; ?></td>
	<td><?php echo $data['productScale']; ?></td>
	<td><?php echo $data['productVendor']; ?></td>
	<td><?php echo $data['productDescription']; ?></td>
	<td><?php echo $data['quantityInStock']; ?></td>
	<td><?php echo $data['buyPrice']; ?></td>
	<td><?php echo $data['MSRP']; ?></td>
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