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

<div class="container">
<form method="post" action="basket1.php">
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
      echo "Total : ".MontantGlobal();
      echo "</td></tr>";

      /*echo "<tr><td colspan=\"4\">";
      echo "<input type=\"submit\" value=\"Rafraichir\"/>";
      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";*/

      echo "</td></tr>";
    }
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
<a href="index.php"><input type="button" class="btn btn-warning" value="Return shopping"></a>
</form>
</div>
</body>
</html>