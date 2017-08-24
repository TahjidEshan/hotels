<?php
session_start();
include 'db.php';
if(isset($_SESSION['role'])=='user'){
    $query= mysqli_query($con,"SELECT * FROM `finforex_users` WHERE `userid`='".$_SESSION['userid']."' AND  `role`='user' ");
    $arr = mysqli_fetch_array($query);
    $num = mysqli_num_rows($query);
    if($num==1){
include_once 'header.php';
?>
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

<?php
    include_once 'promoted.php';
    include_once 'places.php';
    include_once 'subscribe.php';
?>


        <!--end block-->

        <!--end block-->

        <!--end block-->

        <div class="container">
            <hr>
        </div>
        <!--end container-->

        <!--end block-->
    </div>
    <!--end page-content-->


    <?php
    include_once 'footer.php';
    }else{
        header ("location:login.php");
    }
}else
    header ("location:login.php");

?>