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
    <style>
        #preview {
            max-width: 300px;
            max-height: 300px;
        }
    </style>

    <head>
        <!-- Include Cropper.js library -->
        <link rel="stylesheet" href="css/cropper.css">
        <script src="js/cropper.js"></script>
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
                                            <a href="editprofile.php" title="" class="btn btn-info">Update Profile</a>
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
                                                                        <div id="imageContainer">

                                                                        </div>
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
                                                        <a class="active" href="mypost.php">Photos</a>
                                                    </li>
                                                    <li>
                                                        <a class="" href="myvideopost.php">Videos</a>
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
                                                        <h5>Photos</h5>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- title block -->
                                    <div class="central-meta">
                                        <div class="row merged5">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <div class="item-box">
                                                    <div class="item-upload album">
                                                        <i class="fa fa-plus-circle"></i>
                                                        <div class="upload-meta">
                                                            <h5>Upload photo or album</h5>
                                                            <span>its only take a few seconds!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php

                                            $stmt2 = $admin->ret("SELECT * FROM `post` WHERE `l_id`='$id' ORDER BY `p_id` DESC");
                                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                $file_extension = pathinfo($row2['p_post'], PATHINFO_EXTENSION); // get the file extension

                                                if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-box">
                                                            <a href="#" title="" data-toggle="modal" data-target="#exampleModalCenterr<?php echo $row2['p_id'] ?>">
                                                                <img src="controller/<?php echo $row2['p_post'] ?>" alt="" style="width: 250px;height:173px;object-fit:cover"> </a>
                                                            <div class="over-photo">
                                                                <?php
                                                                $pidd = $row2['p_id'];
                                                                $stmt11 = $admin->ret("SELECT * FROM `likedislike` WHERE `post_id`='$pidd'");
                                                                $likecount = $stmt11->rowCount();
                                                                ?>
                                                                <a title=""><i class="fa fa-heart"></i><?php echo $likecount ?></a>

                                                                <a href="controller/deletepost.php?pid=<?php echo $pidd ?>"><i class="fa fa-trash" style="margin-left: 190px;"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>




                                                    <div class="modal fade" id="exampleModalCenterr<?php echo $row2['p_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="user">
                                                                        <figure><img src="controller/<?php echo $row['img'] ?>" alt="" style="width: 50px;height:50px"></figure>
                                                                        <div class="user-information">
                                                                            <h4><a href="about.php?lid=<?php echo $row['l_id'] ?>" title=""><?php echo $row['username'] ?></a></h4>
                                                                            <span><?php echo $row2['p_date'] ?></span>
                                                                        </div>

                                                                    </div>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col-lg-4">


                                                                    </div>
                                                                    <div>
                                                                        <div class="pop-image">
                                                                            <div class="pop-item">
                                                                                <figure><img src="controller/<?php echo $row2['p_post'] ?>" alt=""></figure>

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
                                            <h5>Upload Pictures</h5>
                                            </div>
                                            <div class="upload-boxes">
                                                <form action="controller/addpost.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="smal-box">
                                                                <label class="fileContainer">
                                                                    <i class=" ti-layout-media-center-alt"></i>
                                                                    <input type="file" id="imageUpload" name="post" onchange="checkFileSize(this); checkFileType(this); previewImage(event);" required>


                                                                    <em>Upload New</em>
                                                                    <span>Choose form Computer</span>
                                                                    <p>Upload the image upto the limit of 6MB.</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <img id="preview" src="#" alt="">
                                                    </div>

                                                    <div>
                                                        <label for="">Caption</label>
                                                        <textarea name="caption" id="" cols="30" rows="4" class="form-class" placeholder="Capiton...." style="border: 1px solid orange;" ></textarea>
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
                            The file size exceeds the limit of 6MB.
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
                            Only image files are allowed.
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
       

        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var image = document.getElementById('preview');
                image.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        }

        function checkFileSize(input) {
            var file = input.files[0];
            var fileSize = file.size / 1024; // File size in KB

            // Check if the file exists and its size is within the limit (4MB)
            if (file && fileSize > 6144) {
                $('#fileSizeModal').modal('show');
                input.value = ""; // Clear the input field
            }
        }

        function checkFileType(input) {
            var file = input.files[0];
            var fileType = file.type;

            // Check if the file type is an image
            if (file && !fileType.startsWith('image/')) {
                $('#fileTypeModal').modal('show');
                input.value = ""; // Clear the input field
            }
        }
    </script>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        var croppedData = null; // Variable to store the cropped image data

        function handleDPChange(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement("img");
                img.src = e.target.result;

                var imageContainer = document.getElementById("imageContainer");
                imageContainer.innerHTML = "";
                imageContainer.appendChild(img);

                var cropper = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 2,
                    autoCropArea: 0.5,
                    crop: function(event) {
                        croppedData = cropper.getCroppedCanvas().toDataURL();
                        document.getElementById("croppedImageInput").value = croppedData;
                        console.log("Cropped image data:", croppedData);
                    }
                });
            };

            reader.readAsDataURL(file);
        }
    </script>


</body>

<!-- Mirrored from wpkixx.com/html/pitnik/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:15 GMT -->

</html>