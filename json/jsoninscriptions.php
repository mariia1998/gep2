<?php
 $data = array();
$etudiants = array();
$groupe=array();
include '../config.php';



$result_one = $file_db->query("SELECT * FROM etudiant");
foreach($result_one as $row) {
$etudiants[$row['id']] = $row['nom'].' '.$row['prenom'];
}


$result_one = $file_db->query("SELECT * FROM groupe");
foreach($result_one as $row) {
$groupes[$row['id']] = $row['nom'];
}


$result_one = $file_db->query("SELECT * FROM inscription");
foreach($result_one as $row) {
$id_etudiant = $row['id_etudiant'];
$infos_etudiant = $etudiants[$id_etudiant];
$row['infosEtudiant'] = $infos_etudiant;
$row['infosGroupe']=$groupes[$row['id_groupe']];
 $data[]  = $row;
}




  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
