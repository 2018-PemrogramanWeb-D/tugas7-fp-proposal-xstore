<?php session_start(); 
    if(isset($_GET['logout'])){
        unset($_SESSION['logged-in']);
        header('Location: home.php');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-dark navbar-expand-lg">
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" width="50%" class="img-fluid" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"> <a class="nav-link active" href="#">HOME <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">PRODUCTS</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="product-page/index.php">Sandisk</a>
                                <a class="dropdown-item" href="#">Kingston</a>
                                <a class="dropdown-item" href="#">Transcend</a>
                            </div>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="aboutus.html">ABOUT US</a> </li>
                        <?php if(isset($_SESSION['logged-in'])): ?>
                        <li class="nav-item"><a href="cart.html" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Cart</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> 
                                <strong id="nama-atas">Hi Ivan!</strong>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <div class="navbar-logout">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-center">
                                                    <span class="glyphicon glyphicon-user icon-size"></span>
                                                </p>
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="text-left"><strong id="nama-bawah">RM Ivan</strong></p>
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