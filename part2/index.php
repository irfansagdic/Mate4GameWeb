<?php 
	include("../ayar/baglan.php");
	include("../ayar/fonksiyon.php");
	$uye_id=$_SESSION["uye_id"];
	/*$sorgu=$baglan->query("SELECT COUNT(*) FROM mesajlar WHERE alici_id=$uye_id AND mesaj_okundu=0");
	$bilgi=$sorgu->execute();
	$say=$sorgu->fetch();*/
		//$yazdir=$baglan->query($sorgu);
	$sorgu1 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE alici_id=$uye_id && mesaj_okundu=0");
	$sorgu1->execute();
	$say = $sorgu1->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title id="bildirim_title">Mate4Game</title>


    
    <link href="<?php echo $url ?>/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url ?>/fontawesome/css/font-awesome.min.css">

    <link href="<?php echo $url ?>/css/full-slider.css" rel="stylesheet">
    <link href="<?php echo $url ?>/vendor/bootstrap/css/custom.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand mb-0 h1" href="<?php echo $url ?>/anasayfa">Mate4Game</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $url ?>/anasayfa/bizeulasin">Bize Ulaşın</a>
              <a class="nav-link" href="<?php echo $url ?>/anasayfa/geyik">geyik</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php echo $_SESSION["uye_ad"].' '.$_SESSION["uye_soyad"]; ?>
			   <?php 
					
			   ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo $url ?>/anasayfa/mesajlar">Mesajlar (<?php echo $say; ?>)</a>
                <a class="dropdown-item" href="<?php echo $url ?>/anasayfa/profilim">Profilim</a>
				 
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?do=cikisyap"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</a>
				
              </div>
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
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  </body>

</html>
<script>
				$(document).ready(function() {
					

					$("#bildirim_title").load("http://localhost/mate4game/part2/inc/bildirim-title.php");

			});
			setInterval(function() {$("#bildirim_title").load('http://localhost/mate4game/part2/inc/bildirim-title.php');}, 1500);
</script>
