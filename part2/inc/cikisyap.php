<?php
	unset($_SESSION["giris"]);
	unset($_SESSION["uye_id"]);
	unset($_SESSION["uye_tarih"]);
	unset($_SESSION["uye_kadi"]);
	unset($_SESSION["uye_email"]);
	unset($_SESSION["uye_soyad"]);
	
	session_destroy();
	header("Refresh:1;url=../part1/index.php");
	echo '<script>alert("Çıkış Başarılı Yönlendriliyorsunuz");</script>';
?>