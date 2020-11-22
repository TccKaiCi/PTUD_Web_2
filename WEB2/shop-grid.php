<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Shop-Grid | Bookshop Responsive Bootstrap4 Template</title>
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<script>
		function changeFunc() {
			var selectBox = document.getElementById("selectBox");
			var selectedValue = selectBox.options[selectBox.selectedIndex].value;
			window.location = "shop-grid.php?idtl=<?php echo $_GET['idtl'];?>&tranghientai=1&sapxep="+selectedValue+""; 
		}
	</script>

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
													$sql2 = "select idtheloai from tblsach where idtheloai = '".$row['idtheloai']."' AND HienThi = 0";			
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
		

		
		
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Product Categories</h3>
        						<ul>
									<!-- khung bên trái -->
        							<?php 
										$conn = mysqli_connect("localhost","root","","webdb");
										$sql = "select idtheloai,tentheloai from tbltheloai where HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);


										while ( $row = mysqli_fetch_array($result) ) {
											// đếm số lượng sách
											$sql2 = "select idtheloai from tblsach where idtheloai = '".$row['idtheloai']."' AND HienThi = 0";			
											mysqli_query($conn, "SET NAMES 'utf8'");
											$result2 = mysqli_query($conn, $sql2);

											echo 
											'
												<li><a href="shop-grid.php?idtl='.$row['idtheloai'].'&tranghientai=1">'.$row['tentheloai'].'<span>'.mysqli_num_rows($result2).'</span></a></li>
									
											';			

										}
									?>
								</ul>
        					</aside>

        					<aside class="wedget__categories sidebar--banner">
								<img src="images/others/banner_left.jpg" alt="banner images">
								<div class="text">
									<h2>new products</h2>
									<h6>save up to <br> <strong>40%</strong>off</h6>
								</div>
        					</aside>
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        					<!-- <div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
									</div>
			                        <p>Showing 1–12 of 40 results</p> -->
									<?php 
										if (isset($_GET['idtl']) && isset($_GET['tranghientai']))
										{
											echo
											'
											<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
											<div class="orderby__wrapper">
												<span>Sort By</span>
												<select id="selectBox" class="shot__byselect" onchange="changeFunc();">
													<option>Default sorting</option> 
													<option value="tensach">Theo Chữ Cái</option>
													<option value="giaban">Theo Giá Tiền</option> 
												</select>
											</div>
											</div>
        					</div>
        				</div>
											';
										}
									?>
			                       
		                        
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
								<!-- Sản phẩm -->
								<div class="row">
									<!-- Start Single Product -->
									<?php 
									if (isset( $_GET['idtl'])) {
										$idtl = $_GET['idtl'];
										$tranghientai = $_GET['tranghientai'];

										$conn = mysqli_connect("localhost","root","","webdb");
										$sql = "select idSach from tblsach where idtheloai = '".$idtl."' and HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
												
										// số lượng sản phẩm
										$sosptrentrang  = 3;
										$tongsosanpham = mysqli_num_rows($result);
										$sotrang = ceil($tongsosanpham / $sosptrentrang);
										$vitri = ($tranghientai-1)*$sosptrentrang; 
										
										if (isset($_GET['sapxep'])) {
											$sapxep = $_GET['sapxep'];
											$sql = "SELECT * FROM tblsach WHERE idtheloai = '".$idtl."' and HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
										}
										else
											$sql = "SELECT * FROM tblsach WHERE idtheloai = '".$idtl."' and HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);

									}
									else if (isset($_GET['tranghientai'])){
										$tranghientai = $_GET['tranghientai'];

										$conn = mysqli_connect("localhost","root","","webdb");
										$sql = "select idSach from tblsach where HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
												
										// số lượng sản phẩm
										$sosptrentrang  = 6;
										$tongsosanpham = mysqli_num_rows($result);
										$sotrang = ceil($tongsosanpham / $sosptrentrang);
										$vitri = ($tranghientai-1)*$sosptrentrang; 
										
										$sql = "SELECT * FROM tblsach where HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);
									}
									if ( isset($_GET['timkiem'])) 
									{
										$tensach = $_GET['timkiem'];
										$sotrang = 0;
										$conn = mysqli_connect("localhost","root","","webdb");
										$sql = "select * from tblsach where tensach like '%".$tensach."%' and HienThi = 0";			
										mysqli_query($conn, "SET NAMES 'utf8'");
										$result = mysqli_query($conn, $sql);

										if (mysqli_num_rows($result) == 0)
											echo
											'
												<div style="text-align: center; margin-left: 150px;">
													<h2>Sản Phẩm Bạn Đang Tìm Kiếm Hiện Không Có</h2>
												</div>
											';
										else
										{
											// số lượng sản phẩm
											$tranghientai = $_GET['tranghientai'];

											$sosptrentrang  = 6;
											$tongsosanpham = mysqli_num_rows($result);
											$sotrang = ceil($tongsosanpham / $sosptrentrang);
											$vitri = ($tranghientai-1)*$sosptrentrang; 
											
											$sql = "SELECT * FROM tblsach where HienThi = 0 and tensach like '%".$tensach."%' LIMIT ".$vitri.",".$sosptrentrang;			
											mysqli_query($conn, "SET NAMES 'utf8'");
											$result = mysqli_query($conn, $sql);
										}	
									}
										while ( $row = mysqli_fetch_array($result) ) {
											echo 
											'
											<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
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
								<!-- PHân trang -->
	        					<ul class="wn__pagination">
									<?php
										
										// duyệt xaut61 ra số trang
										for (  $i=1 ; $i<= $sotrang ; $i++) {
											if (isset($_GET['sapxep'])) {
												$sapxep = $_GET['sapxep'];
												echo '
												<li><a href="shop-grid.php?idtl='.$idtl.'&tranghientai='.$i.'&sapxep='.$sapxep.'">'.$i.'</a></li>
												';
											}
											else {
												if ( isset($_GET['idtl'])) 
												echo '
												<li><a href="shop-grid.php?idtl='.$idtl.'&tranghientai='.$i.'">'.$i.'</a></li>
												';
												else
													if ( isset($_GET['timkiem']))
														echo '
														<li><a href="shop-grid.php?timkiem='.$_GET['timkiem'].'&tranghientai='.$i.'">'.$i.'</a></li>
														';
													else
														echo '
														<li><a href="shop-grid.php?tranghientai='.$i.'">'.$i.'</a></li>
														';
											}
										}
									?>
								</ul>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
		<!-- End Shop Page -->
		


		
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
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
							<!-- Sản phẩm -->
		 <!-- Modal -->
	<?php 
	if (isset( $_GET['idtl'])) {
		$idtl = $_GET['idtl'];
		$tranghientai = $_GET['tranghientai'];

		$conn = mysqli_connect("localhost","root","","webdb");
		$sql = "select idSach from tblsach where idtheloai = '".$idtl."' and HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
				
		// số lượng sản phẩm
		$sosptrentrang  = 3;
		$tongsosanpham = mysqli_num_rows($result);
		$sotrang = ceil($tongsosanpham / $sosptrentrang);
		$vitri = ($tranghientai-1)*$sosptrentrang; 
		
		if (isset($_GET['sapxep'])) {
			$sapxep = $_GET['sapxep'];
			$sql = "SELECT * FROM tblsach WHERE HienThi = 0 and idtheloai = '".$idtl."' and HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
		}
		else
			$sql = "SELECT * FROM tblsach WHERE HienThi = 0 and idtheloai = '".$idtl."' and HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);

	}
	else if ( !isset($_GET['timkiem'])) {
		$tranghientai = $_GET['tranghientai'];

		$conn = mysqli_connect("localhost","root","","webdb");
		$sql = "select idSach from tblsach where HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
				
		// số lượng sản phẩm
		$sosptrentrang  = 6;
		$tongsosanpham = mysqli_num_rows($result);
		$sotrang = ceil($tongsosanpham / $sosptrentrang);
		$vitri = ($tranghientai-1)*$sosptrentrang; 
		
		if (isset($_GET['sapxep'])) {
			$sapxep = $_GET['sapxep'];
			$sql = "SELECT * FROM tblsach where HienThi = 0 ORDER BY ".$sapxep." ASC LIMIT ".$vitri.",".$sosptrentrang;
		}
		else
			$sql = "SELECT * FROM tblsach where HienThi = 0 LIMIT ".$vitri.",".$sosptrentrang;			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);
	}		
	else
	{
		$tensach = $_GET['timkiem'];
		$sotrang = 0;
		$conn = mysqli_connect("localhost","root","","webdb");
		$sql = "SELECT * from tblsach where tensach like '%".$tensach."%' and HienThi = 0";			
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0)
			echo
			'
				<div style="text-align: center; margin-left: 150px;">
					<h2>Sản Phẩm Bạn Đang Tìm Kiếm Hiện Không Có</h2>
				</div>
			';
		else
		{
			// số lượng sản phẩm
			$tranghientai = $_GET['tranghientai'];

			$sosptrentrang  = 3;
			$tongsosanpham = mysqli_num_rows($result);
			$sotrang = ceil($tongsosanpham / $sosptrentrang);
			$vitri = ($tranghientai-1)*$sosptrentrang; 
			
			$sql = "SELECT * FROM tblsach where HienThi = 0 and tensach like '%".$tensach."%' LIMIT ".$vitri.",".$sosptrentrang;			
			mysqli_query($conn, "SET NAMES 'utf8'");
			$result = mysqli_query($conn, $sql);
		}			
	}					

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
		<script>
	</script>
	</body>
	</html>


	<body>
		
	</body>