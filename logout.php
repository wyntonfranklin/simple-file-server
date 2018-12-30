<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/27/18
 * Time: 11:44 AM
 */


include("SfsApplication.php");
$app = new SfsApplication();
$app->logout();
$app->redirect("login.php");
 ?>