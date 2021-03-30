            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard" class="logo"><span>CIU<span> Inventory</span></span><i class="mdi mdi-layers"></i></a>
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


									<li width="600px"><b>Helpdesk :</b></li><br>
									<?php
									$query=mysqli_query($con,"select * from helpdesk where status='Permintaan' order by id_request desc limit 5");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{

									?>

									<li width="600px"><?php echo $cnt++; ?>. <i style="color: orange"><?php echo $row['id_request'];?></i>, <?php echo $row['kategori'];?> [<?php echo $row['kategori_ot'];?>] <b style="color: blue"><?php echo $row['subject'];?></b> - <b style="color: blue"><?php echo $row['pesan'];?></b></li>
									<?php } ?>
                  <br>
                  <li width="600px"><b>Peminjaman :</b></li><br>
									<?php
									$query=mysqli_query($con,"select * from peminjaman where status='Permintaan' order by id_peminjaman desc limit 5");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{

									?>

									<li width="600px"><?php echo $cnt++; ?>. <i style="color: orange"><?php echo $row['id_peminjaman'];?></i>, <?php echo $row['jenis_barang'];?> - <i style="color: green"><?php echo $row['tanggal_digunakan'];?></i></li>
									<?php } ?>

                  <br>
                  <center>
                  <a href="notification"> <i class="btn btn-primary" style="color: #f05050">View All</i></a>
                  </center>


                                </ul>

							</li>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, Admin</h5>
                                    </li>

                                    <li><a href="change_password.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>

                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
