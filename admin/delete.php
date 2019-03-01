<?php 
		$package_id=$_GET['package_id'];
		include ('db.php');

				$sql = "DELETE FROM package WHERE package_id='".$package_id."'";
				
				$result=mysql_query($sql);
				
				$sql2 = "DELETE FROM  item WHERE package_id='".$package_id."'";
				
				$result2=mysql_query($sql2);
				
				$sql3 = "DELETE FROM day WHERE package_id='".$package_id."'";
				
				$result3=mysql_query($sql3);
				header('location:admin_package.php');
			
			 
?>