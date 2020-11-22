<?php
    session_start();

    if (isset($_GET['xoahoadon']))
    {
        $conn = mysqli_connect("localhost","root","","webdb");
        mysqli_query($conn, "SET NAMES 'utf8'");
        $sqlHoaDon = "delete from tblchitiethd where mahd='".$_GET['mahd']."'";
        $conn->query($sqlHoaDon);

        $sqlHoaDon = "delete from tblhoadon where email='".$_SESSION['email']."'
         and mahd='".$_GET['mahd']."'";
        $conn->query($sqlHoaDon);
        header('location: hoadon.php');
    }else
    if (isset($_GET['thanhtoan'])) 
    {
        $conn = mysqli_connect("localhost","root","","webdb");
        mysqli_query($conn, "SET NAMES 'utf8'");

        $sqlHoaDon = "update tblhoadon
                SET TinhTrang='Đang thanh toán' WHERE MaHD = '".$_GET['mahd']."'";
        
        $conn->query($sqlHoaDon);     
        header('location: hoadon.php');   
    }else
    if (isset($_GET['idsach'])  && isset($_GET['soluong']) && isset($_GET['email']) ) 
    {
        
        if (isset($_GET['xoasanpham'])) 
        {
            $conn = mysqli_connect("localhost","root","","webdb");
            mysqli_query($conn, "SET NAMES 'utf8'");
            $sqlCTHoaDon = "Delete from tblchitiethd where maHD = '".$_GET['mahd']."'
             and idSach='".$_GET['idsach']."'";

            $conn->query($sqlCTHoaDon);
            $tongtien = $_GET['tongtien'] - ($_GET['soluong'] * $_GET['giaban']);
            $sqlHoaDon = "update tblhoadon SET TongTien='".$tongtien."' where maHD = '".$_GET['mahd']."'";  
            echo $sqlHoaDon;
            $conn->query($sqlHoaDon);
            
            header('location: chitiethd.php?mahd='.$_GET['mahd'].'');
        }
        else 
        {
            $idsach = $_GET['idsach'];
            $soluong = $_GET['soluong'];
            $email = $_GET['email'];
            
            if (  $_GET['soluong'] != '')
            {
                //hoa don
                $hoadon = 'HD';
                
                $conn = mysqli_connect("localhost","root","","webdb");
                mysqli_query($conn, "SET NAMES 'utf8'");

                $sqlSach = "select idSach,idTheLoai,giaBan from tblsach where idsach = '".$idsach."'";
                $resultSach = mysqli_query($conn, $sqlSach);
                $rowSach = mysqli_fetch_array($resultSach);
                $idTheLoai = $rowSach['idTheLoai'];
                $GiaBan = $rowSach['giaBan'];

                $sqlHoaDon = "select maHD,email,TongTien,TinhTrang from tblhoadon";
                $resultHoaDon = mysqli_query($conn, $sqlHoaDon);

                //tạo hóa đơn
                $a = 1;
                while ($rowHoaDon = mysqli_fetch_array($resultHoaDon) )
                    $a++;
                $hoadon = $hoadon.$a;    

                $flag = true;
                $tongtien = 0;
                $Tinhtrang = 'Đang xử lý';
                $resultHoaDon = mysqli_query($conn, $sqlHoaDon);
                while ($rowHoaDon = mysqli_fetch_array($resultHoaDon)) {
                    echo $rowHoaDon['maHD'] . " " . $rowHoaDon['TinhTrang'].'<br>';
                    if ($rowHoaDon['TinhTrang'] == 'Đang xử lý') {
                        $hoadon = $rowHoaDon['maHD'] ;
                        $tongtien = $rowHoaDon['TongTien'];
                        $Tinhtrang = 'Đang xử lý';
                        $flag = false;
                        break;
                    }
                }

            
            
                echo 'Đang là '.$hoadon;
                
                $date = getdate();
                $String =  $date['year'].'/'.$date['mon'].'/'.$date['mday'];
                
                $tongtien = $tongtien + ($GiaBan * $soluong);
                if (!$flag)
                {
                    $sqlHoaDon = "update tblhoadon
                    SET MaHD='".$hoadon."', Email='".$email."', TongTien='".$tongtien."',
                    TinhTrang='".$Tinhtrang."', NgayThang='".$String."' WHERE MaHD = '".$hoadon."'";
                }
                else 
                {
                    
                    $sqlHoaDon = "insert into tblhoadon
                    VALUES ('$hoadon','$email','$tongtien','$Tinhtrang','$String','$email')";
                }

                echo '<br>'.$sqlHoaDon;
                $conn->query($sqlHoaDon);

                $sqlCTHoaDon = "DELETE FROM tblchitiethd
                WHERE MaHD='".$hoadon."' and idSach = '".$idsach."'";
                
                $sqlSach = "select SoLuong from tblchitiethd where idsach = '".$idsach."' and MaHD ='".$hoadon."'";
                $resultSach = mysqli_query($conn, $sqlSach);
                $rowSach = mysqli_fetch_array($resultSach);
                if ( mysqli_num_rows($resultSach) == 0 ) 
                {
                    $sqlCTHoaDon = "insert into tblchitiethd
                    VALUES ('$hoadon','$idsach','$soluong','$GiaBan')";
                    $conn->query($sqlCTHoaDon);        
                }
                else
                {
                    $soluong = $_GET['soluong'] + $rowSach['SoLuong'];
                    $sqlCTHoaDon = "update tblchitiethd SET SoLuong='".$soluong."' where idsach = '".$idsach."' and MaHD ='".$hoadon."'";
                    $conn->query($sqlCTHoaDon);        
                }
                
                echo '<br>'.$sqlCTHoaDon;
                header("location: single-product.php?idsach=$idsach&idtl=$idTheLoai");

                //nếu không có tài khoản
                if ( $email == 'null')
                    header("location: login.php?yeucau");
            }
            else 
            {
                header('location: single-product.php?404=true&idsach='.$_GET['idsach'].'&idtl='.$_GET['idtl'].'');
            }
        }
								
    }
    else 
    {
        echo "lỗi";
        header("location: login.php?yeucau");
    }
?>