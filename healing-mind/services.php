
    <?php include('partials-front/menu.php'); ?>

    <!-- service sEARCH Section Starts Here -->
    <section class=" text-center">
        <div class="container">
            
        </div>
    </section>
    <!-- service sEARCH Section Ends Here -->
    
    <!-- service MEnu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Available Services</h2>
            <?php 
                //Display services that are Active
                $sql = "SELECT * FROM tbl_services WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the services are availalable or not
                if($count>0)
                {
                    //services Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="service-menu-box">
                            <div class="service-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="services" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="service-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="service-price">Rs.<?php echo $price; ?></p>
                                <p class="service-details">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>bookings.php?id=<?php echo $id; ?>" class="btn btn-primary"style="background-color:red">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //service not Available
                    echo "<div class='error'>Service not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- service Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>