<?php
include '../v.php';
$id= $_GET['id'];
include '../config.php';

$carte = '';
$idetudiant =0;
if ($id !== '0') {
  $result_one = $file_db->query("SELECT * FROM inscription WHERE id ='$id'");
  foreach($result_one as $row) {
$idgroupe = $row['id_groupe'];
$idetudiant = $row['id_etudiant'];
$carte = $row['carte'];

  }
}





$etudiant = '';

$result_one = $file_db->query("SELECT * FROM etudiant ORDER BY id DESC");
foreach($result_one as $row) {
if ($id =='0' || $idetudiant == $row['id']) $etudiant .= '<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
}

$gr = '';
$result_one = $file_db->query("SELECT * FROM groupe");
foreach($result_one as $row) {
if ($id =='0' || $idgroupe == $row['id']) $gr .= '<option value="'.$row['id'].'" data-s="'.$row['prix_s'].'">'.$row['nom']. '</option>';
}



 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>اضافة تسجيل</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/gep2.css?x=1">
		<link rel="stylesheet" type="text/css" href="../css/select2.css">
	</head>
	<body>
		<div class="container">
			<br>
			<form id="addForm" action="../test.php">



			<div class="card">
				<div class="card-header  bg-primary text-white">تسجيل</div>
				<div class="card-body">

          <input type="hidden" name="iid" value="<?php print $id;?>">





<table class="form">
  <tr>
    <td>
      <select class="form-control" id="etudiants" name="e_id">
    <?php print $etudiant; ?>
    </select>
    </td>
<td>التلميذ</td>

  </tr>
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
    <input type="text" class="form-control" name="montant" value=""  disabled>
    </td>
<td>المبلغ</td>

  </tr>

  <tr>
    <td>
    <input type="number" class="form-control" name="carte" value="<?php print $carte;?>" required>
    </td>
<td>رقم البطاقة</td>

  </tr>


</table>



						<button type="submit" class="btn btn-primary">حفظ</button>


					</form>
				</div>
			</div>
<script src="../js/jquery-3.4.1.min.js" charset="utf-8"></script>
<script src="../js/select2.min.js" charset="utf-8"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('#etudiants').select2();
});

function calculerLePrix(){
var inscrGr  = document.querySelector('[name="groupe_id"]')  ,
prixParSeance = inscrGr.options[inscrGr.selectedIndex].getAttribute("data-s") ,
nombreDesSeances = document.querySelector('[name="nombre_seances"]').value ,
montant = parseFloat(prixParSeance) * parseFloat(nombreDesSeances);
document.querySelector('[name="montant"]').value = montant;
}


//ajoutermodifiersinscription
$(function(){
  $('#addForm').on('submit',function(e){
  e.preventDefault();
  var  iid=$('[name="iid"]').val(),e_id=$('[name="e_id"]').val(), groupe_id=$('[name="groupe_id"]').val(),
  nombre_seances= $('[name="nombre_seances"]').val(),montant= $('[name="montant"]').val(),carte= $('[name="carte"]').val();

  $.ajax({
    type: "POST",
    url: 'post/ajoutermodifiersinscription.php',
    data: {iid:iid,e_id:e_id,groupe_id:groupe_id,nombre_seances:nombre_seances,montant:montant,carte:carte},
    success: function(reponse){
console.log(reponse);
       $('[name="iid"]').val(reponse);
       window.close();
        // window.opener.Actualiser();
    }
  });


  })
});



calculerLePrix();
</script>
 		</div>
	</body>
</html>
