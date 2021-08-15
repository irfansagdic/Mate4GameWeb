<?php 
	include("../ayar/baglan.php");
	include("../ayar/fonksiyon.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mate4Game</title>


    <link href="<?php echo $url ?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url ?>/fontawesome/css/font-awesome.min.css">

    <link href="<?php echo $url ?>/css/full-slider.css" rel="stylesheet">
    <link href="<?php echo $url ?>/vendor/bootstrap/css/custom.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand mb-0 h1" href="index.php">Mate4Game</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url ?>/uye_giris"><i class="fa fa-user" aria-hidden="true"></i> Giriş</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url ?>/kayit_ol"><i class="fa fa-user-plus" aria-hidden="true"></i> Kaydol</a>
            </li>
          </ul>
        </div>
      </div>  
    </nav>



  <?php 
	if(@$_GET["do"])
	{
		$do=$_GET["do"];
		require("inc/$do.php");
	}
	else{
		require("inc/anasayfa.php");
	}
  ?>
  

    <script src="<?php echo $url ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $url ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
