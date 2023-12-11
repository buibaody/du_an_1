<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="update.css">
<!-- Custom-Files -->
<link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->

<body>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $kq1 = getsp($id);
        $kq = getall_product();
    }
    if(isset($_POST['update'])){
            $id = $_POST['id'];
            $name = $_POST['ten'];
            $price = $_POST['tien'];
            $img= $_POST['img'];
            if(isset($_FILES['img']['name']) != ""){
                $img = basename($_FILES['img']['name']);
                $dir = "../uploadsp/";
                $show = $dir . $img;   
                move_uploaded_file($_FILES['img']['tmp_name'], $show);
            }else{
                $show = "";
            }
                update_product($id, $name, $price, $img);
                // var_dump($id, $name, $price, $img);
        }
        $kq = getall_product();
    ?>
    <section class="about py-5">
    <div class="main">
        <div class="signup_big">
            <div class="login_menu">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2 class="login_title">SỬA SẢN PHẨM</h2>
                    <input type="hidden" name="id" value="<?= $kq1[0]['id']?>">
                    <div class="form">
                        <label for="">Tên:</label>
                        <input type="text" name="ten" placeholder="Nhập tên sản phẩm" value="<?= $kq1[0]['ten']?>">
                    </div>
                    <div class="form">
                        <label for="">Giá:</label>
                        <input type="text" name="tien" placeholder="Nhập giá" value="<?=$kq1[0]['tien']?>">
                    </div>
                    <div class="form">
                        <label for="">Link ảnh</label>
                        <input type="text" name="img" placeholder="Nhập link ảnh" value="<?=$kq1[0]['img']?>">
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
                        <input type="submit" value="Update" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="product_insert">
        <table border="1">
</body>
</html>