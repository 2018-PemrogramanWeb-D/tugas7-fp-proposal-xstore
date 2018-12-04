<!DOCTYPE html>
<html lang="en">

<head>
    <title>X Store - Your Trusted Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Main css -->
    <link href="css/detailProduct.css?v=<?php echo time();?>" rel="stylesheet">
</head>

<body>

    <!-- Nav Menu -->
    <?php session_start(); 
        if(isset($_GET['logout'])){
            unset($_SESSION['logged-in']);
            header('Location: home.php');
        }
    ?>
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="home.php"><img src="images/logo.png" width="50%" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="home.php">HOME</a> </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="product-page/index.php">Sandisk</a>
                                        <a class="dropdown-item" href="product-page/index.php">Kingston</a>
                                        <a class="dropdown-item" href="product-page/index.php">Transcend</a>
                                    </div>
                                </li>
                                <li class="nav-item"> <a class="nav-link active" href="aboutus.php">ABOUT US</a> </li>
                                <?php if(isset($_SESSION['logged-in'])): ?>
                                <li class="nav-item"><a href="cart.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Cart</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user"></span> 
                                        <strong id="nama-atas">Hi RM Ivan!</strong>
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <div class="navbar-logout">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <p class="text-center">
                                                            <span class="glyphicon glyphicon-user icon-size"><img src="https://static.zerochan.net/Yasushi.full.414275.jpg" width="100%"></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <p class="text-left"><strong>RM Ivan</strong></p>
                                                        <p class="text-left small">anjay@email.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="navbar-logout">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p>
                                                            <a href="home.php?logout=1" class="btn btn-danger btn-block">Log Out</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li class="nav-item"><a href="login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">

         <div class="section light-bg" id="features">


        <div class="container">

            <div class="section-title">
            <img src="images/iphonex.png" height="200px">
            </div>

            <div class="section-content">
            <h3>IPHONE X 256 GB Garansi Internasional</h3>
            <h4>
            Iphone X adalah iPhone generasi baru yang diluncurkan oleh Apple.Inc.
            Dengan desain baru menambahkan notch dan menghilangkan tombol home yang menjadi ciri khas iPhone,
            Menambah kesan mewah dan elegan dari sebuah produk Apple satu ini.
            </h4>
            </div>

        </div>

    </header>

    </div> 
    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © 2018. ALL RIGHTS RESERVED. </small></p>
    </footer>

    <script type="text/javascript"></script>
    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>
