<?php
 $data = array();

include '../config.php';
$date = date('Ymd');

//liste des ETUDIANTS
$result_one = $file_db->query("SELECT * FROM etudiant ");
foreach($result_one as $row) {
 $data['listeDesEtudiants'][]  = $row;
}


 // nombre des etudiants
$result_one = $file_db->query("SELECT COUNT(id) AS NOMBRE FROM etudiant ");
foreach($result_one as $row) {
 $data['nombreDesEturiants']  = $row['NOMBRE'];
}
//nbres profs
$result_one = $file_db->query("SELECT COUNT(id) AS NOMBRE FROM prof");
foreach($result_one as $row) {
 $data['nombreDesProfs']  = $row['NOMBRE'];
}

//nombreDesGroupes
$result_one = $file_db->query("SELECT COUNT(id) AS NOMBRE FROM groupe");
foreach($result_one as $row) {
 $data['nombreDesGroupes']  = $row['NOMBRE'];
}
//nombreDesSéances
$result_one = $file_db->query("SELECT COUNT (DISTINCT id_seance) AS NOMBRE FROM seance WHERE id_seance LIKE '$date%'");
foreach($result_one as $row) {
 $data['nombreDesSeances']  = $row['NOMBRE'];
}
//nombreDesSéances
$data['seances'] = array();
$result_one = $file_db->query("SELECT DISTINCT id_seance,*  FROM seance WHERE id_seance LIKE '$date%' GROUP BY id_seance");
foreach($result_one as $row) {
 $data['seances'][]  = $row;
}

  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
