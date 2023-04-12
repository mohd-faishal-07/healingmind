<html>
<head>
    <title>Healing Mind Hospital</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    
<body>
    
<div class="loginbox">
<img src="usericon.png" class="usericon">
<img src="healinglogo.png" class="mg">
    <div id = "frm">  
        <h1>Login for User</h1>  
        <form name="f1" action = "userlogin.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label>   &nbsp   Mobile Number: </label>  
                <input type = "number" id ="mobile" name  = "mobile" />  
            </p>  
            <p>  
                <label> &nbsp   Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p> 
           <h>New user? </h><br><a href="registration.php">Register here</a> 
        </form>  
    </div>  
    </div>  
    <script>  
            function validation()  
            {  
                var id=document.f1.mobile.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("Mobile number and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Mobile Number is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>  
        </head>   
</html>  