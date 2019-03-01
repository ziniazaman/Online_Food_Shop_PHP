<!DOCTYPE html>
<html>
<head>
<title>Reg PageS</title>

<script type="text/javascript">
				      
                function validateForm() 
        
		         {
					 if(document.myForm.user.value==""){
					 unamevalidate();
					 return false;
					 }
					 
					 if(document.myForm.fname.value==""){
				    fnamevalidate();
					return false;
					 }
					 if(document.myForm.lname.value==""){
			        lnamevalidate();
					return false;
					 }
					 if(document.myForm.pass.value==""){
                    passvalidate();
					return false;
					 }
					 if(document.myForm.cname.value==""){
					companyvalidate();
					return false;
					 }
					 if(document.myForm.address.value==""){
			        addressvalidate();
					return false;
					 }
					 if(document.myForm.mobile.value==""){
					mobvalidate();
					return false;
					 }
					 
					displayMessage();
					hide();
                   }

                function displayMessage(message,e) 
                {
                    var err = document.getElementById(e);
                    err.style.color = "red";
                    err.innerHTML = message;
                    err.style.visibility = 'visible';
					return false;
                }

                function hide(ob) 
				{
                    document.getElementById(ob).style.visibility = 'hidden';
					return false;
                }

        
                function unamevalidate() 
				{

                    var error1 = 'unameerrorMessage';
                    var ob = 'unameerrorMessage';
                    var unameTextField = document.getElementById("unameTextField");
                    if (unameTextField.value == "") {
                        displayMessage("User name required",error1);
						return false;
						
                    }
                  
                }

                  function passvalidate() {
                    var error2 = 'passerrorMessage';
                  var ob = 'passerrorMessage';
                    var passTextField = document.getElementById("passTextField");
                    if (passTextField.value == "") {
                        displayMessage("Password required",error2);
						return false;
                    }
                    
                }
				function fnamevalidate() {
                    var error3 = 'fnameerrorMessage';
                  var ob = 'fnameerrorMessage';
                    var fnameTextField = document.getElementById("fnameTextField");
                    if (fnameTextField.value == "") {
                        displayMessage("First name required",error3);
						return false;
                    }
                
                }
				function lnamevalidate() {
                    var error4 = 'lnameerrorMessage';
                  var ob = 'lnameerrorMessage';
                    var lnameTextField = document.getElementById("lnameTextField");
                    if (lnameTextField.value == "") {
                        displayMessage("Last name required",error4);
						return false;
                    }
             
                }
				
				function companyvalidate() 
				{

                    var error5 = 'companyerrorMessage';
                    var ob = 'companyerrorMessage';
                    var companyTextField = document.getElementById("companyTextField");
                    if (companyTextField.value == "") 
					{
                        displayMessage("Company Name Required",error5);
						return false;
                    }
                  
				}
				
				
				function addressvalidate() 
				{
				var error6 = 'addresserrorMessage';
                    var ob = 'addresserrorMessage';
                    var addressTextField = document.getElementById("addressTextField");
                    if (addressTextField.value == "") 
					{
                        displayMessage("Give your address is Required",error6);
						return false;
                    }
                   
				}
				
				function mobvalidate() 
				{

                    var error7 = 'moberrorMessage';
                    var ob = 'moberrorMessage';
                    var mobTextField = document.getElementById("mobTextField");
                    if (mobTextField.value == "") 
					{
                        displayMessage("Mobile Number Required ",error7);
						return false;
                    }
                   
				}

				
        </script>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
if(isset($_POST['submit'])) 
{
	
	$user = $_POST['user'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pass = md5($_POST['pass']);
	$cname = $_POST['cname'];
	$address =$_POST['address'];
	$mobile = $_POST['mobile'];
	
	
	$valid=1;
	$msg = "";
	if(empty($user)) {
		$valid=0;
		echo "Usear Name Can not be Empty!!'</br>";
					
		
	}
	if(empty($fname)) {
		$valid=0;
		echo "First Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($lname)) {
		$valid=0;
		echo "Last Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($pass)) {
		$valid=0;
		echo "Password  Can not be Empty!!'</br>";
		//echo "<div class='error'>Password Can not be empty</div><br>";
	}
	if(empty($cname)) {
		$valid=0;
		echo "Companny Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}if(empty($address)) {
		$valid=0;
		echo "Address  Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(empty($mobile)) {
		$valid=0;
		echo "Mobile Name Can not be Empty!!'</br>";
		//echo "<div class='error'>Name Can not be empty</div><br>";
	}
	if(!(preg_match("/^[+088|088][0-9]{1,15}$/", $mobile))) {
		$valid=0;
		echo "Mobile Number is not correctly!!'</br>";
		//echo "<div class='error'>Please enter a valid username</div><br>";
	}
	if(!(preg_match("/^[A-Za-z][A-Za-z0-9]{5,21}$/", $user))) {
		$valid=0;
		echo "User Name is not correctly!!'</br>";
		//echo "<div class='error'>Please enter a valid username</div><br>";
	}
	
	if($valid == 1) 
	{
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
					window.location.href='regmodel.php';
					</script>";
					
				//header("Location: home.php");
			}
			
	}
}
else{
 //echo "FillUp PBLM ";
	//header("Location: regmodel.php");
}
}
} 


?>
 <form   onsubmit="return validateForm()" method="post" action="">
     <table> 
     <tr></tr>
     <tr>
     <td>Username</td>
     <td><input id="unameTextField" name="user"  type="text" onclick="hide('unameerrorMessage')" /></td>
     <td><span id="unameerrorMessage" ></span></td>
     </tr>
     
     <tr>
     <td>First name</td>
     <td><input id="fnameTextField" name="fname" type="text" onclick="hide('fnameerrorMessage')"/></td>
     <td><span id="fnameerrorMessage"></span></td>
     </tr>
     <tr>
     <td>Last name</td>
     <td><input id="lnameTextField" name="lname" type="text" onclick="hide('lnameerrorMessage')"/></td>
     <td><span id="lnameerrorMessage"></span></td>
     </tr>
	 <tr>
	 <td>password</td>
     <td><input id="passTextField" name="pass" type="password" onclick="hide('passerrorMessage')" /></td>
     <td><span id="passerrorMessage"></span></td>
      </tr>
     <tr>
		<td>Company  </td>
		 <td><input id="companyTextField" name="cname" type="text" onclick="hide('companyerrorMessage')" /></td>
         <td><span id="companyerrorMessage"></span></td></td>
	   <tr>
		<td>Address: </td>
		 <td><input id="addressTextField" name="address"  type="text" onclick="hide('addresserrorMessage')" /></td>
          <td><span id="addresserrorMessage"></span></td></td>
	    </tr>
	  <tr>
		<td>Mobile NO::</td>
		 <td><input id="mobTextField" name="mobile" type="text" onclick="hide('moberrorMessage')" /></td>
         <td><span id="moberrorMessage"></span></td></td>
	      </tr>
        
     
     <td colspan="2" align='right'><input type="submit" name="submit" value="Get Started"/></td>
     </tr>
     
  </table>
</form> 
</body>
</html>
	
	
	
	