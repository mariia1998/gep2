<?php
include 'v.php';
$eid = $_GET['id'];

$nomPd = '';

$idPd = $eid;


include 'config.php';


if ($eid !=='0') {
$result_one = $file_db->query("SELECT * FROM matiere WHERE id='$eid'");
foreach($result_one as $row) {
		$nomPd = $row['nom'];
}
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
				<div class="card-header  bg-primary text-white">ajouter une matiere</div>
				<div class="card-body">


						<div class="form-group">


						<div class="form-group">
							<label for="NOM" class="control-label">NOM</label>
							<input type="text" name="nom" id="nom" class="form-control " value="<?php print $nomPd; ?>" required>
						</div>


						<button type="submit" class="btn btn-primary">Enregistrer</button>


					</form>
				</div>
			</div>
			<script type="text/javascript">
var mid = <?php print $eid; ?>;
			</script>

<script src="js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="js/ajout-matiere.js" charset="utf-8"></script>
 		</div>
	</body>
</html>
