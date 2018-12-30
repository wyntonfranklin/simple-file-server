<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/27/18
 * Time: 4:45 PM
 */
include("SfsApplication.php");
$app = new SfsApplication();
$app->authenticate();
$fm = $app->getFm();
if(isset($_POST['fid'])){
    $repo = $fm->getRepo();
    $file = $repo->findById($_POST['fid']);
    unlink($file->path);
    $repo->delete($file);
}else{
    echo "What are u doing here :(";
    die();
}