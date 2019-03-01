<?php

	$db_connect=mysqli_connect("localhost","root","");
        mysqli_select_db($db_connect,"food_order");
		
    $query = $_GET['q'];
	
	?>
	<table align="center" border="1">
		<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			
		</tr>
		</thead>
		<tbody>
		<?php
	$sql=mysqli_query($db_connect,"SELECT * FROM package WHERE package_name LIKE '%$query%'");
	$count=1;
while($result=mysqli_fetch_assoc($sql))
{
	$id=$result['package_id'];
	$name=$result['package_name'];
	
	?>
	
		
			<tr>
				<td><?=$id?></td>
				<td><?=$name?></td>
				
			</tr>
		
	<?php
	$count++;
//echo "<div>".$result['name']."</div>";
}
?>
</tbody>
</table>