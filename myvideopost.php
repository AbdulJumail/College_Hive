<?php
include 'config.php';
$admin = new Admin();

$id = $_SESSION['lid'];



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Include Cropper.js library -->
    <link rel="stylesheet" href="css/cropper.css">
    <script src="js/cropper.js"></script>

    <style>
        #preview {
            max-width: 300px;
            max-height: 400px;
            
        }
    </style>


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

                                        <ul class="profile-controls">
                                            <a href="editprofile.php" title="" class="btn btn-info">Update Profile </a>
                                        </ul>

                                    </figure>

                                    <div class="profile-section">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3">
                                                <div class="profile-author">
                                                    <?php
                                                    $stmt = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");

                                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <div style="height: 250px;width:250px;margin-top:-100px">
                                                        <img alt="no profile image" src="controller/<?php echo $row['img'] ?>" style="height: 200px;width:200px;object-fit:cover;overflow-hidden:hidden;border-radius:100px">
                                                        <label>
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter1"><i class="fa fa-pencil" style="font-size: 22px;color:black"></i>Change DP</a>

                                                        </label>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Change your profile picture.</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="display: flex;gap:15px">
                                                                        <i class="fa fa-camera-retro" style="font-size: 22px;color:blue"></i>
                                                                        <h6>Upload Image</h6>
                                                                    </div>

                                                                    <form action="controller/editprofile.php" method="POST" enctype="multipart/form-data">
                                                                        <input type="file" class="form-control" accept="image/*" name="pimg" onchange="handleDPChange(event)" required>
                                                                        <div id="imageContainer"></div>
                                                                        <input type="hidden" name="croppedImage" id="croppedImageInput">
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit" name="editdp" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="author-content">
                                                        <?php
                                                        $stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$id'");
                                                        $num = $stmt2->rowCount();
                                                        if ($num == 0) {
                                                            $stmt3 = $admin->ret("SELECT * FROM `login` WHERE `l_id`='$id'");
                                                            $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                                        ?>

                                                            <a class="h4 author-name" style="color: black;"><?php echo $row3['name'] ?></a>
                                                        <?php  } else {
                                                        ?>
                                                            <a class="h4 author-name" style="color: black;"><?php echo $row['username'] ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-9">
                                                <ul class="profile-menu">

                                                    <li>
                                                        <a class="" href="myprofile.php">About</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="myfollower.php">Friends</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="mypost.php">Photos</a>
                                                    </li>
                                                    <li>
                                                        <a class="active" href="myvideopost.php">Videos</a>
                                                    </li>

                                                </ul>
                                                <ol class="folw-detail">
                                                    <?php
                                                    $stmt10 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `following_id`='$lid' AND `fl_status`='following'");
                                                    $row10 = $stmt10->fetch(PDO::FETCH_ASSOC);
                                                    $a = implode($row10);

                                                    $stmt11 = $admin->ret("SELECT COUNT(*) FROM `followers` WHERE `user_id`='$lid' AND `fl_status`='following'");
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

                                                        <h5>Videos </h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- title block -->
                                    <div class="central-meta">
                                        <div class="row merged5">
                                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
                                                <div class="item-box" style="height: 260px;">
                                                    <div class="item-upload album">
                                                        <i class="fa fa-plus-circle"></i>
                                                        <div class="upload-meta">
                                                            <h5>Upload videos</h5>
                                                            <span>its only take a few seconds!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php

                                            $stmt2 = $admin->ret("SELECT * FROM `post` WHERE `l_id`='$id' ORDER BY `p_id` DESC");
                                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                $file_extension = pathinfo($row2['p_post'], PATHINFO_EXTENSION);
                                                if (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv'))) { ?>
                                                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-box">

                                                            <a href="controller/<?php echo $row2['p_post'] ?>" title="" data-strip-group="mygroup" class="strip" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }"><img src="controller/<?php echo $row2['p_post'] ?>" alt="">
                                                                <i>
                                                                    <a href="#" title="" data-toggle="modal" data-target="#exampleModalCenterv<?php echo $row2['p_id'] ?>">
                                                                        <video width="650" height="440" controls autoplay muted style="margin-top: -100px;margin-bottom:-100px">
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
                                                                <a href="controller/deletevideopost.php?pid=<?php echo $pidd ?>"><i class="fa fa-trash" style="margin-left: 240px;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" id="exampleModalCenterv<?php echo $row2['p_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content" style="height: 450px;">
                                                                <div class="modal-header">
                                                                    <div class="user">
                                                                        <figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="width: 50px;height:50px"></figure>
                                                                        <div class="user-information">
                                                                            <h4><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a></h4>
                                                                            <span><?php echo $row2['p_date'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button> -->
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-lg-4">


                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            <div class="pop-item">
                                                                                <video width="470" height="470" controls autoplay muted style="margin-top: -100px;margin-bottom:-100px">
                                                                                    <source src="controller/<?php echo $row2['p_post'] ?>" type="video/mp4">

                                                                                    Your browser does not support the video tag.
                                                                                </video>

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


                                <div class="popup-wraper5">
                                    <div class="popup">
                                        <span class="popup-closed"><i class="ti-close"></i></span>
                                        <div class="popup-meta">
                                            <div class="popup-head">
                                                <h5>Upload Videos</h5>
                                            </div>
                                            <div class="upload-boxes">
                                                <form action="controller/addpost.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="smal-box">
                                                                <label class="fileContainer">
                                                                    <i class=" ti-layout-media-center-alt"></i>
                                                                    <input type="file" id="videoUpload" name="post" onchange="checkFileSize(this);handleFileUpload(event);" required>
                                                                    <em>Upload New</em>
                                                                    <span>Choose from Computer</span>
                                                                    <p>Upload the video up to the limit of 10MB.</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="videoPreviewContainer" style="display: none;">
                                                        <video id="preview" controls>
                                                            <source id="videoSource" src="#" type="video/mp4">
                                                        </video>
                                                    </div>
                                                    </div>

                                                    

                                                    <div>
                                                        <label for="caption">Caption</label>
                                                        <textarea name="caption" id="caption" cols="30" rows="4" class="form-class" placeholder="Caption..." style="border: 1px solid orange;" required></textarea>
                                                    </div>

                                                    <button class="main-btn" type="submit" name="addpost" title="" data-ripple="">Proceed</button>
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


            <!-- Modal -->
            <div class="modal fade" id="fileSizeModal" tabindex="-1" role="dialog" aria-labelledby="fileSizeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileSizeModalLabel">File Size Exceeded</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            The file size exceeds the limit of 10MB.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Invalid File Type -->
            <div class="modal fade" id="fileTypeModal" tabindex="-1" role="dialog" aria-labelledby="fileTypeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileTypeModalLabel">Invalid File Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Only video files with the extensions .mp4, .avi, .mov, and .mkv are allowed.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

        </section><!-- content -->


        <?php
        include 'footer.php';
        ?><!-- bottom bar -->
    </div>
    <!-- side panel -->

    <!-- send message popup -->

    <!-- report popup -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function handleFileUpload(event) {
            var videoFile = event.target.files[0];
            var videoPreview = document.getElementById('preview');
            var videoPreviewContainer = document.getElementById('videoPreviewContainer');

            if (videoFile && videoFile.type === 'video/mp4' || videoFile.type === 'video/quicktime') {
                var videoURL = URL.createObjectURL(videoFile);
                videoPreview.src = videoURL;
                videoPreviewContainer.style.display = 'block';
            } else {
                videoPreview.src = '';
                videoPreviewContainer.style.display = 'none';
            }
        }



        function checkFileSize(input) {
            var file = input.files[0];
            var fileSize = file.size / 1024; // File size in KB

            // Check if the file exists and its size is within the limit (4MB)
            if (file && fileSize > 10240) {
                $('#fileSizeModal').modal('show');
                // input.value = ""; // Clear the input field
            }

            // Check if the selected file is a video
            var allowedExtensions = /(\.mp4|\.avi|\.mov|\.mkv)$/i;
            if (!allowedExtensions.exec(input.value)) {
                $('#fileTypeModal').modal('show');
                // input.value = ""; // Clear the input field
            }
        }
    </script>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cropper1.js"></script>


</body>

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

</html>