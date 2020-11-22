<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Phiếu đặt phòng</title>
	<script src="main.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

	<form name="frmdangky" action="#" method="get" onsubmit="return xulysubmit();">
		<div style="border:#999999 solid 3px; width:100%; margin:auto;"  >

			<div style="text-align:center; height:30px; line-height:30px; background-color:#999999">PHIẾU ĐẶT PHÒNG</div>
			
			<div >
				<div class="left">Họ tên*</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="text" value="" name="txtHoTen" id="idtxtHoTen" /></div>
				<div id="txtHoTenError" style="color: red;" class="right" >Điền họ và tên</div>
			</div>
			
			<div class="divwrapper">
				<div class="left">Địa chỉ</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="text" value="" name="txtDiaChi" id="idtxtDiaChi" /></div>	
			</div>
			
			<div class="divwrapper">
				<div class="left">Số chứng minh nhân dân*</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="text" value="" name="txtCMT" id="idtxtCMT" /></div>
				<div style="color: red;" id="txtCMTError" class="right">Điền  CMT</div>
			</div>

			<div class="divwrapper">
				<div class="left">Mức giá</div>
			</div>

			<div class="divwrapper">
				<div>
					<select class="form-control" id="idtxtMucGia" name="txtMucGia" onchange="changeFunc();">
						<option value="150">Loại thường</option>
						<option value="300">Loại sang trọng</option>
						<option value="500">Loại đặt biệt</option>
					</select>
				</div>
			</div>

			<div class="divwrapper">
				<div class="left">Phòng tập thể</div>
			</div>

			<div class="divwrapper">
				<div>
					<select class="form-control" id="idtxtPTT" name="txtPTT">
							<option value="0">Phòng đơn</option>
							<option value="0.8">Phòng đôi</option>
							<option value="2">Phòng tập thể</option>
					</select>
				</div>
			</div>

			<div class="divwrapper">
				<div class="left">Thời gian thuê</div>
			</div>

			<div class="divwrapper">
				<div>
					<select class="form-control" id="genderSelect" name="">
							<option value="0">Tùy chỉnh</option>
							<option value="1">Một tuần</option>
							<option value="2">Một tháng</option>
					</select>
				</div>
			</div>

			<div class="divwrapper">
				<div class="left">Ngày thuê</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="date" value="<?php echo date('Y-m-d')?>" name="txtNgayThue" id="idtxtNgayThue"></div>
				<div style="color: red;" id="txtNgayThueError" class="right" >Sai ngày tháng năm</div>
			</div>

			<div class="divwrapper">
				<div class="left">Ngày trả</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="date"value="" name="txtNgayTra" id="idtxtNgayTra"></div>
				<div style="color: red;" id="txtNgayTraError" class="right" >Sai ngày tháng năm</div>
			</div>

			<div class="divwrapper">
				<div class="left">Dịch vụ ăn kèm</div>
			</div>

			<div class="divwrapper">
				<input class="checkbox" type="checkbox" id="idtxtAnSang" name="txtAnSang" value="0.05" onchange="changeFunc();">
				<label for="idtxtAnSang"> Ăn Sáng</label><br>
				<input class="checkbox" type="checkbox" id="idtxtAnTrua" name="txtAnTrua" value="0.05">
				<label for="idtxtAnTrua"> Ăn Trưa</label><br>
				<input class="checkbox" type="checkbox" id="idtxtAnToi" name="txtAnToi" value="0.05">
				<label for="idtxtAnToi"> Ăn Tối</label><br>
			</div>

			<div class="divwrapper">
				<div class="left">Đơn giá một ngày*</div>
			</div>

			<div class="divwrapper">
				<div class="textleft"><input type="text" name="txtDonGia" id="idtxtDonGia" ></div>	
			</div>
		
			
			<div style="clear:both">
				<input type="button" onclick="tinhTien()" id="idtxtTinhDon" name="txtTinhDon" value="Tính đơn giá" style="width:100px; height:25px; margin-left:100px; margin-bottom:20px; margin-top: 25px;" >
				<input type="submit" value="Đăng Ký" style="width:100px; height:25px; margin-left:100px; margin-bottom:20px; margin-top: 25px;" >
			</div>
		</div>

	</form>
</body>
<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
</html>