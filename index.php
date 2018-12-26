<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple File Server</title>

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
  </style>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Simple File Server</a>
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
                  id="my-awesome-dropzone"></form>
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
                    <div style="padding: 5px; background: #fff; margin-bottom: 10px; margin-top: 10px;">
                        <table class="table table-bordered">

                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col">File Location</th>
                                <th scope="col">Copy</th>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>customer-service-icon.png</td>
                                <td><a>https://core.xhuma.co/uploads/2018/12/n9datm.png</a></td>
                                <td>10</td>
                            </tr>
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
    <script src="vendor/magnific/jquery.magnific-popup.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
