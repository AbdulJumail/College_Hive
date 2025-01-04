<?php
include 'config.php';
$admin=new Admin();

$lid=$_SESSION['lid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/toast-notification.css">
    <link rel="stylesheet" href="css/page-tour.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="paymenthistory.css">
</head>
<body>

<?php
include 'navbar.php';
?>
<div class="wrapper rounded">
    <div style="display: flex;gap:1000px;margin-top:30px">
    <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand" href="#">Transactions <p class="text-muted pl-1">Welcome to your transactions</p> </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
       
    </nav>
    <div>
        <a href="viewevents.php" class="btn btn-danger">Back</a>
    </div>
    </div>
 
    <div class="d-flex justify-content-between align-items-center mt-3">
        <ul class="nav nav-tabs w-75">
            <li class="nav-item"> <a class="nav-link active" href="#history">History</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Reports</a> </li>
        </ul> 
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th scope="col">Events</th>
                    <th scope="col">Event Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col" class="text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
$stmt=$admin->ret("SELECT * FROM `payment` INNER JOIN `event` ON event.e_id=payment.e_id WHERE `l_id`='$lid' ORDER BY `pay_id` DESC");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td scope="row"> <span><img src="admin/controller/<?php echo $row['e_img'] ?>" alt="" style="width:40px;height:40px;border-radius:100px"></span>&nbsp;<?php echo $row['e_title'] ?></td>
                    <td class="text-muted"><?php echo $row['e_status'] ?></td>
                    <td class="text-muted"><?php echo $row['e_date'] ?></td>
                    <td class="text-light" > ₹<?php echo $row['e_amount'] ?> </td>
                    <td class="d-flex justify-content-end align-items-center"> <span ></span> 
                    <?php  if($row['pay_status']=='refunded'){ ?>
                            <h6 class="text-warning"><i class="fa fa-arrow-down"></i> Refunded</h6>
                   <?php } else { ?>
                    <h6 class="text-success"><i class="fa fa-check"></i> Paid</h6>
                  <?php } ?></td>
                </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>
   
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.min.js"></script>
    <script src="js/jquery-stories.js"></script>
    <!--<script src="js/toast-notificatons.js"></script>-->
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script><!-- For timeline slide show -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script><!-- for location picker map -->
    <script src="js/locationpicker.jquery.js"></script><!-- for loaction picker map -->
    <script src="js/map-init.js"></script><!-- map initilasition -->
    <!-- <script src="js/page-tourintro.js"></script> -->
    <script src="js/page-tour-init.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

