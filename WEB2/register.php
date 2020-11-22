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

    <title>Clothes Store</title>
</head>

<body id="register-body">

    <?php
        if (isset($_GET['hoanthanh'])){
            // This is in the PHP file and sends a Javascript alert to the client
            header("location: login.php?hoanthanh");
        }
        if (isset($_GET['thatbai'])) {
             // This is in the PHP file and sends a Javascript alert to the client
             $message = "Đăng ký thất bại";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        if (isset($_GET['404'])) {
            // This is in the PHP file and sends a Javascript alert to the client
            $message = "Email và tài khoản đã có chủ sở hữu";
            echo "<script type='text/javascript'>alert('$message');</script>";
       }
    ?>

    <!-- Sản phẩm mới -->
    <div class="container">
        <div id="register-container" class="card">
            <div class="row no-gutters shadow rounded">
                <div class="col-md-6">
                    <img src="./images/register_background.jpg" class="card-img" alt="background">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="card-title text-center h3">Đăng Ký Tài Khoản Mới</h3>
                        <form name="frmdangky" action="xulydangky.php" method="GET" >
                            <div class="form-group">
                                <label for="nameInput">Họ tên</label>
                                <input type="text" name="hovaten" class="form-control" id="nameInput" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <label for="emailInput">Email</label>
                                <input type="email" name="email" onkeyup="showHint(this.value)" class="form-control" id="emailInput" placeholder="Email" required>
                                <p style="color:red;" id="checkmail"></p>
                            </div>
                            <div class="form-group">
                                <label for="passwordInput">Mật khẩu</label>
                                <input type="password" name="matkhau" class="form-control" id="passwordInput" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="genderSelect">Giới tính</label>
                                <select name="gioitinh" class="form-control" id="genderSelect" required>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                            <button name="button" type="submit" class="btn btn-success btn-block mt-5">Đăng ký</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("checkmail").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("checkmail").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
    }
    </script>

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

    <script src="./js/trung/register.js"></script>
</body>
</html>