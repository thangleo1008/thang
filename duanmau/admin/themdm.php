<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="css/admin.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
			<div class="wrap-themsp">
				
				<h2 style="text-align: center; padding-top: 20px; color: #1281c8;">THÊM DANH MỤC</h2>


				<form action="" method="POST" enctype="multipart/form-data">
					<div class="text-sp-left">
					<strong>Tên Danh Mục:</strong><input type="text" name="tendm"><br><br>
					</div>
					<div class="save"><input class="luu" type="submit" name="luu" value="Lưu"></div>
				</form>
				<?php 
					include 'db.php';
					if (isset($_POST['luu'])) {
						$tendm = $_POST['tendm'];
						if ($tendm == "") {
							echo "<br> Nhập danh mục của bạn muốn thêm!";
						}else{
							$sql = "insert into danhmuc values ('', '$tendm')";
							$kq = $connect -> exec($sql);
							if ($kq == 1)
							header("Location:danhmuc.php");
							else
								echo "Lưu Lỗi!";
						}
					}
				?>

			</div>
		</article>
    </div>
    
</body>
</html>