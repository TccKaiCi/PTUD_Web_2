<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<style>
	.header{
		border-style: solid;
		border-color: Black;
	}
	.footer{
		border-style: solid;
		padding-top: 50px;
	}

	.left {
		border-style: solid;
		border-color: black;
		/* background:  #33ccff; */
	}
	.center {
		border-style: solid;
		border-color: black;
	}
	.col-md-2 div{
		margin-top: 20px;
		border-style: solid;
		border-color: black;
	}
	.col-md-2 div:hover{
		background-color: red;
	}
	.textfield {
		width: 100px;
	}
	a {
		color: black;
		font-size: 20px;
		
	}
	a:hover {
		text-decoration: none;
		color: black;
	}
	.trai {
		margin-top:10px; 
		margin-bottom:10px; 
		text-align:center;
		background-color: blanchedalmond;
	}
</style>
<body>
<?php
	session_start(); 
	if ($_SESSION['capbac'] != 'admin' && $_SESSION['capbac'] != 'nhanvien') 
		header("location: ./../index.php");
	else {
?>
<div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" >
	<div class="row" style="background: linear-gradient(to right, #33ccff 0%, #ff99cc 100%);">
		<div class="col header" style="color: white;" ><h2 style="text-align:center; padding-top:25px; padding-bottom: 25px;" >Trang Quản Trị (Admin)</h2></div>
	</div>

	<div class="row" >
		<div class="col-md-2 col-sm-2 left" >
			<?php 
			if ($_SESSION['capbac'] == 'admin') 
			echo 
			'
			<a href="main.php?act=onLeft&name=NhanVien"><div class="trai">Nhân Viên</div></a>
			';
			else
			{
			?>
			<a href="main.php?act=onLeft&name=DonHang"><div class="trai" >Đơn Hàng</div></a>
			<a href="main.php?act=onLeft&name=TheLoai"><div class="trai" >Thể Loại</div></a>
			<a href="main.php?act=onLeft&name=ThongKe"><div class="trai" >Thống Kê</div></a>
			<a href="main.php?act=onLeft&name=SanPham&tranghientai=1"><div class="trai" >Sản Phẩm</div></a>
			<a href="main.php?act=onLeft&name=xuLiSanPham"><div class="trai" >Thêm Sản Phẩm</div></a>
			<?php
			}
			?>
			<a href="./../index.php?signout=true"><div class="trai" >Đăng xuất</div></a>

		</div>	
		<div class="col-md-10 col-sm-10 center">
			<?php 
				if( isset( $_GET['act'] ) )
					if( $_GET['act'] == 'onLeft')
					{
						
						if ( $_GET['name'] == 'ThongKe' )	
							include 'ThongKe.php';			
						if ( $_GET['name'] == 'DonHang' )	
							include 'DonHang.php';			
						if ( $_GET['name'] == 'NhanVien' )
							include 'NhanVien.php';
						if ( $_GET['name'] == 'TheLoai' )
							include 'TheLoai.php';
						if ( $_GET['name'] == 'SanPham' )
							include 'xuLiSanPham.php';
						if ( $_GET['name'] == 'xuLiSanPham' )
							include 'SanPham.php';
					}
					if ( isset ( $_GET['editSanPham']))
						include  'editSanPham.php';	
			?>
		</div>	
	</div>


</div>
<?php } ?>	
</body>

</html>