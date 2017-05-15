<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 03:09 PM
 */

if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}
else
    $msg = "";

?>

<html>
<head>

</head>
<body>
<div>
    <a id="home" href="../index.php">SignIn</a>
</div>
<div>
     <span>
       <span id="report"><h2><?php echo $msg; ?></h2></span>
    </span>
</div>
<div>
    <form action="../Actions/A_SignUp.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="submit" value="submit">
    </form>
</div>
</body>
</html>

