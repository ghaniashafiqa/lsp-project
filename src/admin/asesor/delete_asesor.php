<?php
session_start();
require "../../../config/config.php";

// Delete data from the database
$nik_number = $_GET['nik_number'];
    
// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($nik_number) > 0) {
    echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'list_asesor.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data gagal dihapus!');
        </script>";
}
?>
