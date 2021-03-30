<?php
include('includes/config.php');
session_start();
date_default_timezone_set('Asia/Jakarta');

if($_GET['id_request'])
{
	$id = base64_decode($_GET['id_request']);
	$id2 = base64_decode($_GET['id_user']);
	
	$query = mysqli_query($con,"update helpdesk set status='Closed' where id_request='$id'");
	
	$query2 = mysqli_query($con,"select * from user where id_user='$id2'");
		while($row=mysqli_fetch_array($query2))
		{

		$to = $row['email'];
		$subjects = "Information Ticket Helpdesk";
		$messages = "Request Tiket Anda telah kami proses, dengan No Ticket $id";
		
		$headers = 'From: <appsciu@gmail.com>' . "Aplikasi CIU Inventori"; 
		@mail($to, $subjects, $messages, $headers);
		}
	
	echo '<script language="javascript">alert("Request Helpdesk Anda sudah kami proses."); document.location="manage_helpdesk";</script>';
}