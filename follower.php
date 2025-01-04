<?php
include 'config.php';
$admin = new Admin();



$pid = $_GET['lid'];



?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:13 GMT -->

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

        <!-- responsive header -->

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
                                <div class="user-profile">
                                    <figure>

                                        
                                    <img src="images/clgbg.jpg" alt="" style="height: 300px;object-fit:cover;overflow:hidden;">



                                    </figure>

                                    <div class="profile-section">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <?php
                                                $stmt = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$pid'");
                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                <div class="profile-author">
                                                    <div style="height: 250px;width:250px;margin-top:-100px">
                                                        <img alt="author" src="controller/<?php echo $row['img'] ?>" style="height: 200px;width:200px;object-fit:cover;overflow-hidden:hidden;border-radius:100px">

                                                    </div>

                                                    <div class="author-content">
                                                        <a class="h4 author-name" style="color: black;"><?php echo $row['username'] ?></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-9">
                                                <ul class="profile-menu">

                                                    <li>
                                                        <a class="" href="about.php?lid=<?php echo $pid ?>">About</a>
                                                    </li>
                                                    <li>
                                                        <a class="active" href="follower.php?lid=<?php echo $pid ?>">Friends</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="gallery.php?lid=<?php echo $pid ?>">Photos</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="videopost.php?lid=<?php echo $pid ?>">Videos</a>
                                                    </li>

                                                </ul>
                                                <ol class="folw-detail">
                                                    <?php
                                                    $stmt10 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `following_id`='$pid'");
                                                    $row10 = $stmt10->fetch(PDO::FETCH_ASSOC);
                                                    $a = implode($row10);

                                                    $stmt11 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `user_id`='$pid'");
                                                    $row11 = $stmt11->fetch(PDO::FETCH_ASSOC);
                                                    $b = implode($row11);
                                                    ?>
                                                    <li><span>Followers</span><ins><?php echo $a ?></ins></li>
                                                    <li><span>Following</span><ins><?php echo $b ?></ins></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- user profile banner  -->



                                <div class="col-lg-12">
                                    <div class="central-meta">
                                        <div class="title-block">
                                            <div class="row">
                                                <?php
                                                $stmt = $admin->ret("SELECT * FROM `followers` WHERE `user_id`='$pid' AND `fl_status`='following'");
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $fid = $row['following_id'];

                                                    $stmt1 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$fid'");
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <div class="col-lg-3 col-md-6 col-sm-6">

                                                            <div class="friend-box">
                                                                <figure>
                                                                    <img src="images/resources/frnd-cover1.jpg" alt="">

                                                                </figure>
                                                                <div class="frnd-meta">
                                                                    <img src="controller/<?php echo $row1['img'] ?>" alt="" style="width: 100px;height:100px">
                                                                    <div class="frnd-name">
                                                                        <a href="#" title=""><?php echo $row1['username'] ?></a>
                                                                        <span>California, USA</span>
                                                                    </div>


                                                                </div>
                                                                <!-- <a href="chatpage.php?fid=<?php echo $fid ?>" title="" style="margin-left: 90px;color:blue">Message</a> -->
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>

                                        </div>
                                    </div><!-- title block -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- content -->


        <?php
        include 'footer.php';
        ?><!-- bottom bar -->
    </div>
    <!-- side panel -->

    <!-- send message popup -->

    <!-- report popup -->

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

</html>