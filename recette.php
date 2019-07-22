
<?php
include 'v.php';
if ($role > 0) include 'ai.php';
include 'config.php';

$groupes = '';
$result_one = $file_db->query("SELECT * FROM groupe ");
foreach($result_one as $row) {

$groupes.= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
}
$profs = '';
$result_one = $file_db->query("SELECT * FROM prof ");
foreach($result_one as $row) {

$profs.= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
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
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/admin.css">

		<style media="screen">
.table tr.active td {background: #b2ebf2 !important }


		</style>

    <title> Tableau de bord </title>
  </head>
  <body>

<?php
$recherche = false;

include 'navbar.php';
 ?>



<div class="sidebar" style="background-color:#eceff1">
<h1 align="center" id="total"></h1>

<hr>
<input type="date" name="d1" id='d1' class="form-control form-control-sm" value="<?php print date('Y-m-d');?>" onchange="Recette()"><br>
<input type="date" name="d2" id='d2'  class="form-control form-control-sm" value="<?php print date('Y-m-d');?>" onchange="Recette()">
<hr>

<select class="form-control bg-dark text-white" name="types" onchange="afficher()">
<option value="0"> Tous</option>
<option value="I"> Inscriptions</option>
<option value="R"> Renouvlements</option>
</select>

<hr>

<select class="form-control bg-success text-white" name="groupes"  onchange="afficher()">
<option value="0">TOUS LES GROUPES</option>
<?php print $groupes; ?>
</select>
<hr>

<select class="form-control bg-danger text-white" name="profs"  onchange="Recette()">
<option value="0">TOUS LES PROFS</option>
<?php print $profs; ?>
</select>


</div>

<div class="container-fluid" style="padding-left:250px;padding-top:15px">

<table class="table table-bordered table-striped" style="background-color:#00bfa5">
<thead>
  <tr>
    <th></th>
    <th>Etudiant</th>
    <th>Groupe</th>
    <th>Montant</th>
    <th>Date</th>
  </tr>

</thead>
<tbody id="resultat"  style="background-color:#a7ffeb">

</tbody>
</table>


</div>








  </body>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/recette.js"></script>

</html>
