<?php
session_start();
include('includes/config.php');

if(isset($_POST['submit']))
	{
		/*$id_barang					= $_POST['id_barang'];
		$q = mysqli_query($con, "select * from barang where id_barang='$id_barang'");
		$cek = mysqli_fetch_array($q);
		$data = $cek['stok'];
		$jumlah_peminjaman			= $_POST['jumlah_peminjaman'];
		if($data < $jumlah_peminjaman){
			?>
			<script language="javascript">alert("Jumlah Peminjaman melebihi sisa Stok!\nSisa Stok Barang yaitu <?php echo $data; ?> item."); document.location="add_peminjaman";</script>
			<?php
		}
		else
		{*/
		
		$id_barang					= $_POST['id_barang'];
		$id_inventaris				= $_POST['id_inventaris'];
		$id_user					= $_POST['id_user'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		$nama_barang				= $_POST['nama_barang'];
		$kategori					= $_POST['kategori'];
		$jenis_barang				= $_POST['jenis_barang'];
		$keterangan					= $_POST['keterangan'];
		$serial_number				= $_POST['serial_number'];
		$merk						= $_POST['merk'];
		$tanggal_beli				= $_POST['tanggal_beli'];
		$tanggal_digunakan			= $_POST['tanggal_digunakan'];
		$status						= $_POST['status'];
		$inventaris					= $_POST['inventaris'];
		$id_peminjaman				= $_POST['id_peminjaman'];
		$no_peminjaman				= $_POST['no_peminjaman'];
		$tgl_peminjaman				= $_POST['tgl_peminjaman'];
		$tgl_pengembalian			= $_POST['tgl_pengembalian'];
		$status_pengembalian		= $_POST['status_pengembalian'];
		$sisa_waktu					= $_POST['sisa_waktu'];
		
		
		$query = mysqli_query($con, "insert into peminjaman values('$id_peminjaman','$no_peminjaman','$tgl_peminjaman','$id_barang','$id_user','$tgl_pengembalian','$sisa_waktu')");
		
		$query2 = mysqli_query($con, "insert into inventaris values('$id_inventaris','$id_peminjaman','$id_user','$nama_pegawai','$satker','$jabatan','$nama_barang','$id_barang','$kategori','$keterangan','$serial_number','$merk','$tanggal_beli','$tanggal_digunakan','$jenis_barang','$inventaris','$status','$status_pengembalian')");
		
		/*$query3 = mysqli_query($con, "select * from barang where id_barang='$id_barang'");
					$ambil = mysqli_fetch_array($query3);
					$total = $ambil['stok'];
					$proses = $total - ($_POST['jumlah_peminjaman']);
		
		$query4 = mysqli_query($con,"update barang set stok='$proses' where id_barang='$id_barang'");*/
		?>
			<script language="javascript">alert("Peminjaman Barang berhasil Ditambahkan."); document.location="manage_peminjaman_pg";</script>
			<?php
		
		/*}*/
	}
	
	
if(isset($_POST['update']))
	{
				
		$id_barang					= $_POST['id_barang'];
		$id_inventaris				= $_POST['id_inventaris'];
		$id_user					= $_POST['id_user'];
		$nama_pegawai				= $_POST['nama_pegawai'];
		$satker						= $_POST['satker'];
		$jabatan					= $_POST['jabatan'];
		$nama_barang				= $_POST['nama_barang'];
		$kategori					= $_POST['kategori'];
		$jenis_barang				= $_POST['jenis_barang'];
		$keterangan					= $_POST['keterangan'];
		$serial_number				= $_POST['serial_number'];
		$merk						= $_POST['merk'];
		$tanggal_beli				= $_POST['tanggal_beli'];
		$tanggal_digunakan			= $_POST['tanggal_digunakan'];
		$status						= $_POST['status'];
		$inventaris					= $_POST['inventaris'];
		$id_peminjaman				= $_POST['id_peminjaman'];
		$no_peminjaman				= $_POST['no_peminjaman'];
		$tgl_peminjaman				= $_POST['tgl_peminjaman'];
		$tgl_pengembalian			= $_POST['tgl_pengembalian'];
		$status_pengembalian		= $_POST['status_pengembalian'];
		
		
		
		$query = mysqli_query($con, "update peminjaman set id_peminjaman='$id_peminjaman',no_peminjaman='$no_peminjaman',tgl_peminjaman='$tgl_peminjaman',id_barang='$id_barang',id_user='$id_user',tgl_pengembalian='$tgl_pengembalian' where id_peminjaman='$id_peminjaman'");
		
		$query2 = mysqli_query($con, "update inventaris set id_inventaris='$id_inventaris',id_peminjaman='$id_peminjaman',id_user='$id_user',nama_pegawai='$nama_pegawai',satker='$satker',jabatan='$jabatan',nama_barang='$nama_barang',id_barang='$id_barang',kategori='$kategori',keterangan='$keterangan',serial_number='$serial_number',merk='$merk',tanggal_beli='$tanggal_beli',tanggal_digunakan='$tanggal_digunakan',jenis_barang='$jenis_barang',inventaris='$inventaris',status='$status' where id_inventaris='$id_inventaris'");
		
		/*$query3 = mysqli_query($con, "select * from barang where id_barang='$id_barang'");
					$ambil = mysqli_fetch_array($query3);
					$total = $ambil['stok'];
					$proses = $total + ($_POST['jumlah_pengembalian']);
		
		$query4 = mysqli_query($con,"update barang set stok='$proses' where id_barang='$id_barang'");
		
		$query5 = mysqli_query($con, "select * from peminjaman where id_peminjaman='$id_peminjaman'");
					$am = mysqli_fetch_array($query5);
					$tot = $am['jumlah_peminjaman'];
					$pros = $tot - ($_POST['jumlah_pengembalian']);
					$peng = ($_POST['jumlah_pengembalian']);
					
		
		$query6 = mysqli_query($con,"update peminjaman set jumlah_peminjaman='$pros', jumlah_pengembalian='$peng' where id_peminjaman='$id_peminjaman'");*/
		
		$query7 = mysqli_query($con, "update inventaris set status='Tidak Digunakan/Sudah Dikembalikan', status_pengembalian='Sudah Dikembalikan' where id_peminjaman='$id_peminjaman'");
		
		?>
			<script language="javascript">alert("Data Barang berhasil Dikembalikan."); document.location="manage_pengembalian_pg";</script>
			<?php
		
	}

?>