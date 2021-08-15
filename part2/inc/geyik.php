<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../vendor/img/slider/cs-go.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Counter Strike Global Offensive</h3>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../vendor/img/slider/lol.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>League of Legends</h3>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../vendor/img/slider/metin2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Metin2</h3>
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
    <div class="container" style="margin-top:50px;margin-bottom:50px;width:70%">
      
      <!-- Duyuru -->
      <div class="card text-center text-white bg-primary">
        <div class="card-header">
          <h5>Hoşgeldin İrfan Sağdıç</h5>
        </div>
        <div class="card-body">
          
          <form>
           
            <div class="form-row">
              <div class="form-group col-md-8">
                <select id="inputState" class="form-control border-none">
                  <option selected>Counter Strike Global Offensive</option>
                  <option>League of Legends</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <button type="submit" class="btn btn-dark btn-block">Durumları Filtrele</button>
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
                    <form>
                      <div class="form-group">
                        <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Lütfen çekilişe katıldım,çekiliş için vs. gibi durumlar yazmayın.Aksi taktirde kaldırılacaktır."></textarea>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlSelect1" style="float: left;color:#000"><h5>Kategori Seç</h5></label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" style="float: left">Paylaş</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal durum -->

            <!-- modal-resim -->
            <div class="modal fade text-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="color:#000">Mate4Geyik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">

                      <div class="form-group">
                        <textarea name="geyik" class="form-control" id="" cols="30" rows="10" placeholder="Bişeyler yaz...."></textarea>
                      </div>

                      <div class="form-group" style="border:1px dashed rgba(0,0,0,.1);">
                        <input name="geyik_foto" type="file" class="form-control"/>
                      </div>

                       <div class="form-group">
                   <!-- <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>!-->
                      </div>
                      <button type="submit" name="geyik_paylas" class="btn btn-primary" style="float: left">Paylaş</button>
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
      <!-- Duyuru -->
      
    
    
<?php
   $uye_id=$_SESSION["uye_id"];
     $sql=$baglan->query("SELECT * FROM geyikler ORDER BY geyik_id DESC ",PDO::FETCH_ASSOC);
?>

     <!-- Posts -->
	   <?php
	  foreach($sql as $bilgi)
	  {
		  ?>
     <div class="card text-white bg-dark">
      <div class="card-header"> 
          <div class="row">
            <div class="col-md-10"> 
            </div> 
            <div class="col-md-2"> 
              <div class="social"> 
                  <span><a href="#" class="like"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a> (0)</span>&nbsp;&nbsp;&nbsp;
                  <span><a href="#" class="dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>    (0)</span>
              </div>
            </div>
          </div>
      </div>
      <div class="card-body">
        <img style="width:900px; heigth:800px" src="../vendor/img/Geyik/<?php echo $bilgi["geyik_foto"]  ?>" class="img-fluid" alt="Mate4 Geyik">
        <p style="margin-top:20px;font-size:18px"><?php echo $bilgi["geyik"] ?>	</p>
      </div>
      <div class="card-footer">
        <div class="row">

          <div class="col-md-8">
            <a href="#">Enes Batmaz</a>   &nbsp; <a href="#">Mesaj Yaz</a>  &nbsp; <span>01.02.2018</span> 
          </div>

          <div class="col-md-4">
            <div  class="daha-fazlasi">
             <a " data-toggle="collapse" href="#collapseExample<?php echo $bilgi["geyik_id"]?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-commenting-o" aria-hidden="true"></i> 7 Yorum</a>
            </div>
          </div>
        </div>
      </div>  
        <div class="collapse" id="collapseExample<?php echo $bilgi["geyik_id"] ?>">         
              <div class="card card-body">
                <div class="yorum">
                  <div class="row"> 

                    <div class="col-md-2"> 
                        <center><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></center>
                        <center><small>tarık sacit aydemir</small></center>
                        <center><small>01.02.2018</small></center>
                    </div>

                    <div class="col-md-10"> 
                        <div> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                    </div>

                  </div>
                </div>

				  <div class="yorum">
                  <div class="row"> 

                    <div class="col-md-2"> 
                        <center><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></center>
                        <center><small>tarık sacit aydemir</small></center>
                        <center><small>01.02.2018</small></center>
                    </div>
                    <div class="col-md-10"> 
                        <div> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="yorum-yaz"> 
                  
                     <div class="row"> 
                        <div class="col-md-10"> 
                            <input type="text" name="geyik_yorum" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Yorumunuzu yazınız...">
                        </div>
                        <div class="col-md-2"> 
                            <button  type="button"  onclick="yorum_kaydet(<?php echo $bilgi["geyik_id"] ?>)" class="btn btn-primary btn-block">Yorumu Gönder</button>
                        </div>                               
                      </div>
                  
                </div>
              </div>
			</div>
		</div>
			<?php
					}
			?>	

	<?php
		if(isset($_POST["geyik_paylas"]))
			{
		
				$geyik=guvenlik($_POST["geyik"]);
				$geyik_yapan_ad=$_SESSION["uye_ad"];
				$geyik_yapan_soyad=$_SESSION["uye_soyad"];
				$geyik_yapan_id=$_SESSION["uye_id"];
				$ekledigi_tarih=date('d.m.Y');
				$ekledigi_saat=date('H:i');
				$isim = $_FILES["geyik_foto"]["name"];
				$tur =  pathinfo($isim, PATHINFO_EXTENSION);
				$sadeIsim = basename($isim, ".$tur");
				$sadeIsim=isimDuzelt($sadeIsim).'-'.rand(1,1000);
				$isim=$sadeIsim.'.'.$tur;  
				if($tur=="png" || $tur=="jpg" || $tur=="gif")
				{
			move_uploaded_file($_FILES["geyik_foto"]["tmp_name"],"../vendor/img/geyik/".$isim);
				$ekle=$baglan->exec("INSERT INTO geyikler (geyik_yapan_id,geyik_yapan_ad,geyik_yapan_soyad,geyik,geyik_foto,geyik_tarih,geyik_saat,geyik_like,geyik_dislike) VALUES ('$geyik_yapan_id','$geyik_yapan_ad','$geyik_yapan_soyad',
				'$geyik','$isim','$ekledigi_tarih','$ekledigi_saat',0,0)");
						if($ekle)
					{
					echo '<script> alert("Başarıyla Durumunuz Eklendi")</script>';
					header("Refresh:1");
					}
				
				else
				{
					echo '<script> alert("RESİM FORMATINIZ "JPG","PNG" VEYA "GIF" Olmalıdır")</script>';
					
				}
		
				
			}
	}
	
	?>
	
	<script>
		function yorum_kaydet(geyik_id)
		{
			
			var yorum=document.getElementById("exampleInputEmail1").val;
			$.ajax({
				 
				url: "http://localhost:8080/mate4game_guncel/part2/inc/yorum_kaydet.php", //verileri göndereceğimiz url
				type: "POST", //post ile gönderilecek
				data:'yorum='+yorum+ '&geyik_id='+geyik_id,
				// verileri alan deger ve id olarak yolluyoruz
				success: function (data) {
					if (data == true) {
						//alert("Başarılız");
					}

					else {
						//alert("Hata");
					   
					}
				}
				
			});
			
		}
	
	
	
	</script>
	