<?php 
include("../../ayar/baglan.php");
	include("../../ayar/fonksiyon.php");

	$durum_id=$_POST["durum_id"];
	$_SESSION["durumm"]=$durum_id;
	$sorgu=$baglan->query("SELECT * FROM durumlar WHERE durum_id='$durum_id'");
		
	echo true;
	
	
	
?>