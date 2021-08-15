<?php 
include("../ayar/baglan.php");
	include("../ayar/fonksiyon.php");
	//$alici_id=$_GET["id"]; //alici idsi
	//$_SESSION["alici_id"]=$alici_id; //mesaj-guncelle.php için
	$alici_id=$_SESSION["alici_id"];
	$gonderen_id=$_SESSION["uye_id"];//girernin id si
	$query=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$alici_id"); //alicnini bilgileri
	$bilgi=$query->fetch(); //alicinin bilgilerini böldük
	$query1=$baglan->query("SELECT * FROM uyeler WHERE uye_id=$gonderen_id"); //alicnini bilgileri
	$bilgi1=$query1->fetch(); //alicinin bilgilerini böldük
	//$sorgu="SELECT * FROM mesajlar WHERE alici_id=$alici_id && gonderen_id=$gonderen_id";
	//$yazdir=$baglan->query($sorgu);
	$sorgu1 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE gonderen_id=$gonderen_id && alici_id=$alici_id");
	$sorgu1->execute();
	$uzunluk1 = $sorgu1->fetchColumn();
	$sorgu2 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE gonderen_id=$alici_id && alici_id=$gonderen_id");
	$sorgu2->execute();
	$uzunluk2 = $sorgu2->fetchColumn();
	if($uzunluk1 ==0 && $uzunluk2==0)
						{
								echo "<b>Konuşmayı Başlatın</b>";
						}
						else{
							if($uzunluk1 >0 && $uzunluk2==0)
								{
									$sql=$baglan->query("SELECT * FROM mesajlar WHERE alici_id =$alici_id AND gonderen_id=$gonderen_id");
									$sonuc=$sql->fetch();
									
									$ozel_id=$sonuc["ozel_id"];
									
									
									$mesaj_sql=$baglan->query("SELECT * FROM mesajlar WHERE ozel_id ='$ozel_id'",PDO::FETCH_ASSOC);
									//$mesaj_sonuc=$mesaj_sql->fetch();
									foreach($mesaj_sql as $yaz)
									{
										$a=0;
										
										//echo $yaz["mesaj"]."<br>";
										
										if($_SESSION["uye_id"] == $yaz["gonderen_id"] && $a==0 )
										{
											echo ' <div class="row">
													<div class="col-md-12">
													   <div class="sag-mesaj">
														 <div class="sag-mesaj-profil">
														   <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi1["uye_profil"].'">
														 </div>
														 <div class="sag-mesaj-icerik">
														   <p>'.$yaz["mesaj"].' <br> <small>'.$yaz["mesaj_saat"].'</small></p>
														 </div>
													   </div>
													</div>
												   </div>';
											$a++;
											//echo "gonderene girild";
										}
										/*echo $_SESSION["alici_id"];
										echo $yaz["gonderen_id"];
										echo $a;*/
										if($_SESSION["alici_id"] == $yaz["gonderen_id"] && $a==0){
											echo "Diğere girdi";
											echo ' <div class="row">
												<div class="col-md-12">
												   <div class="sol-mesaj">
													 <div class="sol-mesaj-profil">
													 <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi["uye_profil"].'">
													 </div>
													 <div class="sol-mesaj-icerik">
													   <p>'.$yaz["mesaj"].' <br> <small>'.$yaz["mesaj_saat"].'</small></p>
													 </div>
												   </div>
												</div>
											   </div>';
											$a++;
											
										}
										
									}
									
								}
									else if($uzunluk1==0 && $uzunluk2>0)
								{
									$sql=$baglan->query("SELECT * FROM mesajlar WHERE alici_id =$alici_id AND gonderen_id=$gonderen_id");
									$sonuc=$sql->fetch();
									
									$ozel_id=$sonuc["ozel_id"];
									
									
									$mesaj_sql=$baglan->query("SELECT * FROM mesajlar WHERE ozel_id ='$ozel_id'",PDO::FETCH_ASSOC);
									//$mesaj_sonuc=$mesaj_sql->fetch();
									foreach($mesaj_sql as $yaz)
									{
										$a=0;
										
										//echo $yaz["mesaj"]."<br>";
										
										if($_SESSION["uye_id"] == $yaz["gonderen_id"] && $a==0 )
										{
											echo ' <div class="row">
													<div class="col-md-12">
													   <div class="sag-mesaj">
														 <div class="sag-mesaj-profil">
														  <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi1["uye_profil"].'">
														 </div>
														 <div class="sag-mesaj-icerik">
														   <p>'.$yaz["mesaj"].' <br> <small>'.$yaz["mesaj_saat"].'</small></p>
														 </div>
													   </div>
													</div>
												   </div>';
											$a++;
											//echo "gonderene girild";
										}
										/*echo $_SESSION["alici_id"];
										echo $yaz["gonderen_id"];
										echo $a;*/
										if($_SESSION["alici_id"] == $yaz["gonderen_id"] && $a==0){
											
											echo ' <div class="row">
												<div class="col-md-12">
												   <div class="sol-mesaj">
													 <div class="sol-mesaj-profil">
													   <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi["uye_profil"].'">
													 </div>
													 <div class="sol-mesaj-icerik">
													   <p>'.$yaz["mesaj"].'<br> <small>'.$yaz["mesaj_saat"].'</small></p>
													 </div>
												   </div>
												</div>
											   </div>';
											$a++;
											
										}
										
									}
									
								}
									else if($uzunluk1 >0 && $uzunluk2>0)
								{
									$sql=$baglan->query("SELECT * FROM mesajlar WHERE alici_id =$alici_id AND gonderen_id=$gonderen_id");
									$sonuc=$sql->fetch();
									
									$ozel_id=$sonuc["ozel_id"];
									
									
									$mesaj_sql=$baglan->query("SELECT * FROM mesajlar WHERE ozel_id ='$ozel_id'",PDO::FETCH_ASSOC);
									//$mesaj_sonuc=$mesaj_sql->fetch();
									foreach($mesaj_sql as $yaz)
									{
										$a=0;
										
										//echo $yaz["mesaj"]."<br>";
										
										if($_SESSION["uye_id"] == $yaz["gonderen_id"] && $a==0 )
										{
											echo ' <div class="row">
													<div class="col-md-12">
													   <div class="sag-mesaj">
														 <div class="sag-mesaj-profil">
														  <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi1["uye_profil"].'">
														 </div>
														 <div class="sag-mesaj-icerik">
														   <p>'.$yaz["mesaj"].' <br> <small>'.$yaz["mesaj_saat"].'</small></p>
														 </div>
													   </div>
													</div>
												   </div>';
											$a++;
											//echo "gonderene girild";
										}
										/*echo $_SESSION["alici_id"];
										echo $yaz["gonderen_id"];
										echo $a;*/
										if($_SESSION["alici_id"] == $yaz["gonderen_id"] && $a==0){
										
											echo ' <div class="row">
												<div class="col-md-12">
												   <div class="sol-mesaj">
													 <div class="sol-mesaj-profil">
													   <img style="width:50px; height:50px;" src="'.$url.'/images/'.$bilgi["uye_profil"].'">
													 </div>
													 <div class="sol-mesaj-icerik">
													   <p>'.$yaz["mesaj"].'<br> <small>'.$yaz["mesaj_saat"].'</small></p>
													 </div>
												   </div>
												</div>
											   </div>';
											$a++;
											
										}
										
									}
									
								}
							echo '<input style="display:none;" id="ozel_id" type="text" value="'.$ozel_id.'">';	
						}
						
	
?>