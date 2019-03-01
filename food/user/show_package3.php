
	
	<?php 
		$package_id=$_GET['package_id'];
		$day_name=$_GET['day_name'];
		include ('db.php');
		
		//echo $day_name;
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
					
					<?php
					$query3=mysql_query("SELECT time FROM package where package_id='".$package_id."'");
					while($row=mysql_fetch_array($query3))
					{
					?>
						<h4 style="display: block; font-size: 20px; font-weight: normal;margin-bottom: 11px;margin-top: 26px">Available Time: (before) </h4>
							<h4 style="border: 2px solid #ddd; border-radius: 4px; height:42px; padding-left:10px; width: 108px;padding-top:8px;"><?php echo $row['time'];?></h4>
					<?php
					
					$time=$row['time'];
					}
					?>
					<br>
					<?php
						date_default_timezone_set('Asia/Dacca');
						$day = strtolower(date('l')); //with time
						$date = date('Y/m/d h:i:s a', time()); //with time
						$currenttime = date("H:i",strtotime($date)); //without date
						//$day = date('l', $currenttime);
						//echo $day."<br/>".$currenttime;
						if($day_name==$day)
						{	
							if($currenttime > $time && $time!='00:00:00')
							{
								?>
								<p>
								<a class="ord_hover" href="#" type="button" onclick="showAlert()" role="button">Order Now</a>
								</p>
								<?php
							}
							

							
							if($currenttime < $time || $time=='00:00:00')
							{
								?>
								<p>
								<a class="ord_hover" href="order.php?package_id=<?php echo $package_id;?>&day_name=<?php echo $day_name;?>"  type="button" role="button">Order Now</a>
								</p>
							<?php
							}
							
						}
						else
						{
						?>
						<p>
						<a class="ord_hover" href="order.php?package_id=<?php echo $package_id;?>&day_name=<?php echo $day_name;?>"  type="button" role="button">Order Now</a>
					    </p>
						<?php
						}
						?>
					
				</div>
			</div>
		</div>
		
