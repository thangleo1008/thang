<?php
	include 'db.php';
	if(isset($_GET['maxoa'])){
		$maxoa = $_GET['maxoa'];
		$sql = "DELETE from sanpham where idsp = '$maxoa'";
		$kq = $connect -> prepare($sql);
		if ($kq -> execute()) {
			header("Location: sanpham.php");
		}else {
			echo "Lỗi";
		}
	} 
?>