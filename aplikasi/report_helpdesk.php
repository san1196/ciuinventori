<!DOCTYPE html>
<html lang="en">
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
<head>
		<title>Report Helpdesk</title>
	</head>
		 <form method="post" name="form1" action="">
			
				<div>
			
				
				<h1 align="center">Laporan Tiket Helpdesk</h1>
				
				
				<hr>
				<br/>
				<div class="col-md-12">
				<h1>CIU Inventory</h1>
				
				<h3><b>Laporan Periode <i><?php echo $_POST['dari_tgl'];?> sampai <?php echo $_POST['sampai_tgl'];?></b></h3>
				<p>Dicetak tanggal <?php echo date("d-m-Y");?></p>
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-stripped" border="1"  align="center" cellpadding="1" cellspacing="0" Width="1200px">
						
									<tr>
																<th>ID Tiket</th>
                                                                <th>Tiket</th>
																<th>Nama</th>
                                                                <th>Email</th>
                                                                <th>Divisi</th>
                                                                <th>Kategori</th>
                                                                <th>Status</th>
                                                                <th>Subject</th>
                                                                <th>Pesan</th>
                                                                <th>Tanggal</th>
									<tr>
							
<?php

$dari_tgl	= $_POST['dari_tgl'];
$sampai_tgl 	= $_POST['sampai_tgl'];
																		
$sql = mysqli_query($con,"SELECT * FROM helpdesk WHERE tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl' order by tanggal desc");
$cnt=1;
$row = mysqli_num_rows($sql);
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($row = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
?>
        <tr>
<th scope="row"><?php echo htmlentities($cnt++);?></th>
<td><?php echo htmlentities($row['id_request']);?></td>
<td><?php echo htmlentities($row['tiket']);?></td>
<td><?php echo htmlentities($row['nama']);?></td>
<td><?php echo htmlentities($row['email']);?></td>
<td><?php echo htmlentities($row['divisi']);?></td>
<td><?php echo htmlentities($row['kategori']);?></td>
<td style="color: green;"><?php echo htmlentities($row['status']);?></td>
<td><?php echo htmlentities($row['subject']);?></td>
<td><?php echo htmlentities($row['pesan']);?></td>
<td><?php echo htmlentities($row['tanggal']);?></td>
        
        </tr>
<?php
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='10' style='text-align: center'>Data tidak ada</td></tr>";
}
?>
							</table>
						</div>
				</hr>
				<br/>
				
					</hr>
					
			
			</form>
			 
				
			
						
                
				<!--End Row-->
			<br><br>
			
           </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
    <!-- jQuery Version 1.11.0 -->
  

    <!-- Morris Charts JavaScript -->
    
    <script type="text/javascript">
$(document).ready(function(){
		$('#_tbl').dataTable();
		})
</script>
</body>
</html>
<script>
window.print();
</script> 