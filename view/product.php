
<script src="https://kit.fontawesome.com/5f3f82f62d.js" crossorigin="anonymous"></script>
<section class="about py-5">
        <div class="container pb-lg-3">
            <h3 class="tittle text-center">Tìm kiếm sản phẩm</h3>
            <div class="search_box">
            <form class="form-search" action="" method="post">
                <input class="search-text" type="text" name="search"  placeholder="Nhập tên sản phẩm">
                <input class="btn" type="submit" name="sub" value="Search">
            </form>
            </div>
            <div class="product_gr-list">
            <?php 
                if(isset($_POST['sub']) && ($_POST['sub'])){
                    $search = $_POST['search'];
                    if($_POST['search'] !="" ){
                        $kqsp = searchbox($search);
                        foreach($kqsp as $s){
                            echo '
                            <div class="col-md-4 product-men">
                            <div class="product-shoe-info shoe text-center"> 
                                <div class="men-thumb-item">
                                <a href="index.php?page=chitietsp"><img src="'.$s['img'].'" class="img-fluid" alt=""></a>
                                    <span class="product-new-top">Mới</span>
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="shop-single.html">'.$s['ten'].'</a>
                                    </h4>
        
                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money">'.$s['tien'].'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                        }
                    }else{
                        $thongbao = "Vui lòng nhập sản phẩm !!!";
                    } 
            }
            ?>
            </div>
            <h3 class="tittle text-center">ĐÁNG CHÚ Ý</h3>
            <div class="row">
                <?php
                $conn = connectiondb(); 
                if(isset($_REQUEST['pagi'])){
                    $offset = ($_REQUEST['pagi']-1)*9;
                }
                else $offset = 0;
                $stmt = $conn->query("SELECT * FROM sanpham limit 9 offset $offset");
                foreach($stmt as $s){

                        echo '
                        <div class="col-md-4 product-men">
                            <div class="product-shoe-info shoe text-center">
                                <div class="men-thumb-item">
                                <a href="index.php?page=chitietsp&id='.$s['id'].'"><img src="'.$s['img'].'" class="img-fluid" alt=""></a>
                                    <span class="product-new-top">Mới</span>
                                </div>
                                <div class="item-info-product">
                                    <h4>
                                        <a href="shop-single.html">'.$s['ten'].'</a>
                                    </h4>
        
                                    <div class="product_price">
                                        <div class="grid-price">
                                            <span class="money">'.number_format($s['tien'], 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                    </div>
                                    <form action="index.php?page=addcart" method = "post">
                                        <input type = "hidden" name="id" value="'.$s['id'].'">
                                        <input type = "hidden" name="img" value="'.$s['img'].'">
                                        <input type = "hidden" name="ten" value="'.$s['ten'].'">
                                        <input type = "hidden" name="tien" value="'.$s['tien'].'">
                                        <div class="addtocart"><button class="btn" type = "submit" name="sub" value="Thêm giỏ hàng">Thêm giỏ hàng</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
            <div class="text-center nut">
                
                <?php
                $conn = connectiondb();
                    $rows = $conn->query("SELECT count(*) FROM sanpham")->fetchColumn();
                    $total_pages=ceil($rows/9);
                    if(isset($_GET['pagi'])){
                        $pagi = $_GET['pagi'];
                    }else{
                        $pagi = 1;
                    }
                        $next = $pagi + 1;
                        $prev = $pagi - 1;
                    if($total_pages > 3){
            
                    }
                    if($pagi > 1){ echo '<a href="index.php?pagi='.$prev.'"><i class="fa-solid fa-angle-left" style="color: #000000;"></i></a>';}
                    for($i = 1; $i <= $total_pages; $i++){ 
                        echo '<a href="index.php?pagi='.$i.'">'.$i.'</a>';
                    }
                    if($pagi < $total_pages){ echo '<a href="index.php?pagi='.$next.'"><i class="fa-solid fa-angle-right" style="color: #000000;"></i></a>';}
                ?>
            </div>
        </div>
    </section>
    