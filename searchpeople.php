<?php
include 'config.php';
$admin = new Admin();

$id = $_SESSION['lid'];

$s = $_POST['searchp'];
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

        <?php
        include 'navbar.php';
        ?>

        <?php
        include 'rightsidebar.php';
        ?><!-- right sidebar user chat -->

        <?php
        include 'leftsidebar.php';
        ?><!-- left sidebar menu -->

        <section style="padding:100px">
            <div>
                <?php
                header("Cache-Control: no-cache, must-revalidate");

                ?>
                <div>
                <h3>Your search result. </h3>
                    <div class="central-meta padding30">
                        <div class="row">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `login` WHERE `name` LIKE '%$s%' AND `l_id` <> '$id'");
                            $num9=$stmt->rowCount();
                            if($num9>0){ 

                           
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $lid = $row['l_id'];

                                    $stmt2 = $admin->ret("SELECT * FROM `profile` WHERE `l_id`='$lid'");
                                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                        $fllid=$row2['l_id'];
                                        $path ="";
                                        if($fllid == "1"){
                                           $path = "admin/controller/".$row2['img'];
                                        }
                                        else{
                                           $path = "controller/".$row2['img'];
                                        }
                                ?>

                                        <div class="col-lg-3 col-md-6 col-sm-6">

                                            <div class="friend-box">
                                                <figure>
                                                    <img src="images/clgbg.jpg" alt="">

                                                </figure>

                                                <div class="frnd-meta">
                                                    <img src="<?php echo $path; ?>" alt="" style="width: 100px;height:100px;">
                                                    <div class="frnd-name">
                                                        <a href="about.php?lid=<?php echo $row2['l_id'] ?>" title=""><?php echo $row2['username'] ?></a>
                                                        <span>(<?php echo $row['department'] ?>)</span>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                            <?php } } }else  { ?>
                                <h4 style="color:red">No search Result!!</h4>
                            
                          <?php }  ?>
                        </div>

                    </div>



                </div>

            </div>

        </section>


    </div>



    <!-- send message popup -->

    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        function follow(lid) {


            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("GET", "controller/addfollow.php?lid=" + lid, true);
            xmlhttp.send();
        }

        function unfollow(lid) {


            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("GET", "controller/follow.php?lid=" + lid, true);
            xmlhttp.send();
        }
    </script>

</body>

<!-- Mirrored from wpkixx.com/html/pitnik/search-result.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 01:30:21 GMT -->

</html