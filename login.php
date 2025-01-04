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
    <link rel="stylesheet" href="css/weather-icon.css">
    <link rel="stylesheet" href="css/weather-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">



</head>

<body>
    <div class="www-layout">
        <section>
            <div class="gap no-gap signin whitish medium-opacity">
                <div class="bg-image" style="background-image:url(images/login.jpg)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="big-ad">
                                <i class="fa fa-graduation-cap" style="margin-left:50px;font-size:100px;color:black"></i>
                                <h1 style="font-weight: bolder;">College-Hive</h1>
                                <h1>Welcome to College-Hive</h1>
                                <p style="color:black;font-size:18px;">
                                College Hive is a social network platform that can be used to connect students and create a vibrant community. By joining College Hive, you have the opportunity to make cool friends and expand your network of connections. It's a place where you can connect with fellow students, share experiences, and explore the exciting world of college life together. Within the College Hive community, you'll have the chance to discover new opportunities and experiences that are unique to your college. Embrace the power of connection and friendship as you navigate your college journey with College Hive. Login now and unlock a world of possibilities.
                                </p>


                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="we-login-register">
                                <div class="form-title">
                                    <i class="fa fa-key"></i>login
                                    <span style="color:white;">sign in now and meet the awesome Friends .</span>
                                </div>
                                <form class="we-form" action="controller/login.php" method="post" >
                                    <input type="email" name="email" placeholder="Email" required>
                                    <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <?php
                                    if (isset($_GET['er1'])) { ?>
                                        <label>**Wrong password,please try again.</label>
                                    <?php    } elseif (isset($_GET['er2'])) { ?>
                                        <label>**You are not a valid user.</label>
                                    <?php    }
                                    ?>
                                    <button type="submit" name="login">sign in</button>
                                    <!-- <a class="forgot underline" href="#" title="">forgot password?</a> -->
                                </form>


                                <div>
                                    <a href="" data-toggle="modal" data-target="#exampleModal">forgot password?</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Enter Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="controller/enteremail.php" method="post">
                                <label for="">Enter Your Email</label><br>
                                <input type="email" placeholder="Enter Email" name="email" class="form-control" required>
                                <input type="submit" class="btn btn-info" style="margin-top: 10px;" name="enteremail">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="js/main.min.js"></script>
    <script src="js/script.js"></script>
</body>


</html>