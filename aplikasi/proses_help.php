<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['submit']))
{
	$id_helpdesk	= $_POST['id_helpdesk'];
	$nama			= $_POST['nama'];
	$email			= $_POST['email'];
	$divisi			= $_POST['divisi'];
	$kategori		= $_POST['kategori'];
	$kategori_ot	= $_POST['kategori_ot'];
	$subject		= $_POST['subject'];
	$pesan			= $_POST['pesan'];
	$status			= $_POST['status'];
	$tanggal		= $_POST['tanggal'];
	$id_user		= $_POST['id_user'];
	$id_attachment	= $_POST['id_attachment'];
	$last_update	= $_POST['last_update'];
	$tgl_tempo		= date('m-d-Y', strtotime("+7 days"));
	$jumlah 		= count($_FILES['attachment']['name']);

	if($kategori == "Software/Application/Email")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'SW%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "SW";
		$ticket = $today . sprintf("%05s", $noUrut);


		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Hardware/PC/Printer/Laptop")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'HW%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "HW";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Network/Telephone")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'NT%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "NT";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Others")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'OT%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "OT";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		<?php
		}*/

			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="help_req";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
}


if(isset($_POST['submit_adm']))
{
	$id_helpdesk	= $_POST['id_helpdesk'];
	$nama			= $_POST['nama'];
	$email			= $_POST['email'];
	$divisi			= $_POST['divisi'];
	$kategori		= $_POST['kategori'];
	$kategori_ot	= $_POST['kategori_ot'];
	$subject		= $_POST['subject'];
	$pesan			= $_POST['pesan'];
	$status			= $_POST['status'];
	$tanggal		= $_POST['tanggal'];
	$id_user		= $_POST['id_user'];
	$id_attachment	= $_POST['id_attachment'];
	$last_update	= $_POST['last_update'];
	$tgl_tempo		= date('m-d-Y', strtotime("+7 days"));
	$jumlah 		= count($_FILES['attachment']['name']);

	if($kategori == "Software/Application/Email")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'SW%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "SW";
		$ticket = $today . sprintf("%05s", $noUrut);


		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Hardware/PC/Printer/Laptop")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'HW%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "HW";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Network/Telephone")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'NT%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "NT";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	else if($kategori == "Others")
	{

		$hasil = mysqli_query($con,"select max(id_helpdesk) as idMaks from helpdesk where id_helpdesk like 'OT%'");
		$data  = mysqli_fetch_array($hasil);
		$idMax = $data['idMaks'];
		$noUrut = (int) substr($idMax, 2, 5);
		$noUrut++;
		$today = "OT";
		$ticket = $today . sprintf("%05s", $noUrut);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
		$query = mysqli_query($con, "insert into helpdesk values('$ticket','$nama','$email','$divisi','$kategori','$kategori_ot','$subject','$pesan','$status','$tanggal','$id_user', '$last_update', '$tgl_tempo')");
		
		$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '$ticket', '-', '$pesan', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");

		/*$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda Berhasil\n\nNo Ticket : $ticket\nCategory : $kategori [$kategori_ot]\nSubject : $subject\nMessage : $pesan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		<?php
		}*/
		<script language="javascript">alert('<?php echo "Request Tiket Anda Berhasil, dengan No Ticket $ticket"?>'); document.location="manage_helpdesk";</script>
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
}


