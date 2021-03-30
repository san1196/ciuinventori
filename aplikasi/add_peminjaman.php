<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


session_start();
error_reporting(0);
$id_user = $_SESSION['id_user'];
$nama_pegawai = $_SESSION['nama_pegawai'];
$username = $_SESSION['username'];
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

        <title>CIU Inventory | Request Peminjaman</title>

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

				function show_location(param)
				{
				if(param==1)
				document.getElementById("lokasi").style.visibility = 'visible';
				else
				document.getElementById("lokasi").style.visibility = 'hidden';

				}

				</script>
				
				<script type="text/javascript">

				function show_waktu(param)
				{
				if(param==0)
				document.getElementById("waktu1").style.visibility = 'visible';
				else
				document.getElementById("waktu1").style.visibility = 'hidden';

				if(param==1)
				document.getElementById("waktu2").style.visibility = 'visible';
				else
				document.getElementById("waktu2").style.visibility = 'hidden';
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
                                    <h4 class="page-title">Request Peminjaman</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">User</a>
                                        </li>
                                        <li>
                                            <a href="#">Peminjaman </a>
                                        </li>
                                        <li class="active">
                                            Request Peminjaman
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
	
	<script type="text/javascript">

	function panjangmax(objek){
	var panjangteks=objek.getAttribute? parseInt(objek.getAttribute("panjangteks")) : ""
	if (objek.getAttribute && objek.value.length>panjangteks)
	objek.value=objek.value.substring(0,panjangteks)
	}

	</script>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Request Peminjaman</b></h4>
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
    $hasil = mysqli_query($con,"select max(id_peminjaman) as idMaks from peminjaman");
    $data  = mysqli_fetch_array($hasil);
    $idMax = $data['idMaks'];
    $noUrut = (int) substr($idMax, 3, 5);
    $noUrut++;
    $today = "PMJ";
    $newID = $today . sprintf("%05s", $noUrut);


    ?>




                        			<div class="row">
                        				<div class="col-md-8">
                        					<form name='autoSumForm' class="form-horizontal" method="post" action="proses_peminjaman">
												<input class="form-control" type="hidden" name="id_peminjaman" value="<?php echo $newID; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="id_user" value="<?php echo $id_user; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="nama_pegawai" value="<?php echo $nama_pegawai; ?>" readonly ></input>

	                                            <div class="form-group">
	                                                <label class="col-md-4 control-label">Jenis Barang</label>
	                                                <div class="col-md-8">
	                                                    <select type="text" class="form-control" name="jenis_barang" required>
															<option value="">- Pilih -</option>
															<option value="Laptop">Laptop</option>
															<option value="Proyektor">Proyektor</option>
															<option value="Monitor">Monitor</option>
															<option value="PC">PC</option>
															<option value="Converter HDMI">Converter HDMI</option>
															<option value="Kabel">Kabel</option>
																
														</select>
	                                                    

	                                                </div>
	                                            </div>


												<div class="form-group">
	                                                <label class="col-md-4 control-label">Tanggal Request</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="tanggal_pinjam" value="<?php echo date('m-d-Y'); ?>" readonly>

	                                                </div>
	                                            </div>

												<div class="form-group">
												    <label class="col-md-4 control-label">Tanggal Digunakan</label>
												    <div class="col-md-8">
												        <input type="Text" name="tanggal_digunakan" id="demo2"class="form-control" maxlength="25" size="25" img src="../calender/images2/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer" required />
												    </div>
												</div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Lama Peminjaman</label>
													<div class="col-md-3">
														<input type="radio" name="waktu" onclick="show_waktu(0);" /> Harian<br><br>
														<input type="radio" name="waktu" onclick="show_waktu(1);" /> Permanen
													</div>
													<div class="col-md-5">
														<input class="form-control" id="waktu1" style="visibility: hidden;" type="text" name="waktu_peminjaman1" panjangteks="2" onKeyUp="return panjangmax(this)" onkeypress="return isNumberKey(event)" placeholder="Harian"></input>
														<input class="form-control" id="waktu2" style="visibility: hidden;" type="text" name="waktu_peminjaman2" placeholder="Permanen"></input>
													</div>
	                                                
	                                            </div>

												<div class="form-group">
												    <label class="col-md-4 control-label">Keperluan</label>
												    <div class="col-md-8">
												        <textarea type="text" class="form-control" name="keperluan" required></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Lokasi</label>
													<div class="col-md-3">
														<input type="radio" name="lokasi" value="Dalam Kantor" onclick="show_location(0);" /> Dalam Kantor<br><br>
														<input type="radio" name="lokasi" value="Luar Kantor" onclick="show_location(1);" /> Luar Kantor
													</div>
													<div class="col-md-5">
														<br><br>
														<input class="form-control" id="lokasi" style="visibility: hidden;" type="text" name="lokasi_ext" placeholder="Detail Lokasi"></input>
													</div>
												</div>


												<!--<fieldset id="lokasi" style="visibility: hidden;">
													<div class="form-group">
														<label class="col-md-2 control-label">Detail Lokasi</label>
														<div class="col-md-10">
															<input class="form-control" type="text" name="lokasi_ext" ></input>
														</div>
													</div>
												</fieldset>-->

												<input type="hidden" class="form-control" name="tanggal_penyerahan" value="" readonly>
												<input type="hidden" class="form-control" name="diserahkan" value="" readonly>
												
												<input type="hidden" class="form-control" name="kepada" value="" readonly>
												<input type="hidden" class="form-control" name="kepada_ext" value="" readonly>
												<input type="hidden" class="form-control" name="merk" value="" readonly>
												<input type="hidden" class="form-control" name="serial_number" value="" readonly>
												<input type="hidden" class="form-control" name="kelengkapan" value="" readonly>
												
												<input type="hidden" class="form-control" name="tanggal_pengembalian" value="" readonly>
												<input type="hidden" class="form-control" name="dikembalikan_oleh" value="" readonly>
												<input type="hidden" class="form-control" name="diterima_oleh" value="" readonly>
												<input type="hidden" class="form-control" name="kelengkapan_ext" value="" readonly>
												<input type="hidden" class="form-control" name="status" value="Permintaan" readonly>
												<input type="hidden" class="form-control" name="tempo1" value="2" readonly>
												<input type="hidden" class="form-control" name="tempo2" value="13" readonly>

												<div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
												<center>
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Submit
                                                </button>
												<a href="manage_peminjaman_pg" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
												</center>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>
										<div class="col-md-6">
											<!--<p style="color:red;"><b>Note:</b> Silahkan lakukan request barang, jika barang yang Anda cari tidak ada. Dengan klik link berikut <a href="request">Request Barang</a></p>-->
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
            url: 'ajax_barang.php',
            data:"nama_barang="+nama_barang,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#id_barang').val(obj.id_barang);
            $('#nama_barang').val(obj.nama_barang);
            $('#kategori').val(obj.kategori);
            $('#keterangan').val(obj.keterangan);
            $('#serial_number').val(obj.serial_number);
            $('#merk').val(obj.merk);
            $('#tanggal_beli').val(obj.tanggal_beli);
            $('#jenis_barang').val(obj.jenis_barang);


        });
    }
</script>
    </body>
</html>
