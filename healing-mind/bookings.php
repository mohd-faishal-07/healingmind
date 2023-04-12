
<?php include('partials-front/menu.php'); ?>
    <?php 
        
        if(isset($_GET['id']))
        {
            
            $id = $_GET['id'];

            
            $sql = "SELECT * FROM tbl_services WHERE id=$id";
            
            $res = mysqli_query($conn, $sql);
        
            $count = mysqli_num_rows($res);
        
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                echo '<script>
                alert("Service not available");
                window.location = "home.php";
                </script>';
            }
        }
        else
        {
                echo '<script>
                alert("Succesfull");
                window.location = "home.php";
                </script>';
        }
    ?>

    <!-- service sEARCH Section Starts Here -->
    <section class="service-search2">
        <div class="container">
            
            <h2 class="text-center ">Fill this form to confirm the Service</h2>

            <form action="" method="POST" class="bookings">
                <fieldset>
                    <legend>Selected Servies</legend>

                    <div class="service-menu-img">
                        <?php 
                        
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/services/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="service-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="service" value="<?php echo $title; ?>">

                        <p class="service-price">Rs. <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="bookings-label">Quantity</div>
                        <input type="number" name="persons" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Details</legend>
                    <div class="bookings-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Aman Rana" class="input-responsive" required>

                    <div class="bookings-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="9898989898" class="input-responsive" required>

                    <div class="bookings-label">Email</div>
                    <input type="email" name="email" placeholder="abc@gmail.com" class="input-responsive" required>

                    <div class="bookings-label">Address</div>
                    <textarea name="address" rows="5" placeholder="House Number, Sector, City" class="input-responsive" required></textarea>

                    <div class="bookings-label">Appointment Date</div>
                    <input type="date" name="date" placeholder="12/12/2000" class="input-responsive" required>

                    <input type="submit" name="submit" value="Book Now" class="btn btn-primary"style="background-color:red">
                    
                </fieldset>

            </form>

            <?php 

                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $service = $_POST['service'];
                    $price = $_POST['price'];
                    $persons = $_POST['persons'];
                    

                    $total = $price * $persons; // total = price x persons

                    $booking_date = date("Y-m-d"); //bookings DAte

                    $status = "Booked";  // Booked

                    
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $appointment_date=$_POST['date'];
                    


                    //Save the bookings in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_bookings SET 
                        service = '$service',
                        price = $price,
                        persons = $persons,
                        total = $total,
                        booking_date = '$booking_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address',
                        appointment_date = '$appointment_date'
                    ";
                    
                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and bookings Saved
                        //$_SESSION['bookings'] = "<div class='success text-center'>service Ordered Successfully.</div>";
                        echo '<script>
                        alert("Service Booked for Selected Date");
                        window.location = "home.php";
                        </script>';
                    }
                    else
                    {
                        //Failed to Save bookings
                        $_SESSION['bookings'] = "<div class='error text-center'>Failed to book service.</div>";
                        echo '<script>
                        alert("Failed");
                        window.location = "home.php";
                        </script>';
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- service sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>