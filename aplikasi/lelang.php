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


  $id		= base64_decode($_GET['id_lelang']);
  $query	= mysqli_query($con,"select * from pelelangan where id_lelang='$id'");
  $data		= mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>CIU Inventory | Open Lelang</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
		<script src="../calendar/datetimepicker_css.js"></script>
   
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Open Lelang</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Lelang </a>
                                        </li>
                                        <li class="active">
                                            Open Lelang
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

	<SCRIPT language=Javascript>

	function isNumberKey(evt)
	{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))

	return false;
	return true;
	}

	</SCRIPT>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Open Lelang</b></h4>
                                    <hr/>
                        		


<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>

	



                        			<div class="row">
                        				<div class="col-md-8">
                        					<form class="form-horizontal" name="category" method="post" action="proses_lelang">
												<input class="form-control" type="hidden" name="id_lelang" value="<?php echo $data['id_lelang'];?>" readonly ></input>
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">ID Barang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="id_barang" value="<?php echo $data['id_barang'];?>" onkeypress="return isNumberKey(event)" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Nama Barang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="namabrg_lelang" value="<?php echo $data['namabrg_lelang'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Tgl Lelang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" name="tgl_lelang" id="demo1"class="form-control" maxlength="25" size="25" img src="../calender/images2/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer" value="<?php echo $data['tgl_lelang'];?>" required>
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Open Harga</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="harga_penawaran" value="<?php echo $data['hrg_stlh_penyusutan'];?>" required>
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Jam Mulai</label>
	                                                <div class="col-md-10">
	                                                    <input type="time" class="form-control" name="jam_mulai" required>
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Jam Selesai</label>
	                                                <div class="col-md-10">
	                                                    <input type="time" class="form-control" name="jam_selesai" required>
	                                                </div>
	                                            </div>
												
												<input type="hidden" class="form-control" name="status_lelang" value="Dilelang" required>
											
												<div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="update">
                                                    Open Lelang
                                                </button>
												<a href="manage_lelang" onclick="return confirm('Edit Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>


                        			




           
                       


                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include('includes/footer.php');?>

            </div>
        </div>

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