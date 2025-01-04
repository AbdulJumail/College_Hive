<?php
include 'config.php';
$admin = new Admin();



$lid = $_SESSION['lid'];

// $fid=$_GET['fid'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/pitnik/chat-messenger.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:28:35 GMT -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>College Hive</title>
	<link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

	<link rel="stylesheet" href="css/main.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">

	<style>
		#scrollable-div {
  /* Set a fixed height and width for the div */
  height: 600px;
  width: 300px;
  
  /* Add overflow property with a value of "auto" or "scroll" */
  overflow: auto;
}

#sticky-div {
  position: sticky;
  top: 0;
}


	</style>

</head>

<body style="overflow:hidden">

	<div class="theme-layout">

		<?php
		include 'navbar.php';
		?><!-- topbar -->

		<section style="height: 200px;">
			<div class="gap2 no-gap gray-bg" style="height: 600px;">
				<div class="container-fluid no-padding" style="height:300px">
					<div class="row" >
						<div class="col-lg-12" >
							<div class="message-users" style="height: 600px;">
								<div class="message-head">
									<h4>Chat Messages</h4>

								</div>

								<div class="mesg-peple">
									<ul class="nav nav-tabs nav-tabs--vertical msg-pepl-list">
										<?php
										$stmt = $admin->ret("SELECT * FROM `followers` INNER JOIN `profile` ON profile.l_id=followers.user_id WHERE `user_id`='$lid' ");
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											$flid = $row['following_id'];
											$stmt1 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$flid' ");
											while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
												$flllid = $row1['l_id'];
												$path = "";
												if ($flllid == "1") {
													$path = "admin/controller/" . $row1['img'];
												} else {
													$path = "controller/" . $row1['img'];
												}
										?>
												<li class="nav-item ">
													<a href="chatpage.php?flid=<?php echo $flid ?>">
														<figure><img src="<?php echo $path; ?>" alt="" style="width: 50px;height:40px">
															<span class=""></span>
														</figure>
														<div class="user-name">
															<h6 class=""><?php echo $row1['username'] ?></h6>
															<!-- <span>you send a video - 2hrs ago</span> -->
														</div>

													</a>
												</li>
										<?php }
										} ?>


									</ul>
								</div>
							</div>
							<?php
							if (isset($_GET['flid'])) {
								$fllid = $_GET['flid'];
							?>
								<div class="tab-content messenger">

									<div class="tab-pane active fade show ">
										<div class="row merged" style="width:1400px" id="scrollable-div">
											<div class="col-lg-12">
												<div class="mesg-area-head" style="height: 50px;margin-top:20px" id="sticky-div">
													<div class="active-user" style="height: 50px;">
														<?php
														$stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$fllid'");
														while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
														?>
															<figure><img src="controller/<?php echo $row2['img'] ?>" alt="" style="width:40px;height:35px;object-fit:cover">
																<span class=""></span>
															</figure>
															<div>
																<h6 class="unread"><?php echo $row2['username'] ?></h6>
																<span></span>
															</div>
														<?php } ?>
													</div>

												</div>
											</div>

											<div class="col-lg-8 col-md-8" >
												<div class="mesge-area" style="height: 200px;">
													<ul class="conversations">
														<?php
														$rowmerge = array();
														$stmt4 = $admin->ret("SELECT * FROM `chat` INNER JOIN `profile` ON profile.l_id=chat.from_id WHERE `from_id`='$fllid' AND `to_id`='$lid'");
														while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
															$rowmerge[] = $row4['chat_id'];
														}

														$stmt3 = $admin->ret("SELECT * FROM `chat` INNER JOIN `profile` ON profile.l_id=chat.from_id WHERE `from_id`='$lid' AND `to_id`='$fllid'");
														while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
															$rowmerge[] = $row3['chat_id'];
														}
														sort($rowmerge);

														foreach ($rowmerge as $key => $value) {
															$stmtcd = $admin->ret("SELECT * FROM `chat` INNER JOIN `profile` ON profile.l_id=chat.from_id WHERE chat_id=" . $value);
															$rcd = $stmtcd->fetch(PDO::FETCH_ASSOC);
															if ($rcd['from_id'] == $lid) {
														?><li class="me">
																	<figure><img src="controller/<?php echo $rcd['img'] ?>" alt="" style="width: 50px;height:30px;object-fit:cover"></figure>
																	<div class="text-box">
																		<p><?php echo $rcd['message'] ?></p>
																		<span><i class="ti-check"></i><i class="ti-check"></i> 2:35PM</span>
																	</div>
																</li>
															<?php } else {
															?>
																<li>
																	<figure><img src="controller/<?php echo $rcd['img'] ?>" alt=""></figure>
																	<div class="text-box">
																		<p><?php echo $rcd['message'] ?></p>
																		<span><i class="ti-check"></i><i class="ti-check"></i> 2:32PM</span>
																	</div>
																</li>
														<?php
															}
														} ?>

													</ul>
												</div>
												<div class="message-writing-box" id="sticky-div" style="margin-top:-200px">
													<form action="controller/chat.php" method="post">
														<div class="text-area">
															<input type="text" name="message" placeholder="write your message here..">
															<input type="hidden" name="fid" value="<?php echo $fllid ?>">
															<button type="submit" name="send"><i class="fa fa-paper-plane-o"></i></button>
														</div>
													</form>
												</div>
											</div>

										</div>
									</div>



								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- content -->



	</div>


	<!-- audio call popup -->

	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/chat-messenger.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:28:53 GMT -->

</html>