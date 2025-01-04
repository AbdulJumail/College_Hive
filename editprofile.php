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
	<title>College Hive</title>
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
														<a class="" href="myfollower.php">Friends</a>
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
								<div class="col-lg-11">
									<div class="central-meta">
										<div class="about">
											<div class="d-flex flex-row mt-2">

												<div class="tab-content">

													<div id="edit-profile">
														<div class="set-title">
															<h5>Edit Profile</h5>
															<span>People on College-Hive will get to know you with the info below</span>
														</div>
														<div class="setting-meta">
															<div class="change-photo">
																<figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="width: 100px;height:100px"></figure>

															</div>
														</div>
														<?php
														$stmt1 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");
														$num = $stmt1->rowCount();
														if ($num > 0) {

														?>
															<div class="stg-form-area">
		
																<form action="controller/editprofile.php" method="post" class="c-form" enctype="multipart/form-data">



																	<div class="uzer-nam">
																		<label>User Name</label>
																		<input type="text" name="uname" value="<?php echo $row['username'] ?>" placeholder="username" readonly>
																	</div>
																	<div>
																		<label>Email Address</label>
																		<input type="text" name="email" value="<?php echo $row['uemail'] ?>" placeholder="email address">
																	</div>


																	<div>
																		<label>about your profile</label>
																		<textarea rows="3" name="about" placeholder="write someting about yourself"><?php echo $row['about'] ?></textarea>
																	</div>



																	<div>
																		<button type="reset" data-ripple="">Clear</button>
																		<button type="submit" name="save" data-ripple="">Save</button>
																	</div>
																</form>
															</div>

															
														<?php } else { ?>
															<div class="stg-form-area">
				
																<form action="controller/editprofile.php" method="post" class="c-form" enctype="multipart/form-data">
																	

																	<div class="uzer-nam">
																		<label>User Name</label>
																		<input type="text" name="uname" placeholder="username">
																	</div>
																	<div>
																		<label>Email Address</label>
																		<input type="text" name="email" placeholder="email address">
																	</div>
																

																	<div>
																		<label>about your profile</label>
																		<textarea rows="3" name="about" placeholder="write someting about yourself"></textarea>
																	</div>



																	<div>
																		<button type="reset" data-ripple="">Clear</button>
																		<button type="submit" name="save" data-ripple="">Save</button>
																	</div>
																</form>
															</div>
															
														<?php  } ?>
													</div><!-- edit profile -->


												</div>
											</div>
										</div>
									</div>
								</div><!-- centerl meta -->
								<!-- sidebar -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		include 'footer.php';
		?>
	</div>
	<div class="side-panel">
		<h4 class="panel-title">General Setting</h4>
		<form method="post">
			<div class="setting-row">
				<span>use night mode</span>
				<input type="checkbox" id="nightmode1" />
				<label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Notifications</span>
				<input type="checkbox" id="switch22" />
				<label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Notification sound</span>
				<input type="checkbox" id="switch33" />
				<label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>My profile</span>
				<input type="checkbox" id="switch44" />
				<label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Show profile</span>
				<input type="checkbox" id="switch55" />
				<label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
			</div>
		</form>
		<h4 class="panel-title">Account Setting</h4>
		<form method="post">
			<div class="setting-row">
				<span>Sub users</span>
				<input type="checkbox" id="switch66" />
				<label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>personal account</span>
				<input type="checkbox" id="switch77" />
				<label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Business account</span>
				<input type="checkbox" id="switch88" />
				<label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Show me online</span>
				<input type="checkbox" id="switch99" />
				<label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Delete history</span>
				<input type="checkbox" id="switch101" />
				<label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
			</div>
			<div class="setting-row">
				<span>Expose author name</span>
				<input type="checkbox" id="switch111" />
				<label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
			</div>
		</form>
	</div><!-- side panel -->

	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/cropper1.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:31:05 GMT -->

</html>