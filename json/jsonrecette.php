<?php
 $data = array();
$d1= str_replace('-','',$_GET['d1']);
$d2= str_replace('-','',$_GET['d2']);
$idp=  $_GET['idp'];


include '../config.php';
$condition = ($idp == '0'? "":" AND g.id_prof = '$idp'");



// 2019-07-13
$result_one = $file_db->query("SELECT * FROM paiement  p,etudiant  e,groupe  g   WHERE p.id_groupe=g.id AND p.id_etudiant= e.id  AND (p.date2 BETWEEN $d1 and  $d2)  $condition");
foreach($result_one as $row) {

 $data[]  = $row;
}




  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
