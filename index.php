<?php

require 'koneksi.php';

if($_SESSION['nik'] == ""){
	header('location: login.php');
}
else{
	$data_nik = $_SESSION['nik'];

	$query = "SELECT * FROM user WHERE nik='$data_nik';";
	$sql = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($sql);

	if($result == NULL){
		echo "<script>
		alert('Data Anda Tidak Ditemukan');window.location='login.php'
		</script>";
	}
	else{
		$data_nik = $result['nik'];
		$data_nama = $result['nama_lengkap'];
		$data_foto = $result['foto'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME PEDULI DIRI</title>

	<style type="text/css">
		.teksDeko{
			text-decoration: none;
			color: black;
		}
		.teksDeko:hover{
			color: #A8D1D1;
		}
	</style>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td rowspan="2">
					<center>
						<img src="media/photo-profile/<?php echo $data_foto; ?>" width="128px" style="padding: 10px 20px;">
						<h2><?php echo $data_nama; ?></h2>
						<h3><?php echo $data_nik; ?></h3>
					</center>
				</td>

				<td>
					<center>
						<ul style="padding: 0px 20px;">
							<li style="display: inline;"><a href="index.php" class="teksDeko">Home |</a></li>

							<li style="display: inline;"><a href="catatan_perjalanan.php" class="teksDeko">Catatan Perjalanan</a></li>

							<li style="display: inline;"><a href="isi_data.php" class="teksDeko">| Isi Data</a></li>
						</ul>
					</center>
				</td>
			</tr>

			<tr>
				<td>
					<h4>
						Selamat Datang <?php echo $data_nama; ?> Di Aplikasi Peduli Diri
					</h4>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>