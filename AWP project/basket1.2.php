<?php
session_start();
include_once("fonctionsphp.php");
/*$ll = array();
$qq = array();
$pp = array();
$pos = 0;*/


echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="sales.php">
<table style="width: 400px">
  <tr>
    <td colspan="4">Votre panier</td>
  </tr>
  <tr>
    <td>Libellé</td>
    <td>Quantité</td>
    <td>Prix Unitaire</td>
    <td>Action</td>
  </tr>


  <?php
  if (creationPanier())
  {
    $nbArticles=count($_SESSION['panier']['productCode']);
    if ($nbArticles <= 0)
    echo "<tr><td>Votre panier est vide </ td></tr>";
    else
    {
      for ($i=0 ;$i < $nbArticles ; $i++)
      {
        echo "<tr>";
        echo "<td>".htmlspecialchars($_SESSION['panier']['productCode'][$i])."</ td>";
        echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantityProduct'][$i])."\"/></td>";
        echo "<td>".htmlspecialchars($_SESSION['panier']['buyPrice'][$i])."</td>";
        echo "<td><a href=\"".htmlspecialchars("basket1.php?action=suppression&l=".rawurlencode($_SESSION['panier']['productCode'][$i]))."\">Delete</a></td>";
        echo "</tr>";
      }

      echo "<tr><td colspan=\"2\"> </td>";
      echo "<td colspan=\"2\">";
      echo "Total : ".MontantGlobal();
      echo "</td></tr>";

      echo "<tr><td colspan=\"4\">";
      echo "<input type=\"hidden\" value=\"Rafraichir\"/>";
      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

      echo "</td>";
    }

     echo "<td><input type=\"submit\" value=\"Buy it\" name=\"buy\"></td>";
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
   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
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
         /*$ll[$pos] = $l;
         $qq[$pos] = $q;
         $pp[$pos] = $p;*/
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

</table>
</form>


<button><a href="index.php"> Return shopping </a></button>
</body>
</html>