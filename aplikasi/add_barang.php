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
		<script src="../calendar/datetimepicker_css.js"></script>

		
				<script type="text/javascript">

				function show_jenis(param)
				{
				if(param==1)
				document.getElementById("jenis1").style.visibility = 'visible';
				else
				document.getElementById("jenis1").style.visibility = 'hidden';
				
				if(param==1)
				document.getElementById("jenis2").style.visibility = 'visible';
				else
				document.getElementById("jenis2").style.visibility = 'hidden';
				}

				</script>
				
				<script type="text/javascript">

				function show_status(param)
				{
				if(param==0)
				document.getElementById("status1").style.visibility = 'visible';
				else
				document.getElementById("status1").style.visibility = 'hidden';
				
				if(param==1)
				document.getElementById("status2").style.visibility = 'visible';
				else
				document.getElementById("status2").style.visibility = 'hidden';
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
                                    <h4 class="page-title">Add Barang</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Barang </a>
                                        </li>
                                        <li class="active">
                                            Add Barang
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
                                    <h4 class="m-t-0 header-title"><b>Add Barang</b></h4>
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
    $hasil = mysqli_query($con,"select max(id_barang) as idMaks from barang");
    $data  = mysqli_fetch_array($hasil);
    $idMax = $data['idMaks'];
    $noUrut = (int) substr($idMax, 2, 5);
    $noUrut++;
    $today = "BI";
    $newID = $today . sprintf("%05s", $noUrut);

	$hasil = mysqli_query($con,"select max(id_lelang) as idMaks from pelelangan");
    $data  = mysqli_fetch_array($hasil);
    $idMax = $data['idMaks'];
    $noUrut = (int) substr($idMax, 2, 5);
    $noUrut++;
    $today = "PL";
    $newID2 = $today . sprintf("%05s", $noUrut);
    ?>

	<script>
	function startCalc(){
	  interval = setInterval("calc()",1);
	}
	function calc(){
	  brg = document.autoSumForm.nama_barang.value;
	  
	  a = document.autoSumForm.harga_beli.value;
	  
	  z = document.autoSumForm.tanggal_beli.value;

	  document.autoSumForm.hrg_stlh_penyusutan.value = a - ((a * 5) / 12);
	  
	  document.autoSumForm.tanggal.value = z;
	  
	  document.autoSumForm.namabrg_lelang.value = brg;
	}
	  function stopCalc(){
		clearInterval(interval);
	  }
	  
	function startCalcu(){
	  interval = setInterval("calcu()",1);
	}
	function calcu(){
	  brg3 = document.autoSumForm2.nama_barang3.value;
	  
	  document.autoSumForm2.namabrg_lelang3.value = brg3;
	}
	  function stopCalcu(){
		clearInterval(interval);
	  }
	</script>


                        			<div class="row">
                        				<div class="col-md-12">
                        					
											
												<div class="form-group">
	                                                <center>
													<label>Status Barang</label><br>
	                                                    <input type="radio" name="st" onclick="show_status(0);" value="Beli" /> Beli &emsp;&emsp;&emsp;&emsp;&emsp;
														<input type="radio" name="st" onclick="show_status(1);" value="Rental" /> Rental
	                                                </center>
	                                            </div>
												
												<div class="col-md-6">
												<fieldset id="status1" style="visibility: hidden;">
												<form name='autoSumForm' class="form-horizontal" method="post" action="proses_barang">
												<input type="hidden" name="status_barang" value="Beli" />
												<input class="form-control" type="hidden" name="id_barang" value="<?php echo $newID; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="id_lelang" value="<?php echo $newID2; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="id_user" value="<?php echo $id_user; ?>" readonly ></input>
	                                            <div class="form-group">
	                                                <label class="col-md-4 control-label">Nama Barang</label>
	                                                <div class="col-md-8">
														<input type="text" class="form-control" name="nama_barang" onFocus="startCalc();" onBlur="stopCalc();" required>
	                                                    <!--<select type="text" class="form-control" name="nama_barang" onchange="cek_database()" id="nama_barang" required>
															<option value='' selected>- Pilih -</option>
																<?php
																	$barang = mysqli_query($con,"SELECT * FROM pengadaan WHERE status='Disetujui' AND jumlah_pengadaan > 0");
																	while ($row = mysqli_fetch_array($barang)) {
																		echo "<option value='$row[nama_barang]'>$row[nama_barang]</option>";
																	}
																?>
														</select>-->
	                                                    <input type="hidden" class="form-control" name="namabrg_lelang" onchange='tryNumberFormat(this.form.thirdBox);' required>
	                                                    <input type="hidden" class="form-control" name="code_barang" value="-" required>
	                                                    <input type="hidden" class="form-control" name="id_pengadaan" value="-" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Kategori</label>
	                                                <div class="col-md-8">
	                                                    <select type="text" class="form-control" name="kategori" required>
															<option value=""> - - Pilih - - </option>
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
	                                                <label class="col-md-4 control-label">Jenis Barang</label>
	                                                <div class="col-md-8">
	                                                   <input type="radio" name="jenis_barang" onclick="show_jenis(0);" value="Habis Pakai" /> Habis Pakai<br>
													   <input type="radio" name="jenis_barang" onclick="show_jenis(1);" value="Tidak Habis Pakai (5 tahun)" /> Tidak Habis Pakai (5 tahun)
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Keterangan</label>
	                                                <div class="col-md-8">
	                                                    <textarea type="text" class="form-control" name="keterangan" required></textarea>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Serial Number</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="serial_number" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Merk Barang</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="merk" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Tanggal Beli</label>
	                                                <div class="col-md-8">
	                                                    <input type="Text" name="tanggal_beli" id="demo1"class="form-control" maxlength="25" size="25" img src="../calender/images2/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer" required onFocus="startCalc();" onBlur="stopCalc();" />
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Harga Beli</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="harga_beli" id="harga_pengadaan" onkeypress="return isNumberKey(event)" onFocus="startCalc();" onBlur="stopCalc();" required>
	                                                    <input type="hidden" class="form-control" name="harga_awal" id="harga_" onkeypress="return isNumberKey(event)" onFocus="startCalc();" onBlur="stopCalc();" readonly>
	                                                </div>
	                                            </div>
												
												<div class="form-group" id="jenis1" style="visibility: hidden;">
	                                                <div class="col-md-8">
	                                                    <input type="hidden" class="form-control" name="tanggal" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
	                                                    <input type="hidden" class="form-control" name="tgl_lelang" value="-" readonly>

	                                                </div>
	                                            </div>
												
												<div class="form-group" id="jenis2" style="visibility: hidden;">
	                                                <label class="col-md-4 control-label">Harga Setelah Penyusutan</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="hrg_stlh_penyusutan" onkeypress="return isNumberKey(event)" onchange='tryNumberFormat(this.form.thirdBox);' readonly>
	                                                </div>
	                                            </div>
												
												<!--<div class="form-group">
	                                                <label class="col-md-2 control-label">Stok</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" name="stok" onkeypress="return isNumberKey(event)" id="jumlah_pengadaan" readonly>
	                                                    <input type="hidden" class="form-control" name="jumlah_lelang" onkeypress="return isNumberKey(event)" id="jumlah_" readonly>
	                                                </div>
	                                            </div>-->
												<input type="hidden" class="form-control" name="status_lelang" value="-" readonly>
												<input type="hidden" class="form-control" name="status_barang_lelang" value="-" readonly>
												<input type="hidden" class="form-control" name="harga_penawaran" value="-" readonly>
												<input type="hidden" class="form-control" name="tanggal2" value="-" readonly>
												<input type="hidden" class="form-control" name="hrg_stlh_penyusutan2" value="-" readonly>
												
												<div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">

                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                    Submit
                                                </button>
												<a href="manage_barang" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
                                                    </div>
                                                </div>
												</form>
												</fieldset>
												</div>
												
												
												<div class="col-md-6">
												<fieldset id="status2" style="visibility: hidden;">
												<form name='autoSumForm2' class="form-horizontal" method="post" action="proses_barang">
												<input type="hidden" name="status_barang3" value="Rental" />
												<input class="form-control" type="hidden" name="id_barang3" value="<?php echo $newID; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="id_lelang3" value="<?php echo $newID2; ?>" readonly ></input>
												<input class="form-control" type="hidden" name="id_user3" value="<?php echo $id_user; ?>" readonly ></input>
	                                            <div class="form-group">
	                                                <label class="col-md-4 control-label">Nama Barang</label>
	                                                <div class="col-md-8">
														<input type="text" class="form-control" name="nama_barang3" onFocus="startCalcu();" onBlur="stopCalcu();" required>
	                                                    <!--<select type="text" class="form-control" name="nama_barang3" onchange="cek_db()" id="nama" required>
															<option value='' selected>- Pilih -</option>
																<?php
																	$barang = mysqli_query($con,"SELECT * FROM pengadaan WHERE status='Disetujui' AND jumlah_pengadaan > 0");
																	while ($row = mysqli_fetch_array($barang)) {
																		echo "<option value='$row[nama_barang]'>$row[nama_barang]</option>";
																	}
																?>
														</select>-->
	                                                    <input type="hidden" class="form-control" name="namabrg_lelang3" onchange='tryNumberFormat(this.form.thirdBox);' required>
	                                                    <input type="hidden" class="form-control" name="code_barang3" value="-" required>
	                                                    <input type="hidden" class="form-control" name="id_pengadaan3" value="-" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Kategori</label>
	                                                <div class="col-md-8">
	                                                    <select type="text" class="form-control" name="kategori3" required>
															<option value=""> - - Pilih - - </option>
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
	                                                <label class="col-md-4 control-label">Jenis Barang</label>
	                                                <div class="col-md-8">
	                                                   <input type="radio" name="jenis_barang3" value="Habis Pakai" /> Habis Pakai<br>
													   <input type="radio" name="jenis_barang3" value="Tidak Habis Pakai (5 tahun)" /> Tidak Habis Pakai (5 tahun)
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Keterangan</label>
	                                                <div class="col-md-8">
	                                                    <textarea type="text" class="form-control" name="keterangan3" required></textarea>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Serial Number</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="serial_number3" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Merk Barang</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="merk3" required>
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Tanggal Rental</label>
	                                                <div class="col-md-8">
	                                                    <input type="Text" name="tanggal_beli3" id="demo2"class="form-control" maxlength="25" size="25" img src="../calender/images2/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer" required />
	                                                </div>
	                                            </div>
												<div class="form-group">
	                                                <label class="col-md-4 control-label">Harga Rental</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" class="form-control" name="harga_beli3" onkeypress="return isNumberKey(event)" required>
	                                                    
	                                                </div>
	                                            </div>
												
												
												
												<div class="form-group">
                                                    <label class="col-md-4 control-label">&nbsp;</label>
                                                    <div class="col-md-8">

                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit_rental">
                                                    Submit
                                                </button>
												<a href="manage_barang" onclick="return confirm('Canceled?');"> <i class="btn btn-danger" style="color: #f05050">Cancel</i></a>
                                                    </div>
                                                </div>
												
												
												</fieldset>
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

<script type="text/javascript">
    function cek_db(){
        var nama_barang = $("#nama").val();
        $.ajax({
            url: 'ajax_cek_rental.php',
            data:"nama_barang="+nama_barang,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#pengadaan').val(obj.id_pengadaan);
            $('#npengadaan').val(obj.no_pengadaan);
            $('#jml_pengadaan').val(obj.jumlah_pengadaan);
            $('#jml_').val(obj.jumlah_pengadaan);
            $('#hrg_pengadaan').val(obj.harga_pengadaan);
            $('#hrg_').val(obj.harga_pengadaan);
            $('#brg').val(obj.nama_barang);

        });
    }
</script>
    </body>
</html>
