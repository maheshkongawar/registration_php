<?php
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Here</h1>
    <?php
    session_start();
    
    if(isset($_POST['login']))
    {
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];

        $sql=mysqli_query($db,"select * from users where name='$uname' && email='$email' && password='$password'");
        echo mysqli_error($db);
        $num=mysqli_num_rows($sql);
        $_SESSION['login_user']=$uname;
        $_SESSION['login_user'];
        session_destroy();
        if($num>0)
        {
            echo '<script>window.location="homepage.php";</script>';
        }
        else
        {
            echo "<p>"."Please check your enterd data"."</p>";
        }
    }
?>
    <form action="" method="Post">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="uname" id="uname" required>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="pwd" id="pwd" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="login" value="Login">
                </td>
            </tr>
        <table>
    </form> 
</body>
</html>
