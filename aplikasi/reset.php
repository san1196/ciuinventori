<?php
 include('includes/config.php');
 if (isset($_POST['btnReset'])) 
 {
  $username = $_POST['username'];
  $cek = mysqli_query($con, "SELECT username FROM user WHERE username = '$username' ");
  if (mysqli_num_rows($cek) == 1 ) 
  {
   $password   = $_POST['password'];
   $repassword = $_POST['repassword'];
   if($password != $repassword)
   {
    ?>
     <script>
      alert("Password does not match");
      window.location.href = 'forgot';
     </script>
    <?php
   }else
   {
    $pwd = sha1($password);
    $sql = mysqli_query($con, "UPDATE user SET password = '$pwd' WHERE username = '$username' ");
    if ($sql) 
    {
     ?>
      <script>
       alert("The password has been reset successfully");
       window.location.href = 'index';
      </script>
     <?php
    }else
    {
     ?>
      <script>
       alert("Password reset failed");
       window.location.href = 'forgot';
      </script>
     <?php
    }
   }
  }else
  {
   ?>
    <script>
     alert("Username not registered");
     window.location.href = 'forgot';
    </script>
   <?php
  }
 }
?>