<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id = stripslashes(strip_tags(htmlspecialchars($_POST['id'] ,ENT_QUOTES)));
	$nama_mahasiswa = stripslashes(strip_tags(htmlspecialchars($_POST['nama_mahasiswa'] ,ENT_QUOTES)));
	$jenkel = stripslashes(strip_tags(htmlspecialchars($_POST['jenkel'] ,ENT_QUOTES)));
	$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'] ,ENT_QUOTES)));
    $jurusan = stripslashes(strip_tags(htmlspecialchars($_POST['jurusan'] ,ENT_QUOTES)));
	$tanggal_masuk = stripslashes(strip_tags(htmlspecialchars($_POST['tanggal_masuk'] ,ENT_QUOTES)));

	$query = "UPDATE tbl_mahasiswa SET nama_mahasiswa=?, alamat=?, jurusan=?, jenis_kelamin=?, tgl_masuk=? WHERE id=?";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param("sssssi", $nama_mahasiswa, $alamat, $jurusan, $jenkel, $tanggal_masuk, $id);
    
    if ($dewan1->execute()) {
    	echo "<script>alert('Data Berhasil Diubah');location='index.php';</script>";
    } else {
    	echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

$db1->close();
?>