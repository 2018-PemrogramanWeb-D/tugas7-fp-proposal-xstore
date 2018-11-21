<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require 'conn.php';

        $folder="upload/";
        // $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        // print_r($imagetmp);
        // print_r($_FILES['image']);

        if($_FILES['image']['type']){

            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $dir = "$folder".$_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $dir);

            $db->query("INSERT INTO `tproduk` VALUES (NULL, '$nama', '$harga', '$dir', '$deskripsi', CURRENT_TIMESTAMP)");
        }    
    }
?>