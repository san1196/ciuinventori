<?php

	include('includes/config.php');
	session_start();

	$username = $_POST['username'];
	$password = sha1($_POST['password']);
// query untuk mendapatkan record dari username
$query	= mysqli_query ($con, "select * from user where username='$username'");
$data = mysqli_fetch_array($query);


// cek kesesuaian password
if ($password == $data['password'] && $data['status_akun'] == '1')
{
    // menyimpan username dan level ke dalam session
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama_pegawai'] = $data['nama_pegawai'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['satker'] = $data['satker'];
    $_SESSION['jabatan'] = $data['jabatan'];
	echo '<script language="javascript">alert("User berhasil Login"); document.location="dashboard";</script>';
}
else if($password == $data['password'] && $data['status_akun'] == '0'){
	echo '<script language="javascript">alert("Akun Anda di Nonaktifkan"); document.location="index";</script>';
}
else 
?>
	<script language="JavaScript">
		alert('Username or Password is Wrong!');
		document.location ='index';
	</script>

