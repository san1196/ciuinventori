<?php
include('includes/config.php');
date_default_timezone_set('Asia/Jakarta');


session_start();
error_reporting(0);
$id_user = $_SESSION['id_user'];
$nama_pegawai = $_SESSION['nama_pegawai'];
$username = $_SESSION['username'];
$jabatan = $_SESSION['jabatan'];
if (isset($_SESSION['jabatan']))
{

	if ($_SESSION['jabatan'] == "Administrator")
   {   
	
   }
   if ($_SESSION['jabatan'] == "Karyawan")
   {   
	header('location:dashboard_pg');
   }
}
if (!isset($_SESSION['jabatan']))
{
	echo '<script language="javascript">alert("Dashboard is Secure"); document.location="index";</script>';
	
}
?>
<?php
$timeout = 1800;
$logout_redirect_url = "index";
 
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Your Session is Up!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Undian CIU</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="doorprize.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.ui.effect.min.js"></script>
<script src="jquery.ui.effect-blind.min.js"></script>
<script src="jquery.ui.effect-bounce.min.js"></script>
<script src="jquery.ui.effect-clip.min.js"></script>
<script src="jquery.ui.effect-drop.min.js"></script>
<script src="jquery.ui.effect-explode.min.js"></script>
<script src="jquery.ui.effect-fade.min.js"></script>
<script src="jquery.ui.effect-fold.min.js"></script>
<script src="jquery.ui.effect-highlight.min.js"></script>
<script src="jquery.ui.effect-pulsate.min.js"></script>
<script src="jquery.ui.effect-scale.min.js"></script>
<script src="jquery.ui.effect-shake.min.js"></script>
<script src="jquery.ui.effect-slide.min.js"></script>
<script src="fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.0.css">
<script src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<script src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script src="wwb10.min.js"></script>
</head>
<body onload="ShowObject('wb_Image2', 0);ShowObject('wb_Image4', 0);ShowObject('wb_Image6', 0);return false;">
		
		<br><br><br><br><br>
		<form>
		<style>
		input.MyButton {
		width: 200px;
		padding: 10px;
		margin-left: 10px;
		cursor: pointer;
		font-weight: bold;
		font-size: 150%;
		background: #3366cc;
		color: #fff;
		border: 1px solid #3366cc;
		border-radius: 10px;
		-moz-box-shadow:: 6px 6px 5px #999;
		-webkit-box-shadow:: 6px 6px 5px #999;
		box-shadow:: 6px 6px 5px #999;
		}
		input.MyButton:hover {
		color: #ffff00;
		background: #000;
		border: 1px solid #fff;
		}
		</style>
		<input class="MyButton" type="button" value="Dashboard" onclick="window.location.href='dashboard'"/>
		</form> 

<div id="Html1" style="position:absolute;left:495px;top:104px;width:641px;height:134px;z-index:1">
<script>
function OnButton()
{
    document.postform.action = "pemenang_proses.php"
    document.postform.submit();             // Submit the page

    return false;
}
</script>
<script>
function konfirmasi(){
var a=confirm("Apakah anda yakin?");
if (a==true){
ShowObjectWithEffect('Html1', 0, 'slideleft', 2000, 'easeOutBounce');ShowObjectWithEffect('wb_Image6', 0, 'blindhorizontal', 2000, 'swing');ShowObjectWithEffect('wb_Image3', 1, 'dropdown', 2000, 'swing');ShowObjectWithEffect('Html1', 1, 'blindvertical', 2000, 'swing');PlayAudio('MediaPlayer3');setTimeout ("OnButton()", 2000);
}
else{
document.location.href="undian.php";
}
}
</script>

<form name="postform" method="post">
<table align="center" border="1" bgcolor="green" style="color:#fff; width:100%;font-family:arial narrow;font-size:30px;font-weight:bold;">
<tr>
<?php
include('includes/config.php');
$query1 = "select * from tbl_hadiah order by Id_hadiah limit 1";
$hasil1 = mysqli_query($con,$query1);
$baris1 = mysqli_fetch_row($hasil1);
$Id1 = $baris1[0];
$Hadiah1 = $baris1[2];
$query2 = "select * from tbl_hadiah order by Id_hadiah";
$hasil2 = mysqli_query($con,$query2);
$baris2 = mysqli_fetch_row($hasil2);

