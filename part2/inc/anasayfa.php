    <?php 
	if($_SESSION["giris"] != "ok")
	{
		header("Refresh:1;url=../part1/index.php?do=login");
	}
	else{
		@$sec=$_POST["sec"];
		
		$limit=10;
		
		if($sec!="")
		{
			if($sec=="Hepsi")
			{
				$sorgu = $baglan->prepare("SELECT COUNT(*) FROM durumlar");
			}
			else{
				$sorgu = $baglan->prepare("SELECT COUNT(*) FROM durumlar WHERE oyun_kategori='$sec'");
			}
		}
		else{
			$sorgu = $baglan->prepare("SELECT COUNT(*) FROM durumlar");
		}
		
		$sorgu->execute();
		$uzunluk = $sorgu->fetchColumn();//6
		$sayfa=$uzunluk/$limit; //SAYFA SAYISI
		$sayfa=ceil($sayfa);//3 //YUVARLA ÜST SAYIYA
		
		
		
		
		
	?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <header>
     
    </header>


    <!-- Container -->
    <div class="container" style="margin-top:50px;margin-bottom:50px;width:75%">
      
      <!-- Duyuru -->
      <div class="card text-center text-white bg-primary">
        <div  class="card-header">
          <h5>Hoşgeldin <?php echo $_SESSION["uye_ad"].' '.$_SESSION["uye_soyad"] ?></h5><br>
		  <span id="mesaj_bildir"></span>
		 
		  
        </div>
        <div  class="card-body">
          
          <form action="" method="post">
           
            <div class="form-row">
              <div class="form-group col-md-8">
                <select name="sec" id="inputState" class="form-control border-none">
                  <option  selected>Hepsi</option>
				  <?php
					$oyun_kategori = $baglan->query("SELECT * FROM oyun_kategori",PDO::FETCH_ASSOC);
					foreach($oyun_kategori as $oyun)
					{
						echo '<option>'.$oyun["oyun_kategori"].'</option>';
						
					}
			
				?>
                  <option>Diğer</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <button type="submit" name="filtrele" class="btn btn-dark btn-block">Durumları Filtrele</button>
              </div>
            </div>
          </form>
          
          <!-- modal-durum -->
            <div class="modal fade" id="durumModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="color:#000">Durumunuzu Yazın</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <textarea name="durum" class="form-control" id="" cols="30" rows="10" placeholder="Lütfen çekilişe katıldım,çekiliş için vs. gibi durumlar yazmayın.Aksi taktirde kaldırılacaktır."></textarea>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1" style="float: left;color:#000"><h5>Kategori Seç</h5></label>
                        <select name="oyun_kategori" class="form-control" id="exampleFormControlSelect1">
                          <?php
								$oyun_kategori = $baglan->query("SELECT * FROM oyun_kategori",PDO::FETCH_ASSOC);
								foreach($oyun_kategori as $oyun)
								{
									echo '<option>'.$oyun["oyun_kategori"].'</option>';
									
								}
								
		?>
                          <option>Diğer</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="paylas" style="float: left">Paylaş</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal durum -->
			<div class="modal fade text-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="color:#000">Mate4 Geyik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>

                      <div class="form-group">
                        <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Bişeyler yaz...."></textarea>
                      </div>

                      <div class="form-group" style="border:1px dashed rgba(0,0,0,.1);">
                        <input type="file" class="form-control"/>
                      </div>

                       <div class="form-group">
                     <!--   <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>!-->
                      </div>
                      <button type="submit" class="btn btn-primary" style="float: left">Paylaş</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal resim -->
		<div class="row">
           <div class="col"><button type="submit" class="btn btn-dark btn-lg btn-block" data-toggle="modal" data-target="#durumModal">Yeni Durum Paylaş</button></div>
           <div class="col"><button type="submit" class="btn btn-dark btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Mate4 Geyik</button></div>
           </div>

        </div>
        <div class="card-footer text-muted">
          <span style="color:#fff">Mate4Game.Com</span>
        </div>
      </div>
     
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
			if($sec!="Hepsi" && $sec!="")
			{
				$sql="SELECT * FROM durumlar WHERE oyun_kategori='$sec' ORDER BY durum_id DESC LIMIT $max,$limit ";
			}
			else{
				$sql="SELECT * FROM durumlar ORDER BY durum_id DESC LIMIT $max,$limit";
			}
			
		$yazdir = $baglan->query("$sql",PDO::FETCH_ASSOC);
		
		foreach($yazdir as $yaz)
			{
				
				$id=$yaz["durum_uye_id"];
					$query=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$id");
					$bilgi=$query->fetchObject();
									echo '<div class="card text-white bg-dark">
						  <div class="card-header">'.$yaz["oyun_kategori"].'</div>
						  <div class="card-body">
							<div class="row">
							  <div class="col-md-1">
								 <img class="fa" style="height:75px; width:75px;border"  src="'.$url.'/images/'.$bilgi->uye_profil.'" alt="User profile picture">
							  </div>
							  <div class="col-md-11">
								 <h5 class="card-title">'.$yaz["durum_uye_ad"].' '.$yaz["durum_uye_soyad"].'</h5>
								 <p class="card-text">'.$yaz["durum"].' </p>
							  </div>
							</div>
						   
						  </div>
						  <div class="card-footer">
							<a onclick=profil('.$id.','.$_SESSION["uye_id"].') href="#">'.$yaz["durum_uye_ad"].' '. $yaz["durum_uye_soyad"].'</a>   &nbsp; <a onclick="mesaj('.$id.','.$_SESSION["uye_id"].')" href="#" data-toggle="modal" data-target="#exampleModal">Mesaj Yaz</a>  &nbsp; <span>'.$yaz["durum_tarih"].'</span>
						  </div>
						</div>';
			}
	?>


    

    
  

  <!-- Pagination -->
  <nav aria-label="...">
    <ul class="pagination pagination-lg">
      <!--<li class="page-item active"><a class="page-link" href="#">1</a></li>
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
						
						echo '<a class="page-link" href="'.$url.'/sayfa/'.$i.'">'.$i.'</a></li>';//GENE BİR BEYİN FIRTINASI GENE PHPHNİN ANASINI AĞLATTIK
						
					}
					else if($i!=1 || $i!=2) //1 ve 2 SAYFADA DEĞİLSEK BULUDNUĞUMUZ SAYFANIN 1 ÖNCEKİ VE SONRAKİ GÖSTER
					{
						if($i==$a-1 || $i==$a+1  )
						{
							echo ' <li class="page-item '.$active.'">';
							
							//echo '<a class="page-link" href="index.php?sayfa='.$i.'">'.$i.'</a></li>';
							echo '<a class="page-link" href="'.$url.'/sayfa/'.$i.'">'.$i.'</a></li>';
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
  <!-- Container -->
  <script>
	function mesaj(id3,id4){
		if(id3==id4)
		{
			alert("Şizofren misin?");
		}
		else{
			window.open("http://localhost/mate4game/anasayfa/mesaj/"+id3,"","width=600,height=1000");
		}
	}
	function profil(id1,id2){
		if(id1==id2)
		{
			window.open("http://localhost/mate4game/anasayfa/profilim/","_self");
		}
		else{
			//window.open("index.php?do=profil",_self");
			//window.open("index.php?do=profil&id="+id1,"_self");
			window.open("http://localhost/mate4game/profil/"+id1,"_self");
		}
		
	}
	$(document).ready(function() {
		

        $("#mesaj_bildir").load("http://localhost/mate4game/part2/inc/bildirim-anasayfa.php");

});
setInterval(function() {$("#mesaj_bildir").load('http://localhost/mate4game/part2/inc/bildirim-anasayfa.php');}, 1500);
  </script>
  
  <?php 
	if(isset($_POST["paylas"]))
	{
		
		$durum=guvenlik($_POST["durum"]);
		$ekleyen_kisi_ad=$_SESSION["uye_ad"];
		$ekleyen_kisi_soyad=$_SESSION["uye_soyad"];
		$oyun_kategori=$_POST["oyun_kategori"];
		$ekledigi_tarih=date('d.m.Y');
		$ekleyen_uye_id=$_SESSION["uye_id"];
		$ekleyen_uye_email=$_SESSION["uye_email"];
		//$ekle=$baglan->exec("INSERT INTO durumlar (durum_uye_id,durum_uye_ad,durum_uye_soyad,durum_tarih,durum_email,durum) VALUES ('$ekleyen_uye_id','$ekleyen_kisi_ad','$ekleyen_kisi_soyad','$ekledigi_tarih','$ekleyen_uye_email','$durum')";
		$ekle=$baglan->exec("INSERT INTO durumlar (durum_uye_id,durum_uye_ad,durum_uye_soyad,durum_tarih,durum_email,durum,oyun_kategori) VALUES 
													('$ekleyen_uye_id','$ekleyen_kisi_ad','$ekleyen_kisi_soyad','$ekledigi_tarih','$ekleyen_uye_email','$durum','$oyun_kategori')");
		if($ekle)
		{
			echo '<script> alert("Başarıyla Durumunuz Eklendi")</script>';
			header("Refresh:1;url=$url/anasayfa");
		}
		else{
			echo "Hata";
		}
		echo "post oldu";
	}
}
  ?>
  