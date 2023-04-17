
    <?php include('partials-front/menu.php'); ?>

    <section class="service-search text-center">
        <div class="container">
            


            <h2><a href="#" class="text-white">Service on Your Search"<?php echo $search; ?>"</a></h2>

        </div>
    </section>



    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Services</h2>

            <?php 
                $sql = "SELECT * FROM tbl_services WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="service-menu-box">
                            <div class="service-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="Departments" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="service-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="service-price">Rs.<?php echo $price; ?></p>
                                <p class="service-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>bookings.php?id=<?php echo $id; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Services not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <?php include('partials-front/footer.php'); ?>