<?php
 $data = array();

include '../config.php';
$carte = $_GET['carte'];
$carte = intval($carte);
$aujourdhui = date('Y-m-d H:i');


$ide = 0;

$data['recherche'] = $_GET['carte'];
$result_one = $file_db->query("SELECT * FROM inscription WHERE carte LIKE '$carte'");
foreach($result_one as $row) {
  $idInscription = $row['id'];
  $data['id_inscription'] = $idInscription;
  $ide = $row['id_etudiant'];
  $idgroupe = $row['id_groupe'];
  $nbr_s = $row['nbr_s'];
}



if ($ide !== '0') {
   $data['status']  = '1';

  $result_one = $file_db->query("SELECT * FROM etudiant WHERE id='$ide'");
  foreach($result_one as $row) {
     $data['etudiant'] = $row;
  }


  $idseance = date('Ymd').'-'.$idgroupe;
$data['bloque'] = false;
$data['nbr_s'] = $nbr_s;


  $result_one = $file_db->query("SELECT * FROM seance WHERE id_seance='$idseance' AND id_etudiant='$ide'");
  foreach($result_one as $row) {
    if($row['bloque'] == '1') $data['bloque'] = true;
  }


$file_db->exec("UPDATE seance SET date='$aujourdhui' WHERE id_seance='$idseance' AND id_etudiant='$ide' ");
$file_db->exec("UPDATE inscription SET derniere_s='$aujourdhui' WHERE id ='$idInscription' ");


$result_one = $file_db->query("SELECT * FROM seance WHERE id_inscription='$idInscription' ");
foreach($result_one as $row) {
  $row['absent'] = ($row['date'] == '');
  $data['details'][] = $row;
}




} else {

 $data['status']  = '0';


}



  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
