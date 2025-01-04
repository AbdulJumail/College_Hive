<?php
$admin=new Admin();

$lid=$_SESSION['lid'];

?>

<div class="widget ">
    <h4 class="widget-title">Who's follownig</h4>
    <ul class="followers">
        <?php
    $stmt=$admin->ret("SELECT * FROM `followers` INNER JOIN `profile` ON profile.l_id=followers.user_id WHERE `following_id`='$lid' AND `fl_status`='following' ORDER BY `fl_id` DESC LIMIT 6");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

?>
        <li>
            <figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="height:40px;width:60px;object-fit:cover"></figure>
            <div class="friend-meta">
                <h4><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a></h4>
                <a href="about.php?lid=<?php echo $row['l_id'] ?>" title="View Profile" class="underline">View</a>
            </div>
        </li>
        <?php } ?>
        
    </ul>
</div>