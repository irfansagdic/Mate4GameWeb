    <?php 
		$limit=10;
		$sorgu = $baglan->prepare("SELECT COUNT(*) FROM durumlar");
		$sorgu->execute();
		$uzunluk = $sorgu->fetchColumn();//6
		$sayfa=$uzunluk/$limit; //SAYFA SAYISI
		$sayfa=ceil($sayfa);//3 //YUVARLA ÜST SAYIYA
		
	?>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		   <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo $url ?>/vendor/img/slider/cs-go.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Counter Strike Global Offensive</h3>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo $url ?>/vendor/img/slider/lol.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>League of Legends</h3>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo $url ?>/vendor/img/slider/metin2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Metin2</h3>
            </div>
          </div>
		  <div class="carousel-item" style="background-image: url('<?php echo $url ?>/vendor/img/slider/pubg.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Playerunknown's Battlegrounds</h3>
            </div>
          </div>
		  <div class="carousel-item" style="background-image: url('<?php echo $url ?>/vendor/img/slider/rainbow.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Rainbow Six Siege</h3>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

	<!-- Container -->
    <div class="container" style="margin-top:50px;margin-bottom:50px">
      
      <!-- Duyuru -->
      <div class="card text-center text-white bg-primary">
        <div class="card-header">
          Mate4Game
        </div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text">Üye iseniz giriş yapıp , değilseniz kayıt olarak aramıza katılıp , oyun arkadaşlarınızı kolayca edinebilirsiniz ve mesajlaşabilirsiniz.Herkese iyi oyunlar. :)</p>
          <a href="<?php echo $url ?>/uye_giris" class="btn btn-dark">Giriş</a>
          <a href="<?php echo $url ?>/kayit_ol" class="btn btn-dark">Kayıt Ol</a>
        </div>
        <div class="card-footer text-muted">
          <span style="color:#fff">Mate4Game</span>
        </div>
      </div>
      <!-- Duyuru -->

     <!-- Posts 
     <div class="card text-white bg-dark">
      <div class="card-header">League of Lengends</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-1">
            <i class="fa fa-user-o fa-4x" aria-hidden="true"></i>
          </div>
          <div class="col-md-11">
             <h5 class="card-title">Enes Batmaz</h5>
             <p class="card-text">pre girecek birileri eklesin nick q3rm4nT3n >- Tr server </p>
          </div>
        </div>
       
      </div>
      <div class="card-footer">
        <span>Enes Batmaz</span> &nbsp; <span>01.02.2018</span>
      </div>
    </div>
    <!-- Posts -->
	<?php 
		
		if(@$_GET["sayfa"]) //sayfa get olursa sayfa noyu al
			{
				$a=$_GET["sayfa"];
				$max = $limit*$a-$limit;
				
				
			}
			else{
				$max = 0; //GET OLMAZSA BUNU AL
			}
		$sql="SELECT * FROM durumlar ORDER BY durum_id DESC LIMIT $max,$limit";
		$yazdir = $baglan->query("$sql",PDO::FETCH_ASSOC);
		foreach($yazdir as $yaz)
			{
				$id=$yaz["durum_uye_id"];
				$query=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$id");
				$bilgi=$query->fetchObject();
				echo ' <div class="card text-white bg-dark">
							  <div class="card-header">'.$yaz["oyun_kategori"].'</div>
							  <div class="card-body">
								<div class="row">
								  <div class="col-md-1">
									 <img class="fa" style="height:75px; width:75px;" src="'.$url.'/images/'.$bilgi->uye_profil.'" alt="User profile picture">
								  </div>
								  <div class="col-md-11">
									 <h5 class="card-title">'.$yaz["durum_uye_ad"].' '.$yaz["durum_uye_soyad"].'</h5>
									 <p class="card-text">'.$yaz["durum"].' </p>
								  </div>
								</div>
							   
							  </div>
							  <div class="card-footer">
								<span>'.$yaz["durum_uye_ad"].' '.$yaz["durum_uye_soyad"].'</span> &nbsp; <span>'.$yaz["durum_tarih"].'</span>
							  </div>
							</div>';
				

				
			}
	?>



   
  

  <!-- Pagination -->
  <nav aria-label="...">
    <ul class="pagination pagination-lg">
     <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">4</a></li>
      <li class="page-item"><a class="page-link" href="#">5</a></li>
      <li class="page-item"><a class="page-link" href="#">6</a></li>-->
	  <?php 
					
				if(@$_GET["sayfa"])
				{
					$a=$_GET["sayfa"];
				}
				else{
					$a=1;
				}
				for($i=1;$i<=$sayfa;$i++)
				{
					$active=" ";
					
					if($i==$a)
						{
							$active="active";
						}
					if($i==1 || $i==2|| $i==3|| $i==4|| $i==5|| $i==6|| $i==7|| $i==8|| $i==9 || $i==10 || $i == $sayfa || $i==$a)// 1 2  SONUNCU VE BULUNDUĞUMUZ SAYFA GÖSTERİLİYOR
					{
						
						echo ' <li class="page-item '.$active.'">';
						
						echo '<a class="page-link" href="'.$url.'/giris/sayfa/'.$i.'">'.$i.'</a></li>';//GENE BİR BEYİN FIRTINASI GENE PHPHNİN ANASINI AĞLATTIK
						
					}
					else if($i!=1 || $i!=2) //1 ve 2 SAYFADA DEĞİLSEK BULUDNUĞUMUZ SAYFANIN 1 ÖNCEKİ VE SONRAKİ GÖSTER
					{
						if($i==$a-1 || $i==$a+1  )
						{
							echo ' <li class="page-item '.$active.'">';
							
							echo '<a class="page-link" href="index.php?sayfa='.$i.'">'.$i.'</a></li>';
						}
					}
					if($i!=1 && $i!=2 && $i!=3 && $i!=4 && $i!=5 && $i!=6 && $i!=7 && $i!=8 && $i!=9 && $i!=10   && $i!=$sayfa && $i!=$a && $i!=$a-1 && $i!=$a+1)
					{
						echo ' <li class="page-item '.$active.'">';
							echo '<a class="page-link" href="#">...</a></li>';
					}
					
					
				}
	  ?>
    </ul>
  </nav>
  <!-- Pagination -->

  </div>