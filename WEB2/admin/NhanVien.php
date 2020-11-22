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
<div class="card">
	<div class="card-header">
		<div class="title"><h2>Quản lý nhân viên</h2></div>	
		<div class="search-container">
    		<form action="code.php" method="post">
      			<input type="text" placeholder="Search.." name="search">
      			<button type="submit" name="btnSearch"><i class="fa fa-search"></i></button>
    		</form>
  		</div>
	</div>
	<div class="card-body">
	<div class="table-responsive">
<?php
    $connection = mysqli_connect("localhost", "root", "", "webdb");
	$query = "SELECT * FROM tbltaikhoan";

	if (isset($_GET['search'])) {
		$search=$_GET['search'];
		$query="SELECT * FROM tbltaikhoan WHERE email LIKE '%$search%' OR matkhau LIKE '%$search%' OR capbac LIKE '%$search%' OR Del LIKE '%$search%' ";
	}
	$query_run = mysqli_query($connection, $query);
	
  
?>
<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Email</th>
			<th>Mật khẩu</th>
			<th>Cấp bậc</th>
			<th>Lock(1)/unlock(0)</th>
			<th>Set Role</th>
			<th>Lưu</th>
			<th>Account</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
        if (mysqli_num_rows($query_run)>0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
<form action="code.php"  method="POST">
					<tr>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['matkhau']; ?></td>
			<td><?php echo $row['capbac']; ?></td>
			<td style="text-align:center;"><?php echo $row['Del'] ?></td>
			<td>
					<select name="selectRole">
					<option value="khachhang">Set Role</option>
					<option value="admin">Admin</option>
					<option value="nhanvien">Nhanvien</option>
					<option value="khachhang">Khachhang</option>
					</select>
			</td>
			<td>
					<input type="hidden" name="save_id" value="<?php echo $row['email']; ?>">
					<button type="submit" class="btn btn-outline-success" name="btn_Save">Save</button>
			</td>
			
			<?php
				if( $row['Del'] == 0)
				echo '<td><form action="code.php"  method="POST">
				<button type="submit" class="btn btn-outline-dark" name="btn_Lock">Lock</button>
				</td>';
				else
				echo '<td>	<form action="code.php"  method="POST">
				<button type="submit" class="btn btn-outline-info" name="btn_unLock">unLock</button>
				</td>'; 
			?>
			
				
		</tr>
		</form>
			
		<?php
            }
        } else {
            echo "Không tìm thấy nhân viên";
        }
        ?>
	</tbody>

	
</table>

</div> 
	</div>
</div>
