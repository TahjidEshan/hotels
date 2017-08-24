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