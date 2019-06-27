<?php
session_start();
include_once("fonctionsphp.php");


echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>My Basket</title>
<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" />
<script src="resources/js/functions.js"></script>
<style type="text/css">


  body {
  /*background-image:url(paysage.jpg);*/
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
table {                                         
    margin-right: 150px;
    margin-left: 80px;
    width: 465px; 
    border-radius: 5px;
    
}
form {                                         
    margin: 5 auto; 
    width: 465px; 
    border-radius: 10px;
    /*background-color: rgba(95,95,95,0.4);*/
    padding:20px;
}
</style>
</head>
<body>

<?php if(isset($_SESSION['name'])){ 
  ?>

<div class="container">
<form method="post" action="sales.php">
  <h1 class ="form-group" style="padding-left: 50px;">
    <i> My Basket </i></h1>  
<div class="form-group"><hr/></div>  
<table id="tab" class="table table-striped form-group center-block" >
 <thead class="thead-light thead"> 
  <tr class="bg-info" style="border-radius: 50px;">
      <th>Code</th>
      <th>Quantity</th>
      <th>Unit Price</th>
      <th></th>
    </tr>
 </thead>   
 <tbody>


  <?php
  if (creationPanier())
  {
    $nbArticles=count($_SESSION['panier']['productCode']);
    if ($nbArticles <= 0)
    echo "<tr><td>Your basket is empty </ td></tr>";
    else
    {
      for ($i=0 ;$i < $nbArticles ; $i++)
      {
        echo "<tr>";
        echo "<td>".htmlspecialchars($_SESSION['panier']['productCode'][$i])."</ td>";
        echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantityProduct'][$i])."\"/></td>";
        echo "<td>".htmlspecialchars($_SESSION['panier']['buyPrice'][$i])."</td>";
        echo "<td><a href=\"".htmlspecialchars("basket1.php?action=suppression&l=".rawurlencode($_SESSION['panier']['productCode'][$i]))."\"><input type='button' class='btn btn-danger' value='Delete'></a></td>";
        echo "</tr>";
      }

      echo "<tr><td colspan=\"2\"> </td>";
      echo "<td colspan=\"2\">";
      echo "<strong>Total : ".MontantGlobal()."</strong>";
      echo "</td>";

      /*echo "<tr><td colspan=\"4\">";
      echo "<input type=\"hidden\" value=\"Rafraichir\"/>";
      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

      echo "</td>";*/
    }

     echo "<tr style='background-color: white; border: none;'><td><input type=\"submit\" value=\"Buy it\" name=\"buy\" class='btn btn-success'></td>";
     echo "<td></td><td></td><td><a href='index.php'><input type='button' style='float:right;' class='btn btn-warning' value='Back Shopping'></a></td>";

     if(isset($_POST['buy'])){
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

    for ($j=0 ;$j < $nbArticles ; $j++){
      $sql = "INSERT INTO sales (ProductCode, QuantityProduct, TotalPrice)
              VALUES ('".$_SESSION['panier']['productCode'][$j]."', '".$_SESSION['panier']['quantityProduct'][$j]."','".$_SESSION['panier']['buyPrice'][$j]."')";
              $result = mysqli_query($conn, $sql);
    }

    for ($k=0 ;$k < $nbArticles ; $k++){
      $sql = "UPDATE products Set quantityInStock=quantityInStock-1 where productCode='".$_SESSION['panier']['productCode'][$k]."'";
      $result = mysqli_query($conn, $sql);
    }
  }
  echo "</tr>";
}


   



$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;
   
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   
   $l = preg_replace('#\v#', '',$l);
   
   $p = floatval($p);

   
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}


if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         header( "Location: basket1.php" );
          break;

      Case "suppression":
         supprimerArticle($l);
         header( "Location: basket1.php" );
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['productCode'][$i],round($QteArticle[$i]));
         }
         //header( "Location: basket1.php" );
         break;

      Default:
         break;
   }
}

  ?>
</tbody>
</table>
</form>
</div>

<?php
 } else {
  echo "<br><strong class='bg-danger'>You don't have the rights ! Please register or log in</strong><br>";
  echo "<a href='login.php'><input type='button' class='btn-danger' value='Back'></a>";
}
 ?>
</body>
</html>