        <?php include('partials-front/menu.php'); ?>

    <?php 
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tbl_departments WHERE id=$category_id";

            $res = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($res);
          
            $category_title = $row['title'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    ?>


    <section class="service-search text-center">
        <div class="container">
            
            <h2><a href="#" class="text-red">Services on "<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>



    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">Services Menu</h2>

            <?php 
            
                $sql2 = "SELECT * FROM tbl_services WHERE category_id=$category_id";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
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
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
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
                    echo "<div class='error'>Service not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>

    <?php include('partials-front/footer.php'); ?>