<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrasi Akun Catatan Perjalanan</title>
</head>
<body>
	<center>
		<form action="proses.php" method="POST" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td colspan="2">
						<input type="number" name="nik_pengguna" placeholder="NIK" required>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="text" name="nama_pengguna" placeholder="Nama Lengkap" required>
					</td>
				</tr>

				<tr>
					<td>
						<label>Foto: </label>
					</td>
					<td>
						<input type="file" name="foto_pengguna" accept="image/*" required>
					</td>
				</tr>

			</table>
			<br>
			<input type="submit" name="submit_registrasi" value="Registrasi">
			<br>
			<p>Sudah punya akun? Klik <a href="login.php">Di sini</a></p>
		</form>
	</center>
</body>
</html>