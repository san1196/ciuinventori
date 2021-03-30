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

        <title>CIU Inventory | Manage Barang</title>
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
                                    <h4 class="page-title">Manage Barang</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Barang </a>
                                        </li>
                                        <li class="active">
                                           Manage Barang
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
<a href="add_barang">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
<!--
&emsp;&emsp;&emsp;
<a href="im_barang"><img src="images/import.png" width="50" height="50" title="Import Barang"></a>
&emsp;&emsp;&emsp;
<a href="copy_barang">Copy Barang Upload</a>
-->
 </div>

												<div class="form-group">
												Barang yang Tersedia
                                                    <table id="example" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>

                                                                <th>ID Barang</th>
                                                                <th>Kategori</th>
                                                                <th>Nama Barang</th>
                                                                <th>Keterangan</th>
																<!--<th>Stok</th>-->
                                                                <th>Serial Number</th>
                                                                <th>Merk</th>
                                                                <th>Tgl Beli</th>
                                                                <th>Harga Beli</th>
                                                                <th>Jenis Barang</th>
                                                                <th>Status</th>
																<th>Kode Barang</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select * from barang where id_user='-' order by id_barang desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>

<td><?php echo htmlentities($row['id_barang']);?></td>
<td><?php echo htmlentities($row['kategori']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['keterangan']);?></td>
<!--<td><?php echo htmlentities($row['stok']);?></td>-->
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['tanggal_beli']);?></td>
<td><?php echo htmlentities(number_format($row['harga_beli']));?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['status_barang']);?></td>
<td><?php echo htmlentities($row['code_barang']);?></td>

</tr>
<?php
$cnt++;
 } ?>
</tbody>

                                                    </table>
                                                </div>

<hr>
												<div class="form-group">
												Barang Rental
                                                    <table id="example3" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
																<th>Action</th>
                                                                <th>ID Barang</th>
                                                                <th>Kategori</th>
                                                                <th>Nama Barang</th>
                                                                <th>Keterangan</th>
																<!--<th>Stok</th>-->
                                                                <th>Serial Number</th>
                                                                <th>Merk</th>
                                                                <th>Tgl Rental</th>
                                                                <th>Harga Rental</th>
                                                                <th>Jenis Barang</th>
                                                                <th>Status</th>
																<th>Kode Barang</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select * from barang where status_barang like 'Rental%' order by id_barang desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<?php if($row['status_barang'] == 'Rental') { ?>
<td><a href="rental_balik?id_barang=<?php echo base64_encode($row['id_barang']);?>" onclick ="return confirm('Apakah Anda yakin ingin ubah status barang?');"><i class="btn btn-primary" style="color: #29b6f6;">Returned</i></a>
</td>
<td><?php echo htmlentities($row['id_barang']);?></td>
<td><?php echo htmlentities($row['kategori']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['keterangan']);?></td>
<!--<td><?php echo htmlentities($row['stok']);?></td>-->
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['tanggal_beli']);?></td>
<td><?php echo htmlentities(number_format($row['harga_beli']));?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['status_barang']);?></td>
<td><?php echo htmlentities($row['code_barang']);?></td>
<?php } ?>
<?php if($row['status_barang'] != 'Rental') { ?>
<td></a>
</td>
<td><?php echo htmlentities($row['id_barang']);?></td>

<td><?php echo htmlentities($row['kategori']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['keterangan']);?></td>
<!--<td><?php echo htmlentities($row['stok']);?></td>-->
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['tanggal_beli']);?></td>
<td><?php echo htmlentities(number_format($row['harga_beli']));?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['status_barang']);?></td>
<td><?php echo htmlentities($row['code_barang']);?></td>
<?php } ?>
</tr>
<?php
$cnt++;
 } ?>
</tbody>

                                                    </table>
                                                </div>

<hr>

												<div class="form-group">
												Barang sedang Digunakan
                                                    <table id="example2" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>

                                                                <th>ID Barang</th>
                                                                <th>Kategori</th>
                                                                <th>Nama Barang</th>
                                                                <th>Keterangan</th>
																<!--<th>Stok</th>-->
                                                                <th>Serial Number</th>
                                                                <th>Merk</th>
                                                                <th>Tgl Beli</th>
                                                                <th>Harga Beli</th>
                                                                <th>Jenis Barang</th>
                                                                <th>Status</th>
																<th>Kode Barang</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select * from barang where id_user!='-' order by id_barang desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>

<td><?php echo htmlentities($row['id_barang']);?></td>
<td><?php echo htmlentities($row['kategori']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['keterangan']);?></td>
<!--<td><?php echo htmlentities($row['stok']);?></td>-->
<td><?php echo htmlentities($row['serial_number']);?></td>
<td><?php echo htmlentities($row['merk']);?></td>
<td><?php echo htmlentities($row['tanggal_beli']);?></td>
<td><?php echo htmlentities(number_format($row['harga_beli']));?></td>
<td><?php echo htmlentities($row['jenis_barang']);?></td>
<td><?php echo htmlentities($row['status_barang']);?></td>
<td><?php echo htmlentities($row['code_barang']);?></td>

</tr>
<?php
$cnt++;
 } ?>
</tbody>

                                                    </table>
                                                </div>

<hr>

<div class="form-group">
                            Setting Barang untuk Undian/Lelang
                                <table id="example1" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>ID Barang</th>
                                            <th>No User</th>
                                            <th>Nama Barang</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Harga Awal</th>
                                            <th>Harga Setelah Penyusutan</th>

                                            <th>Status Barang</th>
                                            <th>Harga Penawaran</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query=mysqli_query($con,"select * from pelelangan where id_user='-' order by id_lelang desc");
                                        $cnt=1;
                                        while($row=mysqli_fetch_array($query))
                                        {
                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                <td><a href="undi?id_lelang=<?php echo base64_encode($row['id_lelang']);?>" onclick ="return confirm('Apakah Anda yakin ingin ubah status barang?');"><i class="btn btn-primary" style="color: #29b6f6;">Update</i></a>
                                                </td>
                                                <td><?php echo htmlentities($row['id_barang']);?></td>
                                                <td><?php echo htmlentities($row['id_user']);?></td>
                                                <td><?php echo htmlentities($row['namabrg_lelang']);?></td>
                                                <td><?php echo htmlentities($row['status_lelang']);?></td>
                                                <td><?php echo htmlentities($row['tgl_lelang']);?></td>

                                                <td><?php echo htmlentities(number_format($row['harga_awal']));?></td>
                                                <td><?php echo htmlentities(number_format($row['hrg_stlh_penyusutan']));?></td>

                                                <td><?php echo htmlentities($row['status_barang_lelang']);?></td>
                                                <td><?php echo htmlentities(number_format($row['harga_penawaran']));?></td>


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
			<script>
		    $(document).ready(function() {
		        $('#example1').DataTable( {
		            "scrollX": true,
		            "scrollY": "400px",
		            "scrollCollapse": true,
		            "paging": true
		        } );
		    } );
		    </script>
			<script>
		    $(document).ready(function() {
		        $('#example2').DataTable( {
		            "scrollX": true,
		            "scrollY": "400px",
		            "scrollCollapse": true,
		            "paging": true
		        } );
		    } );
		    </script>
			<script>
		    $(document).ready(function() {
		        $('#example3').DataTable( {
		            "scrollX": true,
		            "scrollY": "400px",
		            "scrollCollapse": true,
		            "paging": true
		        } );
		    } );
		    </script>
    </body>
</html>
