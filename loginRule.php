<?php
    require 'conn.php';
//    unset($_SESSION['logged-in']);
    $err='';

    function checkLogin(array $data, &$db){
        $condition = "'{$data[0]}'=pengguna.mail AND '{$data[1]}'=pengguna.pass AND pengguna.mail = b.mail";
 
        $hasil = $db->query("SELECT pengguna.*, b.depan FROM pengguna, detail_orang b WHERE ".$condition)->fetch();
//        print_r($hasil['depan']);
        
        if(!empty($hasil)){
            $_SESSION['logged-in'] = array();
            $_SESSION['logged-in']["user"]= $hasil['depan'];
            $_SESSION['logged-in']["mail"]= $hasil['mail'];


            $location = 'userdata/'.$hasil['depan'].'.json';
            // retrive db json

            $content = @file_get_contents($location);
            if($content === false){
                $_SESSION['cart']['cart'] = array();
            }
            else{
                $_SESSION['cart']= json_decode($content, true);
            }
            
            header('Location: home.php');
        }
        else{
            $_SESSION['err'] = 1;
            header('Location: login.php');    
        }
    }

    if(isset($_SESSION['err'])){
        $err = $_SESSION['err'];
        unset($_SESSION['err']);   
    }

    if(isset($_SESSION['logged-in'])){
        header('Location: home.php');
    }
    else if(!empty($_POST['submit'])){
        
        if(empty($_POST['mail'])){
            $_SESSION['err'] = 1;
            header('Location: login.php');   
            return false;
        }
        
        if(empty($_POST['pass'])){
            $_SESSION['err'] = 1;
            header('Location: login.php');   
            return false;
        }
//        checkLogin(['anjay@gmail.com', '202cb962ac59075b964b07152d234b70']);
        checkLogin([$_POST['mail'], $db->query("SELECT MD5('{$_POST['pass']}')")->fetch()[0]], $db);
    }
?>
