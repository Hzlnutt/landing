<?php
include 'koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET["action"] == "update" && isset($_GET['Id_Tiket'])) {
        $id = $_GET['Id_Tiket'];
        $edit_Id_Wisata = $_POST["edit_Id_Wisata"];
        $edit_nama = $_POST["edit_nama"];
        $edit_keberangkatan = $_POST["edit_keberangkatan"];
        $edit_tujuan = $_POST["edit_tujuan"];
        $edit_email = $_POST["edit_email"];
        $edit_quantity = $_POST["edit_quantity"];

        $sql_update = $conn->prepare("UPDATE tiket 
                       SET Id_Wisata = ?, nama = ?, keberangkatan = ?, tujuan = ?, email = ?, quantity = ? 
                       WHERE Id_Tiket = ?");
        $sql_update->bind_param('issssii', $edit_Id_Wisata, $edit_nama, $edit_keberangkatan, $edit_tujuan, $edit_email, $edit_quantity, $id);

        if ($sql_update->execute()) {
            header("Location: tour_list_admin.php?berhasil_edit");
            exit(); 
        } else {
            echo "Error updating tiket: " . $conn->error;
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["action"] == "delete" && isset($_GET['Id_Tiket'])) {
        $id_tiket = $_GET['Id_Tiket'];

        // Menghapus data terkait di tabel wisata terlebih dahulu
        $sql_delete_wisata = $conn->prepare("DELETE FROM wisata WHERE Id_Wisata = (SELECT Id_Wisata FROM tiket WHERE Id_Tiket = ?)");
        $sql_delete_wisata->bind_param('i', $id_tiket);

        if ($sql_delete_wisata->execute()) {
            // Menghapus data di tabel tiket
            $sql_delete_tiket = $conn->prepare("DELETE FROM tiket WHERE Id_Tiket = ?");
            $sql_delete_tiket->bind_param('i', $id_tiket);

            if ($sql_delete_tiket->execute()) {
                header("Location: tour_list_admin.php?berhasil_delete");
                exit();
            } else {
                echo "Error deleting tiket: " . $conn->error;
            }
        } else {
            echo "Error deleting wisata: " . $conn->error;
        }
    }
}

$conn->close();
?>
