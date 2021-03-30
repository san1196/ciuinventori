<?php
date_default_timezone_set('Asia/Jakarta');

$Id1 = $_POST ["Id1"];
$Id2 = $_POST ["Id2"];
$Nomor = $_POST ["Nomor"];
$Nama = $_POST ["Nama"];
$Hadiah = $_POST ["Hadiah"];
$tgl = date('m-d-Y');

if (empty($Id1) or empty($Id2)) die("<script type='text/javascript'>alert('Pastikan Data Terisi');history.go(-1);</script>");

include('includes/config.php');

$query1 = "insert into pemenang " . "(Nomor_pemenang,Nama_pemenang,Hadiah,Tanggal) " . " values ('$Nomor','$Nama','$Hadiah','$tgl')";
$hasil1 = mysqli_query($con,$query1);

$query2 = "delete from tbl_hadiah " . "where Id_hadiah = '$Id1'";
$hasil2 = mysqli_query($con,$query2);

$query3 = "delete from tbl_peserta " . "where Id_peserta = '$Id2'";
$hasil3 = mysqli_query($con,$query3);

$query4 = "update pelelangan set id_user='$Nomor', tgl_lelang='$tgl' " . "where id_lelang = '$Id1'";
$hasil4 = mysqli_query($con,$query4);

if (($hasil1 == TRUE) and ($hasil2 == TRUE) and ($hasil3 == TRUE) and ($hasil4 == TRUE))
{
echo"<script type='text/javascript'>window.location.href='undian.php';</script>";
}
else
{
echo"<script type='text/javascript'>alert('Gagal');window.location.href='undian.php';</script>";
}
mysqli_close($con);
?>
</body>