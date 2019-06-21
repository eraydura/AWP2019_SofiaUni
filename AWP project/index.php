<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
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
  	padding:50px;
    width: 465px; 
    border-radius: 50px;
    
}

</style>
</head>
<body>

<h1 class="text-center"><i> List of products </i></h1>
<div class="form-group"><hr/></div>  

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

<form action="" method="POST" enctype="multipart/form-data">
    Browse to select a file:<br>
    <input type="file" name="uplfile" class="btn-primary" />
    <input type="submit" name="submit" class="btn-primary" />
</form>


<br><br>
<table class="table table-striped form-group center-block">
 <thead class="thead-light"> 
  <tr class="bg-info" style="border-radius: 50px;">
      <th>Code</th>
      <th>Name</th>
      <th>Type</th>
      <th>???</th>
      <th>Materials</th>
      <th>Short description</th>
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
//print($sql);
//$query->execute();
}
}


?>
</table>
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