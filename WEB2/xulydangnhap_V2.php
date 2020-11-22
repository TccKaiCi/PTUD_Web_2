<?php

process();

function process() {
    if ( isset($_GET['email']) ) {
        // xử lý đăng nhập
        $email = $_GET['email'];
        $matkhau = $_GET['matkhau'];
        //sql
        $conn = mysqli_connect("localhost","root","","webdb");
        $sql = "select email,matkhau,capbac,Del from tbltaikhoan where email = '".$email."'";
        $result = mysqli_query($conn, $sql);

        //nếu ko có đự liệu
        if ( mysqli_num_rows($result) == 0 ) {
            header('location: login.php?404');
        }
        else {
            $flag = false;
            while ($row = mysqli_fetch_array($result)) {
                if ( $matkhau == $row['matkhau']) {
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['matkhau'] = $matkhau;
                    $_SESSION['capbac'] = $row['capbac'];
                    if ($row['Del'] == 0) 
                    {
                        $flag = true;
                        header('location: login.php?thanhcong');
                    }
                    if ($row['capbac'] == 'admin' || $row['capbac'] == 'nhanvien') 
                    {
                        $flag = true;
                        header('location: ./admin/main.php');
                    }
                    break;
                }
            }
            if ($_SESSION['email'] != $email)
                header('location: login.php?404');

            if ($row['Del'] == 1)
                header('location: login.php?hacker');
            
            if (isset($_SESSION['CTHD']) && $flag)
            {
                
                $email =  $_GET['email'];
                 //hoa don
                $hoadon = 'HD';
                $conn = mysqli_connect("localhost","root","","webdb");
                mysqli_query($conn, "SET NAMES 'utf8'");

                $sqlHoaDon = "select maHD,email,TongTien,TinhTrang from tblhoadon where email = '".$email."'";
                $resultHoaDon = mysqli_query($conn, $sqlHoaDon);
                

                //tạo hóa đơn
                $a = 1;
                while ($rowHoaDon = mysqli_fetch_array($resultHoaDon) )
                    $a++;
                $hoadon = $hoadon.$a;  
                
                $date = getdate();
                $String =   $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $tongtien = $_SESSION['TongTien'];
                $Tinhtrang = 'Đang xử lý';

                $sqlHoaDon = "insert into tblhoadon
                VALUES ('$hoadon','$email','$tongtien','$Tinhtrang','$String','$email')";
                $conn->query($sqlHoaDon);
                
                //xử lý thêm hóa đơn nếu nhu có Session
                for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
                {
                    $idsach = $_SESSION['CTHD'][$i][0];
                    $soluong = $_SESSION['CTHD'][$i][1];
                    $sqlSach = "select idSach,idTheLoai,giaBan from tblsach where idsach = '".$idsach."'";
                    $resultSach = mysqli_query($conn, $sqlSach);
                    $rowSach = mysqli_fetch_array($resultSach);
                    $GiaBan = $rowSach['giaBan'];

                    $sqlCTHoaDon = "insert into tblchitiethd
                    VALUES ('$hoadon','$idsach','$soluong','$GiaBan')";
                    $conn->query($sqlCTHoaDon);

                    // header("location: index.php");
                }  

                session_unset();
                $_SESSION['email'] = $email;
                $_SESSION['matkhau'] = $matkhau;
                $_SESSION['capbac'] = $row['capbac'];
        }
    }}
    else {
        //báo lỗi và quay về trang chủ
        header('location: login.php?404');
    }
}

?>