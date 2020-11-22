<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "webdb");
if($mysqli->connect_error) {
  exit('Không thể kết nối với database!');
}

$sql = 'UPDATE tblhoadon SET TinhTrang="Đã hoàn thành" , Email_NhanVien="'.$_SESSION['email'].'" WHERE MaHD= ?';

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $_GET['q']);
$stmt->execute();

$stmt->close();

$mysqli->close();

?>