
<?php
if(isset($_POST['submit']))
{ 
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	
	include ('db.php'); //chng db name
	
	$query=mysql_query("SELECT * FROM registration WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);
	echo "hello";
	if($numrows!=0)
	{
		while($row=mysql_fetch_assoc($query))
		{
			$dbusername=$row['username'];
			$dbpassword=$row['password'];
			$dbtype=$row['type'];
		
				if($user == $dbusername && $pass == $dbpassword)
				{
					session_start();
					$_SESSION['sess_user']=$user;
					if ($dbtype==1)
					{
						header("Location: admin/home_admin.php");
					}
					else
					{
						header("Location: user/home_user.php");
					}
						
			    }
				else
				{
					echo "<script>
					alert('Username & Password do not match!!');
					window.location.href='loginmodel.php';
					</script>";
					//echo "Username & Password do not match";
				}
		}
		}
			else{
				echo "<script>
					alert('Invalid Username & Password!!');
					window.location.href='loginmodel.php';
					</script>";
				//echo "Invalid Username & Password";
			}
			//echo "<br/>".$user."<br/>".$pass;
		}
	?>

</body>
</html>

