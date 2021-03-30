<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


session_start();
error_reporting(0);
$id_user = $_SESSION['id_user'];
$nama_pegawai = $_SESSION['nama_pegawai'];
$username = $_SESSION['username'];
$jabatan = $_SESSION['jabatan'];
if (isset($_SESSION['jabatan']))
{

	if ($_SESSION['jabatan'] == "Administrator")
   {

   }
   if ($_SESSION['jabatan'] == "Karyawan")
   {
	header('location:dashboard_pg');
   }
}
if (!isset($_SESSION['jabatan']))
{
	echo '<script language="javascript">alert("Dashboard is Secure"); document.location="index";</script>';

}
?>
<?php
$timeout = 1800;
$logout_redirect_url = "index";

if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Your Session is Up!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>CIU Inventory | Manage Peminjaman</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!--Script CSS-->
		<link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
		<link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
<?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manage Peminjaman</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Peminjaman </a>
                                        </li>
                                        <li class="active">
                                           Manage Peminjaman
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


<div class="row">
<div class="col-sm-6">

<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<?php if($delmsg){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
<?php } ?>


</div>








									<div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">
<div class="m-b-30">

 </div>

												<div class="form-group">
												Data Peminjaman Barang
												<table id="example" class="display responsive nowrap" style="width:100%">
														<thead>
																<tr>
																		<th>#</th>
																		<th>Berita Acara</th>
																		<th>No Ticket</th>
																		<th>Status</th>
																		<th>Nama</th>
																		<th>Jenis Barang</th>
																		<th>Merk</th>
																		<th>Serial Number</th>
																		<th>Tanggal Request</th>
																		<th>Digunakan</th>
																		<th>Lama Pinjam</th>
																		<th>Keperluan</th>
																		<th>Lokasi</th>
																		<th>Menerima</th>
                                                                        <th>Dari</th>
																		<th>Tanggal Penyerahan</th>
																		<th>Kelengkapan</th>
																		<th>Tanggal Pengembalian</th>
																		<th>Dikembalikan Oleh</th>
                                                                        <th>Diterima Oleh</th>
																		

																</tr>
														</thead>
														<tbody>
<?php
$query=mysqli_query($con,"select user.id_user, user.nama_pegawai, peminjaman.id_peminjaman, peminjaman.diserahkan, peminjaman.diterima_oleh, peminjaman.jenis_barang, peminjaman.merk, peminjaman.serial_number, peminjaman.dikembalikan_oleh, peminjaman.tanggal_pinjam, peminjaman.tanggal_digunakan, peminjaman.waktu_peminjaman, peminjaman.keperluan, peminjaman.lokasi, peminjaman.lokasi_ext, peminjaman.kepada, peminjaman.kepada_ext, peminjaman.tanggal_penyerahan, peminjaman.kelengkapan, peminjaman.kelengkapan_ext, peminjaman.tanggal_pengembalian, peminjaman.status from user inner join peminjaman on peminjaman.id_user=user.id_user order by peminjaman.id_peminjaman desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    $hari = "hari";

?>

<tr>

<th scope="row"><?php echo htmlentities($cnt);?></th>
<?php if($row['status'] == 'Permintaan') { ?>
<td></td>
<td><a href="edit_pinjam?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>"><u><?php echo htmlentities($row['id_peminjaman']);?></u></a></td>
<td><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['tanggal_pinjam']);?></td>
<td><?php echo htmlentities($row['tanggal_digunakan']);?></td>
<td><?php echo htmlentities($row['waktu_peminjaman']);?></td>
<td><?php echo htmlentities($row['keperluan']);?></td>
<td><?php echo htmlentities($row['lokasi']);?> [<?php echo htmlentities($row['lokasi_ext']);?>]</td>
<td><?php echo htmlentities($row['kepada']);?> [<?php echo htmlentities($row['kepada_ext']);?>]</td>
<td><?php echo htmlentities($row['diserahkan']);?></td>
<td><?php echo htmlentities($row['tanggal_penyerahan']);?></td>
<td><?php echo htmlentities($row['kelengkapan']);?> [<?php echo htmlentities($row['kelengkapan_ext']);?>]</td>
<td><?php echo htmlentities($row['tanggal_pengembalian']);?></td>
<td><?php echo htmlentities($row['dikembalikan_oleh']);?></td>
<td><?php echo htmlentities($row['diterima_oleh']);?></td>

<?php } ?>
<?php if($row['status'] == 'Digunakan') { ?>
<?php if(strpos($row['waktu_peminjaman'],$hari)) { ?>
<td></td>
<?php } else { ?>
<td><center><a href="rpt_penyerahan?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>&&id_user=<?php echo base64_encode($row['id_user']);?>"><img src="images/print.png" width="40px"></a></center></td>
<?php } ?>
<td><a href="pengembalian?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>"><u><?php echo htmlentities($row['id_peminjaman']);?></u></a></td>
<td><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['tanggal_pinjam']);?></td>
<td><?php echo htmlentities($row['tanggal_digunakan']);?></td>
<td><?php echo htmlentities($row['waktu_peminjaman']);?></td>
<td><?php echo htmlentities($row['keperluan']);?></td>
<td><?php echo htmlentities($row['lokasi']);?> [<?php echo htmlentities($row['lokasi_ext']);?>]</td>
<td><?php echo htmlentities($row['kepada']);?> [<?php echo htmlentities($row['kepada_ext']);?>]</td>
<td><?php echo htmlentities($row['diserahkan']);?></td>
<td><?php echo htmlentities($row['tanggal_penyerahan']);?></td>
<td><?php echo htmlentities($row['kelengkapan']);?> [<?php echo htmlentities($row['kelengkapan_ext']);?>]</td>
<td><?php echo htmlentities($row['tanggal_pengembalian']);?></td>
<td><?php echo htmlentities($row['dikembalikan_oleh']);?></td>
<td><?php echo htmlentities($row['diterima_oleh']);?></td>

