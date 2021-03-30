<?php
include('includes/config.php');
$barang = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pelelangan WHERE namabrg_lelang='$_GET[namabrg_lelang]'"));
$data_barang = array('id_barang'   		=>  $barang['id_barang'],
              		'namabrg_lelang'    		=>  $barang['namabrg_lelang'],
              		'id_lelang'    		=>  $barang['id_lelang'],);
 echo json_encode($data_barang);