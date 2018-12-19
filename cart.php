<?php session_start(); ?>
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Main css -->
    <link href="css/style-products.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
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
    <!-- end LogOut Logic -->
    <!--
Lower Header Section 
-->
    <div class="container">
        <div id="gototop"> </div>
        <header id="header">

        </header>

        <!--
Navigation Bar Section 
-->
        <div class="nav-menu fixed-top bg-gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-dark navbar-expand-lg">
                            <a class="navbar-brand" href="home.php"><img src="images/logo.png" width="50%" class="img-fluid"
                                    alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span> </button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"> <a class="nav-link" href="home.php">HOME</a> </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="product-page/index.php">Sandisk</a>
                                            <a class="dropdown-item" href="product-page/index.php">Kingston</a>
                                            <a class="dropdown-item" href="product-page/index.php">Transcend</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" href="aboutus.php">ABOUT US</a> </li>
                                    <?php if(isset($_SESSION['logged-in'])): ?>
                                    <li class="nav-item"><a href="cart.html" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Cart</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-user"></span> 
                                            <strong id="nama-atas">Hi
                                                <?php echo $_SESSION["logged-in"]["user"]; ?></strong>
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <div class="navbar-logout">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <p class="text-center">
                                                                <span class="glyphicon glyphicon-user icon-size"><img
                                                                        src="https://static.zerochan.net/Yasushi.full.414275.jpg"
                                                                        width="100%"></span>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <p class="text-left"><strong>
                                                                    <?php echo $_SESSION["logged-in"]["user"]; ?></strong></p>
                                                            <p class="text-left small">
                                                                <?php echo $_SESSION["logged-in"]["mail"]; ?>
                                                            </p>
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
                                                                <a href="home.php?logout=1" class="btn btn-danger btn-block">Log
                                                                    Out</a>
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
        <!-- 
Body Section 
-->
        <div class="mb-3 bd-bottom">

        </div>


        <div class="row">

            <h2>Check Out</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Unit price</th>
                        <th>Qty </th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $content = &$_SESSION['cart']['cart']; ?>
                    <!-- logic menghapus barang -->
                    <?php 
                        if(isset($_GET['rmv'])){
                            unset($content[$_GET['rmv']]);
                        }
                    ?>
                    
                    <!-- loop cart -->
                    <?php foreach($content as $key=>$jumlah): ?>
                    <?php 
                        $query = $db->prepare('SELECT id, nama, harga, gambar FROM tproduk WHERE id='.$key);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        $hasil = &$result[0]; 
                        // print_r($key);
                    ?>
                    <tr>
                        <td><img width="100" src="<?php echo $hasil['gambar']; ?>" alt=""></td>
                        <td>
                            <?php echo $hasil['nama']; ?><br>Carate : 22<br>Model : n/a</td>
                        <td>Rp
                            <?php echo number_format($hasil['harga'],0,",","."); ?>
                        </td>
                        <td>
                            <div class="input-append">
                                <p style="display:none" id="asoy"><?php echo $hasil['harga']; ?></p>
                                <button class="btn jumlah-btn" type="button" id="minus"> - </button><input class="span1"
                                    style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text"
                                    value="<?php echo $jumlah;?>"><button class="btn jumlah-btn" type="button" id="plus">
                                    + </button>
                                    <button class="btn btn-mini btn-danger remove-btn" type="button" onclick="location.href='cart.php?rmv=<?php echo $key; ?>'">Remove</button>
                            </div>
                        </td>
                        <td id="subtotal">Rp
                            <?php echo number_format($hasil['harga']*$jumlah,0,",","."); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><br />


            <a href="checkout.php"><button class="btn-primary">Checkout</button></a>




        </div>


    </div><!-- /container -->


    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © 2018. ALL RIGHTS RESERVED. </small></p>
    </footer>

    <script type="text/javascript"></script>
    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.formatCurrency-1.4.0.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
    
    <script>
        $(document).ready(function () {
            // cart

            $("button.jumlah-btn").on('click', function () {
                var val = $(this).siblings("input").val();

                if ($(this).attr('id') == 'minus') {
                    var valMax = Math.max(1, parseInt(val) - 1);
                    $(this).siblings("input").val(valMax);
                } else {
                    $(this).siblings("input").val(parseInt(val) + 1);
                }
                
                var harga = $(this).siblings("p").text();
                val = $(this).siblings("input").val();
                
                $(this).parent().parent().siblings("#subtotal").html(parseInt(val)*harga);
                $(this).parent().parent().siblings("#subtotal").formatCurrency({ symbol:'Rp ' , digitGroupSymbol:'.', roundToDecimalPlace:0});
            });
        });
    </script>
</body>

</html>