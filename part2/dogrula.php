<?php 
	include("ayar/baglan.php");
	$id=$_GET["id"];
	$update=$baglan->query("UPDATE uyeler SET email_dogrulama=1 WHERE uye_id=$id ");
	$tarih=date('d.m.Y ');
	$saat= date('H:i:s');
	if($update)
	{
		$mesaj='Merhabalar,sitemize hoşgeldiniz.Sitemizde oyun arkadaşınızı bulabilirsiniz.Ödüllü videolar bölümüne göz atabilirsiniz.Durum paylaşmayı ve <a target="_blank" href="https://www.facebook.com/mate4game/">Facebook sayfamızı </a> takip etmeyi unutmayın :) <3.Sorularınızı bize ulaşın kısmından gönderebilirsiniz.Bu bir sistem mesajıdır.Lütfen cevap yazmayınız.';
		$kaydet=$baglan->exec("INSERT INTO mesajlar (gonderen_id,alici_id,mesaj,mesaj_tarih,mesaj_saat,ozel_id,mesaj_okundu) VALUES ('211',$id,'$mesaj','$tarih','$saat','5',0)");
		echo '<script>alert("Başarıyla Üye Oldunuz.Yönlendiriliyorsunuz");</script>';
		header("Refresh:1;url=http://mate4game.com/uye_giris");
	}
	else{
		echo '<script>alert("Üye olamadınız ");</script>';
		header("Refresh:1;url=index.php");
	}
?>