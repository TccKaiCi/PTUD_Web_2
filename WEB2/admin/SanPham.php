<style>
	div.form-group {
		display: inline-block;
	}
</style>	
<body>
	<div class="" style="padding-left: 0px;">
		<div class="container dashboard-content">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<h5 class="card-header">Product</h5>
						<div class="card-body">
							<form action="themSanPham.php" data-parsley-validate="" method="post" enctype="multipart/form-data">
								<div class="form-group" style="float: left;">
									<label for="inputUserName">Tên sản phẩm</label>
									<input style="width: 400px;" type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" class="form-control">
								</div>
								<div class="form-group" style="width: 400px; margin-left: 100px;">
									<label for="inputEmail">Loại sản phẩm</label>
									<select name="cat_id" id="cat_id" class="form-control">
										<?php
										$conn = mysqli_connect("localhost","root","","webdb") or die("lỗi kết nối"); 
										$sqlSelectCat = "SELECT * FROM tbltheloai";
										$resultCat = mysqli_query($conn ,$sqlSelectCat) or die("lỗi truy vấn danh mục"."$sqlSelectCat");

										while ($rowCat = mysqli_fetch_assoc($resultCat)) {
										?>
											<option value="<?php echo $rowCat["idTheLoai"] ?>"><?php echo $rowCat["tenTheLoai"]?></option>
										<?php  
											}
										?>	
									</select>
								</div>	
								<div class="form-group" style="float: left;">
									<label for="inputPassword">Giá</label>
									<input type="text" name="price" id="price" placeholder="Giá" class="form-control">
								</div>
								<div class="form-group" style="margin-left: 100px;">
									<label for="inputRepeatPassword">Ảnh</label><br>
									<input type="file" name="image" id="image" >
								</div>
								<div class="form-group" style="float: right;">
									<label for="inputRepeatPassword">Mô tả</label>
									<textarea name="description" id="description" cols="50" rows="5"></textarea>
								</div>
								<br><br>
								<div class="form-group" style="float: left;">
									<label class="be-checkbox custom-control custom-checkbox"><input type="checkbox" name="status" id="status" class="custom-control-input" value="1"><span class="custom-control-label">Hiển Thị</span></label>
								</div>
								<div class="row" >
									<div class="col-sm-6 pl-0"style="margin-left: 44px;" >
										<p class="text-right" >
											<button type="submit" name="addNew" class="btn btn-space btn-primary">Thêm mới</button>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>