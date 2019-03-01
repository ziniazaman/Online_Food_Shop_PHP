<?php 
		$package_id=$_POST['package_id'];
		include ('db.php');
		
		
		?>
		
		<div style="float: left;">
		
			<td>
				<?php
				$query0=mysql_query("SELECT package_name FROM package where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query0))
				{
				?>
					<tr><h3><?php echo $row['package_name'];?></h3></tr>
				<?php
				}
				?>
				
				
				<th>Item name: </th>
				<ol>
				<?php
				$query1=mysql_query("SELECT item_name FROM item where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query1))
				{
				?>
				 
					<li><?php echo $row['item_name'];?></li>
				
				<?php
				}
				?>
				</ol>
				
				<?php
				$query2=mysql_query("SELECT package_price FROM package where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query2))
				{
				?>
					<th>Price: </th>
					<tr><?php echo $row['package_price'];?></tr>
				<?php
				}
				?>
				<br>
				<br>
			</td>	
				<th>Available Day: </th>
				<tr>
			<td>
				<?php
				$query3=mysql_query("SELECT day_name FROM day where package_id='".$package_id."'");
				
				while($row=mysql_fetch_array($query3))
				{
				?>
					<br>
				    <?php 
					if($row['day_name']=="sunday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="saturday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="monday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="tuesday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="wednesday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="thursday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else if($row['day_name']=="friday")
					{
					?>

						<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
					
					else 
					{
					?>
						<input type="checkbox" name="day_name[]" disabled value="<?php echo $row['day_name'];?>"/> <?php echo $row['day_name'];?>
					<?php
					}
		
				}
				?>
			</td>	
			</tr>
			
			<p><a href="update.php?package_id=<?php echo $package_id;?>" style="text-decoration:none;"><button type="button">Update</button></a></p>

		</div>
		
