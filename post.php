<?php

$admin = new Admin();

$lid = $_SESSION['lid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <div class="loadMore">



       
        <?php

            $stmt = $admin->ret("SELECT post.p_id,post.p_post,post.p_caption,post.p_date,profile.username,profile.img,profile.l_id FROM `post` INNER JOIN `profile` ON profile.l_id=post.l_id WHERE post.l_id IN (SELECT `following_id` FROM `followers` WHERE `user_id`='$lid') OR post.l_id='$lid' ORDER BY `p_id` DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $postid = $row['p_id'];
                 $fllid=$row['l_id'];
                 $path ="";
                 if($fllid == "1"){
                    $path = "admin/controller/".$row['p_post'];
                 }
                 else{
                    $path = "controller/".$row['p_post'];
                 }
                //  echo $path;
        ?>

                <div class="central-meta item">

                    <div class="user-post">
                        <div class="friend-info">
                           
                                  
                            
                            <figure>
                                <img src="controller/<?php echo $row['img'] ?>" alt="" style="width:50px;height:40px;object-fit:cover">
                            </figure>
                           
                            <div class="friend-name">

                                <ins><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a> </ins>
                                <span><i class="fa fa-globe"></i> <?php echo $row['p_date'] ?> </span>
                            </div>
                            <div class="post-meta">



                                <figure>
                                    <div class="img-bunch">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6">

                                                <?php

                                                $file_extension = pathinfo($row['p_post'], PATHINFO_EXTENSION); // get the file extension

                                                if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
                                                
                                                    <figure>
                                                        <a href="#" title="" data-toggle="modal" data-target="#img-comt<?php echo $row['p_id'] ?>">
                                                            <img src="<?php echo $path; ?>" alt="" style="object-fit:cover;overflow:hidden">
                                                        </a>
                                                    </figure>
                                                <?php } elseif (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv','quicktime','mkv'))) { ?>
                                                    <a href="#" title="" data-toggle="modal" data-target="#img-comtv<?php echo $row['p_id'] ?>">
                                                        <video width="500" height="400" controls autoplay muted style="margin-top: -10px;">
                                                            <source src="<?php echo $path; ?>" type="video/mp4">

                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </a>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <hr>
                                <p>
                                    <?php echo $row['p_caption'] ?>
                                </p>
                                <div class="we-video-info">
                                    <ul>

                                        <li>


                                            <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row['p_id'] ?>)" style="background: none;border:none">❤<span id="likecount<?php echo $postid ?>" style="margin-left: 8px;">
                                                    <?php

                                                    $stmt5 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$postid'");
                                                    $num1 = $stmt5->rowCount();
                                                    echo $num1; ?>
                                                </span></button>



                                        </li>
                                        <li>
                                            <span class="comment" title="Comments">
                                                <i class="fa fa-commenting"></i>
                                                <?php

                                                $stmt10 = $admin->ret("SELECT * FROM `comment` WHERE `p_id`='$postid'");
                                                $cmtcount = $stmt10->rowCount();
                                                ?>
                                                <ins><?php echo $cmtcount ?></ins>
                                            </span>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="coment-area">
                                <div id="commentt<?php echo $postid; ?>" class="we-comet" style="overflow-y: scroll;height:200px;">
                                    <?php
                                    $pid = $row['p_id'];
                                    $stmt2 = $admin->ret("SELECT * FROM `comment` inner join `profile` on comment.user_id=profile.l_id WHERE `p_id`='$pid'");
                                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<li><div class="comet-avatar">
                                    <img src="controller/' . $row2['img'] . '" alt="" style="width:40px;height:40px;object-fit:cover">
                                </div><div style="background-color:#ECF9FF;border-radius:10px;padding:10px">
    <b>' . $row2['username'] . '</b><b style="float:right;">' . $row2['cm_date'] . '</b>
       <p> ' . $row2['comments'] . '</p>
        <br></div>
        
    </li>';
                                    }
                                    ?>
                                </div>

                                <!-- <li>
                        <a href="#" title="" class="showmore underline">more comments+</a>
                    </li> -->
                                <div class="post-comment">
                                    <div class="comet-avatar">
                                        <?php
                                        $stmt3 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
                                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <img src="controller/<?php echo $row3['img'] ?>" alt="" style="width:40px;height:40px;object-fit:cover">
                                        <?php } ?>
                                    </div>
                                    <div class="post-comt-box">
                                        <form>
                                            <input type="hidden" id="pid<?php echo $row['p_id']; ?>" name="pid" value="<?php echo $row['p_id']; ?>">
                                            <textarea name="cmt" id="cmt<?php echo $row['p_id']; ?>" placeholder="Post your comment" required></textarea>


                                            <button id="savecomment" onclick="addpost(<?php echo $postid; ?>)" style="margin-bottom: 25px;color:black"><i class="fa fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        

                    </div>

                </div><!-- album post -->





                <!-- Image post modal -->
                <div class="modal fade" id="img-comt<?php echo $row['p_id'] ?>">
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
                                                <figure><img src="controller/<?php echo $row['p_post'] ?>" alt="" style="width: 700px;height:530px;object-fit:cover;margin-top:20px;margin-left:10px"></figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="user">
                                            <figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="width:50px;height:50px;object-fit:cover"></figure>
                                            <div class="user-information">
                                                <h4><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a></h4>
                                                <span><i class="fa fa-globe"></i> <?php echo $row['p_date'] ?> </span>
                                            </div>

                                        </div>
                                        <div class="we-video-info">
                                            <ul>

                                                <li>


                                                    <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row['p_id'] ?>)" style="background: none;border:none">❤<span id="likecount<?php echo $postid ?>" style="margin-left: 8px;">
                                                            <?php

                                                            $stmt5 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$postid'");
                                                            $num1 = $stmt5->rowCount();
                                                            echo $num1; ?>
                                                        </span></button>



                                                </li>
                                                <li>
                                                    <span class="comment" title="Comments">
                                                        <i class="fa fa-commenting"></i>
                                                        <?php

                                                        $stmt10 = $admin->ret("SELECT * FROM `comment` WHERE `p_id`='$postid'");
                                                        $cmtcount = $stmt10->rowCount();
                                                        ?>
                                                        <ins><?php echo $cmtcount ?></ins>
                                                    </span>
                                                </li>
                                            </ul>

                                        </div>

                                        <div class="coment-area" style="display: block;">
                                            <div id="commenttt<?php echo $postid; ?>" class="we-comet">
                                                <?php

                                                $stmt5 = $admin->ret("SELECT * FROM `comment` inner join `profile` on comment.user_id=profile.l_id WHERE `p_id`='$postid'");
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
                                                    $stmt3 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
                                                    while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <img src="controller/<?php echo $row3['img'] ?>" alt="" style="width:40px;height:40px;object-fit:cover">
                                                    <?php } ?>
                                                </div>
                                                <div class="post-comt-box">
                                                    <form>
                                                        <input type="hidden" id="pidd<?php echo $postid; ?>" name="pid" value="<?php echo $postid; ?>">
                                                        <textarea name="cmt" id="cmtt<?php echo $postid; ?>" placeholder="Post your comment" required></textarea>


                                                        <button id="savecomment" onclick="addpost2(<?php echo $postid; ?>)" style="margin-bottom: 25px;color:black"> <i class="fa fa-paper-plane"></i></button>
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

                <!-- Video Post Modal -->

                <div class="modal fade" id="img-comtv<?php echo $row['p_id'] ?>">
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
                                            <div class="pop-item">
                                                <video width="700" height="600" controls autoplay muted loop style="margin-top: -80px;">
                                                    <source src="controller/<?php echo $row['p_post'] ?>" type="video/mp4">

                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="user">
                                            <figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="width:50px;height:50px;object-fit:cover"></figure>
                                            <div class="user-information">
                                                <h4><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a></h4>
                                                <span><i class="fa fa-globe"></i> <?php echo $row['p_date'] ?> </span>
                                            </div>

                                        </div>
                                        <div class="we-video-info">
                                            <ul>

                                                <li>


                                                    <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row['p_id'] ?>)" style="background: none;border:none">❤<span id="likecount<?php echo $postid ?>" style="margin-left: 8px;">
                                                            <?php

                                                            $stmt5 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$postid'");
                                                            $num1 = $stmt5->rowCount();
                                                            echo $num1; ?>
                                                        </span></button>



                                                </li>
                                                <li>
                                                    <span class="comment" title="Comments">
                                                        <i class="fa fa-commenting"></i>
                                                        <?php

                                                        $stmt10 = $admin->ret("SELECT * FROM `comment` WHERE `p_id`='$postid'");
                                                        $cmtcount = $stmt10->rowCount();
                                                        ?>
                                                        <ins><?php echo $cmtcount ?></ins>
                                                    </span>
                                                </li>
                                            </ul>

                                        </div>

                                        <div class="coment-area" style="display: block;">
                                            <div id="commentttt<?php echo $postid; ?>" class="we-comet">
                                                <?php

                                                $stmt5 = $admin->ret("SELECT * FROM `comment` inner join `profile` on comment.user_id=profile.l_id WHERE `p_id`='$postid'");
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
                                                    $stmt3 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
                                                    while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <img src="controller/<?php echo $row3['img'] ?>" alt="" style="width:40px;height:40px;object-fit:cover">
                                                    <?php } ?>
                                                </div>
                                                <div class="post-comt-box">
                                                    <form>
                                                        <input type="hidden" id="piddd<?php echo $postid; ?>" name="pid" value="<?php echo $postid; ?>">
                                                        <textarea name="cmt" id="cmttt<?php echo $postid; ?>" placeholder="Post your comment" required></textarea>


                                                        <button id="savecomment" onclick="addpost3(<?php echo $postid; ?>)" style="margin-bottom: 25px;color:black"> <i class="fa fa-paper-plane"></i></button>
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
        
        ?>
    </div>


    <script>
        function addpost(postid) {
            var pid = document.getElementById('pid' + postid).value;
            var cmt = document.getElementById('cmt' + postid).value;

            if(cmt == "")
            {
                alert('Please enter comment...!');
                return false;
            }
            else
            {
                xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("commentt" + postid).innerHTML = xmlhttp.responseText;
                    }

                }
                xmlhttp.open("GET", "controller/addcomment.php?pid=" + pid + "&cmt=" + cmt, true);
                xmlhttp.send();
            }
            
        }

        function addpost2(postid) {
            var pid = document.getElementById('pidd' + postid).value;
            var cmt = document.getElementById('cmtt' + postid).value;


            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("commenttt" + postid).innerHTML = xmlhttp.responseText;
                }

            }
            xmlhttp.open("GET", "controller/addcomment.php?pid=" + pid + "&cmt=" + cmt, true);
            xmlhttp.send();
        }

        function addpost3(postid) {
            var pid = document.getElementById('piddd' + postid).value;
            var cmt = document.getElementById('cmttt' + postid).value;


            xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("commentttt" + postid).innerHTML = xmlhttp.responseText;
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






</body>

</html>