<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shopping Cart | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<?php session_start();
	
	if (isset($_SESSION['email']) || isset($_SESSION['CTHD']))
	echo "";
else 
	header("location: login.php?yeucau");	

	
	if ( isset($_GET['mahd']) && isset($_SESSION['email']) ) 
	{

		$conn = mysqli_connect("localhost","root","","webdb");
		$sql = "select mahd,email,TongTien,TinhTrang from tblhoadon where email = '".$_SESSION['email']."'
		and mahd ='".$_GET['mahd']."'";
		$result = mysqli_query($conn, $sql);	
		if ( mysqli_num_rows($result) == 0 )
			header('location: hoadon.php');				
	}
	else 
	{
		if (!isset($_SESSION['CTHD']))
			header('location: index.php');
	}
	?>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo/3.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index.php">Trang Chủ</a></li>
								<li class="drop"><a href="./shop-grid.php?tranghientai=1">Cửa Hàng</a></li>
								<li class="drop"><a href="./shop-grid.php?tranghientai=1">Sách</a>
									<div class="megamenu mega02">
										<ul class="item item01">
											<li class="title">Thể Loại</li>
											<!-- <li><a href="#">Sách Kỹ Thuật Lập Trình </a></li>
											<li><a href="#">Sách Thuật Toán và Giải Thuật </a></li>
											<li><a href="#">Sách Tiếng Anh Chuyên Ngành </a></li> -->
											<?php 
												$conn = mysqli_connect("localhost","root","","webdb");
												$sql = "select idtheloai,tentheloai from tbltheloai";			
												mysqli_query($conn, "SET NAMES 'utf8'");
												$result = mysqli_query($conn, $sql);


												while ( $row = mysqli_fetch_array($result) ) {
													// đếm số lượng sách
													$sql2 = "select idtheloai from tblsach where idtheloai = '".$row['idtheloai']."'";			
													mysqli_query($conn, "SET NAMES 'utf8'");
													$result2 = mysqli_query($conn, $sql2);

													echo 
													'
														<li><a href="shop-grid.php?idtl='.$row['idtheloai'].'&tranghientai=1">'.$row['tentheloai'].'<span> ('.mysqli_num_rows($result2).')</span></a></li>
											
													';			

												}
											?>
										</ul>
										<!-- <ul class="item item02">
											<li class="title">Ngôn NGữ</li>
											<li><a href="#">Tiếng Việt </a></li>
											<li><a href="#">Tiếng Anh </a></li>
											<li><a href="#">Việt Sub </a></li>
										</ul>
										<ul class="item item02">
											<li class="title">Gợi ý</li>
											<li><a href="#">Sách Bán Chạy</a></li>
											<li><a href="#">Sách Cổ Điển </a></li>
											<li><a href="#">Sách Cơ Bản</a></li>
										</ul> -->
									</div>
								</li>
								<li class="drop"><a href="#">Blog</a>
								</li>
								<li><a href="contact.php">Liên Hệ</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a href="hoadon.php"></a>
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Tài Khoản Của Bạn </span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="myaccount.php">Tài Khoản Của Bạn</a></span>
														<?php
															function runMyFunction() {
																session_unset();	
															}
															
															if (isset($_GET['signout'])) {
																runMyFunction();
															}
															if (isset($_SESSION['email']) ) {
																echo '<span><a href="index.php?signout=true" >Sign Out</a></span>';
															}
															else {
																echo '
																	<span><a href="login.php">Đăng Nhập</a></span>
																	<span><a href="register.php">Tạo Tài Khoản</a></span>		
																';
															}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>		
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.php">Trang Chủ</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="#">About Page</a></li>
										<li><a href="#">Tài Khoản Của Tôi</a></li>
										<li><a href="#">Giỏ Hàng</a></li>
										<li><a href="#">Yêu Thích</a></li>
									</ul>
								</li>
								<li><a href="#">Thể Loại</a>
									<ul>
											<li><a href="#">Sách Kỹ Thuật Lập Trình </a></li>
											<li><a href="#">Sách Thuật Toán và Giải Thuật </a></li>
											<li><a href="#">Sách Tiếng Anh Chuyên Ngành </a></li>
									</ul>
								</li>
								<li><a href="#">Ngôn NGữ</a>
									<ul>
									<li><a href="#">Tiếng Việt </a></li>
											<li><a href="#">Tiếng Anh </a></li>
											<li><a href="#">Việt Sub </a></li>
									</ul>
								</li>
								<li><a href="#">Gợi ý</a>
									<ul>
									<li><a href="#">Sách Bán Chạy</a></li>
											<li><a href="#">Sách Cổ Điển </a></li>
											<li><a href="#">Sách Cơ Bản</a></li>
									</ul>
								<li><a href="#">Blog</a></li>
								<li><a href="contact.php">Liên Hệ</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form name="fr" action="shop-grid.php" id="search_mini_form" class="minisearch" action="">
				<div class="field__search">
					<input name="timkiem" type="text" placeholder="Tìm Kiếm Thứ Bạn Muốn Ở Đây...">
						<div class="action">
							<button type="submit" name="submit">Seacrh</button>
						</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>Đóng</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <br><br><br>
		<!-- End Bradcaump area -->
		






        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Hình Ảnh</th>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số Lượng</th>
                                            <th class="product-subtotal">Thành Tiền</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										if (!isset($_SESSION['CTHD']))
										{
											$mahd = $_GET['mahd'];
											$email = $_SESSION['email'];

											//hoa don
											$conn = mysqli_connect("localhost","root","","webdb");		
											mysqli_query($conn, "SET NAMES 'utf8'");
											$sqlHoaDon = "select mahd,email,TongTien,TinhTrang from tblhoadon where email = '".$email."'
											and mahd ='".$mahd."'";
											$resultHoaDon = mysqli_query($conn, $sqlHoaDon);
											$rowHoaDon =  mysqli_fetch_array($resultHoaDon);
											$TongTien = $rowHoaDon['TongTien'];
											$TinhTrang = $rowHoaDon['TinhTrang'];

										    // chi tiet hoa don
											$sqlCTHoaDon = "select mahd,idSach,soLuong,giaBan from tblchitiethd where mahd = '".$mahd."'";
											$resultCTHoaDon = mysqli_query($conn, $sqlCTHoaDon);
											

											while ($rowCToaDon = mysqli_fetch_array($resultCTHoaDon) ) 
											{
												$sqlSach = "select tensach,idTheLoai,urlHinh from tblsach where idsach = '".$rowCToaDon['idSach']."'";
												$resultSach = mysqli_query($conn, $sqlSach);
												$rowSach = mysqli_fetch_array($resultSach);

												echo 
												'
												<tr>
													<td class="product-thumbnail"><a href="single-product.php?idsach='.$rowCToaDon['idSach'].'&idtl='.$rowSach['idTheLoai'].'"><img src="images/books/'.$rowSach['urlHinh'].'"></a></td>
													<td class="product-name"><a href="single-product.php?idsach='.$rowCToaDon['idSach'].'&idtl='.$rowSach['idTheLoai'].'">'.$rowSach['tensach'].'</a></td>
													<td class="product-price"><span class="amount">'.$rowCToaDon['giaBan'].'</span></td>
													<td class="product-price"><span class="amount">'.$rowCToaDon['soLuong'].'</span></td></td>
													<td class="product-subtotal">'.$rowCToaDon['soLuong'] * $rowCToaDon['giaBan'].'</td>
													
												';

												if ( $TinhTrang == 'Đang xử lý') 
echo '<td class="product-remove"><a href="GioHang.php?mahd='.$rowCToaDon['mahd'].'
&idsach='.$rowCToaDon['idSach'].'&soluong='.$rowCToaDon['soLuong'].'
&giaban='.$rowCToaDon['giaBan'].'&tongtien='.$rowHoaDon['TongTien'].'
&email='.$_SESSION['email'].'&xoasanpham=true" >X</a></td>
													</tr>';
												else 
													echo'<td class="product-remove"></td>
													</tr>';	
											}
										}
										else 
										{
											// session chi tiet hoa don
											$TinhTrang = "";
											$TongTien = $_SESSION['TongTien'];
											for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
											{
												$sqlSach = "select tensach,idTheLoai,urlHinh,GiaBan from tblsach where idsach = '".$_SESSION['CTHD'][$i][0]."'";
												$resultSach = mysqli_query($conn, $sqlSach);
												$rowSach = mysqli_fetch_array($resultSach);

												echo 
												'
												<tr>
													<td class="product-thumbnail"><a href="single-product.php?idsach='.$_SESSION['CTHD'][$i][0].'&idtl='.$rowSach['idTheLoai'].'"><img src="images/books/'.$rowSach['urlHinh'].'"></a></td>
													<td class="product-name"><a href="single-product.php?idsach='.$_SESSION['CTHD'][$i][0].'&idtl='.$rowSach['idTheLoai'].'">'.$rowSach['tensach'].'</a></td>
													<td class="product-price"><span class="amount">'.$rowSach['GiaBan'].'</span></td>
													<td class="product-price"><span class="amount">'.$_SESSION['CTHD'][$i][1].'</span></td></td>
													<td class="product-subtotal">'.$_SESSION['CTHD'][$i][1] * $rowSach['GiaBan'].'</td>
													
												';

echo '<td class="product-remove"><a href="GioHang_Session.php?xoahoadon_SanPham=true&idsach='.$_SESSION['CTHD'][$i][0].'" >X</a></td>
													</tr>';
											}
										}
										?>
                                        <!-- <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/1.jpg" alt="product img"></a></td>
                                            <td class="product-name"><a href="#">Natoque penatibus</a></td>
                                            <td class="product-price"><span class="amount">$165.00</span></td>
                                            <td class="product-quantity"><input type="number" value="1"></td>
                                            <td class="product-subtotal">$165.00</td>
                                            <td class="product-remove"><a href="#">X</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
				<?php
				if ( isset($_SESSION['CTHD']) )
				{
					echo '
					<div class="row">
						<div class="col-lg-2 offset-lg-10">
							<div class="cartbox__total__area">
								<div class="cart__total__amount">
									<a href="login.php?yeucau">Thanh toán</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
				else 
				if ( $TinhTrang == 'Đang xử lý' ) 
				{
					echo '
					<div class="row">
						<div class="col-lg-2 offset-lg-10">
							<div class="cartbox__total__area">
								<div class="cart__total__amount">
									<a href="GioHang.php?mahd='.$_GET['mahd'].'&thanhtoan=true">Thanh toán</a>
								</div>
							</div>
						</div>
					</div>
					';
				}
				?>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cart__total__amount">
                                <span>Tổng Tiển</span>
                                <span><?php echo $TongTien;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
		<!-- cart-main-area end -->
		


    <div class="product-remove"





		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="index.php">
										<img src="images/logo/3.png" alt="logo">
									</a>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="index.php">Trending</a></li>
										<li><a href="index.php">Best Seller</a></li>
										<li><a href="index.php">All Product</a></li>
										<li><a href="index.php">Wishlist</a></li>
										<li><a href="index.php">Blog</a></li>
										<li><a href="index.php">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
	
</body>
</html>