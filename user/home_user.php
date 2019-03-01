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
					<td><a id="a01"href="home_user.php"><h1>Home: </h1></td><td></td>
					<td></td><td><a id="a01"href="user_package.php"><h1>Package: </h1></td><td></td>
					<td></td><td><a id="a01"href="ordermodel.php"><h1>Order: </h1></td><td></td>
					<td></td><td><a id="a01"href="user_profile.php"><h1>Profile</h1></a></td><td></td>
					<td></td><td><a href="../logout.php" type="button"><h1>Log Out</h1></a></td><td></td>								
	        </tr>  
			</table> 
			</div>
			</br>
			<div class="slider">
				<img src="../images/slider.jpg"/>
			</div>
			<div class="footer">
				<p>&copy;Chines food Resturant</p>
			</div>
			</div>
	</body>
</html>
<?php
}
?>