<!DOCTYPE html>
<html>
    <head>
<?php
ob_start();
session_start();
include("db.php");
?>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <table style="width:100%; border: 1px solid black">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $sql="SELECT * FROM finforex_users";
				$result=mysqli_query($con,$sql);
				while($row = $result->fetch_array()){
                        $rows[] = $row;
                }
                foreach($rows as $row){			
                ?>
                <tr>
                    <td>
                        <?php echo $row['userid'];?>
                    </td>
                    <td>
                        <?php echo $row['username'];?>
                    </td>
                   <td>
                        <?php echo $row['role'];?>
                    </td>
                                        <td>
                        <?php echo $row['emailid'];?>
                    </td>
                                        <td>
                        <?php echo $row['phonenumber'];?>
                    </td>
                    <td>
                        <a href="">Edit</a><br>
                        <a href="">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </body>
</html>
