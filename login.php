<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Catatan Perjalanan</title>
</head>
<body>
	<center>
		<form action="proses.php" method="POST">
			<table border="1">
				<tr>
					<td>
						<input type="number" name="nik_pengguna" placeholder="NIK" required>
					</td>
				</tr>

				<tr>
					<td>
						<input type="text" name="nama_pengguna" placeholder="Nama Lengkap" required>
					</td>
				</tr>

			</table>
			<br>

			<input type="submit" name="submit_login" value="Login">
			
			<br>

			<p>Belum punya akun? Klik <a href="registrasi.php">Di sini</a></p>
		</form>
	</center>
</body>
</html>