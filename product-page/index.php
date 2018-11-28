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
    <?php require '../conn.php' ?>
    <?php 
        $query = $db->prepare('SELECT nama, harga, gambar FROM tproduk');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        //  print_r($result);
    ?>
    <!-- Nav Menu -->
    <div class="nav-menu fixed-top"></div>

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
                            <button class="btn" type="button" href="">Add to Cart</button>
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

            // load-nav-menu
            $(".nav-menu").load("../base/navbar.php");
        });
    </script>
</body>

</html>