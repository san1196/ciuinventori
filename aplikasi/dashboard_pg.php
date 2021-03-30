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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App title -->
    <title>CIU Inventory | Dashboard</title>
    <link rel="stylesheet" href="../plugins/morris/morris.css">

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
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <?php include('includes/topheader_pg.php');?>
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar_pg.php');?>
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
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="#">Inventory</a>
                                </li>
                                <li>
                                    <a href="#">User</a>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
                <!-- end row -->
                <div class="row">
                   <div class="col-xs-12">
                       <center><h3>Hi <?php echo $nama_pegawai; ?>, Selamat Datang di Aplikasi CIU Inventori</h3></center>
                   </div>
               </div>	
               <br><hr>

	<script type="text/javascript">        
		function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
		var waktu = new Date();            //membuat object date berdasarkan waktu saat 
		var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
		var sm = waktu.getMinutes() + "";  //memunculkan nilai detik    
		var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
		document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
	}
	</script>
	
	<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
	<span id="clock"></span> 
	
	<?php
	$hari = date('l');
	
	if ($hari=="Sunday") {
		echo "Minggu";
	}elseif ($hari=="Monday") {
		echo "Senin";
	}elseif ($hari=="Tuesday") {
		echo "Selasa";
	}elseif ($hari=="Wednesday") {
		echo "Rabu";
	}elseif ($hari=="Thursday") {
		echo("Kamis");
	}elseif ($hari=="Friday") {
		echo "Jum'at";
	}elseif ($hari=="Saturday") {
		echo "Sabtu";
	}
	?>,
	
	<?php
	$tgl =date('d');
	echo $tgl;
	$bulan =date('F');
	if ($bulan=="January") {
		echo " Januari ";
	}elseif ($bulan=="February") {
		echo " Februari ";
	}elseif ($bulan=="March") {
		echo " Maret ";
	}elseif ($bulan=="April") {
		echo " April ";
	}elseif ($bulan=="May") {
		echo " Mei ";
	}elseif ($bulan=="June") {
		echo " Juni ";
	}elseif ($bulan=="July") {
		echo " Juli ";
	}elseif ($bulan=="August") {
		echo " Agustus ";
	}elseif ($bulan=="September") {
		echo " September ";
	}elseif ($bulan=="October") {
		echo " Oktober ";
	}elseif ($bulan=="November") {
		echo " November ";
	}elseif ($bulan=="December") {
		echo " Desember ";
	}
	$tahun=date('Y');
	echo $tahun;
	?>

				<?php
				$tgl = date("d-m-Y");
				$query2=mysqli_query($con,"select count(id_lelang) as total from pelelangan where tgl_lelang='$tgl' and status_barang_lelang='Lelang' and harga_penawaran != 0");

					while($rows=mysqli_fetch_array($query2))
					{
						$tot = $rows['total'];
						
		// mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
							/*$selisih1 =  mktime(0, 0, 0, 12, 31, 2037);
							
		// mencari mktime untuk current time
							$selisih2 = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
							
		// mencari selisih detik antara kedua waktu
							$delta = $selisih1 - $selisih2;
							
		// proses mencari jumlah jam
							$sisa = $delta % 86400;
							$b  = floor($sisa / 3600);
							
		// proses mencari jumlah menit
							$sisa = $sisa % 3600;
							$c = floor($sisa / 60);
							
		// proses mencari jumlah detik
							$sisa = $sisa % 60;
							$d = floor($sisa / 1);

							echo "Sisa Waktu: ".$b." jam ".$c." menit lagi.";*/
							
							echo '<br>';
							echo "Total barang di Lelang hari ini: <b>".$tot." items</b>";
						
					}
				?>

	
	
            <hr>    
            <center><h1>Daftar Barang Lelang</h1></center>
            <div class="row">
              <div class="col-md-12">
               <div class="demo-box m-t-20">
                

                <div class="table-responsive">
                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Tgl Lelang</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Harga Terbaru</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $query=mysqli_query($con,"select * from pelelangan where status_barang_lelang='Lelang' and harga_penawaran !=0 order by concat(jam_mulai) asc");
							$no=1;
                            while($row=mysqli_fetch_array($query))
                            {
								$jam1 = $row['jam_mulai'];
								$jam2 = $row['jam_selesai']; 
								$tanggal = $row['tgl_lelang']; 
								$waktu = date("H:i:s");
								$tgl = date("d-m-Y");
                                ?>

                                <tr>
									
                                    <?php if($tanggal == $tgl && $jam1 < $waktu && $jam2 > $waktu) { ?>
									<td><?php echo $no++;?></td>
                                    <td><?php echo htmlentities($row['namabrg_lelang']);?></td>
                                    <td><?php echo htmlentities($row['tgl_lelang']);?></td>
                                    <td><?php echo htmlentities($row['jam_mulai']);?></td>
                                    <td><?php echo htmlentities($row['jam_selesai']);?></td>
                                    <td><?php echo htmlentities(number_format($row['harga_penawaran']));?></td>
                                    <td style="color: green">Lelang Sedang Berlangsung</td>
                                    <td><a href="tawar?id_lelang=<?php echo base64_encode($row['id_lelang']);?>" onclick ="return confirm('Apakah Anda yakin menawar harga?');"><i class="btn btn-primary" style="color: #29b6f6;">Tawar</i></a>
                                    </td>
                                    <?php } ?>
									<?php if($tanggal == $tgl && $jam1 > $waktu) { ?>
									<td><?php echo $no++;?></td>
                                    <td><?php echo htmlentities($row['namabrg_lelang']);?></td>
                                    <td><?php echo htmlentities($row['tgl_lelang']);?></td>
									<td><?php echo htmlentities($row['jam_mulai']);?></td>
                                    <td><?php echo htmlentities($row['jam_selesai']);?></td>
                                    <td><?php echo htmlentities(number_format($row['harga_penawaran']));?></td>
									<td style="color: blue">Lelang yang akan datang</td>
                                    <td></td>
                                    <?php } ?>
                                    <?php if($tanggal == $tgl && $jam2 < $waktu) { ?>
									<td><?php echo $no++;?></td>
                                    <td><?php echo htmlentities($row['namabrg_lelang']);?></td>
                                    <td><?php echo htmlentities($row['tgl_lelang']);?></td>
									<td><?php echo htmlentities($row['jam_mulai']);?></td>
                                    <td><?php echo htmlentities($row['jam_selesai']);?></td>
                                    <td><?php echo htmlentities(number_format($row['harga_penawaran']));?></td>
									<td style="color: red">Lelang telah selesai</td>
                                    <td></td>
                                    <?php } ?>
									
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
	
		<hr>    
            <center><h4>Daftar Penawar Lelang</h4></center>
            <div class="row">
              <div class="col-md-12">
               <div class="demo-box m-t-20">
                

                <div class="table-responsive">
                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Penawar</th>
                                <th>Harga Penawar</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $query=mysqli_query($con,"select * from penawar order by nama_barang asc, harga desc");
							$no=1;
                            while($row=mysqli_fetch_array($query))
                            {
								$tanggal = $row['tanggal']; 
								$tgl = date("d-m-Y");
                                ?>

                                <tr>
                                    <?php if($tanggal == $tgl) { ?>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo htmlentities($row['nama_barang']);?></td>
                                    <td><?php echo htmlentities($row['nama_penawar']);?></td>
									<td><?php echo htmlentities(number_format($row['harga']));?></td>
									<td><?php echo htmlentities($row['tanggal']);?></td>
                                    <?php } ?>
                                    
									
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
    <!-- end row -->
    


</div> <!-- container -->

</div> <!-- content -->
<?php include('includes/footer.php');?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->



<!-- /Right-bar -->

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

<!-- Counter js  -->
<script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../plugins/counterup/jquery.counterup.min.js"></script>

<!--Morris Chart-->
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
