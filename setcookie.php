<?php
$data= $_POST['data'];


// setcookie("utilisateur", $username, time()+360000,"/", "", 0);
// setcookie("motdepasse", $password, time()+360000,"/", "", 0);
setcookie("utilisateur", Encoder($data), time()+360000,"/", "", 0);




function Encoder($txt) {
return md5($txt);
}
 ?>
