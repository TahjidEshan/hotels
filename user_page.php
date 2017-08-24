<?php
session_start();
include 'db.php';
if(isset($_SESSION['role'])=='user')
{
$query= mysqli_query($con,"SELECT * FROM `finforex_users` WHERE `userid`='".$_SESSION['userid']."' AND  `role`='user' ");
$arr = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);
if($num==1)
{
?>
<?php
require_once('user_interface.php');
}else{
header ("location:login.php");
}
}
else
      header ("location:login.php");

?>
</body>