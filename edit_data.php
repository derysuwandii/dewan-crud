<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Edit Data - www.dewankomputer.com</title>
	
	<!-- Untuk Keperluan Demo Saya Menggunakan Library Css Online, Jika sobat menggunakan untuk keperluan developmen/production maka download pada situs resminya -->
	<!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<!-- Image and text -->
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php" style="color: #fff;">
	    Dewan Komputer
	  </a>
	</nav>

	<div class="container">
		<h2 align="center" style="margin: 30px;">Edit Data</h2>
		<?php
			// data difilter terlebih dahulu & base64_decode berguna untuk mendeskripsi id yg sebelumnya di enkripsi/encoding
			$id = stripslashes(strip_tags(htmlspecialchars(base64_decode($_GET['aa']) ,ENT_QUOTES)));

			$query = "SELECT * FROM tbl_mahasiswa WHERE id=?";
	        $dewan1 = $db1->prepare($query);
	        $dewan1->bind_param("i", $id);
	        $dewan1->execute();
	        $res1 = $dewan1->get_result();
	        while ($row = $res1->fetch_assoc()) {
	        	$id = $row['id'];
	            $nama_mahasiswa = $row['nama_mahasiswa'];
	            $alamat = $row['alamat'];
	            $jurusan = $row['jurusan'];
	            $jenis_kelamin = $row['jenis_kelamin'];
	            $tgl_masuk = $row['tgl_masuk'];
	        }
		?>
		<form method="POST" action="edit_data_action.php">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
						<input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="<?php echo $nama_mahasiswa; ?>" required="true">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label><br>
						<input type="radio" name="jenkel" id="jenkel" value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki"){ echo "checked"; } ?>> Laki-laki
						<input type="radio" name="jenkel" id="jenkel" value="Perempuan" <?php if ($jenis_kelamin == "Perempuan"){ echo "checked"; } ?>> Perempuan
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" required="true"><?php echo $alamat; ?></textarea>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control" required="true">
							<option value=""></option>
							<option value="Sistem Informasi" <?php if ($jurusan == "Sistem Informasi"){ echo "selected"; } ?>>Sistem Informasi</option>
							<option value="Teknik Informatika" <?php if ($jurusan == "Teknik Informatika"){ echo "selected"; } ?>>Teknik Informatika</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?php echo $tgl_masuk; ?>" required="true">
					</div>

					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>

    <div class="text-center">© <?php echo date('Y'); ?> Copyright:
	    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
	</div>

</body>
</html>