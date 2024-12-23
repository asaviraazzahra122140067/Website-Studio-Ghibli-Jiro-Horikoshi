<?php

// Kelas koneksi seperti yang telah diberikan sebelumnya
class Koneksi
{
	private $host = '127.0.0.1';
	private $user = 'root';
	private $password = '';
	private $dbname = 'data';
	private $conn;

	public function __construct()
	{
		$this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die("Koneksi gagal: " . $this->conn->connect_error);
		}
	}

	public function getConnection()
	{
		return $this->conn;
	}
}
