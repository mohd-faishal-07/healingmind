<?php
$connect = mysqli_connect("localhost","root","","healingmind");

    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];


        $mobile = stripcslashes($mobile);  
        $pass = stripcslashes($pass);  
        $sql = "select *from user where mobile = '$mobile' and password = '$pass'";  
        $result = mysqli_query($connect, $sql);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo '<script>
            alert("Login Successfull Welcome to Healing Mind");
            window.location = "http://localhost/healing-mind/healing-mind/home.php";
        </script>';
    }  
    else{  
         echo '<script>
            alert("Invalid credentials!");
            window.location = "login.php";
        </script>';
    }          
?>  