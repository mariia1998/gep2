<?php

$id =  $_POST['id'];

include '../config.php';


$file_db->exec("DELETE FROM inscription WHERE id_groupe='$id'");
$file_db->exec("DELETE FROM groupe WHERE id='$id'");

print_r($_POST);

 ?>
