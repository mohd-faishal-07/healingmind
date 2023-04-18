<html>
    <head>
        <title>Registration Healing Mind Super-Speciality Hospital</title>
        <link rel="stylesheet" type="text/css" href="style4.css">
    </head>
    <body>
   <img src="healinglogo.png" class="healing">
    <div class="registerbox">

            <h2>Register Here</h2>
                <form action="userregister.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Name" required ><br><br>
                    <input type="number" name="mob" placeholder="Mobile" required><br><br>
                    <input type="password" name="pass" placeholder="Password" required><br><br>
                    <input type="password" name="cpass" placeholder="Confirm Password" required><br><br>
                    <button id="loginbtn" type="submit" name="registerbtn">Register</button><br><br>
                  <h>  Already user? </h><br><br><a href="login.php">Login here</a>
                </form>
            </div>        
        </body>
</html>
