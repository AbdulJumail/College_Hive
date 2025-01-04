<?php
include 'config.php';
$admin = new Admin();

$lid = $_SESSION['lid'];

$pid = $_GET['lid'];



?>

<!DOCTYPE html>
<html lang="en">


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
                                                    <div style="height: 250px;width:250px;margin-top:-100px;">
                                                        <img alt="author" src="controller/<?php echo $row['img'] ?>" style="height: 200px;width:200px;object-fit:cover;overflow-hidden:hidden;border-radius:100px">


                                                        <a class="h4 author-name" style="color: black;"><?php echo $row['username'] ?></a>

                                                    </div>
                                                    <div class="author-content">
                                                        <?php
                                                        $stmt2 = $admin->ret("SELECT * FROM `followers` WHERE `user_id`='$lid' AND `following_id`='$pid'");
                                                        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                                        $num = $stmt2->rowCount();

                                                        if ($num < 1) {
                                                        ?>
                                                            <a href="controller/addfollow.php?lid=<?php echo $row['l_id'] ?>" class="btn btn-info">Follow</a>
                                                            <?php } else {
                                                            if ($row2['fl_status'] == 'following') { ?>
                                                                <a href="controller/unfollow.php?lid=<?php echo $row['l_id'] ?>" class="btn btn-info">Following</a>
                                                            <?php  } else {  ?>
                                                                <a href="controller/updateaddfollow.php?lid=<?php echo $row['l_id'] ?>" class="btn btn-info">Follow</a>
                                                        <?php }
                                                        } ?>

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-9">
                                                <ul class="profile-menu">

                                                    <li>
                                                        <a class="active" href="about.php?lid=<?php echo $pid ?>">About</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="follower.php?lid=<?php echo $pid ?>">Friends</a>
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
                                <div class="col-lg-4 col-md-4">
                                    <aside class="sidebar">
                                        <?php
                                        include 'personalinfo.php';
                                        ?>
                                    </aside>
                                </div>
                                <div class="col-lg-8 col-md-8">



                                    <?php
                                    include 'friends.php';
                                    ?><!-- friends list -->
                                    <?php
                                    include 'photos.php';
                                    ?>
                                    
                                  
                                    


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