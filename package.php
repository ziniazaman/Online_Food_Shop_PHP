<!DOCTYPE html>
<html>
<html>
	<head>
		<title>This is page title</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		
		<div class="main">
		 
		 <h1>Online Food Order</h1>
		 <div class="header">
				<img src="images/logo.jpg"/>
			</div>
			<div class="mainmenu">
			<table>
				<tr>
					<td><a href="index.php"><h1>Home:</h1></a> </td>
					<td><a href="loginmodel.php"><h1>Login:</h1></a></td><td></td>
					<td><a href="regmodel.php"><h1>Register:</h1></a></td><td></td>
					<td><a  href="contact.php"><h1>Contact Us:</h1></a></td><td></td>											
	        </tr> 
				 
				<tr>
				    <td><h1>Searce:</h1></td>
					</tr> 
					<tr> 
				     <td> </td>
				   </tr>
				   <tr>
					<td><h1><?php include("ajax.php") ?></h1></td>
				</tr>
			</table> 
			</div>

	
		<h3>Package List</h3>
			
					<?php 
							include ('db.php');
							$query=mysql_query("SELECT * FROM package order by package_id desc");
								while($row=mysql_fetch_array($query))
						{		
					?>		
						<table border="1">
							<tr>
							   <td><img style="height:316px; width:340px; border-radius:4px;" src="uploads/<?php echo $row['img'];?>"</img></td>
							</tr>
							<tr>
								 <td>
								 Name:<a href=""><?php echo $row['package_name'];?></a></br>Price:
								 <a href=""><?php echo $row['package_price'];?>tk</a></br>
								 <a href="loginmodel.php">ORDER</a>
								 </td>
							</tr>
							<br>
						</table>
					
					<?php
						}
					?>		
			
			<div class="footer">
				<p>&copy;Chines food Resturant</p>
			</div>
		</div>					

</body>
</html>


