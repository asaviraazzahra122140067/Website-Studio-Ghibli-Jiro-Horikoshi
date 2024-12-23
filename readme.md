# Website Studio Ghibli: Jiro Horikoshi

## **Bagian 1: Pemrograman Client-side (Bobot: 30%)**

### **1.1 Manipulasi DOM menggunakan JavaScript (15%)**

- **Formulir**:  
  Terdapat lima elemen input, yaitu untuk nama pengguna, email, tanggal lahir, jenis kelamin, dan kata sandi.

- **Tabel**:  
  Tabel yang ditampilkan berasal dari server, dengan skema yang didefinisikan dalam file `database.sql` pada database bernama *data*.

### **1.2 Penanganan Event (15%)**

- **Implementasi**:  
  - Penanganan event *keydown* dilakukan untuk memeriksa apakah setiap input teks kosong atau tidak.  
  - Saat formulir di-*submit*, dilakukan pengecekan pada input kategori untuk memastikan data diisi.  
  - Selain itu, terdapat penanganan untuk event *focus* dan *blur* pada elemen input.

---

## **Bagian 2: Pemrograman Server-side (Bobot: 30%)**

### **2.1 Pengelolaan Data dengan PHP (20%)**

- **Implementasi**:  
  - Berhasil menangani request HTTP dengan metode `GET` dan `POST`.  
  - Validasi data dilakukan pada file `register.php` sebelum data disimpan ke database.

### **2.2 Objek PHP Berbasis OOP (10%)**

- **Implementasi**:  
  - Menggunakan pendekatan OOP pada `UserController` dan `Koneksi`.  
  - `UserController` memiliki fungsi untuk mendapatkan seluruh data pengguna dengan metode `getAllUsers`.

---

## **Bagian 3: Manajemen Basis Data (Bobot: 20%)**

### **3.1 Pembuatan Tabel Basis Data (5%)**

- **Implementasi**:  
  - Perintah SQL untuk membuat database dan tabel telah disiapkan di file `database.sql`.  
  - Jenis data pada tabel ditentukan sesuai dengan kebutuhan aplikasi.

### **3.2 Konfigurasi Koneksi Basis Data (5%)**

- **Implementasi**:  
  - Konfigurasi koneksi mencakup pengaturan host, nama pengguna, kata sandi, dan nama database, yang didefinisikan dalam file `koneksi.php`.

### **3.3 Manipulasi Data pada Basis Data (10%)**

- **Implementasi**:  
  - Berhasil menangani operasi *Create* dan *Read* pada tabel `Pendaftar` atau `Register`.

---

## **Bagian 4: Manajemen State (Bobot: 20%)**

### **4.1 Manajemen State dengan Session (10%)**

- **Implementasi**:  
  - Data pengguna seperti nama, email, tanggal lahir, dan jenis kelamin disimpan menggunakan *session*.  
  - Pada `table.php`, terdapat fungsi untuk memeriksa status login menggunakan variabel *session* `'logged_in'`.  
  - *Session* dimulai dengan perintah `session_start()`.

### **4.2 Manajemen State dengan Cookie dan Browser Storage (10%)**

- **Implementasi**:  
  - Tidak ada implementasi pada bagian ini.

---

## **Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)**

### **Langkah-langkah Hosting Aplikasi Web**:

1. Mencari platform hosting gratis.    
2. Mengunggah semua file aplikasi ke direktori `htdocs` pada *file manager*.  
3. Menyesuaikan konfigurasi database dengan database yang disediakan oleh server.  
4. Melakukan pengujian aplikasi.  
5. Hosting selesai dilakukan.

### **Penyedia Hosting yang Dipilih**:

- **InfinityFree**  
  Hosting ini dipilih karena menyediakan layanan gratis untuk hosting, domain, dan basis data. Selain itu, platformnya sederhana dan cepat.

### **Keamanan Aplikasi Web**:

- Keamanan aplikasi dijaga dengan mengatur izin file ke 0644 (*read-only*), sehingga file tidak dapat diedit oleh pengguna.

### **Konfigurasi Server**:

- Menggunakan layanan hosting InfinityFree dengan dukungan PHP, MySQL, dan *file manager* berbasis web.  
- **Web Server**: Apache.  
- **Bahasa Pemrograman**: PHP 7.4.  
- **Database**: MySQL.
