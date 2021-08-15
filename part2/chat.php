<?php 
	include("../ayar/baglan.php");
	include("../ayar/fonksiyon.php");
	$alici_id=$_GET["id"]; //alici idsi
	$_SESSION["alici_id"]=$alici_id; //mesaj-guncelle.php için
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
    
	<input type="text" name="gonder_id" id="gonderen_id" style="display:none" value="<?php echo $gonderen_id ?>">
	<input type="text" name="alici_id" id= "alici_id" style="display:none" value="<?php echo $alici_id ?>">
    <br><br><br><br>

    <div class="container">

         <div class="card bg-light">
            <div class="card-header"><h3><?php echo $bilgi["uye_ad"] . " " .$bilgi["uye_soyad"] ?></h3></div>
            <div class="card-body">
              
               <div class="chat">

			   
               <div  class="chat-icerik">
				<div id="chat-icerik" class="chatt" style="height:400px;  overflow-x: hidden; overflow-y: auto;">

 
				<?php
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
                   
      
				</div>

                 </div>

                 <div class="chat-input">
                  
                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <input onKeyPress="kaydet()" onclick="bildirim_oku()" id="mesaj" style="border:1px solid rgba(0,0,0,.1)" type="text" class="form-control border-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mesajınızı girin...">
                        </div>
                        <div class="col-md-2">
                          <!-- <button onclick="kaydet()" type="button" class="btn btn-primary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>-->
                           <button  type="button" class="btn btn-primary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    </div>
                  
                 </div>

               </div> <!--chat-->

            </div>
          </div>

    </div>
  

    <script src="<?php echo $url ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $url ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

  </body>

</html>
<script>
			
		function bildirim_oku(){
		var ozel_id=document.getElementById("ozel_id").value;
		$.ajax({
				 
				url: "http://localhost/mate4game/part2/inc/bildirim_oku.php", //verileri göndereceğimiz url
				type: "POST", //post ile gönderilecek
				data:'ozel_id='+ozel_id,
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
	setInterval(function() {
			$.ajax({
			 
            url: "http://localhost/mate4game/part2/inc/bildirim_oku.php",
            type: "POST", 
            data: 'okundu=' + 1,
          
            
        });}, 500);







		function kaydet(){
			if(window.event.keyCode==13)
			{
			var gonderen_id = document.getElementById("gonderen_id").value;
			var alici_id = document.getElementById("alici_id").value;
			var mesaj = document.getElementById("mesaj").value;
			
			 $.ajax({
			 
            url: "http://localhost/mate4game/part2/inc/mesaj-kaydet.php", //verileri göndereceğimiz url
            type: "POST", //post ile gönderilecek
            data: 'gonderen_id=' + gonderen_id + '&alici_id=' + alici_id + '&mesaj='+mesaj,
            // verileri alan deger ve id olarak yolluyoruz
            success: function (data) {
                if (data == true) {
					document.getElementById("mesaj").value=" ";
                    //$(deger).css("background", "#fff");
					//alert("başarılı");
                    // eğer veriler veri tabanına yazılmış ise hücrenin
                    //arka plan rengini beyaza geri döndürüyoruz
							/*	$(document).ready(function() {
						//var gonderen_id = document.getElementById("gonderen_id").value;
						var alici_id = document.getElementById("alici_id").value;
						
						$.ajax({
						 
						url: "mesaj-guncelle.php", //verileri göndereceğimiz url
						type: "GET", //post ile gönderilecek
						data: 'alici_id=' + alici_id,
						// verileri alan deger ve id olarak yolluyoruz
						success: function (data) {
							if (data == true) {
								//$(deger).css("background", "#fff");
								//alert("başarılı");
								// eğer veriler veri tabanına yazılmış ise hücrenin
								//arka plan rengini beyaza geri döndürüyoruz
								
							}

							else {
								//$(deger).css("background", "#f00");
								//$("#sonuc").text("Hata veri düzenlenmedi");
								//alert("başarısız");

								//Eğer hata varsa hücre rengini kırmızı ve
								// tablo altında hata mesajı yazdırıyoruz
									}
            }
        });
			
        $("#chat").load("mesaj-guncelle.php");

});*/
					document.getElementById("mesaj").value=" ";
                }

                else {
                    //$(deger).css("background", "#f00");
                    //$("#sonuc").text("Hata veri düzenlenmedi");
					//alert("başarısız");

                    //Eğer hata varsa hücre rengini kırmızı ve
                    // tablo altında hata mesajı yazdırıyoruz
                }
            }
			
        });
		}
		}
$(document).ready(function() {
		
				
		$("#chat-icerik").scrollTop($("#chat-icerik")[0].scrollHeight);

        $("#chat-icerik").load("http://localhost/mate4game/part2/mesaj-guncelle.php");

});
setInterval(function() {$("#chat-icerik").load('http://localhost/mate4game/part2/mesaj-guncelle.php');}, 1500);


</script>
          