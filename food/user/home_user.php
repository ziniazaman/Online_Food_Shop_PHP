<?php
session_start();
if(!isset($_SESSION["sess_user"]) || $_SESSION['sess_user']=='admin')
{
	header("location:index.php");
} 
else{
	
	include ('db.php');
	$user=$_SESSION['sess_user'];
	
	//echo "<br/>".$user."<br/>".$fname;
	//$query=mysql_query("SELECT * FROM registration where username='".$user."'" );
	
	
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
					<td><a id="a01"href="home_user.php">Home: </td>
					<td><a id="a01"href="user_package.php">Package: </td>
					<td><a id="a01"href="ordermodel.php">Order: </td>
					<td><a id="a01"href="user_profile.php">Profile</a></td>
						
						
											
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