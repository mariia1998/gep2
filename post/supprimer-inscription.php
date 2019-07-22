<?php

$id =  $_POST['id'];
$date = date('Y-m-d');


include '../config.php';

$result_one = $file_db->query("DELETE FROM paiement WHERE  date LIKE '$date%' AND id_inscription ='$id'");



$file_db->exec("DELETE FROM inscription WHERE id='$id'");



print_r($_POST);

 ?>
