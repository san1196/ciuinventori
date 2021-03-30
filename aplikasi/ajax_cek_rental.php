<?php
include('includes/config.php');
$barang = mysqli_fetch_array(mysqli_query($con, "select * from pengadaan where status='Disetujui' AND jumlah_pengadaan > 0 and nama_barang='$_GET[nama_barang]'"));
$data_barang = array('id_pengadaan'   		=>  $barang['id_pengadaan'],
              		'no_pengadaan'    		=>  $barang['no_pengadaan'],
              		'jumlah_pengadaan'    		=>  $barang['jumlah_pengadaan'],
              		'harga_pengadaan'    		=>  $barang['harga_pengadaan'],
              		'nama_barang'    		=>  $barang['nama_barang'],);
 echo json_encode($data_barang);