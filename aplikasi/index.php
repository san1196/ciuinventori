<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


            $query2=mysqli_query($con,"select * from helpdesk where status!='Selesai'");

            while($rows=mysqli_fetch_array($query2))
            {
                    $today = date('m-d-Y');
                    $tgl_agenda = $rows['tgl_tempo']; 
                    
                if($tgl_agenda == $today) {
                    $query = mysqli_query($con, "update helpdesk set status='Selesai' where tgl_tempo='$today'");
					
					$query2 = mysqli_query($con,"select * from helpdesk where tgl_tempo='$today'");
					while($row=mysqli_fetch_array($query2))
					{

					$help = $row['id_helpdesk'];
					$to = $row['email'];
					$subjects = "Information Ticket Helpdesk";
					$messages = "Tiket Anda sudah kami tutup, dengan no Tiket $help";

					$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
					@mail($to, $subjects, $messages, $headers);

					}
                }
                
            }
			
			
			$query3=mysqli_query($con,"select * from peminjaman where status='Digunakan'");

            while($rows=mysqli_fetch_array($query3))
            {
                    $today = date('m-d-Y');
                    $tgl_agenda = $rows['tgl_tempo1']; 
                    $user = $rows['id_user']; 
                    
                if($tgl_agenda == $today) {
					
					$user_akun = mysqli_query($con, "update user set status_akun='0' where id_user='$user'");
					
                    $query2 = mysqli_query($con,"SELECT user.id_user, user.nama_pegawai, user.email, peminjaman.id_user, peminjaman.id_peminjaman, peminjaman.tgl_tempo1 FROM peminjaman INNER JOIN user ON peminjaman.id_user=user.id_user WHERE peminjaman.tgl_tempo1='$today'");
					while($row=mysqli_fetch_array($query2))
					{

					$help = $row['id_peminjaman'];
					$to = $row['email'];
					$subjects = "Information Ticket Peminjaman";
					$messages = "Barang Peminjaman Anda segera dikembalikan secepatnya, dengan no Tiket $help \n\nPeminjaman Anda sudah masuk jatuh tempo, dan akun Anda di Nonaktifkan sementara";

					$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
					@mail($to, $subjects, $messages, $headers);

					}
                }
                
            }
			
			$query4=mysqli_query($con,"select * from peminjaman where status='Digunakan'");

            while($rows=mysqli_fetch_array($query4))
            {
                    $today = date('m-d-Y');
                    $tgl_agenda = $rows['tgl_tempo2']; 
					$user = $rows['id_user']; 
					/*$barang = $rows['serial_number'];*/ 
                    
                if($tgl_agenda == $today) {
					
					/*$brg = mysqli_query($con, "select * from barang where serial_number='$barang'");
					while($row=mysqli_fetch_array($brg))
					{
						$pengadaan = $row['id_pengadaan'];
						$query3=mysqli_query($con,"select * from pengadaan where id_pengadaan='$pengadaan'");
						while($row=mysqli_fetch_array($query3))
						{
						$jumlah = $row['jumlah_pengadaan'];
						$net 	= $jumlah - 1;
						
						$query4 = mysqli_query($con,"update pengadaan set jumlah_pengadaan='$net' where id_pengadaan='$pengadaan'");
						}
					}*/
				
					$query = mysqli_query($con, "update peminjaman set status='Hilang' where tgl_tempo2='$today'");
					
					$user_akun = mysqli_query($con, "update user set status_akun='0' where id_user='$user'");
					
                    $query2 = mysqli_query($con,"SELECT user.id_user, user.nama_pegawai, user.email, peminjaman.id_user, peminjaman.id_peminjaman, peminjaman.tgl_tempo2 FROM peminjaman INNER JOIN user ON peminjaman.id_user=user.id_user WHERE peminjaman.tgl_tempo2='$today'");
					while($row=mysqli_fetch_array($query2))
					{

					$help = $row['id_peminjaman'];
					$to = $row['email'];
					$subjects = "Information Ticket Peminjaman";
					$messages = "Batas waktu Pengembalian Barang Anda sudah habis, dengan no Tiket $help \n\nAkun Anda di Nonaktifkan, jika ingin di Aktifkan kembali harap segera mengembalikan barang atau membayar sejumlah 70% dari harga beli Barang tersebut.";

					$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori";
					@mail($to, $subjects, $messages, $headers);

					}
                }
                
            }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        <!-- App title -->
        <title>Inventory Login</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="" class="text-success">
                                            <span>Inventory | Login Form</span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post" action="cek_login">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>


                     
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-success waves-effect waves-light" type="submit" >Log In</button>
                                            </div>
											<a href="lostpassword" style="color: blue; float:right;">Lupa Password?</a>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>