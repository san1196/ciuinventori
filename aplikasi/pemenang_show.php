<?php 
include('includes/config.php');
		$view=mysqli_query($con,"select * from pemenang order by Id_pemenang asc");
		?>
		<br />
		
		<h3 style="color:#000; text-align:center">Daftar Pemenang Undian</h3>
		<table align="center" border="1" bgcolor="gold" style="color:#fff; width:100%;font-family:arial narrow;font-size:10px;font-weight:bold;">
		<tr><th>No Peserta</th><th>Nama</th><th>Hadiah</th></tr>
		<?php
		while($row=mysqli_fetch_array($view)){
			
$Id = $row ['Id_pemenang'];
$Nomor = $row ['Nomor_pemenang'];
$Nama = $row ['Nama_pemenang'];
$Hadiah = $row ['Hadiah'];

		?>
		<tr align="left" bgcolor="white" style="color:black;font-family:arial narrow;font-size:10px;font-weight:normal;"><td><?php echo $Nomor;?></td><td><?php echo $Nama;?></td><td><?php echo $Hadiah;?></td></tr>
		<?php
		}
		?>
		</table>



