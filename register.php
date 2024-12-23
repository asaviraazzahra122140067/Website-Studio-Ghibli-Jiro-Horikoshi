<?php
require_once 'Koneksi.php';

// Kelas untuk mengelola proses registrasi
class UserController extends Koneksi
{
	public function registerUser($fullname, $email, $birth_date, $gender, $password)
	{
		$conn = $this->getConnection();

		// Persiapan query untuk menyimpan data
		$sql = "INSERT INTO users (fullname, email, birth_date, gender, password) VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		if ($stmt === false) {
			die("Query error: " . $conn->error);
		}

		// Bind parameter ke statement
		$stmt->bind_param("sssss", $fullname, $email, $birth_date, $gender, $password);

		// Eksekusi query
		if ($stmt->execute()) {
			return true; // Registrasi berhasil
		} else {
			return false; // Registrasi gagal
		}
	}
}

// Proses registrasi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$birth_date = $_POST['birth'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];

	// Validasi sederhana (bisa dikembangkan lebih lanjut)
	if (strlen($fullname) <= 3) {
		echo "Nama lengkap harus lebih dari 3 karakter.";
		exit;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Format email tidak valid.";
		exit;
	}
	if ($password == "") {
		echo "Password tidak boleh kosong.";
		exit;
	}

	// Proses penyimpanan data
	$userController = new UserController();
	$isRegistered = $userController->registerUser($fullname, $email, $birth_date, $gender, $password);

	if ($isRegistered) {
		// Redirect ke login.html jika registrasi berhasil
		header("Location: login.html");
		exit;
	} else {
		echo "Registrasi gagal. Silakan coba lagi.";
	}
}
