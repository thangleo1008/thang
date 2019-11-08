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
				
				<h2 style="text-align: center; padding-top: 20px; color: #1281c8;">THÊM SẢN PHẨM</h2>
				<form action="" method="POST" enctype="multipart/form-data">
						<div class="text-sp-left">
						<strong>Tên sản phẩm:</strong><input type="text" name="tensp"><br><br>
						<strong>Loại sản phẩm:</strong>
						<select name="type" class="select" id="">
							<?php 
							include 'db.php';
							$sqltype = "select * from danhmuc";
							$kqtype = $connect -> query($sqltype);
							foreach ($kqtype as $key => $value) {
							?>
								<option value="<?php echo $value['iddm'] ?>"><?php echo $value['tendm'] ?></option>
							<?php
								}
							?>
						</select><br><br>
						<strong>Ảnh sản phẩm:</strong><input type="file" name="anh"><br><br>
						<strong>Giá sản phẩm:</strong> <input type="number" name="gia"><br><br>
						<strong>Giá Sale:</strong> <input type="number" name="giasale"><br><br>
						<strong>Xuất Sứ:</strong> <input type="text" name="xuatsu"><br><br>
						<strong>Ngày Đăng:</strong> <input type="date" name="ngaydang"><br><br>
						</div>
						<div class="text-sp">
						<label><strong> Nội dung chi tiết:</strong></label> <br><br>
						<textarea name="chitiet" id="editor1" rows="20" cols="50"></textarea>
						<div class="save"><input class="luu" type="submit" name="luu" value="Lưu"></div>
						</div>
						<script>
							CKEDITOR.replace("editor1");
						</script>
				</form>
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
						
						//Check đuôi file ảnh
						$nameA = $_FILES['anh']['name'];
						$imagesArray = strtolower(pathinfo ($nameA, PATHINFO_EXTENSION));
						if($imagesArray != "jpg" && $imagesArray != "png" && $imagesArray != "jpeg"){
							echo "Lỗi định dạng ảnh không phải JPG/PNG/JEPG!";
							$upload = 0;
						}

						$tmpA = $_FILES['anh']['tmp_name'];

						//Check size ảnh
						$sizeA = $_FILES['anh']['size'];
						if ($sizeA > 550000) {
								echo "<br>File quá lớn.<br>";
								$upload = 0;
						}

						//Check giá > 0
						if($gia <0 || $giasale <0){
							echo "Giá phải là số dương!";
							$gia = "";
							$giasale ="";
						}

						//Nhập thông tin
						if($tensp == "" || $chitiet == "" || $xuatsu == "" ||$gia == "" || $giasale =="" ||$ngaydang =="" || $upload == 0){
							echo "<br>Phải nhập thông tin đầy đủ!"; 
						}else{
							move_uploaded_file($tmpA,"img/".$nameA);
							
							$sql = "INSERT into sanpham values ('','$type','$tensp','$nameA','$gia','$giasale','$xuatsu','$chitiet','$ngaydang','')";
							$kq = $connect -> exec($sql);
							echo $sql;
							if($kq == 1)
								header("Location:sanpham.php");
							else
								echo "Lưu lỗi!";
						}
					
					}
				?>
			</div>
		</article>
    </div>
    
</body>
</html>