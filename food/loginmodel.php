<html>
<head>
    <title>LogIN form</title>
        <script type="text/javascript">
            
            function validate() 
			      {

                  unamevalidate();
                  passvalidate();
            
                   }
            

                function displayMessage(message,e) 
				{
                    var err = document.getElementById(e);
                    err.style.color = "red";
                    err.innerHTML = message;
                    err.style.visibility = 'visible';
                }

                function hide(ob) 
				{
                    document.getElementById(ob).style.visibility = 'hidden';
                }

        
                function unamevalidate() 
				{

                    var error1 = 'unameerrorMessage';
                    var ob = 'unameerrorMessage';
                    var unameTextField = document.getElementById("unameTextField");
                    if (unameTextField.value == "") {
                        displayMessage("required",error1);
                    }
                    else
                        return true;
                }

                function passvalidate() {
                    var error2 = 'passerrorMessage';
					var ob = 'passerrorMessage';
                    var passTextField = document.getElementById("passTextField");
                    if (passTextField.value == "") {
                        displayMessage("required",error2);
                    }
                    else
                        return true;
                }
				 
				
        </script>
  </head>
<body>
    <form action="login.php" method="POST">	
	<table>
         
            <tr>
               <td colspan="2"><center>LOG IN </center></td>
            </tr>
            <tr>
		        <td>User Name</td>
		        <td><input id="unameTextField" name="user" type="text" onclick="hide('unameerrorMessage')" placeholder="UserName"/></td>
                <td><span id="unameerrorMessage"></span></td>
            </tr>
	         <tr>
		        <td>Password</td>
		        <td><input id="passTextField" name="pass" type="password" onclick="hide('passerrorMessage')"placeholder="password" /></td>
                <td><span id="passerrorMessage"></span></td>
            </tr>
	       
		        <td colspan="2" align='right'><input type="submit" value="LogIN" name="submit" onclick="validate()" /></td>
	        </tr>
			</table>
      
    </form>
</body>
</html>
