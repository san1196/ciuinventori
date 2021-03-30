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
  <title>Report Pengadaan</title>
    
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
<p style="text-align: center">Laporan Pengadaan Barang</p>
<p style="text-align: center">No : LPB/CIU-IT/<?php echo date('d'); ?>/<?php echo date('m'); ?>/<?php echo date('Y'); ?></p>
<br><br><br>

<table border="1">
<tr>
  <th width="70" style="text-align: center;">ID Pengadaan</th>
  <th width="70" style="text-align: center;">No Pengadaan</th>
  <th width="160" style="text-align: center;">Nama</th>
  <th width="70" style="text-align: center;">Tanggal</th>
  <th width="180" style="text-align: center;">Nama Barang</th>
  <th width="60" style="text-align: center;">Jumlah</th>
  <th width="60" style="text-align: center;">Stok</th>
  <th width="100" style="text-align: center;">Harga Satuan</th>
  <th width="70" style="text-align: center;">Status</th>
</tr>
<?php
include('includes/config.php');

$dari_tgl		= $_POST['dari_tgl'];
$sampai_tgl 	= $_POST['sampai_tgl'];

$date1 = date_create($dari_tgl);
$dari = date_format($date1, 'm-d-Y');

$date2 = date_create($sampai_tgl);
$sampai = date_format($date2, 'm-d-Y');
																		
$sql = mysqli_query($con,"SELECT user.id_user, user.nama_pegawai, pengadaan.id_pengadaan, pengadaan.id_user, pengadaan.no_pengadaan, pengadaan.tgl_pengadaan, pengadaan.nama_barang, pengadaan.jumlah_pengadaan, pengadaan.jumlah, pengadaan.harga_pengadaan, pengadaan.totalharga_pengadaan, pengadaan.status FROM pengadaan INNER JOIN user ON pengadaan.id_user=user.id_user WHERE (pengadaan.tgl_pengadaan BETWEEN '$dari' AND '$sampai')");
$row = mysqli_num_rows($sql); 
 
if($row > 0){
    while($data = mysqli_fetch_array($sql)){
        echo "<tr>";
        echo "<td width='70'>".$data['id_pengadaan']."</td>";
        echo "<td width='70'>".$data['no_pengadaan']."</td>";
        echo "<td width='160'>".$data['nama_pegawai']."</td>";
        echo "<td width='70'>".$data['tgl_pengadaan']."</td>";
        echo "<td width='180'>".$data['nama_barang']."</td>";
        echo "<td width='60'>".$data['jumlah']." Qty</td>";
        echo "<td width='60'>".$data['jumlah_pengadaan']." Qty</td>";
        echo "<td width='100'>".number_format($data['harga_pengadaan'])."</td>";
        echo "<td width='70'>".$data['status']."</td>";
        echo "</tr>";
    }
}else{
    echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
}
?>
</table>

<br><br><p style="text-align: center">Mengetahui,</p>
<br><br><br><br><br>

<table border="0" width="100%">
<tr>
  <th style="width: 50%; text-align: center;">(Teja Komara)</th>
  <th style="width: 50%; text-align: center;">(Farhan Ramadhan)</th>
</tr>
</table>


</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Pengadaan.pdf', 'D');
?>