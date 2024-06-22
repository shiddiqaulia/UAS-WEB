<?php
    // Menghubungkan ke database
    require '../../koneksi/koneksi.php';
    session_start();

    // Memeriksa apakah pengguna sudah login
    if(empty($_SESSION['USER'])) {
        echo '<script>alert("Login dulu");window.location="index.php"</script>';
        exit(); // Menambahkan exit untuk menghentikan eksekusi skrip jika pengguna belum login
    }

    // Mendapatkan id_booking dari URL
    $id_booking = $_GET['id_booking'];

    // Mengambil data dari tabel booking berdasarkan id_booking
    $hasil = $koneksi->query("SELECT * FROM booking WHERE id_booking = '$id_booking'")->fetch();

    // Mengambil data dari tabel mobil berdasarkan id_mobil
    $id = $hasil['id_mobil'];
    $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Booking</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Detail Booking</h2>

<table>
    <tr>
        <th>Kode Booking</th>
        <th>KTP</th>
        <th>Nama</th>
        <th>Telepon</th>
        <th>Tanggal</th>
        <th>Lama Sewa</th>
        <th>Total Harga</th>
        <th>Status</th>
    </tr>
    <tr>
        <td><?php echo $hasil['kode_booking']; ?></td>
        <td><?php echo $hasil['ktp']; ?></td>
        <td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['no_tlp']; ?></td>
        <td><?php echo $hasil['tanggal']; ?></td>
        <td><?php echo $hasil['lama_sewa']; ?></td>
        <td><?php echo $hasil['total_harga']; ?></td>
        <td><?php echo $hasil['konfirmasi_pembayaran']; ?></td>
    </tr>
</table>

</body>
</html>
