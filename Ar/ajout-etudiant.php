<?php
include '../v.php';
$eid = $_GET['id'];

$nomPd = '';
$prenomPd = '';
$anneePd = '';
$niveauPd = '';
$telPd = '';
$idPd = $eid;

include '../config.php';
if ($eid !=='0') {
$result_one = $file_db->query("SELECT * FROM etudiant WHERE id='$eid'");
foreach($result_one as $row) {
		$nomPd = $row['nom'];
		$prenomPd =$row['prenom'];
		$anneePd = $row['annee'];
		$niveauPd = $row['niveau'];
		$telPd = $row['tel'];
}
}


$gr = '';
$result_one = $file_db->query("SELECT * FROM groupe");
foreach($result_one as $row) {
$gr .= '<option value="'.$row['id'].'" data-s="'.$row['prix_s'].'">'.$row['nom']. '</option>';
}


 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>اضافة تلميذ</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/gep2.css">
		<style media="screen">
			table.form {width:100%;}
			table.form tr td{padding:5px;}
		</style>
	</head>
	<body class="bg-light">
		<div class="container">
			<br>
			<form id="addForm" action="test.php">



			<div class="card">
				<div class="card-header  bg-primary text-white">اضافة تلميذ</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="eid" value="<?php print $eid; ?>">
<input type="hidden" name="annee" class="form-control" value="<?php print $anneePd; ?>"	/>


<table class="form">
<tr>
	<td><input type="text" name="nom" id="nom" class="form-control " autofocus value="<?php print $nomPd; ?>" required></td>

	<td>اللقب</td>
</tr>
<tr>
	<td><input type="text" name="prenom" id="prenom" value="<?php print $prenomPd; ?>"
			class="form-control"/></td>
	<td>الاسم</td>

</tr>
<tr>
	<td><input type="text"  name="niveau" class="form-control"	value="<?php print $niveauPd; ?>"/></td>

	<td>المستوى</td>
</tr>
<tr>
		<td><input type="text" name="tel" class="form-control" value="<?php print $telPd; ?>"	/></td>
	<td>رقم الهاتف</td>

</tr>
</table>

<?php if ($eid == '0')  {?>
 <hr>
<input type="checkbox" onchange="afficherInscription(this)" name="inscription" value=""> تسجيل
<?php } ?>

<div style="display:none" id="inscr">


<table class="form">
	<tr>
		<td>
		  <select class="form-control bg-primary text-white" name="groupe_id" onchange='calculerLePrix()'>
		<?php print $gr; ?>
		</select>
		</td>
<td>الفوج</td>

  </tr>
	<tr>
		<td>
			<select class="form-control" name="nombre_seances" onchange='calculerLePrix()'>
		<?php
		for ($i=1; $i <10 ; $i++) {
			print '<option value="'.($i * 8).'">'.$i.' MOI'.($i =='1'?'':'S').'</option>';
		}
		 ?>
		</select>
		</td>
<td>عدد الحصص</td>

	</tr>
	<tr>
		<td>
		<input type="text" class="form-control" name="montant" value=""  >
		</td>
<td>المبلغ</td>

	</tr>

	<tr>
		<td>
		<input type="number" class="form-control" name="carte" value="" >
		</td>
<td>رقم البطاقة</td>

	</tr>


</table>


</div>

<br>
<hr>


						<button type="submit" class="btn btn-primary">حفظ</button>


					</form>
				</div>
			</div>
<script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="../js/ajout-etudiant.js" charset="utf-8"></script>

 		</div>
	</body>
</html>
