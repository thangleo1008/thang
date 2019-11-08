<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản trị Bình Luận</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<nav>
			<ul>
				<li><a href="index.php">Welcomt to Admin Điện Máy Xanh</a></li>
				<li class="nav-left"><a href="#">Đổi Mật Khẩu</a></li><span style="color: #fff;">/</span>
				<li><a href="#">Đăng Xuất</a></li>
			</ul>
		</nav>

		<aside>
			<div class="admin">
				<img src="img/logo.png" width="80" alt="">
				<div class="a-text">
				<h3>Leo Admin <br> <p></p><span><i class="fas fa-circle"></i> Online</span></h3>
				</div>
			</div>
			<a href="index.php"><button><i class="fas fa-home"></i> Trang Chủ</button></a>
			<a href="danhmuc.php"><button><i class="fas fa-clipboard-list"></i> Danh Mục</button></a>
			<a href="sanpham.php"><button><i class="fab fa-python"></i> Sản Phẩm</button></a>
			<a href="taikhoan.php"><button><i class="fas fa-user-circle"></i> Tài Khoản</button></a> 
			<a href="binhluan.php"><button><i class="fas fa-comment-dots"></i> Bình Luận</button></a>
			<a href="caidat.php"><button><i class="fas fa-cogs"></i> Cài Đặt</button></a>
		</aside>
		<article>
			<div class="title-bl">
				<h3>CHI TIẾT BÌNH LUẬN</h3>
            </div>
            <a href="binhluan.php"><button><i class="fas fa-backward"></i> Quay về</button></a>
			<div class="sanpham">
				<table border="1">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tài Khoản BL</th>
							<th>Nội dung BL</th>
							<th>Thời gian</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php 
							include "db.php";
							if (isset($_GET['macmt1'])) {
								$macmt = $_GET['macmt1'];
								$sql = " SELECT binhluan.idcmt, binhluan.user, binhluan.idsp, binhluan.noidung, binhluan.thoigian, sanpham.tensp
								FROM binhluan
								INNER JOIN sanpham on binhluan.idsp = sanpham.idsp
								WHERE sanpham.idsp = binhluan.idsp AND binhluan.idsp = '$macmt'";
								$kq = $connect ->query($sql);
								foreach ($kq as $key => $row) {
								
						?>
					
						<tr>
							<td><?php echo ($key +1); ?></td>
							<td><?php echo $row['user']; ?></td>
							<td><?php echo $row['noidung']; ?></td>
							<td><?php echo $row['thoigian']; ?></td>
							<td><a href="xoacmt.php" title=""><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<?php 
							} }
						?>
						
					</tbody>
				</table>
				
				
			</div>
		</article>
	</div>
</body>
</html>