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
<title>Package</title>
  
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
			
			
			<h3> Package List </h3>
			
					<?php 
						
						$query=mysql_query("SELECT * FROM package");
						
							while($row=mysql_fetch_array($query))
							{
					?>
						
					<div>		
						<div class="col-lg-4" >
							<div >
							   <img style="height:316px; width:340px; border-radius:4px;" src="../uploads/<?php echo $row['img'];?>"</img>
							</div>
							<div>
					            
					            <a href="update.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Update</a>  
					            <a href="delete.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>">Delete</a>  
							</div>
							<br>
						</div>
					</div>
					<?php
						}
					?>
				</div>
			</div> <!-- row end -->
		</div> <!-- Container End -->
	</section>
	
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
</div>




</body>
</html>

<?php
}
?>
