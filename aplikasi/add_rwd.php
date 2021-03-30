<?php
require_once ('includes/config.php');
session_start(); 
	$query = mysqli_query($con,"TRUNCATE tbl_hadiah");
	
    $query1 = mysqli_query($con,"INSERT INTO tbl_hadiah (Id_barang, Hadiah) 
	
	SELECT id_barang, namabrg_lelang FROM pelelangan WHERE status_barang_lelang='Undian' AND id_user='-'");
	
	
	?>
			<script language="javascript">alert("Daftar Hadiah berhasil ditambah."); document.location="pst_rwd";</script>
		