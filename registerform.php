<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function formvalidation()
        {
            var name=document.getElementById("uname").value;
                var pat= /[a-zA-Z]{1,20}$/;
                if(!pat.test(name))
                {
                    alert("Enter your valid name");
                    return false;
                }
            else
            {
                var mail=(document.getElementById('email').value)
                var pat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(!pat.test(mail))
                {
                    alert("Enter your valid Email");
                    return false;
                }
                if(document.getElementById('pwd').value=="")
                {
                    alert("Enter your password");
                    return false;
                }
                if(document.getElementById('cpwd').value=="")
                {
                    alert("please confirm your Password");
                    return false;
                }
                var mob=document.getElementById("mobile").value;
                var pat=/^[0]?[789]\d{9}$/;
                if(!pat.test(mob))
                {
                    alert("Enter a 10 digit valid mobile number");
                    return false;
                }
                if(document.getElementById('dob').value=="")
                {
                    alert("Enter your Date of birth");
                    return false;
                }
                if(document.getElementById('state').value=="")
                {
                    alert("Enter your state");
                    return false;
                }
                if(document.getElementById('city').value=="")
                {
                    alert("Enter your city");
                    return false;
                }

            }
            
        }

    </script>
</head>

<?php
    include("config.php");
    if(isset($_COOKIE['sucess']))
    {
        echo $_COOKIE['sucess'];
    }
    if(isset($_POST['register']))
    {
        $name=$_POST['uname'];
        $mail=$_POST['email'];
        $password=$_POST['pwd'];
        $mobile=$_POST['mobile'];
        $date=$_POST['dob'];
        $gender=$_POST['gender'];
        $state=$_POST['state'];
        $city=$_POST['city'];

        //Database Connectivity
        $query=mysqli_query($db,"INSERT INTO users(name,email,password,mobile,dob,gender,state,city)VALUES('$name','$mail','$password','$mobile','$date','$gender','$state','$city')");
        if (mysqli_query($db, $query)) //for checking Query errors;
            {
                echo "New record created successfully";
            } 
         else 
            {
                echo "Error: " . $query . "<br>" . mysqli_error($db);
            }
        if(mysqli_affected_rows()==0)
            {
               setcookie("sucess","you registerd sucessfully.please activate your account",time()+2);
                header("Location:loginform.php");

            }
            else
            {
                header("Location:loginform.php");  
            }
       
    }
    else
    {
            
    }

?>
<body>
    <h1>Register Here</h1>
    <form  method="POST" action="" name="registerform" onsubmit="return formvalidation()">
        <table>
            <tr>
                <td>Name*:</td>
                <td>
                    <input type="text" name="uname" id="uname"  >
                </td>
            </tr>
            <tr>
                <td>Email*:</td>
                <td>
                    <input type="email" name="email" id="email" >
                </td>
            </tr>
            <tr>
                <td>Password*:</td>
                <td>
                    <input type="password" name="pwd" id="pwd" >
                </td>
            </tr>
            <tr>
                <td>Confirm Password*:</td>
                <td>
                    <input type="password" name="Cpwd" id="cpwd" >
                </td>
            </tr>
            <tr>
                <td>Mobile*:</td>
                <td>
                    <input type="text" name="mobile" id="mobile">
                </td>
            </tr>
            <tr>
                <td>Date of birth:</td>
                <td>
                    <input type="date" name="dob" id="dob" placeholder="00/00/00">
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male">Male
                </td>
                <td>
                    <input type="radio" name="gender" value="Female">female
                </td>
            </tr>
            <tr>
                <td>State:</td>
                <td>
                    <input type="text" name="state" id="state">
                </td>
            </tr>
            <tr>
                <td>City:</td>
                <td>
                    <input type="text" name="city" id="city">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="register" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>