<?php

$command="echo | wmic.exe path win32_computersystemproduct get uuid";
$uid=shell_exec($command);
// echo  $uid;




function coder($x) {
return '00'.$x;
}


$activation = array();
$dbname =   __DIR__ . '../data/users.sqlite';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");

$conecte = false;
$result_one = $file_db->query("SELECT * FROM activation");
foreach($result_one as $row) {
$activation[$row['id']] = $row;
}
$genere = $activation[2]['val'];
$suid = $activation[1]['val'];
$cle = $activation[3]['val'];






function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 4; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

if ($suid !== $uid) {


  include 'act.php';

} else {

if (coder($genere) !== $cle) {
  include 'act.php';
}

}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">


  </head>
  <body>





       <div class="container-fluid bg">



          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
               <div class="col-md-4 col-sm-4 col-xs-12" >

                   <form class="form-container bg-dark" id="loginform">
                     <div class="form-group">

                       <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">
                       <label for="username">اسم المستخدم</label>

                     </div>
                     <div class="form-group">

                       <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                       <label for="password">رقم السر</label>
                     </div>


                     <button type="submit" class="btn btn-light btn-block">تسجيل الدخول</button>

                   </form>

               </div>
            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>
          </div>






        </div>



  </body>
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js">  </script>
    <script href="../js/bootstrap.min.js"></script>
    <script src="../js/login.js" charset="utf-8"></script>
</html>
