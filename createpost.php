<?php
$admin=new Admin();

$lid=$_SESSION['lid'];



?>

<div class="central-meta postbox">
<span class="create-post">Upload post</span>
<div class="new-postbox">
    <?php
    $stmt=$admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div style="display: flex;gap:30px">
    <figure >
        <img src="controller/<?php echo $row['img'] ?>" alt="" style="width: 50px;height:50px;border-radius:100px;object-fit:cover">
    </figure>
    <?php } ?>
   
    <div class="attachments" style="margin-top: 15px;width:200px">
      
  <a href="mypost.php" class="post-btn" data-ripple="" style="width: 100px;">     <i class="fa fa-plus"></i> Post</a>
    </div>
    </div>
    <div class="add-location-post">
        <span>Drag map point to selected area</span>
        <div class="row">

            <div class="col-lg-6">
                <label class="control-label">Lat :</label>
                <input type="text" class="" id="us3-lat" />
            </div>
            <div class="col-lg-6">
                <label>Long :</label>
                <input type="text" class="" id="us3-lon" />
            </div>
        </div>
        <!-- map -->
        <div id="us3"></div>
    </div>
</div>
</div>