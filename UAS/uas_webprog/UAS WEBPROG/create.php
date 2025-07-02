<?php
    include_once("konfigurasi.php");
    if(!isset($_POST["SIMPANDATA"])){
        header("location: viewdata.php");
    }
    if(trim($_POST["NIM"])==""){
        header("location: viewdata.php");
        die();
    }
    $txNIM = $_POST["Nik"];
    $txNAMA = $_POST["NAMA"];
    $txALAMAT = $_POST["ALAMAT"];
    $txTGL = $_POST["TGLLAHIR"];
    $txJK = $_POST["JK"];

    $sql = "INSERT INTO mhs(NIK, NAMA, ALAMAT, TGL_LAHIR, JENISKEL) 
    VALUES('$txNIK','$txNAMA', '$txALAMAT','$txTGL','$txJK');";

    $res = mysqli_query($koneksi, $sql);
    if(!$res){
        die("Penambahan data gagal");
    }

    echo "Penambahan data sukses";

    mysqli_close($koneksi);
    echo "<script>setTimeout(window.location.replace('viewdata.php'), 2000);</script>";

