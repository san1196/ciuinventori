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

  $id		= base64_decode($_GET['id_barang']);
  $query	= mysqli_query($con,"select * from barang where id_barang='$id'");
  $data		= mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>CIU Inventory | Rental Update</title>

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
                                    <h4 class="page-title">Rental Update</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Barang </a>
                                        </li>
                                        <li class="active">
                                            Rental Update
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
                                    <h4 class="m-t-0 header-title"><b>Rental Update</b></h4>
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
                        					<form name='autoSumForm' class="form-horizontal" method="post" action="proses_barang">
												<input class="form-control" type="hidden" name="id_barang" value="<?php echo $data['id_barang'];?>" readonly ></input>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Nama Barang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $data['nama_barang'];?>" readonly>
														
	                                                    <input type="hidden" class="form-control" name="code_barang" id="no_pengadaan" value="<?php echo $data['code_barang'];?>" required>
	                                                    <input type="hidden" class="form-control" name="id_pengadaan" id="id_pengadaan" value="<?php echo $data['id_pengadaan'];?>" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Kategori</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="kategori" value="<?php echo $data['kategori'];?>" readonly>
														
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Jenis Barang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="jenis_barang" value="<?php echo $data['jenis_barang'];?>" readonly>
														
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Keterangan</label>
	                                                <div class="col-md-10">
	                                                    <textarea type="text" class="form-control" name="keterangan" readonly><?php echo $data['keterangan'];?></textarea>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Serial Number</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="serial_number" value="<?php echo $data['serial_number'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Merk Barang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="merk" value="<?php echo $data['merk'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Tanggal Lelang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="tanggal_beli" value="<?php echo $data['tanggal_beli'];?>" readonly>
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Harga Lelang</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="harga_beli" id="harga_pengadaan" onkeypress="return isNumberKey(event)" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['harga_beli'];?>" readonly>
	                                                    
	                                                </div>
	                                            </div>
												
												<div class="form-group">
	                                                <label class="col-md-2 control-label">Status</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="status_barang" value="<?php echo $data['status_barang'];?>" readonly>
														
	                                                </div>
	                                            </div>
												
												<div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="rental_up">
                                                    Returned
                                                </button>
												<a href="manage_barang" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
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
<script type="text/javascript">
    function cek_database(){
        var nama_barang = $("#nama_barang").val();
        $.ajax({
            url: 'ajax_cek.php',
            data:"nama_barang="+nama_barang,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#id_pengadaan').val(obj.id_pengadaan);
            $('#no_pengadaan').val(obj.no_pengadaan);
            $('#jumlah_pengadaan').val(obj.jumlah_pengadaan);
            $('#jumlah_').val(obj.jumlah_pengadaan);
            $('#harga_pengadaan').val(obj.harga_pengadaan);
            $('#harga_').val(obj.harga_pengadaan);
            $('#namabrg').val(obj.nama_barang);
 
        });
    }
</script>
    </body>
</html>