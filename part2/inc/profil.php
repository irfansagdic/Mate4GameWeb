<?php
$uye_id=$_GET["id"];

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
                    <center><?php echo  '<img style="height:175px; width:175px;" src="../images/'.$bilgi->uye_profil.'" alt="User profile picture">'?></center>
                    <center><h3><?php echo $bilgi->uye_ad.' '.$bilgi->uye_soyad ?></h3></center>
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
                
                <div class="col-md-9">

                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Paylaşılan Durumlar</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                      <!--<div class="profil-durum">
                        <h5>Ad Soyad</h5>
                        <p>Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer class="blockquote-footer">01.02.2018</footer>
                      </div> 
                      
                      <div class="profil-durum">
                        <h5>Ad Soyad</h5>
                        <p>Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer class="blockquote-footer">01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Ad Soyad</h5>
                        <p>Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer class="blockquote-footer">01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Ad Soyad</h5>
                        <p>Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer class="blockquote-footer">01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Ad Soyad</h5>
                        <p>Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer class="blockquote-footer">01.02.2018</footer>
                      </div>-->
					    <?php
                foreach($sorgu as $durumlar)
                {
                ?>
						<div class="profil-durum">
                        <h5><?php echo $durumlar["durum_uye_ad"].' '.$durumlar["durum_uye_soyad"]; ?></h5>
                        <p><?php echo $durumlar["durum"] ?></p>
                    
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block border-none">Profilimi Güncelle</button>
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
		if($_POST)
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
                header("Refresh:0.5;url=index.php?do=profil");
                
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
  
