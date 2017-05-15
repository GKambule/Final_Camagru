<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 07:12 AM
 */
include_once ('../database/TrafficQueries.php');

$check = "http://www.megaglobalgreen.com/wp-content/uploads/2014/09/image-placeholder-400x300.jpg";

if ($_POST['Save'] && $_POST['Photo'] && $_POST['Photo']!= $check)
{
    $pic = $_POST['Photo'];
    $userId;
    $inject = new TrafficQueries();
    $inject->CamPixInsert($pic, $userId);

}

?>


<html>
<head>
    <link rel="stylesheet" href="../CSS/1_PhotoPage.css">

</head>
<body>
<div>
    <a id="home" href="2_SignUpPage.php">Home</a>
    <a id="gallary" href="3_gallary.php">Gallary</a>
    <a id="Pfile" href="4_Profile.php">Profile</a>
    <a id="about" href="5_about_camagru.php">About Camagru</a>
    <a id="Lout" href="6_logout.php">Log Out</a>
    <a id="Fpass" href="7_ForgottenPasswords.php">Forgotten Password</a>
</div>
    <div class="booth">
        <video id="video" width="400" height="300"></video>
        <button id="snap_button">Take Picture</button>
        <canvas id="canvus" width="400" height="300"></canvas>
        <form action="1_PhotoPage.php" method="post" enctype="multipart/form-data">
            <img id="Photo" name="Photo" src="http://www.megaglobalgreen.com/wp-content/uploads/2014/09/image-placeholder-400x300.jpg" alt="Photo Frame">
            <input id="submit" type="submit" name="Save" value="Save">
        </form>
    </div>
    <script src="../Js/1_PhotoPage.js"></script>
</body>
</html>
