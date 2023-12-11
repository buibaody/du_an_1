<?php
session_start();
ob_start();
include '../model/user.php';
include '../model/connect.php';
if (isset($_POST['change']) && $_POST['change']) {
    if ($_POST['passnew'] != $_POST['pass2']) {
        $errChange = "Mật khẩu không chính xác";
    } else {
        forget(md5($_POST['passnew']), $_SESSION['email']);//mã hóa mật khẩu
        header('location: ../index.php?page=btnlogin');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <title>Thay đổi mật khẩu</title>
</head>
<style>
   

body {
  background-color: #f2f2f2;
}

.main {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login_big {
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 400px;
  padding: 20px;
}

.login_menu {
  text-align: center;
}

.login_title {
  color: #009933;
  font-size: 24px;
  margin-bottom: 20px;
}

.form {
  margin-bottom: 20px;
}

.form label {
  display: block;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 5px;
}

.form input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.error {
  margin-bottom: 20px;
}

.error font {
  color: red;
}

.btn {
  text-align: center;
}

.btn {
    display: flex;
    justify-content: center;
}

.btn input {
    padding: 10px 50px;
    outline: none;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}
.button {
    padding: 1em 2em;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    letter-spacing: 5px;
    text-transform: uppercase;
    color: black;
    transition: all 1000ms;
    font-size: 15px;
    position: relative;
    overflow: hidden;
    outline: 2px solid white;
  }
  
  .btn input:hover {
    color: #ffffff;
    transform: scale(1.1);
    outline: 2px solid white;
    box-shadow: 4px 5px 17px -4px #226c2f;
    background-color: #226c2f;
  }
  .btn input::before {
    content: "";
    position: absolute;
    left: -50px;
    top: 0;
    width: 0;
    height: 100%;
    background-color: #226c2f;
    transform: skewX(45deg);
    z-index: -1;
    transition: width 1000ms;
  }
  
  .btn input:hover::before {
    width: 250%;
  }
</style>
<body>
    <div class="main">
        <div class="login_big">
            <div class="login_menu">
                <form action="" method="post" autocomplete = "off">
                    <h2 class="login_title">Đổi mật khẩu</h2>
                    <div class="form">
                        <label for="">Mật khẩu mới:</label>
                        <input type="text" name="passnew" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="form">
                        <label for="">Xác nhận mật khẩu mới:</label>
                        <input type="text" name="pass2" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="error">
                        <?php 
                            if(isset($errChange)){
                                echo '<font color="red">'.$errChange.'</font>';
                            }else {
                                unset($errChange);
                            }
                        ?>
                    </div>
                    <div class="btn">
                        <input class="btn_signup" type="submit" value="Thay đổi" name="change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>