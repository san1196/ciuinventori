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


  $id		= base64_decode($_GET['id_peminjaman']);
  $query	= mysqli_query($con,"select user.id_user, user.nama_pegawai, peminjaman.id_peminjaman, peminjaman.jenis_barang, peminjaman.merk, peminjaman.serial_number, peminjaman.dikembalikan_oleh, peminjaman.tanggal_pinjam, peminjaman.tanggal_digunakan, peminjaman.waktu_peminjaman, peminjaman.keperluan, peminjaman.lokasi, peminjaman.lokasi_ext, peminjaman.kepada, peminjaman.kepada_ext, peminjaman.tanggal_penyerahan, peminjaman.kelengkapan, peminjaman.kelengkapan_ext, peminjaman.tanggal_pengembalian, peminjaman.status from user inner join peminjaman on peminjaman.id_user=user.id_user where peminjaman.id_peminjaman='$id'");
  $data		= mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>CIU Inventory | Pengembalian Barang</title>

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
				<script type="text/javascript">

				function show_kelengkapan(param)
				{
				if(param==1)
				document.getElementById("kelengkapan").style.visibility = 'visible';
				else
				document.getElementById("kelengkapan").style.visibility = 'hidden';

				}

				</script>
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
                                    <h4 class="page-title">Pengembalian Barang</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Peminjaman </a>
                                        </li>
                                        <li class="active">
                                            Pengembalian Barang
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
                                    <h4 class="m-t-0 header-title"><b>Pengembalian Barang</b></h4>
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
                        					<form class="form-horizontal" name="category" method="post" action="proses_peminjaman">
												<div class="form-group">
	                                                <label class="col-md-4 control-label">No Ticket</label>
	                                                <div class="col-md-7">
	                                                    <input type="text" class="form-control" name="id_peminjaman" value="<?php echo $data['id_peminjaman'];?>" readonly>
	                                                    <input type="hidden" class="form-control" name="id_barang" value="<?php echo $data['id_barang'];?>" readonly>
	                                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user'];?>" readonly>
	                                                    <input type="hidden" class="form-control" name="diterima_oleh" value="<?php echo $nama_pegawai;?>" readonly>
	                                                </div>
													<div class="col-md-1">
														<?php
														if($data['status'] == 'Digunakan') { ?>
															<a href="proses_peminjaman?id_peminjaman2=<?php echo base64_encode($data['id_peminjaman']);?>&&id_user2=<?php echo base64_encode($data['id_user']);?>" onclick="return confirm('Are You Sure?');"> <i class="btn btn-danger" style="color: #f05050">Hilang</i></a>
														<?php } ?>
													</div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Status</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="status" value="<?php echo $data['status'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label" style="text-align: right;">Requester</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $data['nama_pegawai']; ?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Tanggal Pengembalian</label>
	                                                <div class="col-md-8">
														<input type="Text" name="tanggal_pengembalian" id="demo2"class="form-control" maxlength="25" size="25" img src="../calender/images2/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer" required />
	                                                </div>
	                                            </div>
												<div class="form-group">
														<label class="col-md-4 control-label">Dikembalikan Oleh</label>
														<div class="col-md-6">
														<input type="text" class="form-control" name="dikembalikan_oleh" id='karyawan' readonly />
														</div>
														<div class="col-md-2">
														<a href="javascript:void(0);" name="Data Karyawan" title="Data Karyawan" onClick='javascript:window.open("pup_upp.php","Ratting", "width=700,height=500,left=150,top=200,toolbar=1,status=1,");'><i class="btn btn-primary" style="color: #f05050">Cari</i></a>
														</div>
													</div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Jenis Barang</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="jenis_barang" value="<?php echo $data['jenis_barang'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Merk</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="merk" value="<?php echo $data['merk'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Jenis Barang</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="serial_number" value="<?php echo $data['serial_number'];?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Kelengkapan</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="kelengkapan" value="<?php echo $data['kelengkapan']; ?>" readonly>
	                                                </div>
	                                            </div>
												<div class="form-group">
													<label class="col-md-4 control-label"></label>
	                                                <div class="col-md-8">
														<input type="radio" name="lengkap_ext" value="Lengkap" onclick="show_kelengkapan(0);" /> Lengkap<br>
														<input type="radio" name="lengkap_ext" value="Tidak Lengkap" onclick="show_kelengkapan(1);" /> Tidak Lengkap
													</div>
	                                            </div>


												<fieldset id="kelengkapan" style="visibility: hidden;">
													<div class="form-group">
														<label class="col-md-4 control-label">Detail Kelengkapan</label>
														<div class="col-md-8">
															<input type="text" class="form-control" name="kelengkapan_ext">
														</div>
													</div>
												</fieldset>
												
												
												
												
												
											
												<div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                <center>  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="pengembalian">
                                                    Update
                                                </button>
												
												<a href="manage_peminjaman" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
												</center>
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