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
                                                        <a class="" href="follower.php?lid=<?php echo $pid ?>">Friends</a>
                                                    </li>
                                                    <li>
                                                        <a class="active" href="gallery.php?lid=<?php echo $pid ?>">Photos</a>
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
                                                <div class="col-lg-6">
                                                    <div class="align-left">
                                                        
                                                        <h5>Photos</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- title block -->
                                    <div class="central-meta">
                                        <div class="row merged5">
                                            <?php

                                            $stmt2 = $admin->ret("SELECT * FROM `post` WHERE `l_id`='$pid' ORDER BY `p_id` DESC");
                                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {



                                                $file_extension = pathinfo($row2['p_post'], PATHINFO_EXTENSION); // get the file extension

                                                if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-box">
                                                            <a class="strip" href="controller/<?php echo $row2['p_post'] ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                                <img src="controller/<?php echo $row2['p_post'] ?>" alt="" style="width: 250px;height:173px;object-fit:cover"> </a>
                                                            <div class="over-photo">

                                                            <?php
                                                            $pidd=$row2['p_id'];
                                                                $stmt11=$admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                $likecount=$stmt11->rowCount();
                                                            ?>
                                                                <a href="#" title=""><i class="fa fa-heart"></i><?php echo $likecount ?></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>


                                        </div>


                                    </div><!-- photos -->
                                </div>

                                <div class="popup-wraper5">
                                    <div class="popup">
                                        <span class="popup-closed"><i class="ti-close"></i></span>
                                        <div class="popup-meta">
                                            <div class="popup-head">
                                                <h5>Upload Pictures & Videos</h5>
                                            </div>
                                            <div class="upload-boxes">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="smal-box">
                                                            <label class="fileContainer">
                                                                <i class=" ti-layout-media-center-alt"></i>
                                                                <input type="file">
                                                                <em>Upload New</em>
                                                                <span>Choose form Computer</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="smal-box">
                                                            <div class="from-gallery">
                                                                <i class="ti-layout-grid2"></i>
                                                                <em>From Gallery Or Album</em>
                                                                <span>Choose form already uploaded</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sugested-photos">
                                                    <h5>Suggested Photos & Videos <a href="#" title="">See All</a></h5>
                                                    <ul class="sugestd-photo-caro">
                                                        <li><img src="images/resources/sug1.jpg" alt=""></li>
                                                        <li><img src="images/resources/sug2.jpg" alt=""></li>
                                                        <li><img src="images/resources/sug3.jpg" alt=""></li>
                                                        <li><img src="images/resources/sug4.jpg" alt=""></li>
                                                        <li><img src="images/resources/sug5.jpg" alt=""></li>
                                                    </ul>
                                                </div>
                                                <a class="main-btn" href="#" title="" data-ripple="">Proceed</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="already-gallery">
                                        <div class="popup-head">
                                            <h5>Choose from gallery</h5>
                                        </div>
                                        <ul class="sugestd-photo-caro">
                                            <li><img src="images/resources/sug1.jpg" alt=""></li>
                                            <li><img src="images/resources/sug2.jpg" alt=""></li>
                                            <li><img src="images/resources/sug3.jpg" alt=""></li>
                                            <li><img src="images/resources/sug4.jpg" alt=""></li>
                                            <li><img src="images/resources/sug5.jpg" alt=""></li>
                                            <li><img src="images/resources/sug6.jpg" alt=""></li>
                                            <li><img src="images/resources/sug7.jpg" alt=""></li>
                                            <li><img src="images/resources/sug4.jpg" alt=""></li>
                                            <li><img src="images/resources/sug1.jpg" alt=""></li>
                                            <li><img src="images/resources/sug2.jpg" alt=""></li>
                                            <li><img src="images/resources/sug4.jpg" alt=""></li>
                                            <li><img src="images/resources/sug5.jpg" alt=""></li>
                                            <li><img src="images/resources/sug6.jpg" alt=""></li>
                                            <li><img src="images/resources/sug7.jpg" alt=""></li>
                                            <li><img src="images/resources/sug1.jpg" alt=""></li>
                                            <li><img src="images/resources/sug4.jpg" alt=""></li>
                                            <li><img src="images/resources/sug5.jpg" alt=""></li>
                                        </ul>
                                        <a class="main-btn" href="#" title="" data-ripple="">Confirm</a>
                                        <a class="main-btn canceld" href="#" title="" data-ripple="">Cancel</a>
                                    </div>
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