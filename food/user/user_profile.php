<?php
session_start();
if(!isset($_SESSION["sess_user"]) || $_SESSION['sess_user']=='admin')
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
<title>User Profile</title>
</head>
<body>

						<h1>Online Food Order</h1>          
					      
						<table>
						<tr>
						
							<td><strong><a href="home_user.php">Home</a></strong></td>
							<td><strong><a href="user_package.php">Package</a></strong></td>
							
							<td><strong><a href="../logout.php">Logout</a></strong></td>
						</tr>
						</table>
						
					

	<?php
		$query=mysql_query("SELECT * FROM registration WHERE username='".$user."'");
			while($row=mysql_fetch_array($query))
			{
		
	
	?>
	
	
	<h3>Your Profile</h3>
		<table border="1">
						
                    <tr>
						<td> First Name:s</td>
						<td><span><?php echo $row['fname'];?></span></td>		
					</tr>
					<tr>
						<td> Last Name</td>
						<td><span><?php echo $row['lname'];?></span></td>		
					</tr>
					<tr>
						<td> Username</td>
						<td><span ><?php echo $row['username'];?></span></td>		
					</tr>
					
					<tr>
						<td> Company Name</td>
						<td><span ><?php echo $row['cname'];?></span></td>		
					</tr><tr>
						<td> Address</td>
						<td><span><?php echo $row['address'];?></span></td>		
					</tr>
					<tr>
						<td> Mobile</td>
						<td><span><?php echo $row['mobile'];?></span></td>		
					</tr>
					
			</table>
		
		<?php
			}
		?>
				

	
		<div>
			<h3>Your Ordered List</h3>
			<table bordercolor="#999999" border="1">
				<tr style="background-color: rgba(0, 0, 128, .9); color: #fff;">
					<td align="center"><strong>Package Name<strong></td>
					<td align="center"><strong>Quantity</strong></td>
					<td align="center"><strong>Oredr Time</strong></td>
					<td align="center" ><strong>Order Date</strong></td>
					<td align="center" ><strong>Day Name</strong></td>
					
					
				</tr>
						
							
							<?php
								
								$query1=mysql_query("SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id where `order`.username='".$user."'");
								
								while($row1=mysql_fetch_array($query1))
								{
							?>
							<tr>
								<td><?php echo $row1['package_name'];?></td>
								<td><?php echo $row1['quantity'];?></td>
								<td><?php echo $row1['order_time'];?></td>
								<td><?php echo $row1['order_date'];?></td>
								<td><?php echo $row1['day_name'];?></td>
							</tr>
							<?php
								}
							?>
						</table>

</body>
</html>



<?php
}
?>