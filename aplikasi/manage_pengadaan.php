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

        <title>CIU Inventory | Manage Pengadaan</title>
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
                                    <h4 class="page-title">Manage Pengadaan</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Pengadaan </a>
                                        </li>
                                        <li class="active">
                                           Manage Pengadaan
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
<a href="add_pengadaan">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
 </div>

												<div class="form-group">
												Approval Pengadaan Barang
                                                    <table id="example" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
																<th>Action</th>
                                                                <th>ID Pengadaan</th>
																<th>Nama Requester</th>
																<th>Tgl Pengadaan</th>
                                                                <th>Nama Barang</th>
                                                                <th>Jumlah</th>
                                                                <th>Stok</th>
                                                                <th>Harga Barang</th>
                                                                <th>Total Harga Pengadaan</th>
                                                                <th>Status</th>
                                                                <th>No Pengadaan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select user.id_user, user.nama_pegawai, pengadaan.id_pengadaan, pengadaan.id_user, pengadaan.no_pengadaan, pengadaan.tgl_pengadaan, pengadaan.nama_barang, pengadaan.jumlah_pengadaan, pengadaan.jumlah, pengadaan.harga_pengadaan, pengadaan.totalharga_pengadaan, pengadaan.status from pengadaan inner join user on pengadaan.id_user=user.id_user order by pengadaan.id_pengadaan desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><a href="edit_pengadaan?id_pengadaan=<?php echo base64_encode($row['id_pengadaan']);?>" onclick ="return confirm('Apakah Anda yakin ingin mengubah data?');"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
	&nbsp;<a href="proses_pengadaan?id_pengadaan=<?php echo base64_encode($row['id_pengadaan']);?>&&action=del" onclick ="return confirm('Anda yakin ingin menghapus data?');"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
<td><?php echo htmlentities($row['id_pengadaan']);?></td>
<td><?php echo htmlentities($row['nama_pegawai']);?></td>
<td><?php echo htmlentities($row['tgl_pengadaan']);?></td>
<td><?php echo htmlentities($row['nama_barang']);?></td>
<td><?php echo htmlentities($row['jumlah']);?> items</td>
<td><?php echo htmlentities($row['jumlah_pengadaan']);?> items</td>
<td><?php echo htmlentities(number_format($row['harga_pengadaan']));?></td>
<td><?php echo htmlentities(number_format($row['totalharga_pengadaan']));?></td>
<td><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['no_pengadaan']);?></td>
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
