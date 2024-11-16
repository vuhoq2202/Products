<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "dbsanpham";

    mysqli_report(MYSQLI_REPORT_OFF);

    $conn = mysqli_connect($host, $username, $password, $database);
    if(!$conn){
        die("Kết nối cơ sở dữ liệu thất bại: ". mysqli_connect_error());
    }
?>