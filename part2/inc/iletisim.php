

    <br><br><br><br>

    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
          
            

          <div class="card text-white bg-dark form">
            <div class="card-header"><h3>Bize Ulaşın</h3></div>
            <div class="card-body">
              <p class="card-text">Size hakaret,küfür,kötü söz söyleyen veya paylaştığı durumlarda aynı davranışları gösteren kişileri buradan bize iletebilirsiniz.Ayrıca durum paylaşırken seçmek istediğiniz oyunları bize buradan iletebilirsiniz.Görüş ve önerileriniz de bizim için önemlidir.</p>
              <form action="" method="post">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Ad</label>
                  <div class="col-sm-10">
                    <input type="text" name="uye_ad" value="<?php echo $_SESSION["uye_ad"] ?>" class="form-control border-none" id="inputEmail3" placeholder="Adınız...">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Soyad</label>
                  <div class="col-sm-10">
                    <input type="text" name="uye_soyad"  value="<?php echo $_SESSION["uye_soyad"] ?>" class="form-control border-none" id="inputPassword3" placeholder="Soyadınız...">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Mesajınız</label>
                  <div class="col-sm-10">
                    <textarea name="textarea" class="form-control border-none" id="" cols="30" rows="7" placeholder="Mesajınız..."></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block border-none">Mesajı Uçur</button>
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
			 $uye_id=$_SESSION["uye_id"];
			$uye_ad=$_POST["uye_ad"];
	
			$uye_soyad=$_POST["uye_soyad"];
	 
			$textarea=$_POST["textarea"];
						 $inster=$baglan -> exec("INSERT INTO bize_ulasin (ulasin_uye_ad,ulasin_uye_soyad,ulasin_textarea,ulasin_uye_id,ulasin_link) VALUES 
				 ('$uye_ad','$uye_soyad','$textarea','$uye_id','bos')");
				 if($inster){
					 echo '<script>alert("Bizimle İletişime Geçtiğiniz İçin Teşekkür Ederiz.En kısa zamanda mesajnıza bakacağız.");</script>';
					 header("Refresh:2;url=$url/anasayfa/bizeulasin");
				 }
		}
	?>
  

  
