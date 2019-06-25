<?php 
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['productCode'] = array();
      $_SESSION['panier']['quantityProduct'] = array();
      $_SESSION['panier']['buyPrice'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}

function ajouterArticle($productCode,$quantityProduct,$buyPrice){

   //If the basket exist
   if (creationPanier() && !isVerrouille())
   {
      //If product already exist ==> only add quantity
      $positionProduit = array_search($productCode,  $_SESSION['panier']['productCode']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['quantityProduct'][$positionProduit] += $quantityProduct ;
      }
      else
      {
         //Else ==> add product
         array_push( $_SESSION['panier']['productCode'],$productCode);
         array_push( $_SESSION['panier']['quantityProduct'],$quantityProduct);
         array_push( $_SESSION['panier']['buyPrice'],$buyPrice);
      }
   }
   else
   {
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	}
}





function supprimerArticle($productCode){
   //If the basket exist
   if (creationPanier() && !isVerrouille())
   {
      //==> Temporary basket
      $tmp=array();
      $tmp['productCode'] = array();
      $tmp['quantityProduct'] = array();
      $tmp['buyPrice'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];

      for($i = 0; $i < count($_SESSION['panier']['productCode']); $i++)
      {
         if ($_SESSION['panier']['productCode'][$i] !== $productCode)
         {
            array_push( $tmp['productCode'],$_SESSION['panier']['productCode'][$i]);
            array_push( $tmp['quantityProduct'],$_SESSION['panier']['quantityProduct'][$i]);
            array_push( $tmp['buyPrice'],$_SESSION['panier']['buyPrice'][$i]);
         }

      }
      //Replace session basket by temporary updated basket 
      $_SESSION['panier'] =  $tmp;
      //Delete temporary basket
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


function modifierQTeArticle($productCode,$quantityProduct){
   //If the basket exist
   if (creationPanier() && !isVerrouille())
   {
      //If the quantity is positive, the article is modified or deleted.
      //
      if ($quantityProduct > 0)
      {
         //Searching for the product in the shopping cart
         $positionProduit = array_search($productCode,  $_SESSION['panier']['productCode']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['quantityProduct'][$positionProduit] = $quantityProduct ;
         }
      }
      else
      supprimerArticle($productCode);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['productCode']); $i++)
   {
      $total += $_SESSION['panier']['quantityProduct'][$i] * $_SESSION['panier']['buyPrice'][$i];
   }
   return $total;
}

function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}

function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['productCode']);
   else
   return 0;

}
?>