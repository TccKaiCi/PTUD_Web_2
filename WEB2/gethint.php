<?php
    $q = $_REQUEST["q"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("localhost", "root", "", "webdb");
        $query = "SELECT Email FROM tbltaikhoan where email='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
        while($result = mysqli_fetch_array($query_run) ){
        
            if($q == $result['Email']){
                $hint="Trùng Email!"; break;
            }else{
                $hint="";
            }
        
        }
        echo $hint;
            
    }
    
?>