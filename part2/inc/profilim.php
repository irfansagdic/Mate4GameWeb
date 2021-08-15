<?php
$uye_id=$_SESSION["uye_id"];

$query=$baglan->query("SELECT * FROM uyeler WHERE uye_id='$uye_id'");
$bilgi=$query->fetchObject();

$sorgu=$baglan->query("SELECT * FROM durumlar WHERE durum_uye_id='$uye_id' ORDER BY durum_id DESC");

?>
	
    <br><br><br><br>

    <div class="container">
         <div class="card bg-light">
            <div class="card-header"><h3>Profilim</h3></div>
            <div class="card-body">
              
              <div class="row">

                <div class="col-md-3">
                  <div class="profil-sol">
                    <center><?php echo  '<img style="height:175px; width:175px;" src="'.$url.'/images/'.$bilgi->uye_profil.'" alt="User profile picture">'?></center>
                    <center><h3><?php echo $_SESSION["uye_ad"].' '.$_SESSION["uye_soyad"] ?></h3></center>
                    <hr>
                    <div class="padding">
                      <h5>Hakkında</h5>
                      <p><?php echo $bilgi->uye_hakkimda ?></p>
                    </div>
                   <!-- <hr>
                    <div class="padding">
                      <h5>Oynadığı Oyunlar</h5>
                      <p>-League of Legends</p>
                      <p>-Counter Strike Global Offensive</p>
                      <p>-Metin2</p>
                    </div>-->
                  </div>
                </div>
             <!--   <div class="modal fade text-dark" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" style="color:#000">Mate4Geyik Durum Düzenle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
				  <?php /*
				  $durumm=$_SESSION["durumm"];
					$sorgu2=$baglan->query("SELECT * FROM durumlar WHERE durum_id='$durumm'");
						$bilgi2=$sorgu2->fetchObject();
					*/	
				  ?>
                    
                      <div class="form-group">
                        <textarea name="" class="form-control" id="areaId" cols="10" rows="10" placeholder=""><?php echo $bilgi2->durum ?></textarea>
                      </div>
                   
                      <button type="button" onclick="durum_duzenle(<?php /*echo $durummm*/ ?>)" class="btn btn-primary" style="float: left">Kaydet</button>
							
                  </div>
                </div>
              </div>
            </div>
				!-->
				
				
				
				
                <div class="col-md-9">

                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Paylaşılan Durumlar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profili Düzenle</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					
                      
					    <?php
                foreach($sorgu as $durumlar)
                {
					
				
                ?>
				 
						<div class="profil-durum">
						
						<input style="float:right;background:transparent;" class="btn btn-default" type="button" value="..." onclick="toggleText(<?php echo $durumlar["durum_id"] ?>)"> 
                        <h5><?php echo $durumlar["durum_uye_ad"].' '.$durumlar["durum_uye_soyad"]; ?></h5>
                     <p id="p_id<?php echo $durumlar["durum_id"] ?>"><?php echo $durumlar["durum"] ?></p>
					
					 <textarea style="display: none" name="durum" class="form-control" id="areaId<?php echo $durumlar["durum_id"] ?>" cols="5" rows="5" placeholder=""><?php echo $durumlar["durum"] ?></textarea>
					
					 
					<div class="row">
                        <footer  style="margin-left:15px;margin-top:10px;"><a href="<?php echo $url?>/part2/inc/durum_sil.php?id=<?php echo $durumlar["durum_id"] ?>"><button type="submit" class="btn btn-danger"> Durumu Sil </button></a></footer>
						    
					<div style="display:none;" class="goster_gizle<?php echo $durumlar["durum_id"]?>">	<footer style="margin-left:15px;margin-top:10px;"><button style="display:hidden" type="button" id="comando<?php echo $durumlar["durum_id"] ?>" onclick="durum_duzenle(<?php  echo $durumlar["durum_id"] ?>)" class="btn btn-success">Düzenle / Kaydet</button></footer></div>
						
					

						</div>
                      </div> 
				<?php 
				}?>


                    </div>


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      
                      <form action="" method="post" style="margin-top:10px" enctype="multipart/form-data">

                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Ad</label>
                          <div class="col-sm-9">
                            <input type="text" name="ad" value="<?php  echo $bilgi->uye_ad ?>" class="form-control border-none" id="inputEmail3" placeholder="Adınız.">
                          </div>
                        </div>


                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Soyad</label>
                          <div class="col-sm-9">
                            <input type="text" name="soyad" value="<?php echo  $bilgi ->uye_soyad ?>" class="form-control border-none" id="inputEmail3" placeholder="Soyadınız.">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Şifre</label>
                          <div class="col-sm-9">
                            <input type="password" name="sifre"  value="<?php echo $bilgi -> uye_sifre ?>" class="form-control border-none" id="inputPassword3" placeholder="Şifreniz.">
                          </div>
                        </div>
						 <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Şifre Onayla</label>
                          <div class="col-sm-9">
                            <input type="password" name="tekrarsifre"  value="<?php echo $bilgi -> uye_sifre ?>" class="form-control border-none" id="inputPassword3" placeholder="Şifreniz.">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Hakkımda</label>
                          <div class="col-sm-9">
                            <textarea name="hakkimda" value="" id=""  cols="30" rows="7" class="form-control border-none"><?php echo $bilgi->uye_hakkimda ?></textarea>
                          </div>
                        </div>
                        
                        <!--<div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Oynadığım Oyunlar (Seçim yapmak için 'CTRL' tuşuna basılı tutun.)</label>
                          <div class="col-sm-9">
                              <select multiple class="form-control" id="exampleFormControlSelect2">
                                <option>League of Legends</option>
                                <option>Counter Strike Global Offensive</option>
                                <option>Metin2</option>
                                <option>Zula</option>
                                <option>Point Blank</option>
                              </select>
                          </div>
                        </div>-->
                      
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label">Resim</label>
                          <div class="col-sm-9" required>
                            <div style="border:1px dashed rgba(0,0,0,.3)">
                              <input name="resim" type="file">
                            </div>
                          </div>
                        </div>


                        
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" name="profil" class="btn btn-primary btn-lg btn-block border-none">Profilimi Güncelle</button>
                          </div>
                        </div>
                      </form>

                    </div>


                  </div>

                </div>

              </div>

            </div>
          </div>

    </div>
	<?php 
		if(isset($_POST["profil"]))
		{
			  if(@$_FILES["resim"]["name"] != "")
            {
            $isim = $_FILES["resim"]["name"];
                $tur =  pathinfo($isim, PATHINFO_EXTENSION);
                $sadeIsim = basename($isim, ".$tur");
                $sadeIsim=isimDuzelt($sadeIsim).'-'.rand(1,1000);
                $isim=$sadeIsim.'.'.$tur;       
                if(file_exists("../images/".$isim)){
                    echo 'Bu dosya daha önceden yüklenmiş.';
                }else{
                    move_uploaded_file($_FILES["resim"]["tmp_name"],"../images/".$isim);
                    $sql=("UPDATE uyeler SET uye_profil='$isim' WHERE uye_id=$uye_id" );
                    $update=$baglan ->query($sql);
                    if($update)
                    {
                      /*  echo "Resim Başarıyla Güncellendi";
                        header("Refresh:1;url=index.php?do=profil");*/
                    }
                    
                }
            }
        $ad=$_POST["ad"];
        $soyad=$_POST["soyad"];
		$hakkimda=$_POST["hakkimda"];
        $sifre=$_POST["sifre"];
        $tekrarsifre=$_POST["tekrarsifre"];
        if($tekrarsifre == $sifre)
        {
            $sql=("UPDATE uyeler SET uye_ad='$ad', uye_soyad='$soyad' , uye_sifre='$sifre' , uye_hakkimda='$hakkimda' WHERE uye_id=$uye_id" );
            $sorgu=("UPDATE durumlar SET durum_uye_ad='$ad', durum_uye_soyad='$soyad' WHERE durum_uye_id=$uye_id" );
            $update=$baglan ->query($sql);
            $guncelle=$baglan->query($sorgu);
            if($update)
            {
                echo "Bilgileriniz Başarıyla Güncellendi";      
                unset($_SESSION["giris"]);
                unset($_SESSION["uye_id"]);
                unset($_SESSION["uye_tarih"]);
                unset($_SESSION["uye_kadi"]);
                unset($_SESSION["uye_email"]);
                unset($_SESSION["uye_soyad"]);         
                session_destroy();
                ob_start();
                session_start();
                $a=$uye_id;
                $_SESSION["giris"]="ok";
                $_SESSION["uye_id"]=$a;
                $sql=$baglan->prepare("SELECT * FROM uyeler WHERE uye_id=? ");//SESSİIONLARI TEKRAR YAZMAK İÇİN BU SORGUYU YAZDIK 3.12.2017 15.49
                $sql->execute(array($a));
                $dizi=$sql->fetch();
                $_SESSION["uye_ad"]=$dizi["uye_ad"];
                $_SESSION["uye_soyad"] = $dizi["uye_soyad"];
                //$_SESSION["uye_tarih"] = $dizi["uye_tarih"];
                $_SESSION["uye_email"]=$dizi["uye_email"];
                header("Refresh:0.5;url=$url/anasayfa/profilim");               
            }
            else{
                echo "Hata";
				}
        }
        else{
            
            echo "Şifrelerinizi Aynı Girdiğinizden Emin Olunuz";
        }
	}
	?>
  
