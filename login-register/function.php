<?php
	$conn = new mysqli("localhost","root","","db_pwpb11_login_register");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}

	function registrasi($data)
	{
		global $conn;

		$username = strtolower(stripslashes($data['username'])); // agar tidak ada karakter seperti _ - masuk ke database
		$email = $data['email'];
		$password = mysqli_real_escape_string($conn, $data['password']);
		$password2 = mysqli_real_escape_string($conn, $data['password2']);

		// CEK USERNAME SUDAH DIGUNAKAN OR BELUM
		$result = mysqli_query($conn, "SELECT username FROM users_pwpb
		WHERE username = '$username'");

		if (mysqli_fetch_assoc($result)) {
			echo "<script>alert('Username Sudah Terdaftar. Masukkan Username Yang Lain!');</script>";

			return false;
		}

		// CEK CONFIRM PASSWORD
		if ($password !== $password2) {
			echo "<script>alert('Password confirmation does not match!')</script>";

			return false;
		}
		
		// ECRYPTION PASSWORD
		$password = password_hash($password, PASSWORD_DEFAULT);

		// CREATE USER TO DATABASE
		mysqli_query($conn, "INSERT INTO users_pwpb VALUES ('', '$username', '$email', '$password')");
		
		return mysqli_affected_rows($conn);
	}
?>