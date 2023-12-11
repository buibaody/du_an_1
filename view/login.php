<?php
require 'model/user.php';
if(isset($_POST['btnlogin'])&&($_POST['btnlogin'])){
    $username = $_POST['user'];
    $password = $_POST['password'];
   
    $kq =  getuser($username, md5($password));
    if($username !="" && $password !=""){
            $role = $kq[0]['role'];
        if($role==1){
            $_SESSION['role']=$role;
                header('location: Admin/index.php?page=productadmin');
        }else{
            $_SESSION['role']=$role;
            $_SESSION['id']=$kq[0]['id'];
            $_SESSION['user']=$kq[0]['user'];
            $_SESSION['name']=$kq[0]['name'];
            $_SESSION['img']=$kq[0]['img'];

            header('location: index.php');
        }
    }else{
        $thongbao = "Sai thông tin đăng nhập";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
<div class="main">
        <div class="login_big">
            <div class="login_menu">
                <form action="" method="post" required=""s>
                    <h2 class="login_title">Đăng Nhập</h2>
                    <div class="form">
                        <label for="">Tài Khoản</label>
                        <input type="text" name="user" placeholder="Tên tài khoản">
                    </div>
                    <div class="form">
                        <label for="">Mật Khẩu</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="back_login">
                        <span>Bạn chưa có <a href="index.php?page=signup" name="">tài khoản</a>?</span>
                    </div>
                    <div class="back_login">
                        <span>quên mk <a href="index.php?page=quenmk" name="">tài khoản</a>?</span>
                    </div>
                    <div class="error">
                        <?php 
                            if(isset($thongbao) && $thongbao != ""){
                                echo '<font color="red">'.$thongbao.'</font>';
                            }else {
                                unset($thongbao);
                            }
                        ?>
                    </div>
                    <div class="btn">                      
                        <input class="button" type="submit" value="Đăng Nhập" name="btnlogin">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>