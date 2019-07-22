<?php





$iid =  $_POST['iid'];
$e_id =  $_POST['e_id'];
$groupe_id=  $_POST['groupe_id'];
$nombre_seances =  $_POST['nombre_seances'];
$carte =  $_POST['carte'];
$montant=  $_POST['montant'];
include '../config.php';
$date = date('Y-m-d H:i');
$date2 = date('Ymd');
$idseance = $date2.'-'.$groupe_id;

if ($iid == '0') {
  $file_db->exec("INSERT INTO inscription (id_groupe,id_etudiant,date,carte,nbr_s ,derniere_s) VALUES  ('$groupe_id','$e_id','$date','$carte','$nombre_seances','') ;");
  $file_db->exec("UPDATE groupe SET nombre=nombre+1 WHERE id='$groupe_id' ;");

$nouveau_id = $file_db->lastInsertId();
$file_db->exec("INSERT INTO paiement (id_groupe,id_etudiant,id_inscription,montant,nbr_seances,type,date,date2)VALUES  ('$groupe_id','$e_id','$nouveau_id','$montant','$nombre_seances','I','$date','$date2') ;");
} else {
// $nouveau_id = $iid;


$file_db->exec("INSERT INTO paiement (id_groupe,id_etudiant,id_inscription,montant,nbr_seances,type,date,date2) VALUES  ('$groupe_id','$e_id','$iid','$montant','$nombre_seances','R','$date','$date2') ;");
$file_db->exec("UPDATE inscription SET nbr_s =nbr_s+$nombre_seances WHERE id='$iid' ;");

$result_one = $file_db->query("SELECT * FROM seance WHERE id_seance='$idseance' AND id_etudiant='$e_id' and bloque='1'");
foreach($result_one as $row) {
$file_db->exec("UPDATE inscription SET nbr_s =nbr_s-1 WHERE id='$iid' ;");
}



}





echo $nouveau_id;
 ?>
