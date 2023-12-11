<?php
    require '../model/connect.php';
    require 'conn.php';
    if(!empty($_POST['up_id'])){
        $id=$_POST['up_id'];
        $stmt=$conn->prepare("SELECT * FROM sanpham WHERE ID=?");
        $stmt->execute([$id]);
        $prod=$stmt->fetch();
        if($prod){
            var_dump($prod);
            $stmt=$conn->prepare("DELETE FROM sanpham WHERE ID=?");
            $stmt->execute([$id]);
            if($stmt){
                echo "Successfully Delete !";
            }
        }else echo'Product is not exits';
    }else{
        echo "Input product's id";
    }
    $conn=null;
?>