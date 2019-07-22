<?php

$eid =  $_POST['eid'];
$nom =  $_POST['nom'];
$prenom =  $_POST['prenom'];
$matiere =  $_POST['matiere'];

include '../config.php';


if ($eid > '0') {
$file_db->exec("UPDATE prof SET nom='$nom',prenom='$prenom',matiere='$matiere' WHERE id='$eid'");
$message = $eid;
} else {
  $file_db->exec("INSERT INTO prof (nom,prenom,matiere ) VALUES ('$nom','$prenom','$matiere') ;");
 $nouveau_id = $file_db->lastInsertId();
 $message = $nouveau_id;
}

echo $message;
 ?>
