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
    <link href="css/style.css?v=<?php echo time();?>" rel="stylesheet">
</head>

<body>
    <!-- db conn -->
    <?php require_once('conn.php'); ?>

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
    <?php require 'addProductLogic.php'?>
    <!-- Nav Menu -->
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="home.php"><img src="images/logo.png" width="50%" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="home.php">HOME</a> </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="product-page/index.php">Sandisk</a>
                                        <a class="dropdown-item" href="product-page/index.php">Kingston</a>
                                        <a class="dropdown-item" href="product-page/index.php">Transcend</a>
                                    </div>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="aboutus.php">ABOUT US</a> </li>
                                <?php if(isset($_SESSION['logged-in'])): ?>
                                <li class="nav-item"><a href="cart.php" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Cart</a></li>
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
                                                        <p class="text-left nama-bawah"><strong><?php echo $_SESSION["logged-in"]["user"]; ?></strong></p>
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

    </header>
    
    <!-- get db data list -->
    <?php 
        $query = $db->prepare('SELECT id, subkategori FROM tkategori');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($result);
    ?>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Add Product</h1>
                </div>
            </div>
            <div class="row">    
                <div class="col-md-6">
                    <form role="form" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="productselect" class="loginFormElement">Kategori</label>
                            <select class="form-control" id="productSelect" name="kategori" required>
                                <option value="">Please Select a Product Group</option>
                                <?php foreach($result as $row): ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['subkategori'];?></option>
                                <?php endforeach; ?>
                            </select>    
                        </div>
                        <div class="form-group">
                            <label for="productname" class="loginFormElement">Nama Produk</label>
                            <input class="form-control" id="productname" type="text" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="productprice" class="loginFormElement">Harga Produk</label>
                            <input class="form-control" id="productprice" type="text" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gambar Produk</label> 
                            <input class="filestyle" data-icon="false" type="file" name="image" required>
                        </div>            
                        <div class="form-group">
                            <label class="loginformelement" for="productdescription">Deskripsi</label>
                            <input id="productdescription" class="form-control input-lg" placeholder="Deskripsi" type="text" name="deskripsi"><div class="container">
                        </div>
                        <button type="submit" name="submit" id="loginSubmit" class="btn btn-success loginFormElement">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
                   

    <div class="section bg-gradient" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Jl. Teknik Kimia - Gedung Teknik Informatika</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:ivan_indrakusuma@yahoo.com">ivan_indrakusuma@yahoo.com</a>
                        </p>
                    </div>
                    <div class="d-block d-sm-inline-block">
                        <p class="mb-0">
                            <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">518-3636-2800</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="#"><span class="ti-facebook"></span></a>
                        <a href="#"><span class="ti-twitter-alt"></span></a>
                        <a href="#"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>

        </div>

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
