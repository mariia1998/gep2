<?php
include 'v.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/admin.css">

		<style media="screen">

		</style>

    <title> لائحة الاساتذة</title>
  </head>
  <body>

<?php
$recherche = false;

include 'navbar.php';
 ?>



<div class="sidebar" style="background-color:#eceff1">
  <input type="text" id="search" oninput="Actualiser()" placeholder="بحث..." class="form-control form-control-sm" name="" value="">
<hr>
<h1 align="center" id="count">0</h1>
<hr>

<button class="btn btn-block btn-success btn-sm" type="button" name="Ajouter" onclick="Ajouter()">اضافة</button>
<button class="btn btn-block btn-warning btn-sm" type="button" name="Modifier" onclick="Editer(1)">تعديل</button>
<button class="btn btn-block btn-danger btn-sm" type="button" name="Supprimer">حذف</button>

</div>

<div class="container-fluid" style="padding-left:250px;padding-top:15px">


<table class="table table-bordered table-striped">
<thead class=" bg-warning">
  <tr>
    <th>الرقم</th>
    <th>اللقب</th>
    <th>الاسم</th>
    <th>المادة</th>
  </tr>
</thead>
<tbody id="res" style="background-color:#ffe0b2">

</tbody>

</table>


</div>








  </body>


    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/p_liste.js"></script>
</html>
