<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preserve";

$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start ();

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data harga dari tabel wisata
$sql = "SELECT harga FROM wisata Where Id_Wisata = 1";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour 1</title>
    <link rel = "stylesheet" href = "tour.css">
</head>
<body>

<section class = "boxing">
    <div class = "box">
        
    <form action="booking_system.php" method="post">
        <div class = "booking_data">
			<h1>BOOKING</h1>
			<input type="text" placeholder="Keberangkatan" name="keberangkatan" required/>
            <select type="text" name="tujuan"><option value = "Menara Pisa">Menara Pisa</option></select>
			<input type="email" placeholder="Email" name="email_booking" required/>
            <select class="pilih" name="kelas_transportasi" required>
            <option value="" disabled selected>Pilih Kelas Transportasi</option>
            <option value="Pesawat Ekonomi" >Pesawat Ekonomi</option>
            <option value="Pesawat Bisnis">Pesawat Bisnis</option>
            <option value="Pesawat Eksekutif">Pesawat Eksekutif</option>
            <option value="Kereta Ekonomi" >Kereta Ekonomi</option>
            <option value="Kereta Bisnis">Kereta Bisnis</option>
            <option value="Kereta Eksekutif">Kereta Eksekutif</option>
            <option value="Bis Ekonomi" >Bis Ekonomi</option>
            <option value="Bis Bisnis">Bis Bisnis</option>
            <option value="Bis Eksekutif">Bis Eksekutif</option>
            </select>
            <input type="number" placeholder="quantity" name="quantity" required/>
            <h4>price: <?php if ($result->num_rows > 0) {
    // Menampilkan data harga
    echo "<table>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["harga"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data harga wisata.";
}?></h4>
        </div>

            <div class = "video_wisata">
            <iframe width="500" height="300" src="https://www.youtube.com/embed/k6bs2fwbUlI?si=FNcfj5PCIJkHTi2a&amp;start=409" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            </div>
        

            <hr>
			<button type="submit" value="booking"><b>Book Now</b></button>
		</form>
        
    </div>
    
</section>
</body>
</html>