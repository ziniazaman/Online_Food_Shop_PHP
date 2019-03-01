<?php
session_start();
if(!isset($_SESSION["sess_user"]) || $_SESSION['sess_user']!='admin')
{
	header("location:index.php");
} 
else{
	
	include ('db.php');
	$user=$_SESSION['sess_user'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Home Page</title>
		<link href="../style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
	
		
		<div class="main">
		<h1>Online Food Order User Page</h1>
		
			<div class="header">
				<img src="../images/logo.jpg"/>
			</div>
			<div class="mainmenu">
			<table>
				<tr>
					<td><a id="a01" href="home_admin.php"><h1>Home</h1></a></td>
					<td><a id="a02" href="admin_package.php"><h1>All Package</h1></a></td>
					<td><a id="a02" href="create_package.php"><h1>Create Package</h1></a></td>
					<td><a id="a01" href="orderlist.php"><h1>Order</h1></a></td>
					<td><a href="../logout.php" type="button"><h1>Log Out</h1></a></td>
						
						
											
	        </tr>  
			</table> 
			</br>
			
			
			</div>
			<div class="slider">
				<img src="../images/slider.jpg"/>
			</div>
				<div class="footer">
				<p>&copy;Chines food Resturant</p>
			</div>
			
	</body>
</html>
<?php
}
?>