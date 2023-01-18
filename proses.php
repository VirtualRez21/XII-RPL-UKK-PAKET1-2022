<?php

	require 'koneksi.php';

	if(isset($_POST['submit_registrasi'])){
		$nik = $_POST['nik_pengguna'];
		$nama = $_POST['nama_pengguna'];

		$namaFoto = $tglAndWaktu.$_FILES['foto_pengguna']['name'];
		$foto = $_FILES['foto_pengguna']['tmp_name'];

		$sql = "SELECT * FROM user WHERE nik='$nik';";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			if($row['nik'] == $nik){
				echo "<script>alert('NIK Sudah Terdaftar, Silahkan Gunakan NIK Yang Lain');window.location='registrasi.php'</script>";
			}
		}
		elseif(mysqli_num_rows($result) != 1){
			$sql = "INSERT INTO user VALUES('', '$nik', '$nama', '$namaFoto');";
			$result = mysqli_query($conn, $sql);
			move_uploaded_file($foto, "media/photo-profile/".$namaFoto);

			echo "<script>alert('Registrasi Berhasil');window.location='login.php'</script>";
		}
		else{
			echo "<script>alert('Tidak Bisa Registrasi');window.location='registrasi.php'</script>";
		}
	}

	elseif(isset($_POST['submit_login'])){
		$nik = $_POST['nik_pengguna'];
		$nama = $_POST['nama_pengguna'];

		$sql = "SELECT * FROM user WHERE nik='$nik' AND nama_lengkap='$nama';";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1){
			$login = mysqli_fetch_assoc($result);
			if($login['nik'] == $nik && $login['nama_lengkap'] == $nama){
				$_SESSION['id'] = $login['id'];
				$_SESSION['nik'] = $login['nik'];
				$_SESSION['nama_lengkap'] = $login['nama_lengkap'];

				echo "<script>
				alert('Berhasil Login :)');window.location='index.php'
				</script>
				";
			}
			else{
				echo "<script>
				alert('NIK atau nama pengguna salah');window.location='login.php'
				</script>
				";
			}
		}
		else{
			echo "<script>
				alert('NIK atau nama pengguna salah');window.location='login.php'
				</script>
				";
		}
	}

	elseif(isset($_POST['submit_isiData'])) {
		$id_user = $_SESSION['id'];
		$tanggal = $_POST['tanggal'];
		$jam = $_POST['jam'];
		$lokasi = $_POST['lokasi'];
		$suhu = $_POST['suhuTubuh'];

		$sql = "INSERT INTO catatan_perjalanan VALUES('', '$id_user', '$tanggal', '$jam', '$lokasi', '$suhu');";
		$result = mysqli_query($conn, $sql);

		echo "<script>
				alert('Data Catatan Perjalanan Berhasil Ditambah');window.location='catatan_perjalanan.php'
				</script>";
	}

?>