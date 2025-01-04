<?php
include 'config.php';
$admin=new Admin();

if(!isset($_SESSION['lid'])){
    header('Location:login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>College Hive</title>
    <link rel="icon" href="images/fav.png"  sizes="16x16">

    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/toast-notification.css">
    <link rel="stylesheet" href="css/page-tour.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
   
    <div class="theme-layout">

        <div class="postoverlay"></div>

        <!-- responsive header -->

        <?php
        include 'navbar.php';
        ?>
        <!-- topbar -->

        <?php
        include 'rightsidebar.php';
        ?>
        <!-- right sidebar user chat -->

        <?php
        include 'leftsidebar.php';
        ?>
        <!-- left sidebar menu -->

        <section>
            <div class="gap2 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row merged20" id="page-contents">
                                <div class="col-lg-3">
                                    <aside class="sidebar static left">
                                        
                                        <?php
                                        include 'whoisfollowing.php';
                                        ?>
                                        <!-- who's following -->
                                      
                                     <?php
                                     include 'shortcut.php';
                                     ?> 
                                     <!-- Shortcuts -->

                                    </aside>
                                </div><!-- sidebar -->
                                <div class="col-lg-6">
                                  
                              <!-- add post new box -->

                            
                                    <!-- suggested friends -->
                                
                                   <?php
                                include 'post.php';
                                   ?>
                                </div><!-- centerl meta -->
                                <div class="col-lg-3">
                                    <aside class="sidebar static right">
                                     
                                        <?php
                                        include 'events.php';
                                        ?><!-- page like widget -->
                                     

                                     <?php
                                        include 'rightsideyourpage.php';
                                        ?>
                                     <!-- explore events -->
                                     <?php
                                        include 'sharedmaterial.php';
                                        ?>
                                       
                                    </aside>
                                </div><!-- sidebar -->
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
    <!-- side panel -->

    <div class="popup-wraper2">
        <div class="popup post-sharing">
            <span class="popup-closed"><i class="ti-close"></i></span>
            <div class="popup-meta">
                <div class="popup-head">
                    <select data-placeholder="Share to friends..." multiple class="chosen-select multi">
                        <option>Share in your feed</option>
                        <option>Share in friend feed</option>
                        <option>Share in a page</option>
                        <option>Share in a group</option>
                        <option>Share in message</option>
                    </select>
                    <div class="post-status">
                        <span><i class="fa fa-globe"></i></span>
                        <ul>
                            <li><a href="#" title=""><i class="fa fa-globe"></i> Post Globaly</a></li>
                            <li><a href="#" title=""><i class="fa fa-user"></i> Post Private</a></li>
                            <li><a href="#" title=""><i class="fa fa-user-plus"></i> Post Friends</a></li>
                        </ul>
                    </div>
                </div>
                <div class="postbox">
                    <div class="post-comt-box">
                        <form method="post">
                            <input type="text" placeholder="Search Friends, Pages, Groups, etc....">
                            <textarea placeholder="Say something about this..."></textarea>
                            <div class="add-smiles">
                                <span title="add icon" class="em em-expressionless"></span>
                                <div class="smiles-bunch">
                                    <i class="em em---1"></i>
                                    <i class="em em-smiley"></i>
                                    <i class="em em-anguished"></i>
                                    <i class="em em-laughing"></i>
                                    <i class="em em-angry"></i>
                                    <i class="em em-astonished"></i>
                                    <i class="em em-blush"></i>
                                    <i class="em em-disappointed"></i>
                                    <i class="em em-worried"></i>
                                    <i class="em em-kissing_heart"></i>
                                    <i class="em em-rage"></i>
                                    <i class="em em-stuck_out_tongue"></i>
                                </div>
                            </div>

                            <button type="submit"></button>
                        </form>
                    </div>
                    <figure><img src="images/resources/share-post.jpg" alt=""></figure>
                    <div class="friend-info">
                        <figure>
                            <img alt="" src="images/resources/admin.jpg">
                        </figure>
                        <div class="friend-name">
                            <ins><a title="" href="time-line.html"></a> share <a title="" href="#">link</a></ins>
                            <span></span>
                        </div>
                    </div>
                    <div class="share-to-other">
                        <span>Share to other socials</span>
                        <ul>
                            <li><a class="facebook-color" href="#" title=""><i class="fa fa-facebook-square"></i></a></li>
                            <li><a class="twitter-color" href="#" title=""><i class="fa fa-twitter-square"></i></a></li>
                            <li><a class="dribble-color" href="#" title=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a class="instagram-color" href="#" title=""><i class="fa fa-instagram"></i></a></li>
                            <li><a class="pinterest-color" href="#" title=""><i class="fa fa-pinterest-square"></i></a></li>
                        </ul>
                    </div>
                    <div class="copy-email">
                        <span></span>
                        <ul>
                            <li><a href="#" title="Copy Post Link"><i class="fa fa-link"></i></a></li>
                            <li><a href="#" title="Email this Post"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                    <div class="we-video-info">
                        <ul>
                            <li>
                                <span title="" data-toggle="tooltip" class="views" data-original-title="views">
                                    <i class="fa fa-eye"></i>
                                    <ins>1.2k</ins>
                                </span>
                            </li>
                            <li>
                                <span title="" data-toggle="tooltip" class="views" data-original-title="views">
                                    <i class="fa fa-share-alt"></i>
                                    <ins>20k</ins>
                                </span>
                            </li>
                        </ul>
                        <button class="main-btn color" data-ripple="">Submit</button>
                        <button class="main-btn cancel" data-ripple="">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- share popup -->

   <!-- report popup -->

    <div class="popup-wraper1">
        <div class="popup direct-mesg">
            <span class="popup-closed"><i class="ti-close"></i></span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5>Send Message</h5>
                </div>
                <div class="send-message">
                    <form method="post" class="c-form">
                        <input type="text" placeholder="Sophia">
                        <textarea placeholder="Write Message"></textarea>
                        <button type="submit" class="main-btn">Send</button>
                    </form>
                    <div class="add-smiles">
                        <div class="uploadimage">
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </div>
                        <span title="add icon" class="em em-expressionless"></span>
                        <div class="smiles-bunch">
                            <i class="em em---1"></i>
                            <i class="em em-smiley"></i>
                            <i class="em em-anguished"></i>
                            <i class="em em-laughing"></i>
                            <i class="em em-angry"></i>
                            <i class="em em-astonished"></i>
                            <i class="em em-blush"></i>
                            <i class="em em-disappointed"></i>
                            <i class="em em-worried"></i>
                            <i class="em em-kissing_heart"></i>
                            <i class="em em-rage"></i>
                            <i class="em em-stuck_out_tongue"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- send message popup -->

   <!-- The Scrolling Modal image with comment -->

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
    <script>
        jQuery(document).ready(function($) {

            $('#us3').locationpicker({
                location: {
                    latitude: -8.681013,
                    longitude: 115.23506410000005
                },
                radius: 0,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function(currentLocation, radius, isMarkerDropped) {
                    // Uncomment line below to show alert on each Location Changed event
                    //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                }
            });

        });
    </script>

</body>
</html>