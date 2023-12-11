<style>

  .anh-chinh {
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .phan-chi-tiet {
    background-color: #ffffff;
    padding: 60px;
    text-align: left;
    font-size: 24px;
  }
  .anh-sp {
    width: 750px;
    height: 750px;
    object-fit: cover;
  } 
  .anh-sp-nho {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  .anh-so-nho-con {
    width: 240px;
    height: 200px;
    object-fit: cover;
    margin: 0 10px;
  }
  .chi-tiet-sp {
    font-size: 24px;
    margin-top: 20px;
  }
  .chi-tiet-sp h2 {
    font-size: 32px;
    margin-bottom: 10px;
  }
  .chi-tiet-sp p {
    text-align: left;
  }
  .nut-mua {
    margin-top: 20px;
    background-color: #4caf50;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
  }
  .kich-co {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-gap: 10px;
    margin-top: 20px;
  }
  .co-to {
    width: 100%;
    height: 50px;
    background-color: while;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    font-size: 16px;
    cursor: pointer;
    border: 1px solid black;
  }
  .selected {
    background-color: #4caf50;
  } 
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Màu nền đằng sau thông báo */
    z-index: 999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }
  .success-message {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FF9800;
    color: white;
    padding: 20px;
    border-radius: 10px;
    display: none;
    font-size: 24px;
    text-align: center;
    z-index: 1000;
  } 
</style>
<?php
  $conn = connectiondb();
  $kq1=getsp($id);
  foreach($kq1 as $s){
    echo '
      <div class="anh-chinh">
      <img class="anh-sp" src="'.$s['img'].'" alt="Product Image">
      <div class="anh-sp-nho">
        <img class="anh-so-nho-con" src="'.$s['img'].'" alt="Small Image 1">
        <img class="anh-so-nho-con" src="'.$s['img'].'" alt="Small Image 2">
        <img class="anh-so-nho-con" src="'.$s['img'].'" alt="Small Image 3">
      </div>
      </div>
      <div class="phan-chi-tiet">
        <h2>'.$s['ten'].'</h2>
        <div class="chi-tiet-sp">
          <p>Thương hiệu: Nike </p>
          <p>Loại: Thể loại</p>
          <p>Giá: '.number_format($s['tien'], 0, ',', '.') . 'VND</p>
          <div class="kich-co">
            <div class="co-to">Size 38</div>
            <div class="co-to">Size 39</div>
            <div class="co-to">Size 40</div>
            <div class="co-to">Size 41</div>
            <div class="co-to">Size 42</div>
          </div>
          <form action="index.php?page=addcart" method = "post"  autocomplete="off" enctype="multipart/form-data">
            <input type = "hidden" name="id" value="'.$s['id'].'">
            <input type = "hidden" name="img" value="'.$s['img'].'">
            <input type = "hidden" name="ten" value="'.$s['ten'].'">
            <input type = "hidden" name="tien" value="'.$s['tien'].'">
            <div class="addtocart">
              <button class="nut-mua btn addtocart" type ="submit" name="sub" value="sub">
              <i class="fa-solid fa-cart-shopping"></i> Thêm Vào Giỏ Hàng</button>
            </div>
          </form>
          <div class="overlay" id="overlay">
          </div>
          <div class="success-message" id="successMessage">
            Thêm vào giỏ hàng thành công <i class="fa-solid fa-check"></i>
          </div>
          <h3>Mô tả sản phẩm:</h3>
          <p>
            Nhanh về phía trước. Tua lại. Không thành vấn 
            đề—chiếc giày này mang hơi hướng cổ điển vào tương l
            ai. V2K làm lại mọi thứ bạn yêu thích về Vomero theo kiểu đư
            ợc lấy trực tiếp từ danh mục sản phẩm đang chạy đầu những năm 00. P
            hối lớp các lớp kim loại lấp lánh, các chi tiết nhựa tham khảo và đế giữa mang tính thẩm mỹ cổ điển hoàn hảo. Và gót giày chắc chắn đảm bảo bạn đi bất cứ đâu cũng cảm thấy thoải mái.
          </p>
        </div>
      </div>
    ';
  }
?>
<div class="container">
  
</div>
<script>
  const sizeElements = document.querySelectorAll('.co-to');
  function handleSizeClick(event) {
    // Loại bỏ lớp 'selected' khỏi tất cả các ô size
    sizeElements.forEach((sizeElement) => {
      sizeElement.classList.remove('selected');
    });
    // Thêm lớp 'selected' vào ô size được click
    event.target.classList.add('selected');
  }
  // Gán sự kiện click cho mỗi ô size
  sizeElements.forEach((sizeElement) => {
    sizeElement.addEventListener('click', handleSizeClick);
  });
  function showSuccessMessage() {
    var overlay = document.getElementById("overlay");
    var successMessage = document.getElementById("successMessage");
    overlay.style.opacity = "1";
    overlay.style.pointerEvents = "auto";
    successMessage.style.display = "block";
    setTimeout(function() {
      overlay.style.opacity = "0";
      overlay.style.pointerEvents = "none";
      successMessage.style.display = "none";
    }, 2000);
  }
</script>
<script src="https://kit.fontawesome.com/9974a37d38.js" crossorigin="anonymous"></script>