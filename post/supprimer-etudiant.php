<?php

$id =  $_POST['id'];

include '../config.php';


$file_db->exec("DELETE FROM inscription WHERE id_etudiant='$id'");
$file_db->exec("DELETE FROM etudiant WHERE id='$id'");

print_r($_POST);

 ?>
