
<?php

if(isset($_POST['submit']))
{ 
	$user = trim($_POST['user']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$pass = trim(md5($_POST['pass']));
	$cname = trim($_POST['cname']);
	$address = trim($_POST['address']);
	$mobile = trim($_POST['mobile']);
	include ('db.php');   //chng
	
	$query=mysql_query("SELECT * FROM registration WHERE username='".$user."'");
	$numrows=mysql_num_rows($query);
	if($numrows==0)
		{
			$sql = "INSERT into registration(username, fname, lname, password, cname, address, mobile, type) VALUES ('".$user."','".$fname."','".$lname."','".$pass."','".$cname."','".$address."','".$mobile."',0)";
				
			$result=mysql_query($sql);
				
			if($result)
			{
				echo "<script>
					alert('Registration Successful!!');
					window.location.href='index.php';
					</script>";
				
				
			   //header("Location: home.php");
			}
			else
			{
				echo "<script>
					alert('Registration Fail!!!');
					window.location.href='index.php';
					</script>";
					
				//header("Location: home.php");
			}
			
		}
	else
		{
			echo "<script>
					alert(' From Fillup Problem created! Please try again with another one.');
					window.location.href='regmodel.php';
					</script>";
			//echo "That username already exits! Please try again with another one.";
		}
	
		
	
} 


?>

</body>
</html>
	
	
	
	