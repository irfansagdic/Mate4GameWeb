<?php 
	include ("../../ayar/baglan.php"); 
	$gonderen_id=$_GET["id"];
	$alici_id=$_SESSION["uye_id"];
	$sql=$baglan->query("UPDATE mesajlar SET mesaj_okundu=1 WHERE gonderen_id=$gonderen_id AND alici_id=$alici_id");
	header("Refresh:1;url=../index.php?do=mesajlar");
?>