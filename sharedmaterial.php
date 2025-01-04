<?php

$admin=new Admin();

?>

<div class="widget stick-widget">
<h4 class="widget-title">Shared Materials</h4>
<div class="your-page">
    <?php
    $stmt=$admin->ret("SELECT * FROM `content` ORDER BY `ct_id` DESC LIMIT 7");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <figure>
    <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 25px;color:red"></i>
    </figure>
    <div class="page-meta">
        <a href="content.php" title="" class="underline"><?php echo $row['ct_title'] ?></a>
       
    </div>
    <hr>
    <?php } ?>
    
    <div class="page-likes">
        <ul class="nav nav-tabs likes-btn">
           
            <li class="nav-item">
                <a href="content.php"  data-ripple=""> View All</a>
                
            </li>
        </ul>
        <!-- Tab panes -->
        
    </div>
</div>
</div>