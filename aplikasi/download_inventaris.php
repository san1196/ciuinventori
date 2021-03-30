<?php
// Load file koneksi.php
include('includes/config.php');

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Sans Code')
					   ->setLastModifiedBy('My Sans Code')
					   ->setTitle("Data Inventaris")
					   ->setSubject("Inventaris")
					   ->setDescription("Laporan Data Inventaris")
					   ->setKeywords("Data Inventaris");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Inventaris CIU"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:T1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center 
// Buat header tabel nya pada baris ke 3

$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID Inventaris"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID Peminjaman"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "ID Pegawai"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama"); 
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Satker"); 
$excel->setActiveSheetIndex(0)->setCellValue('F3', "Jabatan"); 
$excel->setActiveSheetIndex(0)->setCellValue('G3', "Nama Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('H3', "ID Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('I3', "Kategori"); 
$excel->setActiveSheetIndex(0)->setCellValue('J3', "Keterangan"); 
$excel->setActiveSheetIndex(0)->setCellValue('K3', "Serial Number"); 
$excel->setActiveSheetIndex(0)->setCellValue('L3', "Merk"); 
$excel->setActiveSheetIndex(0)->setCellValue('M3', "Tgl Peminjaman"); 
$excel->setActiveSheetIndex(0)->setCellValue('N3', "Tgl Pengembalian"); 
$excel->setActiveSheetIndex(0)->setCellValue('O3', "Jenis Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('P3', "Inventaris"); 
$excel->setActiveSheetIndex(0)->setCellValue('Q3', "Barang Digunakan");
$excel->setActiveSheetIndex(0)->setCellValue('R3', "Status");
$excel->setActiveSheetIndex(0)->setCellValue('S3', "Barang Dikembalikan");
$excel->setActiveSheetIndex(0)->setCellValue('T3', "Status");



$excel->getActiveSheet()->getStyle('A3:T3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B2BEB5');

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);


// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(15);
// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($con, "select inventaris.id_inventaris, inventaris.id_user, inventaris.id_peminjaman, inventaris.nama_pegawai, inventaris.satker, inventaris.jabatan, inventaris.nama_barang, inventaris.id_barang, inventaris.kategori, inventaris.keterangan, inventaris.serial_number, inventaris.merk, inventaris.tanggal_beli, inventaris.tanggal_digunakan, inventaris.jenis_barang, inventaris.status_pengembalian, inventaris.inventaris, inventaris.status, peminjaman.id_peminjaman, peminjaman.no_peminjaman, peminjaman.tgl_peminjaman, peminjaman.jumlah_peminjaman, peminjaman.jumlah_pengembalian, peminjaman.tgl_pengembalian from inventaris inner join peminjaman on inventaris.id_peminjaman=peminjaman.id_peminjaman order by inventaris.id_inventaris desc");

$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_inventaris']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['id_peminjaman']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['id_user']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nama_pegawai']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['satker']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['jabatan']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['nama_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['id_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['kategori']);
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['keterangan']);
	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['serial_number']);
	$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['merk']);
	$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['tgl_peminjaman']);
	$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['tgl_pengembalian']);
	$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['jenis_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['inventaris']);
	$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['jumlah_peminjaman']);
	$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['status']);
	$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data['jumlah_pengembalian']);
	$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data['status_pengembalian']);
		
	
	
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(15);
	

	$numrow++; // Tambah 1 setiap kali looping
}



// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(35); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(35); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15); // Set width kolom F

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Inventaris");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="data_inventaris.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
