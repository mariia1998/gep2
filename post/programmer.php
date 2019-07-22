<?php

$gid =  $_POST['gid'];

include '../config.php';

$date = date('Ymd');
$idSeance =$date.'-'.$gid;




if (isset($_POST['action']) && $_POST['action'] == '0') {

$result_one = $file_db->query("SELECT  * from seance WHERE id_seance='$idSeance'");
foreach($result_one as $row) {
  $idinscr = $row['id_inscription'];
  $sql = "UPDATE inscription SET nbr_s=nbr_s+1 WHERE id='$idinscr' ;";
 if ($row['bloque'] == '0')  $file_db->exec($sql);
}

// print 'a=0';
print $idSeance;
$file_db->exec("DELETE FROM seance WHERE id_seance LIKE '$idSeance'")  OR  print_r($file_db->errorInfo());

die();

}







$result_one = $file_db->query("SELECT  * from seance WHERE id_seance='$idSeance'");
foreach($result_one as $row) {
  print_r($row);
 die('trouvé');
}





  $file_db->beginTransaction();
$result_one = $file_db->query("SELECT  * from inscription WHERE id_groupe='$gid'");
foreach($result_one as $row) {
  $bloque = '0';
$idetudiant = $row['id_etudiant'];
$ns = $row['nbr_s'];

$idinscription = $row['id'];
if ($ns <= '0')  $bloque = '1';
  $file_db->exec("INSERT INTO seance (bloque, id_etudiant,id_inscription,date,id_groupe,id_seance)  VALUES ('$bloque','$idetudiant',$idinscription,'',$gid,'$idSeance') ;") OR print_r($file_db->errorInfo());

}

$file_db->exec("UPDATE inscription SET nbr_s =nbr_s-1 WHERE id_groupe='$gid' AND nbr_s >0 " );

  $file_db->commit();


 ?>
