
<?php  
 if(isset($_POST["from_date"], $_POST["to_date"],$_POST["tableHD"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "webdb");  
      $output = '';  
      $query = "  
           SELECT * FROM tblhoadon  
           WHERE NgayThang BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
            <tr>
                <th>MaHD</th>
                <th>Email</th>
                <th>TongTien</th>
                <th>Ngày Xuất</th>
                <th>TinhTrang</th>
                <th>Check</th>
                <th>Xem</th>
                
            </tr>
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                <tr>
                <td>'.$row['MaHD'].'</td>
                <td>'.$row['Email'].'</td>
                <td>'.$row['TongTien'].'</td>
                <td>'.$row['NgayThang'].'</td>
                <td id="txtCheck">'.$row['TinhTrang'].'</td>
                <td>
                ';
                    
                        if ( $row['TinhTrang'] == 'Đã hoàn thành') {
                          $output .=' <?php echo '.''.';  ?> ';
                        }
                        else {
                          $output .= ' '.'
                          
                          <button type="submit" name="check_btn" class="btn btn-outline-success" 
                          value="'.$row['MaHD'].'" onclick="Check(this.value)">Check</button>
                        '.' ';
                        }
                    $output .='
                </td>
                <td>
                    <form action="chitietDonhang.php?id='.$row['MaHD'].'" method="post">
                    <input type="hidden" name="edit_id" value="'.$row['MaHD'].'">
                    <button type="submit" name="edit_btn" class="btn btn-outline-info">Xem</button>
                    </form>
                </td>
                
            </tr>
                '; 
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="7">Không tìm thấy hóa đơn</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 if(isset($_POST["from_date"], $_POST["to_date"],$_POST["tableTK"],$_POST['selectRole1']))
 {
      
     $connect = mysqli_connect("localhost", "root", "", "webdb");  
     $output1 = '';  
     $select = $_POST['selectRole1'];
     if($select==0)
     $select="Email_NhanVien";
     else
     $select="Email";
     
     $query = "  
          SELECT MaHD ,Email,Email_NhanVien,sum(TongTien) as TongTien,TinhTrang,NgayThang FROM tblhoadon  
          WHERE NgayThang BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' group by $select
          order by TongTien DESC
     ";  
     $result1 = mysqli_query($connect, $query);  
     $output1 .= ' 
     <table class="table table-bordered"  width="100%" cellspacing="0">
          <tr>
          <th>MaHD</th>
          <th>Email</th>
          <th>Email_NhanVien</th>
          <th>TongTien</th>
          <th>Ngày Xuất</th>
          </tr>
     ';
     if(mysqli_num_rows($result1) > 0)  
     {  
          while($row = mysqli_fetch_array($result1))  
          {  
               $output1 .= ' 
                <tr>
                    <td>'.$row['MaHD'].'</td>
                    <td>'.$row['Email'].'</td>
                    <td>'.$row['Email_NhanVien'].'</td>
                    <td>'.$row['TongTien'].'</td>
                    <td>'.$row['NgayThang'].'</td>
                </tr>
               ';

          }
     }else {  
          $output1 .= '  
               <tr>  
                    <td colspan="5">Không tìm thấy hóa đơn</td>  
               </tr>  
          ';  
     }
     $output1 .= '</table>';  
     echo $output1;  
}
 
?>

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