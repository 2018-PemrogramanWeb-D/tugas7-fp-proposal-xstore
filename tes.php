<?php
    session_start();
    require 'conn.php';

    $var = '123';
    $tes = $db->query("SELECT MD5('{$_POST['pass']}')");
    print_r();
    echo $tes;
?>
