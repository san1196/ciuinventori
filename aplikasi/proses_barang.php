<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		$id_barang					= $_POST['id_barang'];
		$id_lelang					= $_POST['id_lelang'];
		$id_user					= $_POST['id_user'];
		$id_pengadaan				= $_POST['id_pengadaan'];
		$code_barang				= $_POST['code_barang'];
		$kategori					= $_POST['kategori'];
		$nama_barang				= $_POST['nama_barang'];
		$namabrg_lelang				= $_POST['namabrg_lelang'];
		$jenis_barang				= $_POST['jenis_barang'];
		$keterangan					= $_POST['keterangan'];
		$serial_number				= $_POST['serial_number'];
		$merk						= $_POST['merk'];
		$tanggal_beli				= $_POST['tanggal_beli'];
		$harga_beli					= $_POST['harga_beli'];
		$status_barang				= $_POST['status_barang'];
		
		$tgl_lelang					= $_POST['tgl_lelang'];
		$hrg_stlh_penyusutan		= $_POST['hrg_stlh_penyusutan'];
		$status_lelang				= $_POST['status_lelang'];

		$harga_awal					= $_POST['harga_awal'];
		$harga_penawaran			= $_POST['harga_penawaran'];
		$tanggal					= $_POST['tanggal'];
		
		
		$status_barang_lelang		= $_POST['status_barang_lelang'];
		
		$tanggal2					= $_POST['tanggal2'];
		$hrg_stlh_penyusutan2		= $_POST['hrg_stlh_penyusutan2'];
		
		$date1 	= date_create($tanggal_beli);
		$dari 	= date_format($date1, 'm-d-Y');
		
		$tgl2 	= date('d-m-Y', strtotime('+5 year', strtotime($tanggal)));
		$date2 	= date_create($tgl2);
		$dari2	= date_format($date2, 'm-d-Y');
		
		

		
			if($jenis_barang == "Habis Pakai"){
				$cekdata = mysqli_query($con,"select serial_number from barang where serial_number='$serial_number'");
				if(mysqli_num_rows($cekdata)>0)
				{ 
				  echo '<script language="javascript">alert("Serial Number sudah terdaftar"); document.location="add_barang";</script>';
				}
				else
				{
				$query = mysqli_query($con, "insert into barang values('$id_barang','$id_pengadaan','-','$code_barang','$kategori','$nama_barang','$jenis_barang','$keterangan','$serial_number','$merk','$dari','$harga_beli','$status_barang')");
				
				$query2 = mysqli_query($con, "insert into pelelangan values('$id_lelang','$id_barang','$namabrg_lelang','$tanggal2','$tgl_lelang','$harga_awal','$hrg_stlh_penyusutan2','$status_lelang','$harga_penawaran','$status_barang_lelang','-','','')");
				
				$query3=mysqli_query($con,"select * from pengadaan where id_pengadaan='$id_pengadaan'");
				while($row=mysqli_fetch_array($query3))
				{
				$jumlah = $row['jumlah_pengadaan'];
				$net 	= $jumlah - 1;
				
				$query4 = mysqli_query($con,"update pengadaan set jumlah_pengadaan='$net' where id_pengadaan='$id_pengadaan'");
				}
				?>
				<script language="javascript">alert("Data Barang berhasil disimpan."); document.location="manage_barang";</script>
				<?php
				}
			}
			else {
				$cekdata = mysqli_query($con,"select serial_number from barang where serial_number='$serial_number'");
				if(mysqli_num_rows($cekdata)>0)
				{ 
				  echo '<script language="javascript">alert("Serial Number sudah terdaftar"); document.location="add_barang";</script>';
				}
				else
				{
				$query = mysqli_query($con, "insert into barang values('$id_barang','$id_pengadaan','-','$code_barang','$kategori','$nama_barang','$jenis_barang','$keterangan','$serial_number','$merk','$dari','$harga_beli','$status_barang')");
				
				$query2 = mysqli_query($con, "insert into pelelangan values('$id_lelang','$id_barang','$namabrg_lelang','$dari2','$tgl_lelang','$harga_awal','$hrg_stlh_penyusutan','$status_lelang','$harga_penawaran','$status_barang_lelang','-','','')");
				
				$query3=mysqli_query($con,"select * from pengadaan where id_pengadaan='$id_pengadaan'");
				while($row=mysqli_fetch_array($query3))
				{
				$jumlah = $row['jumlah_pengadaan'];
				$net 	= $jumlah - 1;
				
				$query4 = mysqli_query($con,"update pengadaan set jumlah_pengadaan='$net' where id_pengadaan='$id_pengadaan'");
				}
				?>
				<script language="javascript">alert("Data Barang berhasil disimpan."); document.location="manage_barang";</script>
				<?php
				}
			}
		
	}
	
