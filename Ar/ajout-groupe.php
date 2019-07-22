<?php
include '../v.php';
$eid = $_GET['id'];
include '../config.php';

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
		<title>اضافة فوج</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/gep2.css">
	</head>
	<body>
		<div class="container">
			<br>
			<form id="addForm" action="../test.php">



			<div class="card">
				<div class="card-header  bg-primary text-white">اضافة فوج</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="eid" value="<?php print$eid;?> ">



<table class="form">
<tr>

  <td><input type="text" name="nom" id="nom" value="<?php print $nomPd; ?>" class="form-control " autofocus value="" required></td>
  <td>اسم الفوح</td>
</tr>
<tr>  <td>
<select class="form-control" name="niveau">

<?php
for ($i=0; $i <count($niveaux) ; $i++) {
if ($niveaux[$i] !== '') print '<option value="'.$i.'">'.$niveaux[$i].'</option>';
}

 ?>
</select>


  </td>
  <td>المستوى</td>

</tr>
<tr>
  <td>
    <select class="form-control" name="prof">
    <?php print $profs; ?>
    </select>
  </td>
  <td>الاستاذ</td>

</tr>
<tr>
  <td>
  <input type="number" min="0" max="100" name="nombre_max" value="<?php print $nombremaxPd; ?>" class="form-control" value="">
  </td>
  <td>العدد الاقصى </td>

</tr>
<tr>
  <td>
  <input type="checkbox" name="special"    <?php print $specialPd; ?>	/>
  </td>
  <td>خاص </td>

</tr>
<tr>
  <td>
  <input type="text" name="prix_m" class="form-control" value="<?php print $prixPmPd; ?>"	/>
  </td>
  <td>المبلغ \الشهر </td>

</tr>
<tr>
  <td>
<input type="text" name="prix_s" class="form-control" value="<?php print $prixPsPd; ?>"	/>
  </td>
  <td>المبلغ\الحصة</td>

</tr>
<tr>
  <td></td>
  <td><button type="submit" class="btn btn-primary">حفظ</button></td>
</tr>
</table>



















					</form>
				</div>
			</div>
<script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="../js/ajout-groupe.js?v=1" charset="utf-8"></script>

 		</div>
	</body>
</html>
