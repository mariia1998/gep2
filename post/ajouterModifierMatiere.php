<?php

$eid =  $_POST['eid'];
$nom =  $_POST['nom'];
include '../config.php';


if ($eid > '0') {
$file_db->exec("UPDATE matiere SET nom='$nom' WHERE id='$eid'");
$message = $eid;
} else {
  $file_db->exec("INSERT INTO matiere (nom ) VALUES ('$nom') ;");
 $nouveau_id = $file_db->lastInsertId();
 $message = $nouveau_id;
}

echo $message;
 ?>
