<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		$id_user					= $_POST['id_user'];
		$id_pengadaan				= $_POST['id_pengadaan'];
		$no_pengadaan				= $_POST['no_pengadaan'];
		$tgl_pengadaan				= $_POST['tgl_pengadaan'];
		$nama_barang				= $_POST['nama_barang'];
		$jumlah_pengadaan			= $_POST['jumlah_pengadaan'];
		$harga_pengadaan			= $_POST['harga_pengadaan'];
		$totalharga_pengadaan		= $_POST['totalharga_pengadaan'];
		$status						= $_POST['status'];
		$jumlah						= $jumlah_pengadaan;
		$date1 	= date_create($tgl_pengadaan);
		$dari 	= date_format($date1, 'm-d-Y');
		
		
		
		$query = mysqli_query($con, "insert into pengadaan values('$id_pengadaan','$id_user','$no_pengadaan','$dari','$nama_barang','$jumlah_pengadaan','$jumlah','$harga_pengadaan','$totalharga_pengadaan','$status')");
		?>
			<script language="javascript">alert("Pengadaan Barang berhasil Ditambahkan."); document.location="manage_pengadaan";</script>
			<?php
		
	}
	
if(isset($_POST['request']))
	{
		$id_user					= $_POST['id_user'];
		$id_pengadaan				= $_POST['id_pengadaan'];
		$no_pengadaan				= $_POST['no_pengadaan'];
		$tgl_pengadaan				= $_POST['tgl_pengadaan'];
		$nama_barang				= $_POST['nama_barang'];
		$jumlah_pengadaan			= $_POST['jumlah_pengadaan'];
		$harga_pengadaan			= $_POST['harga_pengadaan'];
		$totalharga_pengadaan		= $_POST['totalharga_pengadaan'];
		$status						= $_POST['status'];
		$jumlah						= $jumlah_pengadaan;
		
		
		$query = mysqli_query($con, "insert into pengadaan values('$id_pengadaan','$id_user','$no_pengadaan','$tgl_pengadaan','$nama_barang','$jumlah_pengadaan','$jumlah','$harga_pengadaan','$totalharga_pengadaan','$status')");
			?>
			<script language="javascript">alert("Pesanan Anda sudah disimpan dan akan segera diproses, terimakasih..."); document.location="manage_req";</script>
			<?php
		
	}
	
if(isset($_POST['update']))
	{
		$id_user					= $_POST['id_user'];
		$id_pengadaan				= $_POST['id_pengadaan'];
		$no_pengadaan				= $_POST['no_pengadaan'];
		$tgl_pengadaan				= $_POST['tgl_pengadaan'];
		$nama_barang				= $_POST['nama_barang'];
		$jumlah_pengadaan			= $_POST['jumlah_pengadaan'];
		$harga_pengadaan			= $_POST['harga_pengadaan'];
		$totalharga_pengadaan		= $_POST['totalharga_pengadaan'];
		$status						= $_POST['status'];
		$jumlah						= $jumlah_pengadaan;
		
		$query = mysqli_query($con, "update pengadaan set id_pengadaan='$id_pengadaan', id_user='$id_user', no_pengadaan='$no_pengadaan', tgl_pengadaan='$tgl_pengadaan', nama_barang='$nama_barang', jumlah_pengadaan='$jumlah_pengadaan', jumlah='$jumlah', harga_pengadaan='$harga_pengadaan', totalharga_pengadaan='$totalharga_pengadaan', status='$status' where id_pengadaan='$id_pengadaan'");
		?>
			<script language="javascript">alert("Pengadaan Barang berhasil Diubah."); document.location="manage_pengadaan";</script>
			<?php
		
	}
	
if($_GET['id_pengadaan']){
	$id = base64_decode($_GET['id_pengadaan']);
	mysqli_query($con,"delete from pengadaan where id_pengadaan='$id'");
	header ('location:manage_pengadaan');
	}
?>