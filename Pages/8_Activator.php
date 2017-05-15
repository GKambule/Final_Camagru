<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/11
 * Time: 02:45 AM
 */

if(isset($_GET['msg']))
    $msg = $_GET['msg'];
else
    $msg = "";

if(isset($_GET['userId']))
    $userId=$_GET['userId'];
else
{
    $userId ="";
    $Err = "No matching user consult administrator or Retry SignUp one more time!";
}


?>

<html>
<head>

</head>
<body>
<div>
     <span>
        <span id="report"><h2><?php echo $msg; ?></h2></span>
         <br><br>
         <span id="report"><h2><?php echo $Err; ?></h2></span>
    </span>
</div>
<div>
    <form action="../Actions/A_SignUp.php" method="post">
        <input type="hidden" name="userId" value="<?php echo $userId;?>">
        <input type="password" name="Code" placeholder="Activation Code">
        <input type="submit" name="A_code" value="Activate">
    </form>
</div>
</body>
</html>
