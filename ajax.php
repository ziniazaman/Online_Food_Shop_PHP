
<html>

<form action=""> 
<input type="text" onkeyup="showCustomer(this.value)"/>
</form>
<br>
<div id="txtHint"></div>

<script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getresp.php?q="+str, true);
  xhttp.send();
}
</script>

</body>
</html>