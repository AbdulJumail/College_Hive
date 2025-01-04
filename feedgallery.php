<?php
include 'config.php';
$admin = new Admin();

$id = $_SESSION['lid'];



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



                                <div class="col-lg-12">
                                    <div class="central-meta">
                                        <div class="title-block">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="align-left">
                                                        <h5>All Feeds</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- title block -->
                                    <div class="central-meta">
                                        <div class="row merged5">


                                            <?php

                                            $stmt2 = $admin->ret("SELECT * FROM `post` INNER JOIN `profile` ON profile.l_id=post.l_id ORDER BY `p_id` DESC");
                                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                $file_extension = pathinfo($row2['p_post'], PATHINFO_EXTENSION); // get the file extension

                                                if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-box">
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt<?php echo $row2['p_id'] ?>">
                                                                <img src="controller/<?php echo $row2['p_post'] ?>" alt="" style="width: 250px;height:173px;object-fit:cover"> </a>
                                                            <div class="over-photo">
                                                                <?php
                                                                $pidd = $row2['p_id'];
                                                                $stmt11 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                $likecount = $stmt11->rowCount();
                                                                ?>
                                                                <a href="#" title=""><i class="fa fa-heart"></i><?php echo $likecount ?></a>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- Post Modal -->


                                                    <div class="modal fade" id="img-comt<?php echo $row2['p_id'] ?>">
                                                        <div class="modal-dialog" style="margin-left: 100px;">
                                                            <div class="modal-content" style="width:1200px">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
                                                                            <div class="pop-image">
                                                                                <div class="pop-item">
                                                                                    <figure><img src="controller/<?php echo $row2['p_post'] ?>" alt="" style="width: 700px;height:530px;object-fit:cover;margin-top:20px;margin-left:10px"></figure>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="user">
                                                                                <figure><img src="controller/<?php echo $row2['img'] ?>" alt="" style="width:50px;height:50px"></figure>
                                                                                <div class="user-information">
                                                                                    <h4><a href="about.php?lid=<?php echo $row2['l_id'] ?>" title=""><?php echo $row2['username'] ?></a></h4>
                                                                                    <span><i class="fa fa-globe"></i> <?php echo $row2['p_date'] ?> </span>
                                                                                </div>

                                                                            </div>
                                                                            <div class="we-video-info">
                                                                                <ul>

                                                                                    <li>


                                                                                        <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row2['p_id'] ?>)" style="background: none;border:none">❤<span id="likecount<?php echo $pidd ?>" style="margin-left: 8px;">
                                                                                                <?php

                                                                                                $stmt5 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                                                $num1 = $stmt5->rowCount();
                                                                                                echo $num1; ?>
                                                                                            </span></button>



                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="comment" title="Comments">
                                                                                            <i class="fa fa-commenting"></i>
                                                                                            <?php

                                                                                            $stmt10 = $admin->ret("SELECT * FROM `comment` WHERE `p_id`='$pidd'");
                                                                                            $cmtcount = $stmt10->rowCount();
                                                                                            ?>
                                                                                            <ins><?php echo $cmtcount ?></ins>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>

                                                                            </div>

                                                                            <div class="coment-area" style="display: block;">
                                                                                <div id="commentt<?php echo $pidd; ?>" class="we-comet">
                                                                                    <?php

                                                                                    $stmt5 = $admin->ret("SELECT * FROM `comment` inner join `profile` on comment.user_id=profile.l_id WHERE `p_id`='$pidd'");
                                                                                    while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
                                                                                        echo '<li><div class="comet-avatar">
                                    <img src="controller/' . $row5['img'] . '" alt="" style="width:40px;height:40px;object-fit:cover">
                                </div><div style="background-color:#ECF9FF;border-radius:10px;padding:10px">
    <b>' . $row5['username'] . '</b><b style="float:right;">' . $row5['cm_date'] . '</b>
       <p> ' . $row5['comments'] . '</p>
        <br></div>
        
    </li>';
                                                                                    }
                                                                                    ?>
                                                                                </div>



                                                                                <div class="post-comment">
                                                                                    <div class="comet-avatar">
                                                                                        <?php
                                                                                        $stmt3 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");
                                                                                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                                                                        ?>
                                                                                            <img src="controller/<?php echo $row3['img'] ?>" alt="" style="width:40px;height:40px;object-fit:cover">
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="post-comt-box">
                                                                                        <form>
                                                                                            <input type="hidden" id="pid<?php echo $pidd; ?>" name="pid" value="<?php echo $pidd; ?>">
                                                                                            <textarea name="cmt" id="cmt<?php echo $pidd; ?>" placeholder="Post your comment" required></textarea>


                                                                                            <button id="savecomment" onclick="addpost(<?php echo $pidd; ?>)" style="margin-bottom: 25px;color:black"> <i class="fa fa-paper-plane"></i></button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                <?php } elseif (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv'))) { ?>
                                                    <div style="margin-top: -60px;">
                                                        <div>
                                                            <a href="controller/<?php echo $row2['p_post'] ?>" title="" data-strip-group="mygroup" class="strip" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }"><img src="controller/<?php echo $row2['p_post'] ?>" alt="">
                                                                <i>
                                                                    <a href="#" title="" data-toggle="modal" data-toggle="modal" data-target="#img-comtv<?php echo $row2['p_id'] ?>">
                                                                        <video width="250" height="250" controls autoplay muted loop>
                                                                            <source src="controller/<?php echo $row2['p_post'] ?>" type="video/mp4">

                                                                            Your browser does not support the video tag.
                                                                        </video>
                                                                    </a>
                                                                </i>
                                                            </a>

                                                            <div class="over-photo">
                                                                <?php
                                                                $pidd = $row2['p_id'];
                                                                $stmt11 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                $likecount = $stmt11->rowCount();
                                                                ?>
                                                                <a href="#" title=""><i class="fa fa-heart"></i><?php echo $likecount ?></a>
                                                            </div>
                                                        </div>
                                                    </div>









                                                    <!-- Video Modal -->
                                                    <div class="modal fade" id="img-comtv<?php echo $row2['p_id'] ?>">
                                                        <div class="modal-dialog" style="margin-left: 100px;">
                                                            <div class="modal-content" style="width:1200px">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
                                                                            <div class="pop-image" style="padding: 20px;">
                                                                                <div class="pop-item" >
                                                                                    <video width="700" height="600" controls autoplay muted loop style="margin-top: -80px;">
                                                                                        <source src="controller/<?php echo $row2['p_post'] ?>" type="video/mp4">

                                                                                        Your browser does not support the video tag.
                                                                                    </video>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="user">
                                                                                <figure><img src="controller/<?php echo $row2['img'] ?>" alt="" style="width:50px"></figure>
                                                                                <div class="user-information">
                                                                                    <h4><a href="about.php?lid=<?php echo $row2['l_id'] ?>" title=""><?php echo $row2['username'] ?></a></h4>
                                                                                    <span><i class="fa fa-globe"></i> <?php echo $row2['p_date'] ?> </span>
                                                                                </div>

                                                                            </div>
                                                                            <div class="we-video-info">
                                                                                <ul>

                                                                                    <li>


                                                                                        <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row['p_id'] ?>)" style="background: none;border:none">❤<span id="likecount<?php echo $pidd ?>" style="margin-left: 8px;">
                                                                                                <?php

                                                                                                $stmt5 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                                                $num1 = $stmt5->rowCount();
                                                                                                echo $num1; ?>
                                                                                            </span></button>



                                                                                    </li>
                                                                                    <li>
                                                                                        <span class="comment" title="Comments">
                                                                                            <i class="fa fa-commenting"></i>
                                                                                            <?php

                                                                                            $stmt10 = $admin->ret("SELECT * FROM `comment` WHERE `p_id`='$pidd'");
                                                                                            $cmtcount = $stmt10->rowCount();
                                                                                            ?>
                                                                                            <ins><?php echo $cmtcount ?></ins>
                                                                                        </span>
                                                                                    </li>
                                                                                </ul>

                                                                            </div>

                                                                            <div class="coment-area" style="display: block;">
                                                                                <div id="commentt<?php echo $pidd; ?>" class="we-comet">
                                                                                    <?php

                                                                                    $stmt5 = $admin->ret("SELECT * FROM `comment` inner join `profile` on comment.user_id=profile.l_id WHERE `p_id`='$pidd'");
                                                                                    while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {
                                                                                        echo '<li><div class="comet-avatar">
                                    <img src="controller/' . $row5['img'] . '" alt="" style="width:40px;height:40px;object-fit:cover">
                                </div><div style="background-color:#ECF9FF;border-radius:10px;padding:10px">
    <b>' . $row5['username'] . '</b><b style="float:right;">' . $row5['cm_date'] . '</b>
       <p> ' . $row5['comments'] . '</p>
        <br></div>
        
    </li>';
                                                                                    }
                                                                                    ?>
                                                                                </div>



                                                                                <div class="post-comment">
                                                                                    <div class="comet-avatar">
                                                                                        <?php
                                                                                        $stmt3 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");
                                                                                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                                                                        ?>
                                                                                            <img src="controller/<?php echo $row3['img'] ?>" alt="" style="width:40px;height:40px;object-fit:cover">
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="post-comt-box">
                                                                                        <form>
                                                                                            <input type="hidden" id="pid<?php echo $pidd; ?>" name="pid" value="<?php echo $pidd; ?>">
                                                                                            <textarea name="cmt" id="cmt<?php echo $pidd; ?>" placeholder="Post your comment" required></textarea>


                                                                                            <button id="savecomment" onclick="addpost(<?php echo $pidd; ?>)" style="margin-bottom: 25px;color:black"> <i class="fa fa-paper-plane"></i></button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                            <?php }
                                            } ?>




                                        </div>


                                    </div><!-- photos -->
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

    <script>
        function addpost(postid) {
            var pid = document.getElementById('pid' + postid).value;
            var cmt = document.getElementById('cmt' + postid).value;


            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("commentt" + postid).innerHTML = xmlhttp.responseText;
                }

            }
            xmlhttp.open("GET", "controller/addcomment.php?pid=" + pid + "&cmt=" + cmt, true);
            xmlhttp.send();
        }


        function like(pid) {

            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("likecount" + pid).innerHTML = xmlhttp.responseText;
                }

            }
            xmlhttp.open("GET", "controller/like.php?pid=" + pid, true);
            xmlhttp.send();
        }

        function dislike(pid) {

            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("dislikecount" + pid).innerHTML = xmlhttp.responseText;
                }

            }
            xmlhttp.open("GET", "controller/dislike.php?pid=" + pid, true);
            xmlhttp.send();
        }
    </script>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>


</body>

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

</html>