<?php
include 'config.php';
$admin = new Admin();

$lid = $_SESSION['lid'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/pitnik/blog-posts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>College Hive</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>

    <div class="theme-layout">

        <?php
        include 'navbar.php';
        ?><!-- topbar -->

        <?php
        include 'rightsidebar.php';
        ?><!-- right sidebar user chat -->

        <?php
        include 'leftsidebar.php';
        ?><!-- left sidebar menu -->

        <section>
            <div class="gap2 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row merged20" id="page-contents">
                                <!-- user profile banner  -->

                                <div class="col-lg-12">
                                    <div class="central-meta">
                                        <div class="title-block">
                                            <div class="row">
                                                <div class="col-lg-6" style="display: flex;gap:700px">
                                                    <div class="align-left">
                                                        <?php
                                                        $stmt2 = $admin->ret("SELECT * FROM `event`");
                                                        $num = $stmt2->rowCount();
                                                        ?>
                                                        <h5>Events<span><?php echo $num ?></span></h5>
                                                    </div>
                                                    <a href="paymenthistory.php" class="btn btn-info">
                                                        <div style="display: flex;gap:10px;width:160px"><i class="fa fa-exchange" aria-hidden="true"></i>Payment History</h6>
                                                        </div>
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div><!-- title block -->
                                    <div class="row merged20">
                                        <?php
                                        $stmt = $admin->ret("SELECT * FROM `event` ORDER BY `e_id` DESC");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $eid = $row['e_id'];
                                        ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="central-meta">
                                                    <div class="blog-post">
                                                        <div class="friend-info">

                                                            <div class="post-meta">
                                                                <figure>
                                                                    <a title="" href="#">
                                                                        <img alt="" src="admin/controller/<?php echo $row['e_img'] ?>" style="width:500px;height:300px;object-fit:cover">
                                                                    </a>

                                                                </figure>
                                                                <div class="description">
                                                                    <?php

                                                                    $stmt5 = $admin->ret("SELECT * FROM `payment` WHERE `e_id`='$eid' AND `l_id`='$lid'");
                                                                    $num = $stmt5->rowCount();

                                                                    if ($num > 0) { ?>
                                                                        <a data-ripple="" href="" class="learnmore" data-toggle="modal" data-target="#exampleModalCenterr3" style="height: 40px;width:60px"><h5> Pay</h5></a>
                                                                    <?php } else { ?>
                                                                        <a data-ripple="" href="" class=" learnmore text-center" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['e_id'] ?>" style="height: 40px;width:60px"><h5> Pay</h5></a>
                                                                    <?php  } ?>
                                                                    <h2><a href="social-post-detail.html" title=""><?php echo $row['e_title'] ?></a></h2>
                                                                    <p>
                                                                        <?php echo $row['e_descp'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span title="views" data-toggle="tooltip" class="views">
                                                                                <div style="display: flex;">

                                                                                    <h6>Pay:&nbsp;₹<?php echo $row['e_amount'] ?></h6>
                                                                                </div>
                                                                            </span>
                                                                        </li>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="exampleModalCenter<?php echo $row['e_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="margin-left: 150px;">
                                                            <form action="controller/addpay.php" method="POST">
                                                                <div class="Pement">
                                                                    <div class="form-box" style="display: flex;flex-direction:column">
                                                                        <label>Scan and Pay</label>
                                                                        <img src="images/qr.jpg" height="180px" width="180px">

                                                                    </div>
                                                                    <br>
                                                                    <div class="form-box" style="display: flex;flex-direction:column">
                                                                        <label>UPI Transaction Id</label>
                                                                        <input type="hidden" name="eid" value="<?php echo $row['e_id'] ?>">
                                                                        <input type="hidden" name="amt" value="<?php echo $row['e_amount'] ?>">
                                                                        <input type="text" name="transaction" placeholder="0000 0000 0000 0000 " style="width: 200px;" pattern="[0-9]+" minlength="12" maxlength="12" title="enter only numbers" required>


                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="pay" class="btn btn-primary">Pay</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="modal fade" id="exampleModalCenterr3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background: #F6F1F1;">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Alert!!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h3 style="text-align: center;color:red">You already paid!!</h3>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div><!-- centerl meta -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?php
        include 'footer.php';
        ?><!-- bottom bar -->
    </div>


    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/blog-posts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:18 GMT -->

</html>