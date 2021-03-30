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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!--Script CSS-->
		<link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
		<link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>

        <script src="assets/js/modernizr.min.js"></script>

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
<a href="add_help">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Request Helpdesk Tiket<i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
 </div>

												<div class="form-group">
                                                    <table id="example" class="display responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
																<th>Status</th>
                                                                <th>No Ticket</th>
                                                                <th>Name</th>
                                                                <th>Category</th>
                                                                <th>Subject</th>
                                                                <th>Date Created</th>
																<th>Images</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
$query=mysqli_query($con,"select helpdesk.id_helpdesk, helpdesk.nama, helpdesk.email, helpdesk.divisi, helpdesk.kategori, helpdesk.kategori_ot, helpdesk.status, helpdesk.subject, helpdesk.pesan, helpdesk.tanggal, tbl_attachment.id_helpdesk, tbl_attachment.attachment1, tbl_attachment.attachment2, tbl_attachment.attachment3, tbl_attachment.attachment4, tbl_attachment.attachment5 from tbl_attachment inner join helpdesk on tbl_attachment.id_helpdesk=helpdesk.id_helpdesk where helpdesk.id_user='$_SESSION[id_user]' order by helpdesk.id_helpdesk desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>

<th scope="row"><?php echo htmlentities($cnt);?></th>
<?php if($row['status'] == 'Permintaan') { ?>
<td style="color: green;"><?php echo htmlentities($row['status']);?></td>
<td><a href="comment?id_helpdesk=<?php echo base64_encode($row['id_helpdesk']);?>"><u><?php echo htmlentities($row['id_helpdesk']);?></u></a></td>
<td><?php echo htmlentities($row['nama']);?></td>
<td><?php echo htmlentities($row['kategori']);?> [<?php echo htmlentities($row['kategori_ot']);?>]</td>
<td><?php echo htmlentities($row['subject']);?></td>
<td><?php echo htmlentities($row['tanggal']);?></td>
<td><?php if($row['attachment1'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment1'].'" width="50px">';
	} 
	if($row['attachment2'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment2'].'" width="50px">';
	}
	if($row['attachment3'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment3'].'" width="50px">';
	}
	if($row['attachment4'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment4'].'" width="50px">';
	}
	if($row['attachment5'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment5'].'" width="50px">';
} ?></td>
<?php } ?>
<?php if($row['status'] == 'Dijawab') { ?>
<td style="color: blue;"><?php echo htmlentities($row['status']);?></td>
<td><a href="comment?id_helpdesk=<?php echo base64_encode($row['id_helpdesk']);?>"><u><?php echo htmlentities($row['id_helpdesk']);?></u></a></td>
<td><?php echo htmlentities($row['nama']);?></td>
<td><?php echo htmlentities($row['kategori']);?> [<?php echo htmlentities($row['kategori_ot']);?>]</td>
<td><?php echo htmlentities($row['subject']);?></td>
<td><?php echo htmlentities($row['tanggal']);?></td>
<td><?php if($row['attachment1'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment1'].'" width="50px">';
	} 
	if($row['attachment2'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment2'].'" width="50px">';
	}
	if($row['attachment3'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment3'].'" width="50px">';
	}
	if($row['attachment4'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment4'].'" width="50px">';
	}
	if($row['attachment5'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment5'].'" width="50px">';
} ?></td>
<?php } ?>
<?php if($row['status'] == 'Balasan User') { ?>
<td style="color: blue;"><?php echo htmlentities($row['status']);?></td>
<td><a href="comment?id_helpdesk=<?php echo base64_encode($row['id_helpdesk']);?>"><u><?php echo htmlentities($row['id_helpdesk']);?></u></a></td>
<td><?php echo htmlentities($row['nama']);?></td>
<td><?php echo htmlentities($row['kategori']);?> [<?php echo htmlentities($row['kategori_ot']);?>]</td>
<td><?php echo htmlentities($row['subject']);?></td>
<td><?php echo htmlentities($row['tanggal']);?></td>
<td><?php if($row['attachment1'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment1'].'" width="50px">';
	} 
	if($row['attachment2'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment2'].'" width="50px">';
	}
	if($row['attachment3'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment3'].'" width="50px">';
	}
	if($row['attachment4'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment4'].'" width="50px">';
	}
	if($row['attachment5'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment5'].'" width="50px">';
} ?></td>
<?php } ?>
<?php if($row['status'] == 'Selesai') { ?>
<td style="color: red;"><?php echo htmlentities($row['status']);?></td>
<td><a href="comment?id_helpdesk=<?php echo base64_encode($row['id_helpdesk']);?>"><u><?php echo htmlentities($row['id_helpdesk']);?></u></a></td>
<td><?php echo htmlentities($row['nama']);?></td>
<td><?php echo htmlentities($row['kategori']);?> [<?php echo htmlentities($row['kategori_ot']);?>]</td>
<td><?php echo htmlentities($row['subject']);?></td>
<td><?php echo htmlentities($row['tanggal']);?></td>
<td><?php if($row['attachment1'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment1'].'" width="50px">';
	} 
	if($row['attachment2'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment2'].'" width="50px">';
	}
	if($row['attachment3'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment3'].'" width="50px">';
	}
	if($row['attachment4'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment4'].'" width="50px">';
	}
	if($row['attachment5'] != ''){
	echo '<img src="attachments/helpdesk/'.$row['attachment5'].'" width="50px">';
} ?></td>
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
                                    <!--- end row -->





















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
