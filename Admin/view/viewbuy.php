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
<div class="product_insert">
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <?php
            $bill = getAll_bill();
            if(isset($bill) && (count($bill)>0)){
                $i = 1;
                foreach($bill as $dm){
                    echo'
                        <tbody>
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$dm['ten'].'</td>
                                <td class="product_insert-img"><img src="'.$dm['img'].'"></td>
                                <td>'.$dm['tien'].'</td>
                                <td>'.$dm['soluong'].'</td>
                                <td>'.$dm['username'].'</td>
                                <td>'.$dm['diachi'].'</td>
                                <td>'.$dm['email'].'</td>
                                <td>'.$dm['sdt'].'</td>
                            </tr>
                        </tbody>
                    ';
                    $i++;
                }
            }
        ?>
    </table>
</div>