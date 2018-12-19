<?php 
    if(isset($_GET['id'])){
        $content = &$_SESSION['cart']['cart'];
        
        if(array_key_exists($_GET["id"],$content)===FALSE){
            $content [$_GET['id']] = 1;
        }
    }
?>