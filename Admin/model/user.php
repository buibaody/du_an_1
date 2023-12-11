<?php
function delete_user($id){
    $conn=connectiondb();
    $sql = "DELETE FROM user_login WHERE id=".$id;
    $conn->exec($sql);
}

function update_admin($id, $username, $name, $pass, $email, $img){
    $conn = connectiondb();
    if($img == ""){
        $sql = "UPDATE user_login SET user = '".$username."', name = '".$name."', pass = '".$pass."', email = '".$email."' WHERE id=".$id ;
    }else{
        $sql = "UPDATE user_login SET user = '".$username."', name = '".$name."', pass = '".$pass."', email = '".$email."' , img = '".$img."' WHERE id=".$id;
    }
    header('location: ../index.php?page=noteuser');
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function check($username){
    $conn=connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user_login  WHERE user=? ");
    $stmt->bindParam(1,$username);
    $stmt->execute([$username]);
    $count = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getall_user() {
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM user_login WHERE role LIKE '0'");
    $stmt->execute();
    // giá trị trả về là mảng PDO::FETCH_ASSOC
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqus = $stmt->fetchAll();
    return $kqus;
}

function getuser($id){
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user_login  WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq1 = $stmt->fetchAll();
    return $kq1;
}

function insert_user($username, $password, $email, $img, $name){
    $conn = connectiondb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `user_login`(`user`, `email`, `pass`, `img`, `name`) 
                        VALUES ('$username', '$email', '$password', '$img', '$name')";
    if ($conn->exec($sql) == TRUE) {
        header('location: index.php?page=noteuser');
    }
}
//tài khoản đã đăng kí
function get_use() {
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $use = $stmt->fetchAll();
    return $use; 
}
