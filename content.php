<?php

include 'config.php';
$admin=new Admin();

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/pitnik/price-plans.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:46 GMT -->
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

</head>
<body>

<div class="theme-layout">
	

	
	<?php
    include 'navbar.php';
    ?><!-- topbar -->
		
	<section>
		<div class="page-header">
			<div class="header-inner">
				<h2>Shared Content</h2>
				
			</div>
			<figure><img src="images/resources/baner-badges.png" alt=""></figure>
		</div>
	</section><!-- sub header -->
	
	<section>
		<div class="gap">
			<div class="container">
				<div class="row">
					<div class="offset-lg-1 col-lg-10">
						<div class="sec-heading style9 text-center">
							<span><i class="fa fa-book"></i> </span>
							<h2>All <span>Contents</span></h2>
						</div>
					</div>
                    <?php

                            $stmt=$admin->ret("SELECT * FROM `content` ORDER BY `ct_id` DESC");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
					<div class="col-lg-4 col-md-6 col-sm-6" style="margin-top: 20px;">
						<div class="price-box">
							<span class="bg-blue" style="padding:15px;font-size:20px"><?php echo $row['ct_title'] ?></span>
							<div class="pricings" >
								<div style="height: 100px;">
								<p>
								<?php echo $row['ct_descp'] ?>
								</p>
								</div>
								
								<a class="main-btn" href="admin/controller/<?php echo $row['ct_img'] ?>" target="_blank" title="" >View</a>
							</div>	
                          
						</div>
					</div>
					
                    <?php } ?>
				</div>
			</div>
		</div>
	</section><!-- price plans -->

	<?php
include 'footer.php';
    ?>
</div>
	<div class="side-panel">
		<h4 class="panel-title">General Setting</h4>
		<form method="post">
			<div class="setting-row">
				<span>use night mode</span>
				<input type="checkbox" id="nightmode1"/> 
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

</body>	

<!-- Mirrored from wpkixx.com/html/pitnik/price-plans.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:47 GMT -->
</html>