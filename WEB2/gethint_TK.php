<?php
    $q = $_REQUEST["q"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("localhost", "root", "", "webdb");
        $query = "SELECT Email FROM tbltaikhoan where email='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
            if(mysqli_num_rows($query_run) == 0){
                $hint="Tài khoản không tồn tài";
            }
            else
            {
                $hint="";
            }
        echo $hint;
            
    }
    
?>