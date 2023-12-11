<?php
if (isset($_POST['add']) && ($_POST['add'])) {
    $name = $_POST['namesp'];
    $price = $_POST['pricesp'];
    $img = $_POST['imgsp'];
    if ($_POST['namesp'] != "" && $_POST['pricesp'] != ""){
        insert_product($name, $price, $img);
    } else {
        $thongbao = "Vui lòng không để trống!!!";
    }
}
?>
<head>
    <title>Bootie Ecommerce Bootstrap Responsive Web Template | Home :: W3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bootie Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../Admin/admin.css">
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->

</head>
<section class="about py-5">
    <div class="main">
        <div class="signup_big">
            <div class="login_menu">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2 class="login_title">THÊM SẢN PHẨM</h2>
                    <div class="form">
                        <label for="">Tên:</label>
                        <input type="text" name="namesp" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form">
                        <label for="">Giá:</label>
                        <input type="text" name="pricesp" placeholder="Nhập giá">
                    </div>
                    <div class="form">
                        <label for="">Link ảnh</label>
                        <input type="text" name="imgsp">
                    </div>
                    <div class="error">
                        <?php 
                            if(isset($thongbao) && $thongbao != ""){
                                echo '<font color="red">'.$thongbao.'</font>';
                            } else {
                                unset($thongbao);
                            }
                        ?>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Add" name="add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="product_insert">
        <table border="1">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th colspan="2">Hành động</th>
                </tr>
            </thead>
            <?php
            $kq = getall_product();
            if(isset($kq) && (count($kq)>0)){
                $i = 1;
                foreach($kq as $dm){
                    echo'
                    <tbody>
                        <tr>
                            <td>'.$i.'</td>
                            <td>'.$dm['ten'].'</td>
                            <td class="product_insert-img"><img src="'.$dm['img'].'"></td>
                            <td>'.$dm['tien'].'</td>
                            <td>
                                <a href="index.php?page=update&id='.$dm['id'].'">Sửa</a>
                                | <a href="index.php?page=delete&id='.$dm['id'].'">Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                    ';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</section>