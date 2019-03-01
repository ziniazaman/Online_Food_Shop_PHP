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
		<title>Package Page</title>
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
			<h2> Package List By Day: </h2></br>
			
					<?php 
						
						$day_name=$_GET['day_name'];
						
						$query=mysql_query("SELECT * FROM package JOIN day ON package.package_id=day.package_id where day.day_name='".$day_name."'");		
							while($row=mysql_fetch_array($query))
							{
					?>
					
							
							<table border="1">
								<tr >
								<td>
								   <img style="width:340px; height:316px;" src="../uploads/<?php echo $row['img'];?>"></img>
								</td>
								</tr>
								<tr >
								<td>
								<a href="show_package3.php?package_id=<?php echo $row['package_id'];?>&day_name=<?php echo $row['day_name'];?>"><?php echo $row['package_name'];?></a>
							   </td>
								</tr>
							<br>
						</table>
					
					<?php
						}
					?>
<script>        
  	function getPackageName(pname){
  	 $.ajax({
          url: "show_package3.php?day_name=<?php echo $day_name;?>",
          type: "get",
          data: {package_id:pname},
          success: function(msg) {
             $('#myModal').html(msg);
             alert(""+msg);

          }
      });
  }	
</script>

</body>
</html>

<?php
}
?>
<script>
function showAlert()
{
	alert("You have to order before Available Time");
	window.location.href='day.php?day_name=<?php echo $day_name; ?>';
}
</script>