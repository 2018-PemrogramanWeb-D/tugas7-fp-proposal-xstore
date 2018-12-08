<?php 
    session_start();
    include 'conn.php';
    $tes = 1;
    $aja = json_decode('{"cart":{"3":1}}', true);

    $query = $db->prepare('SELECT id, nama, harga, gambar FROM tproduk where id=1');
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);
    foreach($aja["cart"] as $key=>$row){
        print_r($key);
    }
    
    // $data = array('cart'=>['total'=>0]);
    // $data['cart']["asek"]=1;

    // // $data = array('total'=>0);
    // // $data["0001"] = 2;
    // // $data["0002"] = 1;
    // // $data["0003"] = 1;

    // $_SESSION['ses'] = $data;
    // // print_r($data);
    // // print_r($data[9]);
    
    // print_r(json_encode($_SESSION['ses']));
    // // file_put_contents("tes.json",json_encode($_SESSION['ses'], FILE_APPEND) );
    // unset($_SESSION['ses']);
    // // $tes = 'asek';
    // // $location = '/userdata/'.$tes.'.json'
    // // print_r(json_encode($tes);
?>