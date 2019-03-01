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
	$q=mysql_query("SELECT * FROM day");
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Package</title>
 

</head>
<body>
	
		
		<div class="main">
		<h1>Online Food Order</h1>
			
			<div class="mainmenu">
			<table>
				<tr>
					<td><a id="a01"href="home_user.php">Home: </td>
					<td><a id="a01"href="user_package.php">Package: </td>
					<td><a id="a01"href="ordermodel.php">Order: </td>
						<td><a id="a01"href="user_profile.php">Profile</a></td>
						<td><a href="../logout.php" type="button" role="button" class="logOutStl">Logout</a></td>
						
						
											
	        </tr>  
			</table> 
			
			
			
	
	
	<section class="list_item">
		<div class="container">
			<h3> Package List </h3>
			<div class="row">
				<div class="col-lg-12">
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
								 <a href="show_package3.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>"><?php echo $row['package_name'];?></a>
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
