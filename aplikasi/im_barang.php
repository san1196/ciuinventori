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

        <title>CIU Inventory | Add Barang</title>

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
                                    <h4 class="page-title">Import Barang</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Barang </a>
                                        </li>
                                        <li class="active">
                                            Import Barang
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
                                    <h4 class="m-t-0 header-title"><b>Import Barang</b></h4>
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

	

	<script>
	function startCalc(){
	  interval = setInterval("calc()",1);
	}
	function calc(){
	  a = document.autoSumForm.harga_beli.value;

	  document.autoSumForm.hrg_stlh_penyusutan.value = a - ((a * 5) / 12);
	}
	  function stopCalc(){
		clearInterval(interval);
	  }
	</script>


                        			<div class="row">
                        				<div class="col-md-6">
                        					<form name='autoSumForm' class="form-horizontal" method="post" action="" enctype="multipart/form-data">
												<label style="margin-top: -16px;">Upload Excel</label>          
												<input name="result_file" required type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
												<br>
												<p><b>Note: </b>Format Import Rekening yaitu, "<b>Spesifikasi, Merk, Serial Number</b>".</p>
												<br><br>
												
												<button type="submit" name="upload_excel" class="btn btn-primary btn-rounded"> Upload Excel</button>
												
	                                        </form>
                        				</div>


                        			</div>

<?php



	include('includes/config.php');
	require_once 'PHPExcel/PHPExcel.php';
    require_once 'PHPExcel/PHPExcel/IOFactory.php';
    if(isset($_POST['upload_excel']))
    {
        $query = mysqli_query($con, "TRUNCATE upload");

		$file_directory = "uploads/";
        $new_file_name = date("Ymd");
        move_uploaded_file($_FILES["result_file"]["tmp_name"], $file_directory . $new_file_name);
        $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
        $objReader	= PHPExcel_IOFactory::createReader($file_type);
        $objPHPExcel = $objReader->load($file_directory . $new_file_name);
        $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        foreach ($sheet_data as $row)
        {
            if(isset($row['A']))
            {
                
                mysqli_query($con,'INSERT INTO `upload` (id_upload,spesifikasi,merk,serial_number) VALUES ("'.$row['A'].'","'.$row['B'].'","'.$row['C'].'","'.$row['D'].'") ');
            }
			
        }
		
        echo '<script language="javascript">alert("File Successfully Imported!"); document.location="manage_barang";</script>';
    }
?>









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
