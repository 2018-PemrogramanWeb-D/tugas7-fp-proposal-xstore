<?php session_start();  ?>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- Main css -->
    <link href="../css/style-products.css?v=<?php echo time();?>" rel="stylesheet">

    <script type="text/javascript" src="../js/iconwc.js"></script>
</head>

<body>
    <!-- db conn -->
    <?php require_once '../conn.php' ?>
    <?php include '../cartRule.php' ?>
    <?php 
        $query = $db->prepare('SELECT id, nama, harga, gambar FROM tproduk');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
            
    ?>

    <!-- LogOut Logic -->
    <?php 
        if(isset($_GET['logout'])){
            $filename = 'userdata/'.$_SESSION['logged-in']['user'].'.json';
            file_put_contents($filename ,json_encode($_SESSION['cart'], FILE_APPEND) );
            
            unset($_SESSION['cart']);
            unset($_SESSION['logged-in']);
            
            header('Location: home.php');
        }
    ?>
    <!-- end LogOut Logic -->
    <!-- Nav Menu -->
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="../home.php"><img src="../images/logo.png" width="150px" class="img-fluid" alt="logo"></a> 
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="Cari">
                            <div class="input-group-addon">
                                <button type="submit">
                                    <svg-icon>
                                        <src href="../svg/si-glyph-magnifier.svg" />
                                    </svg-icon>
                                </button>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                
                                <li class="nav-item"> <a class="nav-link" href="../home.php">HOME</a> </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="../product-page/index.php">Sandisk</a>
                                        <a class="dropdown-item" href="../product-page/index.php">Kingston</a>
                                        <a class="dropdown-item" href="../product-page/index.php">Transcend</a>
                                    </div>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="../aboutus.php">ABOUT US</a> </li>
                                <?php if(isset($_SESSION['logged-in'])): ?>
                                <li class="nav-item"><a href="../cart.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Cart</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user"></span> 
                                        <strong id="nama-atas">Hi <?php echo $_SESSION["logged-in"]["user"]; ?></strong>
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
                                                        <p class="text-left"><strong><?php echo $_SESSION["logged-in"]["user"]; ?></strong></p>
                                                        <p class="text-left small"><?php echo $_SESSION["logged-in"]["mail"]; ?></p>
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
                                                            <a href="../home.php?logout=1" class="btn btn-danger btn-block">Log Out</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li class="nav-item"><a href="../login.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-gradient">

    </header>


    <div class="mb-3 bd-bottom">

    </div>
    <div class="container-fluid bd-bottom mb-3">
        <nav class="nav-index" id="nav-index">
            <ul class="list inline">
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="#">Page2</a></li>
                <li class="list-inline-item"><a href="#">Page3</a></li>
            </ul>
        </nav>
    </div>

    <div class="wrapper m-4">
        <nav id="sidebar">
            <ul class="list-unstyled components">
                <p class="bd-bottom">Dummy Heading</p>
                <li>
                    <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled">
                        <li>
                            <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="toggle">Page
                                1</a>
                            <ul class="collapse list-unstyled">
                                <li>
                                    <a href="#">subPage 1</a>
                                </li>
                                <li>
                                    <a href="#">subPage 2</a>
                                </li>
                                <li>
                                    <a href="#">subPage 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>

                <li><a href="/xstore/GitHub/tugas7-fp-proposal-xstore/addProduct.php">Add Product</a></li>
            </ul>
        </nav>
        <div id="content">
            <div class="row">
                <?php foreach($result as $row): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <!-- src="http://placehold.it/700x400" -->
                        <a href="#"><img class="card-img-top" src="../<?php echo $row['gambar']; ?>" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">
                                    <?php echo $row['nama']; ?></a>
                            </h4>
                            <h4>Rp
                                <?php echo number_format($row['harga'],2,",","."); ?>
                            </h4>
                            <!-- <p class="card-text">stok </p> -->
                        </div>
                        <div class="card-footer">
                            
                            <?php if(isset($_SESSION['logged-in'])): ?>
                            <a class="btn btn-danger addCartBtn" href="?id=<?php echo $row['id']?>">Add to Cart</a>
                            <?php else: ?>
                            <a class="btn btn-danger" href="../login.php">Add to Cart</a>
                            <?php endif; ?>
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- // end .section -->
    <footer class="my-5 text-center">
        <div class="col-12">
            <!-- Copyright removal is not prohibited! -->
            <p class="mb-2"><small>COPYRIGHT © 2018. ALL RIGHTS RESERVED. </small></p>
        </div>

    </footer>

    <script type="text/javascript"></script>
    <!-- jQuery and Bootstrap -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="../js/script.js"></script>
    <script>
        $(document).ready(function () {
            $('a.dropdown-toggle').on('click', function () {
                // alert("The paragraph was clicked.");
                if ($(this).next().hasClass('show')) {
                    $(this).next().collapse('hide');
                    $(this).attr('aria-expanded', 'false');
                } else {
                    $(this).next().collapse('show');
                }
            });
        });
    </script>
</body>

</html>