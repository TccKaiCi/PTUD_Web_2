<?php
	include 'scripts.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
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
		<div class="title"><h2>Quản lý Hóa đơn</h2></div>	
		<div class="search-container">
    		<form action="code.php" method="post">
      			<input type="text" placeholder="Search.." name="search">
      			<button type="submit" name="btnSearch_HD"><i class="fa fa-search"></i></button>
    		</form>
		  </div>

		  <div>
			  <br><br><br><br>
	<div class="col-md-3">  
	<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
	</div>  
	<div class="col-md-3">  
		<input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
	</div>  
	<div class="col-md-5">  
		<input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
	</div>  
	<div style="clear:both"></div>                 
	<br/>   
	</div>
<div class="table-responsive" id="tableHD">		  
<?php

	$connection = mysqli_connect("localhost","root","","webdb");
	$query = "SELECT * FROM tblhoadon";

	if (isset($_GET['search'])) {
		$search=$_GET['search'];
		$query="SELECT * FROM tblhoadon WHERE email LIKE '%$search%' OR mahd LIKE '%$search%' OR tongtien LIKE '%$search%' OR tinhtrang LIKE '%$search%' ";
	}

	$query_run = mysqli_query($connection,$query);
	
?>
<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>MaHD</th>
			<th>Email</th>
			<th>Email Nhân Viên</th>
			<th>TongTien</th>
			<th>TinhTrang</th>
			<th>Xem</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
		if(mysqli_num_rows($query_run)>0)
		{
			while($row = mysqli_fetch_assoc($query_run))
			{
				if ( $row['TinhTrang'] != 'Đang xử lý') {
				?>
		<tr>
			<td><?php echo $row['MaHD']; ?></td>
			<td><?php echo $row['Email']; ?></td>
			<?php 
				if ($row['Email'] == $row['Email_NhanVien'])
					echo '<td></td>';
				else
					echo '<td>'.$row['Email_NhanVien'].'</td>';
			?>
			<td><?php echo $row['TongTien']; ?></td>
			
			<td>
				
				<?php 
					if ( $row['TinhTrang'] == 'Đã hoàn thành' ) {
						echo 'Đã hoàn thành';
					}
					else {
						echo
						'
						<button type="submit" name="check_btn" class="btn btn-outline-success" value="'.$row['MaHD'].'" onclick="Check(this.value)">Hoàn thành</button>
						';
					}
				?>
			</td>
			<td>
				<form action="chitietDonhang.php?id=<?php echo $row['MaHD']; ?>" method="post">
				<input type="hidden" name="edit_id" value="<?php echo $row['MaHD']; ?>">
				<button type="submit" name="edit_btn" class="btn btn-outline-info">Xem</button>
				</form>
			</td>
			
		</tr>
		<?php
		}
			}
		}
		else{
			echo "<h2>Không tìm thấy hóa đơn</h2>";
		}
		?>
	</tbody>
	<script>
		function Check(str) {
  			var xhttp;  
 			if (str == "") {
    			document.getElementById("txtCheck").innerHTML = "";
   				 return;
  			}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtCheck").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "getCheck.php?q="+str, true);
		xhttp.send();
		setTimeout(function(){
			window.location.reload(1);
		}, 100);
		}
	</script>
</table>
																			

</div> 