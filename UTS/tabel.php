<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_info");

// Mengecek apakah koneksi berhasil atau tidak
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Menambahkan data baru ke tabel
if (isset($_POST['nama'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $tanggal_lahir = $_POST['tgl_lahir'];

  $sql = "INSERT INTO user(nama, email, alamat, tgl_lahir)
          VALUES ('$nama', '$email', '$alamat', '$tanggal_lahir')";

  if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// Mengambil data dari tabel
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

// Menampilkan data dalam bentuk tabel
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Nama</th><th>Email</th><th>Alamat</th><th>Tanggal Lahir</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['alamat'] . "</td>";
    echo "<td>" . $row['tgl_lahir'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "Tidak ada data";
}

// Menutup koneksi ke database
mysqli_close($conn);
?>