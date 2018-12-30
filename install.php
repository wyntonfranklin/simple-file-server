<?php

include("SfsApplication.php");
$app = new SfsApplication();
$settings = $app->getSettings();

if($app->isInstalled()){
    die("This app is installed. Use the config file to update.");
}

if (isset($_POST['submit'])) {
    $app->updateConfigFile();
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

    <title><?php echo $app->getAppName();?> Installation</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/install.css" rel="stylesheet">
</head>

<body>


<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form" action="install.php" method="post">
				<span class="contact100-form-title">
                    <a href="index.php"><i class="fa fa-folder-open fa-2x"></i></a><br>
                    Install <?php echo $app->getAppName();?>
				</span>
            <p>Note: You can always edit these values via the config file.</p>
            <p><strong>Saving this will overwrite your current configuration file.</strong></p>
            <div class="wrap-input100 validate-input bg1">
                <span class="label-input100">App Name *</span>
                <input value="<?php echo $app->getAppName();?>" class="input100" type="text" name="app-name" placeholder="Enter Application Name">
            </div>

            <div class="wrap-input100 validate-input bg1">
                <span class="label-input100">Base Url *</span>
                <input value="<?php echo $app->getBaseUrl();?>" class="input100" type="text" name="base-url" placeholder="e.g https://www.website.com">
            </div>

            <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                <span class="label-input100">Primary User *</span>
                <input class="input100" type="text" name="primary-user" placeholder="Enter User Name">
            </div>

            <div class="wrap-input100 bg1 rs1-wrap-input100">
                <span class="label-input100">Password</span>
                <input class="input100" type="text" name="primary-user-password" placeholder="Enter User Password">
            </div>

            <div class="wrap-input100 input100-select bg1">
                <span class="label-input100">Max file Upload Size ( in mb) *</span>
                <div>
                    <select class="js-select2" name="max-file-size">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                        <option>1000 ( 1GB)</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>

            <div class="wrap-input100 input100-select bg1">
                <span class="label-input100">Order Files Listing By *</span>
                <div>
                    <select class="js-select2" name="order-by">
                        <option value="date">Date</option>
                        <option value="name">Name</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>


            <div class="wrap-input100 input100-select bg1">
                <span class="label-input100">Disable this page</span>
                <select class="js-select2" name="disable-install">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>



            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn" type="submit" name="submit" value="">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                </button>
            </div>
        </form>
    </div>
</div>


</body>

</html>

