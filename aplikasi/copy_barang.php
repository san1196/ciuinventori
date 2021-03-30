<?php
session_start();
include('includes/config.php');


$query = mysqli_query($con, "INSERT INTO barang (id_barang, keterangan, nama_barang, serial_number) SELECT id_upload, spesifikasi, merk, serial_number FROM upload");

$query22 = mysqli_query($con, "TRUNCATE upload");
?>
	<script language="javascript">alert("Copy Success"); document.location="manage_barang";</script>
<?php