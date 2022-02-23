<?php
include 'koneksi.php';

if (isset($_GET['aa'])) {
    // data difilter terlebih dahulu & base64_decode berguna untuk mendeskripsi id yg sebelumnya di enkripsi/encoding
	$id = stripslashes(strip_tags(htmlspecialchars( base64_decode($_GET['aa']) ,ENT_QUOTES)));

	$query = "DELETE FROM tbl_mahasiswa WHERE id=?";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param("i", $id);
    
    if ($dewan1->execute()) {
    	echo "<script>alert('Data Berhasil Dihapus');location='index.php';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$db1->close();
?>