<?php 
ob_start(); 
date_default_timezone_set('Asia/Jakarta'); 

function hari_ini(){
  $hari = date ("D");
 
  switch($hari){
    case 'Sun':
      $hari_ini = "Minggu";
    break;
 
    case 'Mon':     
      $hari_ini = "Senin";
    break;
 
    case 'Tue':
      $hari_ini = "Selasa";
    break;
 
    case 'Wed':
      $hari_ini = "Rabu";
    break;
 
    case 'Thu':
      $hari_ini = "Kamis";
    break;
 
    case 'Fri':
      $hari_ini = "Jumat";
    break;
 
    case 'Sat':
      $hari_ini = "Sabtu";
    break;
    
    default:
      $hari_ini = "Tidak di ketahui";   
    break;
  }
 
  return $hari_ini;
 
}

$bulan = array(
                '01' => 'januari',
                '02' => 'februari',
                '03' => 'maret',
                '04' => 'april',
                '05' => 'mei',
                '06' => 'juni',
                '07' => 'juli',
                '08' => 'agustus',
                '09' => 'september',
                '10' => 'oktober',
                '11' => 'november',
                '12' => 'desember',
        );
?>

<html>
<head>
  <title>Cetak Penyerahan Barang</title>
    
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 20%;}
   </style>
</head>
<body>
<table border="0" width="100%">
<tr>
  <th><img src="images/logo.jpg"></th>
  <th></th>
  <th><b style="font-size: 16px"> PT. Citra International Underwriters</b><br><b> Menara Standart Chartered 33rd Floor</b><br><b> Jl.Prof.Dr.Satrio No. 164, Jakarta 12930 Indonesia</b><br><b> Telp. ( +6221 ) 29927999</b><br><b> Fax. ( +6221 ) 29927998</b><br><b> www.ciuinsurance.com</b></th>
</tr>
</table>

<br>
<p style="text-align: center">Berita Acara Serah Terima Barang Inventaris IT</p>
<p style="text-align: center">No : STB/CIU-IT/<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?></p>
<p>Pada hari ini, <?php echo hari_ini(); ?>, <?php echo date('d'); ?> <?php echo (ucwords($bulan[date('m')])); ?> <?php echo date('Y'); ?>, Dengan ini menyerahkan barang inventaris IT</p>
<?php
include('includes/config.php');

$id		= base64_decode($_GET['id_peminjaman']);
$id2    = base64_decode($_GET['id_user']);
$query = "select * from user where id_user='$id2'";
$query2 = "select * from peminjaman where id_peminjaman='$id'";
$sql = mysqli_query($con, $query);
$sql2 = mysqli_query($con, $query2);
$row = mysqli_num_rows($sql); 
$row2 = mysqli_num_rows($sql2); 
while($data = mysqli_fetch_array($sql) AND $data2 = mysqli_fetch_array($sql2)){
?>
<table border="0" width="100%">
<tr>
  <td>Kepada<br>Divisi<br>Penerima<br>Pemberi</td>
  <td>: <?php echo $data['nama_pegawai']; ?><br>: <?php echo $data['satker']; ?><br>: <?php echo $data2['kepada']; ?><?php echo $data2['kepada_ext']; ?><br>: <?php echo $data2['diserahkan']; ?></td>
</tr>
</table>
<?php } ?>
<p>Jenis Barang :</p>

<table border="1">
<tr>
  <th width="100" style="text-align: center;">Nama Barang</th>
  <th width="80" style="text-align: center;">Merk</th>
  <th width="130" style="text-align: center;">Serial Number</th>
  <th width="100" style="text-align: center;">Qty</th>
  <th width="150" style="text-align: center;">Kelengkapan</th>
  <th width="150" style="text-align: center;">Spesifikasi</th>
</tr>
<?php
include('includes/config.php');

$id		= base64_decode($_GET['id_peminjaman']);
$query = "select peminjaman.id_peminjaman, peminjaman.merk, peminjaman.kelengkapan, peminjaman.kelengkapan_ext, peminjaman.serial_number, barang.nama_barang, barang.keterangan, barang.serial_number from barang inner join peminjaman on peminjaman.serial_number=barang.serial_number where peminjaman.id_peminjaman='$id'";
$sql = mysqli_query($con, $query);
$row = mysqli_num_rows($sql); 
 
if($row > 0){
    while($data = mysqli_fetch_array($sql)){
        echo "<tr>";
        echo "<td width='100'>".$data['nama_barang']."</td>";
        echo "<td width='80'>".$data['merk']."</td>";
        echo "<td width='130'>".$data['serial_number']."</td>";
        echo "<td width='100'>1 package</td>";
        echo "<td width='150'>".$data['kelengkapan']." [".$data['kelengkapan_ext']."]</td>";
        echo "<td width='150'>".$data['keterangan']."</td>";
        echo "</tr>";
    }
}else{
    echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
}
?>
</table>

<br><br><p style="text-align: center">Mengetahui,</p>
<br><br><br><br><br>
<?php
include('includes/config.php');

$id2		= base64_decode($_GET['id_peminjaman']);
$query = "select * from peminjaman where id_peminjaman='$id2'";
$sql = mysqli_query($con, $query);
$row = mysqli_num_rows($sql); 
while($data = mysqli_fetch_array($sql)){
?>
<table border="0" width="100%">
<tr>
  <th style="width: 33%; text-align: center;">(<?php echo $data['kepada']; ?><?php echo $data['kepada_ext']; ?>)</th>
  <th style="width: 33%; text-align: center;">(Teja Komara)</th>
  <th style="width: 33%; text-align: center;">(Farhan Ramadhan)</th>
</tr>
</table>
<?php } ?>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Penyerahan Barang.pdf', 'D');
?>