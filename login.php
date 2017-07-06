<!DOCTYPE html>
<html>

<head>
	<?php
ob_start();
session_start();
include("db.php");
?>
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>

<body bgcolor="#FFFFFF">

	<div align="center">
		<div style="width:350px; border: solid 2px #333333; " align="left">
			<div style="background-color:#333333; color:#FFFFFF; padding:4px;"><b>Login</b></div>
			<div style="margin:25px">
				<form method="post" action="" class="form-horizontal">
					<?php
						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$myusername1=mysqli_real_escape_string($con,$_POST['username']); 
							$mypassword1=mysqli_real_escape_string($con,$_POST['password']); 
							$mypassword=MD5($mypassword1);
							$sql="SELECT * FROM finforex_users WHERE username='$myusername1' and password='$mypassword'";
							$result=mysqli_query($con,$sql);
							$row=mysqli_fetch_array($result);
							$_SESSION['userid']=$row['userid'];
							$_SESSION['role']=$row['role'];
							$count=mysqli_num_rows($result);
							if($count==1){
								if ($row['role']=="administrator"){ 
 									header ("location: admin_page.php"); 					
								}else if ($row['role']=="user"){ 
									$_SESSION['role']=$row['role'];
									header ("location: user_page.php"); 						
								}else if ($row['role']=="owner"){ 
									$_SESSION['role']=$row['role'];
									header ("location: owner_page.php"); 						
								}
							}else{
								$error="Your Login Name or Password is invalid";
							}
						}
					?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" name="username" class="form-control" placeholder="User Name" />
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="Password" />
							</div>
							<input type="submit" value=" Submit " class="btn btn-success btn-submit btn-block" />
						</div>
				</form>
				<div style="font-size:11px; color:#cc0000; margin-top:10px">
					<?php echo $error; ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>