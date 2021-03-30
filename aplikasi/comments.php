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


  $id		= base64_decode($_GET['id_helpdesk']);
  $query	= mysqli_query($con,"select * from helpdesk where id_helpdesk='$id'");
  $data		= mysqli_fetch_array($query);
  
  
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>CIU Inventory | Comment</title>

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
   
	<style type="text/css">
		[aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
			display: none;
		}
	</style>
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
                                    <h4 class="page-title">Manage Helpdesk</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Helpdesk </a>
                                        </li>
                                        <li class="active">
                                            Comment
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
							<div class="col-sm-3">
							</div>
                            <div class="col-sm-6">
                                <div class="card-box">
                                    
						
									<div class="row">
                        				
										<div class="col-md-12">
                        					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
														
													<div class="row">
														<div class="col-sm-12">
															<fieldset>
																<div class="col-sm-10">
																	<div class="alert alert-info">
																		No Ticket&emsp;[<?php echo $data['id_helpdesk'];?>] - <?php echo $data['tanggal'];?>
																	</div>
																	<b>Kategori</b> : <?php echo $data['pesan'];?></b>
																</div>
																<div class="col-md-2">
															
																	<?php if($data['status'] == 'Balasan User') { ?>
																		<a href="proses_help?id_helpdesk=<?php echo base64_encode($data['id_helpdesk']);?>&&id_user=<?php echo base64_encode($data['id_user']);?>" onclick="return confirm('Yakin ingin diselesaikan?');"> <i class="btn btn-danger" style="color: #f05050">Selesai</i></a>
																	<?php } ?>
																	<?php if($data['status'] == 'Dijawab') { ?>
																		<a href="proses_help?id_helpdesk=<?php echo base64_encode($data['id_helpdesk']);?>&&id_user=<?php echo base64_encode($data['id_user']);?>" onclick="return confirm('Yakin ingin diselesaikan?');"> <i class="btn btn-danger" style="color: #f05050">Selesai</i></a>
																	<?php } ?>
																	
																</div>
															</fieldset>
														</div>
														
													</div>
													
													<!--<div class="form-group">
														<label class="col-md-2 control-label">No Ticket</label>
														<div class="col-md-10">
															<input type="text" class="form-control" name="id_helpdesk" value="<?php echo $data['id_helpdesk'];?>" readonly>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-2 control-label">Kategori</label>
														<div class="col-md-10">
															<textarea type="text" class="form-control" name="message" readonly><?php echo $data['pesan'];?></textarea>
														</div>
													</div>-->
													
	                                        </form>
                        				</div>
										
                        			</div>
								
								</div>
							</div>
							<div class="col-sm-3">
							</div>
						</div>
						
						
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Comment</b></h4>
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
                        					<div class="card-box">
                        					<form class="form-horizontal" method="post" action="proses_help" enctype="multipart/form-data">
												<div id="accordion">
													<div class="card">
														<div class="card-header">
															<a class="card-link" data-toggle="collapse" href="#menuone" aria-expanded="false" aria-controls="menuone">
																<div class="alert alert-info">
																	<!--<span class="collapsed"><i class="fa fa-plus"></i></span> 
																	<span class="expanded"><i class="fa fa-minus"></i></span>-->
																	<i class="fa fa-pencil"></i> Reply
																</div>
															</a>
														</div>
														
														
													<div class="form-group">
														
														<div class="col-md-10">
															<input type="hidden" class="form-control" name="id_helpdesk" value="<?php echo $data['id_helpdesk'];?>" readonly>
														</div>
													</div>
													<input type="hidden" class="form-control" name="id_pesan" value="-" readonly>
													<input type="hidden" class="form-control" name="tanggal" value="<?php echo date('d:m:Y h:i:s', time()); ?>" readonly>
													<input type="hidden" class="form-control" name="user" value="<?php echo $nama_pegawai;?>" readonly>
													<input type="hidden" class="form-control" name="permission" value="<?php echo $jabatan;?>" readonly>
													<div class="form-group">
														
														<div class="col-md-10">
															<input type="hidden" class="form-control" name="message" value="<?php echo $data['pesan'];?>" readonly>
														</div>
													</div>
													
													
														<div id="menuone" class="collapse">
														
															<div class="form-group">
																<label class="col-md-2 control-label">Comment</label>
																<div class="col-md-10">
																	<textarea type="text" class="form-control" name="komentar" required></textarea>
																</div>
															</div>
													
															<div class="form-group">
																<label class="col-md-2 control-label">Attachment</label>
																<div class="col-md-10">
																	
																		<input type="file" class="form-control" name="attachment[]" multiple>
																	
																</div>
															</div>
															
															<div class="form-group">
																<label class="col-md-2 control-label">&nbsp;</label>
																<div class="col-md-10">
															  
															<button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="koment">
																Post
															</button>
															<a href="manage_helpdesk" onclick="return confirm('Kembali ke menu sebelumnya?');"> <i class="btn btn-success" style="color: #f05050">Back</i></a>
																</div>
															</div>
												
														</div>
													</div>
												</div>
												
												

	                                        </form>
											</div>
											<hr>
											
										</div>
										<div class="col-md-6">
										
											<?php
											$query1 = mysqli_query($con,"select * from pesan_helpdesk where id_helpdesk='$id' order by id_pesan desc");
											$query2 = mysqli_query($con,"select * from tbl_attachment where id_pesan='$id' order by id_attachment desc");
											while($row = mysqli_fetch_array($query1) AND $row2 = mysqli_fetch_array($query2))
												{
												
												echo '<div class="row">
														<div class="col-sm-12">
															<div class="card-box">
																<p class="m-t-0 header-title">';
																	echo '<div class="alert alert-success">'.$row['user'].'&emsp;['.$row['permission'].']&emsp;'.$row['tanggal'].'</div></p>';
																	echo '<p>'.$row['komentar'].'</p>';
																	if($row2['attachment1'] != ''){
																	echo '<img src="attachments/helpdesk/'.$row2['attachment1'].'" width="50px">';
																	} 
																	if($row2['attachment2'] != ''){
																	echo '<img src="attachments/helpdesk/'.$row2['attachment2'].'" width="50px">';
																	}
																	if($row2['attachment3'] != ''){
																	echo '<img src="attachments/helpdesk/'.$row2['attachment3'].'" width="50px">';
																	}
																	if($row2['attachment4'] != ''){
																	echo '<img src="attachments/helpdesk/'.$row2['attachment4'].'" width="50px">';
																	}
																	if($row2['attachment5'] != ''){
																	echo '<img src="attachments/helpdesk/'.$row2['attachment5'].'" width="50px">';
																	}
															echo '</div></div></div>';
												}
											?>
											
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