<?php
include('includes/config.php');

$dari_tgl		= $_POST['dari_tgl'];
$sampai_tgl 	= $_POST['sampai_tgl'];

$date1 = date_create($dari_tgl);
$dari = date_format($date1, 'm-d-Y');

$date2 = date_create($sampai_tgl);
$sampai = date_format($date2, 'm-d-Y');

echo $dari;
echo "<br>";
echo $sampai;