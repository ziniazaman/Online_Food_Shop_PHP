<!DOCTYPE html>
<html>
<head>
<title>Login Model PageS</title>

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
						
                    }
                  
                }

                  function passvalidate() {
                    var error2 = 'passerrorMessage';
                  var ob = 'passerrorMessage';
                    var passTextField = document.getElementById("passTextField");
                    if (passTextField.value == "") {
                        displayMessage("Password required",error2);
						
                    }
                    
                }
				function fnamevalidate() {
                    var error3 = 'fnameerrorMessage';
                  var ob = 'fnameerrorMessage';
                    var fnameTextField = document.getElementById("fnameTextField");
                    if (fnameTextField.value == "") {
                        displayMessage("First name required",error3);
						
                    }
                
                }
				function lnamevalidate() {
                    var error4 = 'lnameerrorMessage';
                  var ob = 'lnameerrorMessage';
                    var lnameTextField = document.getElementById("lnameTextField");
                    if (lnameTextField.value == "") {
                        displayMessage("Last name required",error4);
						
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
						
                    }
                   
				}
				
				function mobvalidate() 
				{

                    var error7 = 'moberrorMessage';
                    var error8 = 'moberrorMessage';
                    var ob = 'moberrorMessage';
                    var mobTextField = document.getElementById("mobTextField");
                    if (mobTextField.value == "") 
					{
                        displayMessage("Mobile Number Required ",error7);
						
                    }
					if(mobTextField.length!=15){
						
						displayMessage("Mobile Number is not set Correctly ",error8);
						return false;
						
						
					}
                   
				}

				
        </script>
</head>
<body>

<!-- Register Modal -->
<h1><a id="a01" href="index.php">Home</a></h1>
   
<form  name="myForm" onsubmit="return validateForm()" method="post" action="reg.php">
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