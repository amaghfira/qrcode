<?php

$link = mysqli_connect("localhost","root","","absensi_c1");
date_default_timezone_set('Asia/Singapore');
// echo date_default_timezone_get();
if (isset($_POST['submit'])) {
    $barcode = $_POST['barcode'];
    $waktu = date("H:i:s");
    $query = mysqli_query($link, "INSERT INTO absensi(nama_mitra, `date`, `time`) VALUES ('$barcode', now(), '$waktu')");

    // $msg = urlencode("Berhasil Melakukan Absensi");
    header("location: barcode.php?msg");
    // echo "<br/>" . $barcode;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Pengolahan C1</title>
    <style>
        #kotakbarcode {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -50px;
            width: 500px;
            height: 500px;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div id="kotakbarcode">
        <form action="barcode.php" method="POST">
            <input type="text" name="barcode">
            <input type="submit" name="submit">
        </form>
    </div>
    
    <?php
    if (isset($_GET['msg'])) {
        $pesan_berhasil = "Berhasil Melakukan Absensi";
        echo $pesan_berhasil;
    }
    unset($_GET);
    // $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    // if ($pageWasRefreshed) {
    //     $pesan_berhasil = "";
    //     echo $pesan_berhasil;    
    // }
    // header("location: barcode.php");

    ?>
</body>
</html>