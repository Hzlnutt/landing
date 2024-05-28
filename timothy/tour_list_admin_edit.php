<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['Id_Tiket'])) {
        $id = $_GET['Id_Tiket'];

        $sql_fetch = $conn->prepare("SELECT * FROM tiket WHERE Id_Tiket = ?");
        $sql_fetch->bind_param('i', $id);
        $sql_fetch->execute();
        $result_fetch = $sql_fetch->get_result();

        if ($result_fetch->num_rows > 0) {
            $row = $result_fetch->fetch_assoc();
            ?>
            <h2>Edit Tiket</h2>
            <form action="tour_list_admin_edit_sistem.php?action=update&Id_Tiket=<?php echo $row['Id_Tiket']; ?>" method="post">
                <label for="Id_Wisata">Id Wisata:</label>
                <input type="text" name="edit_Id_Wisata" value="<?php echo $row['Id_Wisata']; ?>" required><br>
                <label for="edit_nama">Nama:</label>
                <input type="text" name="edit_nama" value="<?php echo $row['nama']; ?>" required><br>
                <label for="edit_keberangkatan">Keberangkatan:</label>
                <input type="text" name="edit_keberangkatan" value="<?php echo $row['keberangkatan']; ?>" required><br>
                <label for="edit_tujuan">Tujuan:</label>
                <input type="text" name="edit_tujuan" value="<?php echo $row['tujuan']; ?>" required><br>
                <label for="edit_email">Email:</label>
                <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" required><br>
                <label for="edit_quantity">Quantity:</label>
                <input type="text" name="edit_quantity" value="<?php echo $row['quantity']; ?>" required><br>
                <br>
                <input type="submit" value="Update Tiket">
            </form>
            <?php
        } else {
            echo "Tiket tidak ditemukan";
        }
    } else {
        echo "Permintaan tidak valid";
    }
} else {
    echo "Metode permintaan tidak valid";
}
?>
