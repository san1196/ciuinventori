
			<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard_pg" class="logo"><span>CIU<span> Inventory</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                     
                    
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                          
							<li class="dropdown user-box">
								<a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/information.png" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li width="600px">
                                        <h5>Information</h5>
                                    </li>
                              
                                    <li width="600px"><b>Pemenang Lelang & Undian :</b></li><br>
									<?php 
									$query=mysqli_query($con,"select pelelangan.id_lelang, pelelangan.id_pegawai, pelelangan.tgl_lelang, pelelangan.namabrg_lelang, pelelangan.id_barang, pelelangan.harga_penawaran, pegawai.id_pegawai, pegawai.nama_pegawai from pelelangan inner join pegawai on pelelangan.id_pegawai=pegawai.id_pegawai order by pelelangan.tgl_lelang desc");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
										if($rows['tgl_lelang'] != date('d-m-Y')) {
									?>
									
									<li width="600px"><?php echo $cnt++; ?>. <i><?php echo $row['tgl_lelang'];?></i>, <?php echo $row['id_lelang'];?> <b style="color: gold"><?php echo $row['nama_pegawai'];?></b> <b style="color: blue"><?php echo $row['namabrg_lelang'];?></b></li>
									<?php } } ?>
                                </ul>
							</li>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, <?php echo $nama_pegawai; ?></h5>
                                    </li>
                              
                                    <li><a href="change_password_pg.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>
                           
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
			<div class="modal fade" id="contohModalKecil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-body"> Disini adalah bagian konten yang akan ditampilkan pada layar pop up nanti </div> </div> </div> </div>

<script>
$('#myModal').modal('show');
</script>
