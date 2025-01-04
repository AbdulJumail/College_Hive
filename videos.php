<?php

$admin = new Admin();

$lid = $_GET['lid'];


?>

<div class="central-meta">
	<span class="create-post">Videos (33) </span>
	<ul class="videos-list">
		<?php
		$stmt = $admin->ret("SELECT * FROM `post` WHERE `l_id`='$lid'");
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$file_extension = pathinfo($row['p_post'], PATHINFO_EXTENSION); // get the file extension

			if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>

				<li>
					<div class="item-box">
						<video width="650" height="440" controls autoplay muted>
							<source src="controller/<?php echo $row['p_post'] ?>" type="video/mp4">

							Your browser does not support the video tag.
						</video>
					</div>
				</li>
		<?php }
		} ?>

	</ul>
</div>