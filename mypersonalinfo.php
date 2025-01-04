<?php
$admin=new Admin();

$lid=$_SESSION['lid'];
?>

<div class="central-meta stick-widget">
    <span class="create-post">Personal Info</span>
    <div class="personal-head">
        <?php
        $stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
        $num = $stmt2->rowCount();
        if ($num > 0) {

        ?>
                    <span class="f-title"><i class="fa fa-user"></i> About Me:</span>
            <p>
            <?php echo $row['about'] ?>
            </p>
           
            

            <span class="f-title"><i class="fa fa-briefcase"></i> Department:</span>
            <?php
            $stmt3 = $admin->ret("SELECT * FROM `login` WHERE `l_id`='$lid'");
            while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <p>
                    <?php echo $row3['department'] ?>
                </p>
            <?php } ?>


            <span class="f-title"><i class="fa fa-envelope"></i> Email</span>
            <p>
            <?php echo $row['uemail'] ?>
            </p>
           
        <?php } else { ?>



            <span class="f-title"><i class="fa fa-user"></i> About Me:</span>
            <p>
               
            </p>
           
          
           
            <span class="f-title"><i class="fa fa-briefcase"></i> Department:</span>
            <p>
                
            </p>


            <span class="f-title"><i class="fa fa-envelope"></i> Email</span>
            <p>
                
            </p>
        <?php } ?>

    </div>
</div>