if(isset($_POST['komen']))
	{
		$id_pesan					= $_POST['id_pesan'];
		$id_helpdesk				= $_POST['id_helpdesk'];
		$user						= $_POST['user'];
		$permission					= $_POST['permission'];
		$komentar					= $_POST['komentar'];
		$message					= $_POST['message'];
		$tanggal					= $_POST['tanggal'];
		$tgl_tempo					= date('m-d-Y', strtotime("+7 days"));
		
		$jumlah 					= count($_FILES['attachment']['name']);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
			$query = mysqli_query($con, "insert into pesan_helpdesk values('$id_pesan','$id_helpdesk','$user','$permission','$message','$komentar','$tanggal')");
			$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '-', '$id_helpdesk', '$message', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");
			$update = mysqli_query($con, "update helpdesk set status='Balasan User', last_update='$tanggal', tgl_tempo='$tgl_tempo' where id_helpdesk='$id_helpdesk'");
			?>
				<script language="javascript">alert("Your comment is post"); window.location = 'javascript:history.go(-1)' </script>
			<?php
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	
if(isset($_POST['koment']))
	{
		$id_pesan					= $_POST['id_pesan'];
		$id_helpdesk				= $_POST['id_helpdesk'];
		$user						= $_POST['user'];
		$permission					= $_POST['permission'];
		$komentar					= $_POST['komentar'];
		$message					= $_POST['message'];
		$tanggal					= $_POST['tanggal'];
		$tgl_tempo					= date('m-d-Y', strtotime("+7 days"));
		
		$jumlah 					= count($_FILES['attachment']['name']);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
			$query = mysqli_query($con, "insert into pesan_helpdesk values('$id_pesan','$id_helpdesk','$user','$permission','$message','$komentar','$tanggal')");
			$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '-', '$id_helpdesk', '$message', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");
			$update = mysqli_query($con, "update helpdesk set status='Dijawab', last_update='$tanggal', tgl_tempo='$tgl_tempo' where id_helpdesk='$id_helpdesk'");
			?>
				<script language="javascript">alert("Your comment is post"); window.location = 'javascript:history.go(-1)' </script>
			<?php
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	

if(isset($_POST['komen_admin']))
	{
		$id_pesan					= $_POST['id_pesan'];
		$id_helpdesk				= $_POST['id_helpdesk'];
		$user						= $_POST['user'];
		$permission					= $_POST['permission'];
		$komentar					= $_POST['komentar'];
		$message					= $_POST['message'];
		$tanggal					= $_POST['tanggal'];
		$tgl_tempo					= date('m-d-Y', strtotime("+7 days"));
		
		$jumlah 					= count($_FILES['attachment']['name']);

		if ($jumlah < 6) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) {
				$file_name = $_FILES['attachment']['name'][$i];
				$tmp_name = $_FILES['attachment']['tmp_name'][$i];
				move_uploaded_file($tmp_name, "attachments/helpdesk/".$file_name);
				$gambar[$i] = $file_name;
			}
			$query = mysqli_query($con, "insert into pesan_helpdesk values('$id_pesan','$id_helpdesk','$user','$permission','$message','$komentar','$tanggal')");
			$query1 = mysqli_query($con, "insert into tbl_attachment values('$id_attachment', '-', '$id_helpdesk', '$message', '$tanggal', '$gambar[0]','$gambar[1]','$gambar[2]','$gambar[3]','$gambar[4]')");
			$update = mysqli_query($con, "update helpdesk set status='Balasan Admin', last_update='$tanggal', tgl_tempo='$tgl_tempo' where id_helpdesk='$id_helpdesk'");
			?>
				<script language="javascript">alert("Your comment is post"); window.location = 'javascript:history.go(-1)' </script>
			<?php
		}
		else {
		?>
			<script language="javascript">alert("Attachment Maximal 5 attachments"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	

if($_GET['id_helpdesk'])
{
	$id = base64_decode($_GET['id_helpdesk']);
	$id2 = base64_decode($_GET['id_user']);
	
	$query = mysqli_query($con,"update helpdesk set status='Selesai' where id_helpdesk='$id'");
	
	$query4=mysqli_query($con,"select * from user where id_user='$id2'");
			while($row=mysqli_fetch_array($query4))
			{
			$to = $row['email'];
			$subjects = "Information Ticket Helpdesk";
			$messages = "Layanan Helpdesk Anda telah selesai:\n\nNo Ticket : $id";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Layanan Request Helpdesk telah selesai, dengan No Ticket $id"?>"); document.location="manage_helpdesk";</script>
			<?php
			}
}
?>