<?php } ?>

<?php if($row['status'] == 'Hilang') { ?>

<td><center><a href="rpt_lost?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>&&id_user=<?php echo base64_encode($row['id_user']);?>"><img src="images/print.png" width="40px"></a></center></td>
<td><a href="pengembalian?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>"><u><?php echo htmlentities($row['id_peminjaman']);?></u></a></td>
<td style="color: red;"><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['tanggal_pinjam']);?></td>
<td><?php echo htmlentities($row['tanggal_digunakan']);?></td>
<td><?php echo htmlentities($row['waktu_peminjaman']);?></td>
<td><?php echo htmlentities($row['keperluan']);?></td>
<td><?php echo htmlentities($row['lokasi']);?> [<?php echo htmlentities($row['lokasi_ext']);?>]</td>
<td><?php echo htmlentities($row['kepada']);?> [<?php echo htmlentities($row['kepada_ext']);?>]</td>
<td><?php echo htmlentities($row['diserahkan']);?></td>
<td><?php echo htmlentities($row['tanggal_penyerahan']);?></td>
<td><?php echo htmlentities($row['kelengkapan']);?> [<?php echo htmlentities($row['kelengkapan_ext']);?>]</td>
<td><?php echo htmlentities($row['tanggal_pengembalian']);?></td>
<td><?php echo htmlentities($row['dikembalikan_oleh']);?></td>
<td><?php echo htmlentities($row['diterima_oleh']);?></td>

<?php } ?>

<?php if($row['status'] == 'Dikembalikan') { ?>
<?php if(strpos($row['waktu_peminjaman'],$hari)) { ?>
<td></td>
<?php } else { ?>
<td><center><a href="rpt_pengembalian?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>&&id_user=<?php echo base64_encode($row['id_user']);?>"><img src="images/print.png" width="40px"></a></center></td>
<?php } ?>
<td><a href="view?id_peminjaman=<?php echo base64_encode($row['id_peminjaman']);?>"><u><?php echo htmlentities($row['id_peminjaman']);?></u></a></td>
<?php if($row['kelengkapan_ext'] == 'Lengkap') { ?>
<td><?php echo htmlentities($row['status']);?></td>
<?php } ?>
<?php if($row['kelengkapan_ext'] != 'Lengkap') { ?>
<td style="color: red;"><?php echo htmlentities($row['status']);?></td>
<?php } ?>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['tanggal_pinjam']);?></td>
<td><?php echo htmlentities($row['tanggal_digunakan']);?></td>
<td><?php echo htmlentities($row['waktu_peminjaman']);?></td>
<td><?php echo htmlentities($row['keperluan']);?></td>
<td><?php echo htmlentities($row['lokasi']);?> [<?php echo htmlentities($row['lokasi_ext']);?>]</td>
<td><?php echo htmlentities($row['kepada']);?> [<?php echo htmlentities($row['kepada_ext']);?>]</td>
<td><?php echo htmlentities($row['diserahkan']);?></td>
<td><?php echo htmlentities($row['tanggal_penyerahan']);?></td>
<td><?php echo htmlentities($row['kelengkapan']);?> [<?php echo htmlentities($row['kelengkapan_ext']);?>]</td>
<td><?php echo htmlentities($row['tanggal_pengembalian']);?></td>
<td><?php echo htmlentities($row['dikembalikan_oleh']);?></td>
<td><?php echo htmlentities($row['diterima_oleh']);?></td>

<?php } ?>
<?php if($row['status'] == 'Batal') { ?>
<td></td>
<td><?php echo htmlentities($row['id_peminjaman']);?></td>
<td><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['tanggal_pinjam']);?></td>
<td><?php echo htmlentities($row['tanggal_digunakan']);?></td>
<td><?php echo htmlentities($row['waktu_peminjaman']);?></td>
<td><?php echo htmlentities($row['keperluan']);?></td>
<td><?php echo htmlentities($row['lokasi']);?> [<?php echo htmlentities($row['lokasi_ext']);?>]</td>
<td><?php echo htmlentities($row['kepada']);?> [<?php echo htmlentities($row['kepada_ext']);?>]</td>
<td><?php echo htmlentities($row['diserahkan']);?></td>
<td><?php echo htmlentities($row['tanggal_penyerahan']);?></td>
<td><?php echo htmlentities($row['kelengkapan']);?> [<?php echo htmlentities($row['kelengkapan_ext']);?>]</td>
<td><?php echo htmlentities($row['tanggal_pengembalian']);?></td>
<td><?php echo htmlentities($row['dikembalikan_oleh']);?></td>
<td><?php echo htmlentities($row['diterima_oleh']);?></td>

<?php } ?>
</tr>
<?php
$cnt++;
} ?>
</tbody>

												</table>
                                                </div>




											</div>

										</div>


									</div>
                                    <!--- end row -->





















                    </div> <!-- container -->

                </div> <!-- content -->
<?php include('includes/footer.php');?>
            </div>

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

				<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
				<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
				<script>
				$(document).ready(function() {
						$('#example').DataTable( {
								"scrollX": true,
								"scrollY": "400px",
								"scrollCollapse": true,
								"paging": true
						} );
				} );
				</script>
    </body>
</html>
