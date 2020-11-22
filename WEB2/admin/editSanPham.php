<?php
		$conn = mysqli_connect("localhost","root","","webdb") or die("lỗi kết nối"); 

		if (isset($_GET["id"])) {
			$id=$_GET["id"];
			$sqlGetID = "SELECT * FROM tblsach WHERE idSach='".$id."'";
			$result = mysqli_query($conn,$sqlGetID);
			$row = mysqli_fetch_array($result);

			$name = $row[1];
			$cat_id =$row[2];
			$price =$row[3];
			$fileName=$row[4];
			$description=$row[5];
			$status = $row[6];
		}

		if (isset($_POST["addNew"])) {
			$name = $_POST["name"];
		  	$status = ($_POST["status"])?$_POST["status"]:1;
		  	$id=random_int(5, 99);
		  	$cat_id = $_POST["cat_id"];
		  	$price = $_POST["price"];
		  	$description = $_POST["description"];
		  	$fileName=$_POST["fileName"];

			
			if(isset($_FILES["image"])){
				if ($_FILES["image"]["type"]=="image/jpeg" ||$_FILE["image"]["type"]=="image/jpg" ||$_FILES["image"]["type"]=="image/png" ||$_FILES["image"]["type"]=="image/gif") {
						if ($_FILES["image"]["error"]==0) {
							//Đưa file vào server
							$filename = $_FILES["image"]["tmp_name"];
							$path = "./../images/books/".$_FILES['image']['name'];
							move_uploaded_file($filename,$path);
							$fileName .="".$_FILES["image"]["name"]; 
						}else{
							echo "Lỗi file";
						}
				}else{
					echo "File không đúng định dạng";
				}
			}else{
				$fileName = $row[4];
			}
			
			// $data["image"] = $fileName;
			$sqlInsert ="UPDATE tblsach SET tensach ='$name', idTheloai='$cat_id'  ,GiaBan ='$price' ,urlHinh ='$fileName' ,thongTin ='$description' ,HienThi='$status' WHERE idSach =".$_GET["id"];
			Mysqli_query($conn,$sqlInsert) or die("Lỗi update sản phẩm".$sqlInsert);
			header('Location: main.php?act=onLeft&name=SanPham&tranghientai=1');
			// echo $sqlInsert;

		}
?>
	
	<div>
		<div class="container dashboard-content">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="card">
						<h5 class="card-header">Product</h5>
						<div class="card-body">
							<form action="" data-parsley-validate="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="inputUserName">Tên sản phẩm</label>
									<input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" class="form-control" value="<?php echo $row[1]?>">
								</div>
								<div class="form-group">
									<label for="inputEmail">Loại sản phẩm</label>
									<select name="cat_id" id="cat_id" class="form-control">

										<?php

										$sqlSelectCat = "SELECT idTheLoai,tenTheLoai FROM tbltheloai";
										$resultCat = mysqli_query($conn ,$sqlSelectCat) or die("lỗi truy vấn danh mục"."$sqlSelectCat");
										while ($rowCat = mysqli_fetch_array($resultCat)) {
											
											echo
											'
											<option value="'.$rowCat["idTheLoai"].'">'.$rowCat["tenTheLoai"].'</option>
											';			
										?>

										<?php
										}?>	
									</select>
								</div>	
								<div class="form-group">
									<label for="inputPassword">Giá</label>
									<input type="text" name="price" id="price" placeholder="Giá" class="form-control" value="<?php echo $row[3]?>">
								</div>
								<div class="form-group">
									<input type="file" name="image" id="image" value="<?php echo $row[4]?>" placeholder="<?php echo $row[4]?>">
								</div>
								<div class="form-group">
									<label for="inputRepeatPassword">Mô tả</label>
									<textarea name="description" id="description" cols="50" rows="10"><?php echo $row[5]?></textarea>
								</div>
								<div class="form-group">
									<label class="be-checkbox custom-control custom-checkbox"><input <?php  echo $row[6]?"checked":""?> type="checkbox" name="status" id="status" class="custom-control-input" value="0"><span class="custom-control-label" >Hiển Thị</span></label>
								</div>
								<div class="row">
									<div class="col-sm-6 pl-0" >
										<p class="text-right">
											<button type="submit" name="addNew" class="btn btn-space btn-primary">Cập Nhập</button>
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