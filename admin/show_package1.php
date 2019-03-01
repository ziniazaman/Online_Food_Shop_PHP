<?php 
		$package_id=$_POST['package_id'];
		include ('db.php');		
?>
		
		<div class="modal-dialog" style="width:490px;">
			<!-- Modal content-->
			<div class="modal-content">		
					<?php
						$query0=mysql_query("SELECT package_name FROM package where package_id='".$package_id."'");
						while($row=mysql_fetch_array($query0))
					{
					?>
				<div class="modal-header" style="border-bottom:none;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<h4 class="modal-title" style="padding: 10px 0 0px 33px; text-transform: capitalize;font-size: 30px;"><?php echo $row['package_name'];?></h4>
				</div>
					<?php
					}
					?>
						
				<div class="modal-body" style="padding: 0 50px;">
					<h4 style="display: block; font-size: 20px; font-weight: normal">Item name: </h4>
						<?php
						$query1=mysql_query("SELECT item_name FROM item where package_id='".$package_id."'");
						while($row=mysql_fetch_array($query1))
						{
						?>
							<h4 style="display:block; margin-bottom: 7px;width: 235px;height: 42px;padding-left: 10px;font-size:18px; text-transform: capitalize; border:2px solid #ddd; border-radius: 4px;padding-top: 8px;"><?php echo $row['item_name'];?></h4>
						<?php
						}
						?>
				     
					<?php
					$query2=mysql_query("SELECT package_price FROM package where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query2))
						{
					?>
						<h4 style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px;margin-top: 26px">Price: </h4>
						<h4 style="border: 2px solid #ddd; border-radius: 4px; height:42px; padding-left:10px; width: 108px;padding-top:8px;"><?php echo $row['package_price'];?></h4>
					<?php
						}
					?>			
					<h4 style="font-size: 20px; font-weight: normal; margin-bottom: -10px;margin-top: 20px">Available Day: </h4>
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
					
					<?php
					$query4=mysql_query("SELECT time FROM package where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query4))
						{
					?>
						<h4 style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px;margin-top: 26px">Available Time: (before) </h4>
						<h4 style="border: 2px solid #ddd; border-radius: 4px; height:42px; padding-left:10px; width: 108px;padding-top:8px;"><?php echo $row['time'];?></h4>
					<?php
						}
					?>
					
				</div>
				<div class="modal-footer" style="border-top:none;">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				
			</div>
		</div>
				
