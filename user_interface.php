<?php
session_start();
include 'db.php';
if(isset($_SESSION['role'])=='user'){
    $query= mysqli_query($con,"SELECT * FROM `finforex_users` WHERE `userid`='".$_SESSION['userid']."' AND  `role`='user' ");
    $arr = mysqli_fetch_array($query);
    $num = mysqli_num_rows($query); 
    if($num==1){
?>
    <!DOCTYPE html>

    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="ThemeStarz">

        <link href="assets\fonts\font-awesome.css" rel="stylesheet" type="text/css">
        <link href="assets\fonts\elegant-fonts.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets\css\zabuto_calendar.min.css" type="text/css">
        <link rel="stylesheet" href="assets\css\owl.carousel.css" type="text/css">

        <link rel="stylesheet" href="assets\css\trackpad-scroll-emulator.css" type="text/css">
        <link rel="stylesheet" href="assets\css\style.css" type="text/css">

        <title>Locations in Dhaka</title>

    </head>

    <body class="nav-btn-only homepage">
        <div class="page-wrapper">
            <header id="page-header">
                <nav>
                    <div class="left">
                        <a href="index.html" class="brand"><img src="assets\img\logo.png" alt=""></a>
                    </div>
                    <!--end left-->
                    <div class="right">
                        <div class="primary-nav has-mega-menu">
                            <ul class="navigation">
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                            <!--end navigation-->
                        </div>
                        <!--end primary-nav-->
                        <div class="secondary-nav">
                            <a href="logout.php">Sign Out</a>
                        </div>
                        <!--end secondary-nav-->
                        <div class="nav-btn">
                            <i></i>
                            <i></i>
                            <i></i>
                        </div>
                        <!--end nav-btn-->
                    </div>
                    <!--end right-->
                </nav>
                <!--end nav-->
            </header>
            <!--end page-header-->

            <div id="page-content">
                <div class="hero-section has-background height-500px">
                    <div class="wrapper">
                        <div class="inner">
                            <div class="container">
                                <div class="page-title center">
                                    <h1>Locations in Dhaka</h1>
                                    <h2>Loren Ipsum</h2>
                                </div>
                                <div class="form search-form horizontal">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="keyword" placeholder="Enter keyword">
                                                </div>
                                                <!--end form-group-->
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary pull-right darker btn-rounded"><i class="fa fa-search"></i>&nbsp; Search</button>
                                                </div>
                                                <!--end form-group-->
                                            </div>
                                            <!--end col-md-4-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                    <!--end form-hero-->
                                </div>
                                <!--end form-->
                            </div>
                        </div>
                    </div>
                    <div class="background-wrapper">
                        <div class="bg-transfer opacity-50"><img src="assets\img\background-06.jpg" alt=""></div>
                        <div class="background-color background-color-black"></div>
                    </div>
                    <!--end background-wrapper-->
                </div>
                <!--end hero-section-->

                <section class="block background-is-dark">
                    <div class="container">
                        <div class="section-title vertical-aligned-elements">
                            <div class="element">
                                <h2>Promoted Locations</h2>
                            </div>
                            <div class="element text-align-right">
                                <a href="#" class="btn btn-framed btn-rounded btn-default invisible-on-mobile">Promote yours</a>
                                <div id="gallery-nav"></div>
                            </div>
                        </div>
                        <!--end section-title-->
                    </div>
                    <div class="gallery featured">
                        <?php
                    $sql="SELECT * from locations, Location_Type, promoted_Locations, price_range where locations.place_id=promoted_Locations.loc_id=Location_Type.location_id=price_range.range_id";
                    $result=mysqli_query($con,$sql);
				?>
                            <div class="owl-carousel" data-owl-items="<?php echo mysqli_num_rows($result);?>" data-owl-loop="1" data-owl-auto-width="1"
                                data-owl-nav="1" data-owl-dots="1" data-owl-nav-container="#gallery-nav">
                                <?php
                    while($row = $result->fetch_array()){
                        $rows[] = $row;
                    }
                    foreach($rows as $row){
                    
                ?>
                                    <div class="item featured" data-id="1">
                                        <a href="detail.html">
                                            <div class="description">
                                                <figure>Average Price:
                                                    <?php echo $row['price_range'];?>
                                                </figure>
                                                <div class="label label-default">
                                                    <?php echo $row['location_type_Name'];?>
                                                </div>
                                                <h3>
                                                    <?php echo $row['Name'];?>
                                                </h3>
                                                <h4>
                                                    <?php echo $row['Address'];?>
                                                </h4>
                                            </div>
                                            <!--end description-->
                                            <div class="image bg-transfer">
                                                <img src="assets\img\items\1.jpg" alt="">
                                            </div>
                                            <!--end image-->
                                        </a>
                                        <div class="additional-info">
                                            <div class="rating-passive" data-rating="<?php echo $row['avg_rating'];?>">
                                                <span class="stars"></span>
                                                <span class="reviews">6</span>
                                            </div>
                                            <div class="controls-more">
                                                <ul>
                                                    <li><a href="#">Add to favorites</a></li>
                                                    <li><a href="#">Add to watchlist</a></li>
                                                    <li><a href="#" class="quick-detail">Quick detail</a></li>
                                                </ul>
                                            </div>
                                            <!--end controls-more-->
                                        </div>
                                        <!--end additional-info-->
                                    </div>
                                    <?php
                    }
                    ?>
                            </div>
                    </div>
                    <!--end gallery-->
                    <div class="background-wrapper">
                        <div class="background-color background-color-black opacity-90"></div>
                        <div class="background-color background-color-default opacity-30"></div>
                    </div>
                    <!--end background-wrapper-->
                </section>
                <!--end block-->

                <section class="block">
                    <div class="container">
                        <div class="center">
                            <div class="section-title">
                                <div class="center">
                                    <h2>Recent Places</h2>
                                    <h3 class="subtitle">Fusce eu mollis dui, varius convallis mauris. Nam dictum id</h3>
                                </div>
                            </div>
                            <!--end section-title-->
                        </div>
                        <!--end center-->
                        <?php
                    $sql1="SELECT * from locations, Location_Type, price_range where locations.place_id=Location_Type.location_id=price_range.range_id";
                    $result1=mysqli_query($con,$sql1); 
                  

				?>
                            <div class="row">
                                <?php
                              while($row1 = $result1->fetch_array()){
                        $rows1[] = $row1;
                    }
                    foreach($rows1 as $row){
                            ?>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="item" data-id="1">
                                            <a href="detail.html">
                                                <div class="description">
                                                    <figure>Average Price:
                                                        <?php echo $row['price_range'];?> </figure>
                                                    <div class="label label-default">
                                                        <?php echo $row['location_type_Name'];?>
                                                    </div>
                                                    <h3>
                                                        <?php echo $row['Name'];?>
                                                    </h3>
                                                    <h4>
                                                        <?php echo $row['Address'];?>
                                                    </h4>
                                                </div>
                                                <!--end description-->
                                                <div class="image bg-transfer">
                                                    <img src="assets\img\items\1.jpg" alt="">
                                                </div>
                                                <!--end image-->
                                            </a>
                                            <div class="additional-info">
                                                <div class="rating-passive" data-rating="<?php echo $row['avg_rating'];?>">
                                                    <span class="stars"></span>
                                                    <span class="reviews">6</span>
                                                </div>
                                                <div class="controls-more">
                                                    <ul>
                                                        <li><a href="#">Add to favorites</a></li>
                                                        <li><a href="#">Add to watchlist</a></li>
                                                        <li><a href="#" class="quick-detail">Quick detail</a></li>
                                                    </ul>
                                                </div>
                                                <!--end controls-more-->
                                            </div>
                                            <!--end additional-info-->
                                        </div>
                                        <!--end item-->
                                    </div>
                                    <?php
}
?>
                                    <!--<end col-md-3-->
                            </div>
                            <!--end row-->
                            <div class="center">
                                <a href="listing.html" class="btn btn-primary btn-light-frame btn-rounded btn-framed arrow">View all listings</a>
                            </div>
                            <!--end center-->
                    </div>
                    <!--end container-->
                </section>
                <!--end block-->
                <div class="container">
                    <hr>
                </div>

                <!--end block-->
                <section class="block big-padding">
                    <div class="container">
                        <div class="vertical-aligned-elements">
                            <div class="element width-50">
                                <h3 style="color:black;">Subscribe and be notified about new locations</h3>
                            </div>
                            <!--end element-->
                            <div class="element width-50">
                                <form class="form form-email inputs-underline" id="form-subscribe">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" placeholder="Your email" required="">
                                        <span class="input-group-btn">
                                    <button class="btn" type="submit"><i class="arrow_right"></i></button>
                                </span>
                                    </div>
                                    <!-- /input-group -->
                                </form>
                                <!--end form-->
                            </div>
                            <!--end element-->
                        </div>
                        <!--end vertical-aligned-elements-->
                    </div>
                    <!--end container-->
                    <div class="background-wrapper">
                        <div class="background-color background-color-black opacity-5"></div>
                    </div>
                    <!--end background-wrapper-->
                </section>
                <!--end block-->

                <!--end block-->

                <div class="container">
                    <hr>
                </div>
                <!--end container-->

                <!--end block-->
            </div>
            <!--end page-content-->

            <footer id="page-footer">
                <div class="footer-wrapper">
                    <div class="block">
                        <div class="container">
                            <div class="vertical-aligned-elements">
                                <div class="element width-50">
                                    <p>Lorem ipsum dolor sit amet <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                                </div>
                                <div class="element width-50 text-align-right">
                                    <a href="#" class="circle-icon"><i class="social_twitter"></i></a>
                                    <a href="#" class="circle-icon"><i class="social_facebook"></i></a>
                                    <a href="#" class="circle-icon"><i class="social_youtube"></i></a>
                                </div>
                            </div>
                            <div class="background-wrapper">
                                <div class="bg-transfer opacity-50">
                                    <img src="assets\img\footer-bg.png" alt="">
                                </div>
                            </div>
                            <!--end background-wrapper-->
                        </div>
                    </div>
                    <div class="footer-navigation">
                        <div class="container">
                            <div class="vertical-aligned-elements">
                                <div class="element width-50">(C) 2016 Your Company, All right reserved</div>
                                <div class="element width-50 text-align-right">
                                    <a href="index.html">Home</a>
                                    <a href="contact.html">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--end page-footer-->
        </div>
        <!--end page-wrapper-->
        <a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>

        <script type="text/javascript" src="assets\js\jquery-2.2.1.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="assets\bootstrap\js\bootstrap.min.js"></script>
        <script type="text/javascript" src="assets\js\bootstrap-select.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
        <script type="text/javascript" src="assets\js\richmarker-compiled.js"></script>
        <script type="text/javascript" src="assets\js\markerclusterer_packed.js"></script>
        <script type="text/javascript" src="assets\js\infobox.js"></script>
        <script type="text/javascript" src="assets\js\jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.fitvids.js"></script>
        <script type="text/javascript" src="assets\js\bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets\js\icheck.min.js"></script>
        <script type="text/javascript" src="assets\js\owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.trackpad-scroll-emulator.min.js"></script>
        <script type="text/javascript" src="assets\js\custom.js"></script>
        <script type="text/javascript" src="assets\js\maps.js"></script>

    </body>

    </html>

    <?php   
    }else{
        header ("location:login.php");
    }
}else
    header ("location:login.php");
    
?>