<?php
function getall_product() {
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM sanpham");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq; 
}
function getsp($id){
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  sanpham  WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq1 = $stmt->fetchAll();
    return $kq1;
}
function getidsp($id){
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  sanpham  WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqid = $stmt->fetchAll();
    return $kqid;
}

function insert_product($name, $price, $img){
    $conn = connectiondb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `sanpham`(`ten`, `tien`, `img`) 
                        VALUES ('$name', '$price', '$img')";
    if ($conn->exec($sql) == TRUE) {
        header('location: index.php?page=productadmin');
    }
}
function delete_product($id){
    $conn=connectiondb();
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    $conn->exec($sql);
}

function update_product($id, $name, $price, $img){
    $conn = connectiondb();
    if($img == ""){
        $sql = "UPDATE sanpham SET ten = '".$name."', tien = '".$price."' WHERE id=".$id;
    }else{
        $sql = "UPDATE sanpham SET ten = '".$name."', tien = '".$price."', img = '".$img."' WHERE id=".$id;
    }
    // $sql = "UPDATE sanpham SET name = '".$name."', price = '".$price."', img = '".$img."' WHERE id=".$id;
    header('location: index.php?page=productadmin');
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function searchbox($search){
    $conn = connectiondb();
    $query = $conn->prepare("SELECT * FROM sanpham WHERE name LIKE '%$search%'");
    $query->execute();
    $result = $query->setFetchMode(PDO::FETCH_ASSOC);
    $kqsp = $query->fetchAll();
    return $kqsp;
}
//thống kê đơn hàng
function getAll_bill(){
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM giohang");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $bill = $stmt->fetchAll();
    return $bill; 
}
?>