<?php
function checkuser($user, $password){
    $conn=connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user  WHERE user=? AND pass=? ");
    $stmt->bindParam(1,$user);
    $stmt->bindParam(2,$password);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0)
    return  $kq[0]['role'];
    else return 0;
}

function getuser($user, $password){
    $conn=connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user  WHERE user= ? AND pass= ? ");
    $stmt->bindParam(1,$user);
    $stmt->bindParam(2,$password);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
} 

function insert_user($user, $password, $name, $img, $email){
    $conn = connectiondb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `user`(`user`, `name`, `pass`, `img`,`email`) 
                        VALUES ('$user', '$name', '$password', '$img','$email')";
    if ($conn->exec($sql) == TRUE) {
        header('location: index.php?page=btnlogin');
    }
}
//thêm dô đơn hàng
function insert_bill($id, $ten, $img, $tien, $soluong, $username, $diachi, $email, $sdt){
    $conn = connectiondb();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `giohang`(`id`, `ten`, `img`, `tien`,`soluong`,`username`,`diachi`,`email`,`sdt`) 
                        VALUES ('$id', '$ten', '$img', '$tien', '$soluong','$username','$diachi','$email','$sdt')";
    if ($conn->exec($sql) == TRUE) {
        header('location: index.php');
    }
} 
function update_user($user, $pass, $name, $img, $email){
    $conn=connectiondb();
    $sql = "UPDATE user
    SET name = '$name', pass = '$pass', img = '$img', email='$email'
    WHERE    user = '".$_SESSION['user']."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('location: index.php');
}
// mật khẩu
function updateOTP($code, $email){
    $conn=connectiondb();
    $sql = "UPDATE user SET code = ? WHERE email= ?";
    $stmt = $conn -> prepare($sql);
    $stmt->execute([$code, $email]);
}

function forget($pass, $email) {
    $conn = connectiondb();
    $sql = "UPDATE user SET pass = ? WHERE email = ? ";
    $stmt = $conn -> prepare($sql);
    $stmt->execute([$pass, $email]);
}
function checkemail($email){
    $conn=connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user  WHERE email=? ");
    $stmt->bindParam(1,$email);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function OTP($code){
    $conn = connectiondb();
    $stmt = $conn->prepare("SELECT code FROM user WHERE code LIKE '%$code%' ");
    $stmt->execute();
    $count = $stmt->rowCount();
    // giá trị trả về là mảng PDO::FETCH_ASSOC
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqotp = $stmt->fetchAll();
    return $kqotp;
}
function getemail($email){
    $conn=connectiondb();
    $stmt = $conn->prepare("SELECT * FROM  user  WHERE email=? ");
    $stmt->bindParam(1,$email);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>