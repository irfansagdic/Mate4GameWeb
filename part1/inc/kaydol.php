

    <br><br><br><br><br><br><br><br>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
          
            

          <div class="card text-white bg-dark form">
            <div class="card-header"><h3>Kayıt Ol</h3></div>
            <div class="card-body">
              <p class="card-text">Haydi sende aramıza katıl.</p>
              <form action="" method="post">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ad</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border-none" name="ad" id="inputEmail3" placeholder="Adınız.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Soyad</label>
                  <div class="col-sm-10">
                    <input type="text" name="soyad" class="form-control border-none" id="inputEmail3" placeholder="Soyadınız.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control border-none" id="inputEmail3" placeholder="Eposta adresinizi girin.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Şifre</label>
                  <div class="col-sm-10">
                    <input type="password" name="sifre" class="form-control border-none" id="inputPassword3" placeholder="Şifrenizi belirleyin.">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block border-none">Kayıt Ol</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          

        

        </div>

        <div class="col-md-2"></div>
      </div>
    </div>
  
<?php 
	require("class.phpmailer.php");
	if($_POST)
	{
		$ad=$_POST["ad"];
		$soyad=$_POST["soyad"];
		$email=$_POST["email"];
		$sifre=$_POST["sifre"];
		$date=date('d.m.Y');
		$hata=0;
			//EMAİL KONTROL
			$email_kontrol= $baglan->query("SELECT * FROM uyeler",PDO::FETCH_ASSOC);
			foreach($email_kontrol as $kontrol)
			{
				if($kontrol["uye_email"] == $email)
				{
					echo "<script type='text/javascript'>alert('Bu Email ile daha önce üye olmuşsunuz');</script>";
					$hata=1;
				}
			}
			//EMAİL KONTROL
	
			if($hata==0){
					$sql=$baglan -> exec("INSERT INTO uyeler (uye_ad,uye_soyad,uye_email,uye_sifre,uye_tarih,uye_profil,email_dogrulama) VALUES ('$ad','$soyad','$email','$sifre','$date','No-Avatar.png',0)");
					
					if($sql)
					{
						$sorgu=$baglan->query("SELECT * FROM uyeler WHERE uye_email='$email'");
						$sonuc=$sorgu->fetch();
						$id=$sonuc["uye_id"];
						$link="http://mate4game.com";
						echo "<script type='text/javascript'>alert('Email Adresinize Aktivasyon Kodunu Gönderdik.');</script>";
						$mail = new PHPMailer();
						$mail->IsSMTP();
						$mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
						$mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
						//$mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
						$mail->Host = "mail.mate4game.com"; // Mail sunucusunun adresi (IP de olabilir)
						$mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
						$mail->IsHTML(true);
						$mail->SetLanguage("tr", "phpmailer/language");
						$mail->CharSet  ="utf-8";
						$mail->Username = "info@mate4game.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
						$mail->Password = "iRfAaeQQ(%SB"; // Mail adresimizin sifresi
						$mail->SetFrom("info@mate4game.com", "Mate4Game Hoşgeldin"." ".$ad." ".$soyad); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
						$mail->AddAddress($email); // Mailin gönderileceği alıcı adres
						$mail->Subject = "Mate4Game Hoşgeldin"." ".$ad." "."$soyad"; // Email konu başlığı
						$mail->Body = 'Hesabınızı Aktive Etmek için Tıklayın :<a href="'.$link.'/part2/dogrula.php?id='.$id.'">Hesabımı Aktive Et</a><br> 
						Kullanıcı Adınız : '.$email .' <br> Şifreniz : '.$sifre.' <br> Özel Bilgilerinizi Kimseyle Paylaşmayın.
						'; // Mailin içeriği
						if(!$mail->Send()){
							echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
						} else {
							//echo "Email Gonderildi";
						}
												
					}
					else{
						echo "Hata";	
					}
			}
	}
?>
