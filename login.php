<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/27/18
 * Time: 8:36 AM
 */

include("SfsApplication.php");
$app = new SfsApplication();
//if the login form is submitted
if (isset($_POST['submit'])) {

// makes sure they filled it in
    if (!$_POST['username']) {
        die('You did not fill in a username.');
    }
    if (!$_POST['pass']) {
        die('You did not fill in a password.');
    }

    $users = $app->getUsers();
    if(!$app->verifyUser($_POST['username'])){
        die('Incorrect username, please <a href="login.php">try again</a>.');
    }else{
        if ($_POST['pass'] != $app->getUserPassword($_POST['username'])){
            die('Incorrect password, please <a href="login.php">try again</a>.');
        }else{
            $app->setCookie();
        }
    }
}
?>

<!-- View Section  -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $app->getAppName();?></title>
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
<div class="login-page">
    <div class="form">
        <a href="index.php"><img src="img/ipad.png" width="100px"></a>
        <h3><?php echo $app->getAppName();?></h3>
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" placeholder="username" name="username"/>
            <input type="password" placeholder="password" name="pass"/>
            <button type="submit" name="submit" value="Login">login</button>
        </form>
    </div>
</div>

</body>

</html>
