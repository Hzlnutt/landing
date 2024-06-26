<?php


include 'koneksi.php';

$nama_user = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tur yang Dipesan</title>
    <link rel="stylesheet" href="tour_list.css">
</head>
<body>
<header>
    <a href="#" class="logo">PRESERVE</a>
    <ul class="navlist">
        <li><a href="user_page.php#home">Home</a></li>
        <li><a href="user_page.php#poin">Wisata</a></li>
        <li><a href="user_page.php#Keunggulan">Keunggulan</a></li>
        <li><a href="user_page.php#tiket">Tiket</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><h4> Halo admin, <?php echo $_SESSION['username']; ?></h4></li>
    </ul>
</header>
<main>

<?php
// Query untuk mengambil data tiket beserta harga dari tabel wisata
$sql = "SELECT t.Id_Tiket, t.nama, t.keberangkatan, t.tujuan, t.email, t.quantity, w.harga 
        FROM tiket t
        JOIN wisata w ON t.id_wisata = w.id_wisata"; // Sesuaikan dengan struktur tabel Anda
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data tiket
    while ($row = mysqli_fetch_assoc($result)) {
        $total_harga = $row["harga"] * $row["quantity"]; // Menghitung total harga
        ?>
        <div class="cardhome">
            <div class="card">
                <h2><?php echo $row["nama"]; ?></h2>
                <p>ID Tiket: <?php echo $row["Id_Tiket"]; ?></p>
                <p>Keberangkatan: <?php echo $row["keberangkatan"]; ?></p>
                <p>Tujuan: <?php echo $row["tujuan"]; ?></p>
                <p>Email: <?php echo $row["email"]; ?></p>
                <p>Quantity: <?php echo $row["quantity"]; ?></p>
                <p><b>Total Harga: Rp. <?php echo $total_harga; ?></b></p>
                <?php echo "<a href='tour_list_admin_edit.php?Id_Tiket=" . $row["Id_Tiket"] . "'>Edit</a> | "; ?>
                <?php echo "<a href='tour_list_admin_edit_sistem.php?action=delete&Id_Tiket=" . $row["Id_Tiket"] . "' onclick='return confirmDelete();'>Delete</a>"; ?>
            </div>
        </div>
        <?php
    }
} else {
    echo "Tidak ada data tiket.";
}

// Menutup koneksi
mysqli_close($conn);
?>
</main>
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus tiket ini?');
    }
</script>
</body>
</html>
