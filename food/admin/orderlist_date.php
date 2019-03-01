
		<?php 
				$from=$_POST['from_date'];
				$to=$_POST['to_date'];
				$day=$_POST['day'];
				date_default_timezone_set('Asia/Dacca');
				$date = date('Y/m/d h:i:s a', time()); //with time
				$currentdate = date("Y-m-d",strtotime($date));
				
				include ('db.php');
				
				if($from!="" && $to!="" && $day!="")
				{
					$sql = "SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username where `order`.order_date BETWEEN '".$from."' AND '".$to."' AND day_name='".$day."'";
					$result=mysql_query($sql);
					
					$query1 = mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id where `order`.order_date BETWEEN '".$from."' AND '".$to."' AND day_name='".$day."' GROUP BY `order`.package_id");
					
					$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` where `order`.order_date BETWEEN '".$from."' AND '".$to."' AND day_name='".$day."'");
				}
				
				else if($from!="" && $to!="" && $day=="")
				{
					$sql = "SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username where `order`.order_date BETWEEN '".$from."' AND '".$to."'";
					$result=mysql_query($sql);
					
					$query1 = mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id where `order`.order_date BETWEEN '".$from."' AND '".$to."' GROUP BY `order`.package_id");
					
					$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` where `order`.order_date BETWEEN '".$from."' AND '".$to."'");
				}
				
				else if($from=="" && $to=="" && $day!="")
				{
					
					$sql = "SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username where day_name='".$day."'";
					$result=mysql_query($sql);
					
					$query1 = mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id where day_name='".$day."' GROUP BY `order`.package_id");
					
					$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` where day_name='".$day."'");
				}
				else if($from=="" && $to=="" && $day=="")
				{
					$sql="SELECT * FROM `order` inner JOIN package ON `order`.package_id=package.package_id inner JOIN registration ON `order`.username=registration.username WHERE `order`.order_date='".$currentdate."'";
					$result=mysql_query($sql);
					 
					$query1=mysql_query("SELECT package.package_name,sum(quantity) as quantity FROM `order` inner JOIN package ON `order`.package_id=package.package_id WHERE `order`.order_date='".$currentdate."' GROUP BY `order`.package_id");
					
					$query2=mysql_query("SELECT sum(quantity) as quantity FROM `order` WHERE `order`.order_date='".$currentdate."'");
				}
						
						
			?>	
					
	<section class="foodOrderListDel">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h3 style="text-align:center;font-family: 'Lobster', cursive;font-size:34px; font-weight: bold;color:#2E2881; margin-bottom: 28px; padding-left: 156px">Ordered Food List</h3>
					<div>
						<table class="table table-bordered">
							<tr style="background-color: rgba(0, 0, 128, .9); color: #fff;">
								<th>Order ID</th>
								<th>Username</th>
								<th>Company Address</th>
								<th>Mobile No</th>
								<th>Package Name</th>
								<th>Quantity</th>
								<th>Oredr Time</th>
								<th>Order Date</th>
								<th>Day Name</th>
							</tr>
							<?php								
								//if($result === FALSE) { 
									//die(mysql_error()); // TODO: better error handling
								//}
								//echo package_name;
								while($row=mysql_fetch_array($result))
								{
							   ?>
								<tr id=''>
								<td><?php echo $row['order_id'];?></td>
								<td><?php echo $row['fname']." ".$row['lname'];?></td>
								<td><?php echo $row['address'];?></td>
								<td><?php echo $row['mobile'];?></td>
								<td><?php echo $row['package_name'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php echo $row['order_time'];?></td>
								<td><?php echo $row['order_date'];?></td>
								<td><?php echo $row['day_name'];?></td>									
							</tr>
							<?php
								}
							?>								
						</table>
					</div>				
				</div>
				
				<div class="col-lg-4 col-lg-offset-2">
					<div class="selDay">
						<h2 style="text-align:center;font-family: 'Lobster', cursive;font-size:34px; font-weight: bold;color:#2E2881; margin-bottom: 28px">Order Summary</h2>
						<div class="quantity" style=" text-align: left;width: 360px; position:relative; font-size: 20px color: #dc143c;margin-left: 50px">	
							<?php
								while($row1=mysql_fetch_array($query1))
								{ 
							?>
								<p style="font-size: 20px;color:#b71c1c;margin-bottom: 20px"> Total Order of "<?php echo $row1['package_name'];?>" = <?php echo $row1['quantity'];?></p>
							<?php
								}
							?>
							<?php 
								while($row2=mysql_fetch_array($query2))
								{ 
							?>
								<p style="padding-top: 20px;font-size: 20px;color:#b71c1c;">So Total Order <span style="padding-left: 90px"><strong style="padding-right: 6px">=</strong><?php echo $row2['quantity'];?></span></p>
							<?php
								}
							?>
						</div> 									
					</div>
				</div>
			</div>
		</div>
	</section>

								 
					
