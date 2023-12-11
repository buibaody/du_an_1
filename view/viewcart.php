<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/giohang.css">
    <title>Giỏ hàng</title>
</head>
<script>
    //nút số lượng
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;
    //giá trị trả về
    let render = (amount) => {
        amountElement.value = amount
    }
    //tăng
    let handLePlus = () => {
        amount++;
        render(amount);
    }
    //giảm
    let handLeMinus = () => {
        if (amount >1) {
            amount--;
            render(amount);
        }
    }
</script>
<body>
<div class="product_insert">
    <table border = "1">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thanh Toán</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (isset($_SESSION['viewcart'])&& is_array($_SESSION['viewcart'])) {
                    foreach($_SESSION['viewcart'] as $item){
                        extract($item);
                        $tt = $tien * $soluong;
                        echo '
                        <tr>
                            <td>'.$ten.'</td>
                            <td><img class="product_insert-img anhviewcard" src="'.$img.'"></td>
                            <td>'. number_format($tien, 0, ',', '.') . ' VNĐ</td>
                            <td>
                                <div id="buy-amount">
                                    <button class="minus-btn" onclick="handLeMinus()">-</button>
                                    <input type="text" name="amount" id="amount" value="'.$soluong.'">
                                    <button class="plus-btn" onclick="handLePlus()">+</button>
                                </div>
                            </td>
                            <td>'. number_format($tt, 0, ',', '.') . ' VNĐ</td>
                            <td>
                            <form action="index.php?page=xltt" method = "post">
                            <input type = "hidden" name="id" value="'.$id.'">
                            <input type = "hidden" name="img" value="'.$img.'">
                            <input type = "hidden" name="ten" value="'.$ten.'">
                            <input type = "hidden" name="tien" value="'.$tien.'">
                            <input type = "hidden" name="soluong" value="'.$soluong.'">
                            <button class="delete-button" value="thanhtoan" name="thanhtoan">Thanh Toán$</button></td>
                            </form>                            
                            <td><a href="index.php?page=removecart&id='.$id.'"><button class="delete-button">Xóa</button></a></td> 
                        </tr>
                        ';
                    }
                }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>