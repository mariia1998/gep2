<?php

$eid =  $_POST['eid'];
$nom =  $_POST['nom'];
$prenom =  $_POST['prenom'];
$niveau =  $_POST['niveau'];
$annee=  $_POST['annee'];
$tel=  $_POST['tel'];
$carte=  $_POST['carte'];
$nombre_seances=  $_POST['nombre_seances'];
$groupe_id=  $_POST['groupe_id'];
$inscr=  $_POST['inscr'];
$montant=  $_POST['montant'];
$date = date('Y-m-d H:i');

include '../config.php';


if ($eid > '0') {
$file_db->exec("UPDATE etudiant SET nom='$nom',prenom='$prenom',annee='$annee',niveau='$niveau' ,tel='$tel' WHERE id='$eid'");
$message = $eid;
} else {
  $file_db->exec("INSERT INTO etudiant (nom,prenom,niveau,annee,tel ) VALUES ('$nom','$prenom','$niveau','$annee','$tel') ;");
 $nouveau_id = $file_db->lastInsertId();
 $message = $nouveau_id;



 if ($inscr == '1') {
  $file_db->exec("INSERT INTO inscription (id_groupe,id_etudiant,date,carte,nbr_s ,derniere_s) VALUES  ('$groupe_id','$nouveau_id','$date','$carte','$nombre_seances','') ;");
    $file_db->exec("UPDATE groupe SET nombre=nombre+1 WHERE id='$groupe_id' ;");
 }



}

echo $message;
 ?>
