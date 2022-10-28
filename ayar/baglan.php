<?php
	ob_start();
	session_start();
	$url="http://localhost:8080/mate4game_guncel";
	
	error_reporting(0);
	//LOCAL İÇİN
	$host="localhost";
	$user="root";
	$pass="";
	$db="mategame_123";
	//SİTE İÇİN
	/*$host="localhost";
	$user="";
	$pass="";
	$db="";*/
	
	$baglan=new PDO("mysql:host=$host;dbname=$db;charset=utf8;",$user,$pass);
	/*$mesaj_veritabani="playmate.com_mesaj";
	$mesaj=new PDO("mysql:host=$host;dbname=$mesaj_veritabani;charset=utf8;",$user,$pass);*/
	/*try {
     $baglan = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	 $baglan->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch ( PDOException $e ){
     print $e->getMessage();
}*/



?>
