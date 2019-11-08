<?php
	include 'db.php';
	if(isset($_GET['maxoa'])){
		$maxoa = $_GET['maxoa'];
		$sql = "DELETE from danhmuc where iddm = '$maxoa'";
		$kq = $connect -> prepare($sql);
		if ($kq -> execute()) {
			header("Location: danhmuc.php");
		}else {
			echo "Lỗi";
		}
	}  
?>