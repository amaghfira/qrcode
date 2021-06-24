<?php

include 'config.php';
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
  }

date_default_timezone_set('Asia/Singapore');

if (isset($_POST['submit'])) {
    $barcode = $_POST['barcode'];
    $waktu = date("H:i:s");
    $query = mysqli_query($link, "INSERT INTO absensi(nama_mitra, `date`, `time`) VALUES ('$barcode', now(), '$waktu')");

    // $msg = urlencode("Berhasil Melakukan Absensi");
    header("location: index.php?msg");
    // echo "<br/>" . $barcode;
} else {
	// header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Absensi Pengolahan C1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>Absensi Pengolahan C1</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="index.php" method="post" onSubmit="">
			<div>
				<h2 style="color:black">Current Time</h2>
				<br>
			</div>
			<div>
				<!-- <label>Password:</label> -->
				<input type="password" name="password" id="password" placeholder=""/>
			</div>			
			<div>
				<input type="submit" value="Absen" class="tombol">
			</div>
		</form>
	</div>

<?php
if (isset($_GET['msg'])) {
	$pesan_berhasil = "Berhasil Melakukan Absensi";
	echo $pesan_berhasil;
}
unset($_GET);

?>
</body>

</html>