<?php

if (!isset($_COOKIE['utilisateur'])) {
  include 'connexion.php';
  die();
}

if (isset($_GET['deconnexion'])) {

   setcookie("utilisateur", null, time()- 120,"/", "", 0);
}

$utilisateur = $_COOKIE['utilisateur'];


$dbname =   __DIR__ . '/data/users.sqlite';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");
$langue = 'fr';
$conecte = false;
$role='3';
$result_one = $file_db->query("SELECT * FROM utilisateur");
foreach($result_one as $row) {
if ( md5($row['nom'].$row['pwd'])  == $utilisateur) $conecte = true;
$langue = $row['langue'];
$role=$row['role'];
}


if (!$conecte) {
   // print $utilisateur;
 include 'connexion.php';
 die();
}








 ?>
