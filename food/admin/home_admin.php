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
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
	
		
		<div class="main">
		<h1>Online Food Order</h1>
			<div class="header">
				<img src="../images/logo.jpg"/>
			</div>
			<div class="mainmenu">
			<table>
				<tr>
					<td><a id="a01" href="home_admin.php">Home</a></td>
					<td><a id="a02" href="admin_package.php">All Package</a></td>
					<td><a id="a02" href="create_package.php">Create Package</a></td>
					<td><a id="a01" href="orderlist.php">Order</a></td>
						
						
											
	        </tr>  
			</table> 
			
			
			</div>
			<div class="slider">
				<img src="../images/slider.jpg"/>
			</div>
			<div class="maincontent">
				<div class="content">
					
					
				</div>
				
			</div>
			<div class="col-lg-3">
					<div class="logoutSec">
						<p><a href="../logout.php" type="button" role="button" class="logOutStl">Logout</a></p>
					</div>
				</div>
		</div>
	


	</body>
</html>
<?php
}
?>