$jsArray2 = "var NamaHadiah = new Array();\n";
?>
<select title="Pilih Hadiah" name="Hadiah" id="Hadiah"  style="width:100%;font-family:arial narrow;font-size:30px;font-weight:normal;background-color:white;" onChange="changeValue(this.value)">
<option selected><?php echo $Hadiah1; ?>
<?php
while ($baris2 = mysqli_fetch_array($hasil2)) {
    	echo '<option value="' . $baris2['Hadiah'] . '">' . $baris2['Hadiah'] . '</option>';
    	$jsArray2 .= "NamaHadiah['" . $baris2['Hadiah'] . "'] = {satu:'" . addslashes($baris2['Id_hadiah']) . "'};\n";
} 
?>
</option></select>
<script>
<?php 
echo $jsArray2;
 ?>

function changeValue(id){
document.getElementById('Id1').value = NamaHadiah[id].satu;
};
</script>
</tr>
<?php
include('includes/config.php');
$query = "select * from tbl_peserta order by rand() limit 1";
$hasil = mysqli_query($con,$query);

while($baris = mysqli_fetch_row($hasil))
{
$Id2 = $baris[0];
$Nomor = $baris[1];
$Nama = $baris[2];
}

?>
<tr><th>Nomor</th><th>Nama</th></tr>
<tr align="center" bgcolor="blue" style="font-family:arial narrow;font-size:30px;font-weight:normal;">
<td><input  name="Nomor" bgcolor="white" style="text-align:center;width:100%;font-family:arial narrow;font-size:30px;font-weight:normal; type="text" readonly value="<?php echo $Nomor; ?>"> </td><td><input name="Nama" bgcolor="white" style="color:black;text-align:center;width:100%;font-family:arial narrow;font-size:30px;font-weight:normal; type="text" readonly value="<?php echo $Nama; ?>"></td></tr>
<input type="hidden" id="Id1" name="Id1" readonly value="<?php echo $Id1; ?>">
<input type="hidden" id="Id2" name="Id2" readonly value="<?php echo $Id2; ?>">

</table>
</form>
</div>

<iframe name="InlineFrame2" id="InlineFrame2" style="position:absolute;left:3px;top:101px;width:422px;height:602px;z-index:2;" src="pemenang_show.php"></iframe>
<div id="wb_Image4" style="position:absolute;left:735px;top:244px;width:165px;height:159px;z-index:3;">
<a href="#" onclick="ShowObject('wb_Image2', 0);ShowObject('wb_Image3', 0);ShowObject('wb_Image4', 0);ShowObject('wb_Image5', 0);ShowObjectWithEffect('wb_Image6', 1, 'blindhorizontal', 2000, 'swing');StopAudio('MediaPlayer1');PlayAudio('MediaPlayer2');return false;"><img src="images/stop_n.png" id="Image4" alt="" title="Berhenti"></a></div>


<div id="wb_Image2" style="position:absolute;left:494px;top:142px;width:644px;height:93px;z-index:6;">
<img src="images/acak.gif" id="Image2" alt=""></div>
<div id="wb_Image3" style="position:absolute;left:494px;top:142px;width:644px;height:93px;z-index:7;">
<img src="images/acak.png" id="Image3" alt=""></div>

<div id="wb_Image6" style="position:absolute;left:1146px;top:153px;width:73px;height:73px;z-index:9;">
<a href="#" onclick="return konfirmasi();return false;"><img src="images/checked_n.png" id="Image6" alt="" title="Ok"></a></div>
<?php
	$query	= mysqli_query ($con, "select * from tbl_peserta");
	$data = mysqli_fetch_array($query);
	if ($data != 0){
?>
<div id="wb_Image5" style="position:absolute;left:735px;top:244px;width:165px;height:159px;z-index:12;">
<a href="#" onclick="ShowObject('wb_Image3', 0);ShowObject('wb_Image5', 0);ShowObject('wb_Image2', 1);ShowObject('wb_Image4', 1);PlayAudio('MediaPlayer1');return false;"><img src="images/start_n.png" id="Image5" alt="" title="Mulai"></a></div>
<div id="wb_Image7" style="position:absolute;left:735px;top:244px;width:165px;height:159px;z-index:0;">
<a href="#" onclick="window.location.href='undian.php';return false;"><img src="images/refresh_n.png" id="Image7" alt="" title="Segarkan"></a></div>
	<?php } ?>
<div id="wb_MediaPlayer1" style="position:absolute;left:510px;top:327px;width:56px;height:54px;z-index:16;">
<audio src="DRUMROLL.WAV" id="MediaPlayer1" loop="loop">
</audio>
</div>
<div id="wb_MediaPlayer2" style="position:absolute;left:566px;top:328px;width:56px;height:53px;z-index:17;">
<audio src="CHIMES.WAV" id="MediaPlayer2">
</audio>
</div>
<div id="wb_MediaPlayer3" style="position:absolute;left:622px;top:327px;width:56px;height:54px;z-index:18;">
<audio src="LASER.WAV" id="MediaPlayer3">
</audio>
</div>
</body>
</html>