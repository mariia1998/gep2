<?php
 $data = array();
$s = $_GET['search'];
include '../config.php';

 $condition = "";
 if ($s !== '') {
   $condition = " WHERE nom LIKE '%$s%' ";
 }
$result_one = $file_db->query("SELECT * FROM matiere $condition");
foreach($result_one as $row) {
 $data[]  = $row;
}




  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
