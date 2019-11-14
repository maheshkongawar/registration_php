<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
<h1>Contct Here</h1>

<?php
    include("config.php");
    if(isset($_COOKIE['success']))
    {
        echo $_COOKIE['success'];
    }
    if(isset($_POST['send']))
    {
        $name=$_POST['uname'];
        $email=$_POST['email'];
        $mobile=$_POST['mob'];
        $message=$_POST['msg'];

        $sql=mysqli_query($db,"INSERT INTO contact(name,email,mobile)VALUES('$name','$email','$mobile')");
        $error=mysqli_error($db);
        echo $error;
        if(mysqli_affected_rows($db))
        {
        setcookie("success","Thanks, we will get back to soon",time()+2);
        header("Location:contact.php");
        echo "<p>Thanks, we will get back to soon</p>";
        }
        else
        {
            echo "<p>sorry enable to process try again</p>";
        }

        
    }
    else    
    {

    }
?>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="uname" id="" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="" required></td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td><input type="text" name="mob" id="" required></td>
            </tr>
            <tr>
                <td>Message:</td>
                <td><textarea size="60" name="msg" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="send" value="send"></td>
            </tr>
        </table>
    </form>

</body>
</html>