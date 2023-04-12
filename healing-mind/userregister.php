<?php
$connect = mysqli_connect("localhost","root","","healingmind");

    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $mobilequery = " select * from user where mobile = '$mobile' ";
    $mobilecount = mysqli_num_rows(mysqli_query($connect,$mobilequery));
    
    $n = $_POST['name'];
    $m = $_POST['mob'];
    
    if(strlen($m)!=10)
    {
        echo '<script>
        alert("Please Enter only 10 Digits Valid Number");
        window.location = "registration.php";
        </script>';
    }
    else{
    if(!preg_match('/^[0-9]*$/', $m))
    {
        echo '<script>
        alert("Please Enter Only Numbers in Mobile Number Field");
        window.location = "userregister.php";
        </script>';
    }
    else{
    
    if(!preg_match("/^[a-zA-Z\s]+$/", $n))
    {
        echo '<script>
        alert("Please Enter Only Characters In Name Field");
        window.location = "registration.php";
        </script>';
    }   
else
    {
        if($mobilecount>0)
            {
                echo '<script>
                alert("Mobile No already registerd");
                window.location = "registration.php";
                </script>';
            }
        else
            {
                if($cpass == $pass)
                {
                    $insert = mysqli_query($connect, "insert into user (name, mobile, password) values('$name', '$mobile', '$pass') ");
                    if($insert)
                    {
                    echo '<script>
                    alert("Registration successfull!");
                    window.location = "login.php";
                    </script>';
                    }
                }
        else
            {
                echo '<script>
                alert("Passwords do not match!");
                window.location = "registeration.php";
                </script>';

            }   
            }
        }    }  }
?>