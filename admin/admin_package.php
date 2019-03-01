<?php
session_start();
if(!isset($_SESSION["sess_user"]) || $_SESSION['sess_user']!='admin')
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
		<title>Admin Package Page</title>
		<link href="../style.css" rel="stylesheet" type="text/css"/>
</head>
<body>  
       <div class="main">
		<h1>Online Food Order Admin Page</h1>
		<div class="header">
				<img src="../images/logo.jpg"/>
			</div>
			<div class="mainmenu">
			<table>
				<tr>
					<td><a id="a01" href="home_admin.php"><h1>Home</h1></a></td><td></td>
					<td><a id="a02" href="admin_package.php"><h1>All Package</h1></a></td><td></td>
					<td><a id="a02" href="create_package.php"><h1>Create Package</h1></a></td><td></td>
					<td><a id="a01" href="orderlist.php"><h1>Order</h1></a></td><td></td>
					<td><a href="../logout.php" type="button"><h1>Logout</h1></a></td><td></td>
						
						
											
	        </tr>  
			</table> 
			</div>
			</br>
			<div class="slider">
			<h2> Package List: </h2>
			
			
					<?php 
						
						$query=mysql_query("SELECT * FROM package");
						
							while($row=mysql_fetch_array($query))
							{
					?>
						
					<table border="1">		
						    <tr >
							<td >
							   <img style="height:316px; width:340px; border-radius:4px;" src="../uploads/<?php echo $row['img'];?>"</img>
							</td>
							<tr>
					         <tr >
							<td >   
					            <a href="update.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Update</a>  
					            <a href="delete.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Delete</a>  
							</td>
							<tr>
							<br>
						</table>
					
					<?php
						}
					?>
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
