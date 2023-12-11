<?php
include '../model/connect.php';
include '../model/user.php';
if(isset($_POST['ok'])&&$_POST['ok']){
    $code = $_POST['OTP'];
    $kqotp = OTP($code);
    if(count($kqotp) == 1){
        header('location: doiMk.php');
    }else{
       $errOTP = "Mã OTP của bạn không hợp lệ.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <title>Nhập OTP</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
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
                    <h2 class="login_title">Xác nhận</h2>
                    <div class="form">
                        <label for="">Nhập mã OTP</label>
                        <input type="text" name="OTP" placeholder="Nhập mã OTP">
                    </div>
                    <div class="error">
                        <?php 
                            if(isset($errOTP)){
                                echo '<font color="red">'.$errOTP.'</font>';
                            }else {
                                unset($errOTP);
                            }
                        ?>
                    </div>
                    <div class="btn">
                        <input class="btn_signup" type="submit" value="Xác nhận" name="ok">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>