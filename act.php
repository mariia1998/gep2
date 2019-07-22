



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>activation</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/act.css">


  </head>
  <body>




       <div class="container-fluid bg">



          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
               <div class="col-md-4 col-sm-3 col-xs-12" >

                   <form class="form-container bg-dark" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h3 align="center"><?php print $newGen; ?></h3>
                     <div class="form-group">
                       <label for="clé"> introduisez la clé d'activation: </label>
                       <input type="text" class="form-control" name="cle" placeholder="clé d'activation">
                     </div>


                     <button type="submit" class="btn btn-light btn-block">ACtiver</button>


 <label for="clé">numero de telephone frequency: </label>


     </form>



        </div>



  </body>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js">  </script>
    <script href="js/bootstrap.min.js"></script>


</html>
