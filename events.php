<?php

$admin=new Admin();

?>

<div class="widget">
<h4 class="widget-title">Events</h4>
<div class="your-page">
    <?php
    $stmt=$admin->ret("SELECT * FROM `event` ORDER BY `e_id` DESC LIMIT 7");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <figure>
        <a href="#" title=""><img src="admin/controller/<?php echo $row['e_img'] ?>" alt="" style="width: 50px;height:50px"></a>
    </figure>
    <div class="page-meta">
        <a href="viewevents.php" title="" class="underline"><?php echo $row['e_title'] ?></a>
       
    </div>
    <hr>
    <?php } ?>
    
    <div class="page-likes">
        <ul class="nav nav-tabs likes-btn">
           
            <li class="nav-item">
                <a href="viewevents.php"  data-ripple=""> View All</a>
                
            </li>
        </ul>
        <!-- Tab panes -->
        
    </div>
</div>
</div>