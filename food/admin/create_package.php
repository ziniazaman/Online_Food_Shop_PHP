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
					<td><a  href="home_admin.php">Home</a></td>
					<td><a  href="admin_package.php">All Package</a></td>
					<td><a href="orderlist.php">Order</a></td>
					<td><a href="../logout.php" type="button" role="button" class="logOutStl">Logout</a></td>
						
						
											
	        </tr>  
			</table> 
				
	
	<br />
	<br />
	              <form action="" method="POST" onsubmit="return checkFormData()" enctype="multipart/form-data">
									<label>Package Name:</label>
									<input id="package_name" type="text" name="package_name" />
									<br/>
									<br/>
									<label>Item Name:</label>
									<input id="item_name" type="text" name="item_name[]" />
									
									
									
									<br/>
									<br/>
									<br/>
									<label>Price:</label>
									<input id="package_price" type="number" name="package_price" min="1" max="999999" style="width:180px; height:35px;" />
									<br/>
									<br/>
									
									
									<label>Image:</label>
									<input id="file" type="file" name="file" style="margin-bottom: 12px; height: 37px; width: 186px; outline: none"/>
									<br/>
									<br/>
									<label>Available Time:</label>
									
									
										<input id="time" data-format="HH:mm:ss" type="text" name="time"></input>
										<br/>
									<br/>
									
									<label>Available Day:</label> 
									<input type="checkbox" name="day_name[]" value="saturday"/> Saturday 
									<input type="checkbox" name="day_name[]" value="sunday"/> Sunday 
									<input type="checkbox" name="day_name[]" value="monday"/> Monday 
									<input type="checkbox" name="day_name[]" value="tuesday"/> Tuesday 
									<input type="checkbox" name="day_name[]" value="wednesday"/> Wednesday 
									<input type="checkbox" name="day_name[]" value="thursday"/> Thursday 
									<input type="checkbox" name="day_name[]" value="friday"/> Friday</td>
									<br>
								
									
									<input id="checkBtn" type="submit" name="submit" value="Create Packge" style="margin-top: 15px; width: 144px; height: 44px; background-color: rgba(106, 194, 54, .7); border:none; border-radius: 5px; font-size: 17px;color: #fff; font-weight: 600" /> <br><br><br>
								</tr>
							</table>
						</form>					
				

<?php
	if(isset($_POST['submit']))
	{ 
		
		
		$package_name = trim($_POST['package_name']);
		$price = trim($_POST['package_price']);
		$tmp_time = trim($_POST['time']);
		if(!empty($tmp_time))
		{
			$time=date ('H:i:s',strtotime($tmp_time));
		}
		else 
		{
			$time="00:00:00";
		}
		
		
		$file = time($_FILES["file"]["name"]);
		$new_file_name=$file.'.png';
		//echo $new_file_name;
		
		$target_dir = "../uploads/";
		$target_file = $target_dir .$new_file_name;
		$uploadOk = 1;
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["file"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "<script>alert('File is not an image.');</script>";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) 
		{
			echo "<script>alert('Sorry, file already exists.');</script>";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["file"]["size"] > 2097152)
		{
			echo "<script>alert('Sorry, your file is too large.');</script>";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo "<script>alert('Sorry, your file was not uploaded.');</script>";
		
		// if everything is ok, try to upload file
		} 
		else 
		{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
			{
				echo "<script>alert('Package is Created');</script>";
			}
			else 
			{
				echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
			}
	    
			$sql1 = "INSERT into package VALUES ('','".$package_name."',".$price.",'".$new_file_name."','".$time."')";
			$query=mysql_query($sql1);
			
			$last_id =  mysql_insert_id();
			foreach($_POST['day_name'] as $day_name)
			{
				$sql3 = "INSERT into day VALUES ('','".trim($day_name)."',".$last_id.")";
				$query=mysql_query($sql3);
			}
			
			foreach($_POST['item_name'] as $item_name)
			{
				if(!empty($item_name)||($item_name!=NULL) )
				{
					$sql2 = "INSERT into item VALUES ('','".trim($item_name)."',".$last_id.")";
					$query=mysql_query($sql2);
					header('location:admin_package.php');
				}
			}
		}
		
	}	
?>



</body>
</html>


<?php
}
?>
