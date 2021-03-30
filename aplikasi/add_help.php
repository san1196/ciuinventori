<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


session_start();
error_reporting(0);
$id_user = $_SESSION['id_user'];
$nama_pegawai = $_SESSION['nama_pegawai'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$satker = $_SESSION['satker'];
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

        <title>CIU Inventory | Request Helpdesk</title>

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

		<script type="text/javascript">

		function show_category(param)
		{
		if(param==3)
		document.getElementById("category").style.visibility = 'visible';
		else
		document.getElementById("category").style.visibility = 'hidden';

		}

		</script>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader_pg.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar_pg.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Request Helpdesk</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">User</a>
                                        </li>
                                        <li>
                                            <a href="#">Helpdesk </a>
                                        </li>
                                        <li class="active">
                                            Request Helpdesk
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
                                    <h4 class="m-t-0 header-title"><b>Request Ticket</b></h4>
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
                        				<div class="col-md-6">



                        					<form name='autoSumForm' class="form-horizontal" method="post" action="proses_help" enctype="multipart/form-data">
														<input class="form-control" type="hidden" name="id_helpdesk" readonly></input>
												

												<div class="form-group">
	                                                <label class="col-md-2 control-label">Name</label>
	                                                <div class="col-md-10">
	                                                    <input class="form-control" type="text" name="nama" value="<?php echo $nama_pegawai; ?>" readonly></input>
	                                                </div>
	                                            </div>

												<div class="form-group">
	                                                <label class="col-md-2 control-label">Email</label>
	                                                <div class="col-md-10">
	                                                    <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" readonly></input>
	                                                </div>
	                                            </div>

												<div class="form-group">
	                                                <label class="col-md-2 control-label">Division</label>
	                                                <div class="col-md-10">
	                                                    <input class="form-control" type="text" name="divisi" value="<?php echo $satker; ?>" readonly></input>
	                                                </div>
	                                            </div>

												<div class="form-group">
	                                                <label class="col-md-2 control-label">Category</label>
	                                                <div class="col-md-10">
														<input type="radio" name="kategori" value="Software/Application/Email" onclick="show_category(0);" /> Software/Application/Email<br>
														<input type="radio" name="kategori" value="Hardware/PC/Printer/Laptop" onclick="show_category(1);" /> Hardware/PC/Printer/Laptop<br>
														<input type="radio" name="kategori" value="Network/Telephone" onclick="show_category(2);" /> Network/Telephone<br>
														<input type="radio" name="kategori" value="Others" onclick="show_category(3);" /> Others
	                                                </div>
	                                            </div>


												<fieldset id="category" style="visibility: hidden;">
												<div class="form-group">
	                                                <label class="col-md-2 control-label"></label>
	                                                <div class="col-md-10">
	                                                    <input class="form-control" type="text" name="kategori_ot" ></input>
	                                                </div>
	                                            </div>
												</fieldset>



												<div class="form-group">
	                                                <label class="col-md-2 control-label">Subject</label>
	                                                <div class="col-md-10">
	                                                    <input class="form-control" type="subject" name="subject" required></input>
	                                                </div>
	                                            </div>

												<div class="form-group">
	                                                <label class="col-md-2 control-label">Message</label>
	                                                <div class="col-md-10">
	                                                    <textarea class="form-control" type="pesan" name="pesan" required></textarea>
	                                                </div>
	                                            </div>

												<div class="form-group">
												    <label class="col-md-2 control-label">Attachment</label>
												    <div class="col-md-10">
														<input type="file" class="form-control" name="attachment[]" multiple>
														<input type="hidden" class="form-control" name="id_attachment">
													</div>
												</div>
												<input class="form-control" type="hidden" name="status" value="Permintaan" ></input>
												<input class="form-control" type="hidden" name="tanggal" value="<?php echo date('m-d-Y'); ?>" ></input>
												<input class="form-control" type="hidden" name="id_user" value="<?php echo $id_user; ?>" ></input>
												<input type="hidden" class="form-control" name="last_update" value="<?php echo date('d:m:Y h:i:s', time()); ?>" readonly>

												<div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Submit
                                                </button>
												<a href="help_req" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </body>
</html>
