<!--DOCTYPE html>
<html>
<head>
    <title>Register Member</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <header>
        <h3>Member Sign Up</h3>
    </header>

    <form action="" method="POST">

        <fieldset>

        <p>
            <input type="text" name="nama" placeholder="Nama Depan" />
        </p>

        <p>
            <input type="text" name="nama" placeholder="Nama Belakang" />
        </p>

        <p>
            <input type="text" name="email" placeholder="Masukkan Email">
        </p>

        <p>
            <input type="password" name="pass" placeholder="Password">
        </p>

        <button>
            Register
        </button>

        </fieldset>

    </form>

    </body>
</html-->

<!doctype html>
<html lang="en">

<head>
    <title>Register | XStore</title>
    <meta charset="utf-8">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time();?>">
    
    <!--link href="css/style.css" rel="stylesheet"-->
</head>  
<body>
    <?php require 'registerRule.php'?>
    <div class="bg-gradient">
        <div class="box">
            <h2>REGISTER</h2>
            
            <?php if(!empty($err)): ?>
            <img src="./svg/danger.svg" height=14px/>
            <span class="err-msg">this mail already registered</span>
            <?php endif; ?>

            <form action="" method="post">
                <div class="inputBox">
                    <input type="text" name="front" required>
                    <label>Nama Depan</label>    
                </div>
                <div class="inputBox">
                    <input type="text" name="back" optional>
                    <label>Nama Belakang</label>    
                </div>
                <div class="inputBox">
                    <input type="Email" name="mail" required>
                    <label>Email</label>    
                </div>
                <div class="inputBox">
                    <input type="password" name="pass" required>
                    <label>Password</label> 
                </div>
                
                <p id="submit"><input type="submit" value="Register"></p>  
                
            </form>
        </div>
        
    </div>  
        
</body>
</html>