<?php
include 'v.php';
$eid = $_GET['id'];

$nomPd = '';
$prenomPd = '';
$matierePd = 0;
$cartePd = '';

$idPd = $eid;


include 'config.php';


if ($eid !=='0') {
$result_one = $file_db->query("SELECT * FROM prof WHERE id='$eid'");
foreach($result_one as $row) {
		$nomPd = $row['nom'];
		$prenomPd =$row['prenom'];
		$matierePd = $row['matiere'];
		$matierePd = $row['matiere'];
		$cartePd = $row['carte'];
}
}


// $matiers = '';
//
// $result_one = $file_db->query("SELECT * FROM matiere");
// foreach($result_one as $row) {
//
// $s = ($row['id'] == $matierePd ? 'selected':'');
//
// $matiers .=   '<option value="'.$row['id'].'" '.$s.' >'.$row['nom'].'</option>';
//
// }






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
				<div class="card-header  bg-primary text-white">ajouter un prof</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="eid" value="<?php print $eid; ?>">

						<div class="form-group">
							<label for="NOM" class="control-label">NOM</label>
							<input type="text" name="nom" id="nom" class="form-control " value="<?php print $nomPd; ?>" required>
						</div>

						<div class="form-group">
							<label for="PRENOM" class="control-label">PRENOM</label>
							<input type="text" name="prenom" id="prenom" value="<?php print $nomPd; ?>"
							class="form-control"/>
						</div>



							<div class="form-group">
								<label for="PRENOM" class="control-label">MATIERE </label>
								<input type="text" name="matiere" id="matiere" value="<?php print $matierePd; ?>"
								class="form-control"/>




						</div>

							<!-- <div class="form-group">
								<label for="PRENOM" class="control-label">CARTE </label>
								<input type="text"  name="maiere" class="form-control"	value="<?php print $cartePd; ?>"/>

						</div> -->






						<button type="submit" class="btn btn-primary">Enregistrer</button>


					</form>
				</div>
			</div>
<script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="js/ajout-prof.js" charset="utf-8"></script>
 		</div>
	</body>
</html>
