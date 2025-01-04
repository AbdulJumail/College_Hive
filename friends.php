<?php

$admin = new Admin();

$lid=$_GET['lid'];

$stmt=$admin->ret("SELECT * FROM `followers` WHERE `user_id`='$lid'");
$num=$stmt->rowCount();
?>

<div class="central-meta">
    <span class="create-post">Friend's (<?php echo $num ?>) </span>
    <ul class="frndz-list">
        <?php
        $stmt = $admin->ret("SELECT * FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $fid=$row['following_id']; 
        
        $stmt1=$admin->ret("SELECT * FROM `profile` WHERE `l_id`='$fid'");
        while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
        ?>
            <li>
                <img src="controller/<?php echo $row1['img'] ?>" alt="" style="width:150px;height:90px;object-fit:cover">
                <div class="sugtd-frnd-meta">
                    <a href="about.php?lid=<?php echo $row1['l_id'] ?>" title=""><?php echo $row1['username'] ?></a>
                    
                </div>
            </li>
        <?php  } }
        ?>



    </ul>
</div>