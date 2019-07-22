<?php
 $data = array();
$s = $_GET['search'];
include '../config.php';

 $condition = "";
 if ($s !== '') {
   $condition = " WHERE nom LIKE '%$s%' OR id='$s'";
 }
$result_one = $file_db->query("SELECT * FROM groupe $condition");
foreach($result_one as $row) {
  $row['niveauText'] = $niveaux[$row['niveau']];
 $data[]  = $row;
}




  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
