<?php
include 'config.php';
$admin = new Admin();

$id = $_SESSION['lid'];
?>

<!DOCTYPE html>
<html lang="en">



<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Pitnik Social Network Toolkit</title>
	<link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

	<link rel="stylesheet" href="css/main.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	 <!-- Include Cropper.js library -->
	 <link rel="stylesheet" href="css/cropper.css">
  <script src="js/cropper.js"></script>

</head>

<body>

	<div class="theme-layout">

		<!-- responsive header -->

		<?php
		include 'navbar.php';
		?><!-- topbar -->

		<?php
		include 'rightsidebar.php';
		?><!-- right sidebar user chat -->

		<?php
		include 'leftsidebar.php';
		?><!-- left sidebar menu -->

		<section>
			<div class="gap2 gray-bg">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="row merged20" id="page-contents">
								<div class="user-profile">
									<figure>


										<img src="images/clgbg.jpg" alt="" style="height: 300px;object-fit:cover;overflow:hidden;">

										<ul class="profile-controls">
											<a href="editprofile.php" title="" class="btn btn-info">Update Profile</a> 
										</ul>

									</figure>

									<div class="profile-section">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <div class="profile-author">
                                                    <?php
                                                    $stmt = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");

                                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <div style="height: 250px;width:250px;margin-top:-100px">
                                                        <img alt="no profile image" src="controller/<?php echo $row['img'] ?>" style="height: 200px;width:200px;object-fit:cover;overflow-hidden:hidden;border-radius:100px">
                                                        <label >
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter1"><i class="fa fa-pencil" style="font-size: 22px;color:black"></i>Change DP</a>

                                                        </label>
                                                    </div>
                                                    <!-- Modal -->
															<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLongTitle">Change your profile picture.</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<div style="display: flex;gap:15px">
																		<i class="fa fa-camera-retro" style="font-size: 22px;color:blue"></i>
																			<h6>Upload Image</h6>
																			</div>
																			
																<form action="controller/editprofile.php" method="POST" enctype="multipart/form-data">
																		<input type="file"  class="form-control" accept="image/*" name="pimg" onchange="handleDPChange(event)" required>
                                                                        <div id="imageContainer"></div>
                                                                        <input type="hidden" name="croppedImage" id="croppedImageInput">
																		</div>
																		<div class="modal-footer">
																			
																			<button type="submit" name="editdp" class="btn btn-primary">Save changes</button>
																		</div>
																		</form>
																	</div>
																</div>
															</div>

													<div class="author-content">
                                                        <?php
                                                        $stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");
                                                        $num = $stmt2->rowCount();
                                                        if ($num == 0) {
                                                            $stmt3 = $admin->ret("SELECT * FROM `login` WHERE `l_id`='$id'");
                                                            $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                                        ?>

                                                            <a class="h4 author-name" style="color: black;"><?php echo $row3['name'] ?></a>
                                                        <?php  } else {
                                                        ?>
                                                            <a class="h4 author-name" style="color: black;"><?php echo $row['username'] ?></a>
                                                        <?php } ?>
                                                    </div>
												</div>
											</div>
											<div class="col-lg-10 col-md-9">
												<ul class="profile-menu">

													<li>
														<a class="" href="myprofile.php">About</a>
													</li>
													<li>
														<a class="active" href="myfollower.php">Friends</a>
													</li>
													<li>
														<a class="" href="mypost.php">Photos</a>
													</li>
													<li>
														<a class="" href="myvideopost.php">Videos</a>
													</li>

												</ul>
												<ol class="folw-detail">
													<?php
													$stmt10 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `following_id`='$lid' AND `fl_status`='following'");
													$row10 = $stmt10->fetch(PDO::FETCH_ASSOC);
													$a = implode($row10);

													$stmt11 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
													$row11 = $stmt11->fetch(PDO::FETCH_ASSOC);
													$b = implode($row11);
													?>
													<li><span>Followers</span><ins><?php echo $a ?></ins></li>
													<li><span>Following</span><ins><?php echo $b ?></ins></li>
												</ol>
											</div>
										</div>
									</div>
								</div><!-- user profile banner  -->



								<div class="col-lg-12">
									<div class="central-meta">
										<div class="title-block">
											<div class="row">
												<div class="col-lg-6">
													<div class="align-left">
														<?php
														$stmt1 = $admin->ret("SELECT * FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
														$row1 = $stmt1->rowCount();
														?>
														<h5>Friends <span><?php echo $row1 ?></span></h5>
													</div>
												</div>

											</div>
										</div>
									</div><!-- title block -->
									<div class="central-meta padding30">
										<div class="row">
											<?php
											$stmt = $admin->ret("SELECT * FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
											while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
												$fid = $row['following_id'];

												$stmt1 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$fid'");
												while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
													$flllid = $row1['l_id'];
													$path = "";
													if ($flllid == "1") {
														$path = "admin/controller/" . $row1['img'];
													} else {
														$path = "controller/" . $row1['img'];
													}
													?>
													<div class="col-lg-3 col-md-6 col-sm-6">

														<div class="friend-box">
															<figure>
																<img src="images/resources/frnd-cover1.jpg" alt="">

															</figure>

															<div class="frnd-meta">
																<img src="<?php echo $path ?>" alt="" style="width: 100px;height:100px;">
																<div class="frnd-name">
																	<a href="about.php?lid=<?php echo $row1['l_id'] ?>" title=""><?php echo $row1['username'] ?></a>
																	<span>(BCA)</span>
																</div>
															</div>
															<!-- <a href="chatpage.php?fid=<?php echo $fid ?>" title="" style="margin-left: 90px;color:blue">Message</a> -->
														</div>
													</div>
											<?php }
											} ?>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- content -->


		<?php
		include 'footer.php';
		?><!-- bottom bar -->
	</div>
	<!-- side panel -->

	<!-- send message popup -->

	<!-- report popup -->

	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/cropper1.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

</html>