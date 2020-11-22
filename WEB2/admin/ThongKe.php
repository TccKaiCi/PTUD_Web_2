
<?php
	include 'scripts.php';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

<style>
	.select1{
		margin-left:-15px;
	}
	.cardThongKe{
		display:inline-block;
	}
	.card1{
		background: linear-gradient(to top right, #0033cc 0%, #66ccff 100%);
		width:250px;
		height:150px;
	}
	.card2{
		background: linear-gradient(to top right, #ff6600 0%, #ffcc00 60%);
		width:250px;
		height:150px;
	}
	.card3{
		background: linear-gradient(to top right, #00ff99 27%, #00ff00 92%);
		width:250px;
		height:150px;
	}
	.card-title{
		text-align:center;
	}
	.card-header{
		text-align:center;
		color:black;
		font-family: "Times New Roman", Times, serif;
		font-size:20px;
	}
	.card-body{
		text-align:left;
		color:black;
		font-family: "Times New Roman", Times, serif;
		font-size:20px;
	}
</style>

<div><h2>Thống Kê</h2></div>
<div>
	
	<div class="col-md-2 select1">
				<select name="selectRole1" id="selectRole1" style=" height:34px; padding-top: 6px; padding-bottom: 6px; padding-left: 12px; padding-right: 12px;">
					<option value="0" >Nhân viên</option>
					<option value="1" >Khách hàng</option>
				</select>
	</div>
	<div class="col-md-3">  
	<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
	</div>  
	<div class="col-md-3">  
		<input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
	</div>  
	<div class="col-md-4">  
		<input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
	</div>  
	<div style="clear:both"></div>                 
	<br/>   
	
</div>




<div class="table-responsive" id="tableTK">
<?php
	
	$connection = mysqli_connect("localhost","root","","webdb");
	$query = "SELECT * FROM tblhoadon";
	$query_run = mysqli_query($connection,$query);
	
?>
<table class="table table-bordered"  width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>MaHD</th>
			<th>Email</th>
			<th>Email_NhanVien</th>
			<th>TongTien</th>
			<th>Ngày Xuất</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if(mysqli_num_rows($query_run)>0)
		{
			while($row = mysqli_fetch_assoc($query_run))
			{
				?>
		<tr>
			<td><?php echo $row['MaHD']; ?></td>
			<td><?php echo $row['Email']; ?></td>
			<td><?php echo $row['Email_NhanVien']?></td>
			<td><?php echo $row['TongTien']; ?></td>
			<td><?php echo $row['NgayThang'];?></td>
		</tr>
		<?php
			}
		}
		else{
			echo "<h2>Không tìm thấy hóa đơn</h2>";
		}
		?>
	</tbody>
	
</table>
</div> 

<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  //sửa link, làm tiếp thống kê: nhân viên, hd theo khoảng tgian -> in ra card
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#tableHD').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
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