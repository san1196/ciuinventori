<?php
session_start();
include('includes/config.php');

if(isset($_POST['update']))
	{
		$id_lelang					= $_POST['id_lelang'];
		$id_barang					= $_POST['id_barang'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$tgl_lelang					= $_POST['tgl_lelang'];
		
		$harga_penawaran			= $_POST['harga_penawaran'];
		$status_lelang				= $_POST['status_lelang'];
		
		
		
		$query = mysqli_query($con, "update pelelangan set id_lelang='$id_lelang', id_barang='$id_barang', namabrg_lelang='$namabrg_lelang', tgl_lelang='$tgl_lelang', harga_penawaran='$harga_penawaran', status_lelang='$status_lelang' where id_lelang='$id_lelang'");
		
		$query=mysqli_query($con,"select * from pegawai");
		while($row=mysqli_fetch_array($query))
		{

		$userkey = "vt84ci";
		$passkey = "nd30a43w4v";
		$telepon = $row['no_telp'];
		$message = "Berikut ini adalah barang yang akan di lelang, yaitu: ($namabrg_lelang), dan catat tanggal pelelangan barangnya yaitu tanggal $tgl_lelang, serta silahkan lakukan pengecekan di aplikasi inventori.";
		$url = "https://reguler.zenziva.net/apps/smsapi.php";
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle);
		curl_close($curlHandle);

		
			?>
			<script language="javascript">alert("Pelelangan Barang siap dilaksanakan."); document.location="manage_lelang";</script>
			<?php
		}
	}
	
if(isset($_POST['tawar']))
	{
		$id_lelang					= $_POST['id_lelang'];
		$q = mysqli_query($con, "select * from pelelangan where id_lelang='$id_lelang'");
		$cek = mysqli_fetch_array($q);
		$data = $cek['harga_penawaran'];
		$harga_penawaran			= $_POST['harga_penawaran'];
		if($harga_penawaran < $data){
			?>
			<script language="javascript">alert("Harga yang Anda tawar terlalu rendah, harga saat ini yaitu <?php echo number_format($data); ?>"); document.location="dashboard_pg";</script>
			<?php
		}
		else
		{
		
		$id_lelang					= $_POST['id_lelang'];
		$id_barang					= $_POST['id_barang'];
		$id_pegawai					= $_POST['id_pegawai'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$harga_penawaran			= $_POST['harga_penawaran'];
		
		
		
		$query = mysqli_query($con, "update pelelangan set id_lelang='$id_lelang', id_barang='$id_barang', namabrg_lelang='$namabrg_lelang', harga_penawaran='$harga_penawaran', id_pegawai='$id_pegawai' where id_lelang='$id_lelang'");
		?>
			<script language="javascript">alert("Penawaran Barang Lelang berhasil."); document.location="dashboard_pg";</script>
			<?php
		}
	}