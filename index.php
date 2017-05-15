<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/04
 * Time: 03:40 PM
 */
include_once ('config/database.php');
include_once ('database/CreateDB.php');
include_once ('config/setup.php');
//include_once ('functions/Functions.php');

$starup = new setup();


if(isset($_GET['msg1']))
{
    $msg = $_GET['msg1'];
}
else
    $msg = "";



?>

<html>
<head>
    <link rel="stylesheet" href="./CSS/common.css">
</head>
<body class="Body">
<div><h1>Welcome To Camagru</h1></div>
<form action="Actions/A_index.php" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="SignIn" value="SignIn">
    <br>
</form>
<form action="Pages/2_SignUpPage.php">
    <input type="submit" name="SignUp" value="SignUp">
    <input type="hidden" name="msg" value="Please Fill in below the form">
</form>
<a href="Pages/7_ForgottenPasswords.php?msg=$msg">Forgotten Password</a>
</body>
</html>
