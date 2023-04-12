        <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_departments WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>


    <!-- service sEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            
            <h2><a href="#" class="text-red">Departments on "<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- service sEARCH Section Ends Here -->



    <!-- service MEnu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Departments Menu</h2>

            <?php 
            
                //Create SQL Query to Get services based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_services WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether service is available or not
                if($count2>0)
                {
                    //service is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="service-menu-box">
                            <div class="service-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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

                                <a href="<?php echo SITEURL; ?>bookings.php?id=<?php echo $id; ?>" class="btn btn-primary"style="background-color:red">Book Now-></a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //service not available
                    echo "<div class='error'>Service not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- service Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>