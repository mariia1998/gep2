<?php

include 'config.php';
$data = array();


 // nombre des etudiants
$result_one = $file_db->query("SELECT * from prof LEFT OUTER JOIN groupe on prof.id = groupe.id_prof ");
foreach($result_one as $row) {
 $data[]  = $row;
}



$json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );

 ?>
