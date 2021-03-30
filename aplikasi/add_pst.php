<?php
require_once ('includes/config.php');
session_start(); 
	$query = mysqli_query($con,"TRUNCATE tbl_peserta");
	
    $query1 = mysqli_query($con,"INSERT INTO tbl_peserta (Nomor, Nama) 
	
	SELECT nik_pegawai, nama_pegawai FROM user WHERE jabatan='Karyawan'");
	
	
	?>
			<script language="javascript">alert("Daftar Peserta berhasil ditambah."); document.location="pst_rwd";</script>
		