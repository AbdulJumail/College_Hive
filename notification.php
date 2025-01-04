<?php
include 'config.php';
$admin = new Admin();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/pitnik/notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:49 GMT -->

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

        <section >
            <div class="gap2 gray-bg" style="height: 500px;padding-left:60px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row merged20" id="page-contents">
                                <!-- user profile banner  -->
                                <div class="col-lg-9">
                                    <div class="central-meta">
                                        <div class="editing-interest">
                                            <span class="create-post"><i class="ti-bell"></i> All Notifications</span>
                                            <div class="notification-box">
                                                <ul>
                                                    <?php
                                                    $stmt = $admin->ret("SELECT * FROM `notification` WHERE `n_status`='new' ORDER BY `n_id` DESC");
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li>

                                                            <div class="notifi-meta">
                                                                <h5><?php echo $row['n_title'] ?></h5>
                                                                <p><?php echo $row['n_descp'] ?></p>
                                                                <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['n_date'] ?></span>
                                                            </div>

                                                            <a href="controller/clearmassnotification.php?nid=<?php echo $row['n_id'] ?>"><i  class="del ti-close" title="Remove"></i>
                                                            </a>
                                                        </li>

                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- centerl meta -->
                                <!-- sidebar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include 'footer.php';
        ?>
    </div>


    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:49 GMT -->

</html>