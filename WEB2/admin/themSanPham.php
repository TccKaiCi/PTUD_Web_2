<?php
		$conn = mysqli_connect("localhost","root","","webdb") or die("lỗi kết nối"); 

		$sqlSelectCat = "SELECT * FROM tbltheloai";
		$resultCat = mysqli_query($conn ,$sqlSelectCat) or die("lỗi truy vấn danh mục"."$sqlSelectCat");

		if (isset($_POST["addNew"])) {
			$name = $_POST["name"];
		  	$status = ($_POST["status"])?$_POST["status"]:0;
		  	$id=random_int(10, 500);
		  	$cat_id = $_POST["cat_id"];
		  	$price = $_POST["price"];
		  	$description = $_POST["description"];



			$fileName="";
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
				 // echo "<pre>";
				 // print_r($row);
				 // die; 
			}
			
			$data["image"] = $fileName;
			$sqlInsert ="INSERT INTO tblsach VALUES('$id','$name','$cat_id','$price','$fileName','$description','$status')";
			Mysqli_query($conn,$sqlInsert) or die("Lỗi thêm mới sản phẩm".$sqlInsert);
			header('Location: main.php?act=onLeft&name=SanPham&tranghientai=1');
			// echo $sqlInsert;

		}
	?>