<script>
	function durum_duzenle(durum_id)
	{
		
		var durum=document.getElementById("areaId"+durum_id).value;
		
		$.ajax({
			url:"http://localhost:8080/mate4game_guncel/part2/inc/durum_duzenle.php",
			type:"POST",
			data:'durum_id='+durum_id+'&durum='+durum,
			success:function(data)
			{
				if (data == true) {
					window.alert("Durumunuz Başarıyla Güncellendi.");
						document.getElementById("areaId"+durum_id).value=durum;
						document.getElementById("#p_id"+durum_id).value=durum;
						setInterval(function() {$("#durum_guncelle"+durum_id).load('http://localhost:8080/mate4game_guncel/part2/inc/durum_duzenle.php');}, 1500);
					}

					else {
						alert("Hata");   
					}
			}	
		});
	}
	
	function toggleText(durum_id) {
    var durum_duz=("areaId"+durum_id).value;
     $("#areaId"+durum_id).toggle(500);
	$( "#p_id"+durum_id ).toggle(500);
	$(".goster_gizle"+durum_id).toggle(500);
   }
   
	/*function durumId(durum_id)
	{
			$.ajax({
			url:"http://localhost:8080/mate4game_guncel/part2/inc/durum_getir.php",
			type:"POST",
			data:'durum_id='+durum_id,
			success:function(data)
			{
				if (data == true) {
						alert(durum_id);
					}

					else {
						alert("Hata");   
					}
			}	
		});
	}*/
	</script>