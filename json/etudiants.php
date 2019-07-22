<?php
 $data = array();
$s = $_GET['search'];
$gr= $_GET['gr'];
include '../config.php';

 $condition = "WHERE etudiant.id <> 0";
 if ($s !== '') {
   $condition = "  AND LIKE '%$s%' OR prenom LIKE '%$s%'";
 }

if ($gr !=='0'){
  $condition .= " AND  inscription.id_groupe ='$gr'";
}
// AND  ins.iud =

$result_one = $file_db->query("SELECT * FROM etudiant LEFT JOIN inscription ON etudiant.id = inscription.id_etudiant    $condition GROUP BY etudiant.id");
foreach($result_one as $row) {
 $data[]  = $row;
}




  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
