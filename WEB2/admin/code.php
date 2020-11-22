<?php
    if (isset($_POST['btn_Save'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        if (isset($_POST['btn_Save'])&& isset($_POST['selectRole']) && isset($_POST['save_id'])) {
            $role=$_POST['selectRole'];
            $idSave=$_POST['save_id'];

            $sql = "UPDATE tbltaikhoan SET capbac='$role' WHERE email='$idSave'";
            $conn->query($sql);

            header("location: main.php?act=onLeft&name=NhanVien");
        }
    }
    if (isset($_POST['btn_Lock'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $idSave=$_POST['save_id'];

        $sql = "UPDATE tbltaikhoan SET Del='1' WHERE email='".$idSave."'";
        $conn->query($sql);
        header("location: main.php?act=onLeft&name=NhanVien");
    }
    if (isset($_POST['btn_unLock'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $idSave=$_POST['save_id'];

        $sql = "UPDATE tbltaikhoan SET Del='0' WHERE email='".$idSave."'";
        $conn->query($sql);
        header("location: main.php?act=onLeft&name=NhanVien");
    }
    
    if(isset($_POST['btnAdd'])){
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $idTheloai=$_POST['inpIDTheloai'];
        $TenTheLoai=$_POST['inptenTheloai'];
        if($idTheloai!="" && $TenTheLoai!=""){
        $sql = "INSERT INTO tbltheloai(idTheLoai, tenTheLoai, HienThi) VALUES ('".$idTheloai."','".$TenTheLoai."',0)";
        $conn->query($sql);
        header("location: main.php?act=onLeft&name=TheLoai");
        }else{header("location: main.php?act=onLeft&name=TheLoai");}
    }

    if(isset($_POST['btnEdit'])){
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $idTheloai=$_POST['inpIDTheloai1'];
        $TenTheLoai=$_POST['inptenTheloai1'];
        if( $TenTheLoai!=""){
        $sql = "UPDATE tbltheloai SET tenTheLoai='$TenTheLoai' WHERE idTheLoai='$idTheloai'";
        echo $sql;
        $conn->query($sql);
        header("location: main.php?act=onLeft&name=TheLoai");
        }else{header("location: main.php?act=onLeft&name=TheLoai");}
    }

    if (isset($_POST['btn_LockTL'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $id=$_POST['idTheloai'];
        $sql = "UPDATE tbltheloai SET HienThi='1' WHERE idTheLoai='$id'";
        $result = mysqli_query($conn, $sql);
        
        $sql1 = "SELECT idTheLoai FROM tbltheloai WHERE idTheLoai='$id'";
        $result1 = mysqli_query($conn, $sql1);
        
            while ($row = mysqli_fetch_array($result1)){
                $sql2 = "UPDATE tblsach SET HienThi='1' WHERE idTheLoai='".$row['idTheLoai']."'";
                $result2 = mysqli_query($conn, $sql2);
            }
        
        header("location: main.php?act=onLeft&name=TheLoai");
    }
    if (isset($_POST['btn_unLockTL'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $id=$_POST['idTheloai'];
        $sql = "UPDATE tbltheloai SET HienThi='0' WHERE idTheLoai='$id'";
        $result = mysqli_query($conn, $sql);

        $sql1 = "SELECT idTheLoai FROM tbltheloai WHERE idTheLoai='$id'";
        $result1 = mysqli_query($conn, $sql1);
        
            while ($row = mysqli_fetch_array($result1)){
                $sql2 = "UPDATE tblsach SET HienThi='0' WHERE idTheLoai='".$row['idTheLoai']."'";
                $result2 = mysqli_query($conn, $sql2);
            }
        
        header("location: main.php?act=onLeft&name=TheLoai");
    }

    if(isset($_POST['btnSearch'])){
        $search=$_POST['search'];
        header("location: main.php?act=onLeft&name=NhanVien&search=$search");
    }
    if(isset($_POST['btnSearch_HD'])){
        $search=$_POST['search'];
        header("location: main.php?act=onLeft&name=DonHang&search=$search");
    }
    if(isset($_POST['btnSearch_TL'])){
        $search=$_POST['search'];
        header("location: main.php?act=onLeft&name=TheLoai&search=$search");
    }
    if(isset($_POST['btnSearch_SP'])){
        $search=$_POST['search'];
        header("location: main.php?act=onLeft&name=SanPham&tranghientai=1&search=$search");
    }

    if (isset($_POST['btn_LockSP'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $id=$_POST['idSach'];
        echo $_POST['idSach'];
        $sql = "UPDATE tblsach SET HienThi='1' WHERE idSach='$id'";
        $result = mysqli_query($conn, $sql);
        
        $sql1 = "SELECT idSach FROM tblsach WHERE idSach='$id'";
        $result1 = mysqli_query($conn, $sql1);
        
            while ($row = mysqli_fetch_array($result1)){
                $sql2 = "UPDATE tblsach SET HienThi='1' WHERE idSach='".$row['idSach']."'";
                $result2 = mysqli_query($conn, $sql2);
            }
        echo $sql2;
        header("location: main.php?act=onLeft&name=SanPham&tranghientai=1");
    }
    if (isset($_POST['btn_unLockSP'])) {
        $conn = mysqli_connect("localhost", "root", "", "webdb");
        $id=$_POST['idSach'];
        echo $_POST['idSach'];
        $sql = "UPDATE tblsach SET HienThi='0' WHERE idSach='$id'";
        $result = mysqli_query($conn, $sql);

        $sql1 = "SELECT idSach FROM tblsach WHERE idSach='$id'";
        $result1 = mysqli_query($conn, $sql1);
        
            while ($row = mysqli_fetch_array($result1)){
                $sql2 = "UPDATE tblsach SET HienThi='0' WHERE idSach='".$row['idSach']."'";
                $result2 = mysqli_query($conn, $sql2);
            }
            echo $sql2;
        header("location: main.php?act=onLeft&name=SanPham&tranghientai=1");
    }

?>