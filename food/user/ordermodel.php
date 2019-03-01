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
				<div class="site_menu">
						<ul>
							
							<li><a href="#">Please Select The Orders Day</a>
								<ul class="dropdown-menu dropCust2" aria-labelledby="dLabel">
									<li><a class="a02" href="day.php?day_name=saturday">Saturday</a></li>
									<li><a class="a02" href="day.php?day_name=sunday">Sunday</a></li>
									<li><a class="a02" href="day.php?day_name=monday">Monday</a></li>
									<li><a class="a02" href="day.php?day_name=tuesday">Tuesday</a></li>
									<li><a class="a02" href="day.php?day_name=wednesday">Wednesday</a></li>
									<li><a class="a02" href="day.php?day_name=thursday">Thursday</a></li>
									<li><a class="a02" href="day.php?day_name=friday">Friday</a></li>
								</ul>
							</li>
							<li><a id="a01"href="home_user.php">Home</a></li>
						</ul>           
					</div> 
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