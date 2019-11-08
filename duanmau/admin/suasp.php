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
				<h2 style="text-align: center; padding-top: 20px; color: #1281c8;">SỬA SẢN PHẨM</h2>
				<?php 
					include 'db.php';
					if (isset($_GET['masua'])) {
						$masua = $_GET['masua'];
						$sql = "SELECT sanpham.idsp, sanpham.iddm, sanpham.tensp, sanpham.anh, sanpham.gia, sanpham.giasale, sanpham.xuatsu, sanpham.chitiet, sanpham.ngaydang, danhmuc.tendm 
								FROM sanpham
								INNER JOIN danhmuc ON danhmuc.iddm = sanpham.iddm
								WHERE idsp = '$masua'";
						$kq = $connect -> query($sql)->fetch();  
					}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
						<div class="text-sp-left">
						<strong>Tên sản phẩm:</strong>
						<input type="text" name="tensp" value="<?php echo $kq['tensp']?>"> <br><br>
						<strong>Ảnh sản phẩm:</strong><img src="img/<?php echo $kq['anh'] ?>" alt="">
						<input type="file" name="anh" id=""><br><br>
						<strong>Giá sản phẩm:</strong> <input type="text" name="gia" value="<?php echo $kq['gia']?>"><br><br>
						<strong>Giá Sale:</strong> <input type="text" name="giasale" value="<?php echo $kq['giasale']?>"><br><br>
						<strong>Xuất Sứ:</strong> <input type="text" name="xuatsu" value="<?php echo $kq['xuatsu']; ?>"><br><br>
						<strong>Ngày Đăng:</strong> <input type="date" name="ngaydang" value="<?php echo $kq['ngaydang']?>"><br><br>
						<strong>Loại sản phẩm:</strong>
						<select name="type" class="select" id="">
							<?php 
							include 'db.php';
							$sqltype = "select * from danhmuc";
							$kqtype = $connect -> query($sqltype);
							foreach ($kqtype as $key => $value) {
							?>
								<option value="<?php echo $value['iddm'] ?>" <?php if($value['iddm'] == $_GET['iddm']) echo "selected";?>><?php echo $value['tendm']?></option>
							<?php
								}
							?>
						</select><br><br>
						</div>
						<div class="text-sp">
						<label><strong> Nội dung chi tiết:</strong></label> <br><br>
						<textarea name="chitiet" id="editor1" rows="20" cols="50"><?php echo $kq['chitiet'] ?></textarea>
						<div class="save"><input class="luu" type="submit" name="luu" value="Lưu"></div>
						</div>
						
					<?php 
					include 'db.php';
					if(isset($_POST['luu'])){
						$type = $_POST['type'];
						$tensp = $_POST['tensp'];
						$gia = $_POST['gia'];
						$giasale = $_POST['giasale'];
						$xuatsu = $_POST['xuatsu'];
						$chitiet = $_POST['chitiet'];
						$ngaydang = $_POST['ngaydang'];
						$upload = 1;
						
						//Check ảnh
						$nameA = $_FILES['anh']['name'];
						if($nameA != ''){
							$tmpA = $_FILES['anh']['tmp_name'];
							$sizeA = $_FILES['anh']['size'];
							if ($sizeA > 550000) {
								echo "<br>Files quá lớn.<br>";
								$upload = 0;
							}
						$imagesArray = strtolower(pathinfo ($nameA, PATHINFO_EXTENSION));
						if($imagesArray != "jpg" && $imagesArray != "png" && $imagesArray != "jpeg") {
							echo "<br>Lỗi sai định dạnh ảnh không phải JPG, JPEG, PNG, JFIF & GIF. <br>";
							$upload = 0;
						}
						}
						if($nameA == "" && $gia > 0 && $giasale> 0){
							$sqlsua = "UPDATE sanpham SET iddm = '$type', tensp='$tensp', gia = '$gia', giasale = '$giasale', xuatsu='$xuatsu', iddm = '$type',  chitiet='$chitiet', ngaydang = '$ngaydang' WHERE idsp = '$masua'";
							$kq = $connect -> prepare($sqlsua);
							if($kq -> execute()){
								header("Location:sanpham.php");
							}else{
								echo "Lỗi!";
							}
						}else if($nameA != '' && $upload == 1 && $gia > 0 && $giasale> 0){
							move_uploaded_file($tmpA,"img/".$nameA);
							$sqlsua = "UPDATE sanpham SET iddm = '$type', tensp='$tensp', anh = '$nameA', gia = '$gia', giasale = '$giasale',  xuatsu = '$xuatsu', chitiet='$chitiet', ngaydang = '$ngaydang' WHERE idsp = '$masua'";
							$kq = $connect -> prepare($sqlsua);
							if($kq -> execute()){
								header("Location:sanpham.php");
							}else{
								echo "Lỗi!";
							}
						}else if($upload==0){
							echo "<br>Lỗi không upload được file!";
						}else if($gia > 0 || $giasale> 0){
							echo "<br>Giá lớn hơn 0!";
						}
					
					}
				?>
				</form>
			</div>
			<script>
				CKEDITOR.replace("editor1");
			</script>
		</article>
    </div>
    
</body>
</html>