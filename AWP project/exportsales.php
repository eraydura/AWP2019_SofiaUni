<?php 
 include 'connectdatabase.php';
// Nom de la table à exporter 
$db_record = 'sales'; 
 
// Nom du fichier CSV à exporter 
$csv_filename = $db_record.'_'.date('Y-m-d').'.csv'; 
 
 

// Création d'un fichier CSV vide 
$csv_export = ''; 
 
// Extraction des données de la table 
$query = mysqli_query($conn, "SELECT * FROM ".$db_record); 
$field = mysqli_field_count($conn); 
 
// Création de la ligne des titres (noms des champs) 
for($i = 0; $i < $field; $i++) { 
    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';'; 
} 
 
// Nouvelle ligne (semble fonctionner avec Linux & Windows servers) 
$csv_export.= ' 
'; 
 
// Boucle des tuples pour remplir le fichier 
while($row = mysqli_fetch_array($query)) { 
    for($i = 0; $i < $field; $i++) { 
        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";'; 
    } 
    $csv_export.= ' 
'; 
} 
 
// Export des données au format CSV et appel du fichier créé pour téléchargement 
header("Content-type: text/x-csv"); 
header("Content-Disposition: attachment; filename=".$csv_filename.""); 
echo($csv_export); 
?>