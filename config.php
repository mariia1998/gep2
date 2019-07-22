<?php

$dbname =   __DIR__ . '/data/gep2.sqlite';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$niveaux = [
'1P',
'2P',
'3P',
'4P',
'5P',
'1M',
'2M',
'3M',
'4M',
'1S',
'2S',
'3S',
'Enseignement superieur'
];
 ?>
