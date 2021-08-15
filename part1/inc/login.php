
    <br><br><br><br><br><br><br><br>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
          
            

          <div class="card text-white bg-dark form">
            <div class="card-header"><h3>Üye Girişi</h3></div>
            <div class="card-body">
              <p class="card-text">Oyun arkadaşınızı bulmaya hazır mısınız?</p>
              <form action="" method="post">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email adresinizi giriniz..." style="border:0px">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Şifre</label>
                  <div class="col-sm-10">
                    <input type="password"  name="sifre" class="form-control" id="inputPassword3" placeholder="Şifrenizi giriniz..." style="border:0px">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="border:0px">Giriş Yap</button>
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
	if($_POST)
	{
		$kadi=guvenlik($_POST["email"]);
			$sifre=guvenlik($_POST["sifre"]);
			$sql=$baglan->prepare("SELECT * FROM uyeler WHERE uye_email=? AND uye_sifre=?");
			$sql->execute(array($kadi,$sifre));
				$dizi=$sql->fetch();
			if($dizi)
			{
				if($dizi["email_dogrulama"]==0)
				{
					echo '<script>alert("Lütfen email adresinizi doğrulayın");</script>';
				}
				else if($dizi["email_dogrulama"]==1)
				{
					echo '<script>alert("Giriş Başarılı");</script>';
					$_SESSION["giris"]="ok";
					$_SESSION["uye_id"]=$dizi["uye_id"];
					$_SESSION["uye_ad"]=$dizi["uye_ad"];
					$_SESSION["uye_soyad"] = $dizi["uye_soyad"];
					$_SESSION["uye_tarih"] = $dizi["uye_tarih"];
					$_SESSION["uye_email"]=$dizi["uye_email"];
					header("Refresh:1;url=$url/anasayfa");

						
					
				
				}
			          else 
					{
						echo '<script>alert("Kullanıcı Adı veya Şifre Yanlış");</script>';
						
							
				
					
					}
			}
		
			

	
	}
?>

   
