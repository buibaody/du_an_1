<style>
    .containerfull{
    float: left;
    width: 100%;
    margin: 30px 0px;
    }
    .containerfull img{
        width: 100%;
    }
    .chinh-tt {
        width: 1200px;
        margin: 0 auto;
    }
    .nutmua {
        color: #993300;
        font-size: 13pt;
        font-weight: bold;
        width: 100%;
        border: 1px #993300 dotted;
        border-radius: 5px;
        padding: 10px 0px;
        background-color: #FFFFFF;
    }
    .containerfull h2 {
        font-size: 18pt;
        padding-left: 10px;
        color: #444444;
        border-left: 4px #FF9900 solid;
    }
    .cot9 {
        float: left;
        width: 70%;
    }

    .cot3 {
        float: left;
        width: 30%;
    }
    /* FORM */

    input[type=text],
    input[type=password],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }
    @media screen and (max-width: 600px) {
        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .ttdathang{
        float: left;
        width: 90%;
        margin-bottom: 30px;
    }
    .boxcart{
        border:1px #ccc solid;
        padding: 10px;
        margin-bottom: 20px;
    }
    .bggray{
        background-color: #EEE;
    }
</style>
<?php
    require 'model/user.php';
    if (isset($_POST['donhang']) && ($_POST['donhang'])) {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $img = $_POST['img'];
        $tien = $_POST['tien'];
        $soluong = $_POST['soluong'];
        $username = $_POST['username'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        insert_bill($id, $ten, $img, $tien, $soluong, $username, $diachi, $email, $sdt);
        unset($_SESSION['viewcart']);
    } else {
        $thongbao = "Không được để trống!!!";
    }
?>
<section class="containerfull">
    <div class="chinh-tt">
        <form action="" method="post">
            <div class="cot9">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="username" id="hoten" required>                       
                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>     
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Nhập email" name="email" id="email" required>
                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="sdt" id="dienthoai" required>
                </div>       
             </div>
            <div class="cot3">
                <h2>ĐƠN HÀNG</h2>
                <div class="total">
                    <div class="boxcart">
                        <?php
                            $totalAll = 0;
                            if (isset($_SESSION['viewcart']) && is_array($_SESSION['viewcart'])) {
                                foreach ($_SESSION['viewcart'] as $item) {                                                        
                                    extract($item);
                                    $total= $tien*$soluong;
                                    $totalAll += $total;
                                    echo '
                                    <input type = "hidden" name="id" value="'.$id.'">
                                    <input type = "hidden" name="ten" value="'.$ten.'">
                                    <input type = "hidden" name="img" value="'.$img.'">
                                    <input type = "hidden" name="tien" value="'.$tien.'">
                                    <input type = "hidden" name="soluong" value="'.$soluong.'">

                                        <li>' . $ten . ' x ' . $soluong . '</li>
                                    ';
                                }
                                echo'<h3>Tổng: ' .number_format($totalAll, 0, ',', '.') . ' VNĐ </h3>';
                            }
                        ?> 
                    </div>
                </div>
                <div class="pttt">
                    <div class="boxcart">
                        <h3>Phương thức thanh toán: </h3>
                        <input type="radio" name="pttt" value="1" id="" checked> Tiền mặt<br>
                        <input type="radio" name="pttt" value="2" id=""> Ví điện tử<br>
                        <input type="radio" name="pttt" value="3" id=""> Chuyển khoản<br>
                        <input type="radio" name="pttt" value="4" id=""> Thanh toán online<br>
                    </div>
                </div>
                <div class="total">
                    <div class="boxcart bggray">
                        <?php
                            echo'
                                <h3>Tổng: ' .number_format($totalAll, 0, ',', '.') . ' VNĐ </h3>
                            ';
                        ?>
                    </div>
                </div>
                <input class="nutmua" type="submit" name="donhang" value="Thanh Toán"></input>
            </div>
        </form>
    </div>
</section>
<script>
    var ttnhanhang=document.getElementById("ttnhanhang");
    ttnhanhang.style.display="none";
    function showttnhanhang(){
        if(ttnhanhang.style.display=="none"){
            ttnhanhang.style.display="block";
        }else{
            ttnhanhang.style.display="none";
        }
    }
</script>