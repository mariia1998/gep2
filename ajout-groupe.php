<?php
include 'v.php';
$eid = $_GET['id'];
include 'config.php';

$nomPd = '';
$matierePd = '';
$nombremaxPd = '';
$specialPd = '';
$prixPmPd = '';
$prixPsPd = '';

if ($eid !== '0') {

  $result_one = $file_db->query("SELECT * FROM groupe WHERE id='$eid'");
  foreach($result_one as $row) {
$nomPd = $row['nom'];
$matierePd = $row['id_matiere'];
$nombremaxPd = $row['nombre_max'];
$specialPd = ($row['special'] == '1'?'checked':'');
$prixPmPd = $row['prix_m'];
$prixPsPd = $row['prix_s'];
  }

}





$profs = '';
$result_one = $file_db->query("SELECT * FROM prof");
foreach($result_one as $row) {
$profs .= '<option value="'.$row['id'].'">'.$row['nom']. '' .$row['prenom'].'</option>';
}

 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/gep2.css">
	</head>
	<body>
		<div class="container">
			<br>
			<form id="addForm" action="test.php">



			<div class="card">
				<div class="card-header  bg-primary text-white">ajouter un groupe</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="eid" value="<?php print$eid;?> ">



<table class="form">
<tr>
  <td>NOM</td>
  <td><input type="text" name="nom" id="nom" value="<?php print $nomPd; ?>" class="form-control " autofocus value="" required></td>
</tr>
<tr>
  <td>NIVEAU</td>
  <td>
<select class="form-control" name="niveau">

<?php
for ($i=0; $i <count($niveaux) ; $i++) {
if ($niveaux[$i] !== '') print '<option value="'.$i.'">'.$niveaux[$i].'</option>';
}

 ?>
</select>
    <!-- <input type="text" name="nom" id="matiere" class="form-control "   value="<?php print $matierePd; ?>" required> -->


  </td>
</tr>
<tr>
  <td>prof</td>
  <td>
    <select class="form-control" name="prof">
    <?php print $profs; ?>
    </select>
  </td>
</tr>
<tr>
  <td>Nombre maximum </td>
  <td>
  <input type="number" min="0" max="100" name="nombre_max" value="<?php print $nombremaxPd; ?>" class="form-control" value="">
  </td>
</tr>
<tr>
  <td>Special </td>
  <td>
  <input type="checkbox" name="special"    <?php print $specialPd; ?>	/>
  </td>
</tr>
<tr>
  <td>Prix /mois </td>
  <td>
  <input type="text" name="prix_m" class="form-control" value="<?php print $prixPmPd; ?>"	/>
  </td>
</tr>
<tr>
  <td>Prix /seance </td>
  <td>
<input type="text" name="prix_s" class="form-control" value="<?php print $prixPsPd; ?>"	/>
  </td>
</tr>
<tr>
  <td></td>
  <td><button type="submit" class="btn btn-primary">Enregistrer</button></td>
</tr>
</table>



















					</form>
				</div>
			</div>
<script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="js/ajout-groupe.js?v=1" charset="utf-8"></script>

 		</div>
	</body>
</html>
