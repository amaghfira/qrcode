

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Absensi Pengolahan C1</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("bg.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.65); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 45%;
  height:70%;
  padding: 30px;
  text-align: center;
}

#time {
  height: 30px;
}

::-webkit-input-placeholder {
    color: red;
    text-align: center;
}
:-moz-placeholder {
    /* Firefox 18- */
    color: red;
    text-align: center;
}
::-moz-placeholder {
    /* Firefox 19+ */
    color: red;
    text-align: center;
}
:-ms-input-placeholder {
    color: red;
    text-align: center;
}
#submit{    
    visibility: hidden;
}

hr.line {
  border: 0.75px solid white;
}
</style>
</head>
<body>

<div class="bg-image"></div>
<div class="bg-text">
  <center><h2>ABSENSI PENGOLAHAN C1</h2></center>	<hr class="line"><br><br>
  <!-- <h3 style="font-size:50px">Current Time</h3> -->
  <div id="date"></div>
  <div id="time"></div><br>
  <form action="index.php" method="POST" id="myForm" autocomplete="off">
			<div>
				<br>
			</div>
			
      <div class="form-group">
        <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Scan QRCODE untuk melakukan absensi" autofocus>
    </div>
    <div>
        <input type="submit" class="btn btn-success" name="submit" id="submit">
			</div>
		</form>
    <br>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
          $query = mysqli_query($host, "INSERT INTO absensi(nama_mitra, `date`, `time`) VALUES ('$barcode', now(), '$waktu')");
          if($query){
            // $msg = urlencode("Berhasil Melakukan Absensi");
            // header("location: index.php");
            echo '<div class="alert alert-success" role="alert">
                    <strong>Sukses!</strong> Data Berhasil Disimpan
                  </div>';
            unset($_POST);
          } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($host);
            header("location: index.php");
          }
      }

      // if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
      //   $data = $_POST['barcode'];
      //   unset($_POST);
      // }
      
    ?>

    
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
  </script>
</div>

<!-- BOOTSTRAP ALERT -->
<!-- <div class="alert alert-success" role="alert">
  <strong>Sukses!</strong> Data berhasil Disimpan
</div> -->


<script>
  var timer = setInterval(myTimer, 1000);
  
  // get date now
  var d = new Date();
  const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
  const days = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
  document.getElementById("date").innerHTML = "<h5>" + days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear() + "</h5>";
  
  // get time now 
  function myTimer() {
    var d = new Date();
    var options = { hour12: false };
    document.getElementById("time").innerHTML = d.toLocaleTimeString('en-US', options) + " WITA";
  }

</script>

</body>
</html>
