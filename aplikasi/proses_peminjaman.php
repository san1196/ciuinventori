<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		$id_peminjaman					= $_POST['id_peminjaman'];

		$id_user   					= $_POST['id_user'];
		$nama_pegawai 					= $_POST['nama_pegawai'];
		$jenis_barang 					= $_POST['jenis_barang'];
		$tanggal_pinjam					= $_POST['tanggal_pinjam'];
		$tanggal_digunakan				= $_POST['tanggal_digunakan'];
		$waktu_peminjaman1 				= $_POST['waktu_peminjaman1'];
		$waktu_peminjaman2 				= $_POST['waktu_peminjaman2'];
		/*$waktu_peminjaman				= date('m-d-Y', strtotime($waktu, strtotime($tanggal_digunakan)));*/
		$keperluan    					= $_POST['keperluan'];
		$lokasi       					= $_POST['lokasi'];
		$lokasi_ext   					= $_POST['lokasi_ext'];
		$tanggal_penyerahan				= $_POST['tanggal_penyerahan'];
		$diserahkan    					= $_POST['diserahkan'];
		$kepada       					= $_POST['kepada'];
		$kepada_ext   					= $_POST['kepada_ext'];
		$merk		  					= $_POST['merk'];
		$serial_number 					= $_POST['serial_number'];
		$kelengkapan  					= $_POST['kelengkapan'];
		$tanggal_pengembalian			= $_POST['tanggal_pengembalian'];
		$dikembalikan_oleh				= $_POST['dikembalikan_oleh'];
		$diterima_oleh					= $_POST['diterima_oleh'];
		$kelengkapan_ext				= $_POST['kelengkapan_ext'];
		$status       					= $_POST['status'];
		
		$tempo1       					= $_POST['tempo1'];
		$tempo2       					= $_POST['tempo2'];
		
		$tgl_tempo1						= date('m-d-Y', strtotime('+'.$tempo1+$waktu_peminjaman1.' days', strtotime($tanggal_digunakan)));
		$tgl_tempo2						= date('m-d-Y', strtotime('+'.$tempo2+$waktu_peminjaman1.' days', strtotime($tanggal_digunakan)));
		
		
	if($waktu_peminjaman1 != "")
		{
		$query = mysqli_query($con, "insert into peminjaman values('$id_peminjaman','$id_user','$nama_pegawai','$jenis_barang','$tanggal_pinjam','$tanggal_digunakan','$waktu_peminjaman1 hari','$keperluan','$lokasi','$lokasi_ext','$tanggal_penyerahan','$diserahkan','$kepada','$kepada_ext','$merk','$serial_number','$kelengkapan','$tanggal_pengembalian','$dikembalikan_oleh','$diterima_oleh','$kelengkapan_ext','$status','$tgl_tempo1','$tgl_tempo2')");

		$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
			{

			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Request Peminjaman Barang Anda Berhasil\n\nNo Ticket : $id_peminjaman\nJenis Barang : $jenis_barang\nMulai Digunakan : $tanggal_digunakan\nLama Pinjam : $waktu_peminjaman1\nKeperluan : $keperluan\nLokasi : $lokasi [$lokasi_ext]";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Request Peminjaman Anda Berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman_pg";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Request Peminjaman Anda Berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman_pg";</script>
			<?php
		}
		else if($waktu_peminjaman2 != "")
		{
		$query = mysqli_query($con, "insert into peminjaman values('$id_peminjaman','$id_user','$nama_pegawai','$jenis_barang','$tanggal_pinjam','$tanggal_digunakan','$waktu_peminjaman2','$keperluan','$lokasi','$lokasi_ext','$tanggal_penyerahan','$diserahkan','$kepada','$kepada_ext','$merk','$serial_number','$kelengkapan','$tanggal_pengembalian','$dikembalikan_oleh','$diterima_oleh','$kelengkapan_ext','$status','-','-')");

		$query2 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query2))
			{

			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Request Peminjaman Barang Anda Berhasil\n\nNo Ticket : $id_peminjaman\nJenis Barang : $jenis_barang\nMulai Digunakan : $tanggal_digunakan\nLama Pinjam : $waktu_peminjaman2\nKeperluan : $keperluan\nLokasi : $lokasi [$lokasi_ext]";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Request Peminjaman Anda Berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman_pg";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Request Peminjaman Anda Berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman_pg";</script>
			<?php
		}
		else {
		?>
			<script language="javascript">alert("Data Gagal Disimpan"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}

	
if(isset($_POST['penyerahan']))
	{
		$id_peminjaman					= $_POST['id_peminjaman'];
		$id_user   					= $_POST['id_user'];
		$jenis_barang 					= $_POST['jenis_barang'];
		$tanggal_penyerahan				= $_POST['tanggal_penyerahan'];
		$kepada       					= $_POST['kepada'];
		$kepada_ext   					= $_POST['kepada_ext'];
		$kelengkapan  					= $_POST['kelengkapan'];
		$status       					= $_POST['status'];
		$merk       					= $_POST['merk'];
		$serial_number 					= $_POST['serial_number'];
		$diserahkan 					= $_POST['diserahkan'];


		if($kepada_ext != "")
		{
		$query = mysqli_query($con, "update peminjaman set id_peminjaman='$id_peminjaman', id_user='$id_user', jenis_barang='$jenis_barang', tanggal_penyerahan='$tanggal_penyerahan', diserahkan='$diserahkan', kepada_ext='$kepada_ext', merk='$merk', serial_number='$serial_number', kelengkapan='$kelengkapan', status='Digunakan' where id_peminjaman='$id_peminjaman'");
		$query2 = mysqli_query($con, "update barang set id_user='$id_user' where serial_number='$serial_number'");

		$query3 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query3))
		{

		$to = $row['email'];
		$subjects = "Peminjaman Barang";
		$messages = "Penyerahan Barang telah dilakukan, dan diterima oleh:\n\nNo Ticket : $id_peminjaman\nJenis Barang : $jenis_barang\nMerk : $merk\nSN : $serial_number\nKepada : $kepada [$kepada_ext]\n\npada tanggal $tanggal_penyerahan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert("<?php echo "Update penyerahan barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
		<?php
		}
		?>
			<script language="javascript">alert("<?php echo "Update penyerahan barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
		<?php
		}
		else if($kepada != "" && $kepada_ext =="")
		{
		$query = mysqli_query($con, "update peminjaman set id_peminjaman='$id_peminjaman', id_user='$id_user', jenis_barang='$jenis_barang', tanggal_penyerahan='$tanggal_penyerahan', diserahkan='$diserahkan', kepada='$kepada', merk='$merk', serial_number='$serial_number', kelengkapan='$kelengkapan', status='Digunakan' where id_peminjaman='$id_peminjaman'");
		$query2 = mysqli_query($con, "update barang set id_user='$id_user' where serial_number='$serial_number'");

		$query3 = mysqli_query($con,"select * from user where id_user='$id_user'");
		while($row=mysqli_fetch_array($query3))
		{

		$to = $row['email'];
		$subjects = "Peminjaman Barang";
		$messages = "Penyerahan Barang telah dilakukan, dan diterima oleh:\n\nNo Ticket : $id_peminjaman\nJenis Barang : $jenis_barang\nMerk : $merk\nSN : $serial_number\nKepada : $kepada [$kepada_ext]\n\npada tanggal $tanggal_penyerahan";

		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
		@mail($to, $subjects, $messages, $headers);

		?>
			<script language="javascript">alert("<?php echo "Update penyerahan barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
		<?php
		}
		?>
			<script language="javascript">alert("<?php echo "Update penyerahan barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
		<?php
		}
		else {
		?>
			<script language="javascript">alert("Data Gagal Disimpan"); window.location = 'javascript:history.go(-1)' </script>
		<?php
		}
	}
	
if(isset($_POST['pengembalian']))
	{
		$id_peminjaman					= $_POST['id_peminjaman'];
		
		$id_user   					= $_POST['id_user'];
		$nama_pegawai   				= $_POST['nama_pegawai'];
		$jenis_barang 					= $_POST['jenis_barang'];
		$tanggal_pengembalian			= $_POST['tanggal_pengembalian'];
		$kelengkapan   					= $_POST['kelengkapan'];
		$kelengkapan_ext				= $_POST['kelengkapan_ext'];
		$lengkap_ext  					= $_POST['lengkap_ext'];
		$status       					= $_POST['status'];
		$merk       					= $_POST['merk'];
		$serial_number 					= $_POST['serial_number'];
		$dikembalikan_oleh				= $_POST['dikembalikan_oleh'];
		$diterima_oleh				= $_POST['diterima_oleh'];

		if($lengkap_ext == "Lengkap")
		{
			$query = mysqli_query($con, "update peminjaman set id_peminjaman='$id_peminjaman', id_user='$id_user', nama_pegawai='$nama_pegawai', jenis_barang='$jenis_barang', tanggal_pengembalian='$tanggal_pengembalian', kelengkapan='$kelengkapan', kelengkapan_ext='$lengkap_ext', status='Dikembalikan', merk='$merk', serial_number='$serial_number', dikembalikan_oleh='$dikembalikan_oleh', diterima_oleh='$diterima_oleh' where id_peminjaman='$id_peminjaman'");
			$query2 = mysqli_query($con, "update barang set id_user='-' where serial_number='$serial_number'");
			
			$user_akun = mysqli_query($con, "update user set status_akun='1' where id_user='$id_user'");

			$query3 = mysqli_query($con,"select * from user where id_user='$id_user'");
			while($row=mysqli_fetch_array($query3))
			{

			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Barang telah dikembalikan, dan proses peminjaman selesai:\n\nNo Ticket : $id_peminjaman\nRequester : $nama_pegawai\nJenis Barang : $jenis_barang\nMerk : $merk\nSN : $serial_number\n\npada tanggal $tanggal_pengembalian";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Proses pengembalian barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Proses pengembalian barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
			<?php
		}
		else if($lengkap_ext == "Tidak Lengkap")
		{
			$query = mysqli_query($con, "update peminjaman set id_peminjaman='$id_peminjaman', id_user='$id_user', nama_pegawai='$nama_pegawai', jenis_barang='$jenis_barang', tanggal_pengembalian='$tanggal_pengembalian', kelengkapan='$kelengkapan', kelengkapan_ext='$kelengkapan_ext', status='Dikembalikan', merk='$merk', serial_number='$serial_number', dikembalikan_oleh='$dikembalikan_oleh' where id_peminjaman='$id_peminjaman'");
			$query2 = mysqli_query($con, "update barang set id_user='-' where serial_number='$serial_number'");
			
			$user_akun = mysqli_query($con, "update user set status_akun='1' where id_user='$id_user'");

			$query3 = mysqli_query($con,"select * from user where id_user='$id_user'");
			while($row=mysqli_fetch_array($query3))
			{

			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Barang telah dikembalikan, dan proses peminjaman selesai:\n\nNo Ticket : $id_peminjaman\nRequester : $nama_pegawai\nJenis Barang : $jenis_barang\nMerk : $merk\nSN : $serial_number\n\npada tanggal $tanggal_pengembalian";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Proses pengembalian barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Proses pengembalian barang berhasil, dengan No Ticket $id_peminjaman"?>"); document.location="manage_peminjaman";</script>
			<?php
		}
	}
	
if($_GET['id_peminjaman'])
{
	$id = base64_decode($_GET['id_peminjaman']);
	$id2 = base64_decode($_GET['id_user']);
	
	$query = mysqli_query($con,"update peminjaman set status='Batal' where id_peminjaman='$id'");
	
	$query4=mysqli_query($con,"select * from user where id_user='$id2'");
			while($row=mysqli_fetch_array($query4))
			{
			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Permintaan Peminjaman telah dibatalkan:\n\nNo Ticket : $id";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Permintaan Peminjaman berhasil dibatalkan, dengan No Ticket $id"?>"); document.location="manage_peminjaman";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Permintaan Peminjaman berhasil dibatalkan, dengan No Ticket $id"?>"); document.location="manage_peminjaman";</script>
			<?php
}

if($_GET['id_peminjaman2'])
{
	$id = base64_decode($_GET['id_peminjaman2']);
	$id2 = base64_decode($_GET['id_user2']);
	
	$query = mysqli_query($con,"update peminjaman set status='Hilang' where id_peminjaman='$id'");
	
	$query4=mysqli_query($con,"select * from user where id_user='$id2'");
			while($row=mysqli_fetch_array($query4))
			{
			$to = $row['email'];
			$subjects = "Peminjaman Barang";
			$messages = "Barang yang Anda Pinjam Hilang:\n\nNo Ticket : $id\n\nAkun Anda akan di Nonaktifkan";

			$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
			@mail($to, $subjects, $messages, $headers);

			?>
				<script language="javascript">alert("<?php echo "Permintaan Peminjaman berhasil dibatalkan, dengan No Ticket $id"?>"); document.location="manage_peminjaman";</script>
			<?php
			}
			?>
				<script language="javascript">alert("<?php echo "Barang Peminjaman Hilang diproses, dengan No Ticket $id"?>"); document.location="manage_peminjaman";</script>
			<?php
}
?>