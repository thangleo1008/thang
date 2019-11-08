<?php 
	try {
		$connect = new PDO("mysql:host=localhost;dbname=duanmau;charset=utf8","root","");
	} catch(PDOException $e){
		echo "Lỗi!";
	}
?>