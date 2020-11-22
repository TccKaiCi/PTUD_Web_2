<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Trang Chủ | Cửa hàng sách</title>
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
<?php session_start(); ?>
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
													$sql2 = "select idtheloai from tblsach where idtheloai = '".$row['idtheloai']."' and HienThi = 0";			
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
												<span>Tài Khoản Của Bạn 
													
												<?php 
															if (isset($_SESSION['email']))
															{
																$conn = mysqli_connect("localhost","root","","webdb");
																$sql = "select hovaten from tblthongtin where email = '".$_SESSION['email']."'";			
																mysqli_query($conn, "SET NAMES 'utf8'");
																$result = mysqli_query($conn, $sql);
																$row = mysqli_fetch_array($result);
																echo $row['hovaten'];
															}
															else
															{
																echo 'người lạ';
															}
															
														?>
												</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="myaccount.php">Thông Tin Tài Khoản
														</a></span>
														<?php
															function runMyFunction() {
																session_unset();	
															}
															
															if (isset($_GET['signout'])) {
																runMyFunction();
															}
															if (isset($_SESSION['email']) ) {
																echo '<span><a href="index.php?signout=true" >Đăng Xuất</a></span>';
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
		<!-- Start Slider area -->
		<br><br><br><br>
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Mua những <span>Quyển sách </span></h2>
		            				<h2>yêu thích của <span>Bạn </span></h2>
		            				<h2>tại <span>Đây </span></h2>
				                   	<a class="shopbtn" href="#">MUA NGAY!!!</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Mua những <span>Quyển sách </span></h2>
		            				<h2>yêu thích của <span>Bạn </span></h2>
		            				<h2>tại <span>Đây </span></h2>
				                   	<a class="shopbtn" href="#">MUA NGAY</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->











		
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><span class="color--theme">Sản Phẩm</span> Mới </h2>
							<p>Chúng tôi có rất nhiều sản phẩm mới nhân dịp lễ Giáng Sinh sắp tới, thông tin cho tiết sẽ có trên Fanpage vài ngày tới!</p>
						    <br><br><br>	
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<!-- Sản phẩm -->
				<div class="row">
				<!-- Start Single Product -->
									<?php 
										$conn = mysqli_connect("localhost","root","","webdb");
										$sql = "select * from tblsach where HienThi = 0 ORDER BY idSach DESC LIMIT 0,4";
										//SELECT * FROM `tblsach` ORDER BY idSach DESC LIMIT 0,4			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
										
										while ( $row = mysqli_fetch_array($result) ) {
											echo 
											'
											<div class="product product__style--3 col-lg-3 col-md-5 col-sm-4 col-12">
												<div class="product__thumb">
													<a class="first__img" href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'"><img src="images/books/'.$row[4].'" alt="product image"></a>
													<a class="second__img animation1" href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'"><img src="images/books/'.$row[4].'" alt="product image"></a>
												</div>
												<div class="product__content content--center">
													<h4><a href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'">'.$row[1].'</a></h4>
													<ul class="prize d-flex">
														<li>'.$row[3].'</li>
													</ul>
													<div class="action">
														<div class="actions_inner">
															<ul class="add_to_links">
																<li><a href="#productmodal'.$row[0].'" data-toggle="modal"  title="Quick View" class="quickview modal-view detail-link" ><i class="bi bi-search"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											';			
										}
									?>
		        					<!-- End Single Product -->
									
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>Ở lại với chúng tôi!</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Đăng kí để được nhận thông báo mới nhất khi chúng tôi phát hành sách mới cũng như nhận được những ưu đãi đặc biệt dành riêng cho quý khách.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Điền e-mail của bạn">
									<button >Đăng kí</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2"><span class="color--theme">Blog </span>của chúng tôi!</h2>
							<p>Hãy để lại bình luận của bạn dưới đây!</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="#">Những hoạt động quốc tế về sách ở Frankfurt </a></h3>
								<p>Chúng tôi tự hào công bố phiên bản đầu tiên của tin tức frankfurt.</p>
								<div class="post__time">
									<span class="day">Dec 09, 00</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="#">Việc đọc sách sẽ giúp bạn tiếp thu được những thông tin quan trọng.</a></h3>
								<p>Tìm ra những thông tin bạn cần để cải thiện sự trải nghiệm của bản thân bạn.	</p>
								<div class="post__time">
									<span class="day">Mar 25, 00</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="#">Hội chợ sách London sẽ được tổ chức một cách thú vị </a></h3>
								<p>Hội chợ sách London là nơi bạn có thể mua được những quyển sách hay ho và thú vị, hợp với mọi độ tuổi.</p>
								<div class="post__time">
									<span class="day">Jan 14, 18</span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->









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
									<p>"Việc đọc rất quan trọng. Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn.” - Barack Obama</p>
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
										<li><a href="index.php">Đang Hot</a></li>
										<li><a href="index.php">Tác Phẩm Bán Chạy</a></li>
										<li><a href="index.php">Tất Cả Sản Phẩm</a></li>
										<li><a href="index.php">Yêu Thích</a></li>
										<li><a href="index.php">Blog</a></li>
										<li><a href="contact.php">Liên Hệ</a></li>
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
		
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
							<!-- Sản phẩm -->
		 <!-- Modal -->
	<?php 
	$conn = mysqli_connect("localhost","root","","webdb");
	$sql = "select * from tblsach where HienThi = 0 ORDER BY idSach DESC LIMIT 0,4";
	//SELECT * FROM `tblsach` ORDER BY idSach DESC LIMIT 0,4			
	mysqli_query($conn, "SET NAMES 'utf8'");
	$result = mysqli_query($conn, $sql);

	while ( $row = mysqli_fetch_array($result) ) {
		echo 
		'
		<div class="modal fade" id="productmodal'.$row[0].'" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">

		                <div class="modal-body">
							<div class="modal-product">
							
								<!-- Start product images -->
								<div class="product-images">
									<div class="main-image images">
										<img src="images/books/'.$row[4].'">
									</div>
								</div>

		                        <div class="product-info">
									<h1>'.$row[1].'</h1>
									
									<div class="rating__and__review">
										<div class="review">
											<a href="#">4 customer reviews</a>
										</div>
									</div>

									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">'.$row[3].'</span>
										</div>
									</div>

									<div class="quick-desc">
										'.$row[5].'
									</div>

									<div class="addtocart-btn">
										<a href="single-product.php?idsach='.$row[0].'&idtl='.$row[2].'">Add to cart</a>
									</div>
									
								</div>
								
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		';	
	}
?>
<!-- End Single Product -->								

		    </div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
		
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