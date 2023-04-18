
<?php include('partials-front/menu.php'); ?>
    <section class="service-search text-center">
        <div class="container">
            
            <marquee behavior="alternate" direction="right"> <h1>Welcome to Healing Mind Super-Speciality Hospital</h1></marquee>
            
            </div>

    </section>
    
    <?php 
        if(isset($_SESSION['bookings']))
        {
            echo $_SESSION['bookings'];
            unset($_SESSION['bookings']);
        }
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore The Available Departments</h2>

            <?php 
                $sql = "SELECT * FROM tbl_departments WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";
                
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>departments-category.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/departments/<?php echo $image_name; ?>" alt="Hospital" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
<br><br><br><br><br><br>
                                <h3 class="float-text text-white" ><mark style="background-color:lightsteelblue;"><?php echo $title; ?></mark></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'> No Service Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>


    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Explore the Services</h2>

            <?php 
            
            $sql2 = "SELECT * FROM tbl_services WHERE active='Yes' AND featured='Yes' LIMIT 4";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0)
            {
                while($row=mysqli_fetch_assoc($res2))
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
                                    echo "<div class='error'>Image not available.</div>";
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
                echo "<div class='error'>Service not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="services.php">See All Servies</a>
        </p>
    </section>

    
    <?php include('partials-front/footer.php'); ?>
