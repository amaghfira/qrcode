<?php
 
 include "koneksi.php";
 $i=0;
 $cek = mysqli_query($host,"SELECT *, min(time) AS 'absen_pagi', max(time) AS 'absen_sore', SUBTIME(max(time), min(time)) AS 'jam_kerja' FROM absensi GROUP BY nama_mitra,`date` ORDER BY `date` ASC");

// utk jam, ambil jam paling pagi dan paling malam
$empty_array = array();
while($b = mysqli_fetch_assoc($cek)){
    $i = $i + 1;
    $empty_array[] = [
        0 => $b['nama_mitra'],
        1 => $b['date'],
        2 => $b['absen_pagi'],
        3 => $b['absen_sore'],
        4 => $b['jam_kerja']
    ];

}

// JSON objects 
$json_data = json_encode($empty_array);

$json_data2 = '{ "data" : ' . $json_data . '}';
header('Content-type: application/json');
echo $json_data2;

mysqli_close($host);
 ?>



