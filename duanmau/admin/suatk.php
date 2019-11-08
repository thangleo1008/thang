<?php ob_start(); ?>
<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa Sản Phẩm</title>
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
				<h2 style="text-align: center; padding-top: 20px; color: #1281c8;">SỬA TÀI KHOẢN</h2>
				<?php 
					include 'db.php';
					if (isset($_GET['masua'])) {
						$masua = $_GET['masua'];
						$sql = "SELECT * FROM taikhoan
								WHERE user = '$masua'";
						$kq = $connect -> query($sql)->fetch();
					}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
						<div class="text-sp-left">
                            <select name="phanquyen" class="select" id="">
                                <option value="0" <?php if($kq['phanquyen']=="0"){echo "selected";} ?>>Thành viên</option>
                                <option value="1" <?php if($kq['phanquyen']=="1"){echo "selected";} ?>>Admin</option>
                            </select><br><br>
                            
                            <select name="trangthai" class="select" id="">
                                <option value="0" <?php if($kq['trangthai']=="0"){echo "selected";} ?>>Không hoạt động</option>
                                <option value="1" <?php if($kq['trangthai']=="1"){echo "selected";} ?>>Hoạt động</option>
                            </select><br><br>
                            <div class="save"><input class="luu" type="submit" name="luu" value="Lưu"></div>
						</div>
						
					<?php 
					include 'db.php';
					if(isset($_POST['luu'])){
						$phanquyen = $_POST['phanquyen'];
						$trangthai = $_POST['trangthai'];
							$sqlsua = "UPDATE taikhoan SET phanquyen = '$phanquyen', trangthai='$trangthai' WHERE user = '$masua'";
							$kq = $connect -> prepare($sqlsua);
							if($kq -> execute()){
								header("Location:taikhoan.php");
							}else{
								echo "Lỗi!";
							}
						
						}
					
					
				?>
				</form>
			</div>
		</article>
    </div>
    
</body>
</html>