<?php


$command="echo | wmic.exe path win32_computersystemproduct get uuid";
$uid=shell_exec($command);




// print coder('3E40');
// die();



function coder($x) {
  $md5 = md5($x);
  $sbs = strtoupper(substr($md5,0,5));
$sbs = str_replace('A','25',$sbs);
$sbs = str_replace('B','245',$sbs);
$sbs = str_replace('C','15',$sbs);
$sbs = str_replace('D','20',$sbs);
$sbs = str_replace('E','54',$sbs);
$sbs = str_replace('F','21',$sbs);
$sbs = str_replace('G','212',$sbs);
$sbs = str_replace('H','35',$sbs);
$sbs = str_replace('I','42',$sbs);
$sbs = str_replace('J','216',$sbs);
$sbs = str_replace('K','0',$sbs);
$sbs = str_replace('L','5',$sbs);

return $sbs;
}





$activation = array();
$dbname =   __DIR__ . '../data/users.sqlite';
$file_db = new PDO('sqlite:'.$dbname);
$file_db->exec("pragma synchronous = off;");




if (isset($_POST['cle'])) {
$ccle = $_POST['cle'];
  $file_db->exec("UPDATE activation SET val='$ccle' WHERE id='3' ");
}











// $conecte = false;
$result_one = $file_db->query("SELECT * FROM activation");
foreach($result_one as $row) {
$activation[$row['id']] = $row;
}
$genere = $activation[2]['val'];
$suid = $activation[1]['val'];
$scle = $activation[3]['val'];
$newGen = $genere;




function RandomString()
{
    $characters = '0123456789ABCDEFGHJKL';
    $randstring = '';
    for ($i = 0; $i < 4; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

$uid = md5($uid);
if ($suid !== $uid) {
// copied
$newGen = RandomString();
$file_db->exec("UPDATE activation SET val='$uid' WHERE id='1' ");
$file_db->exec("UPDATE activation SET val='$newGen' WHERE id='2' ");
  include 'act.php';
  die();




} else {

if (coder($genere) !== $scle) {
  include 'act.php';
  die();
}

}



?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">


  </head>
  <body>


    <!-- <nav class="navbar navbar-expand-lg  ">
      <a class="navbar-brand">school</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link " href="nav-bar.html">presentation </a>
          <a class="nav-item nav-link" href="nav-bar.html">programs</a>
          <a class="nav-item nav-link" href="nav-bar.html">Pricing</a>
          <a class="nav-item nav-link" href="nav-bar.html" >contact</a>
        </div>
      </div>
    </nav> -->



       <div class="container-fluid bg">



          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
               <div class="col-md-4 col-sm-4 col-xs-12" >

                   <form class="form-container bg-dark" id="loginform">
                     <div class="form-group">
                       <label for="username">Utilisateur</label>
                       <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Nom d'utilisateur">

                     </div>
                     <div class="form-group">
                       <label for="password">Mo de passe</label>
                       <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                     </div>


                     <button type="submit" class="btn btn-light btn-block">Connexion</button>

                   </form>

               </div>
            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>
          </div>






        </div>



  </body>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js">  </script>
    <script href="js/bootstrap.min.js"></script>
    <script src="js/login.js" charset="utf-8"></script>
</html>
