<?php
include 'v.php';



require 'config.php';
$groupes = '';
$result_one = $file_db->query("SELECT * FROM groupe ");
foreach($result_one as $row) {
 $groupes .= '<tr> <td>'.$row['nom'].'</td><td><button id= "g'.$row['id'].'" class="btn btn-block btn-primary" onclick="prog('.$row['id'].',1)">Programmer</button></td></tr>';
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" >

		<style media="screen">
.card {margin-bottom:10px}
.card {min-height: 200px}

.card.double{min-height: calc(100vh - 290px)}
		</style>

    <title> Acceuil </title>
  </head>
  <body>

<?php
$recherche = false;

include 'navbar.php';
 ?>



<div class="sidebar" style="background-color:#eceff1">

<h3>Acceuil</h3>
  <br>

<input type="text" placeholder="recherche..." id="search" class="form-control form-control-sm" name="" value="">

<hr>

<div>

<ul id="resultatDeRecherche">

</ul>

</div>






</div>



<div class="container-fluid" style="padding-left:250px;padding-top:15px">


<div class="row">


  <div class="col col-3">
  <div class="card  text-white"  >
    <div class="card-header" style="color:#1e88e5">

          <span><i class="fa fa-book"></i></span>
  NOMBRE DES SEANCES
    </div>

    <div class="card-body nombreDesSeances" style="background-color:#1e88e5 ">
      <div class="spinner-border" role="status">  </div>

    </div>

  </div>
  </div>




<div class="col col-3">
<div class="card  text-white " >
  <div class="card-header" style="color:#66bb6a">

    <span><i class="fa fa-graduation-cap"></i></span>

ETUDIANTS
  </div>

  <div class="card-body nombreDesEturiants" style="background-color:#66bb6a">
    <div class="spinner-border" role="status">  </div>

  </div>

</div>
</div>

<div class="col col-3">
  <div class="card  text-white"  >
    <div class="card-header" style="color:#ffa726">
      <span><i class="fa fa-user		"></i></span>


PROFS
  </div>

  <div class="card-body nombreDesProfs" style="background-color:#ffb74d ;">
    <div class="spinner-border" role="status">  </div>
  </div>

</div>
</div>

<div class="col col-3">
  <div class="card  text-white"  >
    <div class="card-header" style="color:#c62828">
      <span><i class="fa fa-users	"></i></span>

GROUPES
  </div>

  <div class="card-body nombreDesGroupes" style="background-color:#FF5252 ">
     <div class="spinner-border" role="status">  </div>
  </div>

</div>
</div>



<div class="col col-6">
<div class="card double bg-dark text-white">

<table class="form">
<?php

print $groupes;
 ?>

</table>



</div>
</div>









</div>





</div>




<div class="infos-etud ">


<div align="right">

  <button type="button" onclick="cacherInfos()" class="btn btn-danger" name="button">X</button>
</div>


<div class="container">
<div class="row">

<div class="col col-3">

<!-- <img src="images/null.png" width="100%" alt="..." class="img-thumbnail"> -->

<button type="button" class="btn btn-primary btn-block" name="button" id="renouvler" onclick="">RENOUVLER</button>
<button type="button" class="btn btn-primary btn-block" name="button"  onclick="afficherPresenceManuele()">Historique</button>
<button type="button" class="btn btn-primary btn-block" name="button" onclick="">ACTION 2</button>
</div>
<div class="col col-6">

<table class="table table-bordered table-striped">


<tr>
  <td>NOM</td>
  <td id="aff_nom"></td>
</tr>

<tr>
  <td>PRENOM</td>
  <td  id="aff_prenom"></td>
</tr>

<tr>
  <td>NIVEAU</td>
  <td  id="aff_niveau"></td>
</tr>

<tr>
  <td>Nombre des séances</td>
  <td  id="aff_seances"></td>
</tr>

<tr>
  <td>CARTE</td>
  <td  id="aff_carte"></td>
</tr>



</table>










</div>


</div>





<div class="row agenda bg-dark text-white">

</div>










</div>





</div>



  </body>



<script type="text/javascript">

</script>
      <script src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/dashboard.js">

  </script>
</html>
