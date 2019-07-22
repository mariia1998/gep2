<?php

$dbname =   __DIR__ . '/data/users.sqlite';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");


 ?>
