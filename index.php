<?php

    include("SfsApplication.php");
    $app = new SfsApplication();
    $fm = $app->getFm();
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

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">
    <link href="vendor/dropzone/dropzone.css" rel="stylesheet">
    <link href="vendor/magnific/magnific-popup.css" rel="stylesheet">
    <link href="vendor/DataTables/datatables.css" rel="stylesheet">


  </head>
  <style>
      .dropzone {
          min-height: 400px!important;
          width: 500px;
          border: 1px solid rgba(0, 0, 0, 0.3)!important;
          margin-bottom: 5px;
      }
      .chooser-files a {
          text-decoration: none!important;
      }
      .files-layout{
          padding: 15px;
          background: #fff;
          margin-bottom: 15px;
          margin-top: 10px;
          -webkit-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);
          -moz-box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);
          box-shadow: 10px 10px 5px -4px rgba(0,0,0,0.75);
      }
  </style>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo $app->getAppName();?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Files</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#projects">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <form action="upload.php"
                  class="dropzone"
                  id="file-uploader"></form>
            <a href="#about" class="btn btn-primary js-scroll-trigger">Clear</a>
        </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">My Files</h2>
                    <div style="" class="files-layout">
                        <table id="files-table" class="table table-bordered" style="text-align: left;">
                            <thead>
                                <th scope="col">File Name</th>
                                <th scope="col">Uploaded On</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody id="files-body">
                            <?php foreach($fm->getAllFiles() as $file ): ?>
                                <tr>
                                    <td><a target="_blank" href="<?php echo $file->url;?>">
                                            <?php echo $file->name;?></a></td>
                                    <td><?php echo $file->dateAdded;?></td>
                                    <td><i class="fa fa-copy fa-fw"></i>&nbsp;
                                        <a target="_blank" href="<?php echo $file->url;?>" class="image-link">
                                            <i class="fa fa-eye fa-fw"></i>
                                        </a>
                                        &nbsp;
                                        <i class="fa fa-trash fa-fw"></i>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container">

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Files Popup -->
    <div style="display: none;">

    </div>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; www.igestdevelopment.com
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/dropzone/dropzone.js"></script>
    <script src="vendor/DataTables/datatables.js"></script>
    <script src="vendor/magnific/jquery.magnific-popup.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
    <script src="js/sfs.js"></script>

  </body>
</html>
