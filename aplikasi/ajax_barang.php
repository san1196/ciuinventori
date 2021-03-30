<?php
include('includes/config.php');
$barang = mysqli_fetch_array(mysqli_query($con, "select * from barang where nama_barang='$_GET[nama_barang]'"));
$data_barang = array('id_barang'   		=>  $barang['id_barang'],
              		'nama_barang'    		=>  $barang['nama_barang'],
              		'kategori'    		=>  $barang['kategori'],
              		'keterangan'    		=>  $barang['keterangan'],
              		'serial_number'    		=>  $barang['serial_number'],
              		'merk'    		=>  $barang['merk'],
              		'tanggal_beli'    		=>  $barang['tanggal_beli'],
              		'jenis_barang'    		=>  $barang['jenis_barang'],
              		);
 echo json_encode($data_barang);