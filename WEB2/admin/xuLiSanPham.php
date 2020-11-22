<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	*{box-sizing: border-box;}
	.title{
		float:left;
	}
	.search-container{
		float:right;
		margin-top:10px;
	}
</style>
<div class="container dashboard-content">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
            <div class="card-header">
		<div class="title"><h2>Quản lý Sản Phẩm</h2></div>	
		<div class="search-container">
    		<form action="code.php" method="post">
      			<input type="text" placeholder="Search.." name="search">
      			<button type="submit" name="btnSearch_SP"><i class="fa fa-search"></i></button>
    		</form>
  		</div>
</div>
				<div class="card-body">
					<div class="table-reponsive">
						<table class="table table-striped table-border first">
								<tr>
									<th>Mã SP</th>
									<th>Tên SP</th>
									<th>Thể Loại</th>
									<th>Giá</th>
									<th>Ảnh</th>
									<th>Trạng Thái</th>
									<th>Xử lý</th>
								</tr>
								<?php
									$conn = mysqli_connect("localhost","root","","webdb") or die("lỗi kết nối") ;	

									$sqlSelect = "SELECT *FROM tblsach";

                                    if (isset($_GET['search'])) {
                                        $search=$_GET['search'];
                                        $sqlSelect="SELECT * FROM tblsach WHERE idSach LIKE '%$search%' OR tensach LIKE '%$search%' OR idTheLoai LIKE '%$search%' OR GiaBan LIKE '%$search%' OR HienThi LIKE '%$search%' ";
                                        // $sqlSelect="SELECT * FROM tblsach,tbltheloai WHERE ( tblsach.idTheLoai=tbltheloai.idTheLoai AND tbltheloai.tenTheLoai LIKE '%$search%') OR ( tblsach.idSach LIKE '%$search%' OR tblsach.tensach LIKE '%$search%' OR tblsach.GiaBan LIKE '%$search%' OR tblsach.HienThi LIKE '%$search%' )";
                                        // echo $sqlSelect.'<br>';
                                    }
                                    $result = mysqli_query($conn,$sqlSelect) ;
                                    $tranghientai = $_GET['tranghientai'];

									$sosptrentrang  = 3;
									$tongsosanpham = mysqli_num_rows($result);
									$sotrang = ceil($tongsosanpham / $sosptrentrang);
									$vitri = ($tranghientai-1)*$sosptrentrang; 
											
                                    $sql = "SELECT * FROM tblsach LIMIT ".$vitri.",".$sosptrentrang;	

                                    if (isset($_GET['search'])) {
                                        $search=$_GET['search'];
                                        $sql="SELECT * FROM tblsach WHERE idSach LIKE '%$search%' OR tensach LIKE '%$search%' OR idTheLoai LIKE '%$search%' OR GiaBan LIKE '%$search%' OR HienThi LIKE '%$search%' LIMIT ".$vitri.",".$sosptrentrang;
                                        // $sql="SELECT * FROM tblsach,tbltheloai WHERE ( tblsach.idTheLoai=tbltheloai.idTheLoai AND tbltheloai.tenTheLoai LIKE '%$search%') OR ( tblsach.idSach LIKE '%$search%' OR tblsach.tensach LIKE '%$search%' OR tblsach.GiaBan LIKE '%$search%' OR tblsach.HienThi LIKE '%$search%' ) LIMIT ".$vitri.",".$sosptrentrang;
                                        // echo $sql;
                                    }		
                                     
									mysqli_query($conn, "SET NAMES 'utf8'");
                                    $result = mysqli_query($conn, $sql);
                                            
									while ($row = mysqli_fetch_array($result)) {
                                        
                                    $query = 'SELECT idTheLoai,tenTheLoai FROM tbltheloai where idTheLoai='.$row["idTheLoai"].'';
                                    $query_run = mysqli_query($conn, $query);
                                    $rowTL = mysqli_fetch_array($query_run);
									
								?>
									<tr>
										<td><?php echo $row["idSach"]; ?></td>
										<td><?php echo $row["tensach"] ?></td>
										<td><?php echo $rowTL["tenTheLoai"] ?></td>
										<td><?php echo $row["GiaBan"] ?></td>
										<td>
											<?php
											echo 
											'
											<a href="./../single-product.php?idsach='.$row['idSach'].'&idtl='.$rowTL['idTheLoai'].'"><img src="./../images/books/'.$row["urlHinh"].'"width="50"></a>
											';
											?>
                                        <!-- <a href="single-product.php?idsach=<?php echo $row["idSach"]?>&idtl=<?php echo $row["idtheloai"]?>"><img src="./../images/books/<?php echo $row["urlHinh"] ?>"width="50"></a> -->
										</td>
										<td><?php echo ($row["HienThi"])?"Ẩn":"Hiển thị";?></td>
										<td>
										<a href="main.php?editSanPham=true&id=<?php echo $row["idSach"] ?>">
												<span><img src="image/sua.png" height="40" data-toggle="modal" data-target=" <?php echo '#EditModal'.$row['idSach'].'' ?>"></span>
											</a>
										<?php
										
                    if ( $row['HienThi'] == 0)
                    echo '<form action="code.php" method="POST">
					    <button type="submit" class="btn btn-outline-info" name="btn_LockSP" style="margin-left: 0px; padding-right: 19px; padding-left: 18px;">Ẩn</button>
						<input type="hidden" name="idSach" value="'.$row["idSach"].'">
						</form>
						';
                    else 
                    echo '<form action="code.php" method="POST">
						<button type="submit" class="btn btn-outline-info" name="btn_unLockSP">Hiện</button>
						<input type="hidden" name="idSach" value="'.$row["idSach"].'">
						</form>
			        ';
                ?>
										</td>
									</tr>
                                <?php } ?>
                                
                        </table>
                        <!-- <div style="margin-left: 300px;"> -->
                        
									<?php
                                        // duyệt xaut61 ra số trang
										for (  $i=1 ; $i<= $sotrang ; $i++) {
                                            if ( isset($_GET['search']))
											echo '
                                            <a href="main.php?act=onLeft&name=SanPham&tranghientai='.$i.'&search='.$_GET['search'].'">
                                            <div style="margin-left: 20px; width: 40px; height: 40px; border-radius: 100%; text-align: center; background-color: #33ccff; line-height: 40px; display: inline-block;">
                                            '.$i.'
                                            </div>
                                            </a>
                                            ';
                                            else
											echo '
                                            <a href="main.php?act=onLeft&name=SanPham&tranghientai='.$i.'">
                                            <div style="margin-left: 20px; width: 40px; height: 40px; border-radius: 100%; text-align: center; background-color: #33ccff; line-height: 40px; display: inline-block;">
                                            '.$i.'
                                            </div>
                                            </a>
											';
										}
                                    ?>
					</div>
				</div>
			</div>
		</div>					
	</div>	
</div>