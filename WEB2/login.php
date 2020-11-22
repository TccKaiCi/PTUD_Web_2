<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="./css/trung/style.css" rel="stylesheet">

    <link href="./vendors/fontawesome-free-5.11.2-web/css/all.css" rel="stylesheet">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Clothes Store</title>
</head>

<body id="register-body">
    <?php
        session_start();
        
        if (isset($_GET['thanhcong'])){
            $email = $_SESSION['email'];
            $conn = mysqli_connect("localhost","root","","webdb");
            $sql = "select hovaten,email from tblthongtin where email = '".$email."'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                if ( $matkhau == $row['matkhau']) {
                    $_SESSION['name'] = $row['hovaten'];
                }
            }
            header('location: index.php?hoanthanh');
        }

        if (isset($_GET['hoanthanh'])){
            // This is in the PHP file and sends a Javascript alert to the client
            $message = "Đăng ký thành công, vui lòng đăng nhập lại";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        if (isset($_GET['404'])){
            // This is in the PHP file and sends a Javascript alert to the client
            $message = "Đăng nhập sai";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        if (isset($_GET['hacker'])){
            // This is in the PHP file and sends a Javascript alert to the client
            $message = "Tài khoản của bạn đã bị khóa vui lòng liên hệ để biết thêm thông tin chi tiết";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        if (isset($_GET['yeucau'])){
            // This is in the PHP file and sends a Javascript alert to the client
            // $message = "Vui lòng đăng nhập";
            // echo "<script type='text/javascript'>alert('$message');</script>";
        }
    ?>
    <!-- Sản phẩm mới -->
    <div class="container" style="margin-top: -200px;">
        <div id="login-container" class="card" style="margin-top: 300px;">
            <h5 class="card-header text-center bg-dark text-white">Đăng nhập</h5>
            <div class="card-body">

                <form action="xulydangnhap_V2.php" method="GET">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input required type="email" name="email" onkeyup="showHint(this.value)" class="form-control" placeholder="email@example.com">
                            <p style="color:red;" id="checkmail"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input required type="password" name="matkhau" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                                <a class="btn btn-link float-right" href="./register.php">Chưa có tài khoản. Đăng ký thôi!!!</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                                <button class="btn btn-dark float-right" name="button" type="submit" value="Đăng nhập"> Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    <footer class="text-white bg-dark">

    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="./js/trung/login.js"></script>
    <script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("checkmail").innerHTML = "";
        return;
    } 
    else 
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("checkmail").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "gethint_TK.php?q=" + str, true);
        xmlhttp.send();
    }
    }
    </script>
</body>

</html>