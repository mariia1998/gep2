<?php


$id_etudiant =  $_POST['id_etudiant'];
$id_groupe=  $_POST['id_groupe'];
$carte =  $_POST['carte'];
$seances=  $_POST['seances'];
include '../config.php';
$date = date('Y-m-d H:i');


  $file_db->exec("INSERT INTO inscription (id_groupe,id_etudiant,date,carte,nbr_s ,derniere_s) VALUES
  ('$id_groupe','$id_etudiant','$date','$carte','$seances','') ;");


echo $message;
 ?>
