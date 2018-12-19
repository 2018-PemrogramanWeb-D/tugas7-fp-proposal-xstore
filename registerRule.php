<?php 
    $err='';

    if(isset($_SESSION['err'])){
        $err=$_SESSION['err'];
        unset($_SESSION['err']);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require 'conn.php';

        $result = $db->query("SELECT mail FROM pengguna WHERE mail='{$_POST['mail']}'")->fetch();

        if(empty($result)){
           $db->query("INSERT INTO `pengguna` (`mail`, `pass`) VALUES ('{$_POST['mail']}', MD5('{$_POST['pass']}'))");
           $db->query("INSERT INTO `detail_orang` (`mail`, `depan`, `belakang`) VALUES ('{$_POST['mail']}', '{$_POST['front']}', '{$_POST['back']}')");

           header("Location: login.php");
        }
        else{
            $_SESSION['err']= 1;
        }

    } 
?>