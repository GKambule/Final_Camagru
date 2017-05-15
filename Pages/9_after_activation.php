<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/14
 * Time: 10:57 AM
 */
if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}
else
    $msg = "Choose a page to go to!";

?>

<html>
<head>

</head>
<body>
<div class="nav">
    <a id="home" style="text-decoration: none" href="2_SignUpPage.php">Home</a>
    <a id="gallary" style="text-decoration: none" href="3_gallary.php">Gallary</a>
    <a id="Pfile" style="text-decoration: none" href="4_Profile.php">Profile</a>
    <a id="about" style="text-decoration: none" href="5_about_camagru.php">About Camagru</a>
    <a id="Lout" style="text-decoration: none" href="6_logout.php">Log Out</a>
    <a id="Fpass" style="text-decoration: none" href="7_ForgottenPasswords.php">Forgotten Password</a>
</div>
<div>
    <span id="report"><h2><?php echo $msg; ?></h2></span>
</div>

</body>
</html>
