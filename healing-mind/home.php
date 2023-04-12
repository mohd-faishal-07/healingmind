
<?php include('partials-front/menu.php'); ?>
    <!-- service sEARCH Section Starts Here -->
    <section class="service-search text-center">
        <div class="container">
            
            <marquee behavior="alternate" direction="right"> <h1>Welcome to Healing Mind Super-Speciality Hospital</h1></marquee>
            
            </div>

    </section>
    <!-- service sEARCH Section Ends Here -->
    
    <?php 
        if(isset($_SESSION['bookings']))
        {
            echo $_SESSION['bookings'];
            unset($_SESSION['bookings']);
        }
    ?>
    <!-- top Restaurant Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore The Available Departments</h2>

            <?php 
                //Create SQL Query to Display Restaurant from Database
                $sql = "SELECT * FROM tbl_departments WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>departments-category.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/departments/<?php echo $image_name; ?>" alt="Hospital" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
<br><br><br><br><br><br>
                                <h3 class="float-text text-white" ><mark style="background-color:white;"><?php echo $title; ?></mark></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'> No Service Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- service MEnu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Explore the Services</h2>

            <?php 
            
            //Getting services from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_services WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether service available or not
            if($count2>0)
            {
                //service Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="service-menu-box">
                        <div class="service-menu-img">
                            <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="Departments" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="service-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="service-price">Rs. <?php echo $price; ?></p>
                            <p class="service-detail">
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
                //service Not Available 
                echo "<div class='error'>Service not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="services.php">See All Servies</a>
        </p>
    </section>
    <!-- service Menu Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>
