<?php
function check_login($conn)
{
    if(isset($_SESSION['username'])) {
        $id = $_SESSION['username'];
        $query = "SELECT * FROM user_admin WHERE username = '$id' limit 1";

        $result = mysqli_query($conn,$query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    
    // Redirect to login
    header("location: ../dist/index.php");
    die;
}


function registrasi($data)
	{
		global $conn;

		$username = strtolower(stripslashes($data['username'])); // agar tidak ada karakter seperti _ - masuk ke database
		$email = $data['email'];
		$password = mysqli_real_escape_string($conn, $data['password']);
		$password2 = mysqli_real_escape_string($conn, $data['password2']);

		// CEK USERNAME SUDAH DIGUNAKAN OR BELUM
		$result = mysqli_query($conn, "SELECT username FROM user_admin
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
		mysqli_query($conn, "INSERT INTO user_admin VALUES ('', '$username', '$email', '', '$password')");
		
		return mysqli_affected_rows($conn);
	}
?>