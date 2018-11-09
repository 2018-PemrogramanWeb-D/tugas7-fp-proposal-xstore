<?php
    session_start();
    require 'conn.php';
    
    function checkLogin(array $data, &$db){
        $condition = "'{$data[0]}'=pengguna.mail AND '{$data[1]}'=pengguna.pass";
 
        $hasil = $db->query("SELECT pengguna.*, b.depan FROM pengguna, detail_orang b WHERE ".$condition)->fetch();
//        print_r($hasil['depan']);
        
        if(!empty($hasil)){
            $_SESSION['logged-in'] = $hasil['depan'];
        }
    }

    if(isset($_SESSION['logged-in'])){
        header('Location: index.html');
    }
    else if(!empty($_POST['submit'])){
        
        if(empty($_POST['mail'])){
            return false;
        }
        
        if(empty($_POST['pass'])){
            return false;
        }
//        checkLogin(['anjay@gmail.com', '202cb962ac59075b964b07152d234b70']);
        checkLogin([$_POST['mail'], $db->query("SELECT MD5('{$_POST['pass']}')")->fetch()[0]], $db);
    }
?>
