<?php
// Konfigurasi database
$host = 'localhost'; // Ganti dengan host Anda
$user = 'root';      // Ganti dengan username database Anda
$password = '';      // Ganti dengan password database Anda
$database = 'tugas_soa'; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data categories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Cek apakah ada data
if ($result->num_rows > 0) {
    // Tampilkan data dalam bentuk tabel
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Dibuat</th>
                <th>Dimodifikasi</th>
            </tr>";
    
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["created"] . "</td>
                <td>" . $row["modified"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data kategori.";
}

// Tutup koneksi
$conn->close();
?>
