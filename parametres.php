<?php
include 'v.php';
include 'config.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/admin.css">

		<style media="screen">
.table tr.active td {background: #b2ebf2 !important }
.tb {height:0px;padding:10px;overflow: hidden;background: #90caf9;color: transparent;}
.tb.afficher {padding:50px;height:auto;min-height:500px;background: #e3f2fd;color: #111;}
.tb {transition: all 1s ease}


		</style>

    <title> Tableau de bord </title>
  </head>
  <body>

<?php
$recherche = false;

include 'navbar.php';
 ?>



<div class="sidebar"style="background-color:#eceff1">

<ul>
  <li onclick="afficherTab('general')">General</li>
  <!-- <li>Importer</li> -->
  <li onclick="afficherTab('exporter')">Exporter</li>
  <li onclick="afficherTab('reset')">Reset</li>
  <li onclick="afficherTab('utilisateurs')">Utilisateurs</li>
  <li onclick="afficherTab('ajouter utilisateur')">Ajouter utilisateur</li>
</ul>




</div>

<div class="container-fluid" style="padding-left:250px;padding-top:15px">

<div class="tb  general">
general
</div>
<div class="tb exporter">
exporter
</div>
<div class="tb reset ">
<div class="form-check">

    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
    <label class="form-check-label" for="defaultCheck1">
      Réinitialiser les étudiants
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
    <label class="form-check-label" for="defaultCheck2">
  Réinitialiser les profs
    </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
Réinitialiser les groupes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
Réinitialiser les profs
  </label>
</div>
</div>

<div class="tb utilisateurs">

</div>
<div class="tb ajouter">

</div>




</div>








  </body>


    <script src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
  function afficherTab(classTab) {

    $('.tb').removeClass('afficher');
    $('.'+classTab).addClass('afficher');




  }
</script>

</html>