if(isset($_POST['submit_rental']))
	{
		$id_barang3					= $_POST['id_barang3'];
		$id_lelang3					= $_POST['id_lelang3'];
		$id_user3					= $_POST['id_user3'];
		$id_pengadaan3				= $_POST['id_pengadaan3'];
		$code_barang3				= $_POST['code_barang3'];
		$kategori3					= $_POST['kategori3'];
		$nama_barang3				= $_POST['nama_barang3'];
		$namabrg_lelang3			= $_POST['namabrg_lelang3'];
		$jenis_barang3				= $_POST['jenis_barang3'];
		$keterangan3				= $_POST['keterangan3'];
		$serial_number3				= $_POST['serial_number3'];
		$merk3						= $_POST['merk3'];
		$tanggal_beli3				= $_POST['tanggal_beli3'];
		$harga_beli3				= $_POST['harga_beli3'];
		$status_barang3				= $_POST['status_barang3'];

		$date1 	= date_create($tanggal_beli3);
		$dari 	= date_format($date1, 'm-d-Y');

		
			if($jenis_barang == "Habis Pakai"){
				$cekdata = mysqli_query($con,"select serial_number from barang where serial_number='$serial_number3'");
				if(mysqli_num_rows($cekdata)>0)
				{ 
				  echo '<script language="javascript">alert("Serial Number sudah terdaftar"); document.location="add_barang";</script>';
				}
				else
				{
				$query = mysqli_query($con, "insert into barang values('$id_barang3','$id_pengadaan3','-','$code_barang3','$kategori3','$nama_barang3','$jenis_barang3','$keterangan3','$serial_number3','$merk3','$dari','$harga_beli3','$status_barang3')");
				
				
				
				$query3=mysqli_query($con,"select * from pengadaan where id_pengadaan='$id_pengadaan3'");
				while($row=mysqli_fetch_array($query3))
				{
				$jumlah = $row['jumlah_pengadaan'];
				$net 	= $jumlah - 1;
				
				$query4 = mysqli_query($con,"update pengadaan set jumlah_pengadaan='$net' where id_pengadaan='$id_pengadaan3'");
				}
				?>
				<script language="javascript">alert("Data Barang Rental berhasil disimpan."); document.location="manage_barang";</script>
				<?php
				}
			}
			else {
				$cekdata = mysqli_query($con,"select serial_number from barang where serial_number='$serial_number3'");
				if(mysqli_num_rows($cekdata)>0)
				{ 
				  echo '<script language="javascript">alert("Serial Number sudah terdaftar"); document.location="add_barang";</script>';
				}
				else
				{
				$query = mysqli_query($con, "insert into barang values('$id_barang3','$id_pengadaan3','-','$code_barang3','$kategori3','$nama_barang3','$jenis_barang3','$keterangan3','$serial_number3','$merk3','$dari','$harga_beli3','$status_barang3')");
				
				
				
				$query3=mysqli_query($con,"select * from pengadaan where id_pengadaan='$id_pengadaan3'");
				while($row=mysqli_fetch_array($query3))
				{
				$jumlah = $row['jumlah_pengadaan'];
				$net 	= $jumlah - 1;
				
				$query4 = mysqli_query($con,"update pengadaan set jumlah_pengadaan='$net' where id_pengadaan='$id_pengadaan3'");
				}
				?>
				<script language="javascript">alert("Data Barang Rental berhasil disimpan."); document.location="manage_barang";</script>
				<?php
				}
			}
		
	}
	
if(isset($_POST['rental_up']))
	{
		$id_barang					= $_POST['id_barang'];
		$id_user					= $_POST['id_user'];
		$id_pengadaan				= $_POST['id_pengadaan'];
		$code_barang				= $_POST['code_barang'];
		$kategori					= $_POST['kategori'];
		$nama_barang				= $_POST['nama_barang'];
		$jenis_barang				= $_POST['jenis_barang'];
		$keterangan					= $_POST['keterangan'];
		$serial_number				= $_POST['serial_number'];
		$merk						= $_POST['merk'];
		$tanggal_beli				= $_POST['tanggal_beli'];
		$harga_beli					= $_POST['harga_beli'];
		$status_barang				= $_POST['status_barang'];
		
		
		$query = mysqli_query($con, "UPDATE barang SET id_barang='$id_barang', id_user='--', status_barang='$status_barang [Returned]' WHERE id_barang='$id_barang'");
		
		
		
		?>
			<script language="javascript">alert("Barang Rental berhasil dikembalikan."); document.location="manage_barang";</script>
		<?php
		
	}
	
if($_GET['id_barang']){
	$id = base64_decode($_GET['id_barang']);
	mysqli_query($con,"delete from barang where id_barang='$id'");
	mysqli_query($con,"delete from pelelangan where id_barang='$id'");
	header ('location:manage_barang');
	}
	
?>