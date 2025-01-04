<?php

$admin = new Admin();

$lid=$_GET['lid'];


?>

<div class="central-meta">
<span class="create-post">Photos </span>
<ul class="photos-list">
<?php
    $stmt=$admin->ret("SELECT * FROM `post` WHERE `l_id`='$lid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $file_extension = pathinfo($row['p_post'], PATHINFO_EXTENSION); // get the file extension

        if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
    
    <li>
        <div class="item-box">
            <a class="strip" href="controller/<?php echo $row['p_post'] ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
            <img src="controller/<?php echo $row['p_post'] ?>" alt="" style="width: 170px;height:100px;object-fit:cover"></a>
            <div class="over-photo">
                <div class="likes heart" title="Like/Dislike">❤ <span>15</span></div>
                <span>20 hours ago</span>
            </div>
        </div>
    </li>
    <?php } } ?>
   
   
</ul>
</div>