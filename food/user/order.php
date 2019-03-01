<?php
session_start();
if(!isset($_SESSION["sess_user"]) || $_SESSION['sess_user']=='admin')
{
	header("location:index.php");
} 
else{
	$package_id=$_GET['package_id'];
	$day_name=$_GET['day_name'];
	//echo $day_name;
	
	include ('db.php');
	//$user=$_SESSION['sess_user'];
	
	//echo "<br/>".$user."<br/>".$fname;
	//$query=mysql_query("SELECT * FROM registration where username='".$user."'" );
	
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
					<td><a id="a01"href="user_package.php">Package: </td>
					<td><a id="a01"href="ordermodel.php">Order</a></td>
					<td><a id="a01"href="user_profile.php">Profile</a></td>
					<td><a href="../logout.php" type="button" role="button" class="logOutStl">Logout</a></td>						
						
											
	        </tr>  
			</table> 
			

	
						<h3 > Order Food </h3>	
						<form action="" method="POST"  onsubmit="return quantityChack()">
						<table>
							<tr>
							    <td><label>Quantity:</label></td>
								<td><input id="qChack" type="number" name="quantity" min="1" max="500" /></td>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Order"/></td>
							</tr>
							</table>
						</form>
</div>						
					
	
<script>
 function quantityChack(){
	 if(document.getElementById('qChack').value == ""){
		alert('Please enter a number');
		document.getElementById('qChack').style.borderColor = "red";
		return false;
	 } else{
		 alert('Your Order Successful');
		// header('location:home_user.php');
		 window.location.href='home_user.php';
	 }
 }
</script>
	
</div>
</body>
</html>


	<?php
		if(isset($_POST['submit']))
		{ 
		
			
			$username = $_SESSION["sess_user"];
			$quantity = $_POST['quantity'];
			date_default_timezone_set('Asia/Dacca');
			$date = date('Y/m/d h:i:s a', time()); //with time
			$currentdate = date("Y-m-d",strtotime($date));
			$currenttime = date("H:i:s",strtotime($date)); //without date
			
			$company = "SELECT cname FROM registration WHERE username='".$username."'";
			$row=mysql_query($company);
			$cname=mysql_fetch_array($row);
			$cname= $cname['cname'];
			
			$sql="insert into `order` values('','".$username."','".$cname."',".$package_id.",".$quantity.",'".$day_name."','".$currentdate."','".$currenttime."')";
			$query=mysql_query($sql);
		}	
	?>
<?php
}
?>



