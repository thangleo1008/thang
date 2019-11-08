<?php
	include 'db.php';
	if(isset($_GET['maxoa'])){
		$maxoa = $_GET['maxoa'];
		$sql = "DELETE from taikhoan where user = '$maxoa'";
		$kq = $connect -> prepare($sql);
		if ($kq -> execute()) {
			header("Location: taikhoan.php");
		}else {
			echo "Lỗi";
		}
	}  
?>