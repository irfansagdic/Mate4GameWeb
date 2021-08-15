<?php 
include("../../ayar/baglan.php");
	include("../../ayar/fonksiyon.php");
	$uye_id=$_SESSION["uye_id"];
	$sorgu1 = $baglan->prepare("SELECT COUNT(*) FROM mesajlar WHERE alici_id=$uye_id && mesaj_okundu=0");
	$sorgu1->execute();
	$say = $sorgu1->fetchColumn();
	if($say==0)
	{
		echo "Mate4Game";
	}
	else{
		echo "Mate4Game (".$say.")";
	}
?>