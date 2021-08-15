<?php
	include("../../ayar/baglan.php");
	include("../../ayar/fonksiyon.php");
	$durum_id=$_POST["durum_id"];
	$durum=$_POST["durum"];
	$_SESSION["durum_duzenle"]=$durum;
	$sql=("UPDATE durumlar SET durum='$durum' WHERE durum_id='$durum_id' ");
	$update=$baglan->query($sql);

		echo true;
	

?>