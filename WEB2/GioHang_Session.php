<!-- <form action="GioHang.php?idsach='.$_GET['idsach'].'&email='.$email.'" method="GET">
<span>Số Lượng</span>
<input class="input-text qty" name="soluong" min="1" value="1" title="Qty" type="number">
<input type="hidden" name="idsach" value="'.$_GET['idsach'].'"></input>
<input type="hidden" name="email" value="'.$email.'"></input>
<div class="addtocart__actions">
<button class="tocart" type="submit" title="Add to cart">Thêm Vào Giỏ Hàng</button>
</div>
</form>											 -->

<?php
    session_start();
    if (isset($_GET['email'])) 
    if($_GET['email'] == "null")
    {
        $_SESSION['maHD'] = 'HD1';

        if (!isset($_SESSION['CTHD']))
        {
            $conn = mysqli_connect("localhost","root","","webdb");
			$sql = "select GiaBan from tblsach where idsach = '".$_GET['idsach']."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            if (  $_GET['soluong'] == '') 
            {
                header('location: single-product.php?404=true&idsach='.$_GET['idsach'].'&idtl='.$_GET['idtl'].'');
            }
            else
            {
                $arr = array($_GET['idsach'], $_GET['soluong']);
                $_SESSION['CTHD'][1] = $arr;
                $_SESSION['TongTien'] = $row['GiaBan'] * $_GET['soluong'];
            }
        }
        else
        {
            if (  $_GET['soluong'] == '') 
            {
                header('location: single-product.php?404=true&idsach='.$_GET['idsach'].'&idtl='.$_GET['idtl'].'');
            }
            else
            {
                var_dump($_SESSION['CTHD']);
                $flag = true;
                for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
                {
                    if ($_SESSION['CTHD'][$i][0] == $_GET['idsach'])
                    {
                        $flag = false;
                        $conn = mysqli_connect("localhost","root","","webdb");
                        $sql = "select GiaBan from tblsach where idsach = '".$_GET['idsach']."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);

                        $soluong = $_GET['soluong'] + $_SESSION['CTHD'][$i][1];
                        $giaban = $row['GiaBan'];
                        $_SESSION['TongTien'] += $row['GiaBan'] * $_GET['soluong'];
                        $_SESSION['CTHD'][$i][1] = $soluong;
                    }
                } 
                
                if ($flag)
                {
                    $conn = mysqli_connect("localhost","root","","webdb");
                    $sql = "select GiaBan from tblsach where idsach = '".$_GET['idsach']."'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);

                    $i = count($_SESSION['CTHD']) + 1;
                    $arr = array($_GET['idsach'], $_GET['soluong']);
                    $_SESSION['CTHD'][$i] = $arr;
                    $_SESSION['TongTien'] += $row['GiaBan'] * $_GET['soluong'];
                }

                for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
                {
                    echo '<br>';
                    echo $_SESSION['CTHD'][$i][0].'<br>';
                    echo $_SESSION['CTHD'][$i][1].'<br>';
                } 
                header('location: shop-grid.php?tranghientai=1');
            }
        } header('location: shop-grid.php?tranghientai=1');
    }
    else
    {
        if (isset($_GET['email'])) 
        {
            echo $_GET['email'];
            echo '<br>';
         }
    }
    if (isset($_GET['xoahoadon']))  
    {
        session_unset();
        header('location: index.php');
    }
    if (isset($_GET['xoahoadon_SanPham']))  
    {
        $j = 1;
        $conn = mysqli_connect("localhost","root","","webdb");
        $sql = "select GiaBan from tblsach where idsach = '".$_GET['idsach']."'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result);
        if (count($_SESSION['CTHD']) == 1) 
        {
            session_unset();
            header('location: index.php');
        }
        else 
        {
            $_SESSION['CTHD_SubMain'] = null;
            for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
            {
                if ($_SESSION['CTHD'][$i][0] != $_GET['idsach'])
                {
                    $arr = array($_SESSION['CTHD'][$i][0], $_SESSION['CTHD'][$i][1]);
                    $_SESSION['CTHD_SubMain'][$j] = $arr;
                    $j ++;
                }
                else
                {
                    $_SESSION['TongTien'] -= $row['GiaBan'] * $_SESSION['CTHD'][$i][1];
                }
            } 
            $_SESSION['CTHD'] = $_SESSION['CTHD_SubMain'];
            for($i = 1 ; $i <= count($_SESSION['CTHD'] ) ; $i++) 
            {
                echo '<br>';
                echo $_SESSION['CTHD'][$i][0].'<br>';
                echo $_SESSION['CTHD'][$i][1].'<br>';
            } 
        }
        header('location: chitiethd.php?mahd=HD1');
    }

?>