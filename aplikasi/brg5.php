<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script langauge="javascript">
function post_value(s,x){
opener.document.getElementById('merk').value = s;
opener.document.getElementById('serial').value = x;
self.close();
}
</script>
<title>Data Karyawan CIU</title>
</head>
<body>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
    <td><b>Nama Barang</b></td>
    <td><b>Merk</b></td>
    <td><b>Serial Number</b></td>
</tr>
</thead>
<?php
include('includes/config.php');
$query=mysqli_query($con,"select * from barang where kategori='Converter HDMI' and id_user='-' order by merk asc");

while($row=mysqli_fetch_array($query))
{
?>
<tbody>
<tr>
    <td><a href='#' onclick="post_value('<?php echo htmlentities($row['merk']);?>','<?php echo htmlentities($row['serial_number']);?>');"><?php echo htmlentities($row['nama_barang']);?></a></td>
    <td><?php echo htmlentities($row['merk']);?></td>
    <td><?php echo htmlentities($row['serial_number']);?></td>
</tr>
</tbody>
</form>
<?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>