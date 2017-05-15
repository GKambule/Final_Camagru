<?php
/**
 * Created by PhpStorm.
 * User: Gladwin
 * Date: 2017/05/09
 * Time: 02:36 PM
 */


if(isset($_GET['msg']))
{
    $msg = $_GET['msg'];
}
else
    $msg = "";
//$msg = $data['msg'];

?>

<html>
<head>

</head>
<body>
<div>
    <span id="report"><?php echo $msg; ?></span>
</div>
<div>
    <form action="../Actions/A_SignUp.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="Fname" placeholder="First Name" required>
        <input type="text" name="Lname" placeholder="Last Name" required>
        <input type="password" name="Pword" placeholder="Password" required>
        <input type="submit" name="SignUp" value="SignUp">
    </form>
</div>
</body>
</html>
