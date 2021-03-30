<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


session_start();
error_reporting(0);
$id_user = $_SESSION['id_user'];
$nama_user = $_SESSION['nama_user'];
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

        <title>CIU Inventory | Add user</title>

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
                                    <h4 class="page-title">Add user</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">user </a>
                                        </li>
                                        <li class="active">
                                            Add user
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
                                    <h4 class="m-t-0 header-title"><b>Add user</b></h4>
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

	<?php
    $hasil = mysqli_query($con,"select max(id_user) as idMaks from user");
    $data  = mysqli_fetch_array($hasil);
    $idMax = $data['idMaks'];
    $noUrut = (int) substr($idMax, 2, 5);
    $noUrut++;
    $today = "PG";
    $newID = $today . sprintf("%05s", $noUrut);
	
	
    ?>



                        			<div class="row">
                        				<div class="col-md-6">
                        					<form class="form-horizontal" name="category" method="post" action="proses_user">
												<input class="form-control" type="hidden" name="id_user" value="<?php echo $newID; ?>" readonly ></input>
	                                            <div class="form-group">
	                                                <label class="col-md-4 control-label">NIK</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="nik_pegawai" onkeypress="return isNumberKey(event)" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Nama</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="nama_pegawai" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">No Telp</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="no_telp" onkeypress="return isNumberKey(event)" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Email</label>
	                                                <div class="col-md-8">
	                                                    <input type="email" class="form-control" name="email" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Satuan Kerja / Divisi</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="satker" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Jabatan</label>
	                                                <div class="col-md-8">
	                                                    <select type="text" class="form-control" name="jabatan" required>
															<option value="">--Pilih--</option>
															<option value="Karyawan">Karyawan</option>
															<option value="Administrator">Administrator</option>
														</select>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Username</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="username" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Password</label>
	                                                <div class="col-md-8">
	                                                    <input type="password" class="form-control" name="password" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Submit
                                                </button>
												<a href="manage_user" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
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