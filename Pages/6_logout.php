<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 02:46 PM
 */

if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}
else
    $msg = "You have Logged Out!!";

?>

<html>
<head>

</head>
<body>

<div>
    <span id="report"><h2><?php echo $msg; ?></h2></span>
</div>

</body>
</html>