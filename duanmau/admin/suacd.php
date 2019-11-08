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
			<div class="wrap-themsp">
				
				<h2 style="text-align: center; padding-top: 20px; color: #1281c8;">SỬA CÀI ĐẶT</h2>
                <?php
				include "db.php";
                    if (isset($_GET["masua"])) {
                        $masua = $_GET["masua"];
                        $sql = "SELECT * from caidat where idcd = '$masua'";
                        $kq = $connect -> query($sql) -> fetch();
                    }  
			    ?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="text-sp-left">
                    <strong>Logo:</strong><img src="img/<?php echo $kq['logo'] ?>" alt="">
						<input type="file" name="logo" id=""><br><br>
                    <strong>Địa Chỉ:</strong><input type="text" name="diachi" value="<?php echo $kq['diachi'] ?>"><br><br>
                    <strong>Số Điện Thoại:</strong><input type="text" name="sdt" value="<?php echo $kq['sdt'] ?>"><br><br>
                    <strong>Email:</strong><input type="text" name="email" value="<?php echo $kq['email'] ?>"><br><br>
					</div>
					<div class="save"><input class="luu" type="submit" name="luu" value="Lưu"></div>
				
                    <?php
					include "db.php";
					if (isset($_POST['luu'])) {
                          $diachi = $_POST['diachi'];
                          $sdt = $_POST['sdt'];
                          $email = $_POST['email'];
                          $upload = 1;

                          //Check ảnh
						$nameA = $_FILES['logo']['name'];
						if($nameA != ''){
							$tmpA = $_FILES['logo']['tmp_name'];
							$sizeA = $_FILES['logo']['size'];
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
						if($nameA == ""){
							$sqlsua = "UPDATE caidat SET  diachi ='$diachi', email = '$email', sdt = '$sdt' WHERE idcd = '$masua'";
							$kq = $connect -> prepare($sqlsua);
							if($kq -> execute()){
								header("Location:caidat.php");
							}else{
								echo "Lỗi!";
							}
						}else if($nameA != '' && $upload == 1){
							move_uploaded_file($tmpA,"img/".$nameA);
                            $sqlsua = "UPDATE caidat SET  diachi ='$diachi', email = '$email', sdt = '$sdt', logo = '$nameA' WHERE idcd = '$masua'";
                            $kq = $connect -> prepare($sqlsua);
							if($kq -> execute()){
								header("Location:caidat.php");
							}else{
								echo "Lỗi!";
							}
						}else if($upload==0){
							echo "<br>Lỗi không upload được file!";
						}
					
					}
					 
				?>
                </form>
			</div>
		</article>
    </div>
    
</body>
</html>