<?php
$uye_id=$_SESSION["uye_id"];

$query=$baglan->query("SELECT * FROM uyeler WHERE uye_id='$uye_id'");
$bilgi=$query->fetchObject();

$sorgu=$baglan->query("SELECT * FROM durumlar WHERE durum_uye_id='$uye_id' ORDER BY durum_id DESC");

?>
    <br><br><br><br>

    <div class="container">

         <div class="card bg-light">
            <div class="card-header"><h3>Mesajlar</h3></div>
            <div class="card-body">
              
              <div class="row">

                <div class="col-md-3">
                  <div class="profil-sol">
                    <center><?php echo  '<img style="height:175px; width:175px;" src="../images/'.$bilgi->uye_profil.'" alt="User profile picture">'?></center>
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
                
                <div class="col-md-9">

                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gönderilen Mesajlar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alınan Mesajlar</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<h6 style="color:Red; margin-top:15px;">Gönderilen Son 10 Mesaj Gösterilir.</h6>
                     <!--
                      <div class="profil-durum">
                        <h5>Kime : Ad Soyad</h5>
                        <p>Mesaj : Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer>01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Kime : Ad Soyad</h5>
                        <p>Mesaj : Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer>01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Kime : Ad Soyad</h5>
                        <p>Mesaj : Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer>01.02.2018</footer>
                      </div>

                      <div class="profil-durum">
                        <h5>Kime : Ad Soyad</h5>
                        <p>Mesaj : Lolde ADC main bir arkadaş lazım var mı gelicek ?</p>
                        <footer>01.02.2018</footer>
                      </div>

                      -->
					  <?php 
					
						$a=0;
						$idler=array();
						$idler2=array();
						$sorgu=$baglan->query("SELECT * FROM mesajlar WHERE gonderen_id=$uye_id ORDER BY mesaj_id DESC",PDO::FETCH_ASSOC);
						foreach($sorgu as $bilgi)
						{
							array_push($idler,$bilgi["alici_id"]);
						}
						$uzunluk=count($idler);
						$a=0;
						for($i=0;$i<$uzunluk;$i++)
						{
							
							for($j=0;$j<$i;$j++)
							{
								if($idler[$i]==$idler[$j])
								{
									$a=1;
								}
							}
							if($a==0)
							{
								array_push($idler2,$idler[$i]);
							}
							$a=0;
							
							
						}
						
						for($i=0;$i<count($idler2);$i++)
						{
							if($i<10)
							{
								$id=$idler2[$i];//alıcı id'lerini aldık
								$sql=$baglan->query("SELECT * FROM mesajlar WHERE alici_id=$id AND gonderen_id=$uye_id ORDER BY mesaj_id DESC");
								$sql1=$sql->fetchObject();
								$sorgu2=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$id");
								$sql2=$sorgu2->fetchObject();
								echo ' <div class="profil-durum">
									<h5>Kime : '.$sql2->uye_ad .' '. $sql2->uye_soyad.'</h5>
									<p>Mesaj : '.$sql1->mesaj.'</p>
									<footer>'.$sql1->mesaj_tarih.'</footer>
									<footer><div class="row">
										<div class="col">
										  <a href="#" onclick="mesaj('.$id.','.$_SESSION["uye_id"].')" class="btn btn-outline-primary btn-sm btn-block">Mesaj Yaz</a>
										</div></footer>
								  </div>';
								
							}
						}
						
					
					  ?>

                    </div>


                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      
                     <!--<div class="profil-durum">
                        <h5>Kimden : Ad Soyad</h5>
                        <p>Mesaj : Lolde ADC main bir arkadaş lazım var mı gelicek ?</p><br>
                        <footer>
                          <p>01.02.2018</p>
                          <div class="row">
                            <div class="col">
                              <a href="chat.html" class="btn btn-outline-primary btn-sm btn-block">Cevapla</a>
                            </div>
                            <div class="col">
                              <a href="#" class="btn btn-outline-danger btn-sm btn-block">Bildir</a>
                            </div>
                          </div>
                        </footer>
                      </div>-->
					  <?php 
						$a=0;
						$idler=array();
						$idler2=array();
						$sorgu=$baglan->query("SELECT * FROM mesajlar WHERE alici_id=$uye_id AND mesaj_okundu=0 ORDER BY mesaj_id DESC",PDO::FETCH_ASSOC);
						foreach($sorgu as $bilgi)
						{
							array_push($idler,$bilgi["gonderen_id"]);
						}
						$uzunluk=count($idler);
						$a=0;
						for($i=0;$i<$uzunluk;$i++)
						{
							
							for($j=0;$j<$i;$j++)
							{
								if($idler[$i]==$idler[$j])
								{
									$a=1;
								}
							}
							if($a==0)
							{
								array_push($idler2,$idler[$i]);
							}
							$a=0;
							
							
						}
						
						for($i=0;$i<count($idler2);$i++)
						{
								$id=$idler2[$i];//gonderenin id'lerini aldık
								$sql=$baglan->query("SELECT * FROM mesajlar WHERE gonderen_id=$id AND alici_id=$uye_id ORDER BY mesaj_id DESC");
								$sql1=$sql->fetchObject();
								$sorgu2=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$id");
								$sql2=$sorgu2->fetchObject();
												echo ' <div class="profil-durum">
										<h5>Kimden :'.$sql2->uye_ad.' '.$sql2->uye_soyad.'</h5>
										<p>Mesaj : '.$sql1->mesaj.'</p><br>
										<footer>
										  <p>'.$sql1->mesaj_tarih.'</p>
										  <div class="row">
											<div class="col">
											  <a href="#" onclick="mesaj('.$id.','.$_SESSION["uye_id"].')" class="btn btn-outline-primary btn-sm btn-block">Cevapla</a>
											</div>
											<div class="col">
											  <a href="inc/mesaj_sil.php?id='.$sql1->gonderen_id.'" class="btn btn-outline-danger btn-sm btn-block">Sil</a>
											</div>
										  </div>
										</footer>
									  </div>';
									 echo '<input id="ozel_id" style="display:none;" type="text" name="ozel_id" value="'.$sql1->ozel_id.'">';
								
							
							
						}
						
					  ?>

                    </div>


                  </div>

                </div>

              </div>

            </div>
          </div>

    </div>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script>
	function mesaj(id3,id4){
		if(id3==id4)
		{
			alert("Şizofren misin?");
		}
		else{
			//window.open("chat.php?id="+id3,"","width=600,height=1000");
			window.open("http://localhost/mate4game/anasayfa/mesaj/"+id3,"","width=600,height=1000");
		}
	}
	
	</script>

   