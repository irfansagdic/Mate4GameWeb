<?php 

include ("../../ayar/baglan.php"); 
//$okundu=$_POST["okundu"];

$uye_id=$_SESSION["uye_id"];
$ozel_id=$_POST["ozel_id"];
if($ozel_id)
{
	echo true;
}


 $guncelle=$baglan->query("UPDATE mesajlar SET  mesaj_okundu=1 WHERE ozel_id='$ozel_id'");
	
?>