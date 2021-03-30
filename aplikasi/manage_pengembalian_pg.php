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

	if ($_SESSION['jabatan'] == "Karyawan")
   {

   }
   if ($_SESSION['jabatan'] == "Administrator")
   {
	header('location:dashboard');
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

        <title>CIU Inventory | Manage Pengembalian</title>
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
<?php include('includes/topheader_pg.php');?>

            <!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar_pg.php');?>
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
                                    <h4 class="page-title">Manage Pengembalian</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">User</a>
                                        </li>
                                        <li>
                                            <a href="#">Pengembalian </a>
                                        </li>
                                        <li class="active">
                                           Manage Pengembalian
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
                                                    <table id="example" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
																<th>Action</th>
                                                                <th>ID Inventaris</th>
                                                                <th>ID Pegawai</th>
																<th>Nama</th>
                                                                <th>Satker</th>
                                                                <th>Jabatan</th>
                                                                <th>Nama Barang</th>
                                                                <th>ID Barang</th>
                                                                <th>Kategori</th>
                                                                <th>Keterangan</th>
                                                                <th>Serial Number</th>
                                                                <th>Merk</th>
                                                                <th>Tgl Pengembalian</th>
                                                                <th>Jenis Barang</th>
                                                                <th>Inventaris</th>

                                                                <th>Status</th>

                                                                <th>Status</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select inventaris.id_inventaris, inventaris.id_user, inventaris.id_peminjaman, inventaris.nama_pegawai, inventaris.satker, inventaris.jabatan, inventaris.nama_barang, inventaris.id_barang, inventaris.kategori, inventaris.keterangan, inventaris.serial_number, inventaris.merk, inventaris.tanggal_beli, inventaris.tanggal_digunakan, inventaris.jenis_barang, inventaris.inventaris, inventaris.status, inventaris.status_pengembalian, peminjaman.id_peminjaman, peminjaman.no_peminjaman, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian from inventaris inner join peminjaman on inventaris.id_peminjaman=peminjaman.id_peminjaman where inventaris.id_user='$_SESSION[id_user]' and inventaris.status_pengembalian!='Sudah Dikembalikan' order by inventaris.id_inventaris desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>

<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><a href="pengembalian?id_inventaris=<?php echo base64_encode($row['id_inventaris']);?>" onclick ="return confirm('Apakah Anda yakin ingin mengembalikan barang?');"><i class="btn btn-primary" style="color: #29b6f6;">Pengembalian</i></a>
	</td>
<td><?php echo htmlentities($row['id_inventaris']);?></td>
<td><?php echo htmlentities($row['id_user']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['satker']);?></td>
<td><?php echo htmlentities($row['jabatan']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['id_barang']);?></td>
<td><?php echo htmlentities($row['kategori']);?></td>
<td><?php echo htmlentities($row['keterangan']);?></td>
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['tgl_pengembalian']);?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['inventaris']);?></td>

<td><?php echo htmlentities($row['status']);?></td>

<td><?php echo htmlentities($row['status_pengembalian']);?></td>

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
