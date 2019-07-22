<?php
include '../v.php';
include '..config.php';

$groupes = '';
$result_one = $file_db->query("SELECT * FROM groupe");
foreach($result_one as $row) {
$groupes .= '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/font-awesome.min.css" >
    <link rel="stylesheet" href="../css/admin.css">

		<style media="screen">
.table tr.active td {background: #b2ebf2 !important }


		</style>

    <title> لوحة التحكم </title>
  </head>
  <body>

<?php
$recherche = false;

include 'navbar.php';
 ?>


<div class="card ">
  <div class="card-body ">

<div class="row">
<div class="col col-3">
  <input type="text" class="form-control" placeholder="بحث..." name="e_recharche" oninput="inscriptions.afficherLesResultats()" value="">

</div>
<div class="col col-2">
  <button type="button" onclick="inscriptions.ajouter()" class="btn btn-success btn-block" name="button">اضافة</button>

</div>
<div class="col col-2">
  <button type="button" class="btn btn-danger btn-block" name="button" onclick="suppr()">حذف</button>

</div>


<div class="col col-4">
<select class="form-control" name="groupe" onchange="inscriptions.afficherLesResultats()">
  <option value="0">كل الافواج</option>
<?php
print $groupes;
 ?>
</select>

</div>



</div>


</div>



</div>



<table class="table table-bordered">
  <thead>
    <tr class="bg-primary text-white ">
      <th>الرقم</th>
      <th>الفوج</th>
      <th>التلميذ</th>
      <th>التاريخ</th>
      <th>رقم البطاقة</th>
      <th>عدد الحصص</th>
      <th>الحصة الاخيرة</th>
    </tr>

  </thead>
  <tbody id="resultats" style="background-color:#90caf9">

  </tbody>
</table>






  </body>


    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/inscriptions.js"></script>
</html>
