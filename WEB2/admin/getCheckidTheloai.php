<?php
    $q = $_REQUEST["q"];
    $hint = "";
    if($q != ""){
        $mysqli = mysqli_connect("localhost", "root", "", "webdb");
        $query = "SELECT idTheLoai FROM tbltheloai where idTheLoai='".$q."'";
        $query_run = mysqli_query($mysqli,$query);
        
        while($result = mysqli_fetch_array($query_run) ){
        
            if($q == $result['idTheLoai']){
                $hint="Trùng id thể loại!"; break;
            }else{
                $hint="";
            }
        
        }
        echo $hint;
            
    }
?>