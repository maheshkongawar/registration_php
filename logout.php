<?php

session_start();
if(isset($_SESSION['login_user']))
$_SESSION['login_user'];
session_destroy();

if(isset($_POST['logout']))
{
    header("Location:homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>logout</title>
</head>
<body>
    <h1>Click on the logout button<h1>
    <form method="POST" action="">
        <table>
            <tr>
                <td>
                    <input type="submit" name="logout" value="Logout"> 
                </td>
            </tr>
        <table>
    <form>
    
</body>
</html>