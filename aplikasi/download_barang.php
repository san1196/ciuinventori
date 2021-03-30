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
					   ->setTitle("Data Barang")
					   ->setSubject("Barang")
					   ->setDescription("Laporan Data Barang")
					   ->setKeywords("Data Barang");

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "Data Barang CIU"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:N1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center 
// Buat header tabel nya pada baris ke 3

$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID Barang"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID Pengadaan"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "ID Pegawai"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Kode Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Nama Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('F3', "Kategori"); 
$excel->setActiveSheetIndex(0)->setCellValue('G3', "Keterangan"); 
$excel->setActiveSheetIndex(0)->setCellValue('H3', "Jenis Barang"); 
$excel->setActiveSheetIndex(0)->setCellValue('I3', "Serial Number"); 
$excel->setActiveSheetIndex(0)->setCellValue('J3', "Merk"); 
$excel->setActiveSheetIndex(0)->setCellValue('K3', "Tanggal Beli"); 
$excel->setActiveSheetIndex(0)->setCellValue('L3', "Harga Beli"); 
$excel->setActiveSheetIndex(0)->setCellValue('M3', "Status Barang"); 




$excel->getActiveSheet()->getStyle('A3:M3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B2BEB5');

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


// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(15);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(15);
// Buat query untuk menampilkan semua data siswa
$sql = mysqli_query($con, "select * from barang");

$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['id_pengadaan']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['id_user']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['code_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nama_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['kategori']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['keterangan']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['jenis_barang']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['serial_number']);
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['merk']);
	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['tanggal_beli']);
	$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, number_format($data['harga_beli']));
	$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['status_barang']);

		
	
	
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

	
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(15);
	

	$numrow++; // Tambah 1 setiap kali looping
}



// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(35); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10); // Set width kolom F

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Barang");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="data_barang.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
