
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "model/user.php";


require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



if(isset($_POST['upemail'])&&($_POST['upemail'])){
$_SESSION['email'] = $_POST['email'];
$kq = getemail($_SESSION['email']); 
    if(count($kq) == 0){
    $errEmail="Email chưa được đăng ký";
    }else{
        $code = substr( md5(rand(0,999999)), 0 , 8);
        updateOTP($code,$_SESSION['email']);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();          
    $mail->CharSet = 'utf-8';                                  //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'buibaoduyxs234@gmail.com';                     //SMTP username
    $mail->Password   = 'vnyqhsnvjfsvkxgn';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('buibaoduyxs234@gmail.com', 'Bùi Bảo Duy');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($_SESSION['email']);               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password request request';
    $mail->Body    = "Bạn đã yêu cầu gởi lại mật khẩu mới. OTP xác nhận tài khoản: {$code}";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    header('location: view/maOtp.php ');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Quên mật khẩu</title>
</head>
<body>
    <div class="main">
    <div class="login_big">
            <div class="login_menu">
                <form action="" method="post" autocomplete = "off">
                    <h2 class="login_title">Quên mật khẩu</h2>
                    <div class="form">
                        <label for="">Email:</label>
                        <input type="text" name="email" placeholder="Nhập email liên kết với tài khoản">
                    </div>
                    <div class="error">
                        <?php 
                            if(isset($errEmail)){
                                echo '<font color="red">'.$errEmail.'</font>';
                            }else {
                                unset($errEmail);
                            }
                        ?>
                    </div>
                    <div class="btn">
                        <input class="btn_signup" type="submit" value="Gửi" name="upemail">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>