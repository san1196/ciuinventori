<?php
 include('includes/config.php');
 if (isset($_POST['btnReset'])) 
 {
  $username = $_POST['username'];
  $cek = mysqli_query($con, "SELECT username FROM user WHERE username = '$username' ");
  if (mysqli_num_rows($cek) == 1 ) 
  {
	$username = $_POST['username'];
	function randomPassword()
	{
	 
	$digit = 6;
	$karakter = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
	 
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = "";
	while ($i <= $digit-1)
	{
	$num = rand() % 32;
	$tmp = substr($karakter,$num,1);
	$pass = $pass.$tmp;
	$i++;
	}
	return $pass;
	}
	
	$newPassword = randomPassword();
	$newPasswordEnkrip = sha1($newPassword);
	
	$query = "SELECT * FROM user WHERE username = '$username'";
	$hasil = mysqli_query($con,$query);
	$data  = mysqli_fetch_array($hasil);
	$alamatEmail = $data['email'];
	
	$title  = "New Password";
	$pesan  = "Username: ".$username."\nNew Password: ".$newPassword."\n\nSetelah login segera ganti Password Anda";
	$header = "From: appsciu@gmail.com"."Aplikasi CIU Inventori";
	$kirimEmail = mail($alamatEmail, $title, $pesan, $header);
	
	if ($kirimEmail) {
		$query = "UPDATE user SET password = '$newPasswordEnkrip' WHERE username = '$username'";
		$hasil = mysqli_query($con,$query);
		if ($hasil) ?>
			<script>
			 alert("The new password has been reset and has been sent to your email");
			 window.location.href = 'index';
			</script> <?php
		}
		else { ?>
			<script>
			 alert("Sending new password to email failed");
			 window.location.href = 'lostpassword';
			</script> <?php
		}
  }
  else
  {
   ?>
    <script>
     alert("Username not registered");
     window.location.href = 'lostpassword';
    </script>
   <?php
  }
 }
?>