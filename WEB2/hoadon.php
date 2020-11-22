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
												$sql = "select idtheloai,tentheloai from tbltheloai where HienThi = 0";			
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
									</div>
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
								<ul class="item item01">
											<li class="title">Thể Loại</li>
											<!-- <li><a href="#">Sách Kỹ Thuật Lập Trình </a></li>
											<li><a href="#">Sách Thuật Toán và Giải Thuật </a></li>
											<li><a href="#">Sách Tiếng Anh Chuyên Ngành </a></li> -->
											<?php 
												$conn = mysqli_connect("localhost","root","","webdb");
												$sql = "select idtheloai,tentheloai from tbltheloai where HienThi = 0";			
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
								</li>
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
							<button type="submit">Seacrh</button>
						</div>
					<input type="hidden" name="tranghientai" value="1">	
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
                                            <th class="product-name">Mã Hóa Đơn</th>
                                            <th class="product-subtotal">Tổng Tiền</th>
                                            <th class="product-quantity">Tình Trạng</th>
                                            <th class="product-remove">Remove</th>
                                            <th class="product-name">Chi Tiết Hóa Đơn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if (isset($_SESSION['email']))
											{
											$email = $_SESSION['email'];
											$conn = mysqli_connect("localhost","root","","webdb");
											$sqlHoaDon = "select maHD,email,TongTien,TinhTrang from tblhoadon where email = '".$email."'";
											$resultHoaDon = mysqli_query($conn, $sqlHoaDon);

											while ( $rowHoaDon = mysqli_fetch_array($resultHoaDon) ) 
											{
												echo 
												'
												<tr>
													<td class="product-name"><a href="chitiethd.php?mahd='.$rowHoaDon['maHD'].'">'.$rowHoaDon['maHD'].'</a></td>
													<td class="product-subtotal">'.$rowHoaDon['TongTien'].'</td>
													<td class="product-quantity"><p>'.$rowHoaDon['TinhTrang'].'</p></td>
												';

												if ( $rowHoaDon['TinhTrang'] == 'Đang xử lý' ) 
													echo 
													'
													<td class="product-remove"><a href="GioHang.php?xoahoadon=true&mahd='.$rowHoaDon['maHD'].'">X</a></td>
													';
												else 
													echo 
													'
													<td class="product-remove"></td>
													';
												echo 
												'
												<td class="product-name"><a href="chitiethd.php?mahd='.$rowHoaDon['maHD'].'">Hóa Đơn '.$rowHoaDon['maHD'].'</a></td>
												</tr>
												
												';	
											}
										}
										else 
										{
										echo 
										'
											<tr>
											<td class="product-name"><a href="chitiethd.php?mahd=HD1">HD1</a></td>
											<td class="product-subtotal">'.$_SESSION['TongTien'].'</td>
											<td class="product-quantity"><p>Chưa hoàn thành</p></td>
										';
										echo 
											'
											<td class="product-remove"><a href="GioHang_Session.php?xoahoadon=true">X</a></td>
											<td class="product-name"><a href="chitiethd.php?mahd=HD1">Hóa Đơn HD1</a></td>
											</tr>
											';			
										}
										?>
                                        <!-- <tr>
                                            <td class="product-name"><a href="#">Natoque penatibus</a></td>
                                            <td class="product-subtotal">$165.00</td>
                                            <td class="product-quantity"><p>1</p></td>
                                            <td class="product-remove"><a href="#">X</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>  
        </div>
		<!-- cart-main-area end -->
		






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