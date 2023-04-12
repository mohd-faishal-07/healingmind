<?php include('config/constants.php'); ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    
<!-- Important to make website responsive -->
 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   <title>Healing Multi-Speciality Hospital</title>

   
 <!-- Link our CSS file -->
 
 <link rel="stylesheet" type="text/css" href="css/all.css">

</head>


<body>

    <!-- Navbar Section Starts Here -->
  
  <section class="navbar">
  
      <div class="container">
     
       <div class="logo">
 
               <a href="#" title="Logo">
      
              <img src="images/healinglogo.png" alt="Healing Logo" class="img-responsive">
         </a>
    
        </div>

    
        <div class="menu text-left">
      
          <ul>
        
            <li>
   
                <a href="<?php echo SITEURL ; ?>home.php" >Home</a>
   
                 </li>
     
               <li>
        
                <a href="<?php echo SITEURL; ?>departments.php">Departments</a>
     
               </li>
     
               <li>
         
               <a href="<?php echo SITEURL; ?>services.php">Services</a>
        
            </li>
  
                  <li>
       
             <a href="<?php echo SITEURL; ?>contacts.php">Contact</a>
     
               </li>
      
              <li>
     
                   <a href="<?php echo SITEURL; ?>login.php"style=>Logout</a>
      
              </li>
       
         </ul>
    
        </div>

     
       <div class="clearfix"></div>

        </div>
   
 </section>
  
  <!-- Navbar Section Ends Here -->