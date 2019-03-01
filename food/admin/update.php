<?php 
		$package_id=$_GET['package_id'];
		include ('db.php');
		
		if(isset($_POST['update']))
		{ 
			//$package_name = $_POST['package_name'];
			$price = $_POST['package_price'];
			//echo $price;
			$sql1 = "UPDATE package SET package_price=".$price." WHERE package_id=".$package_id."";
			$query=mysql_query($sql1);
			
			
			 header('location:admin_package.php');
		}
		
		//while($row=mysql_fetch_array($query))
			
		?>




<form action="update.php?package_id=<?=$package_id?>" method="post" style="padding: 20px 58px" onsubmit="return updateChack()">
			<?php
				$query0=mysql_query("SELECT package_name FROM package where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query0))
				{
			?>
				<h3 style="font-size: 30px;text-transform: capitalize;"><?php echo $row['package_name'];?></h3>
			<?php
				}
			?>
			
			<label for="" style="display: block; font-size: 20px; font-weight: normal">Item name:</label>
			<?php
			$query1=mysql_query("SELECT item_name FROM item where package_id='".$package_id."'");
			while($row=mysql_fetch_array($query1))
			{
			?>
				
				 <input type="text" name="item_name" readonly value="<?php echo $row['item_name'];?>" style="display:block; margin-bottom: 7px;width: 235px;height: 42px;padding-left: 10px;font-size:18px; text-transform: capitalize; border:2px solid #ddd; border-radius: 4px"/>
				 <br/>
				
				
			<?php
				}
			?>
			
			<?php
				$query2=mysql_query("SELECT package_price FROM package where package_id='".$package_id."'");
				while($row=mysql_fetch_array($query2))
				{
			?>
				<label for="" style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px">Price:</label>
				 <input id="uCheck" type="number" name="package_price" min="1" max="999999" value="<?php echo $row['package_price'];?>" style="border: 2px solid #ddd; border-radius: 4px; height:42px; padding-left:10px; width: 108px;"/>
				 <br/>
			<?php
				}
			?>	
			<label style="display: block; font-size: 20px; font-weight: normal; margin-bottom: 11px">Available Day: </label>				
			<?php
				$query3=mysql_query("SELECT day_name FROM day where package_id='".$package_id."'");
				$day=array('saturday','sunday','monday','tuesday','wednesday','thursday','friday');
				$day_available=array();
				while($row=mysql_fetch_array($query3))
				{
					 
					array_push($day_available,$row['day_name']);
					
				}
				$chk=false;
				foreach($day as $d)
				{
					foreach($day_available as $d_available)
					{
						if($d==$d_available)
						{
							$chk=true;
							break;
						}
						else
						{
							$chk=false;
						}
					}
				if($chk)
				{
			?>
					<input type="checkbox" name="day_name[]" disabled checked value="<?php echo $d; ?>"/> <?php echo $d; ?>
				<?php
				}
				else
				{
				?>
					<input type="checkbox" name="day_name[]" disabled value="<?=$d?>"/> <?=$d?>
				<?php
				}
			}				
			?>				
				<input class="btn_hov" type="submit" name="update" value="Update" style="border: 2px solid #96D472;border-radius: 4px; height:42px; width: 108px; font-size: 17px; margin-top: 20px; display:block;background-color: #96D472;color: #fff"/>
			<br/>
		</form>	
			
	</div>
</div>