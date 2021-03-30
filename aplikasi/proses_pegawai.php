<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		$id_pegawai					= $_POST['id_pegawai'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		$username					= $_POST['username'];
		$password					= sha1($_POST['password']);
		
		
		$cekdata = mysqli_query($con,"select username from pegawai where username='$username'");
		if(mysqli_num_rows($cekdata)>0)
		{ 
		  echo '<script language="javascript">alert("Username sudah terdaftar, silahkan coba lagi..."); document.location="add_pegawai";</script>';
		}
		else
		{
		$query = mysqli_query($con, "insert into pegawai values('$id_pegawai','$nik_pegawai','$nama_pegawai','$no_telp','$email','$satker','$jabatan','$username','$password')");
		?>
			<script language="javascript">alert("Data Pegawai berhasil ditambahkan."); document.location="manage_pegawai";</script>
			<?php
		}
	}
	
if(isset($_POST['update']))
	{
		$id_pegawai					= $_POST['id_pegawai'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		
		
		$query = mysqli_query($con, "update pegawai set id_pegawai='$id_pegawai', nik_pegawai='$nik_pegawai', nama_pegawai='$nama_pegawai', no_telp='$no_telp', email='$email', satker='$satker', jabatan='$jabatan' where id_pegawai='$id_pegawai'");
		?>
			<script language="javascript">alert("Data Pegawai berhasil Diubah."); document.location="manage_pegawai";</script>
			<?php
		
	}
	
if(isset($_POST['update_pg']))
	{
		$id_pegawai					= $_POST['id_pegawai'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		
		
		$query = mysqli_query($con, "update pegawai set id_pegawai='$id_pegawai', nik_pegawai='$nik_pegawai', nama_pegawai='$nama_pegawai', no_telp='$no_telp', email='$email', satker='$satker', jabatan='$jabatan' where id_pegawai='$id_pegawai'");
		?>
			<script language="javascript">alert("Profile Karyawan berhasil Diubah."); document.location="manage_profile";</script>
			<?php
		
	}
	
if($_GET['id_pegawai']){
	$id = base64_decode($_GET['id_pegawai']);
	mysqli_query($con,"delete from pegawai where id_pegawai='$id'");
	header ('location:manage_pegawai');
	}
?>