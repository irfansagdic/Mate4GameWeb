<?php include ("../../ayar/baglan.php"); 
include ("../../ayar/fonksiyon.php"); 


	
	$alici_id=$_POST["alici_id"];
	$gonderen_id = $_POST["gonderen_id"];
	$sorgu1 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE gonderen_id=$gonderen_id && alici_id=$alici_id");
	$sorgu1->execute();
	$uzunluk1 = $sorgu1->fetchColumn();
	$sorgu2 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE gonderen_id=$alici_id && alici_id=$gonderen_id");
	$sorgu2->execute();
	$uzunluk2 = $sorgu2->fetchColumn();
	if($uzunluk1==0 && $uzunluk2==0)
	{
		$mesaj=guvenlik($_POST["mesaj"]);
		$tarih=date('d.m.Y ');
		$saat= date('H:i:s');
		$karakterler = "1234567890abcdefghijklmnopqrstuvwxyz";
		$ozel_id;
				   for($i=0;$i<11;$i++)

				   {

					 $ozel_id.= $karakterler[rand(0,35)];

				   }
	$kaydet=$baglan->exec("INSERT INTO mesajlar (gonderen_id,alici_id,mesaj,mesaj_tarih,mesaj_saat,ozel_id,mesaj_okundu) VALUES ('$gonderen_id','$alici_id','$mesaj','$tarih','$saat','$ozel_id',0)");
		if($kaydet)
		{
			echo true;
		}
	}
	else{
		
		
		if($uzunluk1>0)
		{
		
			$sql=$baglan->query("SELECT * FROM mesajlar WHERE alici_id =$alici_id AND gonderen_id=$gonderen_id");
			$sonuc=$sql->fetch();
			
			$ozell_id=$sonuc["ozel_id"];
			
		}
		else if($uzunluk2>0){
			
			$sql1=$baglan->query("SELECT * FROM mesajlar WHERE alici_id =$gonderen_id AND gonderen_id=$alici_id");
			$sonuc1=$sql1->fetch();
			$ozell_id=$sonuc1["ozel_id"];
			
		}
			
			$mesaj=$_POST["mesaj"];
			$tarih=date('d.m.Y ');
			$saat= date('H:i:s');
			$ozel_id=$sonuc["ozel_id"];
				$kaydet=$baglan->exec("INSERT INTO mesajlar (gonderen_id,alici_id,mesaj,mesaj_tarih,mesaj_saat,ozel_id) VALUES ('$gonderen_id','$alici_id','$mesaj','$tarih','$saat','$ozell_id')");
				if($kaydet)
			{
				echo true;
			}
		
		
	}
	//DURUM SAYISINI BUL
	/*$ozel_id=$gonderen_id."".$alici_id;
	$mesaj=$_POST["mesaj"];
	$tarih=date('d.m.Y ');
		$saat= date('H:i:s');
	$kaydet=$baglan->exec("INSERT INTO mesajlar (gonderen_id,alici_id,mesaj,mesaj_tarih,mesaj_saat,ozel_id) VALUES ('$gonderen_id','$alici_id','$mesaj','$tarih','$saat','$ozel_id')");
		if($kaydet)
		{
			echo true;
		}*/











?>