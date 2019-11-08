<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản trị sản phẩm</title>
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
				<h3>
					<?php 
					if (isset($_SESSION['user']) && ($_SESSION['phanquyen'] == '1')) {
						echo $_SESSION['user'];
					} else 	{
						header("Location: http://localhost/duanmau/index.php");
					}
					
					?>
				<br> <p></p><span><i class="fas fa-circle"></i> Online</span></h3>
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
			<a href="themsp.php"><button>Thêm Sản Phẩm</button></a>
			<div class="sanpham">
				<table border="1">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Giá</th>
							<th>Giảm KM</th>
							<th>Xuất sứ</th>
							<th>Ngày đăng</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php  
							include "db.php";
							$sql = "SELECT sanpham.idsp, sanpham.iddm, sanpham.tensp, sanpham.anh, sanpham.gia, sanpham.giasale, sanpham.xuatsu, sanpham.chitiet, sanpham.ngaydang, danhmuc.tendm 
								FROM sanpham
								INNER JOIN danhmuc ON danhmuc.iddm = sanpham.iddm";
							$kq = $connect -> query($sql);
							foreach ($kq as $key => $row) {
							
						?>
						<tr>
							<td><?php echo($key+1); ?></td>
							<td><?php echo $row['tensp']; ?></td>
							<td><img src="img/<?php echo $row['anh'] ?>" alt=""></td>
							<td><?php echo $row['gia']; ?></td>
							<td><?php echo $row['giasale']; ?></td>
							<td><?php echo $row['xuatsu']; ?></td>
							<td><?php echo $row['ngaydang']; ?></td>
							<td><a href="suasp.php?masua=<?php echo $row['idsp'] ?>&iddm=<?php echo $row['iddm'] ?>"><i class="fas fa-edit"></a></td>
							<td><a href="xoasp.php?maxoa=<?php echo $row['idsp'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa mục này')"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<?php  
							}
						?>

					</tbody>
				</table>
				
			</div>
		</article>
	</div>
</body>
</html>