<?php session_start() ?>
<?php ob_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font-awsome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Trang Chủ - Siêu thị điện máy</title>
    <style>
    .search{
        float: left;
        position: relative;
        margin-left: 20px !important;
    }
    .search input{
        width: 300px !important;
        height: 25px;
    }
    .sub-header-right{
    float: right;
    }
    .sub-header-right ul{

        list-style: none;
        margin-right: 10px;
    }
    .sub-header-right ul li{
        display: inline-block;
        padding: 0 10px;
    }

    .sub-header-right ul li a{
        color: #fff;
        text-decoration: none;
    }
    .sub-header-right ul li a:hover{
        text-decoration: underline;
    }
        </style>
</head>
<body>
    <div class="wrap-site">
        <div class="wrap-header">
            <header>
                <div class="sub-header">
                    <div class="sub-header-left">
                        <ul>
                            <li><a href="#"><img src="img/vn.png" width="30" height="20" alt="">Tiếng Việt</a></li>
                            <li><a href="#"><img src="img/my.png" width="30" height="20" alt="">English</a></li>
                        </ul>
                    </div>
                    <div class="search">
                        <form action="timkiem.php" method="get">
                            <input type="text" name="search" required="" placeholder="Search something">
                            <button name="button" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sub-header-right">
                        <ul>
                            <li>
                                <a>
                                    <?php
                                        if(isset($_SESSION['user'])) {
                                            echo "XIN CHÀO: ".$_SESSION['user'];
                                        }
                                    ?>
                                </a>
                            </li>
                            <li><a href="#">|</a></li>
                            <li>
                                <a href="admin/index.php">
                                    <?php 
                                        include 'admin/db.php';
                                        if(isset($_SESSION['user'])){
                                            $user = $_SESSION['user'];
                                            $sql = "select *from taikhoan where user = '$user'";
                                            $kq= $connect -> query($sql) -> fetch();
                                            if($kq['phanquyen']=="1"){
                                                echo "Quản trị";
                                            }
                                        } 
                                    ?>
                                </a>
                            </li>
                            <li><a href="#">|</a></li>
                            <li>
                                <a href="dangxuat.php">
                                    <?php if(isset($_SESSION['user'])){
                                        echo "Đăng xuất";
                                    } ?>
                                </a>
                            </li>
                            <li>
                                <a href="doimk.php?masua=<?php echo $kq['user'] ?>">
                                    <?php if(isset($_SESSION['user'])){
                                        echo "Đổi mật khẩu";
                                    } ?>
                                </a>
                            </li>
                            <li>
                                <a href="login.php">
                                    <?php if(!isset($_SESSION['user'])){
                                        echo "Đăng nhập";
                                    } ?>
                                </a>
                            </li>
                            <li><a href="#">|</a></li>
                            <li><a href="dangky.php">Đăng ký</a></li>
                        </ul>
                    </div>
                </div>
                <div class="logo">
                    <a href="#"><img src="img/logo.png" height="120" alt=""></a>
                    <div class="logo-text">
                        <h2>SIÊU THỊ ĐIỆN MÁY XANH</h2>
                        <p class="sub-title">Ngập tràn mua sắm với hàng ngàn ưu đã hấp dẫn</p>
                        <span>Địa chỉ: KM 27, Trường Yên, Huyện chương mỹ, Hà Nội </span>
                    </div>
                    <div class="socia">
                        <p>Mạng xã hội: <span><a href="#"><i class="fab fa-facebook"></i></a></span>
                            <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                            <span><a href="#"><i class="fab fa-google-plus-square"></i></a></span>
                        </p>
                    </div>
                </div>
            </header>
        </div>
        <div class="wrap-menu">
            <nav>
                <ul>
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="#">GIỚI THIỆU</a></li>
                    <li><a href="#">SẢN PHẨM</a></li>
                    <li><a href="#">THƯƠNG HIỆU</a></li>
                    <li><a href="#">BẢNG GIÁ</a></li>
                    <li><a href="#">KHÁCH HÀNG</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>
                </ul>
            </nav>
        </div>
        <div class="wrap-content">
            <article>
                
                <div class="content">
                    <div class="content-left">
                        <div class="menu-left">
                            <div class="title-menu">
                                <h2><i class="fas fa-th-list"></i> Danh Mục Sản Phẩm</h2>
                            </div>
                            <ul>
                                <?php 
                                    include 'admin/db.php';
                                    $sql="select * from danhmuc";
                                    $kq = $connect->query($sql);
                                    foreach ($kq as $key => $row) {
            		            ?>
                                <li><a href="sanpham.php?iddm=<?php echo $row['iddm'] ?>"><?php echo $row['tendm']; ?></a></li>
                                <?php }
				                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="title-content">
                            <div class="title-ct">
                                <h2>CÁC SẢN PHẨM TÌM THẤY</h2>
                            </div>
                        </div>
                        
                        <div class="product">
                            <?php 
                                include 'admin/db.php';
                                if (isset($_GET['button'])){
                                    $search = $_GET['search'];
                                    if (empty($search)) {
                                        $search_sp = [];
                                    }else{
                                        $sql = "SELECT * from sanpham where tensp LIKE '%$search%'";
                                        $kq = $connect -> query($sql);
                                        $search_sp = $kq;
                                    }
                                }
                            ?>
                            <?php foreach($search_sp as $value) :?>
                            <div class="production">
                                <a href="spchitiet.php?idsp=<?php echo $value['idsp'] ?>&idsp =<?php echo $value['idsp'] ?>"><img src="img/<?php echo $value['anh'] ?>" alt=""></a>
                                <h3><a href="spchitiet.php?idsp=<?php echo $value['idsp'] ?>&idsp =<?php echo $value['idsp'] ?>"><?php echo $value['tensp'] ?></a></h3>
                                <h4>Giá :<?php echo $value['gia'] ?></h4>
                                <del><h5>Giá sale : <?php echo $value['giasale'] ?></h5></del>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="wrap-footer">
            <footer>
                <div class="info-ft">
                    <h2>SIÊU THỊ ĐIỆN MÁY XANH</h2>
                    <p>Số 01, Đường 27, Phường Hiệp Bình Chánh, Quận Thủ Đức, TP.HCM</p>
                    <p>Số điện thoại: +84917.943.999</p>
                    <p>Gmail: virus10898@gmail.com</p>
                    <p>Trang Web: <a href="https://www.facebook.com/thangleo1008">Facebook</a></p>
                    <div class="sociaa">
                        <p>Mạng xã hội: <span><a href="#"><i class="fab fa-facebook"></i></a></span>
                            <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                            <span><a href="#"><i class="fab fa-google-plus-square"></i></a></span>
                        </p>
                    </div>
                </div>
                <div class="info-ft">
                    <h2>HỖ TRỢ KHÁCH HÀNG</h2>
                    <p>Tìm hiểu về mua trả góp</p>
                    <p>Tìm hiểu về giá cả</p>
                    <p>Tìm hiểu về sản phẩm</p>
                    <p>Fan Page: <a href="https://www.facebook.com/thangleo1008">Facebook</a></p>
                </div>
                <div class="info-ft">
                    <h2>Bản đồ</h2>
                    <img src="img/bd.jpg" width="270" alt="">
                </div>
                <div class="copy"><p>&copy; Nguyễn Gia Thấng </p></div>
       
            </footer>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>