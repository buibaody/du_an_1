<?php
require 'model/user.php';
if (isset($_POST['dangky']) && ($_POST['dangky'])) {
    $user = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $img = basename($_FILES['img']['name']);
    $dir = "uploadimg/";
    $show = $dir . $img;
    move_uploaded_file($_FILES['img']['tmp_name'], $show);
    if ($_POST['user'] != "" && $_POST['name'] != "" && $_POST['password'] != "") {
        insert_user($user, md5($password), $name, $img, $email);
    } else {
        $thongbao = "Không được để trống!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Đăng Ký</title>
</head>
 
<body>
    <div class="main">
        <div class="signup_big">
            <div class="login_menu">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" required="">
                    <h2 class="login_title">Đăng Ký</h2>
                    <div class="form">
                        <label for="">Tên tài khoản</label>
                        <input type="text" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="form">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="user" placeholder="Nhập tài khoản">
                    </div>
                    <div class="form">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form">
                        <label for="">Mật Khẩu:</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="upload_img">
                        <input type="file" name="img" id="">
                    </div>
                    <div class="back_login">
                        <span>Bạn đã có <a href="index.php?page=btnlogin" name="">Tài khoản</a>?</span>
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
                        <input class="button" type="submit" value="Đăng Ký" name="dangky">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>