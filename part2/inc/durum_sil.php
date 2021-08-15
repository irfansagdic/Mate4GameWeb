<?php 

	include("../../ayar/baglan.php");

	$id=$_GET["id"];
		$delete=$baglan->query("DELETE FROM durumlar WHERE durum_id=$id");
		if($delete)
		{
			echo '<script>alert("Durum Silindi")</script>';
			header("Refresh:1;url=$url/anasayfa/profilim");
		}
?>