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
<title>Order List</title>
 
</head>
<body>
<h1>Online Food Order</h1>
			
			
			<table>
				<tr>
					<td><a id="a01" href="home_admin.php">Home</a></td>
					<td><a id="a02" href="admin_package.php">All Package</a></td>
					<td><a id="a02" href="create_package.php">Create Package</a></td>
					<td><a id="a01" href="orderlist.php">Order</a></td>
					<td><a href="../logout.php" type="button" role="button" class="logOutStl">Logout</a></td>
						
						
											
	        </tr>  
			</table> 
	<!--date search part-->

	
			
	
	
	
	
					<h3>Ordered Food List</h3>
					<div>
						<table border="1">
							<tr style="background-color: rgba(0, 0, 128, .9); color: #fff;">
								<th>Order ID</th>
								<th>Username</th>
								<th>Company Address</th>
								<th>Mobile No</th>
								<th>Package Name</th>
								<th>Quantity</th>
								<th>Oredr Time</th>
								<th>Order Date</th>
								<th>Day Name</th>
							</tr>
							<?php
							
								date_default_timezone_set('Asia/Dacca');
								$date = date('Y/m/d h:i:s a', time()); //with time
								$currentdate = date("Y-m-d",strtotime($date));
								//echo $currentdate;
								
								$query=mysql_query("SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username WHERE `order`.order_date='".$currentdate."'");
								if($query === FALSE) { 
									die(mysql_error()); // TODO: better error handling
								}
								//echo package_name;
								while($row=mysql_fetch_array($query))
								{
							?>
							<tr>
								<td><?php echo $row['order_id'];?></td>
								<td><?php echo $row['fname']." ".$row['lname'];?></td>
								<td><?php echo $row['address'];?></td>
								<td><?php echo $row['mobile'];?></td>
								<td><?php echo $row['package_name'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php echo $row['order_time'];?></td>
								<td><?php echo $row['order_date'];?></td>
								<td><?php echo $row['day_name'];?></td>								
							</tr>
							<?php
								}
							?>
						</table>
					
					<h2>Order Summary</h2>
						<?php 
							$query1=mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id WHERE `order`.order_date='".$currentdate."' GROUP BY `order`.package_id");
							while($row1=mysql_fetch_array($query1))
							{ 
						?>
							<p style="font-size: 20px;color:#b71c1c;margin-bottom: 20px"> Total Order of "<?php echo $row1['package_name'];?>" = <?php echo $row1['quantity'];?></p>
						<?php
							}
						?>
						<?php 
							$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` WHERE `order`.order_date='".$currentdate."'");
							while($row2=mysql_fetch_array($query2))
							{ 
						?>
							<p style="padding-top: 20px;font-size: 20px;color:#b71c1c;">So Total Order <span style="padding-left: 90px"><strong style="padding-right: 6px">=</strong><?php echo $row2['quantity'];?></span></p>
						<?php
							}
						?>						
</body>
</html>

<?php
}
?>