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
                                    <h4 class="page-title">Manage Pengembalian</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
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

												<div class="table-responsive">
												Data Pengembalian
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
																<th>ID Inventaris</th>
                                                                <th>ID User</th>
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
                                                                <th>Jumlah Barang</th>
                                                                <th>Status</th>
                                                             
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$query=mysqli_query($con,"select inventaris.id_inventaris, inventaris.id_user, inventaris.id_peminjaman, inventaris.nama_pegawai, inventaris.satker, inventaris.jabatan, inventaris.nama_barang, inventaris.id_barang, inventaris.kategori, inventaris.keterangan, inventaris.serial_number, inventaris.merk, inventaris.tanggal_beli, inventaris.tanggal_digunakan, inventaris.jenis_barang, inventaris.inventaris, inventaris.status, peminjaman.id_peminjaman, peminjaman.no_peminjaman, peminjaman.tgl_peminjaman, peminjaman.jumlah_peminjaman, peminjaman.tgl_pengembalian from inventaris inner join peminjaman on inventaris.id_peminjaman=peminjaman.id_peminjaman where inventaris.status='Sudah Dikembalikan' order by inventaris.id_inventaris desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>

<th scope="row"><?php echo htmlentities($cnt);?></th>

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
<td><?php echo htmlentities($row['jumlah_peminjaman']);?></td>
<td><?php echo htmlentities($row['status']);?></td>

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

    </body>
</html>