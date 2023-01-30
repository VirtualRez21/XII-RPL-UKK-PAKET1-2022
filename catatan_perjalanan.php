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
		$data_idUser = $result['id'];
		$data_nik = $result['nik'];
		$data_nama = $result['nama_lengkap'];
		$data_foto = $result['foto'];

		if(isset($_POST['urut_data'])){
			$dataSortValue = $_POST['sorting'];
			$metodeSorting = $_POST['methodSorting'];
			if($dataSortValue == "tanggal"){
				if($metodeSorting == "ascending"){
					$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY tanggal ASC");
				}
				elseif ($metodeSorting == "descending") {
					$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY tanggal DESC");
				}
			}
			elseif($dataSortValue == "waktu"){
				if($metodeSorting == "ascending"){
					$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY waktu ASC");
				}
				elseif ($metodeSorting == "descending") {
					$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY waktu DESC");
				}
				
			}
			elseif($dataSortValue == "lokasi"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY lokasi ASC");
			}
			elseif($dataSortValue == "suhu"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser' ORDER BY suhu_tubuh ASC");
			}
		}
		elseif(isset($_POST['submit_cari_data'])){
			$cariData = $_POST['searching'];
			$cariDataCatatan = $_POST['cari_data'];

			if($cariData == "tanggal"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE (tanggal LIKE '%$cariDataCatatan%' AND id_user = '$data_idUser');");
			}

			elseif($cariData == "waktu"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE (waktu LIKE '%$cariDataCatatan%' AND id_user = '$data_idUser');");
			}

			elseif($cariData == "lokasi"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE (lokasi LIKE '%$cariDataCatatan%' AND id_user = '$data_idUser');");
			}

			elseif($cariData == "suhu"){
				$result = mysqli_query($conn, "SELECT * FROM catatan_perjalanan WHERE (suhu_tubuh LIKE '%$cariDataCatatan%' AND id_user = '$data_idUser');");
			}

			$number_of_results = mysqli_num_rows($result);
			if ($number_of_results == 0 || mysqli_num_rows($result) == 0) {
			 	echo "<script>
				alert('Data Tidak Ditemukan :(');window.location='catatan_perjalanan.php'
				</script>
				";
			}
		}
		else{
			$query = "SELECT * FROM catatan_perjalanan WHERE id_user='$data_idUser';";
			$result = mysqli_query($conn, $query);
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CATATAN PERJALANAN PEDULI DIRI</title>

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
					<center>

						<form action="catatan_perjalanan.php" method="POST">
							<label>Urutkan Berdasarkan:</label>
							<select name="sorting">
								<option value="tanggal">
									Tanggal
								</option>
								<option value="waktu">
									Waktu
								</option>
								<option value="lokasi">
									Lokasi
								</option>
								<option value="suhu">
									Suhu Tubuh
								</option>
							</select>

							<br>

							<input type="radio" name="methodSorting" value="ascending" required>
							<label>Ascending</label>

							<br>

							<input type="radio" name="methodSorting" value="descending" required>
							<label>Descending</label>

							<br>

							<input type="submit" name="urut_data" value="Urutkan">
						</form>

						<br><br>

						<form action="catatan_perjalanan.php" method="POST">
							<label>Cari:</label>
							<input type="text" name="cari_data" placeholder="search" required>
							<select name="searching">
								<option value="tanggal">
									Tanggal
								</option>
								<option value="waktu">
									Waktu
								</option>
								<option value="lokasi">
									Lokasi
								</option>
								<option value="suhu">
									Suhu Tubuh
								</option>
							</select>
							<input type="submit" name="submit_cari_data" value="Search">
						</form>

						<br><br>

						<table border="1" width="512px">
							<tr>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Lokasi</th>
								<th>Suhu ℃</th>
							</tr>
							<?php
							while ($data = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td>
									<?php echo $data['tanggal'] ?>
								</td>
								<td>
									<?php echo $data['waktu'] ?>
								</td>
								<td>
									<?php echo $data['lokasi'] ?>
								</td>
								<td>
									<?php echo $data['suhu_tubuh'] ?>
								</td>
							</tr>
							<?php
							}
							?>
						</table>
					</center>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
