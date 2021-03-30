<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		$id_user					= $_POST['id_user'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		$username					= $_POST['username'];
		$password					= sha1($_POST['password']);
		
		
		$cekdata = mysqli_query($con,"select username from user where username='$username'");
		if(mysqli_num_rows($cekdata)>0)
		{ 
		  echo '<script language="javascript">alert("Username sudah terdaftar, silahkan coba lagi..."); document.location="add_user";</script>';
		}
		else
		{
		$query = mysqli_query($con, "insert into user values('$id_user','$nik_pegawai','$nama_pegawai','$no_telp','$email','$satker','$jabatan','$username','$password','1')");
		?>
			<script language="javascript">alert("Data User berhasil ditambahkan."); document.location="manage_user";</script>
			<?php
		}
	}
	
if(isset($_POST['update']))
	{
		$id_user					= $_POST['id_user'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		// $username					= $_POST['username'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		
		
		$query = mysqli_query($con, "update user set id_user='$id_user', nik_pegawai='$nik_pegawai', nama_pegawai='$nama_pegawai', no_telp='$no_telp', email='$email', satker='$satker', jabatan='$jabatan' where id_user='$id_user'");
		?>
			<script language="javascript">alert("Data User berhasil Diubah."); document.location="manage_user";</script>
			<?php
		
	}
	
if(isset($_POST['update_pg']))
	{
		$id_user					= $_POST['id_user'];
		$nik_pegawai				= $_POST['nik_pegawai'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$username					= $_POST['username'];
		$no_telp					= $_POST['no_telp'];
		$email						= $_POST['email'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		
		
		$query = mysqli_query($con, "update user set id_user='$id_user', nik_pegawai='$nik_pegawai', nama_pegawai='$nama_pegawai', username='$username', no_telp='$no_telp', email='$email', satker='$satker', jabatan='$jabatan' where id_user='$id_user'");
		?>
			<script language="javascript">alert("Profile User berhasil Diubah."); document.location="manage_profile";</script>
			<?php
		
	}
	
if($_GET['id_user']){
	$id = base64_decode($_GET['id_user']);
	mysqli_query($con,"delete from user where id_user='$id'");
	header ('location:manage_user');
	}
?>