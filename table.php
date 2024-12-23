<?php
session_start();
require_once 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.html");
  exit;
}
class UserController extends Koneksi
{
  // Fungsi untuk mengambil semua pengguna
  public function getAllUsers()
  {
    $conn = $this->getConnection();

    // Query untuk mengambil semua data dari tabel users
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $users = [];
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }

    return $users;
  }
}

$userController = new UserController();
$allUsers = $userController->getAllUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <title>Film List</title>
</head>

<body>
  <header>
    <div class="container-fluid">
      <!-- Ikon hamburger -->
      <div class="humburger" onclick="toggleMenu()">
        &#9776;
        <!-- Ikon hamburger (3 garis) -->
      </div>
      <div class="logo-title">
        <img src="img/logo ghibli.jpg" alt="Logo Jiro" class="logo" />
        <div>
          <h1>Jirō Horikoshi</h1>
          <h2>堀越 二郎</h2>
        </div>
      </div>
      <nav>
        <ul id="nav-list">
          <li><a href="./table.html">Movie List</a></li>
          <li><a href="./login.html">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container mt-5">
    <h2 class="mb-4">Daftar Pengguna Teregistrasi</h2>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Tanggal lahir</th>
          <th>Gender</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($allUsers)): ?>
          <?php foreach ($allUsers as $index => $user): ?>
            <tr>
              <td><?php echo $index + 1; ?></td>
              <td><?php echo htmlspecialchars($user['fullname']); ?></td>
              <td><?php echo htmlspecialchars($user['email']); ?></td>
              <td><?php echo htmlspecialchars($user['birth_date']); ?></td>
              <td><?php echo htmlspecialchars($user['gender']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">Tidak ada pengguna yang ditemukan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </main>

  <footer>
    <p>&copy; 2024 Aspzhr Web. All Rights Reserved.</p>
  </footer>

  <script>
    // JavaScript untuk toggle menu
    function toggleMenu() {
      var navList = document.getElementById("nav-list");
      navList.classList.toggle("active");
    }
  </script>
</body>

</html>