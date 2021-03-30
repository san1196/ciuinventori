<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


if(isset($_POST['update']))
	{
		$today = date('m-d-Y');
		$tgl_agenda = $_POST['tgl_lelang'];
		$date1 = date_create($tgl_agenda);
		$dari = date_format($date1, 'm-d-Y'); 
	if ($dari < $today)
	{
		?><script>alert("Mulai Pelelangan Harus Setelah Hari Ini."); window.history.back();</script><?php
	}
	else
	{
		$id_lelang					= $_POST['id_lelang'];
		$id_barang					= $_POST['id_barang'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$tgl_lelang					= $_POST['tgl_lelang'];
		
		$harga_penawaran			= $_POST['harga_penawaran'];
		$status_lelang				= $_POST['status_lelang'];
		
		$jam_mulai					= $_POST['jam_mulai'];
		$jam_selesai				= $_POST['jam_selesai'];
		
		
		
		$query = mysqli_query($con, "update pelelangan set id_lelang='$id_lelang', id_barang='$id_barang', namabrg_lelang='$namabrg_lelang', tgl_lelang='$tgl_lelang', harga_penawaran='$harga_penawaran', id_user='-', status_lelang='$status_lelang', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' where id_lelang='$id_lelang'");
		
		$query=mysqli_query($con,"select * from user");
		while($row=mysqli_fetch_array($query))
		{

		$to = $row['email'];
		$subject = "Informasi Jadwal Lelang";
		$messages = "Berikut ini adalah barang yang akan di lelang, yaitu:\n--Nama Barang: $namabrg_lelang\n--Tanggal: $tgl_lelang\n--Jam Mulai: $jam_mulai\n--Jam Selesai: $jam_selesai\nserta silahkan lakukan pengecekan di aplikasi inventori.\n";
		
		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori"; 
		@mail($to, $subject, $messages, $headers);
		
			?>
			<script language="javascript">alert("Pelelangan Barang siap dilaksanakan."); document.location="manage_lelang";</script>
			<?php
		
		}
	}
	}
	
if(isset($_POST['update_undi']))
	{
	
		$id_lelang					= $_POST['id_lelang'];
		$id_barang					= $_POST['id_barang'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$status_barang_lelang		= $_POST['status_barang_lelang'];
		$status_lelang				= $_POST['status_lelang'];
		
		
		
		$query = mysqli_query($con, "update pelelangan set id_lelang='$id_lelang', id_barang='$id_barang', namabrg_lelang='$namabrg_lelang', status_barang_lelang='$status_barang_lelang', status_lelang='$status_lelang' where id_lelang='$id_lelang'");

		$query2 = mysqli_query($con, "update pelelangan set status_lelang='Dilelang' where status_barang_lelang='Lelang' and id_lelang='$id_lelang'");

		$query3 = mysqli_query($con, "update pelelangan set status_lelang='Diundi' where status_barang_lelang='Undian' and id_lelang='$id_lelang'");
		
		
		
			?>
			<script language="javascript">alert("Update Success."); document.location="manage_barang";</script>
			<?php
		
		
	}
	
if(isset($_POST['tawar']))
	{
		$id_lelang					= $_POST['id_lelang'];
		$q = mysqli_query($con, "select * from pelelangan where id_lelang='$id_lelang'");
		$cek = mysqli_fetch_array($q);
		$data = $cek['harga_penawaran'];
		$harga_penawaran			= $_POST['harga_penawaran'];
		if($harga_penawaran <= $data){
			?>
			<script language="javascript">alert("Harga yang Anda tawar terlalu rendah atau sama, harga saat ini yaitu <?php echo number_format($data); ?>"); document.location="dashboard_pg";</script>
			<?php
		}
		else
		{
		
		$id_lelang					= $_POST['id_lelang'];
		$id_barang					= $_POST['id_barang'];
		$id_user					= $_POST['id_user'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$harga_penawaran			= $_POST['harga_penawaran'];
		$tgl	= date('m-d-Y');
		
		
		
		$query = mysqli_query($con, "update pelelangan set id_lelang='$id_lelang', id_barang='$id_barang', namabrg_lelang='$namabrg_lelang', harga_penawaran='$harga_penawaran', id_user='$id_user' where id_lelang='$id_lelang'");
		$penawar = mysqli_query($con, "insert into penawar values('','$id_user','$id_lelang','$_SESSION[nama_pegawai]','$namabrg_lelang','$harga_penawaran','$tgl')");
		?>
			<script language="javascript">alert("Penawaran Barang Lelang berhasil."); document.location="dashboard_pg";</script>
			<?php
		}
	}
