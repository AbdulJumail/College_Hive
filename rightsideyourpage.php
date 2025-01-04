<?php


$admin = new Admin();
$lid = $_SESSION['lid'];

$stmt = $admin->ret("SELECT * FROM `profile`  WHERE `l_id`='$lid'");
$num = $stmt->rowCount();
if ($num > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="widget stick-widget">
        <h4 class="widget-title">My page</h4>
        <div class="your-page">
            <figure>
                <a href="myprofile.php" title=""><img src="controller/<?php echo $row['img'] ?>" alt=""
                        style="width: 100px;height:60px;object-fit:cover"></a>
            </figure>
            <div class="page-meta">

                <a href="myprofile.php" title="" class="underline">
                    <?php echo $row['username'] ?>
                </a>
                <?php
                $stmt10 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `following_id`='$lid' AND `fl_status`='following'");
                $row10 = $stmt10->fetch(PDO::FETCH_ASSOC);
                $a = implode($row10);

                $stmt11 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
                $row11 = $stmt11->fetch(PDO::FETCH_ASSOC);
                $b = implode($row11);
                ?>
                <span><a title="">Following :&nbsp;
                        <?php echo $b ?>
                    </a></span>
                <span><a title="">Followers :&nbsp;
                        <?php echo $a ?>
                    </a></span>
            </div>


        </div>
    </div>

<?php } else {
    $stmt5 = $admin->ret("SELECT * FROM `login` WHERE `l_id`='$lid'");
    $row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
    ?>
    <h3 style="color:black;">Welcome</h3><h4 style="color:blackx;"><span><?php echo $row5['name'] ?></span></h4>
<?php } ?>