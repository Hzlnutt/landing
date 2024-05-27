<?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root"; // Ganti dengan username database Anda
        $password = ""; // Ganti dengan password database Anda
        $dbname = "preserve"; // Ganti dengan nama database Anda

        // Membuat koneksi
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        session_start();
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
          <li><a href="user_page.phptour_list.php">Tiket Saya</a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><h4> Halo, <?php echo $_SESSION['username'];?></li>
        </ul>
      </header>
    <main>
        
    <?php
        // Query untuk mengambil data tiket atas nama "asep" beserta harga dari tabel wisata
        $sql = "SELECT Id_Tiket, nama, keberangkatan, tujuan, email, quantity, (SELECT harga FROM wisata LIMIT 1) AS total 
                FROM tiket 
                WHERE nama = '$nama_user'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Menampilkan data tiket
            while($row = mysqli_fetch_assoc($result)) {
                $total_harga = $row["total"] * $row["quantity"]; // Menghitung total harga
        ?>
                <div class="cardhome">
                <div class="card">
                    <h2><?php echo $row["nama"]; ?></h2>
                    <p>ID Tiket: <?php echo $row["Id_Tiket"]; ?></p>
                    <p>Keberangkatan: <?php echo $row["keberangkatan"]; ?></p>
                    <p>Tujuan: <?php echo $row["tujuan"]; ?></p>
                    <p>Email: <?php echo $row["email"]; ?></p>
                    <p>Quantity: <?php echo $row["quantity"]; ?></p>
                    <p>Total Harga:  Rp.<?php echo $total_harga; ?></p>
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
</body>
</html>
