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
<title>Day Package</title>

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
			<h3> Package List By Day </h3>
			<div class="row">
				<div class="col-lg-12">
					<?php 
						
						$day_name=$_GET['day_name'];
						
						$query=mysql_query("SELECT * FROM package JOIN day ON package.package_id=day.package_id where day.day_name='".$day_name."'");		
							while($row=mysql_fetch_array($query))
							{
					?>
					
					<div>		
							<div class="col-lg-4" >
								<div >
								   <img style="width:340px; height:316px;" src="../uploads/<?php echo $row['img'];?>"></img>
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

<script>        
  	function getPackageName(pname){
  	 $.ajax({
          url: "show_package3.php?day_name=<?php echo $day_name;?>",
          type: "get",
          data: {package_id:pname},
          success: function(msg) {
             $('#myModal').html(msg);
             //alert(""+msg);

          }
      });
  }	
</script>

<!--	<section class="footer text-center" style="background:#fff">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="footerText">
						<p style="color:#000;padding: 20px 0"> <a target="_blank" href="http://www.geeksntechnology.com/">GNT</a> Application &copy; 2015-2016  All Right Reserved.</p>
						<div class="soc_boo">
							<a target="_blank" href="https://www.facebook.com/?_rdr=p"><i class="fa fa-facebook" style="  background: #3b5998 none repeat scroll 0 0;  border-radius: 4px;  color: #fff;  height: 26px;  padding-top: 5px;  width: 26px;"></i></a>
							<a target="_blank" href="http://www.skype.com/en/"><i class="fa fa-skype" style="  background: #009EE5 none repeat scroll 0 0;  border-radius: 4px;  color: #fff;  height: 26px;  padding-top: 5px;  width: 26px;"></i></a>
							<a target="_blank" href="https://twitter.com/?lang=en"><i class="fa fa-twitter"></i></a>
							<a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
-->

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