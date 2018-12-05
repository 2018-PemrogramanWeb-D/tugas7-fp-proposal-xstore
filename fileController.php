<?php 
    session_start();
    
    $data = array();
    $data["user"]=array();
    $data["user"][1] = 2;
    $data["user"][9] = 1;

    $_SESSION['ses'] = $data;
    // print_r($data);
    // print_r($data[9]);

    print_r(json_encode($_SESSION['ses']));

    unset($_SESSION['ses']);
?>