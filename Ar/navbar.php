
<link rel="stylesheet" href="../css/font-awesome.min.css" >
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#78909c">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="admin.php"><span><i class="fa fa-dashboard"></i></span>   لوحة التحكم </a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="e_liste.php"><span><i class="fa fa-user"></i></span>التلاميذ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="p_liste.php"><span><i class="fa fa-user"></i></span>الاساتذة</a>

      </li>

      <li class="nav-item">
        <a class="nav-link" href="g_liste.php"><span><i class="fa fa-users"></i></span>الافواج</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscriptions.php"><span><i class="fa fa-pencil"></i></span>التسجيلات</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="parametres.php"   aria-disabled="true"><span><i class="fa fa-cog"></i></span>الاعدادات</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="recette.php"   aria-disabled="true"><span><i class="fa fa-dollar"></i></span>المداخيل</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="./"   aria-disabled="true"><span><i class="fa fa-sign-out"></i></span>الخروج</a>
      </li>
    </ul>
    <?php if ($recherche)  {?>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="بحث" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">بحث</button>
    </form>
    <?php } ?>
  </div>
</nav>
