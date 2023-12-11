<?php
function getall_product() {
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM sanpham");
    $stmt->execute();
    // giá trị trả về là mảng PDO::FETCH_ASSOC
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
    $sql = "INSERT INTO `sanpham`(`name`, `price`, `img`) 
                        VALUES ('$name', '$price', '$img')";
    if ($conn->exec($sql) == TRUE) {
        header('location: admin.php');
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
        $sql = "UPDATE sanpham SET name = '".$name."', price = '".$price."' WHERE id=".$id;
    }else{
        $sql = "UPDATE sanpham SET name = '".$name."', price = '".$price."', img = '".$img."' WHERE id=".$id;
    }
    // $sql = "UPDATE sanpham SET name = '".$name."', price = '".$price."', img = '".$img."' WHERE id=".$id;
    header('location: ../admin.php');
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function searchbox($search){
    $conn = connectiondb();
    $query = $conn->prepare("SELECT * FROM sanpham WHERE ten LIKE '%$search%'");
    $query->execute();
    $result = $query->setFetchMode(PDO::FETCH_ASSOC);
    $kqsp = $query->fetchAll();
    return $kqsp;
}
function insert_cart($id ,$ten, $img, $tien, $soluong){
    $conn = connectiondb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `giohang`(`id`,`ten`, `img`, `tien`, `soluong`) 
                        VALUES ('$id','$ten', '$img','$tien','$soluong')";
    if ($conn->exec($sql) == TRUE) {
       echo 'ok';
    }
}
?>