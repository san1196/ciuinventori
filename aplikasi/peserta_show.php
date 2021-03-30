<?php 
include('includes/config.php');
		$view=mysqli_query($con,"select * from tbl_peserta order by Nomor asc");
		?>
		<br />
<html>
<body bgcolor="blue">
<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="100%" height="300" align="center" behavior=”alternate”> 		
<table align="center" border="1" bgcolor="black" style="color:#8A8A8A; width:100%;font-family:arial narrow;font-size:20px;font-weight:bold;">
		<tr><th>No Undian</th><th>Nama</th></tr>
		<?php
		while($row=mysqli_fetch_array($view)){
$Id = $row ['Id'];
$Nomor = $row ['Nomor'];
$Nama = $row ['Nama'];

		?>
		<tr align="left" bgcolor="white" style="color:black;font-family:arial narrow;font-size:20px;font-weight:normal;"><td><?php echo $Nomor;?></td><td><?php echo $Nama;?></td></tr>
		<?php
		}
		?>
		</table>
</marquee>
<html>
<body bgcolor="blue">

