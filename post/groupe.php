<?php
include '../config.php';

$eid =  $_POST['eid'];
$nom =  $_POST['nom'];
 $niveau =  $_POST['niveau'];
$prof =  $_POST['prof'];
$nombre_max=  $_POST['nombre_max'];
$special=  $_POST['special'];
$prix_m=  $_POST['prix_m'];
$prix_s=  $_POST['prix_s'];




if ($eid > 0) {
$file_db->exec("UPDATE groupe SET nom='$nom' ,niveau='$niveau',id_prof='$prof',nombre_max='$nombre_max' ,prix_m='$prix_m' ,prix_s='$prix_s' WHERE id='$eid'");
$message = $eid;
} else {
  print 'nouveau';
  $file_db->exec("INSERT INTO groupe (nom,niveau,id_prof,special,prix_s,prix_m,nombre,nombre_max)   VALUES ('$nom' ,'$niveau','$prof','$special','$prix_s','$prix_m','0','$nombre_max') ;")  OR  print_r($file_db->errorInfo());

$nouveau_id = $file_db->lastInsertId();
 $message = $nouveau_id;
}

echo $message;
 ?>
