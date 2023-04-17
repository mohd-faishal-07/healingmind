<?php include('partials-front/menu.php'); ?>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">Departments</h2>

            <?php 

                
                $sql = "SELECT * FROM tbl_departments WHERE active='Yes'";

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
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/departments/<?php echo $image_name; ?>" alt="Neurology" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
<br><br><br><br><br><br>
                                <h3 class="float-text text-white" style="color:black"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Departments not found.</div>";
                }
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>


    <?php include('partials-front/footer.php'); ?>
