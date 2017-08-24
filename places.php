
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
                                            <img src="https://maps.googleapis.com/maps/api/streetview?size=640x340&location=<?php echo $row['lat']; ?>,<?php echo $row['lat']; ?>7&key=AIzaSyBreIO04z4B5LNTrz5_dTos8zA6pGg1RW8


" alt="">
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