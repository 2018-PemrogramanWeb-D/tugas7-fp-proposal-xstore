<?php
    $user = 'ivan';
    $pass = 'qwerty';
    try{
        $db = new PDO('mysql:host=files.000webhost.com;dbname=id8127222_xstore', $user, $pass);
    }
    catch(PDOException $e){
        print "Error:" . $e->getMessage() . "\n";
        die();
    }
    
?>
