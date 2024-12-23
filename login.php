<?php
session_start(); // Memulai session
require_once 'Koneksi.php';

// Kelas untuk mengelola proses login
class UserController extends Koneksi
{
	public function loginUser($email, $password)
	{
		$conn = $this->getConnection();

		// Query untuk memeriksa pengguna berdasarkan email dan password
		$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
		$stmt = $conn->prepare($sql);
		if ($stmt === false) {
			die("Query error: " . $conn->error);
		}

		// Bind parameter ke statement
		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$result = $stmt->get_result();

		// Cek apakah ada user yang ditemukan
		if ($result->num_rows > 0) {
			return $result->fetch_assoc(); // Kembalikan data user
		} else {
			return null; // Login gagal
		}
	}
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Membuat instance UserController
	$userController = new UserController();
	$user = $userController->loginUser($email, $password);

	if ($user) {
		// Login berhasil, simpan informasi pengguna di session
		$_SESSION['logged_in'] = true;
		$_SESSION['user'] = $user['fullname'];
		$_SESSION['email'] = $user['email'];

		// Redirect ke table page
		header("Location: table.php");
		exit;
	} else {
		// Login gagal, tampilkan pesan error
		echo "<div style='color: red;'>Email atau password salah.</div>";
	}
}
