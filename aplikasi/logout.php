<?php
session_start();
include("includes/config.php");

session_destroy();

?>
<script language="javascript">
alert('User berhasil Logout');
document.location="index.php";
</script>
