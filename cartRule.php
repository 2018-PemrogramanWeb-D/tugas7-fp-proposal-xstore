<?php 
    if(isset($_GET['id'])){
        $content = &$_SESSION['cart']['cart'];
        if(!$content [$_GET['id']])
            $content [$_GET['id']] = 1;
    }
?>