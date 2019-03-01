<!DOCTYPE html>
<html>
<head>
<title>Package</title>

</head>
<body>
<div class="main">
		<h1>Online Food Order</h1>
			
			
			<table>
				<tr>
					<td><a id="a01" href="index.php">Home:</a> </td>
					<td><a id="a01" href="contact.php">Contact Us</a></td>
					<td><a href="loginmodel.php">Login</a></td>
					<td><a href="regmodel.php">Register</a></td>
					<td><a href="search.php">SEARCH</a></td>
						
						
											
	        </tr>  
			</table> 

	
	<section class="list_item">
		<div class="container">
		<h3>Package List</h3>
			<div class="row">
				<div class="col-lg-12">
					<?php 
							include ('db.php');
							
							$query=mysql_query("SELECT * FROM package order by package_id desc");
							
								while($row=mysql_fetch_array($query))
						{
							
					?>
						<div>		
						<table>
							<tr>
							   <td><img style="height:316px; width:340px; border-radius:4px;" src="uploads/<?php echo $row['img'];?>"</img></td>
							</tr>
							<tr>
								 <td><a href="loginmodel.php"><?php echo $row['package_name'];?></a><td>
							</tr>
							<br>
						</table>
					</div>
					<?php
						}
					?>						
				</div>
			</div>
		</div>
	</section>	

<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
</div>

<div id="myModal2" class="modal fade" role="dialog">
</div>


<!-- <p><a href="logout.php" style="text-decoration:none;"><button type="button">Logout</button></a></p> -->

	


</body>
</html>


