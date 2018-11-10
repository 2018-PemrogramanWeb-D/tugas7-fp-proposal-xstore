<!doctype html>
<html lang="en">

<head>
    <title>Login | XStore</title>
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/login.css">

    <!--link href="css/style.css" rel="stylesheet"-->
</head>

<body>
    <?php require 'loginRule.php';?>
    <div class="bg-gradient">
        <div class="box">
            <h2>LOGIN</h2>
            <!--
            <svg-icon>
                <src href="./svg/danger.svg" />
            </svg-icon>
-->
            <?php if(!empty($err)): ?>
            <img src="./svg/danger.svg" height=14px/>
            <span class="err-msg">invalid mail or password</span>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="inputBox">
                    <input type="Email" name="mail" required>
                    <label>Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                </div>

                <p id="submit"><input type="submit" name="submit" value="Login"></p>

                <p>Belum bergabung? <a href="register.php">Sign Up</a></p>
            </form>
        </div>

    </div>

</body>

</html>
