<?php
$admin=new Admin();
$lid=$_SESSION['lid'];
?>

<div class="topbar stick">
	<div class="logo">
		<a title="" href="index.php"><i class="fa fa-graduation-cap" aria-hidden="true" style="margin-left: 45px;font-size:30px;margin-bottom:-13px;color:white"></i>
			<h5 style="color:white">College
				-Hive</h5>
		</a>
	</div>
	<div class="top-area">

		<div class="top-search">
			<form action="searchpeople.php" method="post" class="">
				<input id="searchp" name="searchp" type="text" placeholder="Search People">
				<button id="searchbtn" type="submit" data-ripple><i class="ti-search"></i></button>
			</form>
		</div>
		<div class="page-name">
			<!-- <span>Newsfeed</span> -->
		</div>
		<ul class="setting-area">
			<a href="index.php" ><i class="fa fa-home" style="font-size:22px;color:white"></i></a>
			
			<li>
				<a href="#" title="Following Requests" data-ripple="">
				<?php
						$stmt5=$admin->ret("SELECT * FROM `follow_notification` INNER JOIN `followers` ON followers.fl_id=follow_notification.f_id   WHERE followers.following_id='$lid' AND `fn_status`='new'");
						$num5=$stmt5->rowCount();
						?>
					<i class="fa fa-user"></i><em class="bg-red"><?php echo $num5 ?></em>
				</a>
				<div class="dropdowns">
					<span><?php echo $num5 ?> New Requests </span>
					<ul class="drops-menu">
						<?php
						$stmt1=$admin->ret("SELECT * FROM `follow_notification` INNER JOIN `followers` ON followers.fl_id=follow_notification.f_id  WHERE followers.following_id='$lid' AND follow_notification.fn_status='new'");
						$num=$stmt1->rowCount();
					
						while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
							$uid=$row1['user_id'];
							$stmt4=$admin->ret("SELECT * FROM `profile` WHERE `l_id`='$uid'");
							while($row4=$stmt4->fetch(PDO::FETCH_ASSOC)){
						?>
						<li>
							<div>
								<figure>
									<img src="controller/<?php echo $row4['img'] ?>" alt="" style="width: 50px;height:50px">
								</figure>
								<div class="mesg-meta">
									<h6><a href="about.php?lid=<?php echo $uid ?>" title=""><?php echo $row4['username'] ?></a></h6>
									<span> started following you.</span>
									
								</div>
								<div class="add-del-friends">
									
									<a href="controller/clearnotification.php?fnid=<?php echo $row1['fn_id'] ?>" title=""><i class="fa fa-trash"></i></a>
								</div>
							</div>
						</li>
						<?php }  }  ?>
					</ul>
					<!-- <a href="#" title="" class="more-mesg">View All</a> -->
				</div>
			</li>
			<li>
				<?php
					$stmt7=$admin->ret("SELECT * FROM `notification` WHERE `n_status`='new'");
					$num7=$stmt7->rowCount();
				?>
				<a href="#" title="Notification" data-ripple="">
					<i class="fa fa-bell"></i><em class="bg-purple"><?php echo $num7 ?></em>
				</a>
				<div class="dropdowns">
					<span><?php echo $num7 ?> New Notifications </span>
					<ul class="drops-menu">
						<?php
						$stmt6=$admin->ret("SELECT * FROM `notification` WHERE `n_status`='new'");
						while($row6=$stmt6->fetch(PDO::FETCH_ASSOC)){
						?>
						<li>
							
								
								<div class="mesg-meta">
									<h6><?php echo $row6['n_title'] ?></h6>
									
									<i class="fa fa-calendar" aria-hidden="true"><?php echo $row6['n_date'] ?></i>
								</div>
							</a>
						</li>
						<?php } ?>
						
					</ul>
					<a href="notification.php" title="" class="more-mesg">View All</a>
				</div>
			</li>
			
				<a href="feedgallery.php" title="Feed" data-ripple=""><i class="fa fa-address-card" aria-hidden="true" style="color:white;font-size:20px;margin-left:20px"></i></a>
				
			


		</ul>
		<div class="user-img">
			<?php
			$lid = $_SESSION['lid'];
			$stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
			$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
			$num = $stmt2->rowCount();
			if ($num == 0) {
				$stmt3 = $admin->ret("SELECT * FROM `login` WHERE `l_id`='$lid'");
				$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
			?>
				<h5><?php echo $row3['name'] ?></h5>
				<?php } else { ?>
					<h5><?php echo $row2['username'] ?></h5>
					<img src="controller/<?php echo $row2['img'] ?>" alt="" style="width:50px;height:50px;object-fit:cover">
				<span class=""></span>
				<?php } ?>
				
			
			<div class="user-setting" >

				
				<ul class="log-out">
					<li><a href="myprofile.php" title=""><i class="ti-user"></i> My profile</a></li>

					<li><a href="logout.php" title=""><i class="ti-power-off"></i>log out</a></li>
				</ul>
			</div>
		</div>

	</div>
	<!-- nav menu -->
</div>