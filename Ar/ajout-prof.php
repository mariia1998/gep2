<?php
include '../v.php';
$eid = $_GET['id'];

$nomPd = '';
$prenomPd = '';
$cartePd = '';

$idPd = $eid;


include '../config.php';


if ($eid !=='0') {
$result_one = $file_db->query("SELECT * FROM prof WHERE id='$eid'");
foreach($result_one as $row) {
		$nomPd = $row['nom'];
		$prenomPd =$row['prenom'];
		$cartePd = $row['carte'];
}
}


 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>اضافةاستاذ</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/gep2.css">
	</head>
	<body>
		<div class="container">
			<br>
			<form id="addForm" action="../test.php">



			<div class="card">
				<div class="card-header  bg-primary text-white">اضافةاستاذ</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="eid" value="<?php print $eid; ?>">

						<div class="form-group">
						<input type="text" name="nom" id="nom" class="form-control " value="<?php print $nomPd; ?>" required>
							<label for="NOM" class="control-label">اللقب</label>
						</div>

						<div class="form-group">
							<label for="PRENOM" class="control-label">الاسم</label>
							<input type="text" name="prenom" id="prenom" value="<?php print $nomPd; ?>"
							class="form-control"/>
						</div>


						<button type="submit" class="btn btn-primary">حفظ</button>


					</form>
				</div>
			</div>
<script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="../js/ajout-prof.js" charset="utf-8"></script>
 		</div>
	</body>
</html>
